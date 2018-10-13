<?php
  $hairSQL =  
    "SELECT HairStyle, FacialHair
    FROM characters 
    WHERE UserID = '$userID' AND CharacterName = '$characterName' ";

  $result1 = mysqli_query($conn, $hairSQL);
  $hair = mysqli_fetch_assoc($result1);
  json_encode($hair);

  $idMarksSQL = "SELECT * FROM char_id_marks WHERE CharacterID = '$characterID' ";

  $result2 = mysqli_query($conn, $idMarksSQL);
  $idMarks = mysqli_fetch_assoc($result2);
  json_encode($idMarks);
?>