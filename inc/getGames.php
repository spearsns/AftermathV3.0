<?php 
  	include("../inc/config.php");
  	session_start();

	$sql = 
	"SELECT DISTINCT ID, GameName, Description, PlayerPassword, Locked, StorytellerActive
	FROM games 
	WHERE Finished = '0' ";
	    
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $playerTarget = 'playerLogin.php?'. $row['GameName'];
      $reference = $row['ID'];

      if (empty($row['PlayerPassword'])){
        $playerTarget = 'characterSelect.php?' .$row['GameName'];
      }

      if ($row['Locked'] == 0 && $row['StorytellerActive'] == 0){
        echo "
        <div class='row black py-1'>
          <div class='col-2'>
            <button class='btn btn-success btn-lg btn-block border playBtn' data-target='". $playerTarget ."' 
            data-reference'". $reference ."'>PLAY</a>
          </div>

          <div class='col-3'>
            <div class='input-group input-group-lg'>
              <input type='text' class='form-control text-center border' value='". $row['GameName'] ."' readonly />
            </div>
          </div>

          <div class='col-5'>
            <div class='input-group input-group-lg'>
              <input type='text' class='form-control text-center border' value='". $row['Description'] ."' readonly />
            </div>
          </div>

          <div class='col-2'>
            <button class='btn btn-info btn-lg btn-block border tellBtn' data-target='storytellerLogin.php?". $row['GameName'] ."' 
            data-reference'". $reference ."'>TELL</a>
          </div>
        </div>
        ";
      } 

      if ($row['Locked'] == 0 && $row['StorytellerActive'] == 1) {
        echo "
        <div class='row black py-1'>
          <div class='col-2'>
            <button class='btn btn-success btn-lg btn-block border playBtn' data-target='". $playerTarget ."' 
            data-reference'". $reference ."'>PLAY</a>
          </div>

          <div class='col-3'>
            <div class='input-group input-group-lg'>
              <input type='text' class='form-control text-center border' value='". $row['GameName'] ."' readonly />
            </div>
          </div>

          <div class='col-5'>
            <div class='input-group input-group-lg'>
              <input type='text' class='form-control text-center border' value='". $row['Description'] ."' readonly />
            </div>
          </div>

          <div class='col-2'>
            <button class='btn btn-dark btn-lg btn-block border tellBtn' data-target='storytellerLogin.php?". $row['GameName'] ."' 
            data-reference'". $reference ."' disabled>TELL</a>
          </div>
        </div>
        ";
      } 

      if ($row['Locked'] == 1 && $row['StorytellerActive'] == 1) {
        echo "
        <div class='row black py-1'>
          <div class='col-2'>
            <button  class='btn btn-dark btn-lg btn-block border playBtn' data-target='". $playerTarget ."'
            data-reference'". $reference ."' disabled>PLAY</a>
          </div>

          <div class='col-3'>
            <div class='input-group input-group-lg'>
              <input type='text' class='form-control text-center border' value='". $row['GameName'] ."' readonly />
            </div>
          </div>

          <div class='col-5'>
            <div class='input-group input-group-lg'>
              <input type='text' class='form-control text-center border' value='". $row['Description'] ."' readonly />
            </div>
          </div>

          <div class='col-2'>
            <button  class='btn btn-dark btn-lg btn-block border tellBtn' data-target='storytellerLogin.php?". $row['GameName'] ."'
            data-reference'". $reference ."' disabled>TELL</a>
          </div>
        </div>
        ";
      }
    } 
  } else {
    echo "
    <div class='row black py-1'>
      <div class='col'></div>
      <div class='col'>
          <h5 class='text-white text-center TNR'>NO OPEN GAMES, BUILD ONE!</h4>
      </div>
      <div class='col'></div>
    </div>
    ";
  }
?>