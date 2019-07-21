<?php 
  	include("../inc/config.php");
  	session_start();

  	$gameName = $_SESSION['gameName'];
  	$gameID = $_SESSION['gameID'];

  	$sql =  "SELECT DISTINCT Username, CharacterName, CharacterID
            FROM characters AS C 
            INNER JOIN game_participants AS GP ON C.UserID = GP.UserID AND C.ID = GP.CharacterID
            INNER JOIN users AS U ON GP.UserID = U.ID
            WHERE GameID = '$gameID' AND PlayerActive = '1' ";
                
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
	        $player = $row['Username'];
	        $character = $row['CharacterName'];
	        $characterID = $row['CharacterID'];

	        $target = '$(this).data("reference")';
	        
	        echo "
	            <div class='row black py-1'>
	              <div class='col-12 col-sm-6 col-lg-2'>
	                <div class='input-group input-group-lg'>
	                  <input type='text' class='form-control border text-center' value='$player' readonly />
	                </div>
	              </div>
	              <div class='col-12 col-sm-6 col-lg-2'>
	                <div class='input-group input-group-lg'>
	                  <input type='text' class='form-control border text-center' value='$character' readonly />
	                </div>
	              </div>
	              <div class='col-12 col-sm-6 col-lg-2'>
	                  <button class='btn btn-warning btn-lg btn-block border charSheetBtn' data-reference='$characterID' 
	                  	type='button' onclick='characterID = ". $target ."; '>SHEET</button>
	              </div>
	              <div class='col-12 col-sm-6 col-lg-2'>
	                <button class='btn btn-info btn-lg btn-block border idMarksBtn' data-reference='$characterID' type='button' 
	                	onclick='characterID = ". $target ."; '>ID MARKS</button>  
	              </div>
	              <div class='col-12 col-sm-6 col-lg-2'>
	                <div class='input-group input-group-lg'>
	                  <input type='text' class='form-control border text-center earnedExp' data-reference='$characterID' 
	                  	placeholder='Earned EXP' />
	                </div>  
	              </div>
	              <div class='col-12 col-sm-6 col-lg-2'>
	                <button class='btn btn-success btn-lg btn-block border awardExpBtn' data-reference='$characterID' 
	                	type='button'>AWARD EXP</button>  
	              </div>
	            </div>
        		<hr class='hr-white my-0 d-block d-lg-none' /> 
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