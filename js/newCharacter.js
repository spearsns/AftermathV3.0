function roll(min, max){
	return Math.round(Math.random() * (max - min)) + min;
}
function percentile(){
	return (roll(1,10) * 10) + roll(1,10);
}
function twoD10(){
	return roll(1,10) + roll(1,10);
}

//TRAITS
var memory = twoD10();
var MEMORY = memory;
var logic = twoD10();
var LOGIC = logic;
var perception = twoD10();
var PERCEPTION = perception;
var willpower = twoD10();
var WILLPOWER = willpower;
var charisma = twoD10();
var CHARISMA = charisma;

var strength = twoD10();
var STRENGTH = strength;
var endurance =twoD10();
var ENDURANCE = endurance;
var agility = twoD10();
var AGILITY = agility;
var speed = twoD10();
var SPEED = speed;
var beauty = twoD10();

var ethnicityRoll = percentile();
var backgroundRoll = percentile();

var age = 12 + roll(1,10) + roll(1,10) + roll(1,10);

function ethnicity(){
	if (ethnicityRoll <= 62){
		ethnicity = 'Caucasian';
	} else if (ethnicityRoll > 62 && ethnicityRoll <= 80){
		ethnicity = 'Hispanic';
	} else if (ethnicityRoll > 80 && ethnicityRoll <= 86){
		ethnicity = 'Asian';
	} else if (ethnicityRoll > 86 && ethnicityRoll <= 99){
		ethnicity = 'African-American';
	} else {
		ethnicity = 'Native-American';
	}
	return ethnicity;
}

function background(){
	if (backgroundRoll <= 5){
		background = "Medic";	
	} else if (backgroundRoll >= 6 && backgroundRoll <= 10){
		background = "Military";
	} else if (backgroundRoll >= 11 && backgroundRoll <= 15){
		background = "Police Officer";
	} else if (backgroundRoll >= 16 && backgroundRoll <= 20){
		background = "Militia Member";
	} else if (backgroundRoll >= 21 && backgroundRoll <= 25){
		background = "Mariner";
	} else if (backgroundRoll >= 26 && backgroundRoll <= 35){
		background = "Outdoorsman";
	} else if (backgroundRoll >= 36 && backgroundRoll <= 45){
		background = "Security Guard";
	} else if (backgroundRoll >= 46 && backgroundRoll <= 60){
		background = "Gang Member";
	} else if (backgroundRoll >= 61 && backgroundRoll <= 75){
		background = "Handyman";
	} else if (backgroundRoll >= 76 && backgroundRoll <= 90){
		background = "Farmer";
	} else {
		background = "Scavenger";
	}
    return background;
}

var traitPoints = 	Math.floor(willpower / 2);

$(document).ready(function(){
	$('#memory').val(memory);
	$('#logic').val(logic);
	$('#perception').val(perception);
	$('#willpower').val(willpower);
	$('#charisma').val(charisma);
	$('#strength').val(strength);
	$('#endurance').val(endurance);
	$('#agility').val(agility);
	$('#speed').val(speed);
	$('#beauty').val(beauty);
	$('#pointPool').val(traitPoints);
	$('#age').val(age);
	$('#ethnicity').val(ethnicity());
	$('#background').val(background());

	$('.decTrait').click(function(){
		target = $(this).data('trait');
		original = eval(target.toUpperCase());
		value = $('#' + target).val();
		console.log(original);
		if(value > original){
			value--;
			traitPoints++;
			$('#pointPool').val(traitPoints);
			$('#' + target).val(value);
		} else {
			alert("Can't reduce this any further");
		}
	});

	$('.incTrait').click(function(){
		target = $(this).data('trait');
		value = $('#' + target).val();
		if(traitPoints >=1 && value < 20){
			value++;
			traitPoints--;
			$('#pointPool').val(traitPoints);
			$('#' + target).val(value);
		} else {
			alert("Can't increase this any further")
		}	
	});

	$('form').submit(function(event){
		if(traitPoints !== 0){
			event.preventDefault();
			alert( "You must spend all points in Point Pool!" );
		} else if(!$('input[name="sex"]').is(':checked')) {
			event.preventDefault();
			alert( "You must choose whether or not you have a Y chromosome!" );
		}
	});
});