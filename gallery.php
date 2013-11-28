<?php include 'header.php'; ?>

<div id="wrap">
<section class="container credit-key gallery">
	<h2>Treasure Gallery</h2>

<?php if(isset($_GET["message"]) and $_GET["message"]=="1") { ?> <div class="alert alert-success"> SUCCESS! </div> <?php } ?>
<?php if(isset($_GET["message"]) and $_GET["message"]=="0") { ?> <div class="alert alert-error"> FAILED! </div> <?php } ?>
		<?php 
			$stmt = $mysqli->prepare("SELECT prize_id, prize_name, prize_img, prize_credits  FROM treasuria_gallery WHERE deleted = 0 ORDER BY prize_name DESC");
			$stmt->execute();
			$stmt->bind_result($prize_id, $prize_name, $prize_img, $prize_credits);
			$stmt->store_result();
			if($stmt->num_rows > 0)
			{
				
				while($stmt->fetch()) {
		?>
			<article class="col-xs-6 col-md-2 text-center">
				<img src="assets/img/gallery/<?php echo $prize_img;?>" class="img-responsive img-rounded" alt="Key Credits"/>
				<h3><?php echo $prize_name ?></h3>
				  <h4><?php echo number_format($prize_credits) ?> Gold Coins</h4>
                  <?php 
				  $points = getPoints($userid);

				  $link = ($points >= $prize_credits) ? 'href="process.php?action=claim&prize='.$prize_id.'"' : '';

				  ?>
				<a <?php echo $link; ?> class="btn" type="button"  <?php if($link=='') { echo 'disabled';} ?>>Claim this Item</a>     
			</article>
			
		<?php } } ?>
</section><!--end of CONTAINER-->
</div><!--end of WRAP-->


<?php include 'footer.php'; ?>
