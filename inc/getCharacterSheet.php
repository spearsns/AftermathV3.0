<?php
  include("../inc/config.php");
  session_start();

  $characterID = $_POST['characterID'];
  
  $infoSQL =  " SELECT CharacterName, Picture, Background, Habitat, Age, Sex, Ethnicity, HairColor, HairStyle, EyeColor, SecondLanguage, 
              ThirdLanguage, FourthLanguage, FifthLanguage, TotalExp, RemainingExp, Memory, Logic, Perception, Willpower, Charisma, Strength, 
              Endurance, Agility, Speed, Beauty, Sequence, Actions 
            FROM characters AS c
            INNER JOIN char_traits AS ct ON c.ID = ct.CharacterID
            WHERE CharacterID = $characterID;
          ";

  $result1 = mysqli_query($conn, $infoSQL);

  if ($result1->num_rows > 0) {
    $charInfo = mysqli_fetch_assoc($result1);
  }

  $abilitySQL = " SELECT AbilityNumber, Name
                  FROM char_abilities
                  WHERE CharacterID = $characterID
               ";
  $charAbilities = array();
  $result2 = mysqli_query($conn, $abilitySQL);

  while ($output = mysqli_fetch_array($result2)){
    $charAbilities['Ability'.$output['AbilityNumber']] = $output['Name'];
  }

  $skillSQL =
    "SELECT Name, Value
    FROM char_skills AS S
    INNER JOIN master_skills AS M ON S.MasterID = M.ID
    WHERE CharacterID = $characterID ";
  
  $charSkills = array();
  $result3 = mysqli_query($conn, $skillSQL);

  while ($output = mysqli_fetch_array($result3)){
    $charSkills[ preg_replace('/\s+/', '', $output['Name']) ] = $output['Value'];
  }

  $character = array_merge($charInfo, $charAbilities, $charSkills);

  echo json_encode($character);
?>