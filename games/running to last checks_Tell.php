<?php
  include("../inc/config.php");
  session_start();

  if (isset($_SESSION['ID']) == false){
    header("Location: ../login.php");
  }

  $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
  $username = $_SESSION['username'];
  $userID = $_SESSION['ID'];
  $gameName = $_SESSION['gameName'];
  $gameID = $_SESSION['gameID'];

  $gameUpdateSQL =
    "UPDATE games
    SET StorytellerActive = 1,
        StorytellerID = '$userID'
    WHERE ID = '$gameID'
    ";

  $result2 = $conn->query($gameUpdateSQL) or die(mysqli_error($conn));
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

      var name = "<?php echo $username; ?> [ Storyteller ]";
  
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
	        include($_SERVER['DOCUMENT_ROOT'] . '/aftermath/header.php');
	        include('../modals/idMarksModal.php');
	        include('../modals/characterSheetModal.php');
	        include('../modals/adminModal.php'); 
	        include('../modals/confirmCloseModal.php'); 
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
	          <input type="text" id="storytellerName" class="form-control border text-center" value='' readonly />
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
		          <button class="btn btn-secondary btn-lg btn-block border" id='adminBtn' data-reference='<?php echo $gameID ?>' type="button">ADMIN OPTIONS</button>
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

      <div id='interface' class='interface'></div>

      <?php include($_SERVER['DOCUMENT_ROOT'] . '/aftermath/footer.php'); ?>

    </div> <!--END CONTAINER-->
	</body>
</html>