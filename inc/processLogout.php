<?php
include('config.php');
session_start();
$userID = $_SESSION['ID'];

$query = mysqli_query($conn, 
		"	UPDATE users
          	SET Active = 0
          	WHERE ID = '$userID';");

$query = mysqli_query($conn, 
		"	UPDATE game_participants
          	SET PlayerActive = 0
          	WHERE UserID = '$userID';");

$query = mysqli_query($conn, 
		"	UPDATE games
          	SET StorytellerActive = 0,
          		StorytellerID = 0
          	WHERE StorytellerID = '$userID';");

session_destroy();

header("Location: ../index.php");
exit();
?>