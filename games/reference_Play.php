<?php
  include("../inc/config.php");
  session_start();

  if (isset($_SESSION['ID']) == false){
    header("Location: ../login.php");
  }

  $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
  $username = $_SESSION['username'];
  $userID = $_SESSION['ID'];
  $character = parse_url($url, PHP_URL_QUERY);
  $characterName = rawurldecode($character);
  $gameName = $_SESSION['gameName']; 
  $gameID = $_SESSION['gameID'];

  //STAT PREP
  $characterSQL =  
    "SELECT ID, Background, Habitat, Age, Sex, Ethnicity, HairColor, HairStyle, FacialHair, EyeColor, SecondLanguage, ThirdLanguage,
      FourthLanguage, FifthLanguage, TotalExp, RemainingExp 
    FROM characters 
    WHERE UserID = '$userID' AND CharacterName = '$characterName' ";

  $result1 = mysqli_query($conn, $characterSQL);
  $charInfo = mysqli_fetch_assoc($result1);

  $characterID = $charInfo['ID'];
  $_SESSION['characterID'] = $characterID;

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

  $participantsSQL = 
    " SELECT DISTINCT GameID, UserID, CharacterID, PlayerActive 
      FROM game_participants AS GP 
      WHERE GameID = '$gameID' AND UserID = '$userID' AND CharacterID = '$characterID'";

    $result5 = mysqli_query($conn, $participantsSQL) or die(mysqli_error($conn));

    if($result5->num_rows > 0) {
      $GPUpdateSQL =
        "UPDATE game_participants
        SET PlayerActive = 1
        WHERE GameID = '$gameID' AND UserID = '$userID' AND CharacterID = '$characterID'";

      $result6 = $conn->query($GPUpdateSQL) or die(mysqli_error($conn));

    } else {
      $GPInsertSQL = 
        "INSERT INTO game_participants (GameID, UserID, CharacterID, PlayerActive)
        VALUES ('$gameID', '$userID', '$characterID', 1) ";

      $result7 = $conn->query($GPInsertSQL) or die(mysqli_error($conn));
    }
?>

<!doctype html>
<html lang='en' dir='ltr'>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $gameName ?></title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/styles.css" />

    <script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/game.js"></script>
    <script type="text/javascript">

      var name = "<?php echo $username; ?> [ <?php echo $characterName ?> ]";
      var characterID = "<?php echo $characterID ?>";
  
      // kick off chat
      var chat =  new Chat();

      $(function() {
      
        chat.getState(); 
         
        // watch textarea for key presses
        $("#sendie").keydown(function(event) {  
             
          var key = event.which;  
           
          //all keys including return.  
          if (key >= 33) {
                   
            var maxLength = $(this).attr("maxlength");  
            var length = this.value.length;  
                     
            // don't allow new content if length is maxed out
            if (length >= maxLength) {  
              event.preventDefault();  
            }  
          }  
        });
        // watch textarea for release of key press
        $('#sendie').keyup(function(e) { 
                   
          if (e.keyCode == 13) { 
            
            var text = $(this).val();
            var maxLength = $(this).attr("maxlength");  
            var length = text.length; 
                     
            // send 
            if (length <= maxLength + 1) { 
                     
              chat.send(text, name);  
              $(this).val("");
                  
            } else {
                    
              $(this).val(text.substring(0, maxLength)); 
            } 
          }
        });
      });
    </script>
  </head>

  <body onload="setInterval('chat.update()', 1000)">
    <div class="container-fluid black">
      <?php 
        include( $_SERVER['DOCUMENT_ROOT'] . '/aftermath/header.php' );
        include('../modals/idMarksModal.php'); 
        include('../modals/whisperModal.php');
        include('../modals/gameMapModal.php');   
      ?>      

      <!--PLAY INTERFACE-->
      <div class='row metal py-2'>
        <div class='col-12 col-sm-6 col-md-3'><img src='../img/graffiti/GameName.png' class='img-fluid h-100 mx-auto d-block' /></div>
        <div class='col-12 col-sm-6 col-md-3'>
          <div class="input-group input-group-lg">
            <input type="text" id="gameName" class="form-control border text-center" value='<?php echo $gameName; ?>' readonly />
          </div>
        </div>
        <div class='col-12 col-sm-6 col-md-3 py-1'><img src='../img/graffiti/storyteller.png' class='img-fluid h-100 mx-auto d-block' /></div>
        <div class='col-12 col-sm-6 col-md-3 py-1'>
          <div class="input-group input-group-lg">
            <input type="text" id="storytellerName" class="form-control border text-center" value='' readonly />
          </div>
        </div>
      </div>
      
        <!--CHAT AREA-->
        <div class='row'>
          <div class='col-12 col-md-8 col-lg-9 black px-0'>
            <div class='row'>
              <div class='col'>
                <div id="chat-area"></div>
              </div>
            </div>
            
            <div class='row'>
              <div class='col'>
                <form id="send-message-area">
                  <textarea id="sendie" maxlength='100' class='w-100' rows='1' ></textarea>            
                </form>
              </div>
            </div>
          </div>

          <div class='col-12 col-md-4 col-lg-3 brass interface'>
            <div class='row'>
              <div class='col-12 col-sm-6 order-sm-first col-md-12 py-2'>
                <button class="btn btn-warning btn-lg btn-block border" id='percentileBtn' type="button">PERCENTILE (%)</button>
              </div>
              <div class='col-12 col-sm-6 order-sm-3 col-md-12 py-2'>
                <button class="btn btn-warning btn-lg btn-block border" id='twoD10Btn' type="button">TRAITS (2D10)</button>
              </div>
              <div class='col-12 col-sm-6 order-sm-2 col-md-12 py-2'>
                <button class="btn btn-danger btn-lg btn-block border" id='randomHitBtn' type="button">RANDOM HIT</button>
              </div>
              <div class='col-12 col-sm-6 order-sm-4 col-md-12 py-2'>
                <button class="btn btn-info btn-lg btn-block border idMarksBtn" data-reference='<?php echo $characterID ?>' type="button">VIEW ID MARKS</button>
              </div>
              <div class='col-12 col-sm-6 order-sm-7 col-md-12 py-2'>
                <button class="btn btn-primary btn-lg btn-block border gameMapBtn" id='gameMapBtn' type="button" data-reference='<?php echo $gameID; ?>' >VIEW MAP</button>
              </div>
              <div class='col-12 col-sm-6 order-sm-5 col-md-12 py-md-0 py-sm-2'>
                <h4 class='TNR text-center'><strong>EXP POOL:</strong></h4>
              </div>
              <div class='col-12 col-sm-6 order-sm-6 col-md-12 pb-md-2'>
                <div class="input-group input-group-lg">
                  <input type="text" id="expPool" class="form-control border text-center" value="" readonly />
                </div>
              </div>
              <div class='col-12 col-sm-6 order-sm-8 col-md-12 py-2'>
                <button data-target='../characterManagement.php?<?php echo $characterName ?>' role='button' class="btn btn-success btn-lg btn-block border" id='charMgmtBtn'>
                  CHARACTER MGMT</button>
              </div>
              <div class='col-12 col-sm-6 order-sm-9 offset-sm-6 offset-md-0 col-md-12 py-2'>
                <button role='button' class="btn btn-secondary btn-lg btn-block border" id='whisperBtn' type='button'>WHISPER</button>
              </div>
            </div>
          </div>
        </div>
        <!--END INTERFACE-->

        <div class='row metal py-2'>
          <div class='col px-0'>
            <img src='../img/graffiti/notesX.png' class='img-fluid h-100 mx-auto d-block' />
          </div>
        </div>

        <div class='row'>
          <div class='col px-0'>
            <textarea class='w-100' rows='4'></textarea>
          </div>
        </div>

      <!--SHEET BEGIN-->
      <div class='characterSheet my-4'>
        
        <div class='row'>
          <div class='col'><h4 class='text-center'><strong>DEMOGRAPHIC INFORMATION</strong></h4></div>
        </div>

        <!--DEMOGRAPHIC INFO-->
        <div class='row'>
          <div class='col-12 col-lg-4 py-1'>
            <img src='../img/misc/picSlot.png' class='img-fluid h-100 mx-auto d-block' id='characterPic'>
          </div>
          <div class='col-lg-8'>
            <div class='row'>
              <div class='col-12 col-sm-6 col-md-3 py-sm-1'><h5 class='pt-3 text-center'><strong>NAME:</strong></h5></div>
              <div class='col-12 col-sm-6 col-md-3 py-sm-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="name" name="name" class="form-control border text-center" value='<?php echo $characterName; ?>' readonly />
                </div>
              </div>
              <div class='col-12 col-sm-6 col-md-3 py-sm-1'><h5 class='pt-3 text-center'><strong>BACKGROUND:</strong></h5></div>
              <div class='col-12 col-sm-6 col-md-3 py-sm-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="background" name="background" class="form-control border text-center" value="<?php echo $charInfo['Background']; ?>" readonly />
                </div>
              </div>
              <div class='col-12 col-sm-6 col-md-3 py-sm-1'><h5 class='pt-3 text-center'><strong>HABITAT:</strong></h5></div>
              <div class='col-12 col-sm-6 col-md-3 py-sm-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="habitat" name="habitat" class="form-control border text-center" value="<?php echo $charInfo['Habitat']; ?>" readonly />
                </div>
              </div>
              <div class='col-12 col-sm-6 col-md-3 py-sm-1'><h5 class='pt-3 text-center'><strong>ETHNICITY:</strong></h5></div>
              <div class='col-12 col-sm-6 col-md-3 py-sm-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="ethnicity" name="ethnicity" class="form-control border text-center" value="<?php echo $charInfo['Ethnicity']; ?>" readonly />
                </div>
              </div>
              <div class='col-12 col-sm-6 col-md-3 py-sm-1'><h5 class='pt-3 text-center'><strong>AGE:</strong></h5></div>
              <div class='col-12 col-sm-6 col-md-3 py-sm-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="age" name="age" class="form-control border text-center" value="<?php echo $charInfo['Age']; ?>" readonly />
                </div>
              </div>  
              <div class='col-12 col-sm-6 col-md-3 py-sm-1'><h5 class='pt-3 text-center'><strong>SEX:</strong></h5></div>
              <div class='col-12 col-sm-6 col-md-3 py-sm-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="sex" name="sex" class="form-control border text-center" value="<?php echo $charInfo['Sex']; ?>" readonly />
                </div>
              </div>
              <div class='col-12 col-sm-6 col-md-3 py-sm-1'><h5 class='pt-3 text-center'><strong>HAIR STYLE:</strong></h5></div>
              <div class='col-12 col-sm-6 col-md-3 py-sm-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="hairStyle" name="hairStyle" class="form-control border text-center" value="<?php echo $charInfo['HairStyle']; ?>" readonly />
                </div>
              </div>
              <div class='col-12 col-sm-6 col-md-3 py-sm-1'><h5 class='pt-3 text-center'><strong>HAIR COLOR:</strong></h5></div>
              <div class='col-12 col-sm-6 col-md-3 py-sm-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="hairColor" name="hairColor" class="form-control border text-center" value="<?php echo $charInfo['HairColor']; ?>" readonly />
                </div>
              </div>
              <div class='col-12 col-sm-6 col-md-3 py-sm-1'><h5 class='pt-3 text-center'><strong>FACIAL HAIR:</strong></h5></div>
              <div class='col-12 col-sm-6 col-md-3 py-sm-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="facialHair" name="facialHair" class="form-control border text-center" value="<?php echo $charInfo['FacialHair']; ?>" readonly/>
                </div>
              </div>
              <div class='col-12 col-sm-6 col-md-3 py-sm-1'><h5 class='pt-3 text-center'><strong>EYE COLOR:</strong></h5></div>
              <div class='col-12 col-sm-6 col-md-3 py-sm-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="eyeColor" name="eyeColor" class="form-control border text-center"
                    value="<?php echo $charInfo['EyeColor']; ?>" readonly />
                </div>
              </div>
              <div class='col-12 col-sm-6 col-md-3 py-sm-1'><h5 class='pt-3 text-center'><strong>EXP POOL:</strong></h5></div>
              <div class='col-12 col-sm-6 col-md-3 py-sm-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="expPool" name="expPool" class="form-control border text-center experience"
                    value="<?php echo $charInfo['RemainingExp']; ?>" readonly />
                </div>
              </div>
              <div class='col-12 col-sm-6 col-md-3 py-sm-1'><h5 class='pt-3 text-center'><strong>TOTAL EXP:</strong></h5></div>
              <div class='col-12 col-sm-6 col-md-3 py-sm-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="totalExp" name="totalExp" class="form-control border text-center"
                    value="<?php echo $charInfo['TotalExp']; ?>" readonly />
                </div>
              </div>
            </div>
          </div>
        </div>
        <hr/>

        <div class='row'>
          <div class='col py-1'><h4 class='text-center'><strong>MENTAL TRAITS</strong></h4></div>
        </div>

        <div class='row no-gutters'>
          <div class='col-6 col-sm-3 col-md-2 py-1'><h5 class='pt-3 text-center'><strong>MEMORY:</strong></h5></div>
          <div class='col-6 col-sm-3 col-md-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="memory" name='memory' class="form-control border text-center" value="<?php echo $charTraits['Memory']; ?>" readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-md-2 py-1'><h5 class='pt-3 text-center'><strong>WILLPOWER:</strong></h5></div>
          <div class='col-6 col-sm-3 col-md-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="willpower" name='willpower' class="form-control border text-center" value="<?php echo $charTraits['Willpower']; ?>" readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-md-2 py-1'><h5 class='pt-3 text-center'><strong>LOGIC:</strong></h5></div>
          <div class='col-6 col-sm-3 col-md-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="logic" name='logic' class="form-control border text-center" value="<?php echo $charTraits['Logic']; ?>" readonly />
            </div>    
          </div>
          <div class='col-6 col-sm-3 col-md-2 py-1'><h5 class='pt-3 text-center'><strong>PERCEPTION:</strong></h5></div>
          <div class='col-6 col-sm-3 col-md-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="perception" name='perception' class="form-control border text-center" value="<?php echo $charTraits['Perception']; ?>" readonly />
            </div>    
          </div>
          <div class='col-6 col-sm-3 col-md-2 py-1 offset-sm-6 offset-md-4'><h5 class='pt-3 text-center'><strong>CHARISMA:</strong></h5></div>
          <div class='col-6 col-sm-3 col-md-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="charisma" name='charisma' class="form-control border text-center" value="<?php echo $charTraits['Charisma']; ?>" readonly />
            </div>    
          </div>
        </div>
        <hr/>

        <div class='row'>
          <div class='col py-1'><h4 class='text-center'><strong>PHYSICAL TRAITS</strong></h4></div>
        </div>

        <div class='row no-gutters'>
          <div class='col-6 col-sm-3 col-md-2 py-1'><h5 class='pt-3 text-center'><strong>STRENGTH:</strong></h5></div>
          <div class='col-6 col-sm-3 col-md-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="strength" name='strength' class="form-control border text-center" value="<?php echo $charTraits['Strength']; ?>" readonly />
            </div>    
          </div>
          <div class='col-6 col-sm-3 col-md-2 py-1'><h5 class='pt-3 text-center'><strong>SPEED:</strong></h5></div>
          <div class='col-6 col-sm-3 col-md-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="speed" name='speed' class="form-control border text-center" value="<?php echo $charTraits['Speed']; ?>" readonly />
            </div>    
          </div>
          <div class='col-6 col-sm-3 col-md-2 py-1'><h5 class='pt-3 text-center'><strong>ENDURANCE:</strong></h5></div>
          <div class='col-6 col-sm-3 col-md-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="endurance" name='endurance' class="form-control border text-center" value="<?php echo $charTraits['Endurance']; ?>" readonly />
            </div>    
          </div>
          <div class='col-6 col-sm-3 col-md-2 py-1'><h5 class='pt-3 text-center'><strong>AGILITY:</strong></h5></div>
          <div class='col-6 col-sm-3 col-md-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="agility" name='agility' class="form-control border text-center" value="<?php echo $charTraits['Agility']; ?>" readonly />
            </div>    
          </div>
          <div class='col-6 col-sm-3 col-md-2 py-1 offset-sm-6 offset-md-4'><h5 class='pt-3 text-center px-0'><strong>BEAUTY:</strong></h5></div>
          <div class='col-6 col-sm-3 col-md-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="beauty" name='beauty' class="form-control border text-center" value="<?php echo $charTraits['Beauty']; ?>" readonly />
            </div>
          </div>
        </div>
        <hr/>

        <div class='row no-gutters'>
          <div class='col-6 col-sm-3 col-lg-2 py-1'><h5 class='pt-3 text-center'><strong>ACTIONS:</strong></h5></div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="actions" name='actions' class="form-control border text-center px-0" value="<?php echo $charTraits['Actions']; ?>" readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'><h5 class='pt-3 text-center'><strong>SEQUENCE:</strong></h5></div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="sequence" name='sequence' class="form-control border text-center px-0" value="<?php echo $charTraits['Sequence']; ?>" readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'><h5 class='pt-3 text-center'><strong>GAMBLING:</strong></h5></div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="gambling" name='gambling' class="form-control border text-center px-0" value="<?php echo $charSkills['Gambling']; ?>" readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'><h5 class='pt-3 text-center'><strong>OFF HAND:</strong></h5></div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="offHand" name='offHand' class="form-control border text-center px-0" value="<?php echo $charSkills['OffHand']; ?>" readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'><h5 class='pt-3 text-center'><strong>BLOCK:</strong></h5></div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="block" name='block' class="form-control border text-center px-0" value="<?php echo $charSkills['Block']; ?>" readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'><h5 class='pt-3 text-center'><strong>DODGE:</strong></h5>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="dodge" name='dodge' class="form-control border text-center px-0" value="<?php echo $charSkills['Dodge']; ?>" readonly />
            </div>
          </div>
        </div>

        <hr/>

        <div class='row'>
          <div class='col py-1'><h4 class='text-center'><strong>COMBAT SKILLS</strong></h4></div>
        </div>

        <div class='row no-gutters'>
          <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
            <h5 class='pt-3 text-center'><strong>UNARMED:</strong></h5>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="unarmed" name='unarmed' class="form-control border text-center px-0" value="<?php echo $charSkills['Unarmed']; ?>" readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
            <h5 class='pt-3 text-center'><strong>GRAPPLE:</strong></h5>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="grapple" name='grapple' class="form-control border text-center px-0" value="<?php echo $charSkills['Grapple']; ?>" readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1 my-1 '>
            <h5 class='pt-3 text-center'><strong>SHIELD:</strong></h5>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="shield" name='shield' class="form-control border text-center px-0" value="<?php echo $charSkills['Shield']; ?>" readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
            <h5 class='pt-3 text-center'><strong>SHORT:</strong></h5>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="shortWeapons" name='shortWeapons' class="form-control border text-center px-0" value="<?php echo $charSkills['ShortWeapons']; ?>" readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
            <h5 class='pt-3 text-center'><strong>LONG:</strong></h5>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="longWeapons" name='longWeapons' class="form-control border text-center px-0" value="<?php echo $charSkills['LongWeapons']; ?>" readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
            <h5 class='pt-3 text-center'><strong>TWO HAND:</strong></h5>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="twoHand" name='twoHand' class="form-control border text-center px-0" value="<?php echo $charSkills['TwoHandWeapons']; ?>" readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1 my-1 offset-sm-6 offset-lg-4'>
            <h5 class='pt-3 text-center'><strong>CHAIN:</strong></h5>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="chain" name='chain' class="form-control border text-center px-0" value="<?php echo $charSkills['ChainWeapons']; ?>" readonly />
            </div>
          </div>
        </div>

        <div class='row no-gutters'>
          <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
            <h5 class='pt-3 text-center'><strong>THROWN:</strong></h5>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="thrown" name='thrown' class="form-control border text-center px-0" value="<?php echo $charSkills['Thrown']; ?>" readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
            <h5 class='pt-3 text-center'><strong>ARCHERY:</strong></h5>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="archery" name='archery' class="form-control border text-center px-0" value="<?php echo $charSkills['Archery']; ?>" readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1 my-1 '>
            <h5 class='pt-3 text-center'><strong>SPECIAL:</strong></h5>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="special" name='special' class="form-control border text-center px-0" value="<?php echo $charSkills['SpecialWeapons']; ?>" readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
            <h5 class='pt-3 text-center'><strong>PISTOLS:</strong></h5>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="pistols" name='pistols' class="form-control border text-center px-0" value="<?php echo $charSkills['Pistols']; ?>" readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
            <h5 class='pt-3 text-center'><strong>RIFLES:</strong></h5>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="rifles" name='rifles' class="form-control border text-center px-0" value="<?php echo $charSkills['Rifles']; ?>" readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
            <h5 class='pt-3 text-center'><strong>BURST:</strong></h5>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="burst" name='burst' class="form-control border text-center px-0" value="<?php echo $charSkills['Burst']; ?>" readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1 my-1 offset-sm-6 offset-lg-4'>
            <h5 class='pt-3 text-center'><strong>WEAPON SYS:</strong></h5>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="weaponSys" name='weaponSys' class="form-control border text-center px-0" value="<?php echo $charSkills['WeaponSystems']; ?>" readonly />
            </div>
          </div>
        </div>

        <hr/>

        <div class='row'>
          <div class='col py-1'><h4 class='text-center'><strong>SURVIVAL SKILLS</strong></h4></div>
        </div>

        <div class='row no-gutters'>
          <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
            <h5 class='pt-3 text-center'><strong>ENV AWARE:</strong></h5>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="envAware" name='envAware' class="form-control border text-center px-0" value="<?php echo $charSkills['EnvAware']; ?>" readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
            <h5 class='pt-3 text-center'><strong>SURVEY:</strong></h5>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="surveillance" name='surveillance' class="form-control border text-center px-0" value="<?php echo $charSkills['Surveillance']; ?>" readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1 my-1 '>
            <h5 class='pt-3 text-center'><strong>NAVIGATION:</strong></h5>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="navigation" name='navigation' class="form-control border text-center px-0" value="<?php echo $charSkills['Navigation']; ?>" readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
            <h5 class='pt-3 text-center'><strong>PRESERVE:</strong></h5>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="preservation" name='preservation' class="form-control border text-center px-0" value="<?php echo $charSkills['Preservation']; ?>" readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
            <h5 class='pt-3 text-center'><strong>FISHING:</strong></h5>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="fishing" name='fishing' class="form-control border text-center px-0" value="<?php echo $charSkills['Fishing']; ?>" readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
            <h5 class='pt-3 text-center'><strong>TRAPPING:</strong></h5>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="trapping" name='trapping' class="form-control border text-center px-0" value="<?php echo $charSkills['Trapping']; ?>" readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
            <h5 class='pt-3 text-center'><strong>TRACKING:</strong></h5>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="tracking" name='tracking' class="form-control border text-center px-0" value="<?php echo $charSkills['Tracking']; ?>" readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1 my-1 offset-lg-4'>
            <h5 class='pt-3 text-center'><strong>FIRST AID:</strong></h5>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="firstAid" name='firstAid' class="form-control border text-center px-0" value="<?php echo $charSkills['FirstAid']; ?>" readonly />
            </div>
          </div>
        </div>
        <hr/>

        <div class='row'>
          <div class='col'><h4 class='text-center'><strong>COVERT SKILLS</strong></h4></div>
        </div>

        <div class='row no-gutters'>
          <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
            <h5 class='pt-3 text-center'><strong>STEALTH:</strong></h5>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="stealth" name='stealth' class="form-control border text-center px-0" value="<?php echo $charSkills['Stealth']; ?>" readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
            <h5 class='pt-3 text-center'><strong>CONCEAL:</strong></h5>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="concealment" name='concealment' class="form-control border text-center px-0" value="<?php echo $charSkills['Concealment']; ?>" readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1 my-1 '>
            <h5 class='pt-3 text-center'><strong>SLEIGHT:</strong></h5>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="sleight" name='sleight' class="form-control border text-center px-0" value="<?php echo $charSkills['Sleight']; ?>" readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
            <h5 class='pt-3 text-center'><strong>LOCKPICK:</strong></h5>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="lockpick" name='lockpick' class="form-control border text-center px-0" value="<?php echo $charSkills['Lockpick']; ?>" readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
            <h5 class='pt-3 text-center'><strong>FORGERY:</strong></h5>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="forgery" name='forgery' class="form-control border text-center px-0" value="<?php echo $charSkills['Forgery']; ?>" readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
            <h5 class='pt-3 text-center'><strong>CRYPTO:</strong></h5>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="cryptography" name='cryptography' class="form-control border text-center px-0" value="<?php echo $charSkills['Cryptography']; ?>" readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
            <h5 class='pt-3 text-center'><strong>DISGUISE:</strong></h5>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="disguise" name='disguise' class="form-control border text-center px-0" value="<?php echo $charSkills['Disguise']; ?>" readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1 offset-lg-4'>
            <h5 class='pt-3 text-center'><strong>RESTRAINTS:</strong></h5>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="restraints" name='restraints' class="form-control border text-center px-0" value="<?php echo $charSkills['Restraints']; ?>" readonly />
            </div>
          </div>
        </div>
        <hr/>

        <div class='row'>
          <div class='col'><h4 class='text-center'><strong>TECHNOLOGY SKILLS</strong></h4></div>
        </div>

        <div class='row no-gutters'>
          <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
            <h5 class='pt-3 text-center'><strong>CRAFTING:</strong></h5>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="crafting" name='crafting' class="form-control border text-center px-0" value="<?php echo $charSkills['Crafting']; ?>" readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
            <h5 class='pt-3 text-center'><strong>COMPUTERS:</strong></h5>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="computers" name='computers' class="form-control border text-center px-0" value="<?php echo $charSkills['Computers']; ?>" readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1 my-1 '>
            <h5 class='pt-3 text-center'><strong>PROGRAM:</strong></h5>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="programming" name='programming' class="form-control border text-center px-0" value="<?php echo $charSkills['Programming']; ?>" readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
            <h5 class='pt-3 text-center'><strong>RADIOS:</strong></h5>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="radios" name='radios' class="form-control border text-center px-0" value="<?php echo $charSkills['Radios']; ?>" readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
            <h5 class='pt-3 text-center'><strong>NETWORKS:</strong></h5>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="networks" name='networks' class="form-control border text-center px-0" value="<?php echo $charSkills['Networks']; ?>" readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
            <h5 class='pt-3 text-center'><strong>MECHANICS:</strong></h5>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="mechanics" name='mechanics' class="form-control border text-center px-0" value="<?php echo $charSkills['Mechanics']; ?>" readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
            <h5 class='pt-3 text-center'><strong>ELECTRICAL:</strong></h5>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="electrical" name='electrical' class="form-control border text-center px-0" value="<?php echo $charSkills['Electrical']; ?>" readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
            <h5 class='pt-3 text-center'><strong>CIRCUITRY:</strong></h5>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="circuitry" name='circuitry' class="form-control border text-center px-0" value="<?php echo $charSkills['Circuitry']; ?>" readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
            <h5 class='pt-3 text-center'><strong>EXPLOSIVES:</strong></h5>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="explosives" name='explosives' class="form-control border text-center px-0" value="<?php echo $charSkills['Explosives']; ?>" readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
            <h5 class='pt-3 text-center'><strong>CONSTRUCT:</strong></h5>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="construction" name='construction' class="form-control border text-center px-0" value="<?php echo $charSkills['Construction']; ?>" readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1 my-1 offset-sm-6 offset-lg-4'>
            <h5 class='pt-3 text-center'><strong>ARCHITECTURE:</strong></h5>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="architecture" name='architecture' class="form-control border text-center px-0" value="<?php echo $charSkills['Architecture']; ?>" readonly />
            </div>
          </div>
        </div>
        <hr/>

        <div class='row'>
          <div class='col'><h4 class='text-center'><strong>TRANSPORTATION SKILLS</strong></h4></div>
        </div>

        <div class='row no-gutters'>
          <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
            <h5 class='pt-3 text-center'><strong>SKATEBOARD:</strong></h5>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="skateboard" name='skateboard' class="form-control border text-center px-0" value="<?php echo $charSkills['Skateboard']; ?>" readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
            <h5 class='pt-3 text-center'><strong>BICYCLE:</strong></h5>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="bicycle" name='bicycle' class="form-control border text-center px-0" value="<?php echo $charSkills['Bicycle']; ?>" readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1 my-1 '>
            <h5 class='pt-3 text-center'><strong>HORSE:</strong></h5>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="horsemanship" name='horsemanship' class="form-control border text-center px-0" value="<?php echo $charSkills['Horsemanship']; ?>" readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
            <h5 class='pt-3 text-center'><strong>AUTOMOBILE:</strong></h5>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="automobile" name='automobile' class="form-control border text-center px-0" value="<?php echo $charSkills['Automobile']; ?>" readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
            <h5 class='pt-3 text-center'><strong>MOTORCYCLE:</strong></h5>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="motorcycle" name='motorcycle' class="form-control border text-center px-0" value="<?php echo $charSkills['Motorcycle']; ?>" readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
            <h5 class='pt-3 text-center'><strong>JET SKI:</strong></h5>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="jetSki" name='jetSki' class="form-control border text-center px-0" value="<?php echo $charSkills['Jet Ski']; ?>" readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
            <h5 class='pt-3 text-center'><strong>SAILING:</strong></h5>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="sailing" name='sailing' class="form-control border text-center px-0" value="<?php echo $charSkills['Sailing']; ?>" readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
            <h5 class='pt-3 text-center'><strong>BOATING:</strong></h5>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="boating" name='boating' class="form-control border text-center px-0" value="<?php echo $charSkills['Boating']; ?>" readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
            <h5 class='pt-3 text-center'><strong>MULTI GEAR:</strong></h5>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="multiGear" name='multiGear' class="form-control border text-center px-0" value="<?php echo $charSkills['Multi Gear']; ?>" readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
            <h5 class='pt-3 text-center'><strong>HVY EQUIP:</strong></h5>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="hvyEquip" name='hvyEquip' class="form-control border text-center px-0" value="<?php echo $charSkills['Heavy Equip']; ?>" readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
            <h5 class='pt-3 text-center'><strong>HELICOPTER:</strong></h5>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="helicopters" name='helicopters' class="form-control border text-center px-0" value="<?php echo $charSkills['Helicopters']; ?>" readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
            <h5 class='pt-3 text-center'><strong>AIRPLANES:</strong></h5>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="airplanes" name='airplanes' class="form-control border text-center px-0" value="<?php echo $charSkills['Airplanes']; ?>" readonly />
            </div>
          </div>
        </div>
        <hr/>

        <div class='row'>
          <div class='col'><h4 class='text-center'><strong>SCIENCE SKILLS</strong></h4></div>
        </div>

        <div class='row no-gutters'>
          <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
            <h5 class='pt-3 text-center'><strong>HISTORY:</strong></h5>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="history" name='history' class="form-control border text-center px-0" value="<?php echo $charSkills['History']; ?>" readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
            <h5 class='pt-3 text-center'><strong>FORENSICS:</strong></h5>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="forensics" name='forensics' class="form-control border text-center px-0" value="<?php echo $charSkills['Forensics']; ?>" readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1 my-1 '>
            <h5 class='pt-3 text-center'><strong>BIOLOGY:</strong></h5>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="biology" name='biology' class="form-control border text-center px-0" value="<?php echo $charSkills['Biology']; ?>" readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1 my-1 '>
            <h5 class='pt-3 text-center'><strong>BOTANY:</strong></h5>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="botany" name='botany' class="form-control border text-center px-0" value="<?php echo $charSkills['Botany']; ?>" readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
            <h5 class='pt-3 text-center'><strong>CHEMISTRY:</strong></h5>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="chemistry" name='chemistry' class="form-control border text-center px-0" value="<?php echo $charSkills['Chemistry']; ?>" readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
            <h5 class='pt-3 text-center'><strong>MYCOLOGY:</strong></h5>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="mycology" name='mycology' class="form-control border text-center px-0" value="<?php echo $charSkills['Mycology']; ?>" readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
            <h5 class='pt-3 text-center'><strong>TOXICOLOGY:</strong></h5>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="toxicology" name='toxicology' class="form-control border text-center px-0" value="<?php echo $charSkills['Toxicology']; ?>" readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
            <h5 class='pt-3 text-center'><strong>PHARMA:</strong></h5>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="pharmacology" name='pharmacology' class="form-control border text-center px-0" value="<?php echo $charSkills['Pharmacology']; ?>" readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
            <h5 class='pt-3 text-center'><strong>SURGERY:</strong></h5>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="surgery" name='surgery' class="form-control border text-center px-0" value="<?php echo $charSkills['Surgery']; ?>" readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1 my-1 offset-lg-4'>
            <h5 class='pt-3 text-center'><strong>MEDICINE:</strong></h5>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="medicine" name='medicine' class="form-control border text-center px-0" value="<?php echo $charSkills['Medicine']; ?>" readonly />
            </div>
          </div>
        </div>
        <hr/>

        <div class='row'>
          <div class='col'><h4 class='text-center'><strong>SOFT SKILLS</strong></h4></div>
        </div>

        <div class='row no-gutters'>
          <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
            <h5 class='pt-3 text-center'><strong>NEGOTIATE:</strong></h5>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="negotiation" name='negotiation' class="form-control border text-center px-0" value="<?php echo $charSkills['Negotiation']; ?>" readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
            <h5 class='pt-3 text-center'><strong>GUILE:</strong></h5>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="guile" name='guile' class="form-control border text-center px-0" value="<?php echo $charSkills['Guile']; ?>" readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1 my-1 '>
            <h5 class='pt-3 text-center'><strong>ETIQUETTE:</strong></h5>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="etiquette" name='etiquette' class="form-control border text-center px-0" value="<?php echo $charSkills['Etiquette']; ?>" readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1 my-1 '>
            <h5 class='pt-3 text-center'><strong>ANIMALS:</strong></h5>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="animals" name='animals' class="form-control border text-center px-0" value="<?php echo $charSkills['Animal Handling']; ?>" readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
            <h5 class='pt-3 text-center'><strong>APPRAISAL:</strong></h5>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="appraisal" name='appraisal' class="form-control border text-center px-0" value="<?php echo $charSkills['Appraisal']; ?>" readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
            <h5 class='pt-3 text-center'><strong>LEGAL:</strong></h5>
          </div>
          <div class='col-6 col-sm-3 col-lg-2 py-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="legal" name='legal' class="form-control border text-center px-0" value="<?php echo $charSkills['Legal']; ?>" readonly />
            </div>
          </div>
        </div>

        <div class='row'>
          <div class='col'><h4 class='text-center'><strong>LANGUAGES</strong></h4></div>
        </div>

        <div class='row no-gutters'>
          <div class='col-6 col-sm-3 col-md-2 offset-md-2 py-1 my-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="lang1" name='lang1' class="form-control border text-center langSlot px-0" data-target='lang1Value' value="<?php echo $charInfo['SecondLanguage']; ?>" 
                readonly /> 
            </div>
          </div>
          <div class='col-6 col-sm-3 col-md-2 py-1 my-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="lang1Value" name='lang1Value' class="form-control border text-center px-0" value="<?php echo $charSkills['SecondLang']; ?>" readonly />
            </div>    
          </div>          
          <div class='col-6 col-sm-3 col-md-2 py-1 my-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="lang2" name='lang2' class="form-control border text-center langSlot px-0" data-target='lang2Value'value="<?php echo $charInfo['ThirdLanguage']; ?>" 
                readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-md-2 py-1 my-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="lang2Value" name='lang2Value' class="form-control border text-center px-0" value="<?php echo $charSkills['ThirdLang']; ?>" readonly />
            </div>    
          </div>
          <div class='col-6 col-sm-3 col-md-2 offset-md-2 py-1 my-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="lang3" name='lang3' class="form-control border text-center langSlot px-0" data-target='lang3Value' value="<?php echo $charInfo['FourthLanguage']; ?>"
                readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-md-2 py-1 my-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="lang3Value" name='lang3Value' class="form-control border text-center px-0" value="<?php echo $charSkills['FourthLang']; ?>" readonly />
            </div>    
          </div>
          <div class='col-6 col-sm-3 col-md-2 py-1 my-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="lang4" name='lang4' class="form-control border text-center TNR langSlot px-0" data-target='lang4Value' value="<?php echo $charInfo['FifthLanguage']; ?>"
                readonly />
            </div>
          </div>
          <div class='col-6 col-sm-3 col-md-2 py-1 my-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="lang4Value" name='lang4Value' class="form-control border text-center px-0" value="<?php echo $charSkills['FifthLang']; ?>" readonly />
            </div>    
          </div>
        </div>

        <div class='row'>
          <div class='col'><h4 class='text-center'><strong>COMBAT ABILITIES</strong></h4></div>
        </div>

        <div class='row'>
          <div class='col-12 col-sm-6 col-md-4 col-lg-3 py-1 my-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="ability1" name='ability1' class="form-control border text-center abilitySlot px-0" value='<?php echo $charAbilities["1"] ?>' readonly />
            </div>
          </div>
          <div class='col-12 col-sm-6 col-md-4 col-lg-3 py-1 my-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="ability2" name='ability2' class="form-control border text-center abilitySlot px-0" value='<?php echo $charAbilities["2"] ?>' readonly />
            </div>
          </div>
          <div class='col-12 col-sm-6 col-md-4 col-lg-3 py-1 my-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="ability3" name='ability3' class="form-control border text-center abilitySlot px-0" value='<?php echo $charAbilities["3"] ?>' readonly />
            </div>
          </div>
          <div class='col-12 col-sm-6 col-md-4 col-lg-3 py-1 my-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="ability4" name='ability4' class="form-control border text-center abilitySlot px-0" value='<?php echo $charAbilities["4"] ?>' readonly />
            </div>
          </div>
          <div class='col-12 col-sm-6 col-md-4 col-lg-3 py-1 my-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="ability5" name='ability5' class="form-control border text-center abilitySlot px-0" value='<?php echo $charAbilities["5"] ?>' readonly />
            </div>
          </div>
          <div class='col-12 col-sm-6 col-md-4 col-lg-3 py-1 my-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="ability6" name='ability6' class="form-control border text-center abilitySlot px-0" value='<?php echo $charAbilities["6"] ?>' readonly />
            </div>
          </div>
          <div class='col-12 col-sm-6 col-md-4 col-lg-3 py-1 my-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="ability7" name='ability7' class="form-control border text-center abilitySlot px-0" value='<?php echo $charAbilities["7"] ?>' readonly />
            </div>
          </div>
          <div class='col-12 col-sm-6 col-md-4 col-lg-3 py-1 my-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="ability8" name='ability8' class="form-control border text-center abilitySlot px-0" value='<?php echo $charAbilities["8"] ?>' readonly />
            </div>
          </div>
          <div class='col-12 col-sm-6 col-md-4 col-lg-3 py-1 my-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="ability9" name='ability9' class="form-control border text-center abilitySlot px-0" value='<?php echo $charAbilities["9"] ?>' readonly />
            </div>
          </div>
          <div class='col-12 col-sm-6 col-md-4 col-lg-3 py-1 my-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="ability10" name='ability10' class="form-control border text-center abilitySlot px-0" value='<?php echo $charAbilities["10"] ?>' readonly />
            </div>
          </div>
          <div class='col-12 col-sm-6 col-md-4 col-lg-3 py-1 my-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="ability11" name='ability11' class="form-control border text-center abilitySlot px-0" value='<?php echo $charAbilities["11"] ?>' readonly />
            </div>
          </div>
          <div class='col-12 col-sm-6 col-md-4 col-lg-3 py-1 my-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="ability12" name='ability12' class="form-control border text-center abilitySlot px-0" value='<?php echo $charAbilities["12"] ?>' readonly />
            </div>
          </div>
          <div class='col-12 col-sm-6 col-md-4 col-lg-3 py-1 my-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="ability13" name='ability13' class="form-control border text-center abilitySlot px-0" value='<?php echo $charAbilities["13"] ?>' readonly />
            </div>
          </div>
          <div class='col-12 col-sm-6 col-md-4 col-lg-3 py-1 my-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="ability14" name='ability14' class="form-control border text-center abilitySlot px-0" value='<?php echo $charAbilities["14"] ?>' readonly />
            </div>
          </div>
          <div class='col-12 col-sm-6 col-md-4 col-lg-3 py-1 my-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="ability15" name='ability15' class="form-control border text-center abilitySlot px-0" value='<?php echo $charAbilities["15"] ?>' readonly />
            </div>
          </div>
          <div class='col-12 col-sm-6 col-md-4 offset-md-4 col-lg-3 offset-lg-0 py-1 my-1'>
            <div class="input-group input-group-lg">
              <input type="text" id="ability16" name='ability16' class="form-control border text-center abilitySlot px-0" value='<?php echo $charAbilities["16"] ?>' readonly />
            </div>
          </div>
        </div>
      </div>


      <?php include( $_SERVER['DOCUMENT_ROOT'] . '/aftermath/footer.php' ); ?>
    </div>
    <script src='../js/instantMessage.js'></script>

    <script src='../node_modules/socket.io-client/dist/socket.io.js'></script>
  </body>
</html>