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

	function sendDice(message, nickname)
	{       
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
		} else if (roll >= 01 && roll <= 09){
			var percentileResult = "[%] 0" + roll;
		} else {
			var percentileResult = "[%] " + roll;
		}
			console.log(roll);
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
		console.log(RHC);
		sendDice(RHCResult, name);
	});

	$('.idMarksBtn').click(function(){
		$('#idMarksModal').modal('toggle');
	});

	$('.charSheetBtn').click(function(){
		$('#characterSheetModal').modal('toggle');
	});
});