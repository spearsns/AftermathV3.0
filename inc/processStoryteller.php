<?php
include('config.php');
session_start();

$username = $_SESSION['username'];
$gameName = $_SESSION['gameName'];
$password = htmlentities(stripslashes($_POST['password']));
$userID = $_SESSION['ID'];

$sql = "SELECT ID FROM games WHERE StorytellerPassword = '$password' AND GameName = '$gameName'";
$result = $conn->query($sql);
if($row = $result->fetch_assoc()) {
		$gameID = $row["ID"];
		$_SESSION['gameID'] = $gameID;
	}

if (mysqli_num_rows($result) > 0){
    header('Location: ../games/'. $gameName .'_Tell.php?');
} else {
	header("Location: ../storytellerLogin.php?" .$gameName);
}
?>
