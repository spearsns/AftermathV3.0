<?php 
  include("../inc/config.php");
  session_start();

  $gameName = $_SESSION['gameName'];
  $gameID = $_SESSION['gameID'];
  $characterID = $_SESSION['characterID'];

  $sql =  "SELECT RemainingExp
          FROM characters AS C 
          INNER JOIN game_participants AS GP ON C.ID = GP.CharacterID
          WHERE GameID = '$gameID' AND CharacterID = '$characterID' ";

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    if($row = $result->fetch_assoc()) {
      $exp = $row['RemainingExp'];
      echo "$exp";
    }
  } else {
    echo "0";
  }
?>