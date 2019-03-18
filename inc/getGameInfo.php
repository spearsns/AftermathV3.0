<?php
include('config.php');
session_start();

$gameID = htmlentities(stripslashes($_POST['gameID']));

$sql = "SELECT GameName, Description, StorytellerPassword, PlayerPassword FROM games WHERE ID = $gameID ";

$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
	$row = mysqli_fetch_assoc($result);
}

echo json_encode($row);

?>
