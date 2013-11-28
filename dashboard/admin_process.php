<?php session_start(); ?>
<?php
include 'db_connect.php';
$datetime = date('Y-m-d H:i:s');

switch($_SERVER['QUERY_STRING'])
{
	case 'adminlogin':
		if(isset($_POST["submit"]))
		{
			$admin_username = $_POST["username"];
			
			$result_admin = $mysqli->prepare("SELECT user_id, firstname, password, salt, email, user_id, key_email, user_type FROM users WHERE email = ?");
			$result_admin->bind_param('s', $admin_username);
			$result_admin->execute();
			$result_admin->bind_result($user_id, $firstname, $admin_pass, $salt, $admin_email, $user_id, $key, $user_type);
			$result_admin->store_result();
			
			if($result_admin->num_rows > 0)
			{
				$result_admin->fetch();
				$admin_password = hash('sha256', $salt . hash('sha256', $_POST["password"]) );
				
					if($admin_username==$admin_email and $admin_password == $admin_pass and $user_type==1)
					{
						if($key==NULL) //if not verified on their Email
						{
							$access = TRUE;
							
							if($access==TRUE)
							{	
								$_SESSION["firstname"] = $firstname;
								$_SESSION["user_id"] = $user_id;
								$_SESSION["a_username"] = $admin_email;
								
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
			else
			{
				header('Location: login.php?error=failed_login');
			}
		
		}
	break;
	case 'adminlogout':
		if($_SESSION["a_username"])
		{	
			$query_insert_logout = mysql_query("UPDATE login_logout SET logout_date='$datetime' WHERE login_date!='0000-00-00 00:00:00' and logout_date='0000-00-00 00:00:00' and user_id='$_SESSION[user_id]'");
			
			if($query_insert_logout)
			{
				//session_destroy();
				unset($_SESSION['a_username']);
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