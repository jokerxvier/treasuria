<?php
include("db_connect.php");

$datetime = date('Y-m-d H:i:s');
$databaseconnect = NEW databaseconnect();
$databaseconnect->dbconnect();

if(isset($_GET['email']))if (isset($_GET['email']) and preg_match('/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/', $_GET['email']))
{
	$email = $_GET['email'];
}
if (isset($_GET['key']) and (strlen($_GET['key']) == 32))  //The Activation key will always be 32 since it is MD5 Hash
{
	$key = $_GET['key'];
}

	$result = mysql_query("SELECT * FROM users");
	while ($row = mysql_fetch_array($result))
	{
		$db_email = $row['email'];
		$db_key = $row['key_email'];
		
		if($email==$db_email and $key==$db_key)
		{
			$query_verified = mysql_query("UPDATE users SET key_email=NULL WHERE email='$db_email'");
			
			if($query_verified)
			{
				header('Location: login.php?verify=success');
			}
		}
		else
		{
			header('Location: login.php?error=error_activation');
		}
		
	}
	
?>