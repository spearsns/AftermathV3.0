<?php
	include('config.php');
	session_start();

	/* POST */
	$characterID = $_POST['characterID'];
	$experience = $_POST['experience'];

	$stmt = $conn->prepare("UPDATE characters 
							SET TotalExp = TotalExp + ?,
								RemainingExp = RemainingExp + ?
							WHERE ID = ? ");
	$stmt->bind_param("iii", $experience, $experience, $characterID);
	$stmt->execute();
?>