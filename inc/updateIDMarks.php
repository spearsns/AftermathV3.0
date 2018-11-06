<?php
include('config.php');
session_start();

/* POST */
$characterID = $_POST['CharacterID'];

$HairStyle = ($_POST['HairStyle']);
$FacialHair = ($_POST['FacialHair']);

$Head = ($_POST['Head']);
$Face = ($_POST['Face']);
$Neck = ($_POST['Neck']);
$LShoulder = ($_POST['LShoulder']);
$RShoulder = ($_POST['RShoulder']);
$LRibs = ($_POST['LRibs']);
$RRibs = ($_POST['RRibs']);
$LBicep = ($_POST['LBicep']);
$RBicep = ($_POST['RBicep']);
$Stomach = ($_POST['Stomach']);
$LowerBack = ($_POST['LowerBack']);
$Rear = ($_POST['Rear']);
$Groin = ($_POST['Groin']);
$LForearm = ($_POST['LForearm']);
$RForearm = ($_POST['RForearm']);
$LThigh = ($_POST['LThigh']);
$RThigh = ($_POST['RThigh']);
$LHand = ($_POST['LHand']);
$RHand = ($_POST['RHand']);
$LCalf = ($_POST['LCalf']);
$RCalf = ($_POST['RCalf']);
$LFoot = ($_POST['LFoot']);
$RFoot = ($_POST['RFoot']);

/* ID MARKS ARRAY */
$idMarksArray = array(
	'Head' => $Head,			
	'Face' => $Face,
	'Neck' => $Neck,			
	'LShoulder' => $LShoulder,			
	'RShoulder' => $RShoulder,			
	'LRibs' => $LRibs,		
	'RRibs' => $RRibs,		
	'LBicep' => $LBicep,			
	'RBicep' => $RBicep,			
	'Stomach' => $Stomach,			
	'LowerBack' => $LowerBack,			
	'Rear' => $Rear,			
	'Groin' => $Groin,			
	'LForearm' => $LForearm,				
	'RForearm' => $RForearm,			
	'LThigh' => $LThigh,			
	'RThigh' => $RThigh,				
	'LHand' => $LHand,				
	'RHand' => $RHand,			
	'LCalf' => $LCalf,			
	'RCalf' => $RCalf,			
	'LFoot' => $LFoot,			
	'RFoot' => $RFoot
	);

	// HAIR
	$hairSQL = 
		"UPDATE characters 
			SET HairStyle = '$HairStyle',
				FacialHair = '$FacialHair'
			WHERE ID = '$characterID' ";
	$result1 = $conn->query($hairSQL) or die(mysqli_error($conn));

	// IDMARKS 
	$it = new ArrayIterator ($idMarksArray);
	$cit = new CachingIterator ($it);
	foreach ($cit as $value){
		$idMarksSQL = "UPDATE char_id_marks SET " .$cit->key(). " = '" .$cit->current(). "' ";
		$idMarksSQL .= "WHERE CharacterID = '$characterID'";
		$result2 = $conn->query($idMarksSQL) or die(mysqli_error($conn));	
	}	
?>