<?php
include("db_connect.php"); 
$databaseconnect = NEW databaseconnect();
$databaseconnect->dbconnect();
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
?>