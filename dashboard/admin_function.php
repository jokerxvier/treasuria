<?php

include("../db_connect.php");
$datetime = date('Y-m-d H:i:s');
$databaseconnect = NEW databaseconnect();
$databaseconnect->dbconnect();

function UserCount() {
//ilan lahat ng members
$result_count = mysql_query("SELECT * FROM users");
$count_rows = mysql_num_rows($result_count);
return $count_rows;
}


function UserLoginCount() {
//ilang beses nag login si User


}

function MostPurchasedKey() {
//most purchased key

}

function GalleryItemCount() {
//how many items on gallery

}

function OnlineUserCount() {
//ilang user ang online

}

function UserHighestCredits() {
//user with the highest credits

}

function UserHighestPoints() {
//user with the highest points

}

?>