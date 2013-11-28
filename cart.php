<?php 
include 'header.php'; 

?>



<div id="wrap">
	<section class="container cart">
	  <h2>Merchant Shop</h2>
    <div class="pull-right checkout" >
      <a href="merchant.php" class="btn" title="Back to previous page">Back</a>
    </div>
    	
		<?php if(isset($_GET["success"]) and $_GET["success"]=="1") { ?> <div class="alert alert-success" > SUCCESS: You Have Successfully Purchased an Item! </div> <?php } ?>
        <table class="table table-borderless">
          <thead>
          <tr>
            <th>Item</th>
            <th>Description</th>
            <th>Quantity</th>
            <th>Price $</th>
          </tr>
      </thead>
          <tbody>
          <?php 
		  $total = 0;
		  if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) :
				  foreach ($_SESSION['cart'] as $item_id => $qty){
						$data = getAllKey('treasuria_key', $item_id);
						
						foreach($data as $key=>$item){
							$price = $item[4] * $qty;
							$total += $price; 
		
				  ?>
				  <tr>
					<td><img src="assets/img/<?php echo $item[1] ?>" class="img-responsive" alt="Cart Key" width="80" /></td>
					<td valign="middle" height="92" style="vertical-align: middle;"><?php echo $item[3] .' - '. $item[2]   ?></td>
					<td style="vertical-align: middle;"><?php echo $qty ?></td>
					<td style="vertical-align: middle;"><?php echo ' $'.number_format($price, 2) ?></td>
				  </tr>
				  <?php 
						}
						
				  } ?>
				  
			<?php
			else :
			?>
			  <tr>
              	<td colspan="4"> Your  Cart is Empty</td>
              </tr>
			
			<?php endif; ?>
          
           <tr>
          	<td></td>
          	<td></td>
          	<td></td>
          	<td>Total : <?php echo '$'. number_format($total, 2) ?></td>
          </tr>
         
        </tbody>
        </table>
        <?php 
			if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) :
		?>
        <div class="checkout">
          <a href="process.php?action=empty" class="btn" title="Empty Cart">Empty Cart</a>
          <div class="pull-right">
           <!-- <a class="btn pull" title="Checkout with Credit Card">Continue Checkout</a>-->
            <a href="process.php?action=checkout" class="btn" title="Checkout with Paypal">Checkout with Paypal</a>
          </div>
        </div>
        <?php endif; ?>
	</section><!--end of CONTAINER-->
</div><!--end of WRAP-->



<?php include 'footer.php'; ?>
