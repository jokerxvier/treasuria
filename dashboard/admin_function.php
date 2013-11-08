<?php

include("../db_connect.php");
$datetime = date('Y-m-d H:i:s');
$databaseconnect = NEW databaseconnect();
$databaseconnect->dbconnect();

function UserCount() {
//ilan lahat ng members
$result_count = mysql_query("SELECT * FROM users WHERE deleted='0' AND user_type='0'");
$count_rows = mysql_num_rows($result_count);
return $count_rows;
}

function UserPendingCount() {
//ilan lahat ng members na hindi naka-verified
$result_count = mysql_query("SELECT * FROM users WHERE key_email!='' AND deleted='0' AND user_type='0'");
$count_rows = mysql_num_rows($result_count);
return $count_rows;
}

function UserDelete() {
//delete user -- admin / subscribers
$result_count = mysql_query("SELECT * FROM users");
$count_rows = mysql_num_rows($result_count);
return $count_rows;
}

function GalleryItemCount() {
//how many items on gallery
$result_count_items = mysql_query("SELECT * FROM treasuria_gallery WHERE deleted='0'");
$count_items = mysql_num_rows($result_count_items);
return $count_items;
}

function CounterKeys() {
//how many items on gallery
$result_count_items = mysql_query("SELECT * FROM treasuria_key WHERE deleted='0'");
$count_items = mysql_num_rows($result_count_items);
return $count_items;
}


?>