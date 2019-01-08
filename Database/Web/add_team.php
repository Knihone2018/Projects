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

$name = 'Name';
$city = 'City';
$state = 'IL';
$conference = 'Eastern';
$bossFirstName = 'John';
$bossLastName = 'Doe';
$managerFirstName = 'Jane';
$managerLastName = 'Doe';
$founded = 1900;

?>
<form action="" method="POST" name="myform">
    <h1>Team Form</h1>

    <table width="50%">
        <tr>
            <td><strong>Team Name:</strong></td>
            <td><input type="text" name="name" size="20" value="<?php echo $name;?>"></td>
        </tr>
        <tr>
            <td><strong>City:</strong></td>
            <td><input type="text" name="city" size="20" value="<?php echo $city;?>"></td>
        </tr>
        <tr>
            <td><strong>State:</strong></td>
            <td><input type="text" name="state" size="20" minlength="2" maxlength="2" value="<?php echo $state;?>"></td>
        </tr>
        <tr>
            <td><strong>Conference:</strong></td>
            <td><input type="text" name="conference" size="20" maxlength="10" value="<?php echo $conference;?>"></td>
        </tr>
        <tr>
            <td><strong>Boss First Name</strong></td>
            <td><input type="text" name="bossFirstName" size="20" value="<?php echo $bossFirstName;?>"></td>
        </tr>
        <tr>
            <td><strong>Boss Last Name:</strong></td>
            <td><input type="text" name="bossLastName" size ="20" value="<?php echo $bossLastName;?>"></td>
        </tr>
        <tr>
            <td><strong>Manager First Name:</strong></td>
            <td><input type="text" name="managerFirstName" size="20" value="<?php echo $managerFirstName;?>"></td>
        </tr>
        <tr>
            <td><strong>Manager Last Name:</strong></td>
            <td><input type="text" name="managerLastName" size="20" value="<?php echo $managerLastName;?>"></td>
        </tr>
        <tr>
            <td><strong>Founded Year:</strong></td>
            <td><input type="number" name="founded" min=1900 max=2018 size = 10 value="<?php echo $founded;?>"></td>
        </tr>
    </table>

  <div>
    <input type="submit" name="addteam" value="SAVE"/>
  </div>
</form>

<a href="list_team.php">BACK</a>

<?php

$name = $_POST['name'];
$city = $_POST['city'];
$state = $_POST['state'];
$conference = $_POST['conference'];
$bossFirstName = $_POST['bossFirstName'];
$bossLastName = $_POST['bossLastName'];
$managerFirstName = $_POST['managerFirstName'];
$managerLastName = $_POST['managerLastName'];
$founded = $_POST['founded'];

$query_update =
"
INSERT INTO Team
VALUES('$name', '$city', '$state', '$conference', '$bossFirstName', '$bossLastName', '$managerFirstName', '$managerLastName', $founded);
";

if($_POST['addteam'])
{
    print '<br>';
    $result = mysqli_query($dbcon, $query_update) or die('Invalid input! Please try again!'.mysqli_error());
}

// free result
mysqli_free_result($result);

// closing connection
mysqli_close($dbcon);
?>
