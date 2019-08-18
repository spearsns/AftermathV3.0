<?php 
  include("../inc/config.php");
  session_start();

	$sql = 
	"SELECT DISTINCT ID, GameName, Description, PlayerPassword, Locked, StorytellerActive	FROM games";
	    
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $playerTarget = 'playerLogin.php?'. $row['GameName'];
      $reference = $row['ID'];

      $sql2 = "SELECT COUNT(PlayerActive) FROM game_participants WHERE GameID = " . $reference . " AND PlayerActive = 1";
      $result2 = mysqli_query($conn, $sql2);
      $active = mysqli_fetch_array($result2);
      $activePlayers = $active[0];
      
      if ($row['Locked'] == 0 && $row['StorytellerActive'] == 0){
        echo "
        <div class='row black py-1'>
          <div class='col-5 order-3 col-md-2 order-md-1'>
            <button class='btn btn-success btn-lg btn-block border playBtn py-2 my-1' data-target='". $playerTarget ."' data-reference='". $reference ."'>PLAY</a>
          </div>

          <div class='col-12 order-1 col-md-3 order-md-2'>
            <div class='input-group input-group-lg'>
              <input type='text' class='form-control text-center border px-0' value='". $row['GameName'] ."' readonly />
            </div>
          </div>

          <div class='col-12 order-2 col-md-2 order-md-3'>
            <div class='input-group input-group-lg'>
              <button class='btn btn-light btn-lg btn-block border descriptionBtn my-1' data-reference='". $reference ."'>DETAILS</a>
            </div>
          </div>

          <div class='col-2 order-4 col-md-1 order-md-4'>
            <div class='input-group input-group-lg'>
              <input type='text' class='form-control text-center border px-0' value='". $activePlayers ."' readonly />
            </div>
          </div>

          <div class='col-5 order-5 col-md-2 order-md-5'>
            <button class='btn btn-info btn-lg btn-block border tellBtn my-1' data-target='storytellerLogin.php?". $row['GameName'] ."' data-reference='". $reference ."'>TELL</a>
          </div>

          <div class='col-12 order-6 col-md-2 order-md-6'>
            <button class='btn btn-secondary btn-lg btn-block border adminBtn my-1' data-target='". $row['GameName'] ."' data-reference='". $reference ."'>ADMIN</a>
          </div>
        </div>
        <hr class='hr-white my-0 d-block d-md-none' />
        ";
      } 

      if ($row['Locked'] == 0 && $row['StorytellerActive'] == 1) {
        echo "
        <div class='row black py-1'>
          <div class='col-5 order-3 col-md-2 order-md-1'>
            <button class='btn btn-success btn-lg btn-block border my-1 playBtn' data-target='". $playerTarget ."' data-reference='". $reference ."'>PLAY</a>
          </div>

          <div class='col-12 order-1 col-md-3 order-md-2'>
            <div class='input-group input-group-lg'>
              <input type='text' class='form-control text-center border px-0' value='". $row['GameName'] ."' readonly />
            </div>
          </div>

          <div class='col-12 order-2 col-md-2 order-md-3'>
            <div class='input-group input-group-lg'>
              <button class='btn btn-light btn-lg btn-block border my-1 descriptionBtn' data-reference='". $reference ."'>INFO</a>
            </div>
          </div>

          <div class='col-2 order-4 col-md-1 order-md-4'>
            <div class='input-group input-group-lg'>
              <input type='text' class='form-control text-center border px-0' value='". $activePlayers ."' readonly />
            </div>
          </div>

          <div class='col-5 order-5 col-md-2 order-md-5'>
            <button class='btn btn-dark btn-lg btn-block border my-1 tellBtn' data-target='storytellerLogin.php?". $row['GameName'] ."' data-reference='". $reference ."' disabled>TELL</a>
          </div>

          <div class='col-12 order-6 col-md-2 order-md-6'>
            <button class='btn btn-dark btn-lg btn-block border my-1 adminBtn' data-target='". $row['GameName'] ."' data-reference='". $reference ."' disabled>ADMIN</a>
          </div>
        </div>
        <hr class='hr-white my-0 d-block d-md-none' />
        ";
      } 

      if ($row['Locked'] == 1 && $row['StorytellerActive'] == 1) {
        echo "        
        <div class='row black py-1'>
          <div class='col-5 order-4 col-md-2 order-md-1'>
            <button  class='btn btn-dark btn-lg btn-block border playBtn my-1' data-target='". $playerTarget ."' data-reference='". $reference ."' disabled>PLAY</a>
          </div>

          <div class='col-12 order-1 col-md-3 order-md-2'>
            <div class='input-group input-group-lg'>
              <input type='text' class='form-control text-center border px-0' value='". $row['GameName'] ."' readonly />
            </div>
          </div>

          <div class='col-12 order-2 col-md-2 order-md-3'>
            <div class='input-group input-group-lg'>
              <button class='btn btn-light btn-lg btn-block border my-1 descriptionBtn' data-reference='". $reference ."'>INFO</a>
            </div>
          </div>

          <div class='col-2 order-4 col-md-1 order-md-4'>
            <div class='input-group input-group-lg'>
              <input type='text' class='form-control text-center border px-0' value='". $activePlayers ."' readonly />
            </div>
          </div>

          <div class='col-5 order-5 col-md-2 order-md-5'>
            <button  class='btn btn-dark btn-lg btn-block border tellBtn my-1' data-target='storytellerLogin.php?". $row['GameName'] ."' data-reference='". $reference ."' disabled>TELL</a>
          </div>

          <div class='col-12 order-6 col-md-2 order-md-6'>
            <button class='btn btn-dark btn-lg btn-block border adminBtn my-1' data-target='". $row['GameName'] ."' data-reference='". $reference ."' disabled>ADMIN</a>
          </div>
        </div>
        <hr class='hr-white my-0 d-block d-md-none' />
        ";
      }
    } 
  } else {
    echo "
    <div class='row black py-1'>
      <div class='col'></div>
      <div class='col'>
          <h5 class='text-center' style='color: white;'><strong>NO OPEN GAMES AT THE MOMENT, GO AHEAD AND BUILD ONE!</strong></h4>
      </div>
      <div class='col'></div>
    </div>
    ";
  }
?>