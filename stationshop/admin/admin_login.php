<?php 
session_start();
if (isset($_SESSION["managera"])) {
    header("location:index.php"); 
    exit();
}
?>
<?php 
// Parse the log in form if the user has filled it out and pressed "Log In"
if (isset($_POST["username"]) && isset($_POST["password"])) {

	$managera = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["username"]); // filter everything but numbers and letters
    $passworda = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password"]); // filter everything but numbers and letters
    // Connect to the MySQL database  
   include "../functions/connect_to_mysql.php";
    $sql = mysql_query("SELECT id FROM admin WHERE username='$managera' AND password='$passworda' LIMIT 1"); // query the person
    // ------- MAKE SURE PERSON EXISTS IN DATABASE ---------
    $existCount = mysql_num_rows($sql); // count the row nums
    if ($existCount == 1) { // evaluate the count
	     while($row = mysql_fetch_array($sql)){ 
             $id = $row["id"];
		 }
		 $_SESSION["ida"] = $id;
		 $_SESSION["managera"] = $managera;
		 $_SESSION["passworda"] = $passworda;
		 header("location:index.php");
         exit();
    } else {
		echo "<script language=javascript> alert(' The Information you have entered is Incorrect!!!! ') </script>";
	echo "<script>window.location = 'index.php';</script>";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
    <link  href="css/admin.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div id="main">
        <div id="header">
        <a href="#" class="logo"><img src="img/logo.png" width="177" height="28" alt="" /></a></div>
        <div id="middle">
          <div id="center-column">
              <div class="top-bar">
                  <h1>Please Log In To Manage the StationShop</h1>
            </div>
               
            <p>&nbsp; </p>
               <p>&nbsp;</p>
               <div align="left" style="margin-left:24px;">
    
      <form id="form1" name="form1" method="post" action="admin_login.php">
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