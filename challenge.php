<?php include 'header.php'; ?>

<?php
if(isset($_SESSION['username']))
{
?>
	<section class="container">
		<h2>Daily Challenge</h2>
	  <!--start of iframe-->
		<article class="content">
			<!--Adobe Edge Runtime-->
				<script type="text/javascript" charset="utf-8" src="Treasuria-v3_edgePreload.js"></script>
				<style>
					.edgeLoad-EDGE-22450839 { visibility:hidden; }
				</style>
			<!--Adobe Edge Runtime End-->
		  <div id="Stage" class="EDGE-22450839"></div>
		</article>
	  <!--end of iframe-->
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
