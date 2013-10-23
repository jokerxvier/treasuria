<?php include 'header.php'; ?>

<?php
include("db_connect.php");

$datetime = date('Y-m-d H:i:s');
$databaseconnect = NEW databaseconnect();
$databaseconnect->dbconnect();
?>

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
			$key_id = $row_key['key_id'];
			$key_img = $row_key['key_img'];
			$key_credits = $row_key['key_credits'];
			$key_name = $row_key['key_name'];
			$key_price = $row_key['key_price'];
			
			?>
			<article class="col-xs-6 col-md-2 text-center">
				<img src="assets/img/<?php echo $key_img;?>" class="img-responsive img-rounded" alt="Key Credits"/>
				<h3><?php echo $key_name;?></h3>
				<h4><?php echo $key_credits;?> Credits for <br>$ <?php echo $key_price;?></h4>
				<a href="?a=add&keyid=<?php echo $key_id;?>" name="key_id" class="btn" type="button">Add Item to Cart</a>
				<a href="?a=remove&keyid=<?php echo $key_id;?>" name="key_id" class="btn" type="button"><?php if(isset($_SESSION['key_id'][$key_id])) { echo $_SESSION['key_id'][$key_id]; } ?></a>
			</article>
			
			<?php
		}
	}
	else
	{
		//echo "empty";
	}
	
	if(isset($_GET['a']))
	{
		echo $setkeyid = $_GET['keyid'];
		$setkey_action = $_GET['a'];
		
		/* switch($setkey_action)
		{ 
			case "add": */
				$_SESSION['key_id'][$setkeyid]++;
			/* break;

			case "remove":
				if($_SESSION['key_id'][$setkeyid] == 0)
				{
				unset($_SESSION['key_id'][$setkeyid]);
				}
				else
				{
				echo $_SESSION['key_id'][$setkeyid]--;
				}
			break;
		} */

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
