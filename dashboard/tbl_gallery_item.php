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
						<a href="tbl_gallery_item.php">Item's Data</a>
					</li>
				</ul>
			</div>
			<?php if(isset($_GET["c"]) and $_GET["c"]=="success") { ?> <div class="alert alert-success"> <?php echo $update_success; ?> </div> <?php } ?>
			<?php if(isset($_GET["d"]) and $_GET["d"]=="deleted") { ?> <div class="alert alert-success"> <?php echo $delete_success; ?> </div> <?php } ?>
			<?php if(isset($_GET["r"]) and $_GET["r"]=="enabled") { ?> <div class="alert alert-success"> <?php echo $enabled_success; ?> </div> <?php } ?>
			
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-list"></i> Treasuria Gallery</h2>
						<div class="box-icon">
							<!--<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>-->
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div> &nbsp;&nbsp;
						<a class="btn btn-success" href="edit_items.php?action=add&<?php echo MD5($datetime);?>"><i class="icon icon-white icon-plus"></i> ADD</a>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th></th>
								  <th>Image</th>
								  <th>Prize Name</th>
								  <th>Credits</th>
								  <th>Created</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
							<?php
							
							$item_query = $mysqli->prepare("SELECT prize_id, prize_name, prize_img, prize_credits, created_at, updated_at, deleted FROM treasuria_gallery");
							$item_query->execute();
							$item_query->bind_result($prize_id, $prize_name, $prize_img, $prize_credits, $created_at, $updated_at, $deleted);
							$item_query->store_result();
							
							$ctr = 0;
							if($item_query->num_rows > 0){
								while($item_query->fetch()){
								$ctr +=1;
										
										$prize_created_at = date('M d, Y', strtotime($created_at) );
										$prize_updated_at = date('M d, Y', strtotime($updated_at) );
										
										if($deleted=='1')
										{
										$class= "label label-important";
										$status = "disabled";
										}
										else
										{
										$class= "label label-success";
										$status = "enabled";
										}
									?>
										
										<tr>
											<td><?php echo $ctr; ?></td>
											
											<?php if($prize_img==''){ ?> <td><img src="../assets/img/no_image.png" width="50px"></td> <?php }
											else { ?> <td><img src="../assets/img/gallery/<?php echo $prize_img; ?>" width="50px"></td> <?php } ?>
											
											<td class="center"><?php echo $prize_name; ?></td>
											<td class="center"><?php echo number_format($prize_credits); ?></td>
											<td class="center"><?php echo $prize_created_at; ?></td>
											<td class="center"><span class="<?php echo $class; ?>"><?php echo $status; ?></span></td>
											<td class="center">
												<!--<a class="btn btn-success" href="#">
													<i class="icon-zoom-in icon-white"></i>  
													View                                            
												</a>-->
												<a class="btn btn-info" href="edit_items.php?action=edit&prize_id=<?php echo $prize_id."&".MD5($prize_created_at);?>">
													<i class="icon-edit icon-white"></i>     
												</a>
												<a class="btn btn-danger" href="edit_items.php?action=delete&prize_id=<?php echo $prize_id."&".MD5($prize_created_at);?>">
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
