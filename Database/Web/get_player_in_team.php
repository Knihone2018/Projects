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
SELECT firstName, lastName
FROM Player
WHERE team = '$team'
";

$result = mysqli_query($dbcon, $query)
    or die('Query failed:'.mysqli_error());

print "Team: $team";
print '<ol>';
while ($tuple = mysqli_fetch_row($result))
{
    print '<li>'.$tuple[0].' '.$tuple[1].'</li>';
}
print '</ol>';
// free result
mysqli_free_result($result);

// closing connection
mysqli_close($dbcon);
?>
