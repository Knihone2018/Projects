import util_original as util
from collections import deque
import bs4

def followingURLS(cur_url, visited, limiting_domain):
    good_url = []
    request = util.get_request(cur_url)
    html = util.read_request(request)
    soup = bs4.BeautifulSoup(html, "html5lib")
    courseInfo = visitPage(soup)
    visited[cur_url] = courseInfo
    tag_list = soup.find_all("a")
    for tag in tag_list:
        if tag.has_attr("href"):
            value = tag["href"]
            abs_url = value
            if not util.is_absolute_url(value):
                abs_url = util.convert_if_relative_url(cur_url, value)
                abs_url = util.remove_fragment(abs_url)
            if util.is_url_ok_to_follow(abs_url, limiting_domain):
                if abs_url in visited:
                    continue
                good_url.append(abs_url)
    return good_url

def visitPage(soup):
    courseInfo = ""
    title_list = soup.find_all("p", class_ = "courseblocktitle")
    descr_list = soup.find_all("p", class_ = "courseblockdesc")
    for (title, descr)  in zip(title_list, descr_list):
        courseInfo += '\n'
        courseInfo += title.text
        courseInfo += descr.text
        courseInfo += '\n'
    return courseInfo

starting_url = "http://www.classes.cs.uchicago.edu/archive/2015/winter/12200-1/new.collegecatalog.uchicago.edu/index.html"
limiting_domain = "classes.cs.uchicago.edu"
visited = dict()

queue = deque([starting_url])
count = 0
pagelimit = 1000
while queue and count < pagelimit:
    curPage = queue.popleft()
    if curPage in visited:
        continue
    count += 1
    queue += followingURLS(curPage, visited, limiting_domain)
    print(curPage, file = open("LinksVisited.txt", "a"))
    if not visited[curPage]:
        continue
    print(curPage, file = open("CourseInfoWithLinks.txt", "a"))
    print(visited[curPage], file = open("CourseInfoWithLinks.txt","a"))

