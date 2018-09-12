<?php
	include('inc/config.php');
	session_start();
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
      <script type="text/javascript" src="js/main.js"></script>
  	</head>
	
	<body>
		<div class="container-fluid">
  		<?php include('inc/header.php'); ?>

  		<div class='row metal'>
  			<div class='col'>
  				<button type="button" class="btn btn-warning btn-lg btn-block border">FIRST TIME?</button>
  			</div>

  			<div class='col'>
  				<a href='newCharacter.php' role='button' class="btn btn-warning btn-lg btn-block border">NEW CHARACTER</a>
  			</div>

  			<div class='col'>
  				<a href='characterSelect.php' role='button' class="btn btn-warning btn-lg btn-block border">CHARACTER MGMT</a>
  			</div>
  		</div>

  		<div class='row metal'>
        <div class='col-2'>
          <button type='button' class='btn btn-danger btn-lg btn-block border'>NEW GAME</button>
        </div>

        <div class='col-2'>
          <img src='img/graffiti/gamesX.png'>
        </div>

        <div class='col-4'>
          <img src='img/graffiti/description.png' class='mx-auto d-block'>
        </div>

        <div class='col-2'></div>

        <div class='col-2'>
          <img src='img/graffiti/onlineX.png'>
        </div>
  		</div>

      <div class='row black'>
        <div class='col-2'>
          <button type='button' class='btn btn-success btn-lg btn-block border'>PLAY</button>
        </div>

        <div class='col-2'>
          <div class="input-group input-group-lg">
            <input type="text" class="form-control border" placeholder='Game Name' id='gameNameArea' readonly>
          </div>
        </div>

        <div class='col-4'>
          <div class="input-group input-group-lg">
            <input type="text" class="form-control border" placeholder='Description' id='descriptionArea' readonly>
          </div>
        </div>

        <div class='col-2'>
          <button type='button' class='btn btn-info btn-lg btn-block border'>TELL</button>
        </div>

        <div class='col-2'>
          <button type='button' class='btn btn-primary btn-lg btn-block border'>USERS</button>
        </div>

        <div class='col-1'></div>
      </div>

      <?php include('inc/footer.php'); ?>
    </div>   
  </body>
</html>