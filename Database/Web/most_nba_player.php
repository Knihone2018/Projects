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
'
SELECT University.name, University.established, University.type,
COUNT(playerID) AS numberInNBA
FROM Player, University
WHERE Player.university = University.name
GROUP BY Player.university
HAVING numberInNBA >= ALL
(
    SELECT COUNT(playerID)
    FROM Player
    WHERE Player.university is not NULL
    GROUP BY university
);
';
$result = mysqli_query($dbcon, $query)
    or die('Query failed:'.mysqli_error());

while ($tuple = mysqli_fetch_row($result))
{
    print $tuple[0].', which is a '.$tuple[2];
    print ' school founded in '.$tuple[1];
    print ' has '.$tuple[3].' players in NBA!';
}

// free result
mysqli_free_result($result);

// closing connection
mysqli_close($dbcon);
?>
