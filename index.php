<?php
	include('inc/config.php');
	session_start();

  if(isset($_SESSION['gameID'])){

    $ID = $_SESSION['ID'];
    $gameID = $_SESSION['gameID'];
     
    $GPUpdateSQL =
      "UPDATE game_participants
      SET PlayerActive = 0
      WHERE GameID = '$gameID' AND UserID = '$ID'
      ";

    $result1 = mysqli_query($conn, $GPUpdateSQL) or die(mysqli_error($conn));

    $gamesUpdateSQL =
      "UPDATE games
      SET StorytellerActive = 0,
          Locked = 0
      WHERE ID = '$gameID' AND StorytellerID = '$ID'
      ";

    $result2 = mysqli_query($conn, $gamesUpdateSQL) or die(mysqli_error($conn));
  }
  
    unset($_SESSION['gameID']);
    unset($_SESSION['gameName']);
?>

<!doctype html>
<html lang='en' dir='ltr'>
  	<head>
    	<meta charset="utf-8">
    	<meta http-equiv="x-ua-compatible" content="ie=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    	<title>Welcome to the Aftermath</title>
	    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    	<link rel="stylesheet" type="text/css" href="css/styles.css" />

      <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
      <script type="text/javascript" src="js/bootstrap.min.js"></script>
      <script type="text/javascript" src="js/home.js"></script>
  	</head>

	<body>
		<div class="container-fluid" id='contentWrap'>
  		<?php 
        include('header.php');
      ?>

      <div class='row metal border-bottom-0 py-2'>

  			<div class='col-3'>
  				<a href='newCharacter.php' role='button' class="btn btn-warning btn-lg btn-block border">NEW CHARACTER</a>
  			</div>

        <div class='col-1'></div>

        <div class='col-4'>
          <button type="button" class="btn btn-light btn-lg btn-block border">FIRST TIME? BE PREPARED...</button>
        </div>

        <div class='col-1'></div>
        
  			<div class='col-3'>
  				<a href='characterSelect.php' role='button' class="btn btn-warning btn-lg btn-block border">CHARACTER MGMT</a>
  			</div>

  		</div>

      <div class='row'>
        <div class='col-10 black'>
      		<div class='row metal border-top-0 py-2'>
            <div class='col-2'>
              <a href='newGame.php' role='button' class="btn btn-danger btn-lg btn-block border">NEW GAME</a>
            </div>

            <div class='col-3'>
              <img src='img/graffiti/gamesX.png'>
            </div>

            <div class='col-5'>
              <img src='img/graffiti/description.png' class='mx-auto d-block'>
            </div>

            <div class='col-2'></div>
          </div>

          <div id='gameList'></div>
        </div>

        <div class='col-2 brass'>
          <img src='img/graffiti/onlineX.png' class='my-2'>
          <div id='userList'></div>
        </div>

        <script>
          jQuery(function($){
            var socket = io.connect('http://localhost:3000');
            
            if(username != null){
              socket.emit('new user', username);
            }

            socket.on('usernames', function(data){
              var html = '';
              for(i=0; i < data.length; i++){
                html += "<div class='row py-1'><div class='col'><button type='button' class='btn btn-light btn-block border user' data-reciever='"+ data[i] +"'>"+ data[i] +"</button></div></div>"
              }

              $('#userList').html(html);
            });

            var sender = username;
            var reciever = '';
            var messageCount = 0;

//SENDING MESSAGE
            $('#messageModalArea').on('click', '#sendMessageBtn', function(e){
              e.preventDefault();
              if(username !== undefined){
                $('#messageBox-'+ reciever).append( "<b>"+ username + " :</b> " + $('#sendTo-'+ reciever).val() + "<br/>" );
                socket.emit('send message', sender + '-' + reciever + '=' + $('#sendTo-'+ reciever).val(), function(data){
                  $('#messageBox-'+ reciever).append('<span class="error">' + data + '</span><br/>');
                });
                $('#sendTo-'+ reciever).val('');
                $('#sendTo-'+ reciever).focus();
              } else {
                alert('You must login in order to use chat feature');
              }
            });

            $('#userList').on('click', '.user', function(e){ 
              e.preventDefault();
              reciever = $(this).data('reciever');
              var messageHtml = '';
              messageHtml += '<div class="modal fade" id="message-'+ reciever +'" tabindex="-2" role="dialog" aria-labelledby="message-'+ reciever +'" aria-hidden="true">';
              messageHtml += '  <div class="modal-dialog modal modal-dialog-centered" role="document">';
              messageHtml += '    <div class="modal-content">';

              messageHtml += '      <div class="modal-header text-center bg-primary">';
              messageHtml += '        <h5 class="modal-title w-100 font-weight-bold text-light">- '+ reciever +' -</h5>';
              messageHtml += '      </div>';

              messageHtml += '      <div class="modal-body">';
              messageHtml += '        <div class="container-fluid">';
                        
              messageHtml += '          <div class="row">';
              messageHtml += '            <div class="col messageBox" id="messageBox-'+ reciever +'"></div>';
              messageHtml += '          </div>';

              messageHtml += '          <br/>';

              messageHtml += '          <div class="row">';
              messageHtml += '            <div class="col-9 px-0">';
              messageHtml += '              <div class="input-group input-group-lg">';
              messageHtml += '                <input type="text" class="form-control border text-center" id="sendTo-'+ reciever +'" autofocus />';
              messageHtml += '              </div>';
              messageHtml += '            </div>';

              messageHtml += '            <div class="col-3 px-1">';
              messageHtml += '              <button type="button" class="btn btn-info btn-lg btn-block border" id="sendMessageBtn">SEND</button>';
              messageHtml += '            </div>';
              messageHtml += '          </div>';

              messageHtml += '        </div>';
              messageHtml += '      </div>';

              messageHtml += '      <div class="modal-footer">';
              messageHtml += '        <div class="col"></div>';
                        
              messageHtml += '        <div class="col" id="closeBtn">';
              messageHtml += '          <button type="button" class="btn btn-danger btn-lg btn-block border" data-dismiss="modal">CLOSE</button>';
              messageHtml += '        </div>';
                        
              messageHtml += '        <div class="col"></div>';

              messageHtml += '      </div>';

              messageHtml += '    </div>';
              messageHtml += '  </div>';
              messageHtml += '</div>'
              $('#messageModalArea').append(messageHtml);
              $('#message-' + reciever).modal({"backdrop": "static"});
              $('#sendTo-'+ reciever).focus();
            });

//RECIEVING MESSAGE
            socket.on('new message', function(data){
              
              if (username == data.reciever){
                reciever = data.sender;

                if ( $('.messageReply').data('target') !== reciever){
                  if ( $('#message-'+ reciever).length > 0){
                    messageCount = messageCount;
                  } else {
                    messageCount += 1;  
                  }
                  
                //MESSAGE LIST
                  var messageListHtml = '';
                  messageListHtml +=    '<div class="row messageReply my-1 py-1 bg-secondary border" data-target="'+ reciever +'">';
                  messageListHtml +=    ' <div class="col-4 px-1">';
                  messageListHtml +=    '   <div class="input-group input-group-lg">';
                  messageListHtml +=    '     <input type="text" class="form-control border text-center" value="'+ reciever +'" readonly />';
                  messageListHtml +=    '   </div>';
                  messageListHtml +=    ' </div>';

                  messageListHtml +=    ' <div class="col-8 px-1">';
                  messageListHtml +=    '   <div class="input-group input-group-lg">';
                  messageListHtml +=    '    <input type="text" class="form-control border text-center" value="'+ data.msg.substring(0, 15) + " ..." +'" readonly />';
                  messageListHtml +=    '   </div>';
                  messageListHtml +=    ' </div>';
                  messageListHtml +=    '</div>';

                  $('#messageList').append(messageListHtml);  
                }

                //INSTANT MESSAGING MODAL
                if( $('#message-' + reciever).length > 0 ){
                  
                  $('#messageBox-'+ reciever).append('<b>' + data.sender + ': </b>' + data.msg + '<br/>');
                  $('#sendTo-'+ reciever).focus();

                } else {
                  var messageHtml = '';
                  messageHtml += '<div class="modal fade" id="message-'+ reciever +'" tabindex="-2" role="dialog" aria-labelledby="message-'+ reciever +'" aria-hidden="true">';
                  messageHtml += '  <div class="modal-dialog modal modal-dialog-centered" role="document">';
                  messageHtml += '    <div class="modal-content">';

                  messageHtml += '      <div class="modal-header text-center bg-primary">';
                  messageHtml += '        <h5 class="modal-title w-100 font-weight-bold text-light">- '+ reciever +' -</h5>';
                  messageHtml += '      </div>';

                  messageHtml += '      <div class="modal-body">';
                  messageHtml += '        <div class="container-fluid">';
                            
                  messageHtml += '          <div class="row">';
                  messageHtml += '            <div class="col messageBox" id="messageBox-'+ reciever +'"></div>';
                  messageHtml += '          </div>';

                  messageHtml += '          <br/>';

                  messageHtml += '          <div class="row">';
                  messageHtml += '            <div class="col-9 px-0">';
                  messageHtml += '              <div class="input-group input-group-lg">';
                  messageHtml += '                <input type="text" class="form-control border text-center" id="sendTo-'+ reciever +'" autofocus />';
                  messageHtml += '              </div>';
                  messageHtml += '            </div>';

                  messageHtml += '            <div class="col-3 px-1">';
                  messageHtml += '              <button type="button" class="btn btn-info btn-lg btn-block border" id="sendMessageBtn">SEND</button>';
                  messageHtml += '            </div>';
                  messageHtml += '          </div>';

                  messageHtml += '        </div>';
                  messageHtml += '      </div>';

                  messageHtml += '      <div class="modal-footer">';
                  messageHtml += '        <div class="col"></div>';
                            
                  messageHtml += '        <div class="col" id="closeBtn">';
                  messageHtml += '          <button type="button" class="btn btn-danger btn-lg btn-block border" data-dismiss="modal">CLOSE</button>';
                  messageHtml += '        </div>';
                            
                  messageHtml += '        <div class="col"></div>';

                  messageHtml += '      </div>';

                  messageHtml += '    </div>';
                  messageHtml += '  </div>';
                  messageHtml += '</div>';
                  $('#messageModalArea').append(messageHtml);
                  $('#messageBox-'+ reciever).append('<b>' + data.sender + ': </b>' + data.msg + '<br/>');
                }
              
                if (messageCount == 1){
                  $('#messageListBtn').html('(1) MESSAGE').addClass('btn-primary').removeClass('btn-light');
                } else if (messageCount > 1) {
                  $('#messageListBtn').html('(' + messageCount + ') MESSAGES').addClass('btn-primary').removeClass('btn-light');  
                } else {
                  $('#messageListBtn').html('MESSAGES').addClass('btn-light').removeClass('btn-primary'); 
                }

              $('#messageList').on('click', '.messageReply', function(e){ 
                e.preventDefault();
                messageCount -= 1;
                reciever = $(this).data('target');
                $('#message-' + reciever).modal({"backdrop": "static"});
                $('#sendTo-'+ reciever).focus();
                  
                if (messageCount == 1){
                  $('#messageListBtn').html('(1) MESSAGE').addClass('btn-primary').removeClass('btn-light');
                } else if (messageCount > 1) {
                  $('#messageListBtn').html('(' + messageCount + ') MESSAGES').addClass('btn-primary').removeClass('btn-light');  
                } else {
                  $('#messageListBtn').html('MESSAGES').addClass('btn-light').removeClass('btn-primary'); 
                }
              });
            } else {
              messageCount == messageCount;
            }        
          });         //new message
        });           //JQuery
        </script>

        <script src='node_modules/socket.io-client/dist/socket.io.js'></script>

      </div>
      <?php include('footer.php'); ?>
    </div> 
  </body>
</html>