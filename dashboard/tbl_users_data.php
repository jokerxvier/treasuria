<?php session_start(); ?>
<?php
$ses_username = $_SESSION["a_username"];

if(isset($ses_username))
{
include('header.php');
//include('admin_function.php');

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
							$subscribers_query = $mysqli->prepare("SELECT user_id, password, firstname, lastname, address, city, country, created_at, updated_at, email, key_email, phone, gender, user_type, deleted FROM users WHERE user_type='0'");
							$subscribers_query->execute();
							$subscribers_query->bind_result($user_id, $password, $firstname, $lastname, $address, $city, $country, $created_at, $updated_at, $email, $key_email, $phone, $gender, $user_type, $deleted);
							$subscribers_query->store_result();
							$ctr_member = 0;
							 
							if($subscribers_query->num_rows > 0){
								while($subscribers_query->fetch()){		
									$ctr_member += 1; 
										/*
										for future -- if madami ng AVATAR . . . .
										
										$subscribers_avatarquery = mysql_query("SELECT * FROM user_avatar WHERE user_id='$user_id'");
										while($row_avatarq = mysql_fetch_array($subscribers_avatarquery))
										{
											$avatar_id = $row_avatarq["avatar_id"];
											
											$avatarquery = mysql_query("SELECT * FROM avatar_choices WHERE avatar_id='$avatar_id'");
											while($row_avatar = mysql_fetch_array($avatarquery))
											{
												$avatar_img = $row_avatar["image"];
											}
										} */
										if($gender=='M')
										{
											$avatar_img = "male.png";
										}
										else if($gender=='F')
										{
											$avatar_img = "female.png";
										}
										else
										{
											$avatar_img = "no_image.png";
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
							<!--<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>-->
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
							$subscribers_query = $mysqli->prepare("SELECT user_id, password, firstname, lastname, address, city, country, created_at, updated_at, email, key_email, phone, gender, user_type, deleted FROM users WHERE user_type='1'");
							$subscribers_query->execute();
							$subscribers_query->bind_result($user_id, $password, $firstname, $lastname, $address, $city, $country, $created_at, $updated_at, $email, $key_email, $phone, $gender, $user_type, $deleted);
							$subscribers_query->store_result();
							$ctr_member = 0;
							 
							if($subscribers_query->num_rows > 0){
								while($subscribers_query->fetch()){		
									$ctr_member += 1; 
									
										/*
										for future -- if madami ng AVATAR . . . .
										
										$subscribers_avatarquery = mysql_query("SELECT * FROM user_avatar WHERE user_id='$user_id'");
										while($row_avatarq = mysql_fetch_array($subscribers_avatarquery))
										{
											$avatar_id = $row_avatarq["avatar_id"];
											
											$avatarquery = mysql_query("SELECT * FROM avatar_choices WHERE avatar_id='$avatar_id'");
											while($row_avatar = mysql_fetch_array($avatarquery))
											{
												$avatar_img = $row_avatar["image"];
											}
										} */
										if($gender=='M')
										{
											$avatar_img = "male.png";
										}
										else if($gender=='F')
										{
											$avatar_img = "female.png";
										}
										else
										{
											$avatar_img = "no_image.png";
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
								  <th></th>
								  <th>Name</th>
								  <th>Username</th>
								  <th>Points</th>
							  </tr>
						  </thead>   
						  <tbody>
							<?php
							$points_query = $mysqli->prepare("SELECT user_id, points FROM user_points ORDER BY points DESC");
							$points_query->execute();
							$points_query->bind_result($user_id_points, $points);
							$points_query->store_result();
							$ctr_admin = 0;
							if($points_query->num_rows > 0){
								while($points_query->fetch()){
									$ctr_admin += 1;
									$p_query = $mysqli->prepare("SELECT user_id, password, firstname, lastname, address, city, country, created_at, updated_at, email, key_email, phone, gender, user_type, deleted FROM users WHERE user_id='$user_id_points' AND deleted='0'");
									$p_query->execute();
									$p_query->bind_result($user_id, $password, $firstname, $lastname, $address, $city, $country, $created_at, $updated_at, $email, $key_email, $phone, $gender, $user_type, $deleted);
									$p_query->store_result();
									
									if($p_query->num_rows > 0){
										while($p_query->fetch()){	
												/*
												for future -- if madami ng AVATAR . . . .
												
												$subscribers_avatarquery = mysql_query("SELECT * FROM user_avatar WHERE user_id='$user_id'");
												while($row_avatarq = mysql_fetch_array($subscribers_avatarquery))
												{
													$avatar_id = $row_avatarq["avatar_id"];
													
													$avatarquery = mysql_query("SELECT * FROM avatar_choices WHERE avatar_id='$avatar_id'");
													while($row_avatar = mysql_fetch_array($avatarquery))
													{
														$avatar_img = $row_avatar["image"];
													}
												} */
												if($gender=='M')
												{
													$avatar_img = "male.png";
												}
												else if($gender=='F')
												{
													$avatar_img = "female.png";
												}
												else
												{
													$avatar_img = "no_image.png";
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
								  <th></th>
								  <th>Name</th>
								  <th>Username</th>
								  <th>Credits</th>
							  </tr>
						  </thead>   
						  <tbody>
							<?php
							$credits_query = $mysqli->prepare("SELECT SUM(credits) AS credits, user_id FROM user_credits GROUP BY user_id ORDER BY credits DESC LIMIT 5");
							$credits_query->execute();
							$credits_query->bind_result($credits, $user_id_credits);
							$credits_query->store_result();
							
							if($credits_query->num_rows > 0){
								while($credits_query->fetch()){
								
									$c_query = $mysqli->prepare("SELECT user_id, password, firstname, lastname, address, city, country, created_at, updated_at, email, key_email, phone, gender, user_type, deleted FROM users WHERE user_id='$user_id_credits' AND deleted='0'");
									$c_query->execute();
									$c_query->bind_result($user_id, $password, $firstname, $lastname, $address, $city, $country, $created_at, $updated_at, $email, $key_email, $phone, $gender, $user_type, $deleted);
									$c_query->store_result();
									
									$ctr = 0;
									if($c_query->num_rows > 0){
										while($c_query->fetch()){
										$ctr +=1;
												/*
												for future -- if madami ng AVATAR . . . .
												
												$subscribers_avatarquery = mysql_query("SELECT * FROM user_avatar WHERE user_id='$user_id'");
												while($row_avatarq = mysql_fetch_array($subscribers_avatarquery))
												{
													$avatar_id = $row_avatarq["avatar_id"];
													
													$avatarquery = mysql_query("SELECT * FROM avatar_choices WHERE avatar_id='$avatar_id'");
													while($row_avatar = mysql_fetch_array($avatarquery))
													{
														$avatar_img = $row_avatar["image"];
													}
												} */
												if($gender=='M')
												{
													$avatar_img = "male.png";
												}
												else if($gender=='F')
												{
													$avatar_img = "female.png";
												}
												else
												{
													$avatar_img = "no_image.png";
												}
													
												?>
													<tr>
														<td><?php echo $ctr; ?></td>
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
