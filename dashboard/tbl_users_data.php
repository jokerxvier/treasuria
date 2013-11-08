<?php session_start(); ?>
<?php
$ses_username = $_SESSION["a_username"];

if(isset($ses_username))
{
include('header.php');
include('admin_function.php');

$update_success = "User Data Successfully Updated!";
$delete_success = "User Successfully Deleted!";
$enabled_success = "User Successfully Enabled!";

?>

			<div>
				<ul class="breadcrumb">
					<li>
						<a href="index.php">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="tbl_users_data.php">Users Data</a>
					</li>
				</ul>
			</div>
			<?php if(isset($_GET["c"]) and $_GET["c"]=="success") { ?> <div class="alert alert-success"> <?php echo $update_success; ?> </div> <?php } ?>
			<?php if(isset($_GET["d"]) and $_GET["d"]=="deleted") { ?> <div class="alert alert-success"> <?php echo $delete_success; ?> </div> <?php } ?>
			<?php if(isset($_GET["r"]) and $_GET["r"]=="enabled") { ?> <div class="alert alert-success"> <?php echo $enabled_success; ?> </div> <?php } ?>
			
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
												<a class="btn btn-info" href="edit_members.php?action=edit&user_id=<?php echo $user_id."&".MD5($created_at);?>">
													<i class="icon-edit icon-white"></i>     
												</a>
												<a class="btn btn-danger" href="edit_members.php?action=delete&user_id=<?php echo $user_id."&".MD5($created_at);?>">
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
						</div> &nbsp;
						<a class="btn btn-success" href="edit_members.php?action=add&<?php echo MD5($created_at);?>"><i class="icon icon-white icon-plus"></i> ADD</a>
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
							$subscribers_query = mysql_query("SELECT * FROM users WHERE user_type='1'");
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
												<a class="btn btn-info" href="edit_members.php?action=edit&user_id=<?php echo $user_id."&".MD5($created_at);?>">
													<i class="icon-edit icon-white"></i>     
												</a>
												<a class="btn btn-danger" href="edit_members.php?action=delete&user_id=<?php echo $user_id."&".MD5($created_at);?>">
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
			
			<div class="row-fluid sortable" id="highestPoints">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Highest Points </h2>
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
								  <th>Points</th>
							  </tr>
						  </thead>   
						  <tbody>
							<?php
							$points_query = mysql_query("SELECT * FROM user_points ORDER BY points DESC");
							$count_points_query = mysql_num_rows($points_query);
							if($count_points_query>0)
							{
								$ctr_admin = 0;
								while($row_points = mysql_fetch_array($points_query))
								{
									$points = $row_points['points'];
									$user_id_points = $row_points['user_id'];
								
									$p_query = mysql_query("SELECT * FROM users WHERE user_id='$user_id_points' AND key_email=' ' AND user_type='0' AND deleted='0'");
									$count_p_query = mysql_num_rows($p_query);
									if($count_p_query>0)
									{
										while($row_p = mysql_fetch_array($p_query))
										{
											$ctr_admin += 1;
											$user_id = $row_p["user_id"];
											$firstname = $row_p["firstname"];
											$lastname = $row_p["lastname"];
											$email = $row_p["email"];
											$address = $row_p["address"];
											$city = $row_p["city"];
											$country = $row_p["country"];
											$created_at = $row_p["created_at"];
											$phone = $row_p["phone"];
											$gender = $row_p["gender"];
											$user_type = $row_p["user_type"];
											$deleted = $row_p["deleted"];
											$key_email = $row_p["key_email"];
											
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
												
												?>
													<tr>
														<td><?php echo $ctr_admin; ?></td>
														<td><img src="../assets/img/avatar/<?php echo $avatar_img; ?>"></td>
														<td><?php echo $firstname ." ". $lastname; ?></td>
														<td class="center"><?php echo $email; ?></td>
														<td class="center"><?php echo $points; ?></td>
													</tr>
												<?php
										}
									}
										
								}
							}	
							?>
							
							
							
							
							
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
			
			<div class="row-fluid sortable" id="highestCredits">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Highest Credits </h2>
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
								  <th>Credits</th>
							  </tr>
						  </thead>   
						  <tbody>
							<?php
							$credits_query = mysql_query("SELECT SUM(credits) AS creditsTotal, user_id FROM user_credits GROUP BY user_id ORDER BY creditsTotal DESC LIMIT 5");
							$count_credits_query = mysql_num_rows($credits_query);
							if($count_credits_query>0)
							{
								$ctr_admin = 0;
								while($row_credits = mysql_fetch_array($credits_query))
								{
									$credits = $row_credits['creditsTotal'];
									$user_id_credits = $row_credits['user_id'];
								
									$c_query = mysql_query("SELECT * FROM users WHERE user_id='$user_id_credits' AND user_type='0' AND deleted='0'");
									$count_c_query = mysql_num_rows($c_query);
									if($count_c_query>0)
									{
										while($row_c = mysql_fetch_array($c_query))
										{	
											$ctr_admin += 1;
											$user_id = $row_c["user_id"];
											$firstname = $row_c["firstname"];
											$lastname = $row_c["lastname"];
											$email = $row_c["email"];
											$address = $row_c["address"];
											$city = $row_c["city"];
											$country = $row_c["country"];
											$created_at = $row_c["created_at"];
											$phone = $row_c["phone"];
											$gender = $row_c["gender"];
											$user_type = $row_c["user_type"];
											$deleted = $row_c["deleted"];
											$key_email = $row_c["key_email"];
											
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
												
												
														
												?>
													<tr>
														<td><?php echo $ctr_admin; ?></td>
														<td><img src="../assets/img/avatar/<?php echo $avatar_img; ?>"></td>
														<td><?php echo $firstname ." ". $lastname; ?></td>
														<td class="center"><?php echo $email; ?></td>
														<td class="center"><?php echo $credits; ?></td>
													</tr>
												<?php
										}
									}
										
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
