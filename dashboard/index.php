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
				<a href="index.php">Dashboard</a>
			</li>
		</ul>
	</div>
	<div class="sortable row-fluid">
		<a data-rel="tooltip" title="" class="well span3 top-block" href="tbl_users_data.php">
			<span class="icon32 icon-red icon-user"></span>
			<div>Total Active Member(s)</div>
			<div><?php echo UserCount(); ?></div>
			<!--<span class="notification"> </span>-->
		</a>
		
		<a data-rel="tooltip" title="" class="well span3 top-block" href="tbl_users_data.php">
			<span class="icon32 icon-red icon-user"></span>
			<div>Total Pending Member(s)</div>
			<div><?php echo UserPendingCount(); ?></div>
			<!--<span class="notification"> </span>-->
		</a>

		<a data-rel="tooltip" title="4 new pro members." class="well span3 top-block" href="tbl_gallery_item.php">
			<span class="icon32 icon-color icon-star-on"></span>
			<div>Total Gallery Item(s) </div>
			<div><?php echo GalleryItemCount(); ?></div>
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
			<div><?php echo CounterKeys(); ?></div>
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
							$subscribers_query = mysql_query("SELECT * FROM users WHERE user_type='0' and deleted='0' ORDER BY RAND() LIMIT 5");
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
										$created_at = $row_members["created_at"];
										$phone = $row_members["phone"];
										$gender = $row_members["gender"];
										$user_type = $row_members["user_type"];
										$deleted = $row_members["deleted"];
										$key_email = $row_members["key_email"];
										
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
											
											$login_date = "0000-00-00 00:00:00";
											$subscribers_loginquery = mysql_query("SELECT * FROM login_logout WHERE user_id='$user_id'");
											if($subscribers_loginquery>0)
											{
												while($row_login = mysql_fetch_array($subscribers_loginquery))
												{
													//$login_date = date('M d, Y h:i:s', strtotime($row_login['login_date']) );
													
													$login_date = $row_login["login_date"];
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
							$points_query = mysql_query("SELECT * FROM user_points ORDER BY points DESC");
							$count_points_query = mysql_num_rows($points_query);
							if($count_points_query>0)
							{
								while($row_points = mysql_fetch_array($points_query))
								{
									$points = $row_points['points'];
									$user_id_points = $row_points['user_id'];
								
									$p_query = mysql_query("SELECT * FROM users WHERE user_id='$user_id_points' AND user_type='0' AND deleted='0' LIMIT 5");
									$count_p_query = mysql_num_rows($p_query);
									if($count_p_query>0)
									{
										while($row_p = mysql_fetch_array($p_query))
										{
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
							$credits_query = mysql_query("SELECT SUM(credits) AS creditsTotal, user_id FROM user_credits GROUP BY user_id ORDER BY credits DESC LIMIT 5");
							$count_credits_query = mysql_num_rows($credits_query);
							if($count_credits_query>0)
							{
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
	
	<div class="row-fluid sortable">
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
