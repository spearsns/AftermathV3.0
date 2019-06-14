$(document).ready(function(){

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
	var memory = 			Number($('#memory').val());
	var logic = 			Number($('#logic').val());
	var perception = 		Number($('#perception').val());
	var willpower = 		Number($('#willpower').val());
	var charisma = 			Number($('#charisma').val());
	var strength = 			Number($('#strength').val());
	var endurance = 		Number($('#endurance').val());
	var agility = 			Number($('#agility').val());
	var speed = 			Number($('#speed').val());

	var actions = 			Math.floor(speed / 2);
	var sequence = 			Math.floor((perception + speed) / 2);

	var choices = 			Number(willpower + roll(1,10));

	//DEMOGRAPHICS
	var ethnicity = 		(sessionStorage.getItem('ethnicity'));

	//COMBAT SKILLS
	var unarmed = 			Number((speed * 3) + (strength * 2) + agility);
	var grapple = 			Number((strength * 2) + endurance + agility + speed);
	var shortWeapons = 		Number((speed * 3) + agility + strength);
	var longWeapons = 		Number((speed * 2) + (agility * 2) + strength);
	var twoHand = 			Number((agility * 2) + (strength * 2) + speed);
	var chain = 			Number((agility * 3) + speed + logic);
	var thrown = 			Number((strength * 2) + (agility * 2) + logic);
	var archery = 			Number((agility * 2) + (logic * 2) + perception);
	var pistols = 			Number((agility * 3) + perception + logic);
	var rifles = 			Number((agility * 2) + (perception *2) + logic);
	var burst = 			Number((logic * 2) + perception + agility + strength);
	var special = 			Number((perception * 2) + (logic * 2) + agility);
	var weaponSys = 		Number((perception * 2) + (logic * 2) + speed);
	var shield = 			Number((strength * 3) + (agility * 2) + speed);
	var offHand = 			Number(0 - ((20 - agility) * 5));

	var block = 			Number(Math.floor((agility + speed) / 2));
	var dodge = 			Number(Math.floor((agility + speed) / 4));

	//SURVIVAL SKILLS
	var envAware =          Number((perception * 2) + logic + memory + roll(1,10));	
	var surveillance =      Number((perception * 3) + logic + roll(1,10));		
	var navigation =        Number((logic * 2) + perception + memory + roll(1,10));	
	var preservation =		Number((logic * 2) + (memory * 2) + roll(1,10));
	var trapping =          Number((perception * 2) + (logic * 2) + roll(1,10));
	var tracking =          Number((perception * 3) + logic + roll(1,10));
	var fishing =           Number((willpower * 2) + perception + logic + roll(1,10));
	var firstAid =          Number((logic * 2) + perception + roll(1,10)); 

	//COVERT
	var stealth =           Number((perception * 3) + agility + roll(1,10));		
	var concealment = 		Number((perception * 3) + logic + roll(1,10));
	var sleight =        	Number(agility + perception + speed + roll(1,10));
	var lockpick =          Number((agility * 2) + logic + perception + roll(1,10));
	var forgery =        	Number((perception * 3) + logic + roll(1,10));
	var sleight =        	Number((agility * 2) + perception + speed + roll(1,10));
	var cryptography =		Number((logic * 3) + perception + roll(1,10));
	var disguise =        	Number((perception * 3) + logic + roll(1,10));
	var restraints =        Number((agility * 2) + (logic * 3) + roll(1,10));

	//TECHNOLOGY
	var crafting =          Number((logic * 2) + agility + memory + roll(1,10));	
	var computers =         Number((memory * 2) + (logic * 2) + roll(1,10));
	var mechanics =         Number(logic * 4 + roll(1,10));
	var electrical =        Number((memory * 2) + (logic * 2) + roll(1,10));
	var radios =            Number((memory * 3) + logic + roll(1,10));
	var construction =      Number((logic * 3) + memory + roll(1,10));
	var programming =       Number((logic * 3) + memory + roll(1,10));
	var networks =         	Number((memory * 2) + (logic * 2) + roll(1,10));
	var circuitry =        	Number((memory * 2) + (logic * 2) + roll(1,10));
	var explosives =        Number(memory + agility + (logic * 2) + roll(1,10));
	var architecture =      Number((logic * 2) + (memory * 2) + roll(1,10));

	//TRANSPORTATION
	var bicycle =          	Number((agility * 2) + logic + perception + roll(1,10));
	var skateboard =        Number((agility * 3) + perception + roll(1,10));
	var horsemanship =      Number((agility * 2) + logic + perception + roll(1,10));
	var automobile =       	Number((logic * 2) + speed + perception + roll(1,10));
	var motorcycle =      	Number((agility * 2) + logic + perception + roll(1,10));
	var jetSki =      	    Number((agility * 2) + logic + perception + roll(1,10));
	var boating =           Number((logic * 2) + speed + perception + roll(1,10));
	var sailing =           Number((logic * 2) + (perception * 2) + roll(1,10));
	var helicopters =       Number((perception * 2) + (logic * 2) + roll(1,10));
	var airplanes =         Number((perception * 2) + (logic * 2) + roll(1,10));
	var multiGear =       	Number((logic * 3) + perception + roll(1,10));
	var hvyEquip =       	Number((logic * 3) + perception + roll(1,10));

	//SCIENCES
	var history =           Number(memory * 4 + roll(1,10));
	var biology =           Number((memory * 2) + (logic * 2) + roll(1,10));
	var botany =            Number((memory * 2) + (logic * 2) + roll(1,10));
	var chemistry =         Number((memory * 3) + logic + roll(1,10));
	var forensics =         Number((logic * 2) + (perception * 2) + roll(1,10));
	var mycology =          Number((memory * 3) + logic + roll(1,10));
	var toxicology =        Number((memory * 3) + logic + roll(1,10));
	var pharmacology =      Number((memory * 4) + roll(1,10));
	var medicine =          Number((memory * 3) + logic + roll(1,10));
	var surgery =          	Number(logic + perception + memory + agility + roll(1,10));

	//SOFT SKILLS
	var gambling =          Number(logic + perception); 							
	var negotiation =       Number((charisma * 4) + roll(1,10)); 							
	var guile =       		Number((logic * 3) + charisma + roll(1,10)); 	 							
	var etiquette =       	Number((logic * 2) + perception + charisma + roll(1,10)); 	 							
	var appraisal =       	Number((perception * 3) + memory + logic + roll(1,10)); 	 						
	var legal =             Number((memory * 4) + roll(1,10)); 							
	var animals =       	Number((charisma * 2) + willpower + logic + roll(1,10)); 	
	var language =      	Number((memory * 2) + (logic * 2));

	if($('#sex').val() == 'Female'){
		$("#facialHair").attr("readonly", true);
	}

	function hairColor(){
		var hairColorRoll = percentile();
		if (ethnicity == 'Caucasian'){
			if(hairColorRoll <= 25){
				hairColor = 'Black';
			}else if(hairColorRoll >= 26 && hairColorRoll <= 40){
				hairColor = 'Dark Brown';
			}else if(hairColorRoll >= 41 && hairColorRoll <= 65){
				hairColor = 'Brown';
			}else if(hairColorRoll >= 66 && hairColorRoll <= 90){
				hairColor = 'Dirty Blonde';
			}else if(hairColorRoll >= 91 && hairColorRoll <= 99){
				hairColor = 'Blonde';
			}else {
				hairColor = 'Red';
			}
		} else if (ethnicity == 'Hispanic'){
			if(hairColorRoll <= 70){
				hairColor = 'Black';
			}else if(hairColorRoll >= 71 && hairColorRoll <= 90){
				hairColor = 'Dark Brown';
			}else if(hairColorRoll >= 91 && hairColorRoll <= 99){
				hairColor = 'Brown';
			}else {
				hairColor = 'Red';
			}
		} else if (ethnicity == 'Asian'){
			if(hairColorRoll <= 85){
				hairColor = 'Black';
			}else {
				hairColor = 'Dark Brown';
			}
		} else if (ethnicity == 'African-American'){
			if(hairColorRoll <= 92){
				hairColor = 'Black';
			}else if(hairColorRoll >= 93 && hairColorRoll <= 99){
				hairColor = 'Brown';
			}else {
				hairColor = 'Red';
			}
		} else {
			if(hairColorRoll <= 95){
				hairColor = 'Black';
			}else {
				hairColor = 'Brown';;
			}
		}
		return hairColor;
	}

	function eyeColor(){
		eyeColorRoll = percentile();
		if(eyeColorRoll <= 12){
			eyeColor = 'Green';
		} else if (eyeColorRoll >= 13 && eyeColorRoll <= 44){
			eyeColor = 'Blue'; 15
		} else if (eyeColorRoll >= 45 && eyeColorRoll <= 59){
			eyeColor = 'Hazel';
		} else if (eyeColorRoll >= 60 && eyeColorRoll <= 75){ 
			eyeColor = 'Brown';
		} else {
			eyeColor = 'Dark Brown'; 
		}
		return eyeColor;
	}

	$('#choicePool').val(choices);

	$('#actions').val(actions);
	$('#sequence').val(sequence);
	
	$('#unarmed').val(unarmed);
	$('#grapple').val(grapple);
	$('#shortWeapons').val(shortWeapons);
	$('#longWeapons').val(longWeapons);
	$('#twoHand').val(twoHand);
	$('#chain').val(chain);
	$('#shield').val(shield);

	$('#thrown').val(thrown);
	$('#archery').val(archery);
	$('#pistols').val(pistols);
	$('#rifles').val(rifles);
	$('#burst').val(burst);
	$('#special').val(special);
	$('#weaponSys').val(weaponSys);
	
	$('#block').val(block);
	$('#dodge').val(dodge);

	$('#offHand').val(offHand);

	$('#envAware').val(envAware);
	$('#navigation').val(navigation);
	$('#surveillance').val(surveillance);
	$('#firstAid').val(firstAid);
	$('#stealth').val(stealth);
	$('#concealment').val(concealment);
	$('#sleight').val(sleight);
	$('#crafting').val(crafting);
	$('#gambling').val(gambling);
	$('#negotiation').val(negotiation);
	$('#guile').val(negotiation);
	$('#etiquette').val(negotiation);
	$('#appraisal').val(negotiation);
	$('#animals').val(animals);

	$('#hairColor').val(hairColor());
	$('#eyeColor').val(eyeColor());

	function initialSkills(){
		var background = $('#background').val().toString();
		if(background == "Medic"){
			$('#firstAid').val(firstAid + twoD10());
			$('#biology').val(biology);
			$('#biologyBtn').attr("disabled", "disabled");
			$('#chemistry').val(chemistry);
			$('#chemistryBtn').attr("disabled", "disabled");
			$('#pharmacology').val(pharmacology);
			$('#pharmacologyBtn').attr("disabled", "disabled");
			$('#medicine').val(medicine);
			$('#medicineBtn').attr("disabled", "disabled");
			$('#surgery').val(surgery);
			$('#surgeryBtn').attr("disabled", "disabled");
		} else if(background == "Veteran"){
			$('#navigation').val(navigation + twoD10());
			$('#envAware').val(envAware + twoD10());
			$('#stealth').val(stealth + twoD10());
			$('#radios').val(radios);
			$('#radiosBtn').attr("disabled", "disabled");
			$('#firstAid').val(firstAid + twoD10());
			$('#surveillance').val(surveillance + twoD10());
			$('#concealment').val(concealment + twoD10());
			$('#animals').val(animals + twoD10());
			$('#unarmed').val(unarmed + twoD10());
			$('#grapple').val(grapple + twoD10());
			$('#twoHand').val(twoHand + twoD10());
			$('#pistols').val(pistols + twoD10());
			$('#rifles').val(rifles + twoD10());
			$('#burst').val(burst + twoD10());
			$('#explosives').val(radios);
			$('#explosivesBtn').attr("disabled", "disabled");
		} else if(background == "Police Officer"){
			$('#radios').val(radios);
			$('#radiosBtn').attr("disabled", "disabled");
			$('#firstAid').val(firstAid + twoD10());
			$('#surveillance').val(surveillance + twoD10());
			$('#unarmed').val(unarmed + twoD10());
			$('#grapple').val(grapple + twoD10());
			$('#pistols').val(pistols + twoD10());
			$('#longWeapons').val(longWeapons + twoD10());
			$('#guile').val(guile + twoD10());
			$('#forensics').val(forensics);
			$('#forensicsBtn').attr("disabled", "disabled");
			$('#computers').val(computers);
			$('#computersBtn').attr("disabled", "disabled");
			$('#legal').val(legal);
			$('#legalBtn').attr("disabled", "disabled");
			$('#restraints').val(restraints);
			$('#restraintsBtn').attr("disabled", "disabled");
		} else if(background == "Militia Member"){
			$('#stealth').val(stealth + twoD10());
			$('#concealment').val(concealment + twoD10());
			$('#firstAid').val(firstAid + twoD10());
			$('#surveillance').val(surveillance + twoD10());
			$('#unarmed').val(unarmed + twoD10());
			$('#grapple').val(grapple + twoD10());
			$('#rifles').val(rifles + twoD10());
			$('#twoHand').val(twoHand + twoD10());
			$('#militiaModal').modal('toggle');
		} else if(background == "Mariner"){
			$('#navigation').val(navigation + twoD10());
			$('#fishing').val(fishing);
			$('#fishingBtn').attr("disabled", "disabled");
			$('#crafting').val(crafting + twoD10());
			$('#envAware').val(envAware + twoD10());
			$('#surveillance').val(surveillance+ twoD10());
			$('#preservation').val(preservation);
			$('#preservationBtn').attr("disabled", "disabled");
			$('#marinerModal').modal('toggle');
		} else if(background == "Outdoorsman"){
			$('#envAware').val(envAware + twoD10());
			$('#tracking').val(tracking);
			$('#trackingBtn').attr("disabled", "disabled");
			$('#trapping').val(trapping);
			$('#trappingBtn').attr("disabled", "disabled");
			$('#surveillance').val(surveillance+ twoD10());
			$('#concealment').val(concealment + twoD10());
			$('#stealth').val(stealth + twoD10());
			$('#preservation').val(preservation);
			$('#preservationBtn').attr("disabled", "disabled");
			$('#animals').val(animals + twoD10());
			$('#outdoorsmanModal').modal('toggle');  
		} else if(background == "Gang Member"){
			$('#block').val(block + roll(1,10));
			$('#surveillance').val(surveillance + twoD10());
			$('#stealth').val(stealth + twoD10());
			$('#unarmed').val(unarmed + twoD10());
			$('#grapple').val(grapple + twoD10());
			$('#firstAid').val(firstAid + twoD10());
			$('#concealment').val(concealment + twoD10());
			$('#gangModal').modal('toggle');
		} else if(background == "Security Guard"){
			$('#surveillance').val(surveillance + twoD10());
			$('#block').val(block + roll(1,10));
			$('#unarmed').val(grapple + twoD10());
			$('#grapple').val(grapple + twoD10());
			$('#securityModal').modal('toggle');
		} else if(background == "Handyman"){
			$('#crafting').val(crafting + twoD10());
			$('#construction').val(construction);
			$('#constructionBtn').attr("disabled", "disabled");
			$('#architecture').val(architecture);
			$('#architectureBtn').attr("disabled", "disabled");
			$('#shortWeapons').val(shortWeapons + twoD10());
		} else if (background == "Farmer"){					
			$('#envAware').val(envAware + twoD10());
			$('#botany').val(botany);
			$('#botanyBtn').attr("disabled", "disabled");
			$('#preservation').val(preservation);
			$('#preservationBtn').attr("disabled", "disabled");
			$('#surveillance').val(surveillance + twoD10());
			$('#twoHand').val(twoHand + twoD10());
			$('#crafting').val(crafting + twoD10());
		} else {	//Scavenger
			$('#envAware').val(envAware + twoD10());
			$('#crafting').val(crafting + twoD10());
			$('#navigation').val(navigation + twoD10());
			$('#appraisal').val(appraisal + twoD10());
		}
	}

	initialSkills();

	$('.train').click(function(){
		target = $(this).data('target');
		value = Number($('#' + target).val());
		if(choices >= 1 && value < 150){
			value += twoD10();
			choices--;
			if(value < 150){
				$('#choicePool').val(choices);
				$('#' + target).val(value);
			} else {
				$('#choicePool').val(choices);
				$('#' + target).val(150);
			}
		} else {
			alert("Can't increase this any further")
		}	
	});

	$('.advTrain').click(function(){
		target = $(this).data('target');
		value = Number($('#' + target).val());
		if(choices >= 2 && value < 150){
			value += twoD10();
			choices -= 2;
			if(value < 150){
				$('#choicePool').val(choices);
				$('#' + target).val(value);
			} else {
				$('#choicePool').val(choices);
				$('#' + target).val(150);
			}
		} else {
			alert("Can't increase this any further")
		}	
	});

	$('.trainDefense').click(function(){
		target = $(this).data('target');
		value = Number($('#' + target).val());
		if(choices >= 1 && value < 50){
			value += roll(1,10);
			choices--;
			if(value < 50){
				$('#choicePool').val(choices);
				$('#' + target).val(value);
			} else {
				$('#choicePool').val(choices);
				$('#' + target).val(50);
			}
		} else {
			alert("Can't increase this any further")
		}	
	});

	$('.advTrainDefense').click(function(){
		target = $(this).data('target');
		value = Number($('#' + target).val());
		if(choices >= 2 && value < 50){
			value += roll(1,10);
			choices -= 2;
			if(value < 50){
				$('#choicePool').val(choices);
				$('#' + target).val(value);
			} else {
				$('#choicePool').val(choices);
				$('#' + target).val(50);
			}
		} else {
			alert("Can't increase this any further")
		}	
	});

	$('.offTrain').click(function(){
		target = $(this).data('target');
		value = Number($('#' + target).val());
		if(choices >= 2 && value < 0){
			value += roll(1,10);
			choices -= 2;
			if(value < 0){
				$('#choicePool').val(choices);
				$('#' + target).val(value);
			} else {
				$('#choicePool').val(choices);
				$('#' + target).val(0);
			}
		} else {
			alert("Can't increase this any further")
		}	
	});

	$('.standard').click(function(){
		target = $(this).data('target');
		if(choices >= 1){
			value = eval(target);
			choices -= 1;
			$('#choicePool').val(choices);
			$('#' + target).val(value);
			$(this).attr("disabled", "disabled");
			} else {
			alert("Not enough choices left")
		}	
	});

	$('.advanced').click(function(){
		target = $(this).data('target');
		if(choices >= 2){
			value = eval(target);
			choices -= 2;
			$('#choicePool').val(choices);
			$('#' + target).val(value);
			$(this).attr("disabled", "disabled");
			} else {
			alert("Not enough choices left")
		}	
	});

	$('.bgChoice').click(function(){
		target = $(this).data('target');
		value = Number($('#' + target).val());
		if(value < 150){
			value += twoD10();
			if(value < 150){
				$('#' + target).val(value);
			} else {
				$('#' + target).val(150);
			}
		}	
	});

	$('.bgSkill').click(function(){
		target = $(this).data('target');
		value = eval(target);
		$('#' + target).val(value);
		$('#' + target + 'Btn').attr("disabled", "disabled");
	});

	var langTarget;
	var target;

	$('#learnLangBtn').click(function(){
		if(choices >= 1){
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
			alert("Not enough choices left")
		}	
	});

	$('.langSelect').click(function(){
		langChoice = $(this).data('language');
		langTarget.val(langChoice);
		$('#' + target).val(language + roll(1,10));
		choices -= 1;
		$('#choicePool').val(choices);
		$(this).attr('disabled', 'disabled');
		$('#languageModal').modal('toggle');
	});

	$('#surgeryBtn').click(function(){
		if (choices >= 2 && $('#biologyBtn').is(":disabled") && $('#firstAid').val() >= 75){
			target = $(this).data('target');
			value = eval(target);
			choices -= 2;
			$('#choicePool').val(choices);
			$('#' + target).val(value);
			$(this).attr("disabled", "disabled");
		} else {
			alert('You MUST have 2 choices remaining and have selected Biology with First Aid >= 75')
		}
	});

	$('#medicineBtn').click(function(){
		if (choices >= 2 && $('#pharmacologyBtn').is(":disabled") && $('#biologyBtn').is(":disabled") && $('#chemistryBtn').is(":disabled") 
			&& $('#firstAid').val() >= 50){
				target = $(this).data('target');
				value = eval(target);
				choices -= 2;
				$('#choicePool').val(choices);
				$('#' + target).val(value);
				$(this).attr("disabled", "disabled");
		} else {
			alert('You MUST have 2 choices remaining and have selected Pharmacology, Biology, and Chemistry with First Aid >= 50')
		}
	});

	$('form').submit(function(event){
		if(choices !== 0){
			event.preventDefault();
			alert( "You must spend all points in the Choices Remaining Pool!" );
		} 
	});
});