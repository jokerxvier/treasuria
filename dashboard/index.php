<?php session_start();
?>
<?php

$ses_username = $_SESSION["a_username"];

if(isset($ses_username))
{
include('header.php');
//include('admin_function.php');
?>
	<div>
		<ul class="breadcrumb">
			<li>
				<a href="index.php">Home</a> <span class="divider">/</span>
			</li>
			<li>
				<a href="index.php">Dashboard</a>
			</li>
		</ul>
	</div>
	<div class="sortable row-fluid">
		<a data-rel="tooltip" title="" class="well span3 top-block" href="tbl_users_data.php">
			<span class="icon32 icon-red icon-user"></span>
			<div>Total Active Member(s)</div>
			<div>
			<?php
				$result_count = $mysqli->prepare("SELECT * FROM users WHERE deleted='0' AND user_type='0'");
				$result_count -> execute();
				$result_count -> store_result();
				echo $result_count->num_rows;
			?></div>
			<!--<span class="notification"> </span>-->
		</a>
		
		<a data-rel="tooltip" title="" class="well span3 top-block" href="tbl_users_data.php">
			<span class="icon32 icon-red icon-user"></span>
			<div>Total Pending Member(s)</div>
			<div><?php
				$result_count1 = $mysqli->prepare("SELECT * FROM users WHERE key_email!='' AND deleted='0' AND user_type='0'");
				$result_count1 -> execute();
				$result_count1 -> store_result();
				echo $result_count1->num_rows;
				?></div>
			<!--<span class="notification"> </span>-->
		</a>

		<a data-rel="tooltip" title="4 new pro members." class="well span3 top-block" href="tbl_gallery_item.php">
			<span class="icon32 icon-color icon-star-on"></span>
			<div>Total Gallery Item(s) </div>
			<div>
			<?php
				$result_count2 = $mysqli->prepare("SELECT * FROM treasuria_gallery WHERE deleted='0'");
				$result_count2 -> execute();
				$result_count2 -> store_result();
				echo $result_count2->num_rows;
			?>
			</div>
			<!--<span class="notification"> </span>-->
		</a>

		<!--<a data-rel="tooltip" title="$34 new sales." class="well span3 top-block" href="#">
			<span class="icon32 icon-color icon-cart"></span>
			<div>Total Key(s)</div>
			<div><?php //echo CounterKeys(); ?></div>
			<span class="notification"> </span>
		</a>-->
		
		<a data-rel="tooltip" title="4 new pro members." class="well span3 top-block" href="tbl_keys.php">
			<span class="icon32 icon-color icon-star-on"></span>
			<div>Total Key(s)</div>
			<div><?php
				$result_count3 = $mysqli->prepare("SELECT * FROM treasuria_key WHERE deleted='0'");
				$result_count3 -> execute();
				$result_count3 -> store_result();
				echo $result_count3->num_rows;
			?></div>
			<!--<span class="notification"> </span>-->
		</a>
		
		<!--<a data-rel="tooltip" title="12 new messages." class="well span3 top-block" href="#">
			<span class="icon32 icon-color icon-envelope-closed"></span>
			<div>Messages</div>
			<div>25</div>
			<span class="notification"> </span>
		</a>-->
	</div>

	<div class="row-fluid sortable">		
		<div class="box span4">
			<div class="box-header well" data-original-title>
				<h2><i class="icon-user"></i> Member Activity</h2>
				<div class="box-icon">
					<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
					<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
				</div>
			</div>
			<div class="box-content">
				<div class="box-content">
					<ul class="dashboard-list">
						<?php
							$subscribers_query = $mysqli->prepare("SELECT user_id, password, firstname, lastname, address, city, country, created_at, updated_at, email, key_email, phone, gender, user_type, deleted FROM users WHERE user_type='0' and deleted='0' ORDER BY RAND() LIMIT 5");
							$subscribers_query->execute();
							$subscribers_query->bind_result($user_id, $password, $firstname, $lastname, $address, $city, $country, $created_at, $updated_at, $email, $key_email, $phone, $gender, $user_type, $deleted);
							$subscribers_query->store_result();
							
							if($subscribers_query->num_rows > 0){
								while($subscribers_query->fetch()){										
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
											
											$subscribers_loginquery = $mysqli->prepare("SELECT login_date FROM login_logout WHERE user_id='$user_id'");
											$subscribers_loginquery->execute();
											$subscribers_loginquery->bind_result($login_date);
											$subscribers_loginquery->store_result();
											
											if($subscribers_loginquery->num_rows > 0){
												while($subscribers_loginquery->fetch()){
												$login_date = $login_date;
												}
											}
											else
											{
												$login_date = "0000-00-00 00:00:00";
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
										
										$todaydate = date("Y-m-d H:i:s");
										if($login_date == "0000-00-00 00:00:00")
										{
											$diff = "none";
										}
										else
										{
											$ago = strtotime($todaydate) - strtotime($login_date); 
											if ($ago >= 86400) {  
											$diff = floor($ago/86400).' days ago';  
											} elseif ($ago >= 3600) {  
											$diff = floor($ago/3600).' hours ago';  
											} elseif ($ago >= 60) {  
											$diff = floor($ago/60).' minutes ago';  
											} else {  
											$diff = $ago.' seconds ago';  
											}
										}
										
										  
										?>
										<li>
											<a href="#">
												<img class="dashboard-avatar" alt="<?php echo $email; ?>" src="../assets/img/avatar/<?php echo $avatar_img; ?>">
											</a>
												<strong>Name: </strong> <a href="#"><?php echo $firstname ." ". $lastname; ?></a><br>
												<strong>Last Login: </strong><?php echo $diff; ?><br>
												<strong>Status: </strong> <span class="<?php echo $class; ?>"><?php echo $status; ?></span>                                  
										</li>
									<?php
									}
								}
							?>
					</ul>
				</div>
			</div>
		</div><!--/span-->
				
		<div class="box span4">
			<div class="box-header well" data-original-title>
				<h2><i class="icon-star"></i> Highest Points</h2>
				<div class="box-icon">
					<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
					<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
				</div>
			</div>
			<div class="box-content">
				<div class="box-content">
					<ul class="dashboard-list">
						<?php
							$points_query = $mysqli->prepare("SELECT user_id, points FROM user_points ORDER BY points DESC LIMIT 5");
							$points_query->execute();
							$points_query->bind_result($user_id_points, $points);
							$points_query->store_result();
							
							if($points_query->num_rows > 0){
								while($points_query->fetch()){
									
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
													<li>
														<a href="#">
															<img class="dashboard-avatar" alt="<?php echo $email; ?>" src="../assets/img/avatar/<?php echo $avatar_img; ?>">
														</a>
															<strong>Name: </strong> <a href="#"><?php echo $firstname ." ". $lastname; ?></a><br>
															<strong>Points: </strong><?php echo $points; ?><br><br>
													</li>
												<?php
										}
									}
								}
							}	
							?>
						
					</ul>
					<a href="tbl_users_data.php?#highestPoints"> SEE MORE </a>
				</div>
			</div>
		</div><!--/span-->
		
		<div class="box span4">
			<div class="box-header well" data-original-title>
				<h2><i class="icon-star"></i> Highest Credits</h2>
				<div class="box-icon">
					<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
					<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
				</div>
			</div>
			<div class="box-content">
				<div class="box-content">
					<ul class="dashboard-list">
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
									
									if($c_query->num_rows > 0){
										while($c_query->fetch()){
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
													<li>
														<a href="#">
															<img class="dashboard-avatar" alt="<?php echo $email; ?>" src="../assets/img/avatar/<?php echo $avatar_img; ?>">
														</a>
															<strong>Name: </strong> <a href="#"><?php echo $firstname ." ". $lastname; ?></a><br>
															<strong>Credits: </strong><?php echo $credits; ?><br><br>
													</li>
												<?php
										}
									}
										
								}
							}	
							?>
					</ul>
					<a href="tbl_users_data.php?#highestCredits"> SEE MORE </a>
				</div>
			</div>
		</div><!--/span-->
	</div><!--/row-->
	
	<!--<div class="row-fluid sortable">
		<div class="box span4">
			<div class="box-header well" data-original-title>
				<h2><i class="icon-list-alt"></i> Realtime Traffic</h2>
				<div class="box-icon">
					<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
					<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
				</div>
			</div>
			<div class="box-content">
				<div id="realtimechart" style="height:190px;"></div>
					<p class="clearfix">You can update a chart periodically to get a real-time effect by using a timer to insert the new data in the plot and redraw it.</p>
					<p>Time between updates: <input id="updateInterval" type="text" value="" style="text-align: right; width:5em"> milliseconds</p>
			</div>
		</div>
	</div> -->
	
	
<?php

include('footer.php');

}
else
{
header('Location: login.php');
}
?>
