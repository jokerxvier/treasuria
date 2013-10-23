<?php include 'header.php'; ?>

<?php
include("db_connect.php");

$datetime = date('Y-m-d H:i:s');
$databaseconnect = NEW databaseconnect();
$databaseconnect->dbconnect();
?>

<section class="container credit-key">
	<h2>Treasure Gallery</h2>


<?php
if(isset($_SESSION['username']))
{
	$result_key = mysql_query("SELECT * FROM treasuria_gallery");
	$num_rows_key = mysql_num_rows($result_key);
	if($num_rows_key>0)
	{
		while ($row_key = mysql_fetch_array($result_key))
		{
			$prize_id = $row_key['prize_id'];
			$prize_name = $row_key['prize_name'];
			$prize_img = $row_key['prize_img'];
			$prize_credits = $row_key['prize_credits'];
			
			?>
			<article class="col-xs-6 col-md-2 text-center">
				<img src="assets/img/gallery/<?php echo $prize_img;?>" class="img-responsive img-rounded" alt="Key Credits"/>
				<h3><?php echo $prize_name;?></h3>
				<h4>Credits for <br><?php echo $prize_credits;?> Tickets</h4>
				<a href="" class="btn" type="button">Claim this Item</a>
			</article>
			
			<?php
		}
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
