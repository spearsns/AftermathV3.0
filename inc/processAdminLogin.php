<?php
include('config.php');
session_start();

$gameID = htmlentities(stripslashes($_POST['gameID']));
$password = htmlentities(stripslashes($_POST['password']));

$stmt = $conn->prepare("SELECT ID, StorytellerPassword FROM games WHERE ID = ? AND StorytellerPassword = ? ");
$stmt->bind_param("is", $gameID, $password);
$stmt->execute();
$stmt->store_result();

if($stmt->num_rows === 0) echo( "INVALID" );
if($stmt->num_rows > 0){
	echo('VALID');
	$query = mysqli_query($conn, 
	"UPDATE games
      SET Locked = '1', StorytellerActive = '1'
      WHERE ID = '$gameID';");
}

$stmt->close();

?>
