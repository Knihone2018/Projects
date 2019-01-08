<?php
// Connection parameters
$host = 'mpcs53001.cs.uchicago.edu';
$username = 'hongni';
$password = 'Nh1989416first';
$database = $username.'DB';

// Attempting to connect
$dbcon = mysqli_connect($host, $username, $password, $database)
   or die('Could not connect: ' . mysqli_connect_error());

$query = 'SELECT * FROM Player;';
$result = mysqli_query($dbcon, $query)
    or die('Get Player List failed:'.mysqli_error());

print "Player List:";

print '<ul>';
while ($tuple = mysqli_fetch_row($result))
{
    $i = 0;
    print '<li>';
    while($i < count($tuple))
    {
        print $tuple[$i].' ';
        $i ++;
    }
    print '</li>';
}
print '</ul>';

// free result
mysqli_free_result($result);

// closing connection
mysqli_close($dbcon);
?>
