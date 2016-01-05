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
// Delete Item Question to Admin, and Delete Product if they choose
if (isset($_GET['deleteid'])) {
	echo 'Do you really want to delete product with ID of ' . $_GET['deleteid'] . '? <a href="inventory_list.php?yesdelete=' . $_GET['deleteid'] . '">Yes</a> | <a href="inventory_list.php">No</a>';
	exit();
}
if (isset($_GET['yesdelete'])) {
	// remove item from system and delete its picture
	// delete from database
	$id_to_delete = $_GET['yesdelete'];
	$sql = mysql_query("DELETE FROM productmaster WHERE pid='$id_to_delete' LIMIT 1") or die (mysql_error());
	// unlink the image from server
	// Remove The Pic -------------------------------------------
    $pictodelete = ("../images/$id_to_delete.jpg");
    if (file_exists($pictodelete)) {
       		    unlink($pictodelete);
    }
	header("location: inventory_list.php"); 
    exit();
}
?>
 
<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
    <link  href="css/admin.css" rel="stylesheet" type="text/css" />
</head>
<body><div id="main">
        <div id="header">
            <a href="#" class="logo"><img src="img/logo.png" width="183" height="36" alt="" /></a>
            <ul id="top-navigation">
                <li><a href="index.php">Users</a></li>
                <li><a href="order.php">Orders</a></li>
                <li><a href="inventory_list.php" class="active">Inventory</a></li>
                <li><a href="querysolved.php">User Query</a></li>
                <li><a href="employeedetail.php">Employee Details</a></li>
                <li><a href="add.php">Add New Employee</a></li>
                <li><a href="logout.php">logout</a></li>
                <li><a href="setting.php" ><? echo "Hello ".$managera; ?></a></li>
            </ul>
        </div>
        <div id="middle">
            <div id="left-column">
                <h3>Description</h3>
                <ul class="nav">
                    <li><center>This page deals with editing and deleting the existing products in the database i.e. on website</center></li>
                    <li><center>This page also deals with adding the new products in the database i.e. on website. It can be done by clicking on the ADD NEW button.</center></li>
                    
                </ul>              
            </div>
          <div id="center-column">
                <div class="top-bar">
                <a href="new_product.php" class="button">ADD NEW </a>
                  <h1>Inventory List</h1>
                   
                  </div> 
               
                
            <p>&nbsp;</p>
              <p>
              <div class="table">
                    <table class="listing" cellpadding="0" cellspacing="0" border="1">
                        <tr>
                            <th>Product ID</th>
							<th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Manufacturer</th>
                            <th>Model</th>
							<th>Catagory</th>
                            <th>Date Added</th>
                            <th>Edit</th>
							<th>Delete</t>
                         </tr> <?php 
// This block grabs the whole list for viewing
$product_list = "";
$sql = mysql_query("SELECT * FROM productmaster ORDER BY catagory DESC");
$productCount = mysql_num_rows($sql); // count the output amount
if ($productCount > 0) {
	
	
						  
	while($row = mysql_fetch_array($sql)){ 
             $id = $row["pid"];
			 $product_name = $row["product_name"];
			 $price = $row["price"];
			 $quantity = $row["quantity"];
			 $manufacturer = $row["manufacturer"];
			 $model = $row["model"];
			 $catagory = $row["catagory"];
			 $date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));
			 echo'
			 <tr>
                            <td class="style1">'.$id.'</td>
                            <td><strong>'.$product_name.'</strong></td>
							<td>Rs.'.$price.'</td>
                            <td>'.$quantity.'</td>
                            <td>'.$manufacturer.'</td>
                            <td>'.$model.'</td>
							<td>'.$catagory.'</td>
                            <td><em>Added '.$date_added.'</em></td>
                            <td><a href="inventory_edit.php?pid='.$id.'">edit</a></td>
							<td><a href="inventory_list.php?deleteid='.$id.'">delete</a>
                            
                        </tr>';
			 
    }
} else {
	$product_list = "You have no products listed in your store yet";
}
?>

                    </table> 
</div></p>
 </div>
<div id="footer"><p>Developed by <a href="https://www.facebook.com/mohithamgaonkar">Mohit Amgaonkar </a> 2012. </div>
    </div>
        </div>
        
</body>
</html>