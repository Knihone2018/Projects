<link rel="stylesheet" href="./style.css">
      <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="list_player.php">Players</a></li>
        <li><a class="active" href="list_team.php">Teams</a></li>
        <li><a href="average.html">Average</a></li>
        <li><a href="SemiFinal.html">Statistics</a></li>
        <li style="float:right"><a href="datawarehouse.php">Data Warehouse</a></li>
      </ul><br><br>
<?php
// Connection parameters
$host = 'mpcs53001.cs.uchicago.edu';
$username = 'hongni';
$password = 'Nh1989416first';
$database = $username.'DB';

// Attempting to connect
$dbcon = mysqli_connect($host, $username, $password, $database)
   or die('Could not connect: ' . mysqli_connect_error());

$query = 'SELECT * FROM Team;';
$result = mysqli_query($dbcon, $query)
    or die('Query failed:'.mysqli_error());

print '<form method="POST" action="add_team.php"><input type="submit" name="add" value="ADD TEAM"></form>';
print '<table style="width:90%">';
print '<tr><th>Name</th><th>City</th><th>State</th><th>Conference</th><th>Boss FirstName</th><th>Boss LastName</th><th>Manager FirstName</th><th>Manager LastName</th><th>Founded Year</th><th>UPDATE</th><th>DELETE</th></tr>';
while ($tuple = mysqli_fetch_row($result))
{
    $i = 0;
    print '<tr>';
    while($i < count($tuple))
    {
        print '<td>'.$tuple[$i].'</td>';
        $i ++;
    }
    print '<td><form method="POST" action="team_form.php"><input type="hidden" name="name" value="'.$tuple[0].'"><input type="submit" name="update" value="update"></form></td>' ;
    print '<td><form method="POST" action="delete_team.php"><input type="hidden" name="name" value="'.$tuple[0].'"><input type="submit" name="delete" value="delete"></form></td>';
    print '</tr>';
}
print '</table><BR>';
// free result
mysqli_free_result($result);

// closing connection
mysqli_close($dbcon);
?>

