<?php
include 'config.php';

if(isset($_GET['email']))if (isset($_GET['email']) and preg_match('/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/', $_GET['email']))
{
	$email = $_GET['email'];
}
if (isset($_GET['key']) and (strlen($_GET['key']) == 32))  //The Activation key will always be 32 since it is MD5 Hash
{
	$key = $_GET['key'];
}
	$result = $mysqli->prepare("SELECT user_id, email, key_email FROM users WHERE email='$email' and key_email='$key'");
	$result->execute();
	$result->bind_result($db_userid, $db_email, $db_key);
	$result->store_result();
	$ctr_admin = 0;
	if($result->num_rows > 0){
		while($result->fetch()){
			if($email==$db_email and $key==$db_key)
			{
				$query_verified = $mysqli->prepare("UPDATE users SET key_email=NULL, updated_at=NOW() WHERE email='$db_email' and key_email='$db_key'");
				$query_verified->execute();
				$query_verified->store_result();
				
				if($query_verified)
				{
					header('Location: login.php?verify=success');
				}
			}
		}
	}
	else
	{
		header('Location: login.php?error=error_activation');
	}
?>