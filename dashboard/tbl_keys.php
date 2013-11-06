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
						<a href="#">Key Data</a>
					</li>
				</ul>
			</div>
			
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-list"></i> Keys</h2>
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
								  <th>Name</th>
								  <th>Credits</th>
								  <th>Price ($)</th>
								  <th>Created</th>
								  <th>Updated</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
							<?php
							$key_query = mysql_query("SELECT * FROM treasuria_key WHERE deleted='0'");
							$count_key_query = mysql_num_rows($key_query);
							$ctr = 0;
								
								if($count_key_query>0)
								{
									while($row_key = mysql_fetch_array($key_query))
									{
										$ctr += 1;
										$key_uniq = $row_key['key_uniq'];
										$key_id = $row_key['key_id'];
										$key_img = $row_key['key_img'];
										$key_credits = $row_key['key_credits'];
										$key_name = $row_key['key_name'];
										$key_price = $row_key['key_price'];
										$created_at = date('M d, Y', strtotime($row_key["created_at"]) );
										$updated_at = date('M d, Y', strtotime($row_key["updated_at"]) );										
									?>
										
										<tr>
											<td><?php echo $ctr; ?></td>
											<td><img src="../assets/img/<?php echo $key_img; ?>" width="50px"></td>
											<td class="center"><?php echo $key_name; ?></td>
											<td class="center"><?php echo $key_credits; ?></td>
											<td class="center"><?php echo $key_price; ?></td>
											<td class="center"><?php echo $created_at; ?></td>
											<td class="center"><?php echo $updated_at; ?></td>
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
