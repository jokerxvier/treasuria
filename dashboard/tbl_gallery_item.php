<?php session_start(); ?>
<?php
$ses_username = $_SESSION["a_username"];

if(isset($ses_username))
{
include('header.php');
include('admin_function.php');
?>
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="index.php">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#">Item's Data</a>
					</li>
				</ul>
			</div>
			
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-list"></i> Treasuria Gallery</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
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
								  <th>Prize Name</th>
								  <th>Credits</th>
								  <th>Created</th>
								  <th>Updated</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
							<?php
							$item_query = mysql_query("SELECT * FROM treasuria_gallery WHERE deleted='0'");
							$count_item_query = mysql_num_rows($item_query);
								$ctr = 0;
								
								if($count_item_query>0)
								{
									while($row_item = mysql_fetch_array($item_query))
									{
										$ctr += 1;
										$prize_name = $row_item['prize_name'];
										$prize_img = $row_item['prize_img'];
										$prize_credits = $row_item['prize_credits'];
										
										
										$prize_created_at = date('M d, Y', strtotime($row_item['created_at']) );
										$prize_updated_at = date('M d, Y', strtotime($row_item['updated_at']) );
										
										
									?>
										
										<tr>
											<td><?php echo $ctr; ?></td>
											<td><img src="../assets/img/gallery/<?php echo $prize_img; ?>" width="50px"></td>
											<td class="center"><?php echo $prize_name; ?></td>
											<td class="center"><?php echo $prize_credits; ?></td>
											<td class="center"><?php echo $prize_created_at; ?></td>
											<td class="center"><?php echo $prize_updated_at; ?></td>
											<td class="center">
												<!--<a class="btn btn-success" href="#">
													<i class="icon-zoom-in icon-white"></i>  
													View                                            
												</a>-->
												<a class="btn btn-info" href="#">
													<i class="icon-edit icon-white"></i>          
												</a>
												<a class="btn btn-danger" href="#">
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
