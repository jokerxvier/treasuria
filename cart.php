<?php 
include 'header.php'; 
include "function.php";  
?>

<?php
if(isset($_SESSION['username']))
{
	$username = $_SESSION['username'];
	$pass = $_SESSION['password'];


	
	$userid = getUserId($username, $pass);
?>

	<section class="container cart">
	  <h2>Merchant Shop</h2>
    <div class="pull-right checkout">
      <a class="btn" title="Back to previous page">Back</a>
    </div>
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
						$data = displayCartList($item_id);
			
						
						foreach($data as $key=>$item){
							$price = $item['price'] * $qty;
							$total += $price; 
		
				  ?>
				  <tr>
					<td><img src="assets/img/<?php echo $item['key_img'] ?>" class="img-responsive" alt="Cart Key" width="80" /></td>
					<td valign="middle" height="92" style="vertical-align: middle;"><?php echo $item['key_name'] .' - '. $item['key_credits']   ?></td>
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
        <div class="checkout">
          <a href="process.php?action=empty" class="btn" title="Empty Cart">Empty Cart</a>
          <div class="pull-right">
            <a class="btn pull" title="Checkout with Credit Card">Continue Checkout</a>
            <a class="btn" title="Checkout with Paypal">Checkout with Paypal</a>
          </div>
        </div>
	</section><!--end of CONTAINER-->

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
