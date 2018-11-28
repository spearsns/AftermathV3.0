<?php 
  	include("../inc/config.php");
  	session_start();

    $sql = 
    "SELECT ID, Username
    FROM users 
    WHERE Active = '1' ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            
            echo "
                <div class='row py-1'>
                  <div class='col'>
                    <button type='button' class='btn btn-light btn-lg btn-block border' data-reference='". $row['ID'] ."'>
                      ". $row['Username'] ."</button>
                  </div>
                </div>
                ";

              }
        }
              
?>