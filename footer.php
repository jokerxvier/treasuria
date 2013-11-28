<footer id="footer">
    <div class="container">
      <p class="text-center">&copy; <?php echo date ("Y") ?> Treasuria</p>
    </div>
  </footer>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="assets/js/jquery-1.7.2.min.js" type="text/javascript"></script>
     <script src="http://192.168.1.75:8080/socket.io/socket.io.js"></script>
     <script src="assets/js/script.js"></script>
	 <script src="assets/js/jquery.md5.js"></script>
    <script src="assets/js/validation.js" type="text/javascript"></script>
   
	

	<!-- VALIDATION -->

	
<script>
	function getRandDaily(){
				var fruits=[1, 5]
				var fruitweight=[6, 3] // 60, 30
				var totalweight=eval(fruitweight.join("+"))
				var weighedfruits=new Array()
				var currentfruit=0
						
				while (currentfruit<fruits.length){ 
					for (i=0; i<fruitweight[currentfruit]; i++)
						weighedfruits[weighedfruits.length]=fruits[currentfruit]
						currentfruit++
					}
				var randomnumber=Math.floor(Math.random()*totalweight);
					
				return weighedfruits[randomnumber];
	
	}
			
			
	$(function() {
				
				var socket = io.connect('http://192.168.1.75:8080');
				var user_id = '<?php echo (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : false  ?>';
				var username = '<?php echo (isset($_SESSION['username'])) ? $_SESSION['username'] : false ?>';
				
				function callModal(message){
						$('#game-msg').modal('show');
						
						$('.modal-body h3').text(message);	
						
						setTimeout(function (){
							$('#game-msg').modal('hide')
						}, 3000);
						
						$('#game-msg').on('hidden.bs.modal', function () {
							$('#game-msg').data('modal', null);
						})
			
				}
				
				function regAjaxFunc(params, url){
					var data;
					$.ajax({
						  type: "POST",	
						  url: url,
						  async: false, 
						  dataType: 'json',
						  data: params,
						  success: function (result) {
							console.log(result);
							if (result.success == 1){
								$('.message').addClass('success').html(result.message);	
							}else {
								$('.message').addClass('error').html(result.message);	
							}
							  
						  }, //end success

					});

				
				}
				
				
				$('#reg_treasuria').validate({
						rules: {
							u_firstname: "required",
							u_lastname: "required",
							u_username: {
								required: true,
								email: true
							},
							u_password: {
								required: true,
								minlength: 5
							},
		
							u_c_password: {
								required: true,
								minlength: 5,
								equalTo: "#u_password"
							},
							
							gender: "required",
							
							
							agree: "required"
						},
						messages: {
							u_firstname: "Please enter your First Name",
							u_lastname: "Please enter your Last Name",
							u_password: {
								required: "Please provide a Password",
								minlength: "Your password must be at least 5 characters long"
							},
		
							u_c_password: {
								required: "Please provide a password",
								minlength: "Your password must be at least 5 characters long",
								equalTo: "Please enter the same password as above"
							},
							u_username: {
								required: "Please provide your Email Address",
								email: "Please enter a valid email address",
							},
							gender: "Please select your gender",
							agree: "You must accept our policy to proceed."
						},
						
						
						submitHandler: function(form) {
							
							var params = {
								fname : $('#u_firstname').val(),
								lname : $('#u_lastname').val(),
								pass : 	$('#u_password').val(),
								email : $('#u_username').val(),
								gender : $('#gender').val(),
								action : 'register'
							}
							var url = 'process.php';
							
							regAjaxFunc(params, url);
							
						  //console.log('success');
						  //form.submit();
						}
				});
				
				
				$('#treasuria_login').validate({
					rules: {
							email: {
									required: true,
									email: true
								},
							pass: "required"
						},
					messages: {
						email: {
								required: "Please provide your Email Address",
								email: "Please enter a valid email address",
							},
						pass: "Please provide your Password"
					},
					
				});
				
				
				$('.key').click(function (){
					
					if (user_id && username) {
								var splitItem = $(this).find('.inputKey').val().split('-');
								var info = {
									userid : user_id,
									itemid : splitItem[0], // keyid
									box : splitItem[1], // boxid
									username : username, 
									action : "auction"
								}
									$.ajax({
									  type: 'POST',
									  dataType: 'json',
									  url: 'ajax.php',
									  data: info,
									  beforeSend: function(){
										   console.log("sending: ");
									   },
									   success: function(data) {
											if (data.success == 1) {
												var res = {
													username: data.username,
													user_id : data.user_id,
													box: data.box,
													itemid: data.itemid,
													key_price : data.key_price
												}
												socket.emit('addUsers', res);
												
											}else if (data.success == 0) {
												callModal(data.message);
											
											}
									
										
					
									  },
										
									  error:function (xhr, ajaxOptions, thrownError){
											console.log(xhr.status);
											console.log(thrownError);
									  } 
								});
								
					}else {
						alert('error');	
					}
				});
				
				
				socket.on('timer', function (data) {
					$('.countdown').html(data.result.countdown);
						if (data.result.countdown == 9){
							$('.chest').removeClass('chest-active');
							 $('.timer p').show();
							 $('.countdown').css('margin', '-100px 0 0 0');
						}
					   if (data.result.countdown == 0){
						   $('.countdown').html('<span class="loading">Loading...</span>');
						   $('.timer p').hide();
						   $('.countdown').css('margin', '-133px 0 0 0');
						   $('.key').removeClass('rotated');
						  // socket.emit('result', {data : username});
					 }

				});
				
				socket.on('displayUsers', function (result) {
			   //console.log(result);
			});

			socket.on('user result', function (data) {
				
				socket.emit('disconnect users');
				var currPoints = $('.coin').text();
				var currKey = $('.key-' + data.itemid).html();
				if (data.box == data.winnerbox) {
					$('.coin').text(parseInt(currPoints) + parseInt(data.points));
				}
				$('.key-' + data.itemid).text(parseInt(currKey) - 1);

				callModal(data.message);
				
				
			});
			
			socket.on('winner', function (data) {
				if (data.winner == 1){
					$('.chest1').addClass('chest-active');
					$('.chest2').removeClass('chest-active');
				}else if (data.winner == 2) {
					$('.chest2').addClass('chest-active');
					$('.chest1').removeClass('chest-active');
				}
				//socket.emit('restart timer');
			});
				
				
			$('.daily-chest').click(function (){
				var box = $(this).find('.dailbox').val();
				var myDiv = $(this);
				
				var params = {
					action : 'daily',
					box : box,
					userid : user_id,
					result : getRandDaily()
				};
				
				$.ajax({
					  type: 'POST',
					  dataType: 'json',
					  url: 'ajax.php',
					  data: params,
					  beforeSend: function(){
						   console.log("sending daily... ");
					   },
					   success: function(data) {
						if(data.success == 1){
						  if(data.box == box ){
							  myDiv.addClass('x' + data.result);
								setTimeout(function (){
									myDiv.removeClass('x' + data.result);
								}, 3000);
								
								callModal(data.message);
						  }
	
						}else {
							
							callModal(data.message);	
						}
						
	
					  },
						
					  error:function (xhr, ajaxOptions, thrownError){
							console.log(xhr.status);
							console.log(thrownError);
					  } 
				 
			 	});
			
			
	
			});	
				
				

	});
</script> 

  <!-- / VALIDATION -->

</body>
</html>