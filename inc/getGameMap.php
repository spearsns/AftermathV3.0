<?php 
  include("../inc/config.php");
  session_start();

  $gameID = $_SESSION['gameID']; 

  $sql =    "SELECT Picture
            FROM games 
            WHERE ID = '$gameID' ";

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
  	if($row = $result->fetch_assoc()) {
  		$data = $row['Picture'];
      if($data === null){
        $data = "../games/images/default.png";
      }
    	echo $data;
    }
  } else {
      echo "'../games/images/default.png'";
  }
?>