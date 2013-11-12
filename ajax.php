<?php 
session_start();
include("db_connect.php");
include("paypal.php");
include("function.php");
$datetime = date('Y-m-d H:i:s');
$databaseconnect = NEW databaseconnect();
$databaseconnect->dbconnect();


$action = (isset($_POST['action'])) ?  $_POST['action'] : '';


$arr = array();

if ($action == 'timer'){

	$date = date('Y-m-d H:i:s', time());
	
	echo json_encode($date);

		
}



?>