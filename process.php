<?php
session_start();
include("db_connect.php");
include("paypal.php");
include("function.php");
$datetime = date('Y-m-d H:i:s');
$databaseconnect = NEW databaseconnect();
$databaseconnect->dbconnect();

?>

<?php
$action = (isset($_GET['action'])) ?  $_GET['action'] : '';
switch($action)
{
	case 'add':
		
		  $item_id =  isset($_GET['keyid']) ? $_GET['keyid'] : '';
		  
		  if ($item_id){
			$_SESSION['cart'][$item_id]++;
			header('Location: merchant.php');
		  }
		  
		
	break;
	case 'remove':
		
		$item_id =  isset($_GET['keyid']) ? $_GET['keyid'] : '';

		if ($item_id)
		{
			$_SESSION['cart'][$item_id]--;
			if($_SESSION['cart'][$item_id] == 0) unset($_SESSION['cart'][$item_id]);
			header('Location: merchant.php');
		}
		
	break;
	
	case 'checkout' :
	
	
	
		$requestParams = array(
		   'RETURNURL' => get_base_url().'/process.php?action=success',
		   'CANCELURL' => get_base_url().'/process.php?action=cancel'
		);
		
		$item = getPaypalItem();
		$total = getPaypalItemTotal();

		

		  $orderParams = array(
			 'PAYMENTREQUEST_0_PAYMENTACTION'=>'Sale', //becouse we want to sale something
			 'PAYMENTREQUEST_0_AMT' => $total, //total amount (items amount+shipping..etc)
			 'PAYMENTREQUEST_0_CURRENCYCODE' => 'USD', //curency code
			 'PAYMENTREQUEST_0_ITEMAMT' =>  $total, //total amount items, without shipping and other taxes
			 'PAYMENTREQUEST_0_SHIPPINGAMT' => '0' //the shipping amount, will be 0 coz we sell digital products
		  );
		
		
		
		$paypal = new Paypal();
		$response = $paypal -> request('SetExpressCheckout',$requestParams + $orderParams + $item);
		print_r($response);
		if(is_array($response) && $response['ACK'] == 'Success') { //Request successful
     		 $token = $response['TOKEN'];
      		header( 'Location: https://www.sandbox.paypal.com/webscr?cmd=_express-checkout&token=' . urlencode($token) );
		}
		
	
			
	break;
	
	case 'success' :
		if( isset($_GET['token']) && !empty($_GET['token']) ) { // Token parameter exists
			   // Get checkout details, including buyer information.
			   // We can save it for future reference or cross-check with the data we have
			   $paypal = new Paypal();
			   $checkoutDetails = $paypal -> request('GetExpressCheckoutDetails', array('TOKEN' => $_GET['token']));
			   $total = getPaypalItemTotal();
			   // Complete the checkout transaction
			   $requestParams = array(
				   'TOKEN' => $_GET['token'],
				   'PAYMENTACTION' => 'Sale',
				   'PAYERID' => $_GET['PayerID'],
				   'PAYMENTREQUEST_0_AMT' => $total, // Same amount as in the original request
				   'PAYMENTREQUEST_0_CURRENCYCODE' => 'USD' // Same currency as the original request
			   );
			
			   $response = $paypal -> request('DoExpressCheckoutPayment',$requestParams);
			   
		
			   if( is_array($response) && $response['PAYMENTINFO_0_ACK'] == 'Success') { // Payment successful
				   // We'll fetch the transaction ID for internal bookkeeping
				   $transactionId = $response['PAYMENTINFO_0_TRANSACTIONID'];
				   $user_id = getUserId($_SESSION["username"], $_SESSION["password"]);
				   /*$query_insert_login = mysql_query("UPDATE users SET login_date='$datetime' WHERE email='$username' and password='$password'");*/
				   //unset($_SESSION['cart']);
				   //header('Location: cart.php?success=1');
				   $purchasedtotal = getPaypalItemTotal();
				   $total = 0;
				   

				   
				     if ($response['PAYMENTINFO_0_AMT'] == $purchasedtotal){
						 foreach ($_SESSION['cart'] as $item_id => $qty){
							$itemID =  getItemID($item_id);
							$credits = getKeyValue($item_id);
							$credTotal =$credits * $qty;
							$total += $credTotal;
							$query = mysql_query("INSERT INTO user_credits (user_id, credits, item_id, item_qty, created_at) VALUES ('$user_id', '$credits', '$itemID', '$qty', '$datetime')");
							if($query){
									unset($_SESSION['cart']);	
									header('Location: cart.php?success=1');
							 }else {
								echo mysql_error();
							 }
					   
				 		  }
						 
					 }

			   }
			   
			 
			}
			
			
	
	break;
	
	case 'cancel' :
		echo "cancel";

	break;
	
	
	case 'claim':
		$user_id = $_SESSION['user_id'];
		$prize = $_GET['prize'];
		$points = getPoints($user_id);
		
		$galleryPoints = getGalleryPoints($prize);
		if ($points >= $galleryPoints){
				$query = mysql_query("Update user_points SET points = (points - '$galleryPoints') WHERE user_id = '$user_id' ");
				$insert_query =  mysql_query("INSERT INTO claim_history (user_id, prize_id,  created_at,  status) VALUES ('$user_id', '$prize', '$datetime', 1)");
				if($query AND $insert_query){
					
					$from = "jasonjavier06@gmail.com";
					$replyTo = $from;
					$subject = "Treasuria Product Claim";
					$userFirstName = 'Jason';
					$userEmail = $_SESSION["username"];
					
					$body = "Hi ".$userFirstName."<br><br>";
					$body = "You Have Successfully Claim your Item. ";
					$body = eregi_replace("[\]",'',$body);
				
					if (sentEmail($from, $replyTo, $subject, $userEmail, $userFirstName, $body)) {
						header('Location: gallery.php?message=1');
					}
					
					
				}
				
		}else {
			header('Location: gallery.php?message=0');
		}
		
	break;
	


	
	case 'empty':
		unset($_SESSION['cart']);
		header('Location: merchant.php');
	break;
}	
	
switch($_SERVER['QUERY_STRING'])
{
	
	case 'login':
		$access = FALSE;
		if(isset($_POST["submit"]))
		{
			$username = $_POST["username"];
			$password = md5($_POST["password"]);
			
			$result = mysql_query("SELECT * FROM users WHERE email='$username' LIMIT 1");
			$num_rows = mysql_num_rows($result);
			if($num_rows>0)
			{
				while ($row = mysql_fetch_array($result))
				{
					$email = $row['email'];
					$pass = $row['password'];
					
					$key = $row['key_email'];
					
					if($username==$email and $password==$pass)
					{
						if($key==NULL) //if not verified on their Email
						{
							$access = TRUE;
							
							$_SESSION["firstname"] = $row['firstname'];
							$_SESSION['user_id'] = $row['user_id'];
							$_SESSION["username"] = $username;
							$_SESSION["password"] = $password;
							
							if($access==TRUE)
							{
								//$query_insert_login = mysql_query("UPDATE users SET login_date='$datetime' WHERE email='$username' and password='$password'");
								
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
				$access = FALSE;
				header('Location: login.php?error=failed_login');
			}
		}
		
	break;
	
	case 'logout':
		if($_SESSION["username"])
		{	
			$query_insert_logout = mysql_query("UPDATE login_logout SET logout_date='$datetime' WHERE login_date!='0000-00-00 00:00:00' and logout_date='0000-00-00 00:00:00' and user_id='$_SESSION[user_id]'");
			
			if($query_insert_logout)
			{
				//session_destroy();
				unset($_SESSION['username']);
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
			//validation at footer.php
			$reg_firstname = mysql_escape_string($_POST["u_firstname"]);
			$reg_lastname = mysql_escape_string($_POST["u_lastname"]);
			$reg_username = mysql_escape_string($_POST["u_username"]); //username is equal to EMAIL
			$reg_password = md5($_POST["u_password"]);
			$reg_address = mysql_escape_string($_POST["u_address"]);
			$reg_city = mysql_escape_string($_POST["u_city"]);
			$reg_country = mysql_escape_string($_POST["u_country"]);
			$reg_phone = mysql_escape_string($_POST["u_phone"]);
			$reg_gender = mysql_escape_string($_POST["gender"]);
			$reg_key = md5(uniqid(rand()));
			
			$_SESSION["u_firstname"] = $_POST["u_firstname"];
			$_SESSION["u_lastname"] = $_POST["u_lastname"];
			$_SESSION["u_username"] = $_POST["u_username"]; //username is equal to EMAIL
			$_SESSION["u_password"] = md5($_POST["u_password"]);
			$_SESSION["u_address"] = $_POST["u_address"];
			$_SESSION["u_city"] = $_POST["u_city"];
			$_SESSION["u_country"] = $_POST["u_country"];
			$_SESSION["u_phone"] = $_POST["u_phone"];
			
			$result = mysql_query("SELECT * from users WHERE email='$reg_username'");
			$num_rows = mysql_num_rows($result);
			
			if($num_rows)
			{
				// already registered
				header('Location: register.php?error=email_error');
			}
			else
			{
				//user_type for subscribers is equal to 0
				$query_insert_new_user = mysql_query("INSERT INTO users (firstname,lastname,email,password,address,city,country,phone,gender,created_at,updated_at,user_type,key_email) VALUES ('$reg_firstname','$reg_lastname','$reg_username','$reg_password','$reg_address','$reg_city','$reg_country','$reg_phone','$reg_gender','$datetime','$datetime','0','$reg_key')");
				$last_inserted_id = mysql_insert_id();
				
				$select_key = mysql_query("SELECT * FROM treasuria_key");
				while ($row = mysql_fetch_array($select_key))
				{
					$key_credits = $row['key_credits'];
					$key_id = $row['key_id'];
					
					if($key_id=='1')
					{
						$item_qty = 5;
					}
					else if($key_id=='2')
					{
						$item_qty = 1;
					}
					else
					{
						$item_qty = 0;
					}
					$query_free_key = mysql_query("INSERT INTO user_credits (user_id, credits, item_id, item_qty, created_at) VALUES ('$last_inserted_id', '$key_credits', '$key_id', '$item_qty', '$datetime')");
					
				}
				
				$verification_link = get_base_url() ."/keyvalidate.php?email=".$reg_username."&key=".$reg_key;
				if($query_insert_new_user AND $query_free_key)
				{
					$from = "jasonjavier06@gmail.com";
					$replyTo= "jasonjavier06@gmail.com";
					$subject = "Treasuria Verification Email";
					$userFirstName = $reg_username;
					$userEmail = $_SESSION["u_username"];
					
					$body = "Hi ".$userFirstName."<br><br>";
					$body = "Verification Code: ".$verification_link;
					$body = eregi_replace("[\]",'',$body);
					
					if (sentEmail($from, $replyTo, $subject, $userEmail, $userFirstName, $body)) {
							header('Location: register.php?verify=sentemail');
					}
					
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