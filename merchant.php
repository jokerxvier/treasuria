<?php include 'header.php'; ?>

<?php
include("db_connect.php");

$datetime = date('Y-m-d H:i:s');
$databaseconnect = NEW databaseconnect();
$databaseconnect->dbconnect();
?>
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
<section class="container credit-key">
	<h2>Merchant Shop</h2>


<?php
if(isset($_SESSION['username']))
{
	$result_key = mysql_query("SELECT * FROM treasuria_key");
	$num_rows_key = mysql_num_rows($result_key);
	if($num_rows_key>0)
	{
		while ($row_key = mysql_fetch_array($result_key))
		{
			$key_uniq = $row_key['key_uniq'];
			$key_id = $row_key['key_id'];
			$key_img = $row_key['key_img'];
			$key_credits = $row_key['key_credits'];
			$key_name = $row_key['key_name'];
			$key_price = $row_key['key_price'];
			
			?>
			
			<article class="col-xs-6 col-md-2 text-center">

                  <?php 
           			 	$qr = new BarcodeQR(); 
						$images = $qr->paypal($key_name, $key_price, '1', $key_uniq);
					?>
                 <input type="hidden" value="<?php echo $images ?>" class="txt-qrcde" />
				<img src="assets/img/<?php echo $key_img;?>" class="img-responsive img-rounded" alt="Key Credits"/>
				<h3 class="item-title"><?php echo $key_name;?></h3>
				<h4><?php echo $key_credits;?> Credits for <br>$ <?php echo $key_price;?></h4>
				<a href="process.php?action=add&keyid=<?php echo $key_uniq;?>" name="key_id" class="btn" type="button">Add Item</a>
				<a href="process.php?action=remove&keyid=<?php echo $key_uniq;?>" name="key_id" class="btn" type="button"><span class="glyphicon glyphicon-minus"></span></a>
			    <?php  if(isset( $_SESSION['cart'][$key_uniq])) { ?><a href="?a=remove&keyid=<?php echo $key_uniq;?>" name="key_id"><?php echo  $_SESSION['cart'][$key_uniq]; } ?></a>
			   
			    <a class="btn modal-btn" type="button">QR CODE OPTION <input type="hidden" class="item_id"  value="<?php echo $key_uniq;?>"> </a>


			   
         
			</article>
		
			<?php
		}
		?>
     
		<a href="process.php?action=empty" name="key_id" class="btn" type="button"><span class="glyphicon glyphicon-trash"></span></a>

		<?php
		if(isset($_SESSION['cart']) and is_array($_SESSION['cart']))
		{
			$totalquantity = 0;
			foreach($_SESSION['cart'] AS $keyid => $itemQuantity)
			{
				$totalquantity = $totalquantity + $itemQuantity;
			}
		}
		else
		{
			$totalquantity = 0;
		}
		echo "TOTAL: ".$totalquantity;
	}
	else
	{
		//echo "empty";
	}

?>
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
