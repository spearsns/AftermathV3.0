<?php
session_start();
include('config.php');

$gameName =					htmlentities(strip_tags($_POST['name']));
$description =				htmlentities(strip_tags($_POST['description']));
$storytellerPW = 			htmlentities(strip_tags($_POST['storytellerPassword']));
$storytellerPWConfirm = 	htmlentities(strip_tags($_POST['storytellerPWConfirm']));
$playerPW =					htmlentities(strip_tags($_POST['playerPassword']));
$playerPWConfirm =			htmlentities(strip_tags($_POST['playerPWConfirm']));


$play_tmp_file = 	"playTemplate.php";
$play_tmp_path = 	"../templates/";
$tell_tmp_file =	"tellTemplate.php";
$tell_tmp_path = 	"../templates/";
$game_path = 		"../games/";
$txt_file =			$gameName. ".txt";
$txt_path =			"../games/chatlogs/";

$play_tmp = 		file_get_contents($play_tmp_path.$play_tmp_file);
$tell_tmp = 		file_get_contents($tell_tmp_path.$tell_tmp_file);

$new_play_file = str_replace('', '', $play_tmp);
$new_tell_file = str_replace('', '', $tell_tmp);
$new_txt_file =	str_replace('', '', 'NEW GAME: ' . $gameName);

$game_play_file =	$gameName. "_Play.php";
$game_tell_file =	$gameName. "_Tell.php";
$game_txt_file =	$gameName. ".txt";

$_SESSION["textFile"] = $txt_path . $camp_txt_file;

 if (empty($gameName)){
	header("Location: ../newGame.php?error=empty");
	exit();
} if (empty($description)){
	header("Location: ../newGame.php?error=empty");
	exit();
} if (empty($storytellerPW)){
	header("Location: ../newGame.php?error=empty");
	exit();
} else {
	$sql = "SELECT GameName FROM games WHERE GameName ='$gameName'";
	$result = $conn->query($sql);
	$namecheck = mysqli_num_rows($result);
	if ($namecheck > 0){
		header("Location: ../newGame.php?error=name");
		exit();
	} if ($storytellerPW != $storytellerPWConfirm){
		header("Location: ../newGame.php?error=storytellerPW");
		exit();
	} if ($playerPW != $playerPWConfirm){
		header("Location: ../newGame.php?error=playerPW");
		exit();
	} else {
		$sql = "INSERT INTO games (GameName, Description, TxtFile, StorytellerPassword, PlayerPassword, Locked) 
		VALUES ('$gameName', '$description', '$game_txt_file', '$storytellerPW', '$playerPW', 0)";
		$result = $conn->query($sql);

		$play = fopen($game_path.$game_play_file, "w");
			fwrite($play, $new_play_file);
			fclose($play); 
		$tell = fopen($game_path.$game_tell_file, "w");
			fwrite($tell, $new_tell_file);
			fclose($tell);
		$text = fopen($txt_path.$game_txt_file, "w");
			fwrite($text, $new_txt_file);
			fclose($text);
		} 
		header("Location: ../success.php");		
	}

?>
