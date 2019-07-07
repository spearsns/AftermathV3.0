<?php
    include("inc/config.php");
    session_start();

    if (isset($_SESSION['ID']) == false){
        header("Location: login.php?charCreate");
    } 
?>

<!doctype html>
<html lang='en' dir='ltr'>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>New Character</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/styles.css" />

    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/newCharacter.js"></script>
  </head>

  <body>
    <div class="container-fluid">
      <?php include('header.php'); ?>
      
      <div class='row metal'>
        <div class='col-md'></div>
        <div class='col'><img src='img/graffiti/refresh.png' class='img-fluid h-100 mx-auto d-block'></div>
        <div class='col-md'></div>
      </div>

      <form id="newCharacter" method="post" action="inc/processNewCharacter.php">

        <div class='row black'>
          <div class='col-12 col-sm-6 col-md'><h4 class='text-white text-center pt-2'>ETHNICITY:</h4></div>
          <div class='col-12 col-sm-6 col-md'>
            <div class="input-group input-group-lg">
              <input type="text" id="ethnicity" name="ethnicity" class="form-control border text-center" readonly />
            </div>
          </div>
          <div class='col-12 col-sm-6 col-md'><h4 class='text-white text-center pt-2'>AGE:</h4></div>
          <div class='col-12 col-sm-6 col-md'>
            <div class="input-group input-group-lg">
              <input type="text" id="age" name="age" class="form-control border text-center" readonly />
            </div>
          </div>
        </div>
        
        <div class='row black'>
          <div class='col-12 col-sm-6 col-md'><h4 class='text-white text-center pt-2'>BACKGROUND:</h4></div>
          <div class='col-12 col-sm-6 col-md'>
            <div class="input-group input-group-lg">
              <input type="text" id="background" name="background" class="form-control border text-center" readonly />
            </div>
          </div>
          <div class='col-12 col-sm-6 col-md'><h4 class='text-white text-center pt-2'>SEX:</h4></div>
          <div class='col-12 col-sm-6 col-md'>
            <div class="btn-group btn-group-toggle d-flex" role="group" data-toggle="buttons">
              <label class="btn btn-lg btn-warning border w-100">
                <input type="radio" name="sex" value="Male">MALE</input>
              </label>
              <label class="btn btn-lg btn-warning border w-100">
                <input type="radio" name="sex" value="Female">FEMALE</input>
              </label>
            </div>
          </div>
        </div>

        <div class='row metal'>
          <div class='col'><h4 class='text-center pt-2'><strong>MENTAL TRAITS</strong></h4></div>
        </div>

        <div class='row justify-content-center'>
          <div class='col-6 col-sm-4 col-lg-2 py-1'><h4 class='text-center pt-2' id='memTxt'>MEMORY:</h4></div>
          <div class='col-6 col-sm-4 col-lg-2 py-1'><img src='img/symbols/mem.png' class='img-fluid h-100 mx-auto d-block trait-img py-1'></div>
          <div class='col-12 col-sm-4 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decTrait" data-trait='memory' type="button"> - </button>
              </div>
              <input type="text" id="memory" name="memory" class="form-control border text-center" readonly />
              <div class="input-group-append">
                <button class="btn btn-warning border incTrait" data-trait='memory' type="button"> + </button>
              </div>
            </div>
          </div>
          <div class='col-6 col-sm-4 col-lg-2 py-1'><h4 class='text-center pt-2' id='memTxt'>LOGIC:</h4></div>
          <div class='col-6 col-sm-4 col-lg-2 py-1'><img src='img/symbols/log.png' class='img-fluid h-100 mx-auto d-block trait-img py-1'></div>
          <div class='col-12 col-sm-4 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decTrait" data-trait='logic' type="button"> - </button>
              </div>
              <input type="text" id="logic" name="logic" class="form-control border text-center" readonly />
              <div class="input-group-append">
                <button class="btn btn-warning border incTrait" data-trait='logic' type="button"> + </button>
              </div>
            </div>
          </div>
        </div>

        <div class='row'>
          <div class='col-6 col-sm-4 col-lg-2 py-1'><h4 class='text-center pt-2'>PERCEPTION:</h4></div>
          <div class='col-6 col-sm-4 col-lg-2 py-1'><img src='img/symbols/per.png' class='img-fluid h-100 mx-auto d-block trait-img py-1'></div>
          <div class='col-12 col-sm-4 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decTrait" data-trait='perception' type="button"> - </button>
              </div>
              <input type="text" id="perception" name="perception" class="form-control border text-center" readonly />
              <div class="input-group-append">
                <button class="btn btn-warning border incTrait" data-trait='perception' type="button"> + </button>
              </div>
            </div>
          </div>
          <div class='col-6 col-sm-4 col-lg-2 py-1'><h4 class='text-center pt-2'>WILLPOWER:</h4></div>
          <div class='col-6 col-sm-4 col-lg-2 py-1'><img src='img/symbols/will.png' class='img-fluid h-100 mx-auto d-block trait-img py-1'></div>
          <div class='col-12 col-sm-4 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decTrait" data-trait='willpower' type="button"> - </button>
              </div>
              <input type="text" id="willpower" name="willpower" class="form-control border text-center" readonly />
              <div class="input-group-append">
                <button class="btn btn-warning border incTrait" data-trait='willpower' type="button"> + </button>
              </div>
            </div>
          </div>
        </div>

        <div class='row'>
          <div class='col-6 col-sm-4 col-lg-2 py-1'><h4 class='text-center pt-2'>CHARISMA:</h4></div>
          <div class='col-6 col-sm-4 col-lg-2 py-1'><img src='img/symbols/cha.png' class='img-fluid h-100 mx-auto d-block trait-img py-1'></div>
          <div class='col-12 col-sm-4 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decTrait" data-trait='charisma' type="button"> - </button>
              </div>
              <input type="text" id="charisma" name="charisma" class="form-control border text-center" readonly />
              <div class="input-group-append">
                <button class="btn btn-warning border incTrait" data-trait='charisma' type="button"> + </button>
              </div>
            </div>
          </div>
          <div class='col-lg-6'></div>
        </div>

        <div class='row metal'>
          <div class='col'><h4 class='text-center pt-2'><strong>PHYSICAL TRAITS</strong></h4></div> 
        </div>

        <div class='row'>
          <div class='col-6 col-sm-4 col-lg-2 py-1'><h4 class='text-center pt-2'>STRENGTH:</h4></div>
          <div class='col-6 col-sm-4 col-lg-2 py-1'><img src='img/symbols/str.png' class='img-fluid h-100 mx-auto d-block trait-img py-1'></div>
          <div class='col-12 col-sm-4 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decTrait" data-trait='strength' type="button"> - </button>
              </div>
              <input type="text" id="strength" name="strength" class="form-control border text-center" readonly />
              <div class="input-group-append">
                <button class="btn btn-warning border incTrait" data-trait='strength' type="button"> + </button>
              </div>
            </div>
          </div>
          <div class='col-6 col-sm-4 col-lg-2 py-1'><h4 class='text-center pt-2'>ENDURANCE:</h4></div>
          <div class='col-6 col-sm-4 col-lg-2 py-1'><img src='img/symbols/end.png' class='img-fluid h-100 mx-auto d-block trait-img py-1'></div>
          <div class='col-12 col-sm-4 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decTrait" data-trait='endurance' type="button"> - </button>
              </div>
              <input type="text" id="endurance" name="endurance" class="form-control border text-center" readonly />
              <div class="input-group-append">
                <button class="btn btn-warning border incTrait" data-trait='endurance' type="button"> + </button>
              </div>
            </div>
          </div>
        </div>

        <div class='row'>
          <div class='col-6 col-sm-4 col-lg-2 py-1'><h4 class='text-center pt-2'>AGILITY:</h4></div>
          <div class='col-6 col-sm-4 col-lg-2 py-1'><img src='img/symbols/agl.png' class='img-fluid h-100 mx-auto d-block trait-img py-1'></div>
          <div class='col-12 col-sm-4 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decTrait" data-trait='agility' type="button"> - </button>
              </div>
              <input type="text" id="agility" name="agility" class="form-control border text-center" readonly />
              <div class="input-group-append">
                <button class="btn btn-warning border incTrait" data-trait='agility' type="button"> + </button>
              </div>
            </div>
          </div>
          <div class='col-6 col-sm-4 col-lg-2 py-1'><h4 class='text-center pt-2'>SPEED:</h4></div>
          <div class='col-6 col-sm-4 col-lg-2 py-1'><img src='img/symbols/spd.png' class='img-fluid h-100 mx-auto d-block trait-img py-1'></div>
          <div class='col-12 col-sm-4 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decTrait" data-trait='speed' type="button"> - </button>
              </div>
              <input type="text" id="speed" name="speed" class="form-control border text-center" readonly />
              <div class="input-group-append">
                <button class="btn btn-warning border incTrait" data-trait='speed' type="button"> + </button>
              </div>
            </div>
          </div>
        </div>

        <div class='row'>
          <div class='col-6 col-sm-4 col-lg-2 py-1'><h4 class='text-center pt-2'>BEAUTY:</h4></div>
          <div class='col-6 col-sm-4 col-lg-2 py-1'><img src='img/symbols/bty.png' class='img-fluid h-100 mx-auto d-block trait-img py-1'></div>
          <div class='col-12 col-sm-4 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="beauty" name="beauty" class="form-control border text-center" readonly />
            </div>
          </div>
          <div class='col-lg-6'></div>
        </div>

        <div class='row brass py-1'>
          <div class='col-md'></div>
          <div class='col-12 col-sm-6 col-md'><h4 class='text-center pt-2'><strong>POINT POOL:</strong></h4></div>
          <div class='col-12 col-sm-6 col-md'>
            <div class="input-group input-group-lg">
              <input type="text" id="pointPool" class="form-control border text-center" readonly />
            </div>
          </div>
          <div class='col-md'></div>
        </div>

        <div class='row black py-1'>
          <div class='col-md'></div>
          <div class='col'>
            <button type='submit' class='btn btn-success btn-lg btn-block border'>CONTINUE</button>
          </div>
          <div class='col-md'></div>
        </div>
      </form>


        <script src='js/instantMessage.js'></script>

        <script src='node_modules/socket.io-client/dist/socket.io.js'></script>
      
      <?php include("footer.php"); ?>
    </div>
  </body>
</html>