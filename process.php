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
			$password = md5($_POST["password"]);
			
			$result = mysql_query("SELECT * FROM users");
			$num_rows = mysql_num_rows($result);
			if($num_rows>0)
			{
				while ($row = mysql_fetch_array($result))
				{
					$email = $row['email'];
					$pass = $row['password'];
					$_SESSION["firstname"] = $row['firstname'];
					$key = $row['key_email'];
					
					if($username==$email and $password==$pass)
					{
						if($key==NULL) //if not verified on their Email
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
				header('Location: login.php');
			}
		}
		
	break;
	case 'logout':
		if($_SESSION["username"])
		{	
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
	case 'register':
		if(isset($_POST["submit"]))
		{
			echo $reg_firstname = $_POST["u_firstname"];
			echo $reg_lastname = $_POST["u_lastname"];
			echo $reg_username = $_POST["u_username"]; //username is equal to EMAIL
			echo $reg_password = md5($_POST["u_password"]);
			echo $reg_address = $_POST["u_address"];
			echo $reg_city = $_POST["u_city"];
			echo $reg_country = $_POST["u_country"];
			echo $reg_phone = $_POST["u_phone"];
			echo $reg_gender = $_POST["gender"];
			echo $reg_key = md5(uniqid(rand()));
			
			$result = mysql_query("SELECT * from users");
				while ($row = mysql_fetch_array($result))
				{
					$email = $row["email"]; // email is equal to username
				}
			
				if($email == $reg_username)
				{
					header('Location: register.php?error=email_error');
				}
				else
				{
					//user_type for subscribers is equal to 0
					$query_insert_new_user = mysql_query("INSERT INTO users (firstname,lastname,email,password,address,city,country,phone,gender,created_at,updated_at,user_type,key_email) VALUES ('$reg_firstname','$reg_lastname','$reg_username','$reg_password','$reg_address','$reg_city','$reg_country','$reg_phone','$reg_gender','$datetime','$datetime','0','$reg_key')");
					
					$verification_link = "http://192.168.1.75/repository/treasuria/keyvalidate.php?email=".$reg_username."&key=".$reg_key;
					if($query_insert_new_user)
					{
					//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
						//error_reporting(E_ALL);
						error_reporting(E_STRICT);

						date_default_timezone_set('America/Toronto');

						require_once('assets/phpmailer/class.phpmailer.php');
						//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

						$mail             = new PHPMailer();

						//$body             = file_get_contents('contents.html');
						$body = "Hi ".$reg_firstname."<br><br>";
						$body = "Verification Code: ".$verification_link;
						
						$body = eregi_replace("[\]",'',$body);
						
						$mail->IsSMTP(); // telling the class to use SMTP
						$mail->Host       = "mail.yourdomain.com"; // SMTP server
						$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
																   // 1 = errors and messages
																   // 2 = messages only
						$mail->SMTPAuth   = true;                  // enable SMTP authentication
						$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
						$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
						$mail->Port       = 465;                   // set the SMTP port for the GMAIL server
						$mail->Username   = "desiree.alviento@gmail.com";  // GMAIL username
						$mail->Password   = "326598des";            // GMAIL password

						$mail->SetFrom('desiree.alviento@gmail.com', 'Desiree Alviento');

						$mail->AddReplyTo("desiree.alviento@gmail.com","Desiree Alviento");

						$mail->Subject    = "Treasuria, Confirm your Email";

						$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

						$mail->MsgHTML($body);

						$address = "desireealviento@synergy88studios.com";
						//$address = $reg_username;
						$mail->AddAddress($address, "Desiree Alviento");

						//$mail->AddAttachment("images/phpmailer.gif");      // attachment
						//$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment

						if(!$mail->Send()) {
						  echo "Mailer Error: " . $mail->ErrorInfo;
						} else {
						  //echo "Message sent!";
						}
					//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
						header('Location: register.php?verify=sentemail');
					}
				}
		}
		else
		{
			header('Location: login.php');
		}
	break;
}
?>