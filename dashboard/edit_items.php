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
			<a href="tbl_gallery_item.php">Items Data</a><span class="divider">/</span>
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
							<h2><i class="icon-edit"></i> Items Data</h2>
							<div class="box-icon">
								<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
								<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
								<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
							</div>
						</div>
						<div class="box-content"> 
							<form method="post" action="" enctype="multipart/form-data" id="edit_member" class="form-horizontal">
							  <fieldset>
								<legend> Add Item</legend>
								
								<?php 
								
		
								if(isset($_POST["submit"]))
								{
									$prize_name = $_POST['prize_name'];
									$prize_credits = $_POST['prize_credits'];
									
									if($prize_name=='' OR $prize_credits=='')
									{
										?> <div class="alert alert-error"><p>ERROR: Don't leave blank space.</p></div> <?php
									}
									else
									{
										$result_exist = mysql_query("SELECT * from treasuria_gallery WHERE prize_name='$prize_name'");
										$num_result_exist = mysql_num_rows($result_exist);
										
										if($num_result_exist) //if exist
										{
											?> <div class="alert alert-error"><p>ERROR: Item already exist.</p></div> <?php
										}
										else
										{
											//IMAGE UPLOADER//
										
											if ($_FILES["post_image"]["error"] > 0)
											{
												//if no image
												?> <div class="alert alert-error"><p>ERROR: Upload the item's image.</p></div> <?php
											}
											else
											{	
												$allowedExts = array("gif", "jpeg", "jpg", "png");
												$temp = explode(".", $_FILES["post_image"]["name"]);
												$extension = end($temp);
												if ((($_FILES["post_image"]["type"] == "image/gif")
												|| ($_FILES["post_image"]["type"] == "image/jpeg")
												|| ($_FILES["post_image"]["type"] == "image/jpg")
												|| ($_FILES["post_image"]["type"] == "image/pjpeg")
												|| ($_FILES["post_image"]["type"] == "image/x-png")
												|| ($_FILES["post_image"]["type"] == "image/png"))
												&& ($_FILES["post_image"]["size"] < 60000) //60000 == 60 KB
												&& in_array($extension, $allowedExts))
												{
													if (is_numeric($prize_credits))
													{
														if (file_exists("../assets/img/gallery/" . time() . $_FILES["post_image"]["name"]))
														{
															?> <div class="alert alert-error"><p> <?php echo $_FILES["post_image"]["name"] . " already exists. "; ?></p></div> <?php
														}
														else
														{
															/* echo "Upload: " . time() . $_FILES["post_image"]["name"] . "<br>";
															echo "Type: " . $_FILES["post_image"]["type"] . "<br>";
															echo "Size: " . ($_FILES["post_image"]["size"] / 1024) . " kB<br>";
															echo "Temp file: " . $_FILES["post_image"]["tmp_name"] . "<br>";
															 */
															$prize_img = time() . $_FILES["post_image"]["name"];
														
															move_uploaded_file($_FILES["post_image"]["tmp_name"],
															  "../assets/img/gallery/" . time() . $_FILES["post_image"]["name"]);
															  //echo "Stored in: " . "../assets/img/gallery/" . time() . $_FILES["post_image"]["name"];
															  
															$prize_name_uniq = MD5($prize_name);
												
															$insert_item = mysql_query("INSERT INTO treasuria_gallery(prize_uniq, prize_img, prize_name, prize_credits, created_at, updated_at) VALUES ('$prize_name_uniq','$prize_img','$prize_name','$prize_credits','$datetime','$datetime')");
															
															if($insert_item)
															{
																$last_itemid = mysql_insert_id();
																$rand = MD5($datetime);
																$s = "added";
																echo $URL="edit_items.php?action=edit&prize_id=$last_itemid&$rand&s=$s";
																header('Location: '.$URL);
															}
														}
													}
													else
													{
														?> <div class="alert alert-error"><p>ERROR: Prize Credit should be numeric </p></div> <?php
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
								  <label class="control-label" for="prize_name"> Prize Name </label>
								  <div class="controls">
									<input type="text" class="span6 typeahead" name="prize_name" id="prize_name" value="<?php if(isset($_SESSION['prize_name'])) { echo $_SESSION['prize_name']; } ?>" placeholder="Prize Name">
								  </div>
								</div>
								<div class="control-group">
								  <label class="control-label" for="prize_credits"> Prize Credit </label>
								  <div class="controls">
									<input type="text" class="span6 typeahead" name="prize_credits" id="prize_credits" value="<?php if(isset($_SESSION['prize_credits'])) { echo $_SESSION['prize_credits']; } ?>" placeholder="Prize Credit">
								  </div>
								</div>
								<div class="control-group">
								
								  <label class="control-label" for="post_image">Upload Item Image</label>
								  <div class="controls">
									<input class="input-file uniform_on" name="post_image" id="post_image" type="file"> (FILE TYPE: .png, .jpg/.jpeg, .gif and FILE SIZE: minimum of 50 KB)
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
		$item_edit_q = mysql_query("SELECT * FROM treasuria_gallery WHERE prize_id='$_GET[prize_id]'");
		$num_item = mysql_num_rows($item_edit_q);
		if($num_item>0)
		{
			while($row_i = mysql_fetch_array($item_edit_q))
			{
			$row_prize_img = $row_i['prize_img'];
			$row_prize_name = $row_i['prize_name'];
			$row_prize_credits = $row_i['prize_credits'];
			$deleted = $row_i['deleted'];
			
			?>
			<div class="row-fluid sortable">
					<div class="box span12">
						<div class="box-header well" data-original-title>
							<h2><i class="icon-edit"></i> Items Data</h2>
							<div class="box-icon">
								<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
								<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
								<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
							</div>
						</div>
						<div class="box-content"> 
							<form method="post" action="" id="edit_member" enctype="multipart/form-data" class="form-horizontal">
							  <fieldset>
								<legend> Edit Item</legend>
								
								<?php if($deleted=='1') { ?> <div class="alert alert-error"><p>WARNING: This item was disabled. Click <a href="edit_items.php?action=retrieve&prize_id=<?php echo $_GET['prize_id']."&".MD5($datetime);?>"> here</a> to enable this item.</p></div> <?php }
								
								if(isset($_POST["submit"]))
								{
									$prize_name = $_POST['prize_name'];
									$prize_credits = $_POST['prize_credits'];
									
									if($prize_name=='' OR $prize_credits=='')
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
													if (is_numeric($prize_credits))
													{
														if (file_exists("../assets/img/gallery/" . time() . $_FILES["file"]["name"]))
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
															$prize_img = time() . $_FILES["file"]["name"];
														
															move_uploaded_file($_FILES["file"]["tmp_name"],
															  "../assets/img/gallery/" . time() . $_FILES["file"]["name"]);
															  //echo "Stored in: " . "../assets/img/gallery/" . time() . $_FILES["file"]["name"];
															  
															  $update_edit_item = mysql_query("UPDATE treasuria_gallery SET prize_name='$prize_name', prize_img='$prize_img', prize_credits='$prize_credits', updated_at='$datetime' WHERE prize_id='$_GET[prize_id]'");
															
																if($update_edit_item)
																{
																	?> <meta http-equiv="refresh" content="0" > <?php
																}
														}
													}
													else
													{
														?> <div class="alert alert-error"><p>ERROR: Prize Credit should be numeric </p></div> <?php
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
								  <label class="control-label" for="prize_name"> Prize Name </label>
								  <div class="controls">
									<input type="text" class="span6 typeahead" name="prize_name" id="prize_name" value="<?php echo $row_prize_name; ?>">
								  </div>
								</div>
								<div class="control-group">
								  <label class="control-label" for="prize_credits"> Prize Credit </label>
								  <div class="controls">
									<input type="text" class="span6 typeahead" name="prize_credits" id="prize_credits" value="<?php echo $row_prize_credits; ?>">
								  </div>
								</div>
								<div class="control-group">
								  <label class="control-label" for="file">Upload Item Image</label>
								  <div class="controls">
									<img src="../assets/img/gallery/<?php echo $row_prize_img; ?>" width="50px">
									<input class="input-file uniform_on" name="file" id="file" type="file"> (FILE TYPE: .png, .jpg/.jpeg, .gif and FILE SIZE: minimum of 50 KB)
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
			}
		}
		else
		{}
		
		
	break;
	case 'delete':
	
	//delete (disable) or ban
		$delete_query = mysql_query("UPDATE treasuria_gallery SET deleted='1' WHERE prize_id='$_GET[prize_id]'");
		if($delete_query)
		{
			header('Location: tbl_gallery_item.php?d=deleted');
		}
		
	break;
	case 'retrieve':
	//retrieve deleted (disable) or banned users
		$delete_query = mysql_query("UPDATE treasuria_gallery SET deleted='0' WHERE prize_id='$_GET[prize_id]'");
		if($delete_query)
		{
			header('Location: tbl_gallery_item.php?r=enabled');
		}
		
	break;
	
}

include('footer.php'); ?>
