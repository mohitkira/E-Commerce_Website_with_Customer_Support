<?php 

	session_start();
	include "../functions/connect_to_mysql.php"; 
	$managerIDsa = preg_replace('#[^0-9]#i', '', $_SESSION["idsa"]);
	$sql = mysql_query("UPDATE sales_login SET last_logout_date = NOW() WHERE said ='$managerIDsa'");
	session_destroy();
	echo "<script language=javascript> alert(' You have been logged out Successfully ') </script>";
	echo "<script>window.location = 'index.php';</script>";


?>