<?php
// Connection parameters
$host = 'mpcs53001.cs.uchicago.edu';
$username = 'hongni';
$password = 'Nh1989416first';
$database = $username.'DB';

// Attempting to connect
$dbcon = mysqli_connect($host, $username, $password, $database)
   or die('Could not connect: ' . mysqli_connect_error());

$position = $_REQUEST['position'];
$query =
"
SELECT position, CAST(AVG(points) AS decimal(3,1)) as averagePoints
FROM Player
NATURAL JOIN playerPlayInGame
WHERE position = '$position'
GROUP BY position
";

$result = mysqli_query($dbcon, $query)
    or die('Query failed:'.mysqli_error());

while ($tuple = mysqli_fetch_row($result))
{
    print $tuple[0].' got '.$tuple[1].' points per game';
}

// free result
mysqli_free_result($result);

// closing connection
mysqli_close($dbcon);
?>
