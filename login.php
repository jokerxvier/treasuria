<?php include 'head.php' ?>
<?php
if(isset($_SESSION['username']))
{
header('Location: index.php');
}
else
{
?>
<div id="wrap">
<section class="container">

  <div class="story img-responsive clearfix">
	<!--GAME STORY-->
		<!--Adobe Edge Runtime-->
		<script type="text/javascript" charset="utf-8" src="Opening_edgePreload.js"></script>
		<style>
			.edgeLoad-EDGE-3625037 { visibility:hidden; }
		</style>
		<!--Adobe Edge Runtime End-->
		<div id="Stage" class="EDGE-3625037">
		</div>
	<!--end of GAME STORY-->
  </div>
  
  <div class="account-container"> 
    <div class="content clearfix">
    
    <form action="process.php" method="post" id="treasuria_login" name="treasuria_login">
    	<input type="hidden" name="action" value="login" />
      <h1 class="branding-login"></h1>   
      
      <div class="form-horizontal clearfix">
		<?php /*?><?php if(isset($_GET["error"]) and $_GET["error"]=="failed_login") { ?> <div class="error"> <?php echo $key_error; ?> </div> <?php } ?>
       if(isset($_GET["error"]) and $_GET["error"]=="not_verified") { ?> <div class="error"> <?php echo $not_verified; ?> </div> <?php } 
        <?php if(isset($_GET["verify"]) and $_GET["verify"]=="success") { ?> <div class="success"> <?php echo $verified; ?> </div> <?php } ?>
        <?php if(isset($_GET["error"]) and $_GET["error"]=="error_activation") { ?> <div class="error"> <?php echo $error_activation; ?> </div> <?php } ?><?php */?>
        
          <?php echo (isset($_GET["error"])) ? '<div class="error">'. getError($_GET["error"]) .'</div>' : ''; ?>
        
		<p>Please provide your details</p>

        <div class="form-group">
          <label for="admin_username" class="col-md-4 control-label">Email Address</label>
          <div class="col-md-8">
            <input type="text" class="form-control" id="email" name="email" value="" placeholder="Email Address" class="login username-field" />
          </div>		  
        </div> <!--end of USERNAME-->
        
        <div class="form-group">
          <label for="admin_password" class="col-md-4 control-label">Password</label>
          <div class="col-md-8">
            <input type="password" class="form-control" id="pass" name="pass" value="" placeholder="Password" class="login password-field"/>
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


</section><!--end of CONTAINER-->
</div><!--end of WRAP-->

<?php include 'footer.php'; ?>
<?php


}
?>