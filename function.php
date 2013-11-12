<?php
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


/* built in function */

function getTable($tbName, $id, $limit){
	$query = "SELECT * FROM " . $tbName  ." WHERE id = '$id'";
	$result = mysql_query($query);
	if (mysql_num_rows($result) > 0){
		$row = mysql_fetch_array($result);
		
		return $row;
	}
}



/* end built in function */
	
	
function getUserId($username, $pass){

	$username = $username;
	$password = md5($pass);
	$result = mysql_query("SELECT user_id FROM users WHERE email='$username' AND password = '$pass' LIMIT 1");
	if (mysql_num_rows($result) > 0){
		$row = mysql_fetch_array($result);
		
		return $row['user_id'];
	}
	
	
}


function displayCartList($id){
	$arr = array();
	$result = mysql_query("SELECT * FROM treasuria_key WHERE key_uniq = '$id' LIMIT 1");
	if (mysql_num_rows($result) > 0){

		while (	$row = mysql_fetch_array($result)){
			$arr[] = array(
				'key_img' => $row['key_img'],
				'key_credits' => $row['key_credits'],
				'key_name' => $row['key_name'],
				'price' => $row['key_price'],
				'key_uniq' => $row['key_uniq']

			);	
		}

	}
	
	return $arr;
}

function getCreditsTotal($item_id, $user_id){
	$arr = array();
	$result = mysql_query("SELECT SUM(item_qty) AS itemTotal FROM user_credits WHERE item_id = '$item_id' AND user_id = '$user_id' GROUP BY item_id, user_id");
	$num_rows = mysql_num_rows($result);
	if($num_rows>0)
	{
		$row = mysql_fetch_array($result);
		
		return $row['itemTotal'];
	}
	
}


function getTableData($tableName, $conditon){
	
	$display = 'Select *  FROM '. $tableName . ' WHERE ' .  $conditon;
	$query = mysql_query($display);
	$num_rows = mysql_num_rows($query);
	if($num_rows>0)
	{
		$row = mysql_fetch_array($query);
		
		return $row;
	}else {
		$err = array();
		$err['error'] = true;
			
		return 	$err;
	}

}

function getCredits($id){
	
	$display = "Select SUM(credits) AS total From user_credits WHERE user_id = '$id'";
	$query = mysql_query($display);
	$num_rows = mysql_num_rows($query);
	if($num_rows>0)
	{
		$row = mysql_fetch_array($query);
		
		return $row['total'];
	}else {
		$err = array();
		$err['error'] = true;
			
		return 	$err;
	}

}

function getPoints($id){
	
	$display = "Select * From user_points WHERE user_id = '$id'";
	$query = mysql_query($display);
	$num_rows = mysql_num_rows($query);
	if($num_rows>0)
	{
		$row = mysql_fetch_array($query);
		
		return $row['points'];
	}else {
		$err = array();
		$err['error'] = true;
			
		return 	$err;
	}

}

function getGalleryPoints($id){
	
	$display = "Select prize_credits From treasuria_gallery where prize_id = '$id'";
	$query = mysql_query($display);
	$num_rows = mysql_num_rows($query);
	if($num_rows>0)
	{
		$row = mysql_fetch_array($query);
		
		return $row['prize_credits'];
	}else {
		$err = array();
		$err['error'] = true;
			
		return 	$err;
	}

}




function getItemID($id){
	$result = mysql_query("SELECT key_id FROM treasuria_key WHERE key_uniq = '$id' LIMIT 1");
	if (mysql_num_rows($result) > 0){
		$row = mysql_fetch_array($result);
		
		return $row['key_id'];
	}
	
}

function getPaypalItem(){
	$arr = array();
	$ctr = 0;
	$total = 0;
	if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
		 foreach ($_SESSION['cart'] as $item_id => $qty){
			 $data = displayCartList($item_id);
			 foreach($data as $key=>$item){
				 $price = $item['price'] * $qty;
				 $total += $price; 
				 $arr += array(
				 	 "L_PAYMENTREQUEST_0_DESC$ctr" => $item['key_name'], //description of the forst product
                 	 "L_PAYMENTREQUEST_0_AMT0$ctr" => $item['price'], //amount first product
                  	 "L_PAYMENTREQUEST_0_QTY0$ctr" => $qty, //qty first product
				 );
				 
				 $ctr++;
			 }
		 }
		 
		 return $arr;
		
	}
	
}

function getPaypalItemTotal(){
	$arr = array();
	$ctr = 0;
	$total = 0;
	$quantity = 0;
	if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
		 foreach ($_SESSION['cart'] as $item_id => $qty){
			 $data = displayCartList($item_id);
			 foreach($data as $key=>$item){
				$price = $item['price'] * $qty ;
				$total += $price;			
			 }
		 }
		 
		 return number_format($total, 2);
		
	}
	
}


function getKeyValue($id){
	$result = mysql_query("SELECT key_credits FROM treasuria_key WHERE key_uniq = '$id' LIMIT 1");
	if (mysql_num_rows($result) > 0){
		$row = mysql_fetch_array($result);
		
		return $row['key_credits'];
	}
	
}



function getMaxTimer(){
	$result = mysql_query("SELECT MAX(id)  FROM round_tb");
	if (mysql_num_rows($result) > 0){
		$row = mysql_fetch_array($result);
		$res = getTable('round_tb', $row[0], 1);
		$roundid = $row[0];
		$result2 = mysql_query("UPDATE round_tb SET time_ctr = time_ctr + 1  WHERE id = '$roundid'");
		if ($result2){
				return mysql_affected_rows();
		}
	
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