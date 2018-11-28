<?php 
  include("../inc/config.php");
  session_start();
  $gameID = $_POST['gameID'];

  $sql =  "SELECT ID, Locked 
           FROM games 
           WHERE ID = '$gameID'
          ";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      if($row['Locked'] == 1){
        echo "<button type='button' class='btn btn-success btn-lg btn-block border' id='unlockBtn' data-dismiss='modal' data-reference='$gameID'>
          UNLOCK GAME</button>";
      } else {
        echo "<button type='button' class='btn btn-danger btn-lg btn-block border' id='lockBtn' data-dismiss='modal' data-reference='$gameID'>
          LOCK GAME</button>";
      }
    }
  }
?>