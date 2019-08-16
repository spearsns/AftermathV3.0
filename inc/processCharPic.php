<?php
  	include("../inc/config.php");
  	session_start();

  	$valid_extensions = array("jpg", "jpeg", "png", "bmp");
  	$path = "characters/";

	  	$img = $_FILES["image"]["name"];
	  	$tmp = $_FILES["image"]["tmp_name"];
		$errorimg = $_FILES["image"]["error"]; 

	  	$username = $_SESSION['username'];
  		$userID = $_SESSION["ID"];

  		$characterID = $_SESSION['characterID'];
		$characterName = $_POST['characterName'];

	  	$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));

	  	$final_image = $username ."-". $characterName .".". $ext;

	  	if(in_array($ext, $valid_extensions)){ 
/*
	  		$files = array_diff(scandir($_SERVER['DOCUMENT_ROOT'] . '/aftermath/games/images/'), array(".", ".."));

	        foreach($files as $file){
	          $filepath = $_SERVER['DOCUMENT_ROOT'] . '/aftermath/games/images/' . $file;
	          if ( strpos($filepath, strtolower($gameName)) !== false ){
	            unlink($filepath);
	          }
	        }
*/
			$path = $path.strtolower($final_image);

			foreach($valid_extensions as $scan){

				if(file_exists($username ."-". $characterName .".". $scan)) unlink($path);
			}

			if(move_uploaded_file($tmp, $path)){
				echo $path;
				$SQL = "UPDATE characters SET Picture = '$path' WHERE ID = '$characterID'";
				$result = $conn->query($SQL) or die(mysqli_error($conn));
			}
		} else {
			echo "invalid";
		}

		if($errorimg > 0){
		   die("<h5 style='color: red;' class='text-center'><strong> An error occurred while uploading the file</strong></h5>");
		}

		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
?>