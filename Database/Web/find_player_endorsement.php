<?php
// Connection parameters
$host = 'mpcs53001.cs.uchicago.edu';
$username = 'hongni';
$password = 'Nh1989416first';
$database = $username.'DB';

// Attempting to connect
$dbcon = mysqli_connect($host, $username, $password, $database)
   or die('Could not connect: ' . mysqli_connect_error());

$company = $_REQUEST['company'];
$price = $_REQUEST['price'];

$query =
"
SELECT firstName, lastName, price
FROM Player
INNER JOIN playerEndorseCompany
ON Player.playerID = playerEndorseCompany.playerID
WHERE companyName = '$company'
AND price >= $price
";

$result = mysqli_query($dbcon, $query)
    or die('Query failed:'.mysqli_error());

print '<ul>';
while ($tuple = mysqli_fetch_row($result))
{
    print '<li>';
    print $tuple[0].' '.$tuple[1];
    print ' endorsed '.$company.' for '.$tuple[2].' dollars';
    print '</li>';
}
print '</ul>';

// free result
mysqli_free_result($result);

// closing connection
mysqli_close($dbcon);
?>
