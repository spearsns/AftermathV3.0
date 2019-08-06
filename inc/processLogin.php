<?php
include('config.php');
session_start();

$username = htmlentities(stripslashes($_POST['username']));
$password = htmlentities(stripslashes($_POST['password']));

$stmt = $conn->prepare("SELECT Username, ID FROM users WHERE BINARY Username = ? AND BINARY Password = ? ");
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$stmt->store_result();

if($stmt->num_rows === 0){
	header("Location: ../login.php?error=fail");	
	exit;
} 

$stmt->bind_result($user, $ID);
$stmt->fetch();

	$_SESSION['username'] = $user;
	$_SESSION['ID'] = $ID;
	
	$query = mysqli_query($conn, 
	"UPDATE users
      SET Active = '1'
      WHERE ID = '$ID';");
	
	header("Location: ../index.php?".$username);

$stmt->close();

?>
