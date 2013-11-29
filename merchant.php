<?php include 'header.php'; ?>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Paypal</h4>
      </div>
      <div class="modal-body" style=" text-align:center">
    	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="wrap">
<section class="container credit-key">
	<h2>Merchant Shop</h2>

<div class="clearfix">

			<?php 
				$data = getAllKey('treasuria_key');
				foreach ($data as $key=>$val){
			
			?>
			<article class="col-xs-6 col-md-2 text-center"> 
				
				<span class="popcount yellow1"><?php echo (isset($_SESSION['cart'][$val[0]])) ? $_SESSION['cart'][$val[0]] : 0  ?></span>
				<img src="assets/img/<?php echo $val[1] ?>" class="img-responsive img-rounded" alt="Key Credits"/>
				
				<h3 class="item-title"><?php echo $val[3] ?></h3>
				<h4><!--<?php //echo $key_credits;?> Credits for <br>--> $ <?php echo $val[4] ?></h4>
                <div class="shopping">
				  <a href="process.php?action=add&keyid=<?php echo $val[0] ?>" name="key_id"><span class="glyphicon glyphicon-plus"></span> Add</a><span class="hidem">|</span>
				  <a href="process.php?action=remove&keyid=<?php echo $val[0] ?>" name="key_id"><span class="glyphicon glyphicon-minus"></span> Remove</a>

			    </div>
			   <!-- <a class="btn btn-sm modal-btn" type="button">QR CODE OPTION <input type="hidden" class="item_id"  value=""> </a>-->
			          
			</article>	
            
            <?php } ?>	
            
            
   
</div> 

<div class="total">
<?php echo "TOTAL: ". getCartTotal(); ?>

<a href="cart.php" name="key_id" class="empty">View Cart <span class="glyphicon glyphicon-shopping-cart"></span></a>
</div>	
</section><!--end of CONTAINER-->
</div><!--end of WRAP-->



<?php include 'footer.php'; ?>
