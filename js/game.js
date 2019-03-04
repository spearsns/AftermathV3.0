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
		} else if (RHC >= 31 && RHC <= 40){
			RHCResult = "LEFT UPPER BODY (RIBS[HEART]/SHOULDER)";
		} else if (RHC >= 41 && RHC <= 50){
			RHCResult = "RIGHT UPPER BODY (RIBS/SHOULDER)";
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

	$('#adminBtn').click(function(){
		var gameID = $(this).data('reference');
		$.ajax({
			type: 		"POST",
			url: 		"../inc/checkLocks.php",
			data: 		{
						'gameID' : gameID
						},
			dataType: 	"html",
			success: 	function(result){
							$('#gameLock').html(result);
							$('#adminModal').modal('toggle');
						}
		});
	});

	$('#gameLock').on('click', '#lockBtn', function(e){ 
		var gameID = $(this).data('reference');
		$.ajax({
			type: 		'POST',
			url: 		'../inc/lockGame.php',
			data: 		{
						'gameID' : gameID
						},
			success: 	function(result){
							$('#adminModal').modal('toggle');
						}  			
		});
	});

	$('#gameLock').on('click', '#unlockBtn', function(e){ 
		var gameID = $(this).data('reference');
		$.ajax({
			type: 		'POST',
			url: 		'../inc/unlockGame.php',
			data: 		{
						'gameID' : gameID
						},
			success: 	function(result){
							$('#adminModal').modal('toggle');
						}  			
		});
	});

	setInterval(getExp, 1000);
	var listing = setInterval(getPlayers, 1000);
	setInterval(getStoryteller, 1000);

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
							    $('#closeBtn').html("<button type='submit' class='btn btn-success btn-lg btn-block border'>CONFIRM & SAVE</button>");

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

	$('#endGameBtn').click(function(){
		$('#adminModal').modal('toggle');
		$('#confirmCloseModal').modal('toggle');
	});

	$('#noCloseBtn').click(function(){
		$('#confirmCloseModal').modal('toggle');
	});

	$('#yesCloseBtn').click(function(){
		var gameID = $(this).data('reference');
		$.ajax({
			type: 		'POST',
			url: 		'../inc/processCloseGame.php',
			data: 		{
						'gameID' : gameID
						},
			success: 	function(result){
							window.location.replace('../index.php');
						}  			
		});  			
	});

});