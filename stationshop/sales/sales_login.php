<?php 
session_start();
if (isset($_SESSION["managersa"])) {
    header("location: index.php"); 
    exit();
}
?>
<?php 
// Parse the log in form if the user has filled it out and pressed "Log In"
if (isset($_POST["username"]) && isset($_POST["password"])) {

	$managersa = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["username"]); // filter everything but numbers and letters
    $passwordsa = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password"]); // filter everything but numbers and letters
    // Connect to the MySQL database  
   include "../functions/connect_to_mysql.php";
    $sql = mysql_query("SELECT said FROM sales_login WHERE username='$managersa' AND password='$passwordsa' LIMIT 1"); // query the person
    // ------- MAKE SURE PERSON EXISTS IN DATABASE ---------
    $existCount = mysql_num_rows($sql); // count the row nums
    if ($existCount == 1) { // evaluate the count
	     while($row = mysql_fetch_array($sql)){ 
             $idsa = $row["said"];
		 }
		 $_SESSION["idsa"] = $idsa;
		 $_SESSION["managersa"] = $managersa;
		 $_SESSION["passwordsa"] = $passwordsa;
		 $sql = mysql_query("UPDATE sales_login SET last_log_date = NOW() WHERE said ='$idsa'");
		 header("location: index.php");
         exit();
    } else {
		echo "<script language=javascript> alert(' Incorrect information please enter correct username password') </script>";
	echo "<script>window.location = 'sales_login.php';</script>";
		exit();
	}
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sales</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
    <link  href="css/admin.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div id="main">
        <div id="header">
        <a href="index.php" class="logo"><img src="img/logo.png" width="177" height="28" alt="" /></a></div>
        <div id="middle">
          <div id="center-column">
              <div class="top-bar">
                  <h1>Login For Sales Information</h1>
            </div>
               
            <p>&nbsp; </p>
               <p>&nbsp;</p>
               <div align="left" style="margin-left:24px;">
    
      <form id="form1" name="form1" method="post" action="sales_login.php">
        <h3>User Name:</h3><br />
          <input name="username" type="text" id="username" size="40" />
        <br /><br />
       <h3>Password:</h3><br />
       <input name="password" type="password" id="password" size="40" />
       <br />
       <br />
       <br />
       
         <input type="submit" name="button" id="button" value="Log In" />
       
      </form>
      <p>&nbsp; </p>
    </div>
         <p>&nbsp; </p> 
        <p>&nbsp; </p>   
        <p>&nbsp; </p>
        <p>&nbsp; </p> 
         <p>&nbsp; </p> 
          <p>&nbsp; </p> 
           <p>&nbsp; </p> 
            <p>&nbsp; </p> 
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>Developed by <a href="https://www.facebook.com/mohithamgaonkar">Mohit Amgaonkar </a> 2012.</div>
    
    </div>
</body>
</html>