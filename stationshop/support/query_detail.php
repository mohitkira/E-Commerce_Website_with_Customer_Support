<?php 
session_start();
if (!isset($_SESSION["managersu"])) {
    header("location: support_login.php"); 
    exit();
}
// Be sure to check that this manager SESSION value is in fact in the database
$managerIDsu = preg_replace('#[^0-9]#i', '', $_SESSION["idsu"]); // filter everything but numbers and letters
$managersu = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["managersu"]); // filter everything but numbers and letters
$passwordsu = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["passwordsu"]); // filter everything but numbers and letters
// Run mySQL query to be sure that this person is an admin and that their password session var equals the database information
// Connect to the MySQL database  
include "../functions/connect_to_mysql.php"; 
$sql = mysql_query("SELECT * FROM support_login WHERE sid='$managerIDsu' AND username='$managersu' AND password='$passwordsu' LIMIT 1"); // query the person
// ------- MAKE SURE PERSON EXISTS IN DATABASE ---------
$existCount = mysql_num_rows($sql); // count the row nums
if ($existCount == 0) { // evaluate the count
	 echo "Your login session data is not on record in the database.";
     exit();
}
?>
<?
//error reporing
error_reporting(E_ALL);
ini_set('display_errors','1');
?>
 <?php 
// Parse the form data and add inventory item to the system
if (isset($_POST['status'])) {
	$pid = mysql_real_escape_string($_POST['thisID']);
	$status = mysql_real_escape_string($_POST['status']);
	
	// See if that product name is an identical match to another product in the system
	$sql = mysql_query("UPDATE support_table SET status='$status', resolved_on=CURDATE() WHERE suid='$pid'");
   
	
   echo "<script>window.location = 'index.php';</script>";
    exit();
}
?>
<?php 
// Gather this product's full information for inserting automatically into the edit form below on page
if (isset($_GET['pid'])) {
	$targetID = $_GET['pid'];
    $sql = mysql_query("SELECT * FROM support_table WHERE suid='$targetID' LIMIT 1");
    $productCount = mysql_num_rows($sql); // count the output amount
    if ($productCount > 0) {
	    while($row = mysql_fetch_array($sql)){ 
             
			 $name = $row["name"];
			 $email = $row["email"];
			 $productname = $row["productname"];
			 $query = $row["query"];
			
			$status = $row["status"];
			 
			 
			 $mobileno = $row["mobileno"];
			 $complain_date = strftime("%b %d, %Y", strtotime($row["complain_date"]));
			 
        }
    } else {
	    echo "Sorry this item does not exist in database.";
		exit();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sales</title>
        <link  href="css/admin.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div id="main">
        <div id="header">
            <a href="#" class="logo"><img src="img/logo.png" width="183" height="36" alt="" /></a>
            
                <ul id="top-navigation">
                <li><a href="index.php" class="active">New Query</a></li>
                <li><a href="querysolved.php">Old Query</a></li>
                <li><a href="logout.php">logout</a></li>
                <li><a href="setting.php"><? echo "Hello ".$managersu; ?></a></li>
            </ul>
        </div>
        <div id="middle">
            <div id="left-column">
                <h3>Header</h3>
                <ul class="nav">
                    <li>This page deals with products to be delivered to the customer.</li>
                    
                </ul>
                
            </div>
            <div id="center-column">
                <div class="top-bar">
                  <h1>Detail of Customer</h1>
                   
                   
                </div>
                
              <p>&nbsp;</p>
              <p>             </p>
              <div id="center-column2">
                <hr />
                <center >
                  <a name="inventoryForm" id="inventoryForm"></a>
                </center>
                <center >
                  <h3> &darr; Here is Detail of Customer &darr; </h3>
                </center>
                <form action="query_detail.php" enctype="multipart/form-data" name="myForm" id="myform" method="post">
                  <table width="90%" border="0" cellspacing="0" cellpadding="6">
                    <tr>
                      <td width="20%" align="right">Name of Customer</td>
                      <td width="80%"><?php echo $name   ?></td>
                    </tr>
                    <tr>
                      <td align="right">Email-id</td>
                      <td><label>
                        <?php echo $email; ?>
                      </label></td>
                    </tr>
                    <tr>
                      <td align="right">Mobile No.</td>
                      <td><?php echo $mobileno  ?></td>
                    </tr>
                    <tr>
                      <td align="right">Product Name</td>
                      <td><?php echo $productname   ?></td>
                    </tr>
                   <tr>
        <td align="right">Status</td>
        <td><table width="120" cellspacing="2">
          <tr>
            <td>In Process : </td><td><input type="radio" name="status" id="status" value="in process" <? if($status == "in process"){
			echo "checked";
			}?>></td>
          </tr>
          <tr>
            <td>Done : </td><td><input type="radio" name="status" id="status" value="done" <? if($status == "done"){
			echo "checked";
			}?>></td>
          </tr>
        </table></td>
      </tr>
                    
                    
                    <tr>
                      <td align="right">Complain Date</td>
                      <td><label>
                        <?php echo $complain_date  ?>
                      </label></td>
                    </tr>
                    
                    <tr>
                      <td align="right">Query </td>
                      <td><?php echo $query   ?></td>
                    </tr>
                    
                      <td>&nbsp;</td>
                      <td><label>
                        <input name="thisID" type="hidden" value="<?php echo $targetID; ?>" />
                        <input type="submit" name="button" id="button" value="Make Changes" />
                      </label></td>
                    </tr>
                  </table>
                </form>
              </div>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
          </div>
          <p>&nbsp;</p>
          <div id="footer"><p>Developed by <a href="https://www.facebook.com/mohithamgaonkar">Mohit Amgaonkar </a> 2012. </div>
    </div>
</body>
</html>