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
					gender: "required",
					u_password: {
						required: true,
						minlength: 5
					},
					u_city: {
						required: true,
						minlength: 3
					},
					u_address: {
						required: true,
						minlength: 3
					},
					u_country: {
						required: true
					},
					u_phone: {
						required: true,
						minlength: 7,
						digits: true
					},
					u_c_password: {
						required: true,
						minlength: 5,
						equalTo: "#u_password"
					},
					u_username: {
						required: true,
						email: true
					},
					agree: "required"
				},
				messages: {
					u_firstname: "Please enter your First Name",
					u_lastname: "Please enter your Last Name",
					gender: "Please select your gender",
					u_password: {
						required: "Please provide a Password",
						minlength: "Your password must be at least 5 characters long"
					},
					u_city: {
						required: "Please provide your city",
						minlength: "Your City is incomplete!"
					},
					u_address: {
						required: "Please provide your address",
						minlength: "Your address is incomplete!"
					},
					u_country: {
						required: "Select your country"
					},
					u_phone: {
						required: "Please provide your contact number",
						minlength: "Your contact number is incomplete!",
						digits: "Please input numbers only."
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
					agree: "You must accept our policy to proceed."
				},
				submitHandler: function(form) {
				  console.log('success');
				  form.submit();
				}
		});
		$('#treasuria_login').validate({
			rules: {
				username: {
						required: true,
						email: true
					},
				password: "required"
				},
			messages: {
				username: {
						required: "Please provide your Email Address",
						email: "Please enter a valid email address",
					},
					password: "Please provide your Password"
			},
				submitHandler: function(form) {
				  console.log('success');
				  form.submit();
				}
		});
		
		
		$('.modal-btn').on('click', function (){
			$('#myModal').modal('show');
			var item_img  = $(this).parent().find('.txt-qrcde').val();	
			var item_title  = $(this).parent().find('.item-title').text();
			$('#myModal .modal-body').html('<img src="'+item_img+'" />');
			$('.modal-title').text(item_title);
		});
		
		$('#myModal').data('modal', null);
	});
	</script> 

  <!-- / VALIDATION -->
  
</body>
</html>