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

	$('#gameList').on('click', '.playBtn', function(e){ 
		e.preventDefault(); 
		var target = $(this).data('target');
		console.log(target);
		window.location.href = target;
	});


	$('#gameList').on('click', '.tellBtn', function(e){ 
		e.preventDefault(); 
		var target = $(this).data('target');
		
		console.log(target);
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

});