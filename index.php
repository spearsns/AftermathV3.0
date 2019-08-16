<?php
	include('inc/config.php');
	session_start();

  if(isset($_SESSION['gameID'])){

    $ID = $_SESSION['ID'];
    $gameID = $_SESSION['gameID'];
     
    $GPUpdateSQL =
      "UPDATE game_participants
      SET PlayerActive = 0
      WHERE GameID = '$gameID' AND UserID = '$ID'
      ";

    $result1 = mysqli_query($conn, $GPUpdateSQL) or die(mysqli_error($conn));

    $gamesUpdateSQL =
      "UPDATE games
      SET StorytellerActive = 0,
          Locked = 0
      WHERE ID = '$gameID' AND StorytellerID = '$ID'
      ";

    $result2 = mysqli_query($conn, $gamesUpdateSQL) or die(mysqli_error($conn));
  }
  
    unset($_SESSION['gameID']);
    unset($_SESSION['gameName']);
?>

<!doctype html>
<html lang='en' dir='ltr'>
  	<head>
    	<meta charset="utf-8">
    	<meta http-equiv="x-ua-compatible" content="ie=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    	<title>Welcome to the Aftermath</title>
	    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    	<link rel="stylesheet" type="text/css" href="css/styles.css" />

      <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
      <script type="text/javascript" src="js/bootstrap.min.js"></script>
      <script type="text/javascript" src="js/home.js"></script>
  	</head>

	<body class='px-0'>
		<div class="container-fluid black" id='contentWrap'>
  		<?php 
        include('header.php');
        include('modals/adminModal.php');
        include('modals/adminLoginModal.php');
        include('modals/confirmationModal.php');
        include('modals/onlineModal.php');
        include('modals/descriptionModal.php');
      ?>

      <div class='row metal border-bottom-0 py-2'>

  			<div class='col-12 col-sm-6 col-md-3 order-1 order-md-1 py-1'>
  				<a href='newCharacter.php' role='button' class="btn btn-warning btn-lg btn-block border px-0">NEW CHARACTER</a>
  			</div>

        <div class='col-12 col-sm-6 col-md-3 order-3 order-md-2 py-1'>
          <a href='apocalypse.php' role='button' class='btn btn-dark btn-lg btn-block border px-0'>THE APOCALYPSE</a>
        </div>

        <div class='col-12 col-sm-6 col-md-3 order-4 order-md-3 py-1'>
          <a href='info.php' role="button" class="btn btn-dark btn-lg btn-block border px-0">USER MANUAL</a>
        </div>
        
  			<div class='col-12 col-sm-6 col-md-3 order-2 order-md-4 py-1'>
  				<a href='characterSelect.php' role='button' class="btn btn-warning btn-lg btn-block border px-0">CHARACTER MGMT</a>
  			</div>

  		</div>

      <div class='row metal border-top-0 py-2'>

        <div class='col-12 order-1 col-sm-6 col-md-2 py-1'>
          <button type="button" class="btn btn-light btn-lg btn-block border px-0" id='onlineBtn'>ONLINE</button>
        </div>

        <div class='col-12 order-3 col-md-3 order-md-2 py-1 d-none d-md-block'>
          <img src='img/graffiti/gamesX.png' class='img-fluid h-100 mx-auto d-block' />
        </div>

        <div class='col-12 order-4 col-md-2 order-md-3 py-1 d-none d-md-block'>
          <img src='img/graffiti/description.png' class='img-fluid h-100 mx-auto d-block' />
        </div>

        <div class='col-12 order-5 col-md-1 order-md-4 py-1 d-none d-md-block'>
          <img src='img/graffiti/pop.png' class='img-fluid h-100 mx-auto d-block' />
        </div>

        <div class='col-12 order-2 col-sm-6 col-md-2 order-md-5 offset-md-2 py-1'>
          <a href='newGame.php' role='button' class="btn btn-danger btn-lg btn-block border px-0">NEW GAME</a>
        </div>

      </div>

      <div id='gameList'></div>
      
      <script src='js/instantMessage.js'></script>
      <script src='node_modules/socket.io-client/dist/socket.io.js'></script>
      <?php include('footer.php'); ?>
    </div> 
  </body>
</html>