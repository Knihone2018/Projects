from django.shortcuts import render
from .models import Project, PDF

# Create your views here.
def home(request):
    projects = Project.objects
    pdfs = PDF.objects
    return render(request, 'homepage/home.html', {'projects':projects, 'pdfs':pdfs})
