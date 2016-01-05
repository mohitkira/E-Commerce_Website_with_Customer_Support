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
//error reporing
error_reporting(E_ALL);
ini_set('display_errors','1');
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
			 $resolved_on = $row["resolved_on"];
			 
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
                <li><a href="querysolved.php" class="active">User Query</a></li>
                <li><a href="employeedetail.php">Employee Details</a></li>
                <li><a href="add.php">Add New Employee</a></li>
                <li><a href="logout.php">logout</a></li>
                <li><a href="setting.php"><? echo "Hello ".$managera; ?></a></li>
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
        <td>
       <? echo $status?></td>
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
                    <tr>
                      <td align="right">Date Query Resolved </td>
                      <td><?php echo $resolved_on   ?></td>
                    </tr>
                      
                  </table>
                
              </div>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
          </div>
          <p>&nbsp;</p>
          <div id="footer"><p>Developed by <a href="https://www.facebook.com/mohithamgaonkar">Mohit Amgaonkar </a> 2012. </div>
    </div>
</body>
</html>