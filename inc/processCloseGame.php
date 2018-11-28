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

  $playFile = $_SERVER['HTTP_HOST'] . "/games/" . $gameName . "_Play";
  $tellFile = $_SERVER['HTTP_HOST'] . "/games/" . $gameName . "_Tell";

  unlink($playFile);
  unlink($tellFile);
?>