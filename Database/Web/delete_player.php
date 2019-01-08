<?php
// Connection parameters
$host = 'mpcs53001.cs.uchicago.edu';
$username = 'hongni';
$password = 'Nh1989416first';
$database = $username.'DB';

// Attempting to connect
$dbcon = mysqli_connect($host, $username, $password, $database)
   or die('Could not connect: ' . mysqli_connect_error());

$playerID = $_REQUEST['playerID'];

$query = 
"
DELETE FROM Player
WHERE playerID = $playerID
";

$result = mysqli_query($dbcon, $query)
    or die('Query failed:'.mysqli_error());

print '<h3>Player with ID '.$playerID.' has been deleted!</h3>';
print '<a href="list_player.php">BACK</a>';

// free result
mysqli_free_result($result);

// closing connection
mysqli_close($dbcon);
?>
