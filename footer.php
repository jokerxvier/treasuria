<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="assets/js/jquery-1.7.2.min.js" type="text/javascript"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="assets/js/script.js"></script>
	<script src="assets/js/jquery.md5.js"></script>
	<script src="assets/js/validation.js" type="text/javascript"></script>

	<!-- VALIDATION -->
  
	<script>
	$().ready(function() {
		
		$('#reg_treasuria').validate({
				rules: {
					u_firstname: "required",
					u_lastname: "required",
					u_password: {
						required: true,
						minlength: 5
					},
					u_c_password: {
						required: true,
						minlength: 5,
						equalTo: "#password"
					},
					u_username: {
						required: true,
						email: true
					},
					agree: "required"
				},
				messages: {
					u_firstname: "Please enter your firstname",
					u_lastname: "Please enter your lastname",
					u_password: {
						required: "Please provide a password",
						minlength: "Your password must be at least 5 characters long"
					},
					u_c_password: {
						required: "Please provide a password",
						minlength: "Your password must be at least 5 characters long",
						equalTo: "Please enter the same password as above"
					},
					u_username: "Please enter a valid email address",
					agree: "Please accept our policy"
				},
				submitHandler: function(form) {
				  console.log('success');
				}
		});
	});
	</script> 

  <!-- / VALIDATION -->
  
</body>
</html>