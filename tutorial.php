<?php include 'header.php'; ?>

<?php
if(isset($_SESSION['username']))
{

?>

	<section class="container" id="tutorial">
		<article class="content">

  <section class="container">

    <div class="col-md-12">
        <h2 id="numero1" class="so-awesome">Tutorial</h2>
          <p>Welcome to Treasuria! The adventure to hunt the greatest treasure is on!</p>
      </div>
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
   
            <ul class="list-inline game-keys" id="numero2">
              <li><span class="gold-key"></span></li>
              <li><span class="amethyst-key"></span></li>
              <li><span class="emerald-key"></span></li>
              <li><span class="citrine-key"></span></li>
              <li><span class="sapphire-key"></span></li>
            </ul>

          </li>
          <li class="col-md-offset-1 col-sm-offset-1">
            <div class="chest" id="numero3"></div>
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

     <!-- <div class="col-md-12">
        <h2 id="numero1" class="so-awesome">Tutorial</h2>
          <p>Welcome to Treasuria! The adventure to hunt the greatest treasure is on!</p>
      </div>

      <div class="col-md-12">
        <h3 id="numero3">Get the Most Out of Your App!</h3>
          <p>Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
      </div>

      <div class="col-md-4 col-md-offset-4">
        <h3 id="numero2">Customize Each Stop Along the Way</h3>
          <p>Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Curabitur blandit tempus porttitor. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Aenean lacinia bibendum nulla sed consectetur. Cras mattis consectetur purus sit amet fermentum. Cras mattis consectetur purus sit amet fermentum.</p>
      </div>-->

            <ol id="joyRideTipContent">
              <li data-class="so-awesome" data-text="Next" class="custom">
                <h2>Getting Started!</h2>
                <p>The player must open one of two chests using a key to win gold coins that can be used to redeem rewards.</p>
              </li>
              <li data-id="numero2" data-button="Next" data-options="tipLocation:top;tipAnimation:fade">
                <h2>Buy Key</h2>
                <p>The players must spend real money buy up to five different keys from the Merchant Shop.</p>
              </li>
              <li data-id="numero3" data-button="Next" data-options="tipLocation:bottom">
                <h2>Open Chest</h2>
                <p>The player can only open one of the two chests. He can do this by clicking any of the five keys underneath it. After the timer has expired, the chest will be opened and its contents revealed.</p>
              </li>
              <li data-button="Next">
                <h2>Stop #4</h2>
                <p>It works as a modal too!</p>
              </li>
              <li data-class="someclass" data-button="Next" data-options="tipLocation:right">
                <h2>Stop #4.5</h2>
                <p>It works with classes, and only on the first visible element with that class.</p>
              </li>
              <li data-id="numero5" data-button="Close">
                <h2>Stop #5</h2>
                <p>Now what are you waiting for? Add this to your projects and get the most out of your apps!</p>
              </li>
            </ol>
		</article>
	</section><!--end of CONTAINER-->

	<footer class="navbar-fixed-bottom">
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
