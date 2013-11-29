/* Connection in MYSQL */

var mysql = require('mysql');
var uuid = require('node-uuid');
var connection = mysql.createConnection({
	host     : 'localhost',
  	user     : 'root',
 	password : '',
	database : 'treasure' 
});


connection.connect();
/* end Connection*/

var express = require('express'),
	app = express(),
	server = require('http').createServer(app),
	io = require('socket.io').listen(server);
	
server.listen(8080);

app.get('/', function (reg, res){
	res.sendfile(__dirname + '/index.php');
});



function currTimer(){
	var e = new Date();
	var curr_date = e.getDate();
	var curr_month = e.getMonth();
	var curr_year = e.getFullYear();
	var hour = checkTime(e.getHours());
	var minute = checkTime(e.getMinutes());
	var seconds = checkTime(e.getSeconds());
	
  
     var formatDate = curr_year + '-' + curr_month + '-' +curr_date  + " " +  hour + ":" +  minute  + ":" + seconds;
	 
	 return formatDate;
}


function checkTime(t) {
    return 10 > t && (t = "0" + t), t
}

function genID(){
	return uuid.v1({
	  node: [0x01, 0x23],
	  clockseq: 0x1234,
	  msecs: new Date().getTime(),
	  nsecs: 5678
	}); 	
}

function randomFromInterval(from,to)
{
    return Math.floor(Math.random()*(to-from+1)+from);
}



var usernames = [];
 var users = {};
var userCount = 0;
var clients = [];

var countdown = 10;
var startTime = currTimer();
var roundID = uuid.v4(); 
var winnerBox = 0;
var onInterval = function() {
    countdown--;
	var data = {
		countdown : countdown,
		startTime : startTime,
		endTime : endTime,
	}
    if(countdown == 0){
        var endTime = currTimer();
		winnerBox = randomFromInterval(1,2);
        clearInterval(myInterval);
		
		 setTimeout(function(){
				
				countdown = 10;
				roundID = uuid.v4(); 
                myInterval = setInterval(onInterval, 2000);
         }, 500);
		 

    }
	
	
	


    io.sockets.emit('timer', { result: data });

};
var myInterval = setInterval(onInterval, 2000);


io.sockets.on('connection', function (socket){
	
	
	
	 socket.on('addUsers', function (data, callback) {
		 
		 var users	 = {
			 username : data.username,
			 socket_id : socket.id
		 }
		 
		  socket.username = data.username;
		  var message;

		  if (clients.hasOwnProperty(socket.id)){
			  if (clients[socket.id].username == data.username && clients[socket.id].itemid ==  data.itemid && clients[socket.id].box == data.box) {
				  	delete clients[socket.id];
			  }else {
					clients[socket.id].itemid = data.itemid;
			  		clients[socket.id].box = data.box;
			  		clients[socket.id].key_price = data.key_price;
			  		clients[socket.id].message = 'You have successfully updated your Bid' ;  
			  }
			  
		  }else {	
				  clients[socket.id] = {
				  username : data.username, 
				  userid : data.user_id,
				  itemid : data.itemid,  
				  box : data.box, 
				  socket_id : socket.id,
				  key_price : data.key_price,
				  message : 'You have successfully placed your Bid'
			 	 }

		  }

		 //io.sockets.socket(socket.id).emit('display result', {users: users});
		 io.sockets.socket(socket.id).emit('displayUsers', {data: clients[data.username]});
		
	 });
	 
	 
	 socket.on('result', function (result){

				if (clients.hasOwnProperty(socket.id)) {
					var itemid  = clients[socket.id].itemid;
					var userid  = clients[socket.id].userid;
					var box  = clients[socket.id].box;
					var keyPrice = clients[socket.id].key_price;
					var userSocket = clients[socket.id].socket_id;
					var message; 
					
					
					
						var insertQuery = connection.query('INSERT INTO round_history (item_id, user_id, created_at, box_id, winner_box) VALUES (?,?, ? , ?, ?)', [itemid, userid, currTimer(), box, winnerBox]);
						var query = connection.query('UPDATE user_credits SET item_qty  = (item_qty - 1)  WHERE user_id = ? AND  item_id = ?', [userid, itemid], function(err, finalResult) {
							if (finalResult.affectedRows == 1){
								  if (box == winnerBox) {
							
											var query2 = connection.query('Select count(user_id) as userCount From user_points WHERE user_id = ? ', [userid],  function(err, rows) {
													var sql3;
													if (rows[0].userCount > 0){
														sql3 = "Update user_points SET points = (points + " + keyPrice  + ") WHERE user_id = " + userid;
													}else {
														
														sql3 = "Insert INTO  user_points SET points = " + keyPrice + ",  user_id = " + userid;  
													}
													
													var query3 = connection.query(sql3, function(err, result) {
															message = "You won: The winning Box is Box number :  " + winnerBox;
															if (result.affectedRows == 1){
																io.sockets.socket(socket.id).emit('user result', {message : message, winnerbox : winnerBox, box : box ,points : keyPrice, itemid : itemid});
															
															}
													});
											});
											
								   }else {
									   message = "You Loss: The winning Box is Box number : " + winnerBox;	
									   io.sockets.socket(socket.id).emit('user result', {message : message, winnerbox : winnerBox, box : box ,points : keyPrice, itemid : itemid});
				
								   }
				
								}
						});
					
					
					
				}
			
			
			socket.emit('winner', {winner : winnerBox});
	 });
	 
	 
	 

	socket.on('disconnect users', function (data) {
		
		for (var users  in clients) {
			delete clients[users];
		}


	});
	

	 
	
});



