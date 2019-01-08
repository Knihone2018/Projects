<?php
// Connection parameters
$host = 'mpcs53001.cs.uchicago.edu';
$username = 'hongni';
$password = 'Nh1989416first';
$database = $username.'DB';

// Attempting to connect
$dbcon = mysqli_connect($host, $username, $password, $database)
   or die('Could not connect: ' . mysqli_connect_error());

$playerID = $_REQUEST['id'];
$query =
"
SELECT Player.firstName, Player.lastName,
       CAST(AVG(points) AS decimal(3,1)) AS averagePoints
FROM Player
NATURAL JOIN playerPlayInGame
WHERE Player.playerID = '$playerID'
GROUP BY Player.playerID;
";

$result = mysqli_query($dbcon, $query)
    or die('Query failed:'.mysqli_error());

while ($tuple = mysqli_fetch_row($result))
{
    print $tuple[0].' '.$tuple[1];
    print ' got '.$tuple[2].' points per game';
}

// free result
mysqli_free_result($result);

// closing connection
mysqli_close($dbcon);
?>
