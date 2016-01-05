<?php 
session_start();
if (!isset($_SESSION["managera"])) {
    header("location: admin_login.php"); 
    exit();
}

$managerIDa = preg_replace('#[^0-9]#i', '', $_SESSION["ida"]);
$managera = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["managera"]);
$passworda = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["passworda"]);
include "../functions/connect_to_mysql.php"; 
$sql = mysql_query("SELECT * FROM admin WHERE id='$managerIDa' AND username='$managera' AND password='$passworda' LIMIT 1"); 
$existCount = mysql_num_rows($sql); 
if ($existCount == 0) { 
	 echo "Your login session data is not on record in the database.";
     exit();
}
?>
<?

error_reporting(E_ALL);
ini_set('display_errors','1');
?>
 
<?php 
if (isset($_GET['pid'])) {
	$targetID = $_GET['pid'];
    $sql = mysql_query("SELECT * FROM sales_table WHERE bid='$targetID' LIMIT 1");
    $productCount = mysql_num_rows($sql); 
    if ($productCount > 0) {
	    while($row = mysql_fetch_array($sql)){ 
             
			 $product = $row["product"];
			 $email = $row["email"];
			 $address = $row["address"];
			 $state = $row["state"];
			 $city = $row["city"];
			$status = $row["status"];
			 $country = $row["country"];
			 $fname = $row["fname"];
			 $lname = $row["lname"];
			 $name = $fname.' '.$lname;
			 $quantity = $row["quantity"];
			 $mobileno = $row["mobileno"];
			 $purchased_on = strftime("%b %d, %Y", strtotime($row["purchased_on"]));
			 $delivered_on = strftime("%b %d, %Y", strtotime($row["delivered_on"]));
			 
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
                <li><a href="index.php">Users</a></li>
                <li><a href="order.php" class="active">Orders</a></li>
                <li><a href="inventory_list.php">Inventory</a></li>
                <li><a href="querysolved.php">User Query</a></li>
                <li><a href="employeedetail.php">Employee Details</a></li>
                <li><a href="add.php">Add New Employee</a></li>
                <li><a href="logout.php">logout</a></li>
                <li><a href="setting.php" ><? echo "Hello ".$managera; ?></a></li>
            </ul>
        </div>
        <div id="middle">
            <div id="left-column">
                <h3>Header</h3>
                <ul class="nav">
                    <li> This is the details of customer who got ordered products from StationShop.</li>
                    
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
                      <td align="right">City</td>
                      <td><?php echo $city   ?></td>
                    </tr>
                   <tr>
        <td align="right">Status</td>
        <td><? echo $status?>
           </tr>
                    <tr>
                      <td align="right">State</td>
                      <td><?php echo $state   ?></td>
                    </tr>
                    <tr>
                      <td align="right">Country</td>
                      <td><label>
                        <?php  echo $country  ?>
                      </label></td>
                    </tr>
                    <tr>
                      <td align="right">Purchased On</td>
                      <td><label>
                        <?php echo $purchased_on  ?>
                      </label></td>
                    </tr>
                    <tr>
                      <td align="right">Product Name</td>
                      <td><label>
                        <?php echo $product;  ?>
                      </label></td>
                    </tr>
                    <tr>
                      <td align="right">Address</td>
                      <td><?php echo $address   ?></td>
                    </tr>
                    <tr>
                      <td align="right">Quantity</td>
                      <td><?php echo $quantity   ?></td>
                    </tr>
                    <tr>
                      <td align="right">Delivered On</td>
                      <td><?php echo $delivered_on;   ?></td>
                    </tr>
                    
                      
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