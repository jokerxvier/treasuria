<?php 
include 'head.php';
include "qrcode/BarcodeQR.php"; 
$url = basename($_SERVER['PHP_SELF'], ".php");

if($url!='login') {
	if (!isLoggedIn()){
		header('Location: login.php');

	}
	
}


$userid = $_SESSION['user_id'];
?>
<header>
	<div id="wrap">
	<div class="container">
		<div class="clearfix">
			<ul class="list-inline user-login pull-right">
			  <li><?php echo "Hi ".$_SESSION['firstname']."!"; ?></li><span class="hidem">|</span>
			  <li><a href="process.php?action=logout" name="logout" class="logout" id="logout" title="logout"> Log out </a></li>
			</ul>
		</div>
		<div>
		  <ul class="list-inline user-login pull-right key-tally">
			<li> <span class="golden" alt="Golden Gem Key"></span><em class="key-1"><?php echo  getKeyValue(1, $userid) ?></em></li>
			<li> <span class="amethyst" alt="Amethyst Gem Key"><em class="key-2"><?php echo getKeyValue(2, $userid) ?></em></li>
			<li> <span class="emerald" alt="Emerald Gem Key"><em class="key-3"><?php echo getKeyValue(3, $userid) ?></em></li>
			<li> <span class="citrine" alt="Citrine Gem Key"><em class="key-4"><?php echo getKeyValue(4, $userid) ?></em></li>
			<li> <span class="sapphire" alt="Sapphire Gem Key"><em class="key-5"><?php echo getKeyValue(5, $userid) ?></em></li>
			<li>|</li>
		    <li> <span class="coin" alt="Gold Coins"><?php  echo getCreditsValue($userid) ?></span></li>
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
		<div class="collapse navbar-collapse col-xs-12 col-md-4 clearfix">
		  <ul class="nav navbar-nav">
			<li><a href="index.php" <?php if($url=='index') { echo 'class="active"';} ?> title="Play">Play</a></li>
			<li><a href="challenge.php" <?php if($url=='challenge') { echo 'class="active"';} ?> title="Daily Challenge">Daily Challenge</a></li>
			<li><a href="gallery.php" <?php if($url=='gallery') { echo 'class="active"';} ?> title="Treasure Gallery">Treasure Gallery</a></li>
			<li><a href="merchant.php" <?php if($url=='merchant') { echo 'class="active"';} ?> title="Merchant Shop">Merchant Shop</a></li>
			<li><a href="tutorial.php" <?php if($url=='tutorial') { echo 'class="active"';} ?> title="Tuttorial">Tutorial</a></li>
		  </ul>
		</div><!--/.nav-collapse -->

	  </div>
	</nav>

</header>
	
