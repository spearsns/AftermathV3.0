<?php 
  include("../inc/config.php");
  session_start();

  $gameName = $_SESSION['gameName'];
  $gameID = $_SESSION['gameID'];

  $sql =    "SELECT Username
            FROM users AS U 
            INNER JOIN game_participants AS GP ON U.ID = GP.UserID
            WHERE GameID = '$gameID' AND StorytellerActive = '1' ";

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
  	if($row = $result->fetch_assoc()) {
  		$storyteller = $row['Username'];
    	echo $storyteller;
    }
  } else {
    echo "Not Logged In";
  }
?>