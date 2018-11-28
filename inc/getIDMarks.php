<?php
  include("../inc/config.php");
  session_start();

  $characterID = $_POST['characterID'];
  
  $sql =  " SELECT DISTINCT cid.*, c.FacialHair, c.HairStyle, c.Deceased 
            FROM char_id_marks AS cid
            LEFT JOIN characters AS c ON c.ID = cid.CharacterID
            WHERE CharacterID = $characterID;
          ";

  $result = mysqli_query($conn, $sql);

  if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);

    echo json_encode($row);

  }
?>