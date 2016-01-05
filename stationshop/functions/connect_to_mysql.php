<?php  

// Place db host name. Sometimes "localhost" but  
// sometimes looks like this: >>      ???mysql??.someserver.net 
$db_host = "localhost"; 
// Place the username for the MySQL database here 
$db_username = "root";  
// Place the password for the MySQL database here 
$db_pass = "";  
// Place the name for the MySQL database here 
$db_name = "mohit_ecs"; 

// Run the actual connection here  
mysql_connect("$db_host","$db_username","$db_pass") or die ("could not connect to mysql");
mysql_select_db("$db_name") or die ("no database");     

//for email

 $from = "StationShop <mohit@aimorigami.com>";
 require_once "Mail.php";
 
 
 $host = "localhost";
 $username_email = "mohit@aimorigami.com";
 $password_email = "mohit12345";
 
 $site_url_address="www.theindiablogs.com"
?>