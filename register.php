<?php include 'head.php' ?>
<div id="wrap">
<section class="container">
  <div class="register-container register">
  
  <div class="content clearfix">
    
    <form action="#" id="reg_treasuria" class="reg_treasuria" method="post" >
      <input type="hidden"  name="action" value="register" />	
      <h1 class="branding-login"></h1>   
      
      <div class="form-horizontal clearfix">
      	<div class="message"></div>
		<?php /*?><?php if(isset($_GET["error"]) and $_GET["error"]=="email_error") { ?> <div class="error"> <?php echo $email_error; ?> </div> <?php } ?>
        <?php if(isset($_GET["verify"]) and $_GET["verify"]=="sentemail") { ?> <div class="success"> <?php echo $sentverification; ?> </div> <?php } ?><?php */?>
          <p>Please complete form to create new account</p>

        <div class="form-group">
          <label for="u_firstname" class="col-lg-4 control-label">First Name</label>
          <div class="col-lg-8">
            <input type="text" class="form-control" id="u_firstname" name="u_firstname" value="" placeholder="First Name" />
          </div>
        </div><!--end of FIRST NAME-->

        <div class="form-group">
          <label for="u_lastname" class="col-lg-4 control-label">Last Name</label>
          <div class="col-lg-8">
            <input type="text" class="form-control" id="u_lastname" name="u_lastname" value="" placeholder="Last Name"/>
          </div>
        </div><!--end of LAST NAME-->

        <div class="form-group">
          <label for="u_username" class="col-lg-4 control-label">Email Address</label>
          <div class="col-lg-8">
            <input type="email" class="form-control" id="u_username" name="u_username" value="" placeholder="Email"  />
          </div>
        </div><!--end of USERNAME / EMAIL-->
        
        <div class="form-group">
          <label for="u_password" class="col-lg-4 control-label">Password</label>
          <div class="col-lg-8">
            <input type="password" class="form-control" id="u_password" name="u_password" value="" placeholder="Password" />
          </div>
        </div><!--end of PASSWORD-->

        <div class="form-group">
          <label for="u_c_password" class="col-lg-4 control-label">Confirm Password</label>
          <div class="col-lg-8">
            <input type="password" class="form-control" id="u_c_password" name="u_c_password" value="" placeholder="Confirm Password" />
          </div>
        </div><!--end of CONFIRM PASSWORD-->
       
       
	    	<div class="form-group">
          <label for="u_gender" class="col-lg-4 control-label">Gender</label> 
          <div class="col-lg-3">
		      	<label for="gender_male" class="control-label">Male</label>
			    	<input type="radio" id="gender_male" value="M" name="gender"/>
          </div>
          <div class="col-lg-3">
			      <label for="gender_female" class="control-label">Female</label>
			    	<input  type="radio" id="gender_female" value="F" name="gender"/>
          </div>
		    </div><!--end of GENDER-->

        <div class="checkbox col-md-offset-4">
			<label for="agree">
				<input type="checkbox" class="checkbox" id="agree" name="agree" />I agree to the Privacy Policy
			</label>
	    	</div><!--end of PRIVACY POLICY-->

      </div><!--end of FORM-HORIZONTAL-->
      
      <div class="login-actions">          
        <button type="submit" name="submit" class="button btn login-btn btn-large">Register</button>  
      </div> <!-- .actions -->

    </form>
    <a href="login.php" alt="Return to Login page">Return to Log-in</a>
    
  </div> <!-- /content -->
  
</div> <!--end of REGISTER-CONTAINER-->

</section><!--end of CONTAINER-->
</div><!--end of WRAP-->
<?php include 'footer.php'; ?>

