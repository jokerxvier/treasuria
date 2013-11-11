<?php session_start(); ?>
<?php
include('header.php');
include("admin_function.php");

$action = (isset($_GET['action'])) ?  $_GET['action'] : '';
?>

<div>
	<ul class="breadcrumb">
		<li>
			<a href="#">Home</a> <span class="divider">/</span>
		</li>
		<li>
			<a href="tbl_users_data.php">Users Data</a><span class="divider">/</span>
		</li>
		<li>
			<a href="#"><?php echo $action; ?></a> 
		</li>
	</ul>
</div>

<?php


switch($action)
{
	case 'add':
		?>
				<div class="row-fluid sortable">
					<div class="box span12">
						<div class="box-header well" data-original-title>
							<h2><i class="icon-edit"></i> Users Data</h2>
							<div class="box-icon">
								<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
								<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
								<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
							</div>
						</div>
						<div class="box-content"> 
							<form method="post" action=" " id="edit_member" class="form-horizontal">
							  <fieldset>
								<legend> Add</legend>
								<?php 
								if(isset($_POST["submit"]))
								{
									$_SESSION['firstname'] = $post_firstname = mysql_escape_string($_POST["firstname"]);
									$_SESSION['lastname'] = $post_lastname = mysql_escape_string($_POST["lastname"]);
									$_SESSION['username'] = $post_username = mysql_escape_string($_POST["username"]);
									$_SESSION['password'] = $post_password = md5($_POST["password"]);
									$_SESSION['c_password'] = $post_c_password = md5($_POST["c_password"]);
									$_SESSION['address'] = $post_address = mysql_escape_string($_POST["address"]);
									$_SESSION['city'] = $post_city = mysql_escape_string($_POST["city"]);
									$_SESSION['country'] = $post_country = mysql_escape_string($_POST["country"]);
									$_SESSION['phone'] = $post_phone = mysql_escape_string($_POST["phone"]);
									$_SESSION['gender'] = $post_gender = mysql_escape_string($_POST["gender"]);
									$post_user_type = '1'; //administrator
									
									
									
									if($post_firstname=='' OR $post_lastname=='' OR $post_username=='' OR $post_password=='' OR $post_c_password=='' OR $post_address=='' OR $post_city=='' OR $post_country=='' OR $post_phone=='' OR $post_gender=='')
									{
										?> <div class="alert alert-error"><p>ERROR: Don't leave blank space.</p></div> <?php
									}
									else
									{
										if($post_password!=$post_c_password) // does not match
										{
											?> <div class="alert alert-error"><p>ERROR: Password does not match</p></div> <?php
										}
										else //pass match
										{
											$result_registered = mysql_query("SELECT * from users WHERE email='$post_username'");
											$num_rows_registered = mysql_num_rows($result_registered);
											
											if($num_rows_registered) //if already registered
											{
												?> <div class="alert alert-error"><p>ERROR: Email Already Registered </p></div> <?php
											}
											else
											{
												if (is_numeric($post_phone))
												{
													$query_insert_new_user = mysql_query("INSERT INTO users (firstname,lastname,email,password,address,city,country,phone,gender,created_at,updated_at,user_type,key_email) VALUES ('$post_firstname','$post_lastname','$post_username','$post_c_password','$post_address','$post_city','$post_country','$post_phone','$post_gender','$datetime','$datetime','$post_user_type','')");
													
													if($query_insert_new_user)
													{
														$last_userid = mysql_insert_id();
														$rand = MD5($datetime);
														$s = "added";
														echo $URL="edit_members.php?action=edit&user_id=$last_userid&$rand&s=$s";
														header('Location: '.$URL);
													}
												}
												else {
													?> <div class="alert alert-error"><p>ERROR: Phone should be numeric </p></div> <?php
												}
											}
										}
									}
								}
								?>
								<div class="control-group">
									<label class="control-label" for="created">Date Registered</label>
									<div class="controls">
										<?php $datetime = date('M d, Y', strtotime($datetime) ); ?>
										<input type="text" class="span6 typeahead" id="created" name="created" value="<?php echo $datetime;?>" disabled="">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="user_type"> User Type </label>
									<div class="controls">
										<select name="user_type" id="user_type" name="user_type" disabled="">
											<option value="1" selected>Administrator</option>
										</select>
									</div>
								</div>
								<div class="control-group">
								  <label class="control-label" for="firstname"> First Name </label>
								  <div class="controls">
									<input type="text" class="span6 typeahead" name="firstname" id="firstname" value="<?php if(isset($_SESSION['firstname'])) { echo $_SESSION['firstname']; } ?>" placeholder="First Name">
								  </div>
								</div>
								<div class="control-group">
								  <label class="control-label" for="lastname"> Last Name </label>
								  <div class="controls">
									<input type="text" class="span6 typeahead" name="lastname" id="lastname" value="<?php if(isset($_SESSION['lastname'])) { echo $_SESSION['lastname']; } ?>" placeholder="Last Name">
								  </div>
								</div>
								<div class="control-group">
								  <label class="control-label" for="username"> Username </label>
								  <div class="controls">
									<input type="email" class="span6 typeahead" name="username" id="username" value="<?php if(isset($_SESSION['username'])) { echo $_SESSION['username']; } ?>" placeholder="Email">
								  </div>
								</div>
								<div class="control-group">
								  <label class="control-label" for="password"> Password </label>
								  <div class="controls">
									<input type="password" class="span6 typeahead" name="password" id="password" value="<?php if(isset($_SESSION['password'])) { echo $_SESSION['password']; } ?>" placeholder="Password">
								  </div>
								</div>
								<div class="control-group">
								  <label class="control-label" for="c_password"> Confirm Password </label>
								  <div class="controls">
									<input type="password" class="span6 typeahead" name="c_password" id="c_password" value="<?php if(isset($_SESSION['c_password'])) { echo $_SESSION['c_password']; } ?>" placeholder="Confirm Password">
								  </div>
								</div>
								<div class="control-group">
								  <label class="control-label" for="address"> Address </label>
								  <div class="controls">
									<input type="text" class="span6 typeahead" name="address" id="address" value="<?php if(isset($_SESSION['address'])) { echo $_SESSION['address']; } ?>" placeholder="Address">
								  </div>
								</div>
								<div class="control-group">
								  <label class="control-label" for="city"> City </label>
								  <div class="controls">
									<input type="text" class="span6 typeahead" name="city" id="city" value="<?php if(isset($_SESSION['city'])) { echo $_SESSION['city']; } ?>" placeholder="City">
								  </div>
								</div>
								<div class="control-group">
								  <label class="control-label" for="country"> Country </label>
								  <div class="controls">
									<input type="text" class="span6 typeahead" name="country" id="country" value="<?php if(isset($_SESSION['country'])) { echo $_SESSION['country']; } ?>" placeholder="Country">
								  </div>
								</div>
								<div class="control-group">
								  <label class="control-label" for="phone"> Phone </label>
								  <div class="controls">
									<input type="text" class="span6 typeahead" name="phone" id="phone" value="<?php if(isset($_SESSION['phone'])) { echo $_SESSION['phone']; } ?>" placeholder="Phone">
								  </div>
								</div>
								<div class="control-group">
									<label class="control-label">Radio buttons</label>
									<div class="controls">
										<label class="radio" name="gender">
											<input type="radio" name="gender" id="male" value="M" checked <?php if(isset($_SESSION['gender']) and $_SESSION['gender']=='M') { echo "checked"; } ?>> Male
										</label>
										<div style="clear:both"></div>
										<label class="radio" name="gender">
											<input type="radio" name="gender" id="female" value="F" <?php if(isset($_SESSION['gender'])and $_SESSION['gender']=='F') { echo "checked"; } ?>> Female
										</label>
									</div>
								</div>
								<div class="control-group">
								  <label class="control-label" for="fileInput">Upload Image/Avatar</label>
								  <div class="controls">
									<input class="input-file uniform_on" id="fileInput" type="file">
								  </div>
								</div>  
								<div class="form-actions">
								  <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
								</div>
							  </fieldset>
							</form>   

						</div>
					</div><!--/span-->

				</div><!--/row-->
				
				<?php
		
	break;
	
	case 'edit':
		$subscribers_query = mysql_query("SELECT * FROM users WHERE user_id='$_GET[user_id]'");
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
				
				<div class="row-fluid sortable">
					<div class="box span12">
						<div class="box-header well" data-original-title>
							<h2><i class="icon-edit"></i> Users Data</h2>
							<div class="box-icon">
								<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
								<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
								<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
							</div>
						</div>
						<div class="box-content"> 
							<form method="post" action=" " id="edit_member" class="form-horizontal">
							  <fieldset>
								<legend> Edit</legend>
								<?php if($deleted=='1') { ?> <div class="alert alert-error"><p>WARNING: This account was disabled or banned. Click <a href="edit_members.php?action=retrieve&user_id=<?php echo $user_id."&".MD5($created_at);?>"> here</a> to enable this account.</p></div> <?php }
								
								if(isset($_GET["s"]) and $_GET["s"]=="added") { ?> <div class="alert alert-success"><p>SUCCESS: Successfully Added User Admin </p></div> <?php } 
								
								if(isset($_POST["submit"]))
								{
									//$update_query = mysql_query("UPDATE users SET");
									$post_firstname = mysql_escape_string($_POST["firstname"]);
									$post_lastname = mysql_escape_string($_POST["lastname"]);
									$post_address = mysql_escape_string($_POST["address"]);
									$post_city = mysql_escape_string($_POST["city"]);
									$post_country = mysql_escape_string($_POST["country"]);
									$post_phone = mysql_escape_string($_POST["phone"]);
									$post_gender = mysql_escape_string($_POST["gender"]);
									
									if($post_firstname=='' OR $post_lastname=='' OR $post_address=='' OR $post_city=='' OR $post_country=='' OR $post_phone=='' OR $post_gender=='')
									{
										?> <div class="alert alert-error"><p>ERROR: Don't leave blank space.</p></div> <?php
									}
									else
									{
										$update_edit = mysql_query("UPDATE users SET firstname='$post_firstname', lastname='$post_lastname', address='$post_address', city='$post_city', country='$post_country', phone='$post_phone', gender='$post_gender', updated_at='$datetime' WHERE user_id='$_GET[user_id]'");
										if($update_edit)
										{
											?> <meta http-equiv="refresh" content="0" > <?php
											?> <!--<div class="alert alert-success"><p>SUCCESS: Successfully Updated. <a href="javascript:history.go(0)">Click to refresh the page</a></p></div> --> <?php
										}
									}
								}
								?>
								
								<div class="control-group">
									<label class="control-label" for="date">Date Registered</label>
									<div class="controls">
										<input type="text" class="span6 typeahead" id="username" value="<?php echo $created_at; ?>" disabled="">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="user_type"> User Type </label>
									<div class="controls">
										<select name="user_type" id="user_type" disabled="">
											<option value="1" <?php if($user_type=='1'){ echo "selected='selected'";}?>>Administrator</option>
											<option value="0" <?php if($user_type=='0'){ echo "selected='selected'";}?>>Subscriber</option>
										</select>
									</div>
								</div>
								<div class="control-group">
								  <label class="control-label" for="firstname"> First Name </label>
								  <div class="controls">
									<input type="text" class="span6 typeahead" name="firstname" id="firstname" value="<?php echo $firstname; ?>">
								  </div>
								</div>
								<div class="control-group">
								  <label class="control-label" for="lastname"> Last Name </label>
								  <div class="controls">
									<input type="text" class="span6 typeahead" name="lastname" id="lastname" value="<?php echo $lastname; ?>">
								  </div>
								</div>
								<div class="control-group">
								  <label class="control-label" for="username"> Username </label>
								  <div class="controls">
									<input type="text" class="span6 typeahead" name="username" id="username" value="<?php echo $email; ?>" disabled="">
								  </div>
								</div>
								<div class="control-group">
								  <label class="control-label" for="address"> Address </label>
								  <div class="controls">
									<input type="text" class="span6 typeahead" name="address" id="address" value="<?php echo $address; ?>">
								  </div>
								</div>
								<div class="control-group">
								  <label class="control-label" for="city"> City </label>
								  <div class="controls">
									<input type="text" class="span6 typeahead" name="city" id="city" value="<?php echo $city; ?>">
								  </div>
								</div>
								<div class="control-group">
								  <label class="control-label" for="country"> Country </label>
								  <div class="controls">
									<input type="text" class="span6 typeahead" name="country" id="country" value="<?php echo $country; ?>">
								  </div>
								</div>
								<div class="control-group">
								  <label class="control-label" for="phone"> Phone </label>
								  <div class="controls">
									<input type="text" class="span6 typeahead" name="phone" id="phone" value="<?php echo $phone; ?>">
								  </div>
								</div>
								<div class="control-group">
									<label class="control-label">Radio buttons</label>
									<div class="controls">
										<label class="radio">
											<input type="radio" name="gender" id="male" value="M" <?php if($gender=='M'){ echo "checked";}?>>Male
										</label>
										<div style="clear:both"></div>
										<label class="radio">
											<input type="radio" name="gender" id="female" value="F" <?php if($gender=='F'){ echo "checked";}?>>Female
										</label>
									</div>
								</div>
								<!--<div class="control-group">
								  <label class="control-label" for="image">Image/Avatar</label>
								  <div class="controls">
									<img src="../assets/img/avatar/<?php //echo $avatar_img; ?>">
								  </div>
								</div>          
								<div class="control-group">
								  <label class="control-label" for="fileInput">Update Image/Avatar</label>
								  <div class="controls">
									<input class="input-file uniform_on" id="fileInput" type="file">
								  </div>
								</div>  -->
								<div class="form-actions">
								  <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
								  <button type="reset" class="btn">Reset</button>
								</div>
							  </fieldset>
							</form>   

						</div>
					</div><!--/span-->

				</div><!--/row-->
				
				<?php
			}
		}
		else
		{
			?> <div class="alert alert-error"><p>ERROR: No Data.</p></div> <?php
		}
		
	break;
	case 'delete':
	//delete (disable) or ban
		$delete_query = mysql_query("UPDATE users SET deleted='1' WHERE user_id='$_GET[user_id]'");
		if($delete_query)
		{
			header('Location: tbl_users_data.php?d=deleted');
		}
		
	break;
	case 'retrieve':
	//retrieve deleted (disable) or banned users
		$delete_query = mysql_query("UPDATE users SET deleted='0' WHERE user_id='$_GET[user_id]'");
		if($delete_query)
		{
			header('Location: tbl_users_data.php?r=enabled');
		}
		
	break;
	
}

include('footer.php'); ?>
