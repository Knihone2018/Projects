<?php
// Connection parameters
$host = 'mpcs53001.cs.uchicago.edu';
$username = 'hongni';
$password = 'Nh1989416first';
$database = $username.'DB';

// Attempting to connect
$dbcon = mysqli_connect($host, $username, $password, $database)
   or die('Could not connect: ' . mysqli_connect_error());

$query =
"
DROP VIEW IF EXISTS avgStatsOfPosition;
CREATE VIEW avgStatsOfPosition (position, avgPoints) AS
SELECT Player.position,
CAST(AVG(points) AS decimal(3,1))
FROM Player
INNER JOIN playerPlayInGame Using (playerID)
GROUP BY Player.position;
";
$query .=
"
SELECT Player.firstName, Player.lastName, Player.position,
CAST(AVG(points) AS decimal(3,1)) AS averagePoints,
avgStatsOfPosition.avgPoints AS avgPointsOfPosition
FROM Player
NATURAL JOIN playerPlayInGame
NATURAL JOIN avgStatsOfPosition
GROUP BY Player.playerID
HAVING averagePoints > avgPointsOfPosition;
";

$result = mysqli_query($query)
              or die(mysqli_error());

print '<ol>';
while ($tuple = mysqli_fetch_array($result))
{
    print '<li>';
    print $tuple['firstName'].$tuple['lastName'];
    print '</li>';
}
print '</ol>';

// free result
mysqli_free_result($result);

// closing connection
mysqli_close($dbcon);
?>
