<?php
include('config.php');
session_start();

$userID = '';

if( isset($_SESSION['ID']) ){
     $userID = $_SESSION['ID'];
} else {
     $username = $_POST['exiter'];
     $result = mysqli_query($conn,
               "    SELECT ID
                    FROM users
                    WHERE Username = '$username';
               ");

     if ($result->num_rows > 0) {
          $data = mysqli_fetch_assoc($result);
          $userID = $data['ID'];
     }
}

$query = mysqli_query($conn, 
		"	UPDATE users
          	SET Active = 0
          	WHERE ID = '$userID';
          ");

$query = mysqli_query($conn, 
		"	UPDATE game_participants
          	SET PlayerActive = 0
          	WHERE UserID = '$userID';
          ");

$query = mysqli_query($conn, 
		"	UPDATE games
          	SET StorytellerActive = 0,
          		StorytellerID = 0
          	WHERE StorytellerID = '$userID';
          ");

session_destroy();

header("Location: ../index.php");
exit();
?>