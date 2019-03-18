<?php
include("config.php");
session_start();

$gameID = htmlentities(stripslashes($_POST["gameID"]));
$process = htmlentities(stripslashes($_POST["process"]));
$change = htmlentities(stripslashes($_POST["update"]));

if ($process == 'DeleteGame'){
	$sql = "SELECT GameName FROM games WHERE ID = '$gameID'";

  	$result = $conn->query($sql) or die(mysqli_error($conn));

  	while ($row = $result->fetch_assoc()) {
		$gameName = $row['GameName'];

  		$playFile = $_SERVER['DOCUMENT_ROOT'] . '/aftermath/games/' . $gameName . "_Play.php";
  		$tellFile = $_SERVER['DOCUMENT_ROOT'] . "/aftermath/games/" . $gameName . "_Tell.php";

	  	unlink($playFile) or die(mysqli_error($conn));
	  	unlink($tellFile) or die(mysqli_error($conn));

	  	$sql2 = "DELETE FROM games WHERE ID = '$gameID' ";

		$result2 = $conn->query($sql2) or die(mysqli_error($conn));
	}
}

$stmt = $conn->prepare("UPDATE games SET ". $process ."= ? WHERE ID = ?");
$stmt->bind_param("si", $change, $gameID);
$stmt->execute();

$stmt->close();

?>
