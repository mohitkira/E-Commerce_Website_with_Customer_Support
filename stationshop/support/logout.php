<?php 
	session_start();
	
	include "../functions/connect_to_mysql.php"; 
	$managerIDsu = preg_replace('#[^0-9]#i', '', $_SESSION["idsu"]);
	$sql = mysql_query("UPDATE support_login SET last_logout_date = NOW() WHERE sid ='$managerIDsu'");
	
	session_destroy();
	
	echo "<script language=javascript> alert(' You have been logged out Successfully ') </script>";
	echo "<script>window.location = 'index.php';</script>";


?>