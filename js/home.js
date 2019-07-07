$(document).ready(function(){

	function getGames(){
		$.ajax({
			type: "GET",
			url: "inc/getGames.php",
			dataType: "html",
			success: function(response){                    
	           $("#gameList").html(response);
	       	}
		});
	}

	getGames();
	listing = setInterval(getGames, 1000);
	var gameID = '';

	$('#gameList').on('click', '.playBtn', function(e){ 
		e.preventDefault(); 
		var target = $(this).data('target');
		window.location.href = target;
	});

	$('#gameList').on('click', '.tellBtn', function(e){ 
		e.preventDefault(); 
		var target = $(this).data('target');
		window.location.href = target;
	});

	$('#gameList').on('mouseenter', '.playBtn', function(e){ 
		clearInterval(listing);
	});
	$('#gameList').on('mouseleave', '.playBtn', function(e){ 
		listing = setInterval(getGames, 1000);
	});
	$('#gameList').on('mouseenter', '.tellBtn', function(e){ 
		clearInterval(listing);
	});
	$('#gameList').on('mouseleave', '.tellBtn', function(e){ 
		listing = setInterval(getGames, 1000);
	});
	$('#gameList').on('mouseenter', '.adminBtn', function(e){ 
		clearInterval(listing);
	});
	$('#gameList').on('mouseleave', '.adminBtn', function(e){ 
		listing = setInterval(getGames, 1000);
	});

//GAME ADMIN
	function getGameInfo(){
		$.ajax({
			type: 'POST',
			url: 'inc/getGameInfo.php',
			data: {'gameID': gameID},
			dataType: 'json',
			success: function(response){
				$('#currentGName').val(response['GameName']);
				$('#currentGDesc').val(response['Description']);
				$('#currentSTPass').val(response['StorytellerPassword']);
				$('#currentPPass').val(response['PlayerPassword']);
	       	}
		});
	}

	$('#gameList').on('click', '.adminBtn', function(e){
		e.preventDefault(); 
		gameID = $(this).data('reference');
		getGameInfo();
		$('#adminLoginModal').modal('toggle');
	});

	function checkAdminPW(){
		password = $('#adminLoginPassword').val();
		$.ajax({
			type: "POST",
			url: "inc/processAdminLogin.php",
			data: {
					'gameID': gameID,
					'password': password
			},
			success: function(response){
				if(response == 'INVALID'){
					$('#errorLog').html('INVALID PASSWORD');
				} else if(response == 'VALID'){
					$('#adminLoginModal').modal('toggle');
					$('#adminModal').modal({backdrop: 'static'});
				}         
	       	}
		});
	}

	$('#adminLoginBtn').click(function(e){
		e.preventDefault(); 
		checkAdminPW();
	});

	$('#updateGNameBtn').click(function(e){
		e.preventDefault();
		var output = '';
		var current = $('#currentGName').val();
		if( $('#currentGName').val() == $('#newGName').val()){
			output = 'New game name must be different from the current';
			$('#adminLog').html(output);
		} else if ( $('#newGName').val() == '' ){
			output = 'New game name cannot be blank';
			$('#adminLog').html(output);
		} else {
			$('#confirmationText').html('Are you certain you want to change the game name?');
			$('#yesBtn').attr('data-target', 'name');
			$('#confirmationModal').modal('toggle');
		}
	});

	$('#updateGDescBtn').click(function(e){
		e.preventDefault();
		var output = '';
		if( $('#currentGDesc').val() == $('#newGDesc').val()){
			output = 'New game description must be different from the current';
			$('#adminLog').html(output);
		} else if ( $('#newGDesc').val() == '' ){
			output = 'New game description cannot be blank';
			$('#adminLog').html(output);
		} else {
			$('#confirmationText').html('Are you certain you want to change the game description?');
			$('#yesBtn').attr('data-target', 'description');
			$('#confirmationModal').modal('toggle');
		}
	});;

	$('#updateSTPassBtn').click(function(e){
		e.preventDefault();
		var output = '';
		if( $('#currentSTPass').val() == $('#newSTPass').val()){
			output = 'New storyteller password must be different from the current';
			$('#adminLog').html(output);
		} else if ( $('#newSTPass').val() == '' ){
			output = 'New storyteller password cannot be blank';
			$('#adminLog').html(output);
		} else {
			$('#confirmationText').html("Are you certain you want to change the storyteller's password?");
			$('#yesBtn').attr('data-target', 'STPass');
			$('#confirmationModal').modal('toggle');
		}
	});

	$('#updatePPassBtn').click(function(e){
		e.preventDefault();
		var output = '';
		if( $('#currentPPass').val() == $('#newPPass').val()){
			output = 'New storyteller password must be different from the current';
			$('#adminLog').html(output);
		} else {
			$('#confirmationText').html("Are you certain you want to change the player's password?");
			$('#yesBtn').attr('data-target', 'PPass');
			$('#confirmationModal').modal('toggle');
		}
	});

	$('#endGameBtn').click(function(e){
		e.preventDefault();
		var output = '';
		$('#yesBtn').attr('data-target', 'endGame');
		$('#confirmationText').html("Are you certain you want to delete this game permanently?");
		$('#confirmationModal').modal('toggle');
	});

	$('#yesBtn').click(function(e){
		var process = $('#yesBtn').attr('data-target');
		var target = '';
		var change = '';

		switch (process) {
			case 'name':
				target = 'GameName';
				change = $('#newGName').val();
				break;
			case 'description':
				target = 'Description';
				change = $('#newGDesc').val();
				break;
			case 'STPass':
				target = 'StorytellerPassword';
				change = $('#newSTPass').val();
				break;
			case 'PPass':
				target = 'PlayerPassword';
				change = $('#newPPass').val();
				break;
			case 'endGame':
				target = 'DeleteGame';
				break;
			default:
				break;
		}

		$.ajax({
		type: "POST",
		url: "inc/updateGame.php",
		data: 	{
				'gameID': gameID,
				'process': target,
				'update': change
				},
		success: function(response){
				switch (process) {
					case 'name':
						$('#currentGName').val(change);
						break;
					case 'description':
						$('#currentGDesc').val(change);
						break;
					case 'STPass':
						$('#currentSTPass').val(change);
						break;
					case 'PPass':
						$('#currentPPass').val(change);
						break;
					case 'endGame':
						$('#adminModal').modal('toggle');
						break;
					default:
						break;
				}
				$('#confirmationModal').modal('toggle');
			}    
		});
	});

	$('#noBtn').click(function(e){
		e.preventDefault();
		$('#confirmationModal').modal('toggle');
	});

	$('#adminCloseBtn').click(function(e){
		e.preventDefault();
		$.ajax({
			type: "POST",
			url: "inc/processAdminLogout.php",
			data: 	{'gameID': gameID},
			success: function(response){
				$('#adminModal').modal('toggle');
	       	}
		});
	});

	$('#onlineBtn').click(function(e){
		e.preventDefault();
		$('#onlineModal').modal('toggle');
	});
});