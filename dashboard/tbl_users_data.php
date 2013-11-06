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
						<a href="#">Users Data</a>
					</li>
				</ul>
			</div>
			
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Subscribers</h2>
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
								  <th></th>
								  <th>Name</th>
								  <th>Username</th>
								  <th>Address</th>
								  <th>Date registered</th>
								  <th>Phone</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
							<?php
							$subscribers_query = mysql_query("SELECT * FROM users WHERE user_type='0'");
							$count_subscribers_query = mysql_num_rows($subscribers_query);
							$ctr_member = 0;
								if($count_subscribers_query>0)
								{
									while($row_members = mysql_fetch_array($subscribers_query))
									{
										$ctr_member += 1;
										$user_id = $row_members["user_id"];
										$firstname = $row_members["firstname"];
										$lastname = $row_members["lastname"];
										$email = $row_members["email"];
										$address = $row_members["address"];
										$city = $row_members["city"];
										$country = $row_members["country"];
										$created_at = date('M d, Y', strtotime($row_members["created_at"]) );
										$phone = $row_members["phone"];
										$gender = $row_members["gender"];
										$user_type = $row_members["user_type"];
										$deleted = $row_members["deleted"];
										$key_email = $row_members["key_email"];
										
										$subscribers_avatarquery = mysql_query("SELECT * FROM user_avatar WHERE user_id='$user_id'");
										while($row_avatarq = mysql_fetch_array($subscribers_avatarquery))
										{
											$avatar_id = $row_avatarq["avatar_id"];
											
											$avatarquery = mysql_query("SELECT * FROM avatar_choices WHERE avatar_id='$avatar_id'");
											while($row_avatar = mysql_fetch_array($avatarquery))
											{
												$avatar_img = $row_avatar["image"];
											}
										}

										if($key_email==NULL)
										{
											$class= "label label-success";
											$status = "verified";
										}
										else
										{
											$class= "label label-warning";
											$status = "pending";
										}
										
											if($deleted=='1')
											{
											$class= "label label-important";
											$status = "disabled";
											}
										
										?>
									
										<tr>
											<td><?php echo $ctr_member; ?></td>
											<td><img src="../assets/img/avatar/<?php echo $avatar_img; ?>"></td>
											<td><?php echo $firstname ." ". $lastname; ?></td>
											<td class="center"><?php echo $email; ?></td>
											<td class="center"><?php echo $address .", ". $city .", ". $country; ?></td>
											<td class="center"><?php echo $created_at; ?></td>
											<td class="center"><?php echo $phone; ?></td>
											<td class="center"><span class="<?php echo $class; ?>"><?php echo $status; ?></span></td>
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

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Administrator</h2>
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
								  <th></th>
								  <th>Name</th>
								  <th>Username</th>
								  <th>Address</th>
								  <th>Date registered (Y-m-d)</th>
								  <th>Phone</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
							<?php
							$subscribers_query = mysql_query("SELECT * FROM users WHERE user_type='1'");
							$count_subscribers_query = mysql_num_rows($subscribers_query);
							$ctr_admin = 0;
								if($count_subscribers_query>0)
								{
									while($row_members = mysql_fetch_array($subscribers_query))
									{
										$ctr_admin += 1;
										
										$user_id = $row_members["user_id"];
										$firstname = $row_members["firstname"];
										$lastname = $row_members["lastname"];
										$email = $row_members["email"];
										$address = $row_members["address"];
										$city = $row_members["city"];
										$country = $row_members["country"];
										$created_at = date('M d, Y', strtotime($row_members["created_at"]) );										
										$phone = $row_members["phone"];
										$gender = $row_members["gender"];
										$user_type = $row_members["user_type"];
										$deleted = $row_members["deleted"];
										$key_email = $row_members["key_email"];
										
										$subscribers_avatarquery = mysql_query("SELECT * FROM user_avatar WHERE user_id='$user_id'");
										while($row_avatarq = mysql_fetch_array($subscribers_avatarquery))
										{
											$avatar_id = $row_avatarq["avatar_id"];
											
											$avatarquery = mysql_query("SELECT * FROM avatar_choices WHERE avatar_id='$avatar_id'");
											while($row_avatar = mysql_fetch_array($avatarquery))
											{
												$avatar_img = $row_avatar["image"];
											}
										}

										if($key_email==NULL)
										{
											$class= "label label-success";
											$status = "verified";
										}
										else
										{
											$class= "label label-warning";
											$status = "pending";
										}
										
											if($deleted=='1')
											{
											$class= "label label-important";
											$status = "disabled";
											}
										
										?>
									
										<tr>
											<td><?php echo $ctr_admin; ?></td>
											<td><img src="../assets/img/avatar/<?php echo $avatar_img; ?>"></td>
											<td><?php echo $firstname ." ". $lastname; ?></td>
											<td class="center"><?php echo $email; ?></td>
											<td class="center"><?php echo $address .", ". $city .", ". $country; ?></td>
											<td class="center"><?php echo $created_at; ?></td>
											<td class="center"><?php echo $phone; ?></td>
											<td class="center"><span class="<?php echo $class; ?>"><?php echo $status; ?></span></td>
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
