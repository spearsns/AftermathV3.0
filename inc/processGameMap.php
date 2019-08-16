<?php
  	include("../inc/config.php");
  	session_start();

  	$valid_extensions = array("jpg", "jpeg", "png", "bmp");
  	$path = "../games/images/";

	  	$img = $_FILES["image"]["name"];
	  	$tmp = $_FILES["image"]["tmp_name"];
		$errorimg = $_FILES["image"]["error"]; 

	  	$game = $_SESSION["gameName"];
  		$gameID = $_SESSION["gameID"];

	  	$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));

	  	$time = time();
	  	$final_image = $time . $game . "." . $ext;

	  	if(in_array($ext, $valid_extensions)){ 
/*
	  		$files = array_diff(scandir($_SERVER['DOCUMENT_ROOT'] . '/aftermath/games/images/'), array(".", ".."));

	        foreach($files as $file){
	          $filepath = $_SERVER['DOCUMENT_ROOT'] . '/aftermath/games/images/' . $file;
	          if ( strpos($filepath, strtolower($gameName)) !== false ){
	            unlink($filepath);
	          }
	        }

	  		if($img['size'] > 500000) die('<div class="alert alert-danger" role="alert"> File is too big </div>');
*/
			$path = $path.strtolower($final_image);

			if(move_uploaded_file($tmp, $path)){
				echo $path;
				$mapSQL = "UPDATE games SET Picture = '$path' WHERE ID = '$gameID'";
				$result = $conn->query($mapSQL)	or die(mysqli_error($conn));
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