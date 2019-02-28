jQuery(function($){
  var socket = io.connect('http://localhost:3000');
  var sender = username;
  var reciever = '';
  var messageCount = 0;

//USERNAMES
  if(username != null){
    socket.emit('new user', username);
  }

  socket.on('usernames', function(data){
    var html = '';
    for(i=0; i < data.length; i++){
      if (data[i] !== username){
        html += "<div class='row py-1'><div class='col'><button type='button' class='btn btn-light btn-block border user' data-reciever='"+ data[i] +"'>"+ data[i] +"</button></div></div>";
      } else {
        continue;
      }
  }

  $('#userList').html(html);
  });

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
    var messageHtml =  '';
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

//MORE MESSAGE LIST
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
        $('#messageListModal').modal('toggle');
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

    }    
    
  });         //new message

  $('#messageListBtn').click(function(){
    $('#messageListModal').modal('toggle');
  });
});           //JQuery