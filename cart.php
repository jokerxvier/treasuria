<?php include 'header.php'; ?>

<?php
if(isset($_SESSION['username']))
{
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
          <tr>
            <td><img src="assets/img/cart-key.png" class="img-responsive" alt="Cart Key"/</td>
            <td>Diamond Key - 20 credits</td>
            <td>1</td>
            <td>2.00</td>
          </tr>
          <tr>
            <td><img src="assets/img/cart-key.png" class="img-responsive" alt="Cart Key"/></td>
            <td>Purple Gem Key - 50 credits</td>
            <td>2</td>
            <td>4.00</td>
          </tr>
          <tr>
            <td><img src="assets/img/cart-key.png" class="img-responsive" alt="Cart Key"/></td>
            <td>Emerald Gem Key - 150 credits</td>
            <td>2</td>
            <td>8.00</td>
          </tr>
          <tr>
            <td><img src="assets/img/cart-key.png" class="img-responsive" alt="Cart Key"/></td>
            <td>Emerald Gem Key - 150 credits</td>
            <td>2</td>
            <td>8.00</td>
          </tr>
          <tr>
            <td><img src="assets/img/cart-key.png" class="img-responsive" alt="Cart Key"/></td>
            <td>Emerald Gem Key - 150 credits</td>
            <td>2</td>
            <td>8.00</td>
          </tr>
          <tr>
          	<td></td>
          	<td></td>
          	<td></td>
          	<td>Total 14.00</td>
          </tr>
        </tbody>
        </table>
        <div class="checkout">
          <a class="btn" title="Empty Cart">Empty Cart</a>
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
