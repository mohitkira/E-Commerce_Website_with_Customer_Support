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

<!DOCTYPE html>
<html>
<head>
    <title>Support</title>
    
    <link  href="css/admin.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div id="main">
        <div id="header">
            <a href="index.php" class="logo"><img src="img/logo.png" width="183" height="36" alt="" /></a>
            <ul id="top-navigation">
                <li><a href="index.php" class="active">New Query</a></li>
                <li><a href="querysolved.php">Old Query</a></li>
                <li><a href="logout.php">logout</a></li>
                <li><a href="setting.php"><? echo "Hello ".$managersu; ?></a></li>
            </ul>
        </div>
        <div id="middle">
            <div id="left-column">
                <h3>Description</h3>
                <ul class="nav">
                    <li><center>This page deals with products to be delivered to the customer.</center></li>
                    
                </ul>
                
            </div>
            <div id="center-column">
                <div class="top-bar">
                    
                    <h1>Product to deliver</h1>
                                     
                </div>
              <p>&nbsp;</p>
             
              
              <div >
                    <table width="664" cellpadding="0" cellspacing="0" class="listing">
                        <tr>
                        	<th width="25">ID</th>
                            <th width="150">Name of Customer</th>
                            <th width="64">E-mail id.</th>
                            <th width="70">Mobile no.</th>
                            <th width="25">Product Name</th>
                            <th width="34">Complain Date</th>
                            
                        </tr>
                        
                       <?php 
// This block grabs the whole list for viewing
$product_list = "";
$sql = mysql_query("SELECT * FROM support_table WHERE status = 'in process' ORDER BY complain_date DESC");
$productCount = mysql_num_rows($sql); // count the output amount
if ($productCount > 0) {
	
	
						  
	while($row = mysql_fetch_array($sql)){ 
             $id = $row["suid"];
			 $name = $row["name"];
			 $email = $row["email"];
			 $mobileno = $row["mobileno"];
			 $product = $row["productname"];
			 $date_added = strftime("%b %d, %Y", strtotime($row["complain_date"]));
			$product_list .='
			 <tr>
                            <td class="style1">'.$id.'</td>
                            <td><strong><a href="query_detail.php?pid='.$id.'">'.$name.'</a></strong></td>
							<td>'.$email.'</td>
                            <td>'.$mobileno.'</td>
                            <td>'.$product.'</td>
							<td><em>'.$date_added.'</em></td>
                            
							
                            
                        </tr>';
			 
    }
} else {
	$product_list = "<h2>You have no products to deliver</h2>";
}
?>
                       <? echo $product_list; ?>
                    </table>
                    </div>
               
            </div>
            
        </div>
        <div id="footer"><p>Developed by <a href="https://www.facebook.com/mohithamgaonkar">Mohit Amgaonkar </a> 2012. </div>
    </div>
</body>
</html>