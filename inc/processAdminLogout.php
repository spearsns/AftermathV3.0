<?php
include('config.php');
session_start();

$gameID = htmlentities(stripslashes($_POST['gameID']));

	$query = mysqli_query($conn, 
	"UPDATE games
      SET Locked = 0, StorytellerActive = 0
      WHERE ID = '$gameID';");
?>
