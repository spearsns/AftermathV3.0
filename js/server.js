var express =  require('express'),
	app = express(),
	server = require('http').createServer(app),
	io = require('socket.io').listen(server),
	users = {};
	
server.listen(3000);

app.get('/', function(req, res){
	res.sendFile(__dirname + '/index.php');
});

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
	});
});
