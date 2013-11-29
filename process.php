<?php
session_start(); 
include 'config.php';
include("paypal.php");
include 'function.php';
$action = (isset($_POST['action'])) ? $_POST['action'] : $_GET['action'];
$fname = (isset($_POST['fname'])) ? test_input($_POST['fname']) : '';
$pass = (isset($_POST['pass'])) ? test_input($_POST['pass']) : '';
$lname = (isset($_POST['lname'])) ? test_input($_POST['lname']) : '';
$email= (isset($_POST['email'])) ? test_input($_POST['email']) : '';
$gender = (isset($_POST['gender'])) ? test_input($_POST['gender']) : '';
$res = array();
$userid  = (isset($_SESSION['user_id'])) ?  $_SESSION['user_id'] : '';

//for profile edit
$address = (isset($_POST['address'])) ? test_input($_POST['address']) : '';
$city = (isset($_POST['city'])) ? test_input($_POST['city']) : '';
$country = (isset($_POST['country'])) ? test_input($_POST['country']) : '';
$phone = (isset($_POST['phone'])) ? test_input($_POST['phone']) : '';
$newpass = (isset($_POST['newpass'])) ? test_input($_POST['newpass']) : '';
$confirmnewpass = (isset($_POST['confirmnewpass'])) ? test_input($_POST['confirmnewpass']) : '';

switch ($action) {
		
	case "register" :
	$hash = hash('sha256', $pass);
	$salt = createSalt();
	$hash = hash('sha256', $salt . $hash);
	$reg_key = md5(uniqid(rand()));
	
	if (checkUserEmail('users', $email) == 0) {
		$stmt = $mysqli->prepare("INSERT INTO users (email, firstname, lastname, password, gender, salt, key_email, created_at) VALUES (?,?,?,?,?, ?, ?, NOW())");
		$stmt->bind_param('sssssss', escape($email), escape($fname), escape($lname), $hash, escape($gender), $salt, $reg_key);
		$stmt->execute();

		
		if ($mysqli->affected_rows == 1) {
			$random = md5(uniqid(rand()));
			$verification_link = get_base_url() ."/keyvalidate.php?email=".$email."&key=".$reg_key."&".$random;
			
			$from = "desiree.alviento@gmail.com";
			$replyTo= "desiree.alviento@gmail.com";
			$subject = "Treasuria Verification Email";
			$userFirstName = $fname;
			//$userEmail = $email;
			$userEmail = "desiree.alviento@gmail.com";
			
			$body = "Hi ".$userFirstName."<br><br>";
			$body = "Verification Code: ".$verification_link;
			$body = eregi_replace("[\]",'',$body);
			
			
				$display_query = $mysqli->prepare("SELECT user_id FROM users WHERE email = ?");
				$display_query->bind_param('s', escape($email));
				$display_query->execute();
				$display_query->store_result();
				
				if ($display_query->num_rows > 0) {
					$display_query->bind_result($user_id);
					$display_query->fetch();
					$count = 0;
					for ($i = 1; $i <= 2;  $i++){
						$value = ($i == 1) ? 5 : 1;
						$key_query = $mysqli->prepare("INSERT INTO user_credits (user_id, created_at, item_qty, item_id) VALUES (?, NOW(), ?, ?)");	
						$key_query->bind_param('iii', escape($user_id), $value,$i);
						$key_query->execute();
						if ($key_query->affected_rows == 1){
							$count++;
						}
					}
					if ($count == 2){
						if (sentEmail($from, $replyTo, $subject, $userEmail, $userFirstName, $body)){
							$res['success'] = 1;
							$res['message'] = 'You Have Successfully Register an Account, Please check your Email to Verify.';	
						}
						
					}
				}
			
		}
	}else {
		$res['success'] = 0;
		$res['message'] = 'Email Already Taken';	
	}
	
	echo json_encode($res);
	
	
		
	break;
	
	case "login" :

		$stmt = $mysqli->prepare("SELECT firstname, password, salt, email, user_id, key_email FROM users WHERE email = ?");
		$stmt->bind_param('s', escape($email));
		$stmt->execute();
		$stmt->bind_result($firstname, $password, $salt, $email, $user_id, $key_email);
		$stmt->store_result();
		
		if($stmt->num_rows > 0){
			$stmt->fetch();
			$hash = hash('sha256', $salt . hash('sha256', $pass) );
			if ($hash != $password){
				header('Location: login.php');
				$res['message'] = 'ERROR: Either Your Account is inactive, not registered or Email Address and Password is Incorrect';	
			}else {
				if($key_email!=NULL)
				{
					header('Location: login.php?error=unverified');
					
				}
				else
				{
					session_regenerate_id (); //this is a security measure
					$_SESSION['valid'] = 1;
					$_SESSION['username'] = $email;
					$_SESSION['firstname'] = $firstname;
					$_SESSION['user_id'] = $user_id;
					header('Location: index.php');
				}
			}
		}else {
			header('Location: login.php?error=key_error');

		}
	break;
	
	case "edit" :
	//edit profile
		$ses_username = $_SESSION['username'];
		$stmt = $mysqli->prepare("SELECT user_id, password, firstname, lastname, address, city, country, created_at, updated_at, email, key_email, phone, gender, user_type, deleted FROM users WHERE email = ?");
		$stmt->bind_param('s', escape($ses_username));
		$stmt->execute();
		$stmt->store_result();
		
		if($stmt->num_rows > 0){
			$stmt->fetch();
			
			$updateprofile = $mysqli->prepare("UPDATE users SET firstname=?, lastname=?, address=?, city=?, country=?, phone=?, gender=?, updated_at=NOW() WHERE email='$ses_username'");
			$updateprofile->bind_param('sssssis', $fname, $lname, $address, $city, $country, $phone, $gender);
			$updateprofile->execute();
			$updateprofile->store_result();
			
			if($updateprofile)
			{
				header('Location: profile.php?s=success');
			}
		}
		else
		{
		echo "failed";
		}
			
	break;
	
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
		if( isset($_GET['token']) && !empty($_GET['token']) ) { 
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
				   $user_id = $userid;
				   /*$query_insert_login = mysql_query("UPDATE users SET login_date='$datetime' WHERE email='$username' and password='$password'");*/
				   //unset($_SESSION['cart']);
				   //header('Location: cart.php?success=1');
				   $purchasedtotal = getPaypalItemTotal();
				   $total = 0;
				   
					$flag = 0;
				   
				     if ($response['PAYMENTINFO_0_AMT'] == $purchasedtotal){
						 foreach ($_SESSION['cart'] as $item_id => $qty){
							$itemID =  $item_id;
							$credits = getAllKey('treasuria_key', $item_id);
							
							$credTotal =$credits[0][2] * $qty;
							$total += $credTotal;
							
							if (countTableCredits($userid, $item_id) > 0) {
								$stmt = $mysqli->prepare("UPDATE user_credits SET item_qty = (item_qty + ?) WHERE  user_id = ? AND  item_id = ?");
								$stmt->bind_param('iii', escape($qty), escape($user_id), escape($item_id));
								$stmt->execute();
								if ($mysqli->affected_rows == 1) {
									$flag++;
								}
							}else {
								$stmt = $mysqli->prepare("INSERT INTO user_credits (user_id, credits, item_id, item_qty, created_at) VALUES (?,?,?,?, NOW())");
								$stmt->bind_param('iiii', escape($user_id), escape($credTotal), escape($item_id), escape($qty));
								$stmt->execute();
								if ($mysqli->affected_rows == 1) {
									$flag++;
								}
							}
			
					   
				 		  }
						  
						  if (count($_SESSION['cart']) == $flag){
							  unset($_SESSION['cart']);	
							  header('Location: cart.php?success=1');
						  }
						 
						 
					 }

			   }
		}
	
	break;
	
	
	case 'claim':
		$prize = (isset($_GET['prize'])) ? $_GET['prize'] : '' ;
		$points = getPoints($userid);
		
		$galleryPoints = getGalleryPoints($prize);

		if ($points >= $galleryPoints){
			
				$stmt = $mysqli->prepare("Update user_points SET points = (points - ?) WHERE user_id = ? ");
				$stmt->bind_param('ii', escape($galleryPoints), escape($userid));
				$stmt->execute();
				if ($mysqli->affected_rows == 1) {
					/*$insert_query = $mysqli->prepare("INSERT INTO claim_history (user_id, prize_id,  created_at,  status) VALUES (?, ?, NOW(), 1)");
					$insert_query->bind_param('ii', escape($userid), escape($prize));	
					$insert_query->execute();
					if ($insert_query->affected_rows == 1) {
						header('Location: gallery.php?message=1');
					}*/
					
					header('Location: gallery.php?message=1');
				}

		}else {
			header('Location: gallery.php?message=0');
		}
		
	break;
	
	
	
	case "logout" :
		logout();
		header('Location: login.php');
	break;
}