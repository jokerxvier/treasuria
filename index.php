<?php include 'header.php'; ?>

<?php
if(isset($_SESSION['username']))
{
?>

<div id="wrap">

<!--GAME MESSAGE MODAL BOX-->
<div class="modal fade yes-or-no" id="game-msg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body" style=" text-align:center"> 
        <h3  id="modal-title"></h3>
        <img src="assets/img/merchant-suprise.png" alt="Merchant Surprised"/>
        <!--<ul class="list-inline">
          <li><button type="button" class="btn btn-lg" data-dismiss="modal">YES</button></li>
          <li>or</li>
          <li><button type="button" class="btn btn-lg" data-dismiss="modal">NO</button></li>
        </ul>-->
      </div>
      <!--<div class="modal-footer"></div>-->
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--end of GAME MESSAGE MODAL BOX-->

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
      <div class="col-md-12 clearfix">
        <div class="bg-sound pull-right"></div>
      </div>
      <div class="col-md-12">
          <div class="timer">
            <div class="ticker"></div>
            <p>Pick Now!</p>
            <div class="countdown text-center"><span class="loading">Loading...</span></div>
          </div><!--end of TIMER-->
      </div>

      <div class="row game">
          <div class="col-md-6">
            <div class="chest chest1">              
              <!--<li class="half"></li>
              <li class="x1"></li>
              <li class="x2"></li>
              <li class="x3"></li>
              <li class="x5"></li>
              <li class="empty"></li>-->
            </div>
            <ul class="list-inline game-keys">
              <li   class="gold-key key"><input type="hidden" name="box1" class="inputKey" value="1-1"  /></li>
              <li   class="amethyst-key key"><input type="hidden" name="box1" class="inputKey" value="2-1"  /></li>
              <li   class="emerald-key key"><input type="hidden" name="box1" class="inputKey" value="3-1"  /></li>
              <li   class="citrine-key key"><input type="hidden" name="box1" class="inputKey" value="4-1"  /></li>
              <li   class="sapphire-key key"><input type="hidden" name="box1" class="inputKey" value="5-1" /></li>
            </ul>
          </div>
          <div class="col-md-6">
            <div class="chest chest2">
              <!--<li class="half"></li>
              <li class="x1"></li>
              <li class="x2"></li>
              <li class="x3"></li>
              <li class="x5"></li>
              <li class="empty"></li>-->
            </div>
            <ul class="list-inline game-keys">
              <li  data-target="#game-msg" class="gold-key key"><input type="hidden" name="box2" class="inputKey" value="1-2"  /></li>
              <li  data-target="#game-msg" class="amethyst-key key"><input type="hidden" name="box2" class="inputKey" value="2-2"  /></li>
              <li  data-target="#game-msg" class="emerald-key key"><input type="hidden" name="box2" class="inputKey" value="3-2"  /></li>
              <li  data-target="#game-msg" class="citrine-key key"><input type="hidden" name="box2" class="inputKey" value="4-2"  /></li>
              <li  data-target="#game-msg" class="sapphire-key key"><input type="hidden" name="box2" class="inputKey" value="5-2" /></li>
            </ul>
          </div>
      </div><!--end of ROW GAME-->
    </article>
  </section>
</div><!--end of WRAP-->

<script>
var bgSound = new buzz.sound( "assets/sounds/treasuria_ingame", {
    formats: [ "ogg", "mp3", "aac" ],
    preload: true,
    autoplay: true,
    loop: true
  });
</script>

<?php
}
else
{
header('Location: login.php');
}
?>

<?php include 'footer.php'; ?>
