<?php
  include("inc/config.php");
  session_start();

  if(isset($_SESSION['ID']) == false){
    header("Location: login.php");
  } 

  $userID = $_SESSION['ID'];
?>

<!doctype html>
<html lang='en' dir='ltr'>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Create New Game</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
  </head>

  <body>
    <div class="container-fluid">
      <?php include('inc/header.php'); ?>

      <div class='row metal'>
        <div class='col'>
          <br />
          <br />
          <br />
        </div>
      </div>

      <div class='row black'>
        <div class='col'>
          <br />
        </div>
      </div>

      <form id="newGame" method="post" action="inc/processNewGame.php">

      <div class='row black'>
        <div class='col'></div>
        <div class='col'><img src="img/graffiti/GameName.png" /></div>
        <div class='col-4'>
          <div class="input-group input-group-lg">
            <input type="text" name="name" class="form-control border" placeholder="Enter the Game's Name" required />
          </div>
        </div>
        <div class='col'></div>
      </div>

      <div class='row black'>
        <div class='col'></div>
        <div class='col'><img src="img/graffiti/description1.png" /></div>
        <div class='col-4'>
          <div class="input-group input-group-lg">
            <textarea rows="4" name="description" class="form-control border" placeholder="Enter a Brief Description" required></textarea>
          </div>
        </div>
        <div class='col'></div>
      </div>

      <div class='row black'>
        <div class='col'></div>
        <div class='col'><img src="img/graffiti/StorytellerPassword.png" /></div>
        <div class='col-4'>
          <div class="input-group input-group-lg">
            <input type="password" name="storytellerPassword" class="form-control border" placeholder="Enter Storyteller Password" required />
          </div>
        </div>
        <div class='col'></div>
      </div>

      <div class='row black'>
        <div class='col'></div>
        <div class='col'><img src="img/graffiti/STConfirmPassword.png" /></div>
        <div class='col-4'>
          <div class="input-group input-group-lg">
            <input type="password" name="storytellerPWConfirm" class="form-control border" placeholder="Confirm Password" required />
          </div>
        </div>
        <div class='col'></div>
      </div>

      <div class='row black'>
        <div class='col'></div>
        <div class='col'><img src="img/graffiti/playerPassword.png" /></div>
        <div class='col-4'>
          <div class="input-group input-group-lg">
            <input type="password" name="playerPassword" class="form-control border" placeholder="Enter Player Password" />
          </div>
        </div>
        <div class='col'></div>
      </div>

      <div class='row black'>
        <div class='col'></div>
        <div class='col'><img src="img/graffiti/PConfirmPassword.png" /></div>
        <div class='col-4'>
          <div class="input-group input-group-lg">
            <input type="password" name="playerPWConfirm" class="form-control border" placeholder="Confirm Password" />
          </div>
        </div>
        <div class='col'></div>
      </div>

      <div class='row black'>
        <div class='col'>
          <br />
        </div>
      </div>

      <div class='row black'>
        <div class='col'></div>
        <div class='col'>
          <div class="input-group input-group-lg">
            <button type='submit' class='btn btn-success btn-lg btn-block border'>SUBMIT</button>
          </div>
        </div>
        <div class='col'></div>
      </div>

      </form>

      <div class="row black">
        <div class='col'></div>
        <div class="col text-center">
          <br />
          <?php
            $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
            if (strpos($url, 'error=name')) {
              echo '<p class="text-danger">GAME NAME ALREADY TAKEN</p>';
            } elseif (strpos($url, 'error=storytellerPW')){
              echo '<p class="text-danger">STORYTELLER PASSWORDS DO NOT MATCH</p>';
            } elseif (strpos($url, 'error=playerPW')){
              echo '<p class="text-danger">PLAYER PASSWORDS DO NOT MATCH</p>';
            }
          ?>
        </div>
        <div class='col'></div>  
      </div>

      <?php include('inc/footer.php'); ?>
    </div>   
  </body>

  <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/main.js"></script>
</html>