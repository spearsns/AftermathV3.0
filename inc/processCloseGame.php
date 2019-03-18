<?php 
  include("../inc/config.php");
  session_start();

  /* POST */
  $gameID = $_POST['gameID'];

  $sql1 = "UPDATE games 
          SET Finished = '1'
          WHERE ID = '$gameID' ";
      
  $result = $conn->query($sql1) or die(mysqli_error($conn));

  $sql2 = "SELECT GameName 
          FROM games
          WHERE ID = '$gameID' ";

  $gameName = $conn->query($sql2) or die(mysqli_error($conn));
  
  $playFile = $_SERVER['DOCUMENT_ROOT'] . '/aftermath/games/' . $gameName . "_Play.php";
  $tellFile = $_SERVER['DOCUMENT_ROOT'] . "/aftermath/games/" . $gameName . "_Tell.php";

  unlink($playFile);
  unlink($tellFile);

  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
?>