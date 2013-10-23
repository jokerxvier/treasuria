<?php include 'header.php'; ?>

<?php	
if(!isset($_SESSION['username']))
{
$key_error = "ERROR: Either Your Account is inactive, not registered or Email Address and Password is Incorrect";
$verified = "SUCCESS: Email Address successfully verified, you gain free credits. You may now login.";
$not_verified = "ERROR: Email Address not verified.";
$error_activation = "ERROR: Oops! Your account could not be activated. Please recheck the link or contact the system administrator.";
?>

<section class="container">
  <div class="account-container">
  
  <div class="content clearfix">
    
    <form action="process.php?login" method="post" id="treasuria_login" name="treasuria_login">
    
      <h1 class="branding-login"></h1>   
      
      <div class="form-horizontal clearfix">
		<?php if(isset($_GET["error"]) and $_GET["error"]=="failed_login") { ?> <div class="error"> <?php echo $key_error; ?> </div> <?php } ?>
        <?php if(isset($_GET["error"]) and $_GET["error"]=="not_verified") { ?> <div class="error"> <?php echo $not_verified; ?> </div> <?php } ?>
        <?php if(isset($_GET["verify"]) and $_GET["verify"]=="success") { ?> <div class="success"> <?php echo $verified; ?> </div> <?php } ?>
        <?php if(isset($_GET["error"]) and $_GET["error"]=="error_activation") { ?> <div class="error"> <?php echo $error_activation; ?> </div> <?php } ?>
        
		
        <p>Please provide your details</p>

        <div class="form-group">
          <label for="admin_username" class="col-lg-4 control-label">Email Address</label>
          <div class="col-lg-8">
            <input type="text" class="form-control" id="admin_username" name="username" value="" placeholder="Email Address" class="login username-field" />
          </div>		  
        </div> <!--end of USERNAME-->
        
        <div class="form-group">
          <label for="admin_password" class="col-lg-4 control-label">Password</label>
          <div class="col-lg-8">
            <input type="password" class="form-control" id="admin_password" name="password" value="" placeholder="Password" class="login password-field"/>
          </div>
        </div> <!--end of PASSWORD-->
        
      </div> <!--end of FORM-HORIZONTAL-->
      
      <div class="login-actions">
        <span class="login-checkbox">
          <input id="Field" name="Field" type="checkbox" class="field login-checkbox" value="First Choice" tabindex="4" />
          <label class="choice" for="Field">Keep me signed in</label>
        </span>       
        <button type="submit" name="submit" class="button btn login-btn btn-large">Sign In</button>
      </div> <!--end of ACTIONS-->
    </form>

    <a href="register.php" title="Go to Registration Page"><span class="gold">*</span> You need to register first before logging in</a>

  </div> <!--end of CONTENT -->
</div> <!--end of ACCOUNT-CONTAINER-->

</section>


<?php include 'footer.php'; ?>
<?php
}
else
{
header('Location: index.php');
}
?>

