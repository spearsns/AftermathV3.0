<?php
    include("inc/config.php");
    session_start();

    if (isset($_SESSION['ID']) == false){
        header("Location: login.php");
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
    <script type="text/javascript" src="js/characterDevelopment.js"></script>
  </head>

  <body>
    <div class="container-fluid metal">
      <?php include('header.php'); ?>

      <div class='row black'>
        <div class='col'></div>
        <div class='col-6'><h4 class='text-danger text-center'>RED BUTTONS COST 2 SKILL CHOICES</h4></div>
        <div class='col'></div>
      </div>
    
      <?php include('modals/developmentModals.php'); ?>
    </div>

      <!--SHEET BEGIN-->
      <form id="characterDevelopment" class='characterSheet' method="post" action="inc/processCharacter.php">
        <div class='sticky-top'>
          <div class='row black py-2'>
            <div class='col'></div>
            <div class='col'><h4 class='text-white TNR pt-2 text-center'>CHOICES REMAINING:</h4></div>
            <div class='col'>
              <div class="input-group input-group-lg">
                <input type="text" id="choicePool" class="form-control border text-center" readonly />
              </div>
            </div>
            <div class='col'></div>
          </div>
        </div>
      
        <div class='row no-gutters'>
          <div class='col-3'></div>
          <div class='col'><h4 class='TNR text-center'><u>DEMOGRAPHIC INFORMATION</u></h4></div>
        </div>

        <div class='row no-gutters'>
          <div class='col-4'><img src='img/misc/picSlot.png' class='mx-auto d-block'></div>
          <div class='col-8'>

            <div class='row no-gutters'>
              <div class='col-2'><h5 class='pt-2 TNR text-center'>NAME:</h5></div>
              <div class='col-4'>
                <div class="input-group input-group-lg">
                  <input type="text" id="name" name="name" class="form-control border text-center" required />
                </div>
              </div>
              <div class='col-2'><h5 class='pt-2 TNR text-center'>BACKGROUND:</h5></div>
              <div class='col-4'>
                <div class="input-group input-group-lg">
                  <input type="text" id="background" name="background" class="form-control border text-center" value='<?php echo $_SESSION["background"]; ?>' readonly />
                </div>
              </div>
            </div>

            <div class='row no-gutters'>
              <div class='col-2'><h5 class='pt-2 TNR text-center'>HABITAT:</h5></div>
              <div class='col-4'>
                <div class="input-group input-group-lg">
                  <input type="text" id="habitat" name="habitat" class="form-control border text-center" required />
                </div>
              </div>
              <div class='col-2'><h5 class='pt-2 TNR text-center'>ETHNICITY:</h5></div>
              <div class='col-4'>
                <div class="input-group input-group-lg">
                  <input type="text" id="ethnicity" name="ethnicity" class="form-control border text-center" value='<?php echo $_SESSION["ethnicity"]; ?>' readonly />
                </div>
              </div>
            </div>

            <div class='row no-gutters'>
              <div class='col-2'><h5 class='pt-2 TNR text-center'>AGE:</h5></div>
              <div class='col-4'>
                <div class="input-group input-group-lg">
                  <input type="text" id="age" name="age" class="form-control border text-center" value='<?php echo $_SESSION["age"]; ?>' readonly />
                </div>
              </div>
              <div class='col-2'><h5 class='pt-2 TNR text-center'>SEX:</h5></div>
              <div class='col-4'>
                <div class="input-group input-group-lg">
                  <input type="text" id="sex" name="sex" class="form-control border text-center" value='<?php echo $_SESSION["sex"]; ?>' readonly />
                </div>
              </div>
            </div>

            <div class='row no-gutters'>
              <div class='col-2'><h5 class='pt-2 TNR text-center'>HAIR STYLE:</h5></div>
              <div class='col-4'>
                <div class="input-group input-group-lg">
                  <input type="text" id="hairStyle" name="hairStyle" class="form-control border text-center" required />
                </div>
              </div>
              <div class='col-2'><h5 class='pt-2 TNR text-center'>HAIR COLOR:</h5></div>
              <div class='col-4'>
                <div class="input-group input-group-lg">
                  <input type="text" id="hairColor" name="hairColor" class="form-control border text-center" readonly />
                </div>
              </div>
            </div>

            <div class='row no-gutters'>
              <div class='col-2'><h5 class='pt-2 TNR text-center'>FACIAL HAIR:</h5></div>
              <div class='col-4'>
                <div class="input-group input-group-lg">
                  <input type="text" id="facialHair" name="facialHair" class="form-control border text-center" />
                </div>
              </div>
              <div class='col-2'><h5 class='pt-2 TNR text-center'>EYE COLOR:</h5></div>
              <div class='col-4'>
                <div class="input-group input-group-lg">
                  <input type="text" id="eyeColor" name="eyeColor" class="form-control border text-center" readonly />
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class='row no-gutters'>
          <div class='col'><h4 class='TNR text-center'><u>COMBAT SKILLS</u></h4></div>
          <div class='col'><h4 class='TNR text-center'><u>PHYSICAL TRAITS</u></h4></div>
        </div>

        <div class='row no-gutters'>
          <div class='col'><button type="button" class="btn btn-warning btn-lg btn-block border train" data-target='unarmed'>UNARMED</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="unarmed" name='unarmed' class="form-control border text-center" readonly />
            </div>
          </div>
          <div class='col'><button type="button" class="btn btn-warning btn-lg btn-block border train" data-target='thrown'>THROWN</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="thrown" name='thrown' class="form-control border text-center" readonly />
            </div>
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>MEMORY:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" name='memory' id='memory' class="form-control border text-center" value='<?php echo $_SESSION["memory"]; ?>' readonly />
            </div>
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>STRENGTH:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" name='strength' id='strength' class="form-control border text-center" value='<?php echo $_SESSION["strength"]; ?>' readonly />
            </div>
          </div>
        </div>

        <div class='row no-gutters'>
          <div class='col'><button type="button" class="btn btn-warning btn-lg btn-block border train" data-target='grapple'>GRAPPLE</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="grapple" name='grapple' class="form-control border text-center" readonly />
            </div>
          </div>
          <div class='col'><button type="button" class="btn btn-warning btn-lg btn-block border train" data-target='archery'>ARCHERY</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="archery" name='archery' class="form-control border text-center" readonly />
            </div>
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>LOGIC:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" name='logic' id='logic' class="form-control border text-center" value='<?php echo $_SESSION["logic"]; ?>' readonly />
            </div>
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>ENDURANCE:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" name='endurance' id='endurance' class="form-control border text-center" value='<?php echo $_SESSION["endurance"]; ?>' 
                readonly />
            </div>
          </div>
        </div>

        <div class='row no-gutters'>
          <div class='col'><button type="button" class="btn btn-warning btn-lg btn-block border train" data-target='shortWeapons'>SHORT</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="shortWeapons" name='shortWeapons' class="form-control border text-center" readonly />
            </div>
          </div>
          <div class='col'><button type="button" class="btn btn-warning btn-lg btn-block border train" data-target='pistols'>PISTOLS</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="pistols" name='pistols' class="form-control border text-center" readonly />
            </div>
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>PERCEPTION:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" name='perception' id='perception' class="form-control border text-center" value='<?php echo $_SESSION["perception"]; ?>' 
                readonly />
            </div>
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>AGILITY:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" name='agility' id='agility' class="form-control border text-center" value='<?php echo $_SESSION["agility"]; ?>' readonly />
            </div>
          </div>
        </div>

        <div class='row no-gutters'>
          <div class='col'><button type="button" class="btn btn-warning btn-lg btn-block border train" data-target='longWeapons'>LONG</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="longWeapons" name='longWeapons' class="form-control border text-center" readonly />
            </div>
          </div>
          <div class='col'><button type="button" class="btn btn-warning btn-lg btn-block border train" data-target='rifles'>RIFLES</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="rifles" name='rifles' class="form-control border text-center" readonly />
            </div>
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>WILLPOWER:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" name='willpower' id='willpower' class="form-control border text-center" value='<?php echo $_SESSION["willpower"]; ?>' readonly />
            </div>
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>SPEED:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" name='speed' id='speed' class="form-control border text-center" value='<?php echo $_SESSION["speed"]; ?>' readonly />
            </div>
          </div>
        </div>

        <div class='row no-gutters'>
          <div class='col'><button type="button" class="btn btn-warning btn-lg btn-block border train" data-target='twoHand'>TWO HAND</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="twoHand" name='twoHand' class="form-control border text-center" readonly />
            </div>
          </div>
          <div class='col'><button type="button" class="btn btn-danger btn-lg btn-block border advTrain" data-target='burst'>BURST</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="burst" name='burst' class="form-control border text-center" readonly />
            </div>
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>CHARISMA:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="charisma" name='charisma' class="form-control border text-center" value='<?php echo $_SESSION["charisma"]; ?>' readonly />
            </div>
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>BEAUTY:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="beauty" name='beauty' class="form-control border text-center" value='<?php echo $_SESSION["beauty"]; ?>' readonly />
            </div>
          </div>
        </div>

        <div class='row no-gutters'>
          <div class='col'><button type="button" class="btn btn-warning btn-lg btn-block border train" data-target='chain'>CHAIN</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="chain" name='chain' class="form-control border text-center" readonly />
            </div>
          </div>
          <div class='col'><button type="button" class="btn btn-danger btn-lg btn-block border advTrain" data-target='special'>SPECIAL</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="special" name='special' class="form-control border text-center" readonly />
            </div>
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>ACTIONS:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="actions" name='actions' class="form-control border text-center" readonly />
            </div>
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>SEQUENCE:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="sequence" name='sequence' class="form-control border text-center" readonly />
            </div>
          </div>
        </div>

        <div class='row no-gutters'>
          <div class='col'><button type="button" class="btn btn-warning btn-lg btn-block border train" data-target='shield'>SHIELD</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="shield" name='shield' class="form-control border text-center" readonly />
            </div>
          </div>
          <div class='col'><button type="button" class="btn btn-danger btn-lg btn-block border advTrain px-1" data-target='weaponSys'>WEAPON SYS</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="weaponSys" name='weaponSys' class="form-control border text-center" readonly />
            </div>
          </div>
          <div class='col'></div>
          <div class='col'><button type="button" class="btn btn-danger btn-lg btn-block border offTrain" data-target='offHand'>OFF HAND</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="offHand" name='offHand' class="form-control border text-center" readonly />
            </div>
          </div>
          <div class='col'></div>
        </div>

        <div class='row no-gutters'>
          <div class='col'><button type="button" class="btn btn-warning btn-lg btn-block border trainDefense" data-target='block'>BLOCK</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="block" name='block' class="form-control border text-center" readonly />
            </div>
          </div>
          <div class='col'><button type="button" class="btn btn-danger btn-lg btn-block border advTrainDefense" data-target='dodge'>DODGE</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="dodge" name='dodge' class="form-control border text-center" readonly />
            </div>
          </div>
          <div class='col'></div>
          <div class='col'><h5 class='pt-2 TNR text-center'>GAMBLING:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="gambling" name='gambling' class="form-control border text-center" readonly />
            </div>
          </div>
          <div class='col'></div>        
        </div>

        <div class='row no-gutters'>
          <div class='col'><h4 class='TNR text-center'><u>COVERT SKILLS</u></h4></div>
          <div class='col'><h4 class='TNR text-center'><u>SURVIVAL SKILLS</u></h4></div>
        </div>

        <div class='row no-gutters'>
          <div class='col'><button type="button" class="btn btn-warning btn-lg btn-block border train" data-target='stealth'>STEALTH</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="stealth" name='stealth' class="form-control border text-center" readonly />
            </div>
          </div>
          <div class='col'><button type="button" class="btn btn-warning btn-lg btn-block border train" data-target='concealment'>CONCEAL</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="concealment" name='concealment' class="form-control border text-center" readonly />
            </div>
          </div>
          <div class='col'><button type="button" class="btn btn-warning btn-lg btn-block border train" data-target='envAware'>ENV AWARE</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="envAware" name='envAware' class="form-control border text-center" readonly />
            </div>
          </div>
          <div class='col'><button type="button" class="btn btn-warning btn-lg btn-block border train" data-target='surveillance'>SURVEY</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="surveillance" name='surveillance' class="form-control border text-center" readonly />
            </div>
          </div>
        </div>

        <div class='row no-gutters'>
          <div class='col'><button type="button" class="btn btn-danger btn-lg btn-block border advTrain" data-target='sleight'>SLEIGHT</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="sleight" name='sleight' class="form-control border text-center" readonly />
            </div>
          </div>
          <div class='col'><button type="button" id='lockpickBtn' class="btn btn-danger btn-lg btn-block border advanced" data-target='lockpick'>LOCKPICK</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="lockpick" name='lockpick' class="form-control border text-center" readonly />
            </div>
          </div>
          <div class='col'>
            <button type="button" class="btn btn-warning btn-lg btn-block border train" data-target='navigation'>NAVIGATION</button>
          </div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="navigation" name='navigation' class="form-control border text-center" readonly />
            </div>
          </div>
          <div class='col'><button type="button" id='preservationBtn' class="btn btn-warning btn-lg btn-block border standard" data-target='preservation'>
            PRESERVE</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="preservation" name='preservation' class="form-control border text-center" readonly />
            </div>
          </div>
        </div>

        <div class='row no-gutters'>
          <div class='col'><button type="button" id='forgeryBtn' class="btn btn-danger btn-lg btn-block border advanced" data-target='forgery'>FORGERY</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="forgery" name='forgery' class="form-control border text-center" readonly />
            </div>
          </div>
          <div class='col'><button type="button" id='cryptographyBtn' class="btn btn-danger btn-lg btn-block border advanced" data-target='cryptography'>CRYPTO</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="cryptography" name='cryptography' class="form-control border text-center" readonly />
            </div>
          </div>
          <div class='col'><button type="button" id='trackingBtn' class="btn btn-danger btn-lg btn-block border advanced" data-target='tracking'>TRACKING</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="tracking" name='tracking' class="form-control border text-center" readonly />
            </div>
          </div>
          <div class='col'><button type="button" id='trappingBtn' class="btn btn-warning btn-lg btn-block border standard" data-target='trapping'>TRAPPING</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="trapping" name='trapping' class="form-control border text-center" readonly />
            </div>
          </div>
        </div>
        
        <div class='row no-gutters'>
          <div class='col'><button type="button" id='disguiseBtn' class="btn btn-danger btn-lg btn-block border advanced" data-target='disguise'>DISGUISE</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="disguise" name='disguise' class="form-control border text-center" readonly />
            </div>
          </div>
          <div class='col'><button type="button" id='restraintsBtn' class="btn btn-warning btn-lg btn-block border standard" data-target='restraints'>
            RESTRAINTS</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="restraints" name='restraints' class="form-control border text-center" readonly />
            </div>
          </div>
          <div class='col'><button type="button" class="btn btn-warning btn-lg btn-block border standard" data-target='fishing'>FISHING</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="fishing" name='fishing' class="form-control border text-center" readonly />
            </div>
          </div>
          <div class='col'><button type="button" class="btn btn-danger btn-lg btn-block border advTrain" data-target='firstAid'>FIRST AID</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="firstAid" name='firstAid' class="form-control border text-center" readonly />
            </div>
          </div>
        </div>

        <div class='row'>
          <div class='col-6'><h4 class='TNR text-center'><u>TRANSPORTATION SKILLS</u></h4></div>
          <div class='col-6'><h4 class='TNR text-center'><u>TECHNOLOGY SKILLS</u></h4></div>
        </div>

        <div class='row no-gutters'>
          <div class='col'><button type="button" class="btn btn-warning btn-lg btn-block border standard px-1" data-target='skateboard'>
              SKATEBOARD</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="skateboard" name='skateboard' class="form-control border text-center" readonly />
            </div>
          </div>
          <div class='col'><button type="button" class="btn btn-warning btn-lg btn-block border standard" data-target='bicycle'>BICYCLE</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="bicycle" name='bicycle' class="form-control border text-center" readonly />
            </div>
          </div>
          <div class='col'><button type="button" class="btn btn-warning btn-lg btn-block border train" data-target='crafting'>CRAFTING</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="crafting" name='crafting' class="form-control border text-center" readonly />
            </div>
          </div>
          <div class='col'></div>
          <div class='col'></div>
        </div>

        <div class='row no-gutters'>
          <div class='col'><button type="button" class="btn btn-warning btn-lg btn-block border standard" data-target='horsemanship'>HORSE</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="horsemanship" name='horsemanship' class="form-control border text-center" readonly />
            </div>
          </div>
          <div class='col'><button type="button" id='automobileBtn' class="btn btn-warning btn-lg btn-block border standard px-1" data-target='automobile'>
            AUTOMOBILE</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="automobile" name='automobile' class="form-control border text-center" readonly />
            </div>
          </div>
          <div class='col'><button type="button" id='computersBtn' class="btn btn-warning btn-lg btn-block border standard" data-target='computers'>
            COMPUTERS</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="computers" name='computers' class="form-control border text-center" readonly />
            </div>
          </div>
          <div class='col'><button type="button" id='programBtn' class="btn btn-danger btn-lg btn-block border advanced" data-target='programming'>
              PROGRAM</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="programming" name='programming' class="form-control border text-center" readonly />
            </div>
          </div>
        </div>

        <div class='row no-gutters'>
          <div class='col'><button type="button" id='motorcycleBtn' class="btn btn-warning btn-lg btn-block border standard px-1" data-target='motorcycle'>
            MOTORCYCLE</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="motorcycle" name='motorcycle' class="form-control border text-center" readonly />
            </div>
          </div>
          <div class='col'><button type="button" class="btn btn-warning btn-lg btn-block border standard" data-target='jetSki'>JET SKI</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="jetSki" name='jetSki' class="form-control border text-center" readonly />
            </div>
          </div>
          <div class='col'><button type="button" id='radiosBtn' class="btn btn-warning btn-lg btn-block border standard" data-target='radios'>RADIOS</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="radios" name='radios' class="form-control border text-center" readonly />
            </div>
          </div>
          <div class='col'><button type="button" id='networksBtn' class="btn btn-danger btn-lg btn-block border advanced" data-target='networks'>NETWORKS</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="networks" name='networks' class="form-control border text-center" readonly />
            </div>
          </div>
        </div>

        <div class='row no-gutters'>
          <div class='col'><button type="button" id='sailingBtn' class="btn btn-warning btn-lg btn-block border standard" data-target='sailing'>SAILING</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="sailing" name='sailing' class="form-control border text-center" readonly />
            </div>
          </div>
          <div class='col'><button type="button" id='boatingBtn' class="btn btn-warning btn-lg btn-block border standard" data-target='boating'>BOATING</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="boating" name='boating' class="form-control border text-center" readonly />
            </div>
          </div>
          <div class='col'><button type="button" id='mechanicsBtn' class="btn btn-warning btn-lg btn-block border standard" data-target='mechanics'>MECHANICS</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="mechanics" name='mechanics' class="form-control border text-center" readonly />
            </div>
          </div>
          <div class='col'><button type="button" id='electricalBtn' class="btn btn-warning btn-lg btn-block border standard px-1" data-target='electrical'>
            ELECTRICAL</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="electrical" name='electrical' class="form-control border text-center" readonly />
            </div>
          </div>
        </div>

        <div class='row no-gutters'>
          <div class='col'><button type="button" id='multiGearBtn' class="btn btn-danger btn-lg btn-block border advanced" data-target='multiGear'>MULTI GEAR</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="multiGear" name='multiGear' class="form-control border text-center" readonly />
            </div>
          </div>
          <div class='col'><button type="button" id='hvyEquipBtn' class="btn btn-danger btn-lg btn-block border advanced" data-target='hvyEquip'>HVY EQUIP</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="hvyEquip" name='hvyEquip' class="form-control border text-center" readonly />
            </div>
          </div>
          <div class='col'><button type="button" id='circuitryBtn' class="btn btn-warning btn-lg btn-block border standard" data-target='circuitry'>
            CIRCUITRY</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="circuitry" name='circuitry' class="form-control border text-center" readonly />
            </div>
          </div>
          <div class='col'><button type="button" id='explosivesBtn' class="btn btn-danger btn-lg btn-block border advanced" data-target='explosives'>
            EXPLOSIVES</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="explosives" name='explosives' class="form-control border text-center" readonly />
            </div>
          </div>
        </div>

        <div class='row no-gutters'>
          <div class='col'><button type="button" class="btn btn-danger btn-lg btn-block border advanced px-1" data-target='helicopters'>HELICOPTER</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="helicopters" name='helicopters' class="form-control border text-center" readonly />
            </div>
          </div>
          <div class='col'><button type="button" class="btn btn-danger btn-lg btn-block border advanced" data-target='airplanes'>AIRPLANES</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="airplanes" name='airplanes' class="form-control border text-center" readonly />
            </div>
          </div>
          <div class='col'><button type="button" id='constructionBtn' class="btn btn-danger btn-lg btn-block border advanced" data-target='construction'>
            CONSTRUCT</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="construction" name='construction' class="form-control border text-center" readonly />
            </div>
          </div>
          <div class='col'><button type="button" id='architectureBtn' class="btn btn-danger btn-lg btn-block border advanced" data-target='architecture'>
            ARCHITECT</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="architecture" name='architecture' class="form-control border text-center" readonly />
            </div>
          </div>
        </div>

        <div class='row no-gutters'>
          <div class='col'><h4 class='TNR text-center'><u>SOFT SKILLS & LANGUAGES</u></h4></div>
          <div class='col'><h4 class='TNR text-center'><u>SCIENCE SKILLS</u></h4></div>
        </div>

        <div class='row no-gutters'>
          <div class='col'><button type="button" class="btn btn-warning btn-lg btn-block border train" data-target='negotiation'>NEGOTIATE</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="negotiation" name='negotiation' class="form-control border text-center" readonly />
            </div>
          </div>
          <div class='col'><button type="button" id='guileBtn' class="btn btn-warning btn-lg btn-block border train" data-target='guile'>GUILE</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="guile" name='guile' class="form-control border text-center" readonly />
            </div>
          </div>
          <div class='col'><button type="button" class="btn btn-warning btn-lg btn-block border standard" data-target='history'>HISTORY</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="history" name='history' class="form-control border text-center" readonly />
            </div>
          </div>
          <div class='col'><button type="button" id='forensicsBtn' class="btn btn-danger btn-lg btn-block border advanced" data-target='forensics'>
              FORENSICS</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="forensics" name='forensics' class="form-control border text-center" readonly />
            </div>
          </div>
        </div>

        <div class='row no-gutters'>
          <div class='col'><button type="button" id='etiquetteBtn' class="btn btn-danger btn-lg btn-block border advTrain" data-target='etiquette'>
              ETIQUETTE</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="etiquette" name='etiquette' class="form-control border text-center" readonly />
            </div>
          </div>
          <div class='col'><button type="button" id='animalsBtn' class="btn btn-warning btn-lg btn-block border train" data-target='animals'>
              ANIMALS</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="animals" name='animals' class="form-control border text-center" readonly />
            </div>
          </div>
          <div class='col'><button type="button" id='biologyBtn' class="btn btn-warning btn-lg btn-block border standard" data-target='biology'>
              BIOLOGY</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="biology" name='biology' class="form-control border text-center" readonly />
            </div>
          </div>
          <div class='col'><button type="button" id='chemistryBtn' class="btn btn-warning btn-lg btn-block border standard" data-target='chemistry'>
            CHEMISTRY</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="chemistry" name='chemistry' class="form-control border text-center" readonly />
            </div>
          </div>
        </div>

        <div class='row no-gutters'>
          <div class='col'><button type="button" id='appraisalBtn' class="btn btn-danger btn-lg btn-block border advTrain" data-target='appraisal'>
              APPRAISAL</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="appraisal" name='appraisal' class="form-control border text-center" readonly />
            </div>
          </div>
          <div class='col'><button type="button" id='legalBtn' class="btn btn-danger btn-lg btn-block border advanced" data-target='legal'>LEGAL</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="legal" name='legal' class="form-control border text-center" readonly />
            </div>
          </div>
          <div class='col'><button type="button" id='botanyBtn' class="btn btn-warning btn-lg btn-block border standard" data-target='botany'>
              BOTANY</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="botany" name='botany' class="form-control border text-center" readonly />
            </div>
          </div>
          <div class='col'><button type="button" class="btn btn-warning btn-lg btn-block border standard px-1" data-target='mycology'>MYCOLOGY</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="mycology" name='mycology' class="form-control border text-center" readonly />
            </div>
          </div>
        </div>

        <div class='row no-gutters'>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="lang1" name='lang1' class="form-control border text-center langSlot" data-target='lang1Value' readonly />
            </div>
          </div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="lang1Value" name='lang1Value' class="form-control border text-center" readonly />
            </div>
          </div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="lang2" name='lang2' class="form-control border text-center langSlot" data-target='lang2Value' readonly />
            </div>
          </div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="lang2Value" name='lang2Value' class="form-control border text-center" readonly />
            </div>
          </div>
          <div class='col'><button type="button" id='toxicologyBtn' class="btn btn-danger btn-lg btn-block border advanced px-1" data-target='toxicology'>
            TOXICOLOGY</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="toxicology" name='toxicology' class="form-control border text-center" readonly />
            </div>
          </div>
          <div class='col'><button type="button" id='pharmacologyBtn' class="btn btn-danger btn-lg btn-block border advanced" data-target='pharmacology'>
              PHARMA</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="pharmacology" name='pharmacology' class="form-control border text-center" readonly />
            </div>
          </div>
        </div>

        <div class='row no-gutters'>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="lang3" name='lang3' class="form-control border text-center langSlot" data-target='lang3Value' readonly />
            </div>
          </div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="lang3Value" name='lang3Value' class="form-control border text-center" readonly />
            </div>
          </div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="lang4" name='lang4' class="form-control border text-center langSlot" data-target='lang4Value' readonly />
            </div>
          </div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="lang4Value" name='lang4Value' class="form-control border text-center" readonly />
            </div>
          </div>
          <div class='col'><button type="button" id='surgeryBtn' class="btn btn-danger btn-lg btn-block border" data-target='surgery'>
            SURGERY</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="surgery" name='surgery' class="form-control border text-center" readonly />
            </div>
          </div>
          <div class='col'><button type="button" id='medicineBtn' class="btn btn-danger btn-lg btn-block border px-1" data-target='medicine'>
            MEDICINE</button></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="medicine" name='medicine' class="form-control border text-center" readonly />
            </div>
          </div>
        </div>

        <div class='row no-gutters'>
          <div class='col-1'></div>
          <div class='col-4'><button type="button" id='learnLangBtn' class="btn btn-warning btn-lg btn-block border">LEARN NEW LANGUAGE</button></div>  
          <div class='col-1'></div>
          <div class='col-6'></div>
        </div>

        <br />
        <div class='row black'>
          <div class='col'></div>
          <div class='col'><button type='submit' class='btn btn-success btn-lg btn-block border'>CONFIRM & SAVE</button></div>
          <div class='col'></div>
        </div>
      </form>

      <script src='js/instantMessage.js'></script>

      <script src='node_modules/socket.io-client/dist/socket.io.js'></script>

      <?php include("footer.php"); ?>
    </div>
  </body>
</html>