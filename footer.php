<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="assets/js/script.js"></script>
<script src="assets/js/jquery.md5.js"></script>

<script>
  $(function (){
		$('.login-btn').on('click', function (e){
			
			var form_param = '';
			$.ajax({
				url: "http://10.91.252.131/webservices/webservices.php",
				dataType: 'json',
				data: {action: 'displayAll'},
					success: function (data)
					{
						/* console.log(data.users[0].user_name);
						console.log(data.users[0].password); */
						var username = $('#admin_username').val();
						var pass = $.md5($('#admin_password').val());
						if(username === data.users[0].user_name && pass === data.users[0].password)
						{
							//alert('success!');
							<?php $_SESSION['username'] = $_POST['username']; ?> //-----------------------------------------------------sa LUNES
							window.location.assign("index.php")
							
						}
						else
						{
							alert('failed!');
						}
					}, //end success
					beforeSend: function( jn ) {
				  console.log('loading...');
				}
			});
			 e.preventDefault();
		});
  });
</script>

</body>
</html>