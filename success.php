<?php
   include("inc/config.php");
  session_start();

?>
<!doctype html>
<html lang='en' dir='ltr'>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Success</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
  </head>

  <body>
    <div class="container-fluid">
    <?php include('header.php'); ?>

    <div class='row metal'>
      <div class='col'>
        <br />
        <br />
        <br />
      </div>
    </div>

    <div class="row black">
      <div class='col'></div>
      <div class='col text-center'>
        <h2 class='text-success TNR'>UPLOAD SUCCESSFUL</h2>
      </div>
      <div class='col'></div>
    </div>

    <div class="row black">
      <div class='col'></div>
      <div class='col text-center'>
        <p class='text-white TNR'>Do NOT hit back or refresh or you will feed the demons of data corruption!</p>
      </div>
      <div class='col'></div>
    </div>

    <div class="row black">
      <div class='col'></div>
      <div class='col'>
        <a href="index.php" role="button" class="btn btn-warning btn-lg btn-block border">RETURN HOME</a>
      </div>
      <div class='col'></div>
    </div>

    <?php include("footer.php"); ?>
  </body>
</html>