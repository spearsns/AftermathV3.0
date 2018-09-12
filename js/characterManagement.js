$(document).ready(function(){

var experience = $('#experiencePool').val();

var memory = $('#memory').val();
var logic = $('#logic').val();
var perception = $('#perception').val();
var willpower = $('#willpower').val();
var charisma = $('#charisma').val();

var strength = $('#strength').val();
var endurance = $('#endurance').val();
var agility = $('#agility').val();
var speed = $('#speed').val();

var offHand = $('#offHand').val();

var unarmed = $('#unarmed').val();
var grapple = $('#grapple').val();
var shortWeapons = $('#shortWeapons').val();
var longWeapons = $('#longWeapons').val();
var twoHand = $('#twoHand').val();
var chain = $('#chain').val();
var shield = $('#shield').val();
var block = $('#block').val();

var thrown = $('#thrown').val();
var archery = $('#archery').val();
var pistols = $('#pistols').val();
var rifles = $('#rifles').val();
var burst = $('#burst').val();
var special = $('#special').val();
var weaponSys = $('#weaponSys').val();
var dodge = $('#dodge').val();

var stealth = $('#stealth').val();
var concealment = $('#concealment').val();
var sleight = $('#sleight').val();
var lockpick = $('#lockpick').val();
var forgery = $('#forgery').val();
var cryptography = $('#cryptography').val();
var disguise = $('#disguise').val();
var restraints = $('#restraints').val();

var envAware = $('#envAware').val();
var surveillance = $('#surveillance').val();
var navigation = $('#navigation').val();
var preservation = $('#preservation').val();
var tracking = $('#tracking').val();
var trapping = $('#trapping').val();
var fishing = $('#fishing').val();
var firstAid = $('#firstAid').val();

var skateboard = $('#skateboard').val();
var bicycle = $('#bicycle').val();
var horsemanship = $('#horsemanship').val();
var automobile = $('#automobile').val();
var motorcycle = $('#motorcycle').val();
var jetSki = $('#jetSki').val();
var sailing = $('#sailing').val();
var boating = $('#boating').val();
var multiGear = $('#multiGear').val();
var hvyEquip = $('#hvyEquip').val();
var helicopters = $('#helicopters').val();
var airplanes = $('#airplanes').val();

var crafting = $('#crafting').val();
var computers = $('#computers').val();
var programming = $('#programming').val();
var radios = $('#radios').val();
var networks = $('#networks').val();
var mechanics = $('#mechanics').val();
var electrical = $('#electrical').val();
var circuitry = $('#circuitry').val();
var explosives = $('#explosives').val();
var construction = $('#construction').val();
var architecture = $('#architecture').val();

var negotiation = $('#negotiation').val();
var guile = $('#guile').val();
var etiquette = $('#etiquette').val();
var animals = $('#animals').val();
var appraisal = $('#appraisal').val();
var legal = $('#legal').val();
var lang1Value = $('#lang1Value').val();
var lang2Value = $('#lang2Value').val();
var lang3Value = $('#lang3Value').val();
var lang4Value = $('#lang4Value').val();

var history = $('#history').val();
var forensics = $('#forensics').val();
var biology = $('#biology').val();
var chemistry = $('#chemistry').val();
var botany = $('#botany').val();
var mycology = $('#mycology').val();
var toxicology = $('#toxicology').val();
var pharmacology = $('#pharmacology').val();
var surgery = $('#surgery').val();
var medicine = $('#medicine').val();

var actions = Math.floor(speed / 2);
var sequence = Math.floor( (perception + speed) / 2 );

	$('.incTrait').click(function(){
		target = $(this).data('target');
		value = Number($('#' + target).val());
		if( value < 5 && experience >= 5000 ){
			value += 1;
			experience -= 5000;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if ( value >= 5 && value <= 15 && experience >= 2500 ){
			value += 1;
			experience -= 2500;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if ( value > 15 && value < 20 && experience >= 5000 ){
			value += 1;
			experience -= 5000;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else {
			alert('Cannot increase any further');
		}
		if ( target == 'speed'){
			Speed = value;
			Perception = perception;
			actions = Math.floor(speed / 2);
			sequence = Math.floor((Number(Speed) + Number(Perception)) / 2);
			$('#actions').val(actions);
			$('#sequence').val(sequence);
		} else if ( target == 'perception' ){
			Perception = value;
			sequence = Math.floor((Number(Speed) + Number(Perception)) / 2);
			$('#sequence').val(sequence);
		}
	});

	$('.decTrait').click(function(){
		target = $(this).data('target');
		value = Number($('#' + target).val());
		original = eval(target);
		if( value <= 5 && value > original ){
			value -= 1;
			experience += 5000;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if ( value > 5 && value < 15 && value > original ){
			value -= 1;
			experience += 2500;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if ( value >= 15 && value <= 20 && value > original ){
			value -= 1;
			experience += 5000;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else {
			alert('Cannot decrease any further');
		}
		if ( target == 'speed'){
			Speed = value;
			Perception = perception;
			actions = Math.floor(speed / 2);
			sequence = Math.floor((Number(Speed) + Number(Perception)) / 2);
			$('#actions').val(actions);
			$('#sequence').val(sequence);
		} else if ( target == 'perception' ){
			Perception = value;
			sequence = Math.floor((Number(Speed) + Number(Perception)) / 2);
			$('#sequence').val(sequence);
		}
		
	});

	$('.incBlock').click(function(){
		target = $(this).data('target');
		value = Number($('#' + target).val());
		if( value < 10 && experience >= 100 ){
			value += 1;
			experience -= 100;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if ( value >= 10 && value < 20 && experience >= 200 ){
			value += 1;
			experience -= 200;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if ( value >= 20 && value < 30 && experience >= 250 ){
			value += 1;
			experience -= 250;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if ( value >= 30 && value < 40 && experience >= 500 ){
			value += 1;
			experience -= 500;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if ( value >= 40 && value < 50 && experience >= 750 ){
			value += 1;
			experience -= 750;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else {
			alert('Cannot increase any further');
		}
	});

	$('.decBlock').click(function(){
		target = $(this).data('target');
		value = Number($('#' + target).val());
		original = eval(target);
		if( value <= 10 && value > original ){
			value -= 1;
			experience += 100;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if ( value > 10 && value <= 20 && value > original ){
			value -= 1;
			experience += 200;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if ( value > 20 && value <= 30 && value > original ){
			value -= 1;
			experience += 250;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if ( value > 30 && value <= 40 && value > original ){
			value -= 1;
			experience += 500;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if ( value > 40 && value <= 50 && value > original ){
			value -= 1;
			experience += 750;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else {
			alert('Cannot decrease any further');
		}
	});

	$('.incDodge').click(function(){
		target = $(this).data('target');
		value = Number($('#' + target).val());
		if( value < 10 && experience >= 200 ){
			value += 1;
			experience -= 200;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if ( value >= 10 && value < 20 && experience >= 400 ){
			value += 1;
			experience -= 400;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if ( value >= 20 && value < 30 && experience >= 500 ){
			value += 1;
			experience -= 500;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if ( value >= 30 && value < 40 && experience >= 1000 ){
			value += 1;
			experience -= 1000;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if ( value >= 40 && value < 50 && experience >= 1500 ){
			value += 1;
			experience -= 1500;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else {
			alert('Cannot increase any further');
		}
	});

	$('.decDodge').click(function(){
		target = $(this).data('target');
		value = Number($('#' + target).val());
		original = eval(target);
		if( value <= 10 && value > eval(target) ){
			value -= 1;
			experience += 200;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if ( value > 10 && value <= 20 && value > original ){
			value -= 1;
			experience += 400;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if ( value > 20 && value <= 30 && value > original ){
			value -= 1;
			experience += 500;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if ( value > 30 && value <= 40 && value > original ){
			value -= 1;
			experience += 1000;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if ( value > 40 && value <= 50 && value > original ){
			value -= 1;
			experience += 1500;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else {
			alert('Cannot decrease any further');
		}
	});

	$('.incOffHand').click(function(){
		target = $(this).data('target');
		value = Number($('#' + target).val());
		if ( value < -51 && experience >= 100 ){
			value += 1;
			experience -= 200;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if( value <= -50 && value < -40 && experience >= 200 ){
			value += 1;
			experience -= 200;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if ( value >= -40 && value < -30 && experience >= 400 ){
			value += 1;
			experience -= 400;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if ( value >= -30 && value < -20 && experience >= 500 ){
			value += 1;
			experience -= 500;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if ( value >= -20 && value < -10 && experience >= 1000 ){
			value += 1;
			experience -= 1000;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if ( value >= -10 && value < 0 && experience >= 1500 ){
			value += 1;
			experience -= 1500;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else {
			alert('Cannot increase any further');
		}
	});

	$('.decOffHand').click(function(){
		target = $(this).data('target');
		value = Number($('#' + target).val());
		original = eval(target);
		if (value < -51 && value > original ){
			value -= 1;
			experience += 100;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if( value >= -50 && value < -40 && value > original ){
			value -= 1;
			experience += 200;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if ( value >= -40 && value < -30 && value > original ){
			value -= 1;
			experience += 400;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if ( value >= -30 && value < -20 && value > original ){
			value -= 1;
			experience += 500;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if ( value >= -20 && value < -10 && value > original ){
			value -= 1;
			experience += 1000;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if ( value >= -10 && value <= 0 && value > original ){
			value -= 1;
			experience += 1500;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else {
			alert('Cannot decrease any further');
		}
	});

	$('.incStandard').click(function(){
		target = $(this).data('target');
		value = Number($('#' + target).val());
		if( value < 25 && experience >= 250 ){
			value += 1;
			experience -= 250;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if ( value >= 25 && value < 75 && experience >= 100 ){
			value += 1;
			experience -= 100;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if ( value >= 75 && value < 100 && experience >= 250 ){
			value += 1;
			experience -= 250;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if ( value >= 100 && value < 125 && experience >= 500 ){
			value += 1;
			experience -= 500;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if ( value >= 125 && value < 150 && experience >= 750 ){
			value += 1;
			experience -= 750;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else {
			alert('Cannot increase any further');
		}
	});

	$('.decStandard').click(function(){
		target = $(this).data('target');
		value = Number($('#' + target).val());
		original = eval(target);
		if( value <= 25 && value > original ){
			value -= 1;
			experience += 250;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if ( value > 25 && value <= 75 && value > original ){
			value -= 1;
			experience += 100;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if ( value > 75 && value <= 100 && value > original ){
			value -= 1;
			experience += 250;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if ( value > 100 && value <= 125 && value > original ){
			value -= 1;
			experience += 500;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if ( value > 125 && value <= 150 && value > original ){
			value -= 1;
			experience += 750;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else {
			alert('Cannot decrease any further');
		}
	});

	$('.incAdvanced').click(function(){
		target = $(this).data('target');
		value = Number($('#' + target).val());
		if( value < 25 && experience >= 500 ){
			value += 1;
			experience -= 500;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if ( value >= 25 && value < 75 && experience >= 250 ){
			value += 1;
			experience -= 250;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if ( value >= 75 && value < 100 && experience >= 500 ){
			value += 1;
			experience -= 500;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if ( value >= 100 && value < 125 && experience >= 1000 ){
			value += 1;
			experience -= 1000;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if ( value >= 125 && value < 150 && experience >= 1500 ){
			value += 1;
			experience -= 1500;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else {
			alert('Cannot increase any further');
		}
	});

	$('.decAdvanced').click(function(){
		target = $(this).data('target');
		value = Number($('#' + target).val());
		original = eval(target);
		if( value <= 25 && value > original ){
			value -= 1;
			experience += 500;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if ( value > 25 && value <= 75 && value > original ){
			value -= 1;
			experience += 250;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if ( value > 75 && value <= 100 && value > original ){
			value -= 1;
			experience += 500;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if ( value > 100 && value <= 125 && value > original ){
			value -= 1;
			experience += 1000;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if ( value > 125 && value <= 150 && value > original ){
			value -= 1;
			experience += 1500;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else {
			alert('Cannot decrease any further');
		}
	});

	$('.incSurgery').click(function(){
		target = $(this).data('target');
		value = Number($('#' + target).val());
		if ( value == 0 && ( $('#biology').val() < 50 || $('#firstAid').val() < 75) ){
			alert('You must have at least 50 in Biology and 75 in First Aid');
		} else if( value < 25 && experience >= 500 ){
			value += 1;
			experience -= 500;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if ( value >= 25 && value < 75 && experience >= 250 ){
			value += 1;
			experience -= 250;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if ( value >= 75 && value < 100 && experience >= 500 ){
			value += 1;
			experience -= 500;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if ( value >= 100 && value < 125 && experience >= 1000 ){
			value += 1;
			experience -= 1000;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if ( value >= 125 && value < 150 && experience >= 1500 ){
			value += 1;
			experience -= 1500;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else {
			alert('Cannot increase any further');
		}
	});

	$('.decSurgery').click(function(){
		target = $(this).data('target');
		value = Number($('#' + target).val());
		original = eval(target);
		if( value <= 25 && value > original ){
			value -= 1;
			experience += 500;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if ( value > 25 && value <= 75 && value > original ){
			value -= 1;
			experience += 250;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if ( value > 75 && value <= 100 && value > original ){
			value -= 1;
			experience += 500;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if ( value > 100 && value <= 125 && value > original ){
			value -= 1;
			experience += 1000;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if ( value > 125 && value <= 150 && value > original ){
			value -= 1;
			experience += 1500;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else {
			alert('Cannot decrease any further');
		}
	});

	$('.incMedicine').click(function(){
		target = $(this).data('target');
		value = Number($('#' + target).val());
		if ( value == 0 && ( $('#biology').val() < 50 || $('#chemistry').val() < 50 || $('#pharmacology').val() < 50 || $('#firstAid').val() < 50) ){
			alert('You must have at least 50 in Biology, Chemistry, Pharmacology, and First Aid');
		} else if( value < 25 && experience >= 500 ){
			value += 1;
			experience -= 500;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if ( value >= 25 && value < 75 && experience >= 250 ){
			value += 1;
			experience -= 250;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if ( value >= 75 && value < 100 && experience >= 500 ){
			value += 1;
			experience -= 500;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if ( value >= 100 && value < 125 && experience >= 1000 ){
			value += 1;
			experience -= 1000;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if ( value >= 125 && value < 150 && experience >= 1500 ){
			value += 1;
			experience -= 1500;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else {
			alert('Cannot increase any further');
		}
	});

	$('.decMedicine').click(function(){
		target = $(this).data('target');
		value = Number($('#' + target).val());
		original = eval(target);
		if( value <= 25 && value > original ){
			value -= 1;
			experience += 500;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if ( value > 25 && value <= 75 && value > original ){
			value -= 1;
			experience += 250;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if ( value > 75 && value <= 100 && value > original ){
			value -= 1;
			experience += 500;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if ( value > 100 && value <= 125 && value > original ){
			value -= 1;
			experience += 1000;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if ( value > 125 && value <= 150 && value > original ){
			value -= 1;
			experience += 1500;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else {
			alert('Cannot decrease any further');
		}
	});
	
	var langTarget;
	var target;

	$('#learnLangBtn').click(function(){
		if(experience >= 250){
			$('.langSlot').each(function(){
				if ( !($(this).val().length > 0) ){
					$('#languageModal').modal('toggle');
					langTarget = $(this);
					target = $(this).data('target');
					return false;
				} else if ( $('#lang4').val().length > 0){
					alert('You know the maximum number of languages')
					return false;
				}
			});
		} else {
			alert("Not enough experience to learn a new language")
		}	
	});

	$('.langSelect').click(function(){
		langChoice = $(this).data('language');
		langTarget.val(langChoice);
		$('#' + target).val(1);
		experience -= 250;
		$('#experiencePool').val(experience);
		$(this).attr('disabled', 'disabled');
		$('#languageModal').modal('toggle');
	});

	$('.incLanguage').click(function(){
		target = $(this).data('target');
		value = Number($('#' + target).val());
		if ( !$('#' + target).val() ){
			alert('You must select a language first');
		} else if( value < 25 && experience >= 250 ){
			value += 1;
			experience -= 250;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if ( value >= 25 && value < 75 && experience >= 100 ){
			value += 1;
			experience -= 100;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if ( value >= 75 && value < 100 && experience >= 250 ){
			value += 1;
			experience -= 250;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if ( value >= 100 && value < 125 && experience >= 500 ){
			value += 1;
			experience -= 500;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if ( value >= 125 && value < 150 && experience >= 750 ){
			value += 1;
			experience -= 750;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else {
			alert('Cannot increase any further');
		}
	});

	$('.decLanguage').click(function(){
		target = $(this).data('target');
		lang = $(this).data('lang');
		value = Number($('#' + target).val());
		original = eval(target);
		if (value == 1){
			$('#' + lang).val(null);
			value -= 1;
			experience += 250;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if( value <= 25 && value > original ){
			value -= 1;
			experience += 250;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if ( value > 25 && value <= 75 && value > original ){
			value -= 1;
			experience += 100;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if ( value > 75 && value <= 100 && value > original ){
			value -= 1;
			experience += 250;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if ( value > 100 && value <= 125 && value > original ){
			value -= 1;
			experience += 500;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else if ( value > 125 && value <= 150 && value > original ){
			value -= 1;
			experience += 750;
			$('#' + target).val(value);
			$('#experiencePool').val(experience);
		} else {
			alert('Cannot decrease any further');
		}
	});

	var ability;
	var abilitySlot;
	var choice;

	$('#learnAbilityBtn').click(function(){
		$('.abilitySlot').each(function(){
			if ( !($(this).val().length > 0) ){
				$('#abilityModal').modal('toggle');
				abilitySlot = $(this);
				return false;
			} else if ( $('#ability16').val().length > 0){
				alert('You know the maximum number of abilities')
				return false;
			}
		});
	});

	$('.abilitySelect').click(function(){
		ability = $(this).data('target');
		$('#abilityModal').modal('toggle');
		$('#' + ability + 'Modal').modal('toggle');
	});

	$('.abilityChoice').click(function(){
		choice = $(this).data('name');
		traitReq = $(this).data('trait');
		skillReq = $(this).data('skill');
		cost = $(this).data('cost');
		if ( eval(traitReq) == true && eval(skillReq) == true && experience >= cost){
			abilitySlot.val(choice);
			experience -= cost;
			$('#experiencePool').val(experience);
			$(this).attr('disabled', 'disabled');
			$('#' + ability + 'Modal').modal('hide');
			$('#abilityModal').modal('hide');
		} else {
			alert('Requirements not met!');
		}
	});
});