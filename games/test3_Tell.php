<?php
  include("../inc/config.php");
  session_start();

  if (isset($_SESSION['ID']) == false){
    header("Location: ../login.php");
  }

  $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
  $userID = $_SESSION['ID'];
  $gameName = $_SESSION['gameName'];
  $gameID = $_SESSION['gameID'];

  $participantsSQL = 
    "SELECT GameID, UserID, CharacterID, StorytellerActive 
    FROM game_participants AS GP
    INNER JOIN games AS G ON G.ID = GP.GameID 
    WHERE GameName = '$gameName' AND UserID = '$userID' AND CharacterID = ''
    ";

    $result1 = mysqli_query($conn, $participantsSQL) or die(mysqli_error($conn));

    if($result1->num_rows > 0) {
      $GPUpdateSQL =
        "UPDATE game_participants
        SET StorytellerActive = '1'
        WHERE GameID = '$gameID' AND UserID = '$userID' AND CharacterID = ''
        ";
    } else {
      $GPInsertSQL = 
        "INSERT INTO game_participants (GameID, UserID, StorytellerActive)
        VALUES ('$gameID', '$userID', 1)
        ";

      $result2 = $conn->query($GPInsertSQL) or die(mysqli_error($conn));
    }
?>

<!doctype html>
<html lang='en' dir='ltr'>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tell Template</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/styles.css" />

    <script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/game.js"></script>
    <script type="text/javascript">

      var name = "Storyteller";
  
      // kick off chat
      var chat =  new Chat();

      $(function() {
      
        chat.getState(); 
         
        // watch textarea for key presses
        $("#sendie").keydown(function(event) {  
             
          var key = event.which;  
           
          //all keys including return.  
          if (key >= 33) {
                   
            var maxLength = $(this).attr("maxlength");  
            var length = this.value.length;  
                     
            // don't allow new content if length is maxed out
            if (length >= maxLength) {  
              event.preventDefault();  
            }  
          }  
        });
        // watch textarea for release of key press
        $('#sendie').keyup(function(e) { 
                   
          	if (e.keyCode == 13) { 
            
            	var text = $(this).val();
            	var maxLength = $(this).attr("maxlength");  
            	var length = text.length; 
                     
	            // send 
	            if (length <= maxLength + 1) { 
	                     
	              chat.send(text, name);  
	              $(this).val("");
	                  
	            } else {
	                    
	              $(this).val(text.substring(0, maxLength)); 
	            }  
          	}
        });
      });
    </script>
  </head>

  	<body onload="setInterval('chat.update()', 1000)">
    	<div class="container-fluid black">
      		<?php 
          include('header.php'); 
          include('../modals/idMarksModal.php');
          include('../modals/characterSheetModal.php');
          ?>
          

	      <div class='row metal py-2'>
	        <div class='col'><img src='../img/graffiti/GameName.png' class='mx-auto d-block' /></div>
	        <div class='col'>
	          <div class="input-group input-group-lg">
	            <input type="text" id="gameName" class="form-control border text-center" value='<?php echo $gameName; ?>' readonly />
	          </div>
	        </div>
	        <div class='col'><img src='../img/graffiti/storyteller.png' class='mx-auto d-block' /></div>
	        <div class='col'>
	          <div class="input-group input-group-lg">
	            <input type="text" id="storytellerName" class="form-control border text-center" value='<?php echo $username; ?>' 
	              readonly />
	          </div>
	        </div>
	      </div>

	      <!--INTERFACE-->
      		<div class='row'>

	    		<div class='col-9 black px-0'>
		          
		          <div class='row'>
		            <div class='col'>
		            	<div id="chat-area"></div>
		            </div>
		          </div>

		          <div class='row'>
		            <div class='col'>
		              <form id="send-message-area">
		                <textarea id="sendie" maxlength='100' class='w-100' ></textarea>            
		              </form>
		            </div>
		          </div>

		        </div>
		        
		        <div class='col-3 brass'>
			        <div class='row'>
			          <div class='col'>
			            <br />
			            <button class="btn btn-warning btn-lg btn-block border" id='percentileBtn' type="button">PERCENTILE (%)</button>
			          </div>
			        </div>
			        <div class='row'>
			          <div class='col'>
			            <br />
			            <button class="btn btn-warning btn-lg btn-block border" id='twoD10Btn' type="button">TWO D10 (2D10)</button>
			          </div>
			        </div>
			        <div class='row'>
			          <div class='col'>
			            <br />
			            <button class="btn btn-danger btn-lg btn-block border" id='randomHitBtn' type="button">RANDOM HIT</button>
			          </div>
			        </div>
			        <br>
			        <br>
			        <div class='row'>
			          <div class='col'>
			            <br />
			            <button class="btn btn-secondary btn-lg btn-block border" id='randomHitBtn' type="button">ADMIN OPTIONS</button>
			            <br />
			          </div>
			        </div>
		     	</div>
		 	</div>


		    <div class='row metal py-2'>
		      <div class='col'><img src='../img/graffiti/notesX.png' class='mx-auto d-block' /></div>
		    </div>

		    <div class='row'>
		      <div class='col px-0'>
		        <textarea class='w-100'></textarea>
		      </div>
		    </div>

        	<div class='row metal pt-0'>
        		<div class='col px-0'><img src='../img/graffiti/playerX.png' class='mx-auto d-block' /></div>
        		<div class='col px-0'><img src='../img/graffiti/characterX.png' class='mx-auto d-block' /></div>
        		<div class='col px-0'><img src='../img/graffiti/charSheet.png' class='mx-auto d-block' /></div>
        		<div class='col px-0'><img src='../img/graffiti/idMarks.png' class='mx-auto d-block' /></div>
        		<div class='col px-0'><img src='../img/graffiti/experienceX.png' class='mx-auto d-block' /></div>
        		<div class='col px-0'></div>
        	</div>

        	<?php
            $sql = 
            "SELECT Username, CharacterName
            FROM characters AS C 
            INNER JOIN game_participants AS GP ON C.UserID = GP.UserID
            INNER JOIN users AS U ON GP.UserID = U.ID
            WHERE GameID = '$gameID' AND PlayerActive = '1' ";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  $i = 0;
                    while($row = $result->fetch_assoc()) {
                      $player = $row['Username'];
                      $character = $row['CharacterName'];
                      $i++;

                      echo "
                        <div class='row black py-1'>
                          <div class='col'>
                            <div class='input-group input-group-lg'>
                              <input type='text' class='form-control border text-center' id='player". $i ."' value='$player' readonly />
                            </div>
                          </div>
                          <div class='col'>
                            <div class='input-group input-group-lg'>
                              <input type='text' class='form-control border text-center' id='character". $i ."' value='$character' readonly />
                            </div>
                          </div>
                          <div class='col'>
                              <button class='btn btn-warning btn-lg btn-block border charSheetBtn' data-reference='$i' type='button'>VIEW</button>
                          </div>
                          <div class='col'>
                            <button class='btn btn-info btn-lg btn-block border idMarksBtn' data-reference='$i' type='button'>ID MARKS</button>  
                          </div>
                          <div class='col'>
                            <div class='input-group input-group-lg'>
                              <input type='text' class='form-control border text-center' id='earnedExp". $i ."' placeholder='Earned EXP' />
                            </div>  
                          </div>
                          <div class='col'>
                            <button class='btn btn-success btn-lg btn-block border awardExpBtn' data-reference='$i' type='button'>AWARD EXP</button>  
                          </div>
                        </div> 
                      ";

                    }

                } else {
                  echo "
                    <div class='row black py-1'>
                        <div class='col'></div>
                        <div class='col'>
                            <h5 class='text-white text-center TNR'>NOBODY'S HERE YET</h4>
                        </div>
                        <div class='col'></div>
                    </div>
                    ";
                }
          ?>
          
	        <?php include('footer.php'); ?>
        </div>


	</body>
</html>