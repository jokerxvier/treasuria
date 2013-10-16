<?php include 'header.php'; ?>

  
<section class="container">
  <div class="account-container register">
  
  <div class="content clearfix">
    
    <form action="" id="reg_treasuria" class="reg_treasuria" method="post" >
    
      <h1 class="branding-login"></h1>   
      
      <div class="login-fields">
          <p>Please complete form to create new account</p>
        <div class="field">
          <label for="u_firstname">First Name</label>
          <input type="text" id="u_firstname" name="u_firstname" value="" placeholder="First Name" />
        </div> <!-- /firstname -->
        <div class="field">
          <label for="u_lastname">Last Name</label>
          <input type="text" id="u_lastname" name="u_lastname" value="" placeholder="Last Name"/>
        </div> <!-- /lastname -->
        <div class="field">
          <label for="u_username">Email Address</label>
          <input type="email" id="u_username" name="u_username" value="" placeholder="Username"  />
        </div> <!-- /email / username -->
        
        <div class="field">
          <label for="u_password">Password</label>
          <input type="password" id="u_password" name="u_password" value="" placeholder="Password" />
        </div> <!-- /password -->

        <div class="field">
          <label for="u_c_password">Confirm Password</label>
          <input type="password" id="u_c_password" name="u_c_password" value="" placeholder="Confirm Password" />
        </div> <!-- /confirm password -->
        
		<div class="field">
          <label for="u_address">Address</label>
          <input type="text" id="u_address" name="u_address" value="" placeholder="Address" />
        </div> <!-- /address -->
        
		<div class="field">
          <label for="u_city">City</label>
          <input type="text" id="u_city" name="u_city" value="" placeholder="City"  />
        </div> <!-- /city -->
		
        <div class="field">
          <label for="u_country">Country</label>
          <input type="text" id="u_country" name="u_country" value="" placeholder="Country"  />
        </div> <!-- /country -->
		
        <div class="field">
          <label for="u_phone">Contact Number</label>
          <input type="text" id="u_phone" name="u_phone" value="" placeholder="Contact Number"  />
        </div> <!-- /country -->
       
		<div class="field">
			<label for="gender_male">Male</label>
				<input type="radio" id="gender_male" value="m" name="gender"/>
				
			<label for="gender_female">Female</label>
				<input  type="radio" id="gender_female" value="f" name="gender"/>
				
			<label for="gender" class="error">Please select your gender</label>
		</div>	<!-- /gender -->
        <p>
			<label for="agree">Please agree to our policy</label>
			<input type="checkbox" class="checkbox" id="agree" name="agree" />
		</p>
      </div> <!-- /login-fields -->
      
      <div class="login-actions">
        
                  
        <button type="submit" name="submit" class="button btn login-btn btn-large">Register</button>
        
      </div> <!-- .actions -->
    </form>
    
  </div> <!-- /content -->
  
</div> <!-- /account-container -->

</section>

<?php include 'footer.php'; ?>
