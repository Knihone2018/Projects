<?php
?>
<link rel="stylesheet" href="./style.css">
      <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="list_player.php">Players</a></li>
        <li><a href="list_team.php">Teams</a></li>
        <li><a href="average.html">Average</a></li>
        <li><a href="SemiFinal.html">Statistics</a></li>
        <li style="float:right"><a class="active" href="datawarehouse.php">Data Warehouse</a></li>
      </ul><br><br>

<h2>Ideas for data warehouse.</h2>

<h3>Player improvement vs time</h3>
<p> The statistics of each player at current season is importmant. However, the trend of how these statistics change along with time is also importmant. Since, this information can help the manager to decide whehter the player worth a large contract in the future. To do this, we need to have information from Player, Game, playerPlayInGame information labeled with time stored in datawarehouse.  
</p>

<h3>Team history</h3>
<p> The history of a team sometimes determines the spirit of the team. When talking about Celtics and Lakers, the first thing come to mind is that they are strong teams, although they might not be strong for the current season. To obtain this information, Team, Game, and teamPlayInGame informaiton labeled with time should be stored in data warehouse.
</p>
