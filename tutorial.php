<?php include 'header.php'; ?>

<?php
if(isset($_SESSION['username']))
{

?>

	<section class="container">
	  <!--start of iframe-->
		<article class="content">
			<!--Adobe Edge Runtime-->
				<script type="text/javascript" charset="utf-8" src="tutorial_edgePreload.js"></script>
				<style>
					.edgeLoad-EDGE-26812176 { visibility:hidden; }
				</style>
			<!--Adobe Edge Runtime End-->
		  <div id="Stage" class="EDGE-26812176"></div>
		</article>
	  <!--end of iframe-->
	</section><!--end of CONTAINER-->

	<footer class="navbar-fixed-bottom">
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
