<?php
include('config.php');
session_start();

$username = htmlentities(stripslashes($_POST['username']));
$password = htmlentities(stripslashes($_POST['password']));

$sql = "SELECT Username, ID FROM users WHERE Username = '$username' AND Password = '$password' ";
$result = $conn->query($sql);

if ($row = $result->fetch_assoc()) {
		$username = $row['Username'];
		$ID = $row['ID'];

		$_SESSION['username'] = $username;
		$_SESSION['ID'] = $ID;
		
		$query = mysqli_query($conn, "UPDATE users
          SET Active = '1'
          WHERE ID = '$ID';");
		
		header("Location: ../index.php?".$username);
} else {
	header("Location: ../login.php?error=fail");
}

/* 
//TIMEOUT CODE
$ID = $_SESSION['ID'];
$time = $_SERVER['REQUEST_TIME'];

// for a 60 minute timeout, specified in seconds

$timeout_duration = 6000;

//Here we look for the user's LAST_ACTIVITY timestamp. If
//it's set and indicates our $timeout_duration has passed,
//blow away any previous $_SESSION data and start a new one.

$_SESSION['LAST_ACTIVITY'] = $time;

if (isset($_SESSION['LAST_ACTIVITY']) && 
   ($time - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
    
    $userActive = 
      mysqli_query($conn, 
      "UPDATE users
      SET Active = 0
      WHERE ID = '$ID';"
      );

    $gameActive =
      mysqli_query($conn,
      "UPDATE game_participants
      SET PlayerActive = 0, StorytellerActive = 0
      WHERE UserID = '$ID'; "
      );

    session_unset();
    session_destroy();
    session_start();
    header('../login.php');
}

// Finally, update LAST_ACTIVITY so that our timeout
// is based on it and not the user's login time.
*/
?>
