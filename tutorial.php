<?php include 'header.php'; ?>

<?php
if(isset($_SESSION['username']))
{

?>

<div id="wrap">
	<section class="container">

    <div class="legend">
      <h3>Legend :</h3>
      <ul class="list-inline key-tally">
        <li> <span class="golden" alt="Golden Gem Key"></span> = 20 Gold Coins</li>
        <li> <span class="amethyst" alt="Amethyst Gem Key"></span> = 100 Gold Coins</li>
        <li> <span class="emerald" alt="Emerald Gem Key"> </span> = 200 Gold Coins</li>
        <li> <span class="citrine" alt="Citrine Gem Key"> </span> = 400 Gold Coins</li>
        <li> <span class="sapphire" alt="Sapphire Gem Key"> </span> = 1000 Gold Coins</li> 
      </ul>
    </div>

    <article class="game-time img-responsive">
      <div class="col-md-12">
        <div class="timer" id="step5">
          <div class="ticker"></div>
          <p>Pick Now!</p>
          <div class="countdown text-center">30</div>
        </div><!--end of TIMER-->
      </div>

      <div id="step1" class="tutorial">
        <div class="row game">
          <div class="col-md-6">
            <div class="chest" id="step3"></div>
            <ul class="list-inline game-keys">
              <li class="gold-key"></li>
              <li class="amethyst-key"></li>
              <li class="emerald-key"></li>
              <li class="citrine-key"></li>
              <li class="sapphire-key"></li>
            </ul>
          </div>
          <div class="col-md-6">
            <div class="chest"></div>
            <ul class="list-inline game-keys" id="step2">
              <li class="gold-key"></li>
              <li class="amethyst-key"></li>
              <li class="emerald-key"></li>
              <li class="citrine-key"></li>
              <li class="sapphire-key"></li>
            </ul>
          </div>
        </div>
      </div><!--end of STEP1-->
    </article>
    <!--GAME TRIGGER BUTTONS-->
    <!--<button type="button" data-toggle="modal" data-target="#myWin">WIN POP UP BOX</button>
    <button type="button" data-toggle="modal" data-target="#myLose">LOSE POP UP BOX</button>-->
    <!--end of GAME TRIGGER BUTTONS-->

     <article>
            <ol id="joyRideTipContent">
              <li data-class="tutorial" data-text="Next" class="custom"  data-options="tipLocation:left">
                <h2>Welcome!</h2>
                  <p>Treasuria is an online betting game where you can win and discover treasures.</p>
                  <!--<img class="pull-right" src="assets/img/male-avatar.png" />-->
              </li>
              <li data-id="step2" data-button="Next" data-options="tipLocation:top;tipAnimation:fade">
                <h2>Buy a Magical Key</h2>
                  <p>Buy keys at the Merchant Shop to be able to open a chest.</p>
              </li>
              <li data-id="step3" data-button="Next" data-options="tipLocation:bottom">
                <h2>Open a Chest</h2>
                  <p>Select one of the five keys under the chest you choose.</p>
              </li>
              <li data-button="Game On">
                <h2>Happy Hunting!</h2>
                  <p>Great treasures await.</p>
              </li>
              <li data-id="step5" data-button="Next">
                <h2>Watch the Time!</h2>
                <p>You only have 60 seconds to place your bet.</p>
              </li>
              <li data-button="Game On">
                <h2>Happy Hunting!</h2>
                  <p>Great treasures await.</p>
              </li>
            </ol>
		</article>
	</section><!--end of CONTAINER-->
</div><!--end of WRAP-->

<?php
}
else
{
header('Location: login.php');
}
?>

<?php include 'footer.php'; ?>
