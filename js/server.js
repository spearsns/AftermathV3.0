var express =  require('express'),
	app = express(),
	server = require('http').createServer(app),
	io = require('socket.io').listen(server),
	users = {};


server.listen(3000);

io.sockets.on('connection', function(socket){
	
	socket.on('new user', function(data, callback){
		socket.nickname = data;
		users[socket.nickname] = socket;
		updateNicknames();
	}); 

	function updateNicknames(){
		io.sockets.emit('usernames', Object.keys(users) );
	}

	socket.on('send message', function(data, callback){
		var msg = data.trim();
		var senderIndex = msg.indexOf('-');
		var sender = msg.substring(0, senderIndex);
		var recieverIndex = msg.indexOf('=');
		var reciever = msg.substring(senderIndex + 1, recieverIndex);
		var message = msg.substring(recieverIndex + 1);
		if (sender in users && reciever in users){
			users[reciever].emit('new message', {msg: message, sender: socket.nickname, reciever: reciever});
		} else {
			callback('--<b style="color: red;">Error: User has disconnected</b>');
		}
	});

	socket.on('disconnect', function(data){
		if(!socket.nickname) return; //IF NOT SET JUST 'RETURN OUT'
		delete users[socket.nickname];
		updateNicknames();
		io.emit('logout');

//MySQL -- CONNECTION ERROR
/*
var mysql = require('mysql');

var con = mysql.createConnection({
  host: "127.0.0.1:3307",
  user: "root",
  password: "",
  database: "aftermath"
});

!!!!! HANDSHAKE ISSUE WITH XAMPP AGAIN.  THEORETICALLY SHOULD WORK WITH MySQL
!!!!! CROSS REFERENCE USERNAME TO GET USERID

con.connect(function(err) {
		  if (err) throw err;
		  console.log("Connected!");
		  var sql1 = "	UPDATE users 
		  				SET Active = 0
          				WHERE ID = '$userID'
          			 ";
		  var sql2 = "	UPDATE game_participants
          				SET PlayerActive = 0
          				WHERE UserID = '$userID'
          			 ";
		  var sql3 = "	UPDATE games
          				SET StorytellerActive = 0,
          				StorytellerID = 0
          				WHERE StorytellerID = '$userID'
          			 ";

		  con.query(sql, function (err, result) {
		    if (err) throw err;
		    console.log(result.affectedRows + " record(s) updated");
		  });
	});
*/		
	});
	
	socket.on('boot user', function(data){
		var target = data;
		if(target in users){
			users[target].emit('eject');
		}
	});
});


