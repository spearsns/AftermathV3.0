<?php
include('config.php');
session_start();

$_SESSION['background'] = ($_POST['background']);
$_SESSION['ethnicity'] = ($_POST['ethnicity']);
$_SESSION['age'] = ($_POST['age']);
$_SESSION['sex'] = ($_POST['sex']);
$_SESSION['memory'] = ($_POST['memory']);
$_SESSION['logic'] = ($_POST['logic']);
$_SESSION['perception'] = ($_POST['perception']);
$_SESSION['willpower'] = ($_POST['willpower']);
$_SESSION['charisma'] = ($_POST['charisma']);
$_SESSION['strength'] = ($_POST['strength']);
$_SESSION['endurance'] = ($_POST['endurance']);
$_SESSION['agility'] = ($_POST['agility']);
$_SESSION['speed'] = ($_POST['speed']);
$_SESSION['beauty'] = ($_POST['beauty']);

if (session_status() == PHP_SESSION_ACTIVE) {
	header("Location: ../characterDevelopment.php?");
} else {
	header("Location: ../login.php");
}

?>
