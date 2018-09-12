<?php
    include("inc/config.php");
    session_start();

    if (isset($_SESSION['ID']) == false){
        header("Location: login.php");
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

        <?php include("inc/header.php"); ?>
        <div class="container-fluid">

            <div class="row metal">
                <div class='col'></div>
                <div class="col"><h4 class='text-danger text-center pt-2 TNR'>PLEASE SELECT CHARACTER:</h4></div>
                <div class='col'></div>
            </div>

            <?php
                $sql = "SELECT CharacterName FROM characters WHERE UserID = '$userID' AND Deceased = '0' ";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    echo "
                        <div class='row black'>
                            <div class='col'></div>
                            <div class='col'>
                                <a href='characterManagement.php?". $row['CharacterName'] ."' role='button' class='btn btn-warning btn-lg btn-block border'>
                                    ". $row['CharacterName'] ."</a>
                            </div>
                            <div class='col'></div>
                        </div>";
                    }
                } else {
                echo "0 results";
                }
            ?>
            <?php include("inc/footer.php"); ?>
        </div>
    </body>
</html>