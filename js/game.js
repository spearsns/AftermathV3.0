	/* 
	Created by: Kenrick Beckett

	Name: Chat Engine
	*/
    
	var instanse = false;
	var state;
	var mes;
	var file;
	var dice = false;

    function Chat(){
      this.update = updateChat;
      this.send = sendChat;
      this.getState = getStateOfChat;
    }

	var checkFocus = function() {
	    var container = $('#chat-area');
	    var height = container.height();
	    var scrollHeight = container[0].scrollHeight;
	    var st = container.scrollTop();
	    var sum = scrollHeight - height - 80;
	    if(st >= sum) {
	      return true;
	    } else {
	      return false;
	 	}
	}

	//gets the state of the chat
	function getStateOfChat(){
		if(!instanse){
			instanse = true;
			$.ajax({
			   	type: "POST",
				url: "../inc/processChat.php",
				data: 	{  
						'function': 'getState',
						'file': file
						},
				dataType: "json",
				
				success: function(data){
				   	state = data.state;
					instanse = false;
				   },
			});
		}	 
	}

	//Updates the chat
	function updateChat(){
		if(!instanse){
			instanse = true;
		    $.ajax({
				type: "POST",
				url: "../inc/processChat.php",
				data: 	{  
						'function': 'update',
						'state': state,
						'file': file
						},
				   	dataType: "json",
				   	success: function(data){
					   if(data.text){
							for (var i = 0; i < data.text.length; i++) {
	                            $('#chat-area').append($("<p class='mb-0'>"+ data.text[i] +"</p>"));          
	                        }								  
					   }
					   if(checkFocus()) {
					       	$('#messages').html( data );
	        				document.getElementById('chat-area').scrollTop = document.getElementById('chat-area').scrollHeight;
	    				} else {
					       	$('#messages').html( data );
	    				}
					   instanse = false;
					   state = data.state;
				   },
				});
		 	} else {
			setTimeout(updateChat, 500);
		}
	}

	//send the message
	function sendChat(message, nickname)
	{       
	    updateChat();
	    $.ajax({
		   type: "POST",
		   url: "../inc/processChat.php",
		   data: 	{  
		   			'function': 'send',
					'message': message,
					'nickname': nickname,
					'file': file,
				 	},
		   dataType: "json",
		   success: function(data){
			   updateChat();
		   },
		});
	}

	function sendDice(message, nickname){       
	    updateChat();
	     $.ajax({
			   type: "POST",
			   url: "../inc/processChat.php",
			   data: 	{  
			   			'function': 'dice',
						'message': message,
						'nickname': nickname,
						'file': file,
					 	},
			   dataType: "json",
			   success: function(data){
				   updateChat();
			   },
			});
	}

$(document).ready(function(){
	var storyTeller = '';
	var gameName = $('#gameName').val();

	function roll(min, max){
		return Math.round(Math.random() * (max - min)) + min;
	}

	function percentile(){
		return (roll(0,9) * 10) + roll(1,10);
	}

	function twoD10(){
		return roll(1,10) + roll(1,10);
	}

	function getParticipants(){
		$.ajax({
			type: "GET",
			url: "../inc/getParticipants.php",
			dataType: "html",
			success: function(response){
				$('#userList').html(response);
				$('#bootList').html(response);
			}
		})
	}

	function getPlayers(){
		$.ajax({
			type: "GET",
			url: "../inc/getPlayers.php",
			dataType: "html",
			success: function(response){                    
	           $("#interface").html(response);
	       	}
		});
	}
	getPlayers();

	function getStoryteller(){
		$.ajax({
			type: "GET",
			url: "../inc/getStoryteller.php",
			dataType: "html",
			success: function(response){
				storyTeller = response;                    
	           $("#storytellerName").val(response);
	       	}
		});
	}
	getStoryteller();

	function getExp(){
		$.ajax({
			type: "GET",
			url: "../inc/getExp.php",
			success: function(response){
				$('#expPool').val(String(response));
			}
		})
	}
	getExp();

	$('#percentileBtn').click(function(){
		var roll = percentile();

		if (roll == 11 ||
			roll == 22 ||
			roll == 33 ||
			roll == 44 ||
			roll == 55 ||
			roll == 66 ||
			roll == 77 ||
			roll == 88 ||
			roll == 99 ||
			roll == 100){
				var percentileResult = "[%] !!CRITICAL!! " + roll;
		} else if (roll >= 1 && roll <= 9){
			var percentileResult = "[%] 0" + roll;
		} else {
			var percentileResult = "[%] " + roll;
		}
		sendDice(percentileResult, name);
	});

	$('#LoSBtn').click(function(){
		var LoS = Number( $('#LoSValue').val() );
		var LoF = (100 - LoS) + 1;
		var successRate = Math.floor(LoS / 3);
		var failRate = Math.floor(LoF / 3);
		//SUCCESS
		var majorSuccess = "Major Success: " + successRate + " or less";
		var directSuccess = "Direct Success: " + String(successRate + 1) + " - " + String(successRate * 2);
		var minorSuccess = "Minor Success: " + String( (successRate * 2) + 1) + " - " + String(LoS);
		//FAIL
		var minorFail = "Minor Failure: " + String(LoS + 1) + " - " + String( (LoS + 1) + failRate );
		var directFail = "Direct Failure: " + String( ( (LoS + 1) + failRate) + 1 ) + " - " + String( (LoS + 1) + (failRate * 2) );
		var majorFail = "Major Failure: " + String( (100 - failRate) + 1 ) + " or more";

		class Likelihood {
			first(){
				sendChat(majorSuccess, name);
				return this;
			}
			second(){
				sendChat(directSuccess, name);
				return this;
			}
			third(){
				sendChat(minorSuccess, name);
				return this;
			}
			fourth(){
				sendChat(minorFail, name);
				return this;
			}
			fifth(){
				sendChat(directFail, name);
				return this;
			}
			sixth(){
				sendChat(majorFail, name);
				return this;
			}
		}

		const likelihoodCalc = new Likelihood()
			likelihoodCalc
				.first()
				.second()
				.third()
				.fourth()
				.fifth()
				.sixth();

	});

	$('#twoD10Btn').click(function(){
		var roll = twoD10();
		var twoD10Result = "[2D10] " + roll;
		sendDice(twoD10Result, name);
	});

	$('#randomHitBtn').click(function(){
		var RHC = percentile();
		var RHCResult;
		if (RHC <= 3){
			RHCResult = "NECK";
		} else if (RHC >= 4 && RHC <= 7){
			RHCResult = "FACE";
		} else if (RHC >= 8 && RHC <= 15){
			RHCResult = "HEAD";
		} else if (RHC >= 16 && RHC <= 20){
			RHCResult = "PELVIS (GROIN/REAR)";
		} else if (RHC >= 21 && RHC <= 30){
			RHCResult = "MIDSECTION (STOMACH/LOWER BACK)";
		} else if (RHC >= 31 && RHC <= 35){
			RHCResult = "LEFT RIBS (HEART)";
		} else if (RHC >= 36 && RHC <= 40){
			RHCResult = "RIGHT RIBS";
		} else if (RHC >= 41 && RHC <= 45){
			RHCResult = "LEFT SHOULDER";	
		} else if (RHC >= 46 && RHC <= 50){
			RHCResult = "RIGHT SHOULDER";
		} else if (RHC >= 51 && RHC <= 55){
			RHCResult = "LEFT THIGH";
		} else if (RHC >= 56 && RHC <= 60){
			RHCResult = "RIGHT THIGH";
		} else if (RHC >= 61 && RHC <= 65){
			RHCResult = "LEFT BICEP";
		} else if (RHC >= 66 && RHC <= 70){
			RHCResult = "RIGHT BICEP";
		} else if (RHC >= 71 && RHC <= 75){
			RHCResult = "LEFT FOREARM";
		} else if (RHC >= 76 && RHC <= 80){
			RHCResult = "RIGHT FOREARM";
		} else if (RHC >= 81 && RHC <= 86){
			RHCResult = "LEFT CALF";
		} else if (RHC >= 87 && RHC <= 92){
			RHCResult = "RIGHT CALF";
		} else if (RHC >= 93 && RHC <= 94){
			RHCResult = "LEFT HAND";
		} else if (RHC >= 95 && RHC <= 96){
			RHCResult = "RIGHT HAND";
		} else if (RHC >= 97 && RHC <= 98){
			RHCResult = "LEFT FOOT";
		} else {
			RHCResult = "RIGHT FOOT";
		}
		sendDice("[HIT] " + RHCResult, name);
	});

	$('#whisperBtn').click(function(){
		getParticipants();
		$('#whisperModal').modal('toggle');
	});

	$('#bootBtn').click(function(){
		getParticipants();
		$('#bootModal').modal('toggle');
	});

	$('#lockInterface').on('click', '.lockBtn', function(e){ 
		var gameID = $(this).data('reference');
		$.ajax({
			type: 		'POST',
			url: 		'../inc/lockGame.php',
			data: 		{
						'gameID' : gameID
						},
			success: 	function(result){
							$('.lockBtn').html('UNLOCK GAME');
							$('.lockBtn').removeClass('btn-dark').addClass('btn-success');
							$('.lockBtn').removeClass('lockBtn').addClass('unlockBtn');
						}  			
		});
	});

	$('#lockInterface').on('click', '.unlockBtn', function(e){ 
		var gameID = $(this).data('reference');
		$.ajax({
			type: 		'POST',
			url: 		'../inc/unlockGame.php',
			data: 		{
						'gameID' : gameID
						},
			success: 	function(result){
							$('.unlockBtn').html('LOCK GAME');
							$('.unlockBtn').removeClass('btn-success').addClass('btn-dark');
							$('.unlockBtn').removeClass('id').addClass('lockBtn');
						}  			
		});
	});

	setInterval(getExp, 1000);
	var listing = setInterval(getPlayers, 1000);
	setInterval(getStoryteller, 1000);

	$('#charMgmtBtn').click(function(){
		var url = $(this).data('target');
		window.open(url,'_blank');
	});
	/* GAME MAP */
	function getGameMap(){
		$.ajax({
			type: "GET",
			url: "../inc/getGameMap.php",
			dataType: "html",
			success: function(response){      
	           	$("#mapSlot").css('background-image', 'url("'+ response +'")' );
	        }
		});
	}

	$('.interface').on('click', '.gameMapBtn', function(e){
		e.preventDefault();
		if(window.location.href.indexOf("_Tell") > -1){
			$('#updateMapRow').removeClass("d-none");
			$('#updateMapError').removeClass("d-none");
		}
		getGameMap(); 
		$('#gameMapModal').modal('toggle');
	});

	$('#mapForm').on('submit', function(e){
		e.preventDefault();
		$.ajax({
			type: 			"POST",
			url: 			"../inc/processGameMap.php",
			data: 			new FormData(this),
			contentType: 	false,
			cache: 			false,
			processData: 	false,
			success: 		function(data){
								if(data === 'invalid'){
									$('#mapErrorLog').html('<h5 style="color: red;"><strong>SOMETHING WENT WRONG...</strong></h5>');
								} else {
									$("#mapSlot").css('background-image', 'url("' + data + '")' );
									$('#mapForm')[0].reset();
									sendChat("MAP UPDATED", name);
								}
							},
			error: 			function(e){
								$('#mapErrorLog').html(e);	
							}
		});
	});

	/* ID MARKS */
	$('.interface').on('click', '.idMarksBtn', function(e){ 
		e.preventDefault(); 
		var characterID = $(this).data('reference');
		$.ajax({
			type: 		"POST",
			url: 		"../inc/getIDMarks.php",
			data: 		{
						'characterID' : characterID
						},
			dataType: 	"json",
			success: 	function(idmarks){
							$('#CharacterID').val(characterID);

							if (window.location.href.indexOf("_Tell") > -1) {
							    $('.idMarks').removeAttr('readonly');
							    $('#IDcloseBtn').html("<button type='submit' class='btn btn-success btn-lg btn-block border'>CONFIRM & SAVE</button>");

							    if (idmarks['Deceased'] == 0){
									$('#deathToggle').html("<input type='button' class='btn btn-light btn-lg btn-block border' data-toggle='button' aria-pressed='false' "
									+ "name='Deceased' id='deathBtn' autocomplete='off' value='ALIVE' >");
								} else if (idmarks['Deceased'] == 1){
									$('#deathToggle').html("<input type='button' class='btn btn-dark btn-lg btn-block border active' data-toggle='button' aria-pressed='true' "
									+ "name='Deceased' id='deathBtn' autocomplete='off' value='DEAD' >");
								}
							}

							Object.keys(idmarks).forEach(function(key){
								$('.idMarks').each(function(){
									if( $(this).attr('id') == key){
										$(this).val(idmarks[key]);
									}
								})
							}); 
						$('#idMarksModal').modal('toggle');
						}
		});
	});

	$('#deathToggle').on('click', '#deathBtn', function(e){
		if ( $(this).attr('aria-pressed') == 'false' ) {
			$(this).val('DEAD');
		} 
		if ( $(this).attr('aria-pressed') == 'true' ) {
			$(this).val('ALIVE');
		}
		$(this).toggleClass('btn-light');
		$(this).toggleClass('btn-dark');
	});

	$("#IDMarksForm").submit(function(e) {
	  	e.preventDefault();
	  	if ( $('input[name="Deceased"]').hasClass('active') ){
	  		deceased = '1';
	  	} else {
	  		deceased = '0';
	  	}
	  	var dataString = $("#IDMarksForm").serialize() + '&Deceased=' + deceased;
	  	$.ajax({
			type: 		"POST",
			url: 		"../inc/updateIDMarks.php",
			data: 		dataString,
			dataType: 	"json"
		});
		$('#idMarksModal').modal('toggle');
    });

    $('.interface').on('click', '.charSheetBtn', function(e){ 
		e.preventDefault(); 
		var characterID = $(this).data('reference');

		$.ajax({
			type: 		"POST",
			url: 		"../inc/getCharacterSheet.php",
			data: 		{
						'characterID' : characterID
						},
			dataType: 	"json",
			success: 	function(response){
							Object.keys(response).forEach(function(key){
								
								$('#characterSheetModal input[type="text"]').each(function(){
									if( $(this).attr('id') == key){
										$(this).val(response[key]);
									}
								})
							}); 

						$('#characterSheetModal').modal('toggle');
						}
		});
	});

    $('.interface').on('focus', '.earnedExp', function(e){ 
		e.preventDefault(); 
		clearInterval(listing);
	});

	$('.interface').on('click', '.awardExpBtn', function(e){ 
		e.preventDefault(); 
		var characterID = $(this).data('reference');
		var experience = $('.earnedExp[data-reference="' + characterID + '"]').val();
		$.ajax({
			type: 		"POST",
			url: 		"../inc/updateExperience.php",
			data: 		{
						'characterID' : characterID,
						'experience' : experience
						},
			dataType: 	"html",
			success: 	function(response){
							$('.earnedExp[data-reference="' + characterID + '"]').val('');
							listing = setInterval(getPlayers, 1000);
						}
		});
	});
});