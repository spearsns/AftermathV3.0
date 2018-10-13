<?php
  include("inc/config.php");
  session_start();
  if(isset($_POST['submit'])){
      $password = $_POST['password'];
      $gameName = $_POST['gameName'];
  }
  if (isset($_SESSION['ID']) == false){
        header("Location: login.php");
    } 

  $username = $_SESSION['username'];
  $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
  $game = parse_url($url, PHP_URL_QUERY);
  $gameName = rawurldecode($game); 
  $_SESSION['gameName'] = $gameName;
?>

<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Player Login</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/styles.css" />

    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
  </head>
  <body>

    <div class="container-fluid">
      <?php include("inc/header.php"); ?>

      <form id="playerLogin" method="post" action="inc/processPlayer.php">
        
        <div class="row metal">
          <div class="col">
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

        <div class='row black'>
          <div class='col'></div>
          <div class='col'><img src="img/graffiti/GameName.png" /></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" name="gameName" class="form-control border text-center" value='<?php echo $gameName; ?>' readonly />
            </div>
          </div>
          <div class='col'></div>
        </div>

        <div class='row black'>
          <div class='col'></div>
          <div class='col'><img src="img/graffiti/password.png" /></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="password" name="password" class="form-control border text-center" placeholder="Enter Password" required />
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
    </div>
    <?php include("inc/footer.php"); ?>
  </body>
</html>