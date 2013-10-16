<?php
session_start();
include("db_connect.php");

$datetime = date('Y-m-d H:i:s');
$databaseconnect = NEW databaseconnect();
$databaseconnect->dbconnect();

?>

<?php

switch($_SERVER['QUERY_STRING'])
{
	case 'login':
		$access = FALSE;
		if(isset($_POST["submit"]))
		{
			$username = $_POST["username"];
			$password = $_POST["password"];
			
			$result = mysql_query("SELECT * FROM users");
			while ($row = mysql_fetch_array($result))
			{
				$email = $row['email'];
				$pass = $row['password'];
				
				if($username==$email and $password==$pass)
				{	
					$access = TRUE;
					$_SESSION["username"] = $username;
					$_SESSION["password"] = $password;
					
					if($access==TRUE)
					{
						$query_insert_login = mysql_query("UPDATE users SET login_date='$datetime' WHERE email='$username' and password='$password'");
						if($query_insert_login)
						{
							header('Location: index.php');
						}
					}
				}
				else
				{
					$access = FALSE;
					header('Location: login.php');
				}
			}
		}
		
	break;
	case 'logout':
		if($_SESSION["username"])
		{	
			echo "UPDATE users SET logout_date='$datetime' WHERE email='$_SESSION[username]' and password='$_SESSION[password]'";
			$query_insert_logout = mysql_query("UPDATE users SET logout_date='$datetime' WHERE email='$_SESSION[username]' and password='$_SESSION[password]'");
			
			if($query_insert_logout)
			{
				session_destroy();
				header('Location: login.php');
			}
		}
		else
		{
			header('Location: login.php');
		}
	break;
	case 'logout':
		if(isset($_POST["submit"]))
		{
			$reg_username = $_POST["username"];
			$reg_password = $_POST["password"];
			$reg_firstname = $_POST["firstname"];
			$reg_lastname = $_POST["lastname"];
			$reg_password = $_POST["password"];
			
			
		}
		else
		{
			header('Location: login.php');
		}
	break;
}
?>