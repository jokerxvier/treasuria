<?php include 'header.php'; ?>

<?php	
if(!isset($_SESSION['username']))
{
?>

<div class="container">
  <div class="account-container">
  
  <div class="content clearfix">
    
    <form action="process.php?login" method="post" id="treasuria_login" name="treasuria_login">
    
      <h1 class="branding-login"></h1>   
      
      <div class="login-fields">
          <p>Please provide your details</p>
        <div class="field">
          <label for="admin_username">Email Address</label>
          <input type="text" id="admin_username" name="username" value="" placeholder="Email Address" class="login username-field" />
		  
        </div> <!-- /field -->
        
        <div class="field">
          <label for="admin_password">Password:</label>
          <input type="password" id="admin_password" name="password" value="" placeholder="Password" class="login password-field"/>
        </div> <!-- /password -->
        
      </div> <!-- /login-fields -->
      
      <div class="login-actions">
        
        <span class="login-checkbox">
          <input id="Field" name="Field" type="checkbox" class="field login-checkbox" value="First Choice" tabindex="4" />
          <label class="choice" for="Field">Keep me signed in</label>
        </span>
                  
        <button type="submit" name="submit" class="button btn login-btn btn-large">Sign In</button>
        
      </div> <!-- .actions -->
    </form>
  </div> <!-- /content -->
</div> <!-- /account-container -->

<div class="login-extra">
  <a href="#">Reset Password</a>
</div> <!-- /login-extra -->
</div>


<?php include 'footer.php'; ?>
<?php
}
else
{
header('Location: index.php');
}
?>

