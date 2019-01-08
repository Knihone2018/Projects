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
$population = $_REQUEST['population'];
$query =
"
SELECT Player.firstName, Player.lastName, Team.name
FROM Player, Team, State
WHERE Player.team = Team.name
AND Team.state = State.name
AND Team.founded > $year
AND State.population > $population;
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
