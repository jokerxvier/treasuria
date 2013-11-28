<?php session_start(); ?>
<?php
$ses_username = $_SESSION["a_username"];

if(isset($ses_username))
{
include('header.php');
//include('admin_function.php');

$update_success = "Item Data Successfully Updated!";
$delete_success = "Item Successfully Deleted!";
$enabled_success = "Item Successfully Enabled!";
?>
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="index.php">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="tbl_keys.php">Key Data</a>
					</li>
				</ul>
			</div>
			
			<?php if(isset($_GET["c"]) and $_GET["c"]=="success") { ?> <div class="alert alert-success"> <?php echo $update_success; ?> </div> <?php } ?>
			<?php if(isset($_GET["d"]) and $_GET["d"]=="deleted") { ?> <div class="alert alert-success"> <?php echo $delete_success; ?> </div> <?php } ?>
			<?php if(isset($_GET["r"]) and $_GET["r"]=="enabled") { ?> <div class="alert alert-success"> <?php echo $enabled_success; ?> </div> <?php } ?>
			
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-list"></i> Keys</h2>
						<div class="box-icon">
							<!--<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>-->
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th></th>
								  <th>Image</th>
								  <th>Name</th>
								  <th>Credits</th>
								  <th>Price ($)</th>
								  <!--<th>Created</th>-->
								  <th>Updated</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
							<?php
							$key_query = $mysqli->prepare("SELECT key_uniq, key_id, key_img, key_credits, key_name, key_price, created_at, updated_at, deleted FROM treasuria_key WHERE deleted='0'");
							$key_query->execute();
							$key_query->bind_result($key_uniq, $key_id, $key_img, $key_credits, $key_name, $key_price, $created_at, $updated_at, $deleted);
							$key_query->store_result();
							
							$ctr = 0;
							if($key_query->num_rows > 0){
								while($key_query->fetch()){
								$ctr +=1;
										
										$created_at = date('M d, Y', strtotime($created_at) );
										$updated_at = date('M d, Y', strtotime($updated_at) );										
									?>
										
										<tr>
											<td><?php echo $ctr; ?></td>
											<td><img src="../assets/img/<?php echo $key_img; ?>" width="50px"></td>
											<td class="center"><?php echo $key_name; ?></td>
											<td class="center"><?php echo $key_credits; ?></td>
											<td class="center"><?php echo number_format($key_price, 2, '.', ''); ?></td>
											<!--<td class="center"><?php //echo $created_at; ?></td>-->
											<td class="center"><?php echo $updated_at; ?></td>
											<td class="center">
												<!--<a class="btn btn-success" href="#">
													<i class="icon-zoom-in icon-white"></i>  
													View                                            
												</a>-->
												<a class="btn btn-info" href="edit_keys.php?action=edit&key_uniq=<?php echo $key_uniq."&".MD5($created_at);?>">
													<i class="icon-edit icon-white"></i>     
												</a>
												<a class="btn btn-danger" href="edit_keys.php?action=delete&key_uniq=<?php echo $key_uniq."&".MD5($created_at);?>">
													<i class="icon-trash icon-white"></i> 
												</a>
											</td>
										</tr>
										
										<?php
									}
								}
							?>
							
							
							
							
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

<?php 

include('footer.php');

}
else
{
header('Location: login.php');
}
?>
