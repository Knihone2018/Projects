<?php
// Connection parameters
$host = 'mpcs53001.cs.uchicago.edu';
$username = 'hongni';
$password = 'Nh1989416first';
$database = $username.'DB';

// Attempting to connect
$dbcon = mysqli_connect($host, $username, $password, $database)
   or die('Could not connect: ' . mysqli_connect_error());

$team = $_REQUEST['teamName'];
$query =
"
SELECT DISTINCT T.name,
CASE
    WHEN G.host = '$team' and T.name = G.guest THEN 'YES'
    WHEN G.guest = '$team' and T.name = G.host THEN 'YES'
    ELSE 'NO'
END as playedWithTargetTeam
FROM Team T, Game G
WHERE T.name != '$team';
";

$result = mysqli_query($dbcon, $query)
    or die('Query failed:'.mysqli_error());

print "Team: $team";
print '<ul>';
while ($tuple = mysqli_fetch_row($result))
{
    print '<li>'.$tuple[0].' '.$tuple[1].'</li>';
}
print '</ul>';
// free result
mysqli_free_result($result);

// closing connection
mysqli_close($dbcon);
?>
