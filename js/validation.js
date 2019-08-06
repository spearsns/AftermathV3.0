$(document).ready(function(){
	
	function checkUser(){
		username = $('#username').val();
		password = $('#password').val();
		$.ajax({
			type: "POST",
			url: "inc/processAdminLogin.php",
			data: {
					'username': username,
					'password': password
			},
			success: function(response){
				if(response == 'INVALID'){
					console.log(response);
					$('#errorLog').html('INVALID PASSWORD');
				}      
	       	}
		});
	}

	$('#userSubmitBtn').click(function(){
		e.preventDefault;
		checkUser();
	});

});