<?php 
$arr = array();

function get_base_url()
    {
  
        $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"], 0, 5)) == 'https' ? 'https://' : 'http://';

 
        $path = $_SERVER['PHP_SELF'];

       
        $path_parts = pathinfo($path);
        $directory = $path_parts['dirname'];

        $directory = ($directory == "/") ? "" : $directory;

        $host = $_SERVER['HTTP_HOST'];

        return $protocol . $host . $directory;
}



function getError(){
	$arr['key_error'] = "ERROR: Either Your Account is inactive, not registered or Email Address and Password is Incorrect";
	$arr['verified'] = "SUCCESS: Email Address successfully verified, you gain free credits. You may now login.";
	$arr['sent_verification'] = "SUCCESS: A verification Code was sent to your Email Address, please confirm to continue your login.";
	$arr['email_exist'] = "ERROR: That Email Address has already been registered.";
	$arr['unverified'] = "ERROR: Email Address not verified."; 
	$arr['unactivated'] = "ERROR: Oops! Your account could not be activated. Please recheck the link or contact the system administrator"; 
	
	return $arr;	
	
}

function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function checkUserEmail($tablename, $email){
	global $mysqli;
	$stmt = $mysqli->prepare("SELECT * FROM ". $tablename ." WHERE email = ? LIMIT 1");
	$stmt->bind_param('s', $mysqli->real_escape_string($email));
	$stmt->execute();
	$stmt->store_result();
	return $stmt->num_rows;
}





function escape($data){
	global $mysqli;
	
	return $mysqli->real_escape_string($data);
}

function createSalt()
{
    $string = md5(uniqid(rand(), true));
    return substr($string, 0, 3);
}

function logout()
{
    $_SESSION = array(); //destroy all of the session variables
    session_destroy();
}

function isLoggedIn()
{
    if(isset($_SESSION['valid']) && $_SESSION['valid'])
        return true;
    return false;
}


/* User Query */

function getKeyValue($key_id, $user_id){
	
	global $mysqli;
	$stmt = $mysqli->prepare("SELECT item_qty FROM user_credits  WHERE item_id = ? AND  user_id = ? LIMIT 1");
	$stmt->bind_param('ii', escape($key_id), escape($user_id));
	$stmt->execute();
	$stmt->store_result();
	if ($stmt->num_rows > 0) {
			$stmt->bind_result($item_qty);
			$stmt->fetch();
			
			return $item_qty;
	}else {
		return 0;
	}
	
}

function getCreditsValue($user_id){
	
	global $mysqli;
	$stmt = $mysqli->prepare("SELECT points FROM user_points  WHERE  user_id = ? LIMIT 1");
	$stmt->bind_param('i', escape($user_id));
	$stmt->execute();
	$stmt->store_result();
	if ($stmt->num_rows > 0) {
			$stmt->bind_result($points);
			$stmt->fetch();
			
			return $points;
	}else {
		return 0;
	}
	
}

function getAllKey($tablename, $id = NULL){
	global $mysqli;
	if ($id != NULL) {
		$stmt = $mysqli->prepare("SELECT key_id, key_img, key_credits, key_name, key_price FROM ". $tablename . " WHERE key_id = ?");
		$stmt->bind_param('i', escape($id));
	}else {
		$stmt = $mysqli->prepare("SELECT key_id, key_img, key_credits, key_name, key_price FROM ". $tablename);
	}
	
	$stmt->execute();
	$stmt->store_result();

	$stmt->bind_result($keyid, $keyimg, $key_credits, $key_name, $key_price);
	if ($stmt->num_rows > 0) {
		while($stmt->fetch()){
			$arr[] = array($keyid, $keyimg, $key_credits, $key_name, number_format($key_price, 2));
	
		}
	}
	
	return  $arr;
}

function getCartTotal(){
	if(isset($_SESSION['cart']) and is_array($_SESSION['cart']))
		{
			$totalquantity = 0;
			foreach($_SESSION['cart'] AS $keyid => $itemQuantity)
			{
				$totalquantity = $totalquantity + $itemQuantity;
			}
	}else
		{
			$totalquantity = 0;
	}
	
	return $totalquantity;	
}


function getPaypalItemTotal(){
	$arr = array();
	$ctr = 0;
	$total = 0;
	$quantity = 0;
	if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
		 foreach ($_SESSION['cart'] as $item_id => $qty){
			$data = getAllKey('treasuria_key', $item_id);
			 foreach($data as $key=>$item){
				$price = $item[4] * $qty ;
				$total += $price;			
			 }
		 }
		 
		 return number_format($total, 2);
		
	}
	
}


function getPaypalItem(){
	$arr = array();
	$ctr = 0;
	$total = 0;
	if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
		 foreach ($_SESSION['cart'] as $item_id => $qty){
			 $data = getAllKey('treasuria_key', $item_id);
			 foreach($data as $key=>$item){
				 $price = $item[4] * $qty;
				 $total += $price; 
				 $arr += array(
				 	 "L_PAYMENTREQUEST_0_DESC$ctr" => $item[3], //description of the forst product
                 	 "L_PAYMENTREQUEST_0_AMT0$ctr" => $item[4], //amount first product
                  	 "L_PAYMENTREQUEST_0_QTY0$ctr" => $qty, //qty first product
				 );
				 
				 $ctr++;
			 }
		 }
		 
		 return $arr;
		
	}
	
}

function countTableCredits($userid, $itemid){
	global $mysqli;
	$stmt = $mysqli->prepare("SELECT * FROM user_credits WHERE user_id = ? AND item_id = ? LIMIT 1");
	$stmt->bind_param('ii', escape($userid), escape($itemid));
	$stmt->execute();
	$stmt->store_result();
	return $stmt->num_rows;
}

function getPoints($userid){
	global $mysqli;
	$stmt = $mysqli->prepare("SELECT points FROM user_points WHERE user_id = ?");
	$stmt->bind_param('i', escape($userid));
	$stmt->execute();
	$stmt->store_result();

	if($stmt->num_rows > 0)
	{
		$stmt->bind_result($points);	
		$stmt->fetch();
		
		return $points;
	}else {
		return 	false;
	}

}

function reviewKeys($userid, $itemid){
	global $mysqli;
	$stmt = $mysqli->prepare("Select item_qty From user_credits WHERE user_id = ? AND item_id = ?");
	$stmt->bind_param('ii', escape($userid), escape($itemid));
	$stmt->execute();
	$stmt->store_result();
	
	if($stmt->num_rows > 0)
	{
		$stmt->bind_result($item_qty);	
		$stmt->fetch();
		if ($item_qty){
			return true;
		}else {
			return false;	
		}
		
		
	}

}

function checkDaily($user_id){
   global $mysqli;
   $stmt = $mysqli->prepare("SELECT * FROM daily_challenge WHERE user_id = ? AND DATE(created_date) = CURDATE() ");
   $stmt->bind_param('i',  escape($user_id));
   $stmt->execute();
   $stmt->store_result();
   return $stmt->num_rows;

}

function insertDaily($user_id, $box, $result){
	global $mysqli;
	$stmt = $mysqli->prepare("Insert INTO daily_challenge (boxid, result, user_id, created_date) VALUES(?, ?, ?, NOW())");
	$stmt->bind_param('sss', escape($box), escape($result), escape($user_id));
	$stmt->execute();
    

   if ($mysqli->affected_rows == 1)
	{
		return true;
	}else {
		return false;
	}

}

function UpdatePoints($points, $userid){
	global $mysqli;
	$stmt = $mysqli->prepare("UPDATE user_points SET points  = (points + ?)  WHERE user_id = ?");
	$stmt->bind_param('ss', escape($points), escape($userid));
	$stmt->execute();			
	if ($mysqli->affected_rows == 1){
			return true;
	}else {
			return false;
	}
	
}

function getGalleryPoints($id){
   global $mysqli;
   $stmt = $mysqli->prepare("Select prize_credits From treasuria_gallery where prize_id = ?");
   $stmt->bind_param('i', escape($id));
   $stmt->execute();
   $stmt->store_result();
   $stmt->bind_result($prize_credits);
   if ($stmt->num_rows){
	   $stmt->fetch();
	   return $prize_credits;
   }
	
	

}

function sentEmail($from, $replyTo, $subject, $userEmail, $userFirstName, $body){

	error_reporting(E_STRICT);

	date_default_timezone_set('America/Toronto');

	require_once('assets/phpmailer/class.phpmailer.php');
	//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

	$mail  = new PHPMailer();

	//$body             = file_get_contents('contents.html');
	
	
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

	$mail->SetFrom($from, 'Treasuria');

	$mail->AddReplyTo($replyTo,"Treasuria");

	$mail->Subject    = $subject;

	$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

	$mail->MsgHTML($body);

	//$address = "desireealviento@synergy88studios.com";

	$mail->AddAddress($userEmail, $userFirstName);

	//$mail->AddAttachment("images/phpmailer.gif");      // attachment
	//$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment

	if(!$mail->Send()) {
	  echo "Mailer Error: " . $mail->ErrorInfo;
	} else {
	  return true;
	}	
	
}





?>