<?php
    include("inc/config.php");
    session_start();
  
    $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    $game = parse_url($url, PHP_URL_QUERY);
    $gameName = rawurldecode($game); 
    $_SESSION['gameName'] = $gameName;

    $character = null;

    if (isset($_SESSION['ID']) == false){
        header("Location: login.php");
    }

    if (isset($game) == true){
        $target = 'games/'. $_SESSION['gameName'] .'_Play.php?';
    } else {
        $target = 'characterManagement.php?';
    } 

    $userID = $_SESSION['ID'];
?>

<!doctype html>
<html class="no-js" lang="en" dir="ltr">
    <head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Character Select</title>
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
      <link rel="stylesheet" type="text/css" href="css/styles.css" />

      <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
      <script type="text/javascript" src="js/bootstrap.min.js"></script>
    </head>
    <body>

        <?php include("header.php"); ?>

        <div class="container-fluid black">

            <div class='row metal'>
                <div class='col py-2'>
                  <img src='img/graffiti/characterChoice.png' class='img-fluid h-100 mx-auto d-block' />
                </div>
            </div>

            <div id='characterList'>
            <?php
                $sql = "SELECT CharacterName FROM characters WHERE UserID = '$userID' AND Deceased = '0' ";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    echo "
                        <div class='row black'>
                            <div class='col-sm'></div>
                            <div class='col py-1'>
                                <a href='". $target . $row['CharacterName'] ."' role='button' class='btn btn-warning btn-lg btn-block border'>
                                    ". $row['CharacterName'] ."</a>
                            </div>
                            <div class='col-sm'></div>
                        </div>";
                    }
                } else {
                echo "
                    <div class='row black'>
                        <div class='col-sm'></div>
                        <div class='col py-1'>
                            <h4 class='text-white text-center TNR'>Zero Results:<br />You have to build a character first!</h4>
                        </div>
                        <div class='col-sm'></div>
                    </div>
                    ";
                }
            ?>
            </div>

            <?php include("footer.php"); ?>
        </div>
    </body>
</html>