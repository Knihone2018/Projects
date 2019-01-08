<?php
// Connection parameters
$host = 'mpcs53001.cs.uchicago.edu';
$username = 'hongni';
$password = 'Nh1989416first';
$database = $username.'DB';

// Attempting to connect
$dbcon = mysqli_connect($host, $username, $password, $database)
   or die('Could not connect: ' . mysqli_connect_error());

$year = $_REQUEST['year'];
$type = $_REQUEST['type'];
$query =
"
SELECT Player.firstName, Player.lastName, University.name
FROM Player, University
WHERE Player.university = University.name
AND University.type = '$type'
AND University.established > $year;
";

$result = mysqli_query($dbcon, $query)
    or die('Query failed:'.mysqli_error());

print '<ol>';
while ($tuple = mysqli_fetch_row($result))
{
    print '<li>';
    print $tuple[0].' '.$tuple[1].' from '.$tuple[2];
    print '</li>';
}
print '</ol>';

// free result
mysqli_free_result($result);

// closing connection
mysqli_close($dbcon);
?>
