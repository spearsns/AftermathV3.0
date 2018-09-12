<?php
include('config.php');
session_start();

$userID = $_SESSION['ID'];
$name = $_POST['name'];
$characterID;

/* TRAITS */
$memory = ($_POST['memory']);
$logic = ($_POST['logic']);
$perception = ($_POST['perception']);
$willpower = ($_POST['willpower']);
$charisma = ($_POST['charisma']);

$strength = ($_POST['strength']);
$endurance = ($_POST['endurance']);
$agility = ($_POST['agility']);
$speed = ($_POST['speed']);
$beauty = ($_POST['beauty']);

$actions = ($_POST['actions']);
$sequence = ($_POST['sequence']);

$offHand = ($_POST['offHand']);
$gambling = ($_POST['gambling']);

/* COMBAT SKILLS */
$unarmed = ($_POST['unarmed']);
$grapple = ($_POST['grapple']);
$shortWeapons = ($_POST['shortWeapons']);
$longWeapons = ($_POST['longWeapons']);
$twoHand = ($_POST['twoHand']);
$chain = ($_POST['chain']);
$shield = ($_POST['shield']);

$thrown = ($_POST['thrown']);
$archery = ($_POST['archery']);
$pistols = ($_POST['pistols']);
$rifles = ($_POST['rifles']);
$burst = ($_POST['burst']);
$special = ($_POST['special']);
$weaponSys = ($_POST['weaponSys']);

$block = ($_POST['block']);
$dodge = ($_POST['dodge']);

/* ESPIONAGE SKILLS */
$stealth = ($_POST['stealth']);
$concealment = ($_POST['concealment']);
$sleight = ($_POST['sleight']);
$lockpick = ($_POST['lockpick']);
$forgery = ($_POST['forgery']);
$cryptography = ($_POST['cryptography']);
$disguise = ($_POST['disguise']);
$restraints = ($_POST['restraints']);

/* SURVIVAL SKILLS */
$envAware = ($_POST['envAware']);
$surveillance = ($_POST['surveillance']);
$preservation = ($_POST['preservation']);
$firstAid = ($_POST['firstAid']);
$navigation = ($_POST['navigation']);
$tracking = ($_POST['tracking']);
$trapping = ($_POST['trapping']);
$fishing = ($_POST['fishing']);

/* TRANSPORTATION SKILLS */
$skateboard = ($_POST['skateboard']);
$bicycle = ($_POST['bicycle']);
$horsemanship = ($_POST['horsemanship']);
$automobile = ($_POST['automobile']);
$motorcycle = ($_POST['motorcycle']);
$jetSki = ($_POST['jetSki']);
$sailing = ($_POST['sailing']);
$boating = ($_POST['boating']);
$multiGear = ($_POST['multiGear']);
$hvyEquip = ($_POST['hvyEquip']);
$helicopters = ($_POST['helicopters']);
$airplanes = ($_POST['airplanes']);

/* TECHNOLOGY SKILLS */
$crafting = ($_POST['crafting']);
$construction = ($_POST['construction']);
$computers = ($_POST['computers']);
$programming = ($_POST['programming']);
$radios = ($_POST['radios']);
$networks = ($_POST['networks']);
$mechanics = ($_POST['mechanics']);
$electrical = ($_POST['electrical']);
$circuitry = ($_POST['circuitry']);
$explosives = ($_POST['explosives']);
$architecture = ($_POST['architecture']);

/* SCIENCE SKILLS */
$history = ($_POST['history']);
$forensics = ($_POST['forensics']);
$chemistry = ($_POST['chemistry']);
$biology = ($_POST['biology']);
$botany = ($_POST['botany']);
$mycology = ($_POST['mycology']);
$toxicology = ($_POST['toxicology']);
$pharmacology = ($_POST['pharmacology']);
$surgery = ($_POST['surgery']);
$medicine = ($_POST['medicine']);

/* SOFT SKILLS & LANGUAGES */
$negotiation = ($_POST['negotiation']);
$guile = ($_POST['guile']);
$etiquette = ($_POST['etiquette']);
$animals = ($_POST['animals']);
$appraisal = ($_POST['appraisal']);
$legal = ($_POST['legal']);
$lang1 = ($_POST['lang1']);
$lang1Value = ($_POST['lang1Value']);
$lang2 = ($_POST['lang2']);
$lang2Value = ($_POST['lang2Value']);
$lang3 = ($_POST['lang3']);
$lang3Value = ($_POST['lang3Value']);
$lang4 = ($_POST['lang4']);
$lang4Value = ($_POST['lang4Value']);

/* ABILITIES */
$ability1 = ($_POST['ability1']);
$ability2 = ($_POST['ability2']);
$ability3 = ($_POST['ability3']);
$ability4 = ($_POST['ability4']);
$ability5 = ($_POST['ability5']);
$ability6 = ($_POST['ability6']);
$ability7 = ($_POST['ability7']);
$ability8 = ($_POST['ability8']);
$ability9 = ($_POST['ability9']);
$ability10 = ($_POST['ability10']);
$ability11 = ($_POST['ability11']);
$ability12 = ($_POST['ability12']);
$ability13 = ($_POST['ability13']);
$ability14 = ($_POST['ability14']);
$ability15 = ($_POST['ability15']);
$ability16 = ($_POST['ability16']);

/* SQL */
/* CHARACTERS */
$characterIDSQL = 
"SELECT ID FROM characters WHERE UserID = '$userID' AND CharacterName = '$name' ";
$result1 = $conn->query($characterIDSQL) or die(mysqli_error($conn));
if ($result1->num_rows > 0) {
    while($row = $result1->fetch_assoc()) {
		$characterID = $row["ID"];
	}
}

/* CHARACTER TRAITS */
$charTraitsSQL = 
"UPDATE char_traits 
	SET Memory = '$memory', 
		Logic = '$logic', 
		Perception = '$perception', 
		Willpower = '$willpower', 
		Charisma = '$charisma', 
		Strength = '$strength', 
		Endurance = '$endurance', 
		Agility = '$agility', 
		Speed = '$speed',  
		Sequence = '$sequence', 
		Actions = '$actions'
	WHERE CharacterID = '$characterID'";
		$result2 = $conn->query($charTraitsSQL)	or die(mysqli_error($conn));

$charLangsSQL = 
"UPDATE characters 
	SET SecondLanguage = '$lang1', 
		ThirdLanguage = '$lang2', 
		FourthLanguage = '$lang3', 
		FifthLanguage = '$lang4' 
	WHERE ID = '$characterID'";
		$result3 = $conn->query($charLangsSQL) or die(mysqli_error($conn));

/* CHARACTER SKILLS */
$skillsArray = array(
	1 => $offHand,			
	2 => $gambling,
	3 => $unarmed,			
	4 => $grapple,			
	5 => $shortWeapons,			
	6 => $longWeapons,		
	7 => $twoHand,		
	8 => $chain,			
	9 => $shield,			
	10 => $thrown,			
	11 => $archery,			
	12 => $pistols,			
	13 => $rifles,				
	14 => $burst,			
	15 => $special,			
	16 => $weaponSys,				
	17 => $block,				
	18 => $dodge,			
	19 => $stealth,			
	20 => $concealment,			
	21 => $sleight,			
	22 => $lockpick,		
	23 => $forgery,		
	24 => $cryptography,			
	25 => $disguise,			
	26 => $restraints,
	27 => $envAware,			
	28 => $surveillance,			
	29 => $navigation,			
	30 => $preservation,			
	31 => $tracking,		
	32 => $trapping,			
	33 => $fishing,		
	34 => $firstAid,			
	35 => $skateboard,			
	36 => $bicycle,		
	37 => $horsemanship,		
	38 => $automobile,		
	39 => $motorcycle,		
	40 => $jetSki,			
	41 => $sailing,			
	42 => $boating,			
	43 => $multiGear,			
	44 => $hvyEquip,			
	45 => $helicopters,		
	46 => $airplanes,			
	47 => $crafting,				
	48 => $computers,			
	49 => $programming,			
	50 => $radios,			
	51 => $networks,			
	52 => $mechanics,			
	53 => $electrical,			
	54 => $circuitry,			
	55 => $explosives,			
	56 => $construction,			
	57 => $architecture,		
	58 => $negotiation,			
	59 => $guile,			
	60 => $etiquette,			
	61 => $animals,				
	62 => $appraisal,		
	63 => $legal,			
	64 => $history,			
	65 => $forensics,			
	66 => $biology,			
	67 => $chemistry,			
	68 => $botany,			
	69 => $mycology,			
	70 => $toxicology,		
	71 => $pharmacology,				
	72 => $surgery,			
	73 => $medicine,	
	74 => $lang1Value,	
	75 => $lang2Value,	
	76 => $lang3Value,	
	77 => $lang4Value	
	);
	
	// SKILLS 
	$it = new ArrayIterator ($skillsArray);
	$cit = new CachingIterator ($it);
	foreach ($cit as $value){
		$charSkillSQL = "UPDATE char_skills SET Value = '" .$cit->current(). "' ";
		$charSkillSQL .= "WHERE MasterID = '" .$cit->key(). "' AND CharacterID = '$characterID'";
		$result = $conn->query($charSkillSQL) or die(mysqli_error($conn));	
	}	

	$abilityArray = array(
		1 => $ability1,
		2 => $ability2,
		3 => $ability3,
		4 => $ability4,
		5 => $ability5,
		6 => $ability6,
		7 => $ability7,
		8 => $ability8,
		9 => $ability9,
		10 => $ability10,
		11 => $ability11,
		12 => $ability12,
		13 => $ability13,
		14 => $ability14,
		15 => $ability15,
		16 => $ability16
		);

	// ABILITIES 
	$itAbility = new ArrayIterator ($abilityArray);
	$citAbility = new CachingIterator ($itAbility);
	foreach ($citAbility as $value){
		$charAbilitySQL = "UPDATE char_abilities SET Name = '" .$citAbility->current(). "' ";
		$charAbilitySQL .= "WHERE AbilityNumber = '" .$citAbility->key(). "' AND CharacterID = '$characterID'";
		$result = $conn->query($charAbilitySQL) or die(mysqli_error($conn));	
	}	

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
    header("Location: ../success.php");
    
?>