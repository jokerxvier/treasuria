<?php

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


function getTableData($tableName, $conditon){
	
	$display = 'Select * FROM '. $tableName . ' WHERE ' .  $conditon;
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

function getPaypalItem(){
	$arr = array();
	$ctr = 0;
	if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
		 foreach ($_SESSION['cart'] as $item_id => $qty){
			 $data = displayCartList($item_id);
			 foreach($data as $key=>$item){
				 $price = $item['price'] * $qty;
				 $arr = array(
				 	 "L_PAYMENTREQUEST_0_DESC$ctr" => $item['key_name'], //description of the forst product
                 	 "L_PAYMENTREQUEST_0_AMT0$ctr" => $price, //amount first product
                  	 "L_PAYMENTREQUEST_0_QTY0$ctr" => $qty, //qty first product
				 );
				 
				 $ctr++;
			 }
		 }
		 
		 return $arr;
		
	}
	
}



?>