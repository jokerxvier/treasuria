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
			<a href="tbl_keys.php">Key Data</a><span class="divider">/</span>
		</li>
		<li>
			<a href="#"><?php echo $action; ?></a> 
		</li>
	</ul>
</div>

<?php


switch($action)
{
	case 'edit':
		$item_edit_q = mysql_query("SELECT * FROM treasuria_key WHERE key_uniq='$_GET[key_uniq]'");
		$num_item = mysql_num_rows($item_edit_q);
		if($num_item>0)
		{
			while($row_i = mysql_fetch_array($item_edit_q))
			{
			$row_key_uniq = $row_i['key_uniq'];
			$row_key_img = $row_i['key_img'];
			$row_key_credits = $row_i['key_credits'];
			$row_key_name = $row_i['key_name'];
			$row_key_price = $row_i['key_price'];
			$row_created_at = $row_i['created_at'];
			$row_updated_at = $row_i['updated_at'];
			$deleted = $row_i['deleted'];
			
			?>
			<div class="row-fluid sortable">
					<div class="box span12">
						<div class="box-header well" data-original-title>
							<h2><i class="icon-edit"></i> Key Data</h2>
							<div class="box-icon">
								<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
								<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
								<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
							</div>
						</div>
						<div class="box-content"> 
							<form method="post" action="" enctype="multipart/form-data" id="edit_member" class="form-horizontal">
							  <fieldset>
								<legend> Edit Key</legend>
								
								<?php if($deleted=='1') { ?> <div class="alert alert-error"><p>WARNING: This item was disabled. Click <a href="edit_items.php?action=retrieve&prize_id=<?php echo $_GET['prize_id']."&".MD5($datetime);?>"> here</a> to enable this item.</p></div> <?php }
								
								if(isset($_POST["submit"]))
								{
									$key_credits = $_POST['key_credits'];
									$key_name = $_POST['key_name'];
									$key_price = $_POST['key_price'];
									
									if($key_credits=='' OR $key_name=='' OR $key_price=='')
									{
										?> <div class="alert alert-error"><p>ERROR: Don't leave blank space.</p></div> <?php
									}
									else
									{
										//IMAGE UPLOADER//
										
											if ($_FILES["file"]["error"] > 0)
											{
												//if no new image
												?> <!--<div class="alert alert-error"><p> <?php	//echo "Return Code: " . $_FILES["file"]["error"] . "<br>"; ?></p></div>--> <?php
												
												$update_edit_item = mysql_query("UPDATE treasuria_gallery SET prize_name='$prize_name', prize_credits='$prize_credits', updated_at='$datetime' WHERE prize_id='$_GET[prize_id]'");
														
												if($update_edit_item)
												{
													?> <meta http-equiv="refresh" content="0" > <?php
												}
												
											}
											else
											{	
												$allowedExts = array("gif", "jpeg", "jpg", "png");
												$temp = explode(".", $_FILES["file"]["name"]);
												$extension = end($temp);
												if ((($_FILES["file"]["type"] == "image/gif")
												|| ($_FILES["file"]["type"] == "image/jpeg")
												|| ($_FILES["file"]["type"] == "image/jpg")
												|| ($_FILES["file"]["type"] == "image/pjpeg")
												|| ($_FILES["file"]["type"] == "image/x-png")
												|| ($_FILES["file"]["type"] == "image/png"))
												&& ($_FILES["file"]["size"] < 60000) //60000 == 60 KB
												&& in_array($extension, $allowedExts))
												{
													if (is_numeric($key_credits) AND is_numeric($key_price))
													{
														if (file_exists("../assets/img/" . time() . $_FILES["file"]["name"]))
														{
															?> <div class="alert alert-error"><p> <?php echo $_FILES["file"]["name"] . " already exists. "; ?></p></div> <?php
														}
														else
														{
															/* echo "Upload: " . time() . $_FILES["file"]["name"] . "<br>";
															echo "Type: " . $_FILES["file"]["type"] . "<br>";
															echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
															echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
															 */
															$key_img = time() . $_FILES["file"]["name"];
														
															move_uploaded_file($_FILES["file"]["tmp_name"],
															  "../assets/img/" . time() . $_FILES["file"]["name"]);
															  //echo "Stored in: " . "../assets/img/" . time() . $_FILES["file"]["name"];
															
															$update_edit_item = mysql_query("UPDATE treasuria_key SET key_credits='$key_credits', key_img='$key_img', key_name='$key_name', key_price='$key_price', updated_at='$datetime' WHERE key_uniq='$_GET[key_uniq]'");
															
															if($update_edit_item)
															{
																?> <meta http-equiv="refresh" content="0" > <?php
															}
														}
													}
													else
													{
														?> <div class="alert alert-error"><p>ERROR: Key Credit and Key Price should be numeric </p></div> <?php
													}													
												}
												else
												{
												  ?> <div class="alert alert-error"><p>ERROR: Invalid file type or too big file size !</p></div> <?php
												}
											}
										//END --- IMAGE UPLOADER//
										
										
									}
								}
								?>
									
								<div class="control-group">
									<label class="control-label" for="created">Date</label>
									<div class="controls">
										<?php $datetime = date('M d, Y', strtotime($datetime) ); ?>
										<input type="text" class="span6 typeahead" id="created" name="created" value="<?php echo $datetime;?>" disabled="">
									</div>
								</div>
								<div class="control-group">
								  <label class="control-label" for="key_name"> Key Name </label>
								  <div class="controls">
									<input type="text" class="span6 typeahead" name="key_name" id="key_name" value="<?php echo $row_key_name; ?>">
								  </div>
								</div>
								<div class="control-group">
								  <label class="control-label" for="key_price"> Key Price </label>
								  <div class="controls">
									<input type="text" class="span6 typeahead" name="key_price" id="key_price" value="<?php echo $row_key_price; ?>">
								  </div>
								</div>
								<div class="control-group">
								  <label class="control-label" for="key_credits"> Key Credit </label>
								  <div class="controls">
									<input type="text" class="span6 typeahead" name="key_credits" id="key_credits" value="<?php echo $row_key_credits; ?>">
								  </div>
								</div>
								<div class="control-group">
								  <label class="control-label" for="file">Upload Key Image</label>
								  <div class="controls">
									<img src="../assets/img/<?php echo $row_key_img; ?>" width="50px">
									<input class="input-file uniform_on" name="file" id="file" type="file"> (FILE TYPE: .png, .jpg/.jpeg, .gif and FILE SIZE: minimum of 50 KB)
								  </div>
								</div>  
								<div class="form-actions">
								  <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
								  <input type="hidden" name="save_post" name="save_post">
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
		{}
		
		
	break;
	case 'delete':
	
	//delete (disable) or ban
		$delete_query = mysql_query("UPDATE treasuria_key SET deleted='1' WHERE key_uniq='$_GET[key_uniq]'");
		if($delete_query)
		{
			header('Location: tbl_keys.php?d=deleted');
		}
		
	break;
	case 'retrieve':
	//retrieve deleted (disable) or banned users
		$delete_query = mysql_query("UPDATE treasuria_key SET deleted='0' WHERE key_uniq='$_GET[key_uniq]'");
		if($delete_query)
		{
			header('Location: tbl_keys.php?r=enabled');
		}
		
	break;
	
}

include('footer.php'); ?>
