<?php

class databaseconnect {
	function __construct()
	{
		

	}
	
	public function dbconnect()
	{
		$username = "root";
		$password = "";
		$hostname = "localhost";
		$db_name = "treasure";
		
		$dbhandle = mysql_connect($hostname, $username, $password) 
		  or die("Unable to connect to MySQL");
		//echo "Connected to MySQL<br>";

		$selected = mysql_select_db($db_name, $dbhandle) or die("Could not select treasure");
	}
	public function dbcloseconnect()
	{
		mysql_close($dbhandle);	
	}
}

?>