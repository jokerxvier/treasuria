<?php

		$db_host = "localhost";
		$db_user = "root";
		$db_pass = "";
		$db_dbname = "treasure";

		$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_dbname);
		if(mysqli_connect_errno()){
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();
		}

?>