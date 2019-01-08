<link rel="stylesheet" href="./style.css">
      <ul>
        <li><a href="index.html">Home</a></li>
        <li><a class="active" href="list_player.php">Players</a></li>
        <li><a href="list_team.php">Teams</a></li>
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

$playerID = $_REQUEST['playerID'];
$position = $_REQUEST['position'];
$number = $_REQUEST['number'];
$weight = $_REQUEST['weight'];
$height = $_REQUEST['height'];
$firstName = $_REQUEST['firstName'];
$lastName = $_REQUEST['lastName'];
$age = $_REQUEST['age'];
$university = $_REQUEST['university'];
$team = $_REQUEST['team'];

$query = 
"
SELECT * FROM Player
WHERE playerID = $playerID
";

$result = mysqli_query($dbcon, $query)
    or die('Query failed:'.mysqli_error());

if($tuple = mysqli_fetch_row($result))
{
    $position = $tuple[1];
    $number = $tuple[2];
    $weight = $tuple[3];
    $height = $tuple[4];
    $firstName = $tuple[5];
    $lastName = $tuple[6];
    $age = $tuple[7];
    $university = $tuple[8];
    $team = $tuple[9]; 
}

?>

<form action="" method="POST" name="myform">
    <h1>Player Form</h1>

    <table width="50%">
        <tr>
            <td><strong>Player ID:</strong></td>
            <td><input type="number" name="playerID" size="30" value="<?php echo $playerID;?>" readonly></td>
        </tr>
        <tr>
            <td><strong>Position:</strong></td>
            <td><input type="text" name="position" size="30" maxlength="2" value="<?php echo $position;?>"></td>
        </tr>
        <tr>
            <td><strong>Number:</strong></td>
            <td><input type="number" name="number" min="0" max="99" value="<?php echo $number;?>"></td>
        </tr>
        <tr>
            <td><strong>Weight (lbs):</strong></td>
            <td><input type="number" name="weight" min="100" max="400" value="<?php echo $weight;?>"></td>
        </tr>
        <tr>
            <td><strong>Height (cm):</strong></td>
            <td><input type="number" name="height" min="160" max="250" step="0.01" value="<?php echo $height;?>"></td>
        </tr>
        <tr>
            <td><strong>First Name:</strong></td>
            <td><input type="text" name="firstName" size = 30 value="<?php echo $firstName;?>"></td>
        </tr>
        <tr>
            <td><strong>Last Name:</strong></td>
            <td><input type="text" name="lastName" size = 30 value="<?php echo $lastName;?>"></td>
        </tr>
        <tr>
            <td><strong>Age:</strong></td>
            <td><input type="number" name="age" min="15" max="50" value="<?php echo $age;?>"></td>
        </tr>
        <tr>
            <td><strong>University:</strong></td>
            <td><input type="text" name="university" size = 30 value="<?php echo $university;?>"></td>
        </tr>
        <tr>
            <td><strong>Team:</strong></td>
            <td><input type="text" name="team" size = 30 value="<?php echo $team;?>"></td>
        </tr>
    </table>

  <div>
    <input type="submit" name="updateplayer" value="SAVE"/>
  </div>
</form>

<a href="list_player.php">BACK</a>

<?php

$playerID = $_REQUEST['playerID'];
$position = $_POST['position'];
$number = $_POST['number'];
$weight = $_POST['weight'];
$height = $_POST['height'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$age = $_POST['age'];
$university = $_POST['university'];
$team = $_POST['team'];

$query_update =
"
UPDATE Player
SET position = '$position',
number = $number,
weight = '$weight',
height = '$height',
firstName = '$firstName',
lastName = '$lastName',
age = '$age',
university = '$university',
team = '$team'
WHERE playerID = $playerID
;";


if($_POST['updateplayer'])
{
    $result = mysqli_query($dbcon, $query_update) or die('Query failed:'.mysqli_error());
}

// free result
mysqli_free_result($result);

// closing connection
mysqli_close($dbcon);
?>
