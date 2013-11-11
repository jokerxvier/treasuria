<?php
$no_visible_elements=true;
include('admin_process.php');
if(!isset($_SESSION["a_username"]))
{

include('header.php');

$key_error = "ERROR: Either Your Account is inactive, not registered or Email Address and Password is Incorrect";
$verified = "SUCCESS: Email Address successfully verified, you gain free credits. You may now login.";
$not_verified = "ERROR: Email Address not verified.";
$error_activation = "ERROR: Oops! Your account could not be activated. Please recheck the link or contact the system administrator.";
?>
	
			<div class="row-fluid">
				<div class="span12 center login-header">
					<h2><img src="img/logo-login.png"></h2>
					<h3>Administrator</h3>
				</div><!--/span-->
			</div><!--/row-->
			
			<div class="row-fluid">
				<div class="well span5 center login-box">
					<?php if(!isset($_GET["error"]) and (!isset($_GET["error"]))) { ?> <div class="alert alert-info"> Please login with your Username and Password. </div> <?php } ?>
					<?php if(isset($_GET["error"]) and $_GET["error"]=="failed_login") { ?> <div class="alert alert-error"> <?php echo $key_error; ?> </div> <?php } ?>
					<?php if(isset($_GET["error"]) and $_GET["error"]=="not_verified") { ?> <div class="alert alert-error"> <?php echo $not_verified; ?> </div> <?php } ?>
					<?php if(isset($_GET["verify"]) and $_GET["verify"]=="success") { ?> <div class="alert alert-success"> <?php echo $verified; ?> </div> <?php } ?>
					<?php if(isset($_GET["error"]) and $_GET["error"]=="error_activation") { ?> <div class="alert alert-error"> <?php echo $error_activation; ?> </div> <?php } ?>
					
					<form class="form-horizontal" action="admin_process.php?adminlogin" method="post">
						<fieldset>
							<div class="input-prepend" title="Username" data-rel="tooltip">
								<span class="add-on"><i class="icon-user"></i></span><input autofocus class="input-large span10" name="username" id="username" type="text" placeholder="Email Address" value="" />
							</div>
							<div class="clearfix"></div>

							<div class="input-prepend" title="Password" data-rel="tooltip">
								<span class="add-on"><i class="icon-lock"></i></span><input class="input-large span10" name="password" id="password" type="password" placeholder="Password" value="admin123456" />
							</div>
							<div class="clearfix"></div>

							<div class="input-prepend">
							<label class="remember" for="remember"><input type="checkbox" id="remember" />Remember me</label>
							</div>
							<div class="clearfix"></div>

							<p class="center span5">
							<button type="submit" name="submit" class="btn btn-primary">Login</button>
							</p>
						</fieldset>
					</form>
				</div><!--/span-->
			</div><!--/row-->
<?php
include('footer.php');
}
else
{
header('Location: index.php');
}
?>
