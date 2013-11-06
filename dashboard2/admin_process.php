<?php session_start(); ?>
<?php
include("../db_connect.php");
$datetime = date('Y-m-d H:i:s');
$databaseconnect = NEW databaseconnect();
$databaseconnect->dbconnect();

switch($_SERVER['QUERY_STRING'])
{
	case 'adminlogin':
		if(isset($_POST["submit"]))
		{
			$admin_username = $_POST["username"];
			$admin_password = md5($_POST["password"]);
			
			$result_admin = mysql_query("SELECT * FROM users WHERE email='$admin_username' AND user_type='1' LIMIT 1");
			$num_rows = mysql_num_rows($result_admin);
			
			if($num_rows>0)
			{
				
				while ($row = mysql_fetch_array($result_admin))
				{
					$admin_email = $row['email'];
					$admin_pass = $row['password'];
					$user_type = $row['user_type'];
					
					
					$key = $row['key_email']; //email verified
					
					if($admin_username==$admin_email and $admin_password == $admin_pass and $user_type==1)
					{
						if($key==NULL) //if not verified on their Email
						{
							$access = TRUE;
							
							if($access==TRUE)
							{	
								echo $_SESSION["firstname"] = $row['firstname'];
								echo $_SESSION["user_id"] = $row['user_id'];
								echo $_SESSION["a_username"] = $admin_email;
								
								$query_insert_login = mysql_query("INSERT INTO login_logout (user_id, login_date) VALUES ('$_SESSION[user_id]', '$datetime')");
								
								if($query_insert_login)
								{
									header('Location: index.php');
								}
							}
						}
						else
						{
							$access = FALSE;
							header('Location: login.php?error=not_verified');
						}
					}
					else
					{
						$access = FALSE;
						header('Location: login.php?error=failed_login');
					}
					
				
				}
			}
			else
			{
				header('Location: login.php?error=failed_login');
			}
		
		}
	break;
	case 'logout':
		if($_SESSION["a_username"])
		{	
			$query_insert_logout = mysql_query("UPDATE login_logout SET logout_date='$datetime' WHERE login_date!='0000-00-00 00:00:00' and logout_date='0000-00-00 00:00:00' and user_id='$_SESSION[user_id]'");
			
			if($query_insert_logout)
			{
				session_destroy();
				//unset($_SESSION['a_username']);
				header('Location: login.php');
			}
		}
		else
		{
			header('Location: login.php');
		}
	break;

}

?>