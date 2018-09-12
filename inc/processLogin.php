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


/* TIMEOUT CODE */
$ID = $_SESSION['ID'];
$time = $_SERVER['REQUEST_TIME'];

/**
* for a 20 minute timeout, specified in seconds
*/
$timeout_duration = 1200;

/**
* Here we look for the user's LAST_ACTIVITY timestamp. If
* it's set and indicates our $timeout_duration has passed,
* blow away any previous $_SESSION data and start a new one.
*/
if (isset($_SESSION['LAST_ACTIVITY']) && 
   ($time - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
    
    $query = mysqli_query($conn, "UPDATE users
          SET Active = '0'
          WHERE ID = '$ID';"
          );

    session_unset();
    session_destroy();
    session_start();
}

/**
* Finally, update LAST_ACTIVITY so that our timeout
* is based on it and not the user's login time.
*/
$_SESSION['LAST_ACTIVITY'] = $time;
?>
