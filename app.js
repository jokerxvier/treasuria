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




var countdown = 10;
var startTime = currTimer();
var onInterval = function() {
    countdown--;
    if(countdown == 0){
        var endTime = currTimer();
        clearInterval(myInterval);
        countdown = 10;


            setTimeout(function(){
                myInterval = setInterval(onInterval, 2000);
            }, 5000); 
        

    }

    io.sockets.emit('timer', { countdown: countdown });
};
var myInterval = setInterval(onInterval, 2000);



/*socket.on('reset', function (data) {
	 countdown = 1000;
	io.sockets.emit('timer', { countdown: countdown });
});*/
		


io.sockets.on('connection', function (socket){
	
		socket.on('reset', function (data) {
			 countdown = 10;
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
		 
		 
		 
		
		 
		
		
				
							
});





/*
socket.on('bid', function (data){
	   connection.query( 'SELECT * FROM users', function(err, rows) {
   		io.sockets.emit('bid list', rows);	
  

    	
 	 });
		

  });	

*/