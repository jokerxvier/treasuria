/* Connection in MYSQL */

var mysql = require('mysql');
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





var countdown = 60;
setInterval(function() {
	countdown--;
	if(countdown == 0){
		 countdown = 60;
	}
	io.sockets.emit('timer', { countdown: countdown });
}, 1000);

io.sockets.on('connection', function (socket){
	

    	
		
		socket.on('reset', function (data) {
   			 countdown = 1000;
    		io.sockets.emit('timer', { countdown: countdown });
 	   });
		
		
		
  		socket.on('bid', function (data){

	
			 var sql = "SELECT *  FROM user_credits WHERE user_id = " + connection.escape(data.user) + "AND item_id =" + connection.escape(data.key);
			 var query =  connection.query(sql, function(err, rows) { 
			 	
				if(rows.length > 0 ){
					if (rows[0].item_qty > 0){
						var post  = {user_id: data.user, item_id: rows[0].item_id};
							var query2 = connection.query('INSERT INTO round_history SET ?', post, function(err, result) {
								  //io.sockets.emit('bid list', result);
								  
								  if (result.affectedRows == 1){
										 var sql = "SELECT count(user_id) AS bidCount FROM round_history WHERE user_id = " + connection.escape(data.user) + "AND item_id =" + connection.escape(data.key);
										 var query =  connection.query(sql, function(err, bidResult) {
											
												 
												 var query3 = connection.query('UPDATE user_credits SET item_qty = (item_qty - 1)  WHERE user_id = ? AND  item_id = ?', [data.user, rows[0].item_id], function(err, finalResult) {
													 if(finalResult.affectedRows == 1) {
															 io.sockets.emit('bid list', {itemid: rows, userid:  data.user, user : data.username , boxed : data.boxed, success : 1 });
													 }
												
												 });//io.sockets.emit('bid list', {error : bidResult});
											
												
										 });
								  }
							});
					}else {
						io.sockets.emit('bid list', {error : "You don't have enough Key"});
					}
					
				}else {
					 	io.sockets.emit('bid list', {error : "You don't have enough Key"});
				}
				
			 

			 });
			 
		
		
			  
			  
			
		 });	
		 
		 
		 socket.on('inserttime', function (data){ 
			 //io.sockets.emit('bid time', data);
			 if (data == 'check'){
				  var sql = "SELECT MAX(id) as maxID FROM round_tb LIMIT 1";
				   var query =  connection.query(sql, function(err, rows) {
					    //var sql2 = "SELECT * FROM rount_tb WHERE id = " + connection.escape(rows);
						
 						var sql2 = "SELECT * FROM rount_tb WHERE id = " + connection.escape(rows[0].maxID);
						var query2 = connection.query(sql2, function(err2, rows2) {
							var data = {
								current_round : rows[0].maxID,
								current_ctr : rows2[0].time_ctr,
								create_date: rows2[0].created_at
							}
					  		 io.sockets.emit('bid time',  data);
						});
					 
					
				   });
				   
				   
			
			 }
			 
			 
			 
		});
		
		 socket.on('timeUpdate', function (data){ 
			 /*var post  = {time_ctr : data.counter, id : data.round_id};
		 	 var query = connection.query('UPDATE rount_tb SET ? WHERE ?', post, function(err, result) {
			 	 if (result.affectedRows == 1){
					 io.sockets.emit('time insert',  'success');
				 }
			 });(*/
			 var post  = {time_ctr : data.counter};
			 var query = connection.query('UPDATE round_tb SET ? WHERE id = ' + data.round_id, post, function(err, result) {
				 io.sockets.emit('time insert',  data.counter);
			 });
		 	 
		 
		 });
		
		
				
							
});





/*
socket.on('bid', function (data){
	   connection.query( 'SELECT * FROM users', function(err, rows) {
   		io.sockets.emit('bid list', rows);	
  

    	
 	 });
		

  });	

*/