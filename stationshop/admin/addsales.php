<?php 
session_start();
if (!isset($_SESSION["managera"])) {
    header("location: admin_login.php"); 
    exit();
}
// Be sure to check that this manager SESSION value is in fact in the database
$managerIDa = preg_replace('#[^0-9]#i', '', $_SESSION["ida"]); // filter everything but numbers and letters
$managera = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["managera"]); // filter everything but numbers and letters
$passworda = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["passworda"]); // filter everything but numbers and letters
// Run mySQL query to be sure that this person is an admin and that their password session var equals the database information
// Connect to the MySQL database  
include "../functions/connect_to_mysql.php"; 
$sql = mysql_query("SELECT * FROM admin WHERE id='$managerIDa' AND username='$managera' AND password='$passworda' LIMIT 1"); // query the person
// ------- MAKE SURE PERSON EXISTS IN DATABASE ---------
$existCount = mysql_num_rows($sql); // count the row nums
if ($existCount == 0) { // evaluate the count
	 echo "Your login session data is not on record in the database.";
     exit();
}
?>
<?php 
// Parse the form data and add inventory item to the system
if (isset($_POST['name'])) {
	$uname = mysql_real_escape_string($_POST['uname']);
	$name = mysql_real_escape_string($_POST['name']);
	$email = mysql_real_escape_string($_POST['email']);
	$mobileno = mysql_real_escape_string($_POST['mobileno']);
	$password = mysql_real_escape_string($_POST['password']);
	$city = mysql_real_escape_string($_POST['city']);
	$state = mysql_real_escape_string($_POST['state']);
	$address = mysql_real_escape_string($_POST['address']);
	$username = "";
	$sql = mysql_query("SELECT * FROM sales_login where username='$uname'");
		while ($row = mysql_fetch_array($sql)) {
			$username = $row["username"];
		}
	if($uname != $username && $password != ""){
	$sql = mysql_query("INSERT INTO sales_login (username, password, name, email, mobileno, city, state, address, last_log_date) 
        VALUES('$uname','$password','$name','$email','$mobileno','$city','$state','$address',now())") or die (mysql_error());
	echo "<script language=javascript> alert(' You have added new support employee Successfully!!!! ') </script>";
	echo "<script>window.location = 'index.php';</script>";
}
else
{
	echo "<script language=javascript> alert(' Username already exist or password field is blank ') </script>";
	echo "<script>window.location = 'addsupport.php';</script>";
	}}
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
            <a href="#" class="logo"><img src="img/logo.png" width="183" height="36" alt="" /></a>
            <ul id="top-navigation">
                <li><a href="index.php">Users</a></li>
                <li><a href="order.php">Orders</a></li>
                <li><a href="inventory_list.php">Inventory</a></li>
                <li><a href="querysolved.php">User Query</a></li>
                <li><a href="employeedetail.php">Employee Details</a></li>
                <li><a href="add.php" class="active">Add New Employee</a></li>
                <li><a href="logout.php">logout</a></li>
                <li><a href="setting.php" ><? echo "Hello ".$managera; ?></a></li>
            </ul>
        </div>
        <div id="middle">
            <div id="left-column">
                <h3>Description</h3>
                <ul class="nav">
                    <li><center>This page Deals with adding new employee to in the department of StationShop.</center></li>
                    
                </ul>
                
            </div>
            <div id="center-column">
                <div class="top-bar">
                    
                    <h1>Add New Support Employee</h1>
                                     
                </div>
              <p>&nbsp;</p>
             
              
              <div >
                   <form action="addsales.php" enctype="multipart/form-data" name="myForm" id="myform" method="post">
                  <table width="90%" border="0" cellspacing="0" cellpadding="6">
                    <tr>
                      <td width="20%" align="right">Name of Employee</td>
                      <td width="80%">
                      <input type="text" name="name" id="name"/></td>
                    </tr>
                    <tr>
                      <td align="right">Email-id</td>
                      <td><label>
                        
                        <input type="text" name="email" id="email" />
                      </label></td>
                    </tr>
                    <tr>
                      <td align="right">Username</td>
                      <td>
                      <input type="text" name="uname" id="uname" /></td>
                    </tr>
                    <tr>
                      <td align="right">Password</td>
                      <td>
                      <input type="password" name="password" id="password" /></td>
                    </tr>
                    <tr>
                      <td align="right">Mobile No.</td>
                      <td>
                      <input type="text" name="mobileno" id="mobileno" /></td>
                    </tr>
                    <tr>
                      <td align="right">City</td>
                      <td>
                      <input type="text" name="city" id="city" /></td>
                    </tr>
                    <tr>
                      <td align="right">State</td>
                      <td>
                      <input type="text" name="state" id="state" /></td>
                    </tr>
                   <tr>
        <td align="right">Address</td>
        <td>
          <textarea name="address" id="address" cols="45" rows="5"></textarea></td>
      </tr>
                    
                   
                    
                      <td>&nbsp;</td>
                      <td><label>
                        
                        <input type="submit" name="button" id="button" value="Make Changes" />
                      </label></td>
                    </tr>
                  </table>
                </form>
                    </div>
               
            </div>
            
        </div>
        <div id="footer"><p>Developed by <a href="https://www.facebook.com/mohithamgaonkar">Mohit Amgaonkar </a> 2012. </div>
    </div>
</body>
</html>