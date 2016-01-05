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
                <li><a href="employeedetail.php" class="active">Employee Details</a></li>
                <li><a href="add.php">Add New Employee</a></li>
                <li><a href="logout.php">logout</a></li>
                <li><a href="setting.php" ><? echo "Hello ".$managera; ?></a></li>
            </ul>
        </div>
        <div id="middle">
            <div id="left-column">
                <h3>Description</h3>
                <ul class="nav">
                    <li><center>This page show you user which have purchased the product and also who created account on StationShop</center></li>
                    
                </ul>
                
            </div>
            <div id="center-column">
                <div class="top-bar">
                    
                    <h1>User Information</h1>
                                     
                </div>
              <p>&nbsp;</p>
             
              
              <div >
                    <table width="664" cellpadding="0" cellspacing="0" class="listing">
                        <tr>
                        	<th width="25">ID</th>
                            <th width="150">Name</th>
                            <th width="64">E-mail id.</th>
                            <th width="70">Mobile no.</th>
                            <th width="34">City</th>
                            <th width="43">State</th>
                            <th width="58">Address</th>
                            <th width="110">Last date login</th>
                            <th width="101">Last date logout</th>
                            <th width="101">Employee Department</th>
                        </tr>
                       <?php 
// This block grabs the whole list for viewing
$product_list = "";
$sql = mysql_query("SELECT * FROM sales_login ");
$productCount = mysql_num_rows($sql); // count the output amount
if ($productCount > 0) {
	
	while($row = mysql_fetch_array($sql)){ 
             $id = $row["said"];
			 $name = $row["name"];
			 $email = $row["email"];
			 $mobileno = $row["mobileno"];
			 $city = $row["city"];
			 $state = $row["state"];
			 $address = $row["address"];
			 $last_log_date = strftime("%b %d, %Y", strtotime($row["last_log_date"]));
			 $last_logout_date = strftime("%b %d, %Y", strtotime($row["last_logout_date"]));
			 echo'
			 <tr>
                            <td class="style1">'.$id.'</td>
                            <td><strong>'.$name.'</strong></td>
							<td>'.$email.'</td>
                            <td>'.$mobileno.'</td>
                            <td>'.$city.'</td>
							<td>'.$state.'</td>
							<td>'.$address.'</td>
                            <td><em>'.$last_log_date.'</em></td>
                            <td><em>'.$last_logout_date.'</em></td>
                            <td>Sales</td>
                        </tr>';
			 
    }
} 
?> 
<?php 
// This block grabs the whole list for viewing
$product_list = "";
$sql = mysql_query("SELECT * FROM support_login ");
$productCount = mysql_num_rows($sql); // count the output amount
if ($productCount > 0) {
	
	while($row = mysql_fetch_array($sql)){ 
             $id = $row["sid"];
			 $name = $row["name"];
			 $email = $row["email"];
			 $mobileno = $row["mobileno"];
			 $city = $row["city"];
			 $state = $row["state"];
			 $address = $row["address"];
			 $last_log_date = strftime("%b %d, %Y", strtotime($row["last_log_date"]));
			 $last_logout_date = strftime("%b %d, %Y", strtotime($row["last_logout_date"]));
			 echo'
			 <tr>
                            <td class="style1">'.$id.'</td>
                            <td><strong>'.$name.'</strong></td>
							<td>'.$email.'</td>
                            <td>'.$mobileno.'</td>
                            <td>'.$city.'</td>
							<td>'.$state.'</td>
							<td>'.$address.'</td>
                            <td><em>'.$last_log_date.'</em></td>
                            <td><em>'.$last_logout_date.'</em></td>
                            <td>Support</td>
                        </tr>';
			 
    }
} 
?> 
                        
                    </table>
                    </div>
               
            </div>
            
        </div>
        <div id="footer"><p>Developed by <a href="https://www.facebook.com/mohithamgaonkar">Mohit Amgaonkar </a>  2012. </div>
    </div>
</body>
</html>