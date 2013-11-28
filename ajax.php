<?php 
session_start();
include 'config.php';
include 'function.php';

$action = (isset($_POST['action'])) ?  $_POST['action'] : '';
$userid = (isset($_POST['userid'])) ?  $_POST['userid'] : '';
$itemid = (isset($_POST['itemid'])) ?  $_POST['itemid'] : '';
$result = (isset($_POST['result'])) ?  $_POST['result'] : '';
$box = (isset($_POST['box'])) ?  $_POST['box'] : '';
$username = (isset($_POST['username'])) ?  $_POST['username'] : '';


$arr = array();
$response = array();
switch($action) {
	case "auction" :
		if (reviewKeys($userid, $itemid)){
			$response["username"] = $username;
			$response["user_id"] = $userid;
			$response["box"] = $box;
			$response["itemid"] = $itemid;
			$key = getAllKey('treasuria_key', $itemid);
			$response["key_price"] = $key[0][2] ;
			$response["success"] = 1;
   		   	$response["message"] = "You have successfully inserted an Item";
		}else {
			$response["success"] = 0;
   		    $response["message"] = "You don't have that Key";
		}
		
		echo json_encode($response);
	break;	
	
	case "daily" : 
		$checkDaily = checkDaily($userid);
		
		if ($checkDaily == 0){
			if (insertDaily($userid, $box, $result)){
				if (UpdatePoints($result, $userid)){
					$response["success"] = 1;
					$response["box"] = $box;
					$response["result"] = $result;
					$response["message"] = 'You Won : x' . $result . ' Coin';
				}else {
					$response["success"] = 0;
					$response["message"] = 'You\'re Next Daily chalenge will be after 24 Hours';
				}
				
			}else {
				$response["success"] = 0;
				$response["message"] = 'You\'re Next Daily chalenge will be after 24 Hours';
			}
		}else {
			$response["success"] = 0;
			$response["message"] = 'You\'re Next Daily chalenge will be after 24 Hours';
			
		}
		
		echo json_encode($response);
	break;
	
}

?>