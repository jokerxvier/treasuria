<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Treasuria</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/style.css"/>
	
	<script type="text/javascript" charset="utf-8" src="assets/js/buzz.js"> </script>
</head>
<body>
<?php
if(isset($_SESSION['username']))
{
?>

<header>
	<div id="wrap">
	<div class="container">
		<div class="pull-right">
			<ul class="list-inline user-login">
			<li><?php echo "Hi ".$_SESSION['firstname']."!"; ?></li><span class="hidem">|</span>
			<li><a href="process.php?logout" name="logout" class="logout" id="logout" title="logout"> Log out </a></li>
			
			<!-- <span class="hidem">|</span></li>
			<li><a href="#" title="Registration">Register</a></li> -->
			</ul>
		</div>
	</div>

	<nav class="navbar">
	  <div class="container">
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle mini-menu" data-toggle="collapse" data-target=".navbar-collapse">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		  <a class="navbar-brand" href="#"><img src="assets/img/logo.png" class="img-responsive" alt="Treasuria Logo" /></a>
		</div><!--NAVBAR-HEADER-->
		<div class="collapse navbar-collapse">
		  <ul class="nav navbar-nav">
			<!--<li class="active"><a href="#" title="The Story">The Story</a></li>-->
			<li><a href="play" class="active" title="Play">Play</a></li>
			<li><a href="challenge" title="Daily Challenge">Daily Challenge</a></li>
			<li><a href="gallery" title="Treasure Gallery">Treasure Gallery</a></li>
			<li><a href="merchant.php" title="Merchant Shop">Merchant Shop</a></li>
		  </ul>
		</div><!--/.nav-collapse -->
	  </div>
	</nav>
</header>
	
<?php
}
?>