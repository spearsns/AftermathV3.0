<?php
include('config.php');
session_start();

/* POST */
$characterID = $_POST['characterID'];
$experience = $_POST['experience'];

$sql = 
	"UPDATE characters 
		SET TotalExp = TotalExp + $experience,
			RemainingExp = RemainingExp + $experience
		WHERE ID = '$characterID' ";
$result = $conn->query($sql) or die(mysqli_error($conn));

echo 'success';
?>