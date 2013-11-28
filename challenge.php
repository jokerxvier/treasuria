<?php include 'header.php'; ?>

<?php
if(isset($_SESSION['username']))
{
?>
<!--GAME MEESAGE MODAL BOX-->
<div class="modal fade yes-or-no" id="game-msg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title"></h3>
      </div>
      <div class="modal-body" style=" text-align:center"> 
        <h3 class="model-message"></h3>
        <!--<img src="assets/img/paper-coinx1.png" alt="Coin Multiplier"/>-->
        <div class="multiplier"></div>
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

<div id="wrap">
  <section class="container">
	<h2>Daily Challenge</h2>

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

	<article class="challenge img-responsive">
      <div class="col-md-12 clearfix">
    
          <!--<div class="timer">
            <div class="ticker"></div>
            <p>Pick Now!</p>
            <div class="countdown text-center">1</div>
          </div>-->
   
      	<!--<h2>60 seconds remaining</h2>-->
      </div>	
      	<div class="game row">
      	  <div class="col-md-4">
            <div class="chest daily-chest">
              <input type="hidden" class="dailbox" value="1">
            </div>
          </div>
          
          
      	  <div class="col-md-4">
            <div class="chest daily-chest">
              <input type="hidden" class="dailbox" value="2">

            </div>
          </div>
          <div class="col-md-4">
            <div class="chest daily-chest">
            	 <input type="hidden" class="dailbox" value="3">

            </div>
          </div>
      	</div><!--end of ROW GAME-->
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
