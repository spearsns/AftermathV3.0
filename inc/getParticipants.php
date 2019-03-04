<?php 
  include("../inc/config.php");
  session_start();

  $gameName = $_SESSION['gameName'];
  $gameID = $_SESSION['gameID'];

  $sql =    " SELECT Username 
              FROM users AS u 
              INNER JOIN games AS g ON u.ID = g.StorytellerID 
              WHERE g.ID = '$gameID' 
              UNION 
              SELECT Username 
              FROM users AS u 
              INNER JOIN game_participants AS gp ON u.ID = gp.UserID 
              WHERE gp.GameID = '$gameID'";

  
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          $user = $row['Username'];
          if ($user == $_SESSION['username']) continue;
          echo "
              <div class='row py-1'>
                <div class='col-2'></div>
                <div class='col-8'>
                  <button type='button' class='btn btn-lg btn-warning btn-block border user' data-reciever='". $user ."'>". $user ."</button>
                </div>    
                <div class='col-2'></div>
              </div> 
          ";
      }
  } else {
    echo "
      <div class='row black py-1'>
          <div class='col'></div>
          <div class='col'>
              <h5 class='text-white text-center TNR'>ROOM IS CURRENTLY EMPTY</h4>
          </div>
          <div class='col'></div>
      </div>
      ";
  }
?>