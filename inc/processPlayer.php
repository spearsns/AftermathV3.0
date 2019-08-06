<?php
	include('config.php');
	session_start();

	$username = $_SESSION['username'];
	$gameName = $_SESSION['gameName'];
	$password = htmlentities(stripslashes($_POST['password']));
	$userID = $_SESSION['ID'];

	$stmt = $conn->prepare("SELECT ID FROM games WHERE BINARY PlayerPassword = ? AND GameName = ?");
	$stmt->bind_param("ss", $password, $gameName);
	$stmt->execute();
	$stmt->store_result();

	if($stmt->num_rows === 0){
		header( "Location: ../playerLogin.php?" .$gameName );
		$_SESSION['console'] = "INVALID PASSWORD!";
		exit;	
	} 
	$stmt->bind_result($gameID);
	$stmt->fetch();

	$_SESSION['gameID'] = $gameID;

	header("Location: ../characterSelect.php?". $gameName);

?>
