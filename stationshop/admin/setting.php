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

<?
if(isset($_POST['old']))
{
	if($passworda == $_POST['old'])
	{
		$newpassword = mysql_real_escape_string($_POST['new']);
		$renewpassword = mysql_real_escape_string($_POST['renew']);
		if($newpassword == $renewpassword)
		{
			$sql = mysql_query("UPDATE admin SET password='$newpassword' WHERE id='$managerIDa'");
			
			echo "<script language=javascript> alert(' Password Updated Successfully ') </script>";
			$_SESSION["passworda"]=$newpassword;
	echo "<script>window.location = 'index.php';</script>";
			}
		}
		else
		{
			echo "<script language=javascript> alert(' Incorrect password please reenter the password') </script>";
	echo "<script>window.location = 'setting.php';</script>";
			}
}


?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
    <link  href="css/admin.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div id="main">
        <div id="header">
            <a href="index.php" class="logo"><img src="img/logo.png" width="183" height="36" alt="" /></a>
            <ul id="top-navigation">
                <li><a href="index.php">Users</a></li>
                <li><a href="order.php">Orders</a></li>
                <li><a href="inventory_list.php">Inventory</a></li>
                <li><a href="querysolved.php">User Query</a></li>
                <li><a href="employeedetail.php">Employee Details</a></li>
                <li><a href="add.php">Add New Employee</a></li>
                <li><a href="logout.php">logout</a></li>
                <li><a href="setting.php" class="active"><? echo "Hello ".$managera; ?></a></li>
            </ul>
        </div>
        <div id="middle">
            <div id="left-column">
                <h3>Description</h3>
                <ul class="nav">
                    <li><center>This page deals with changing your login password</center></li>
                    
                </ul>
                
            </div>
          <div id="center-column">
            <div class="top-bar">
                   <h1>Edit</h1>
            </div>       
                   
                <div id="center-column2">
                <hr />
                <center >
                  <a name="inventoryForm" id="inventoryForm"></a>
                </center>
                <center >
                  <h3> &darr; Edit Your Password &darr; </h3>
                </center>
                <form action="setting.php" enctype="multipart/form-data" name="myForm" id="myform" method="post">
    <table width="90%" border="0" cellspacing="0" cellpadding="6">
    	 <tr>
        <td width="20%" align="right">User-id</td>
        <td width="40%"><label>
          <? echo $managera; ?>
        </label></td>
      </tr>
      <tr>
        <td width="20%" align="right">Old Passord</td>
        <td width="40%"><label>
          <input type="password" id="old" name="old" />
        </label></td>
      </tr>
      <tr>
        <td width="20%" align="right">New Password</td>
        <td width="40%"><label>
         <input type="password" id="new" name="new" />
        </label></td>
      </tr>
      <tr>
        <td width="20%" align="right">Retype New Password</td>
        <td width="40%"><label>
         <input type="password" id="renew" name="renew" />
        </label></td>
      </tr>
     <tr>
        <td>&nbsp;</td>
        <td><label>
          <input type="submit" name="button" id="button" value="Change Password" />
        </label></td>
      </tr>
    </table>
    </form>
              </div>

			</div>
		</div>
		
                    
                </div>
          </div>
            
        </div>
        <div id="footer"><p>Developed by <a href="https://www.facebook.com/mohithamgaonkar">Mohit Amgaonkar </a> 2012. </div>
    </div>
</body>
</html>