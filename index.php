<?php include 'header.php'; ?>

<?php
if(isset($_SESSION['username']))
{

?>
<div id="wrap">
  <section class="container">
  	<article class="game-time img-responsive">
      <div class="col-md-12 clearfix">
        <div>
          <div class="timer">
            <div class="ticker"></div>
            <p>Pick Now!</p>
            <p class="countdown">45</p>
          </div>
        </div>
      	<!--<h2>60 seconds remaining</h2>-->
      </div>	
      	<ul class="list-inline game">
      	  <li class="col-md-offset-2 col-sm-offset-1">
            <div class="chest"></div>
            <ul class="list-inline game-keys">
              <li><span class="gold-key"></span></li>
              <li><span class="amethyst-key"></span></li>
              <li><span class="emerald-key"></span></li>
              <li><span class="citrine-key"></span></li>
              <li><span class="sapphire-key"></span></li>
            </ul>
          </li>
      	  <li class="col-md-offset-1 col-sm-offset-1">
            <div class="chest"></div>
            <ul class="list-inline game-keys">
              <li><span class="gold-key"></span></li>
              <li><span class="amethyst-key"></span></li>
              <li><span class="emerald-key"></span></li>
              <li><span class="citrine-key"></span></li>
              <li><span class="sapphire-key"></span></li>
            </ul>
          </li>
      	</ul>
  	</article>
  </section>
</div><!--end of WRAP-->
  <footer>
    <div class="container">
    <p class="text-center">&copy; 2013 Treasuria</p>
    </div>
  </footer>
 
<?php
}
else
{
header('Location: login.php');
}
?>

<?php include 'footer.php'; ?>
