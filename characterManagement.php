<?php
  include("inc/config.php");
  session_start();

  if (isset($_SESSION['ID']) == false){
    header("Location: login.php");
  }

  $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
  $userID = $_SESSION['ID'];
  $character = parse_url($url, PHP_URL_QUERY);
  $characterName = rawurldecode($character); 

  //STAT PREP
  $characterSQL =  
    "SELECT ID, Background, Habitat, Age, Sex, Ethnicity, HairColor, HairStyle, FacialHair, EyeColor, SecondLanguage, ThirdLanguage,
      FourthLanguage, FifthLanguage, TotalExp, RemainingExp 
    FROM characters 
    WHERE UserID = '$userID' AND CharacterName = '$characterName' ";

  $result1 = mysqli_query($conn, $characterSQL);
  $charInfo = mysqli_fetch_assoc($result1);

  $characterID = $charInfo['ID'];

  $traitSQL =  
    "SELECT Memory, Logic, Perception, Willpower, Charisma, Strength, Endurance, Agility, Speed, Beauty, Sequence, Actions 
    FROM char_traits 
    WHERE CharacterID = '$characterID' ";

  $result2 = mysqli_query($conn, $traitSQL);
  $charTraits = mysqli_fetch_assoc($result2);

  $skillSQL =
    "SELECT Name, Value
    FROM char_skills AS S
    INNER JOIN master_skills AS M ON S.MasterID = M.ID
    WHERE CharacterID = '$characterID' ";
  
  $charSkills = array();
  $result3 = mysqli_query($conn, $skillSQL);

  while ($output = mysqli_fetch_array($result3)){
    $charSkills[$output['Name']] = $output['Value'];
  }

  $abilitySQL =
    "SELECT AbilityNumber, Name
    FROM char_abilities 
    WHERE CharacterID = '$characterID' ";
  $charAbilities = array();
  $result4 = mysqli_query($conn, $abilitySQL);

  while ($output = mysqli_fetch_array($result4)){
    $charAbilities[$output['AbilityNumber']] = $output['Name'];
  }
?>

<!doctype html>
<html lang='en' dir='ltr'>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Character Management</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/styles.css" />

    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/characterManagement.js"></script>
  </head>

  <body>
    <div class="container-fluid metal">
      <?php include('header.php'); ?>

      <div class='row black'>
        <div class='col'><h5 class='pt-2 text-warning TNR text-center'>YELLOW BUTTONS = STANDARD SKILLS : STANDARD EXPERIENCE COST</h5></div>
      </div>

      <div class='row black'>
        <div class='col'><h5 class='pt-2 text-success TNR text-center'>GREEN BUTTONS = ADVANCED SKILLS : INCREASED EXPERIENCE COST</h5></div>
      </div>

      <div class='row black'>
        <div class='col'><h5 class='pt-2 text-info TNR text-center'>BLUE BUTTONS = TRAITS : HIGHEST EXPERIENCE COST</h5></div>
      </div>

      <div class='row black'>
        <div class='col'><h5 class='pt-2 text-white TNR text-center'>THERE IS A BELL CURVE : LEARNING NEW SKILLS IS ALMOST AS DIFFICULT AS MASTERING OLD ONES</h5></div>
      </div>

  <?php include('modals/managementModals.php'); ?>
     
  </div> <!--END HEADER-->

      <!--SHEET BEGIN-->
      <form id="characterManagement" class='characterSheet' method="post" action="inc/updateCharacter.php">
        <div class='sticky-top'>
          <div class='row black'>
            <div class='col'></div>
            <div class='col'><h3 class='text-white TNR pt-2 text-center'>EXPERIENCE POOL:</h3></div>
            <div class='col'>
              <div class="input-group input-group-lg">
                <input type="text" id="experiencePool" class="form-control border text-center experience"
                  value="<?php echo $charInfo['RemainingExp']; ?>" readonly />
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
                  <input type="text" id="name" name="name" class="form-control border text-center"
                    value='<?php echo $characterName; ?>' readonly />
                </div>
              </div>
              <div class='col-2'><h5 class='pt-2 TNR text-center'>BACKGROUND:</h5></div>
              <div class='col-4'>
                <div class="input-group input-group-lg">
                  <input type="text" id="background" name="background" class="form-control border text-center"
                    value="<?php echo $charInfo['Background']; ?>" readonly />
                </div>
              </div>
            </div>

            <div class='row no-gutters'>
              <div class='col-2'><h5 class='pt-2 TNR text-center'>HABITAT:</h5></div>
              <div class='col-4'>
                <div class="input-group input-group-lg">
                  <input type="text" id="habitat" name="habitat" class="form-control border text-center"
                    value="<?php echo $charInfo['Habitat']; ?>" readonly />
                </div>
              </div>
              <div class='col-2'><h5 class='pt-2 TNR text-center'>ETHNICITY:</h5></div>
              <div class='col-4'>
                <div class="input-group input-group-lg">
                  <input type="text" id="ethnicity" name="ethnicity" class="form-control border text-center"
                    value="<?php echo $charInfo['Ethnicity']; ?>" readonly />
                </div>
              </div>
            </div>

            <div class='row no-gutters'>
              <div class='col-2'><h5 class='pt-2 TNR text-center'>AGE:</h5></div>
              <div class='col-4'>
                <div class="input-group input-group-lg">
                  <input type="text" id="age" name="age" class="form-control border text-center"
                    value="<?php echo $charInfo['Age']; ?>" readonly />
                </div>
              </div>
              <div class='col-2'><h5 class='pt-2 TNR text-center'>SEX:</h5></div>
              <div class='col-4'>
                <div class="input-group input-group-lg">
                  <input type="text" id="sex" name="sex" class="form-control border text-center"
                    value="<?php echo $charInfo['Sex']; ?>" readonly />
                </div>
              </div>
            </div>

            <div class='row no-gutters'>
              <div class='col-2'><h5 class='pt-2 TNR text-center'>HAIR STYLE:</h5></div>
              <div class='col-4'>
                <div class="input-group input-group-lg">
                  <input type="text" id="hairStyle" name="hairStyle" class="form-control border text-center"
                    value="<?php echo $charInfo['HairStyle']; ?>" readonly />
                </div>
              </div>
              <div class='col-2'><h5 class='pt-2 TNR text-center'>HAIR COLOR:</h5></div>
              <div class='col-4'>
                <div class="input-group input-group-lg">
                  <input type="text" id="hairColor" name="hairColor" class="form-control border text-center"
                    value="<?php echo $charInfo['HairColor']; ?>" readonly />
                </div>
              </div>
            </div>

            <div class='row no-gutters'>
              <div class='col-2'><h5 class='pt-2 TNR text-center'>FACIAL HAIR:</h5></div>
              <div class='col-4'>
                <div class="input-group input-group-lg">
                  <input type="text" id="facialHair" name="facialHair" class="form-control border text-center"
                    value="<?php echo $charInfo['FacialHair']; ?>" readonly/>
                </div>
              </div>
              <div class='col-2'><h5 class='pt-2 TNR text-center'>EYE COLOR:</h5></div>
              <div class='col-4'>
                <div class="input-group input-group-lg">
                  <input type="text" id="eyeColor" name="eyeColor" class="form-control border text-center"
                    value="<?php echo $charInfo['EyeColor']; ?>" readonly />
                </div>
              </div>
            </div>
            <div class='row no-gutters'>
              <div class='col-2'><h5 class='pt-2 TNR text-center'>EXP POOL:</h5></div>
              <div class='col-4'>
                <div class="input-group input-group-lg">
                  <input type="text" id="expPool" name="expPool" class="form-control border text-center experience"
                    value="<?php echo $charInfo['RemainingExp']; ?>" readonly />
                </div>
              </div>
              <div class='col-2'><h5 class='pt-2 TNR text-center'>TOTAL EXP:</h5></div>
              <div class='col-4'>
                <div class="input-group input-group-lg">
                  <input type="text" id="totalExp" name="totalExp" class="form-control border text-center"
                    value="<?php echo $charInfo['TotalExp']; ?>" readonly />
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
          <div class='col'><h5 class='pt-2 TNR text-center'>UNARMED:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decStandard" data-target='unarmed' type="button"> - </button>
              </div>
              <input type="text" id="unarmed" name='unarmed' class="form-control border text-center"
                value="<?php echo $charSkills['Unarmed']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-warning border incStandard" data-target='unarmed' type="button"> + </button>
              </div>
            </div>    
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>THROWN:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decStandard" data-target='thrown' type="button"> - </button>
              </div>
              <input type="text" id="thrown" name='thrown' class="form-control border text-center"
                value="<?php echo $charSkills['Thrown']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-warning border incStandard" data-target='thrown' type="button"> + </button>
              </div>
            </div>    
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>MEMORY:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decTrait" data-target='memory' type="button"> - </button>
              </div>
              <input type="text" id="memory" name='memory' class="form-control border text-center"
                value="<?php echo $charTraits['Memory']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-info border incTrait" data-target='memory' type="button"> + </button>
              </div>
            </div>    
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>STRENGTH:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decTrait" data-target='strength' type="button"> - </button>
              </div>
              <input type="text" id="strength" name='strength' class="form-control border text-center"
                value="<?php echo $charTraits['Strength']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-info border incTrait" data-target='strength' type="button"> + </button>
              </div>
            </div>    
          </div>
        </div>

        <div class='row no-gutters'>
          <div class='col'><h5 class='pt-2 TNR text-center'>GRAPPLE:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decStandard" data-target='grapple' type="button"> - </button>
              </div>
              <input type="text" id="grapple" name='grapple' class="form-control border text-center"
                value="<?php echo $charSkills['Grapple']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-warning border incStandard" data-target='grapple' type="button"> + </button>
              </div>
            </div>    
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>ARCHERY:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decStandard" data-target='archery' type="button"> - </button>
              </div>
              <input type="text" id="archery" name='archery' class="form-control border text-center"
                value="<?php echo $charSkills['Archery']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-warning border incStandard" data-target='archery' type="button"> + </button>
              </div>
            </div>    
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>LOGIC:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decTrait" data-target='logic' type="button"> - </button>
              </div>
              <input type="text" id="logic" name='logic' class="form-control border text-center"
                value="<?php echo $charTraits['Logic']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-info border incTrait" data-target='logic' type="button"> + </button>
              </div>
            </div>    
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>ENDURANCE:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decTrait" data-target='endurance' type="button"> - </button>
              </div>
              <input type="text" id="endurance" name='endurance' class="form-control border text-center"
                value="<?php echo $charTraits['Endurance']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-info border incTrait" data-target='endurance' type="button"> + </button>
              </div>
            </div>    
          </div>
        </div>

        <div class='row no-gutters'>
          <div class='col'><h5 class='pt-2 TNR text-center'>SHORT:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decStandard" data-target='shortWeapons' type="button"> - </button>
              </div>
              <input type="text" id="shortWeapons" name='shortWeapons' class="form-control border text-center"
                value="<?php echo $charSkills['ShortWeapons']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-warning border incStandard" data-target='shortWeapons' type="button"> + </button>
              </div>
            </div>    
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>PISTOLS:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decStandard" data-target='pistols' type="button"> - </button>
              </div>
              <input type="text" id="pistols" name='pistols' class="form-control border text-center"
                value="<?php echo $charSkills['Pistols']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-warning border incStandard" data-target='pistols' type="button"> + </button>
              </div>
            </div>    
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>PERCEPTION:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decTrait" data-target='perception' type="button"> - </button>
              </div>
              <input type="text" id="perception" name='perception' class="form-control border text-center"
                value="<?php echo $charTraits['Perception']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-info border incTrait" data-target='perception' type="button"> + </button>
              </div>
            </div>    
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>AGILITY:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decTrait" data-target='agility' type="button"> - </button>
              </div>
              <input type="text" id="agility" name='agility' class="form-control border text-center"
                value="<?php echo $charTraits['Agility']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-info border incTrait" data-target='agility' type="button"> + </button>
              </div>
            </div>    
          </div>
        </div>

        <div class='row no-gutters'>
          <div class='col'><h5 class='pt-2 TNR text-center'>LONG:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decStandard" data-target='longWeapons' type="button"> - </button>
              </div>
              <input type="text" id="longWeapons" name='longWeapons' class="form-control border text-center"
                value="<?php echo $charSkills['LongWeapons']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-warning border incStandard" data-target='longWeapons' type="button"> + </button>
              </div>
            </div>    
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>RIFLES:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decStandard" data-target='rifles' type="button"> - </button>
              </div>
              <input type="text" id="rifles" name='rifles' class="form-control border text-center"
                value="<?php echo $charSkills['Rifles']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-warning border incStandard" data-target='rifles' type="button"> + </button>
              </div>
            </div>    
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>WILLPOWER:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decTrait" data-target='willpower' type="button"> - </button>
              </div>
              <input type="text" id="willpower" name='willpower' class="form-control border text-center"
                value="<?php echo $charTraits['Willpower']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-info border incTrait" data-target='willpower' type="button"> + </button>
              </div>
            </div>    
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>SPEED:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decTrait" data-target='speed' type="button"> - </button>
              </div>
              <input type="text" id="speed" name='speed' class="form-control border text-center"
                value="<?php echo $charTraits['Speed']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-info border incTrait" data-target='speed' type="button"> + </button>
              </div>
            </div>    
          </div>
        </div>

        <div class='row no-gutters'>
          <div class='col'><h5 class='pt-2 TNR text-center'>TWO HAND:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decStandard" data-target='twoHand' type="button"> - </button>
              </div>
              <input type="text" id="twoHand" name='twoHand' class="form-control border text-center"
                value="<?php echo $charSkills['TwoHandWeapons']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-warning border incStandard" data-target='twoHand' type="button"> + </button>
              </div>
            </div>    
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>BURST:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decAdvanced" data-target='burst' type="button"> - </button>
              </div>
              <input type="text" id="burst" name='burst' class="form-control border text-center"
                value="<?php echo $charSkills['Burst']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-success border incAdvanced" data-target='burst' type="button"> + </button>
              </div>
            </div>    
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>CHARISMA:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decTrait" data-target='charisma' type="button"> - </button>
              </div>
              <input type="text" id="charisma" name='charisma' class="form-control border text-center"
                value="<?php echo $charTraits['Charisma']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-info border incTrait" data-target='charisma' type="button"> + </button>
              </div>
            </div>    
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>BEAUTY:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="beauty" name='beauty' class="form-control border text-center"
                value="<?php echo $charTraits['Beauty']; ?>" readonly />
            </div>
          </div>
        </div>

        <div class='row no-gutters'>
          <div class='col'><h5 class='pt-2 TNR text-center'>CHAIN:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decStandard" data-target='chain' type="button"> - </button>
              </div>
              <input type="text" id="chain" name='chain' class="form-control border text-center"
                value="<?php echo $charSkills['ChainWeapons']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-warning border incStandard" data-target='chain' type="button"> + </button>
              </div>
            </div>    
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>SPECIAL:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decAdvanced" data-target='special' type="button"> - </button>
              </div>
              <input type="text" id="special" name='special' class="form-control border text-center"
                value="<?php echo $charSkills['SpecialWeapons']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-success border incAdvanced" data-target='special' type="button"> + </button>
              </div>
            </div>    
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>ACTIONS:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="actions" name='actions' class="form-control border text-center"
                value="<?php echo $charTraits['Actions']; ?>" readonly />
            </div>
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>SEQUENCE:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="sequence" name='sequence' class="form-control border text-center"
                value="<?php echo $charTraits['Sequence']; ?>" readonly />
            </div>
          </div>
        </div>

        <div class='row no-gutters'>
          <div class='col'><h5 class='pt-2 TNR text-center'>SHIELD:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decStandard" data-target='shield' type="button"> - </button>
              </div>
              <input type="text" id="shield" name='shield' class="form-control border text-center"
                value="<?php echo $charSkills['Shield']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-warning border incStandard" data-target='shield' type="button"> + </button>
              </div>
            </div>    
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>WEAPON SYS:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decAdvanced" data-target='weaponSys' type="button"> - </button>
              </div>
              <input type="text" id="weaponSys" name='weaponSys' class="form-control border text-center"
                value="<?php echo $charSkills['WeaponSystems']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-success border incAdvanced" data-target='weaponSys' type="button"> + </button>
              </div>
            </div>    
          </div>
          <div class='col'></div>
          <div class='col'><h5 class='pt-2 TNR text-center'>OFF HAND:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decOffHand" data-target='offHand' type="button"> - </button>
              </div>
              <input type="text" id="offHand" name='offHand' class="form-control border text-center"
                value="<?php echo $charSkills['OffHand']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-success border incOffHand" data-target='offHand' type="button"> + </button>
              </div>
            </div>    
          </div>
          <div class='col'></div>
        </div>

        <div class='row no-gutters'>
          <div class='col'><h5 class='pt-2 TNR text-center'>BLOCK:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decBlock" data-target='block' type="button"> - </button>
              </div>
              <input type="text" id="block" name='block' class="form-control border text-center"
                value="<?php echo $charSkills['Block']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-warning border incBlock" data-target='block' type="button"> + </button>
              </div>
            </div>    
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>DODGE:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decDodge" data-target='dodge' type="button"> - </button>
              </div>
              <input type="text" id="dodge" name='dodge' class="form-control border text-center"
                value="<?php echo $charSkills['Dodge']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-success border incDodge" data-target='dodge' type="button"> + </button>
              </div>
            </div>    
          </div>
          <div class='col'></div>
          <div class='col'><h5 class='pt-2 TNR text-center'>GAMBLING:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="gambling" name='gambling' class="form-control border text-center"
                value="<?php echo $charSkills['Gambling']; ?>" readonly />
            </div>
          </div>
          <div class='col'></div>                
        </div>

        <div class='row no-gutters'>
          <div class='col'><h4 class='TNR text-center'><u>COVERT SKILLS</u></h4></div>
          <div class='col'><h4 class='TNR text-center'><u>SURVIVAL SKILLS</u></h4></div>
        </div>

        <div class='row no-gutters'>
          <div class='col'><h5 class='pt-2 TNR text-center'>STEALTH:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decStandard" data-target='stealth' type="button"> - </button>
              </div>
              <input type="text" id="stealth" name='stealth' class="form-control border text-center"
                value="<?php echo $charSkills['Stealth']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-warning border incStandard" data-target='stealth' type="button"> + </button>
              </div>
            </div>    
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>CONCEAL:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decStandard" data-target='concealment' type="button"> - </button>
              </div>
              <input type="text" id="concealment" name='concealment' class="form-control border text-center"
                value="<?php echo $charSkills['Concealment']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-warning border incStandard" data-target='concealment' type="button"> + </button>
              </div>
            </div>    
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>ENV AWARE:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decStandard" data-target='envAware' type="button"> - </button>
              </div>
              <input type="text" id="envAware" name='envAware' class="form-control border text-center"
                value="<?php echo $charSkills['EnvAware']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-warning border incStandard" data-target='envAware' type="button"> + </button>
              </div>
            </div>    
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>SURVEY:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decStandard" data-target='surveillance' type="button"> - </button>
              </div>
              <input type="text" id="surveillance" name='surveillance' class="form-control border text-center"
                value="<?php echo $charSkills['Surveillance']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-warning border incStandard" data-target='surveillance' type="button"> + </button>
              </div>
            </div>    
          </div>
        </div>

        <div class='row no-gutters'>
          <div class='col'><h5 class='pt-2 TNR text-center'>SLEIGHT:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decAdvanced" data-target='sleight' type="button"> - </button>
              </div>
              <input type="text" id="sleight" name='sleight' class="form-control border text-center"
                value="<?php echo $charSkills['Sleight']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-success border incAdvanced" data-target='sleight' type="button"> + </button>
              </div>
            </div>    
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>LOCKPICK:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decAdvanced" data-target='lockpick' type="button"> - </button>
              </div>
              <input type="text" id="lockpick" name='lockpick' class="form-control border text-center"
                value="<?php echo $charSkills['Lockpick']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-success border incAdvanced" data-target='lockpick' type="button"> + </button>
              </div>
            </div>    
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>NAVIGATION:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decStandard" data-target='navigation' type="button"> - </button>
              </div>
              <input type="text" id="navigation" name='navigation' class="form-control border text-center"
                value="<?php echo $charSkills['Navigation']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-warning border incStandard" data-target='navigation' type="button"> + </button>
              </div>
            </div>    
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>PRESERVATION:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decStandard" data-target='preservation' type="button"> - </button>
              </div>
              <input type="text" id="preservation" name='preservation' class="form-control border text-center"
                value="<?php echo $charSkills['Preservation']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-warning border incStandard" data-target='preservation' type="button"> + </button>
              </div>
            </div>    
          </div>
        </div>

        <div class='row no-gutters'>
          <div class='col'><h5 class='pt-2 TNR text-center'>FORGERY:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decAdvanced" data-target='forgery' type="button"> - </button>
              </div>
              <input type="text" id="forgery" name='forgery' class="form-control border text-center"
                value="<?php echo $charSkills['Forgery']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-success border incAdvanced" data-target='forgery' type="button"> + </button>
              </div>
            </div>    
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>CRYPTO:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decAdvanced" data-target='cryptography' type="button"> - </button>
              </div>
              <input type="text" id="cryptography" name='cryptography' class="form-control border text-center"
                value="<?php echo $charSkills['Cryptography']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-success border incAdvanced" data-target='cryptography' type="button"> + </button>
              </div>
            </div>    
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>TRACKING:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decStandard" data-target='tracking' type="button"> - </button>
              </div>
              <input type="text" id="tracking" name='tracking' class="form-control border text-center"
                value="<?php echo $charSkills['Tracking']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-warning border incStandard" data-target='tracking' type="button"> + </button>
              </div>
            </div>    
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>TRAPPING:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decStandard" data-target='trapping' type="button"> - </button>
              </div>
              <input type="text" id="trapping" name='trapping' class="form-control border text-center"
                value="<?php echo $charSkills['Trapping']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-warning border incStandard" data-target='trapping' type="button"> + </button>
              </div>
            </div>    
          </div>
        </div>
        
        <div class='row no-gutters'>
          <div class='col'><h5 class='pt-2 TNR text-center'>DISGUISE:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decAdvanced" data-target='disguise' type="button"> - </button>
              </div>
              <input type="text" id="disguise" name='disguise' class="form-control border text-center"
                value="<?php echo $charSkills['Disguise']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-success border incAdvanced" data-target='disguise' type="button"> + </button>
              </div>
            </div>    
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>RESTRAINTS:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decStandard" data-target='restraints' type="button"> - </button>
              </div>
              <input type="text" id="restraints" name='restraints' class="form-control border text-center"
                value="<?php echo $charSkills['Restraints']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-warning border incStandard" data-target='restraints' type="button"> + </button>
              </div>
            </div>    
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>FISHING:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decStandard" data-target='fishing' type="button"> - </button>
              </div>
              <input type="text" id="fishing" name='fishing' class="form-control border text-center"
                value="<?php echo $charSkills['Fishing']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-warning border incStandard" data-target='fishing' type="button"> + </button>
              </div>
            </div>    
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>FIRST AID:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decAdvanced" data-target='firstAid' type="button"> - </button>
              </div>
              <input type="text" id="firstAid" name='firstAid' class="form-control border text-center"
                value="<?php echo $charSkills['FirstAid']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-success border incAdvanced" data-target='firstAid' type="button"> + </button>
              </div>
            </div>    
          </div>
        </div>

        <div class='row'>
          <div class='col-6'><h4 class='TNR text-center'><u>TRANSPORTATION SKILLS</u></h4></div>
          <div class='col-6'><h4 class='TNR text-center'><u>TECHNOLOGY SKILLS</u></h4></div>
        </div>

        <div class='row no-gutters'>
          <div class='col'><h5 class='pt-2 TNR text-center'>SKATEBOARD:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decStandard" data-target='skateboard' type="button"> - </button>
              </div>
              <input type="text" id="skateboard" name='skateboard' class="form-control border text-center"
                value="<?php echo $charSkills['Skateboard']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-warning border incStandard" data-target='skateboard' type="button"> + </button>
              </div>
            </div>    
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>BICYCLE:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decStandard" data-target='bicycle' type="button"> - </button>
              </div>
              <input type="text" id="bicycle" name='bicycle' class="form-control border text-center"
                value="<?php echo $charSkills['Bicycle']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-warning border incStandard" data-target='bicycle' type="button"> + </button>
              </div>
            </div>    
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>CRAFTING:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decStandard" data-target='crafting' type="button"> - </button>
              </div>
              <input type="text" id="crafting" name='crafting' class="form-control border text-center"
                value="<?php echo $charSkills['Crafting']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-warning border incStandard" data-target='crafting' type="button"> + </button>
              </div>
            </div>    
          </div>
          <div class='col'></div>
          <div class='col'></div>
        </div>

        <div class='row no-gutters'>
          <div class='col'><h5 class='pt-2 TNR text-center'>HORSE:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decStandard" data-target='horsemanship' type="button"> - </button>
              </div>
              <input type="text" id="horsemanship" name='horsemanship' class="form-control border text-center"
                value="<?php echo $charSkills['Horsemanship']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-warning border incStandard" data-target='horsemanship' type="button"> + </button>
              </div>
            </div>    
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>AUTOMOBILE:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decStandard" data-target='automobile' type="button"> - </button>
              </div>
              <input type="text" id="automobile" name='automobile' class="form-control border text-center"
                value="<?php echo $charSkills['Automobile']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-warning border incStandard" data-target='automobile' type="button"> + </button>
              </div>
            </div>    
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>COMPUTERS:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decStandard" data-target='computers' type="button"> - </button>
              </div>
              <input type="text" id="computers" name='computers' class="form-control border text-center"
                value="<?php echo $charSkills['Computers']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-warning border incStandard" data-target='computers' type="button"> + </button>
              </div>
            </div>    
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>PROGRAM:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decAdvanced" data-target='programming' type="button"> - </button>
              </div>
              <input type="text" id="programming" name='programming' class="form-control border text-center"
                value="<?php echo $charSkills['Programming']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-success border incAdvanced" data-target='programming' type="button"> + </button>
              </div>
            </div>    
          </div>
        </div>

        <div class='row no-gutters'>
          <div class='col'><h5 class='pt-2 TNR text-center'>MOTORCYCLE:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decStandard" data-target='motorcycle' type="button"> - </button>
              </div>
              <input type="text" id="motorcycle" name='motorcycle' class="form-control border text-center"
                value="<?php echo $charSkills['Motorcycle']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-warning border incStandard" data-target='motorcycle' type="button"> + </button>
              </div>
            </div>    
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>JET SKI:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decStandard" data-target='jetSki' type="button"> - </button>
              </div>
              <input type="text" id="jetSki" name='jetSki' class="form-control border text-center"
                value="<?php echo $charSkills['Jet Ski']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-warning border incStandard" data-target='jetSki' type="button"> + </button>
              </div>
            </div>    
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>RADIOS:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decStandard" data-target='radios' type="button"> - </button>
              </div>
              <input type="text" id="radios" name='radios' class="form-control border text-center"
                value="<?php echo $charSkills['Radios']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-warning border incStandard" data-target='radios' type="button"> + </button>
              </div>
            </div>    
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>NETWORKS:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decStandard" data-target='networks' type="button"> - </button>
              </div>
              <input type="text" id="networks" name='networks' class="form-control border text-center"
                value="<?php echo $charSkills['Networks']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-warning border incStandard" data-target='networks' type="button"> + </button>
              </div>
            </div>    
          </div>
        </div>

        <div class='row no-gutters'>
          <div class='col'><h5 class='pt-2 TNR text-center'>SAILING:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decStandard" data-target='sailing' type="button"> - </button>
              </div>
              <input type="text" id="sailing" name='sailing' class="form-control border text-center"
                value="<?php echo $charSkills['Sailing']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-warning border incStandard" data-target='sailing' type="button"> + </button>
              </div>
            </div>    
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>BOATING:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decStandard" data-target='boating' type="button"> - </button>
              </div>
              <input type="text" id="boating" name='boating' class="form-control border text-center"
                value="<?php echo $charSkills['Boating']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-warning border incStandard" data-target='boating' type="button"> + </button>
              </div>
            </div>    
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>MECHANICS:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decStandard" data-target='mechanics' type="button"> - </button>
              </div>
              <input type="text" id="mechanics" name='mechanics' class="form-control border text-center"
                value="<?php echo $charSkills['Mechanics']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-warning border incStandard" data-target='mechanics' type="button"> + </button>
              </div>
            </div>    
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>ELECTRICAL:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decStandard" data-target='electrical' type="button"> - </button>
              </div>
              <input type="text" id="electrical" name='electrical' class="form-control border text-center"
                value="<?php echo $charSkills['Electrical']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-warning border incStandard" data-target='electrical' type="button"> + </button>
              </div>
            </div>    
          </div>
        </div>

        <div class='row no-gutters'>
          <div class='col'><h5 class='pt-2 TNR text-center'>MULTI GEAR:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decAdvanced" data-target='multiGear' type="button"> - </button>
              </div>
              <input type="text" id="multiGear" name='multiGear' class="form-control border text-center"
                value="<?php echo $charSkills['Multi Gear']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-success border incAdvanced" data-target='multiGear' type="button"> + </button>
              </div>
            </div>    
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>HVY EQUIP:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decAdvanced" data-target='hvyEquip' type="button"> - </button>
              </div>
              <input type="text" id="hvyEquip" name='hvyEquip' class="form-control border text-center"
                value="<?php echo $charSkills['Heavy Equip']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-success border incAdvanced" data-target='hvyEquip' type="button"> + </button>
              </div>
            </div>    
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>CIRCUITRY:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decStandard" data-target='circuitry' type="button"> - </button>
              </div>
              <input type="text" id="circuitry" name='circuitry' class="form-control border text-center"
                value="<?php echo $charSkills['Circuitry']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-warning border incStandard" data-target='circuitry' type="button"> + </button>
              </div>
            </div>    
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>EXPLOSIVES:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decAdvanced" data-target='explosives' type="button"> - </button>
              </div>
              <input type="text" id="explosives" name='explosives' class="form-control border text-center"
                value="<?php echo $charSkills['Explosives']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-success border incAdvanced" data-target='explosives' type="button"> + </button>
              </div>
            </div>    
          </div>
        </div>

        <div class='row no-gutters'>
          <div class='col'><h5 class='pt-2 TNR text-center'>HELICOPTERS:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decAdvanced" data-target='helicopters' type="button"> - </button>
              </div>
              <input type="text" id="helicopters" name='helicopters' class="form-control border text-center"
                value="<?php echo $charSkills['Helicopters']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-success border incAdvanced" data-target='helicopters' type="button"> + </button>
              </div>
            </div>    
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>AIRPLANES:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decAdvanced" data-target='airplanes' type="button"> - </button>
              </div>
              <input type="text" id="airplanes" name='airplanes' class="form-control border text-center"
                value="<?php echo $charSkills['Airplanes']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-success border incAdvanced" data-target='airplanes' type="button"> + </button>
              </div>
            </div>    
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>CONSTRUCT:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decAdvanced" data-target='construction' type="button"> - </button>
              </div>
              <input type="text" id="construction" name='construction' class="form-control border text-center"
                value="<?php echo $charSkills['Construction']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-success border incAdvanced" data-target='construction' type="button"> + </button>
              </div>
            </div>    
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>ARCHITECT:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decAdvanced" data-target='architecture' type="button"> - </button>
              </div>
              <input type="text" id="architecture" name='architecture' class="form-control border text-center"
                value="<?php echo $charSkills['Architecture']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-success border incAdvanced" data-target='architecture' type="button"> + </button>
              </div>
            </div>    
          </div>
        </div>

        <div class='row no-gutters'>
          <div class='col'><h4 class='TNR text-center'><u>SOFT SKILLS & LANGUAGES</u></h4></div>
          <div class='col'><h4 class='TNR text-center'><u>SCIENCE SKILLS</u></h4></div>
        </div>

        <div class='row no-gutters'>
          <div class='col'><h5 class='pt-2 TNR text-center'>NEGOTIATE:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decStandard" data-target='negotiation' type="button"> - </button>
              </div>
              <input type="text" id="negotiation" name='negotiation' class="form-control border text-center"
                value="<?php echo $charSkills['Negotiation']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-warning border incStandard" data-target='negotiation' type="button"> + </button>
              </div>
            </div>    
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>GUILE:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decStandard" data-target='guile' type="button"> - </button>
              </div>
              <input type="text" id="guile" name='guile' class="form-control border text-center"
                value="<?php echo $charSkills['Guile']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-warning border incStandard" data-target='guile' type="button"> + </button>
              </div>
            </div>    
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>HISTORY:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decStandard" data-target='history' type="button"> - </button>
              </div>
              <input type="text" id="history" name='history' class="form-control border text-center"
                value="<?php echo $charSkills['History']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-warning border incStandard" data-target='history' type="button"> + </button>
              </div>
            </div>    
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>FORENSICS:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decAdvanced" data-target='forensics' type="button"> - </button>
              </div>
              <input type="text" id="forensics" name='forensics' class="form-control border text-center"
                value="<?php echo $charSkills['Forensics']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-success border incAdvanced" data-target='forensics' type="button"> + </button>
              </div>
            </div>    
          </div>
        </div>

        <div class='row no-gutters'>
          <div class='col'><h5 class='pt-2 TNR text-center'>ETIQUETTE:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decAdvanced" data-target='etiquette' type="button"> - </button>
              </div>
              <input type="text" id="etiquette" name='etiquette' class="form-control border text-center"
                value="<?php echo $charSkills['Etiquette']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-success border incAdvanced" data-target='etiquette' type="button"> + </button>
              </div>
            </div>    
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>ANIMALS:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decStandard" data-target='animals' type="button"> - </button>
              </div>
              <input type="text" id="animals" name='animals' class="form-control border text-center"
                value="<?php echo $charSkills['Animal Handling']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-warning border incStandard" data-target='animals' type="button"> + </button>
              </div>
            </div>    
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>BIOLOGY:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decStandard" data-target='biology' type="button"> - </button>
              </div>
              <input type="text" id="biology" name='biology' class="form-control border text-center"
                value="<?php echo $charSkills['Biology']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-warning border incStandard" data-target='biology' type="button"> + </button>
              </div>
            </div>    
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>CHEMISTRY:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decStandard" data-target='chemistry' type="button"> - </button>
              </div>
              <input type="text" id="chemistry" name='chemistry' class="form-control border text-center"
                value="<?php echo $charSkills['Chemistry']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-warning border incStandard" data-target='chemistry' type="button"> + </button>
              </div>
            </div>    
          </div>
        </div>

        <div class='row no-gutters'>
          <div class='col'><h5 class='pt-2 TNR text-center'>APPRAISAL:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decAdvanced" data-target='appraisal' type="button"> - </button>
              </div>
              <input type="text" id="appraisal" name='appraisal' class="form-control border text-center"
                value="<?php echo $charSkills['Appraisal']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-success border incAdvanced" data-target='appraisal' type="button"> + </button>
              </div>
            </div>    
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>LEGAL:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decAdvanced" data-target='legal' type="button"> - </button>
              </div>
              <input type="text" id="legal" name='legal' class="form-control border text-center"
                value="<?php echo $charSkills['Legal']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-success border incAdvanced" data-target='legal' type="button"> + </button>
              </div>
            </div>    
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>BOTANY:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decStandard" data-target='botany' type="button"> - </button>
              </div>
              <input type="text" id="botany" name='botany' class="form-control border text-center"
                value="<?php echo $charSkills['Botany']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-warning border incStandard" data-target='botany' type="button"> + </button>
              </div>
            </div>    
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>MYCOLOGY:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decStandard" data-target='mycology' type="button"> - </button>
              </div>
              <input type="text" id="mycology" name='mycology' class="form-control border text-center"
                value="<?php echo $charSkills['Mycology']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-warning border incStandard" data-target='mycology' type="button"> + </button>
              </div>
            </div>    
          </div>
        </div>

        <div class='row no-gutters'>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="lang1" name='lang1' class="form-control border text-center TNR langSlot" data-target='lang1Value'
                value="<?php echo $charInfo['SecondLanguage']; ?>" readonly /> 
            </div>
          </div>

          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decLanguage" data-target='lang1Value' data-lang='lang1' type="button"> - </button>
              </div>
              <input type="text" id="lang1Value" name='lang1Value' class="form-control border text-center"
                value="<?php echo $charSkills['SecondLang']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-warning border incLanguage" data-target='lang1Value' type="button"> + </button>
              </div>
            </div>    
          </div>
          
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="lang2" name='lang2' class="form-control border text-center TNR langSlot" data-target='lang2Value'
                 value="<?php echo $charInfo['ThirdLanguage']; ?>" readonly />
            </div>
          </div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decLanguage" data-target='lang2Value' data-lang='lang2' type="button"> - </button>
              </div>
              <input type="text" id="lang2Value" name='lang2Value' class="form-control border text-center"
                value="<?php echo $charSkills['ThirdLang']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-warning border incLanguage" data-target='lang2Value' type="button"> + </button>
              </div>
            </div>    
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>TOXIC:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decAdvanced" data-target='toxicology' type="button"> - </button>
              </div>
              <input type="text" id="toxicology" name='toxicology' class="form-control border text-center"
                value="<?php echo $charSkills['Toxicology']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-success border incAdvanced" data-target='toxicology' type="button"> + </button>
              </div>
            </div>    
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>PHARMA:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decAdvanced" data-target='pharmacology' type="button"> - </button>
              </div>
              <input type="text" id="pharmacology" name='pharmacology' class="form-control border text-center"
                value="<?php echo $charSkills['Pharmacology']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-success border incAdvanced" data-target='pharmacology' type="button"> + </button>
              </div>
            </div>    
          </div>
        </div>

        <div class='row no-gutters'>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="lang3" name='lang3' class="form-control border text-center TNR langSlot" data-target='lang3Value'
                  value="<?php echo $charInfo['FourthLanguage']; ?>" readonly />
            </div>
          </div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decLanguage" data-target='lang3Value' data-lang='lang3' type="button"> - </button>
              </div>
              <input type="text" id="lang3Value" name='lang3Value' class="form-control border text-center"
                value="<?php echo $charSkills['FourthLang']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-warning border incLanguage" data-target='lang3Value' type="button"> + </button>
              </div>
            </div>    
          </div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="lang4" name='lang4' class="form-control border text-center TNR langSlot" data-target='lang4Value'
                  value="<?php echo $charInfo['FifthLanguage']; ?>" readonly />
            </div>
          </div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decLanguage" data-target='lang4Value' data-lang='lang4' type="button"> - </button>
              </div>
              <input type="text" id="lang4Value" name='lang4Value' class="form-control border text-center"
                value="<?php echo $charSkills['FifthLang']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-warning border incLanguage" data-target='lang4Value' type="button"> + </button>
              </div>
            </div>    
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>SURGERY:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decSurgery" data-target='surgery' type="button"> - </button>
              </div>
              <input type="text" id="surgery" name='surgery' class="form-control border text-center"
                value="<?php echo $charSkills['Surgery']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-success border incSurgery" data-target='surgery' type="button"> + </button>
              </div>
            </div>    
          </div>
          <div class='col'><h5 class='pt-2 TNR text-center'>MEDICINE:</h5></div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <button class="btn btn-danger border decMedicine" data-target='medicine' type="button"> - </button>
              </div>
              <input type="text" id="medicine" name='medicine' class="form-control border text-center"
                value="<?php echo $charSkills['Medicine']; ?>" readonly />
              <div class="input-group-append">
                <button class="btn btn-success border incMedicine" data-target='medicine' type="button"> + </button>
              </div>
            </div>    
          </div>
        </div>

        <div class='row no-gutters'>
          <div class='col-1'></div>
          <div class='col-4'><button type="button" id='learnLangBtn' class="btn btn-warning btn-lg btn-block border">LEARN NEW LANGUAGE</button></div>  
          <div class='col-1'></div>
          <div class='col-6'></div>
        </div>

        <div class='row no-gutters'>
          <div class='col'></div>
          <div class='col'><h4 class='TNR text-center'><u>COMBAT ABILITIES</u></h4></div>
          <div class='col'></div>
        </div>

        <div class='row no-gutters'>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="ability1" name='ability1' class="form-control border text-center TNR abilitySlot" 
                value='<?php echo $charAbilities["1"] ?>' readonly />
            </div>
          </div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="ability2" name='ability2' class="form-control border text-center TNR abilitySlot" 
                value='<?php echo $charAbilities["2"] ?>' readonly />
            </div>
          </div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="ability3" name='ability3' class="form-control border text-center TNR abilitySlot" 
                value='<?php echo $charAbilities["3"] ?>' readonly />
            </div>
          </div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="ability4" name='ability4' class="form-control border text-center TNR abilitySlot" 
                value='<?php echo $charAbilities["4"] ?>' readonly />
            </div>
          </div>
        </div>

        <div class='row no-gutters'>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="ability5" name='ability5' class="form-control border text-center TNR abilitySlot" 
                value='<?php echo $charAbilities["5"] ?>' readonly />
            </div>
          </div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="ability6" name='ability6' class="form-control border text-center TNR abilitySlot" 
                value='<?php echo $charAbilities["6"] ?>' readonly />
            </div>
          </div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="ability7" name='ability7' class="form-control border text-center TNR abilitySlot" 
                value='<?php echo $charAbilities["7"] ?>' readonly />
            </div>
          </div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="ability8" name='ability8' class="form-control border text-center TNR abilitySlot" 
                value='<?php echo $charAbilities["8"] ?>' readonly />
            </div>
          </div>
        </div>

        <div class='row no-gutters'>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="ability9" name='ability9' class="form-control border text-center TNR abilitySlot" 
                value='<?php echo $charAbilities["9"] ?>' readonly />
            </div>
          </div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="ability10" name='ability10' class="form-control border text-center TNR abilitySlot" 
                value='<?php echo $charAbilities["10"] ?>' readonly />
            </div>
          </div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="ability11" name='ability11' class="form-control border text-center TNR abilitySlot" 
                value='<?php echo $charAbilities["11"] ?>' readonly />
            </div>
          </div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="ability12" name='ability12' class="form-control border text-center TNR abilitySlot" 
                value='<?php echo $charAbilities["12"] ?>' readonly />
            </div>
          </div>
        </div>

        <div class='row no-gutters'>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="ability13" name='ability13' class="form-control border text-center TNR abilitySlot" 
                value='<?php echo $charAbilities["13"] ?>' readonly />
            </div>
          </div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="ability14" name='ability14' class="form-control border text-center TNR abilitySlot" 
                value='<?php echo $charAbilities["14"] ?>' readonly />
            </div>
          </div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="ability15" name='ability15' class="form-control border text-center TNR abilitySlot" 
                value='<?php echo $charAbilities["15"] ?>' readonly />
            </div>
          </div>
          <div class='col'>
            <div class="input-group input-group-lg">
              <input type="text" id="ability16" name='ability16' class="form-control border text-center TNR abilitySlot" 
                value='<?php echo $charAbilities["16"] ?>' readonly />
            </div>
          </div>
        </div>

        <div class='row no-gutters'>
          <div class='col'></div>
          <div class='col'><button type="button" id='learnAbilityBtn' class="btn btn-warning btn-lg btn-block border">LEARN NEW ABILITY</button></div>
          <div class='col'></div>
        </div>

        <br />
        <div class='row black'>
          <div class='col'></div>
          <div class='col'><button type='submit' id='abilityBtn' class='btn btn-success btn-lg btn-block border'>CONFIRM & SAVE</button></div>
          <div class='col'></div>
        </div>
      </form>

      <script src='js/instantMessage.js'></script>

      <script src='node_modules/socket.io-client/dist/socket.io.js'></script>

      <?php include("footer.php"); ?>
    </div>
  </body>
</html>