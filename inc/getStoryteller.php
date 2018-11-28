<?php 
  include("../inc/config.php");
  session_start();

  $gameName = $_SESSION['gameName'];
  $gameID = $_SESSION['gameID'];

  $sql =    "SELECT Username
            FROM users AS u 
            INNER JOIN games AS g ON u.ID = g.StorytellerID
            WHERE g.ID = '$gameID' AND StorytellerActive = '1' ";

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