<?php
	include('inc/config.php');
	session_start();

  if(isset($_SESSION['gameID'])){

    $ID = $_SESSION['ID'];
    $gameID = $_SESSION['gameID'];
     
    $GPUpdateSQL =
      "UPDATE game_participants
      SET StorytellerActive = 0, PlayerActive = 0
      WHERE GameID = '$gameID' AND UserID = '$ID'
      ";

    $result2 = mysqli_query($conn, $GPUpdateSQL) or die(mysqli_error($conn));
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
      <script type="text/javascript" src="js/main.js"></script>
  	</head>
	
	<body>
		<div class="container-fluid">
  		<?php include('inc/header.php'); ?>

      <div class='row metal border-bottom-0 py-1'>

  			<div class='col-3'>
  				<a href='newCharacter.php' role='button' class="btn btn-warning btn-lg btn-block border">NEW CHARACTER</a>
  			</div>

        <div class='col-6'>
          <button type="button" class="btn btn-white btn-lg btn-block border">FIRST TIME?</button>
        </div>

  			<div class='col-3'>
  				<a href='characterSelect.php' role='button' class="btn btn-warning btn-lg btn-block border">CHARACTER MGMT</a>
  			</div>

  		</div>

      <div class='row'>
        <div class='col-10'>
      		<div class='row metal border-top-0 py-1'>
            <div class='col-2'>
              <a href='newGame.php' role='button' class="btn btn-danger btn-lg btn-block border">NEW GAME</a>
            </div>

            <div class='col-3'>
              <img src='img/graffiti/gamesX.png'>
            </div>

            <div class='col-5'>
              <img src='img/graffiti/description.png' class='mx-auto d-block'>
            </div>

            <div class='col-2'></div>
          </div>

          <!--GAME LIST-->
          <?php
            $sql = 
            "SELECT GameName, Description, PlayerPassword
            FROM games 
            WHERE Finished = '0' AND Open = '1' ";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                      $playerTarget = 'playerLogin.php?'. $row['GameName'];
                      if (empty($row['PlayerPassword'])){
                        $playerTarget = 'characterSelect.php?' .$row['GameName'];
                      }

                    echo "
                        <div class='row black py-1'>
                          <div class='col-2'>
                            <a href='". $playerTarget ."' role='button' class='btn btn-success btn-lg btn-block border'>PLAY</a>
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
                            <a href='storytellerLogin.php?". $row['GameName'] ."' role='button' class='btn btn-info btn-lg btn-block border'>TELL</a>
                          </div>
                        </div>
                        ";
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
          </div>

          <div class='col-2 brass'>
            <img src='img/graffiti/onlineX.png'>
          </div>
    		</div>

      </div>

      <?php include('inc/footer.php'); ?>
    </div>   
  </body>
</html>