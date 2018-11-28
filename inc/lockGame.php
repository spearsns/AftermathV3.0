<?php
include('config.php');
session_start();

/* POST */
$gameID = $_POST['gameID'];

$sql = "UPDATE games 
		SET Locked = 1
		WHERE ID = '$gameID' ";
		
$result = $conn->query($sql) or die(mysqli_error($conn));

?>