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
// Parse the form data and add inventory item to the system
if (isset($_POST['product_name'])) {
	
	$pid = mysql_real_escape_string($_POST['thisID']);
    $product_name = mysql_real_escape_string($_POST['product_name']);
	$price = mysql_real_escape_string($_POST['price']);
	$quantity = mysql_real_escape_string($_POST['quantity']);
	$manufacturer = mysql_real_escape_string($_POST['manufacturer']);
	$catagory = mysql_real_escape_string($_POST['catagory']);
	$model = mysql_real_escape_string($_POST['model']);
	$details = mysql_real_escape_string($_POST['details']);
	// See if that product name is an identical match to another product in the system
	$sql = mysql_query("UPDATE productmaster SET product_name='$product_name', price='$price', quantity='$quantity', manufacturer='$manufacturer', catagory='$catagory', model='$model',details='$details' WHERE pid='$pid'");
   if ($_FILES['fileField']['tmp_name'] != "") {
	    // Place image in the folder 
	    $newname = "$pid.jpg";
	    move_uploaded_file($_FILES['fileField']['tmp_name'], "../images/$newname");
	}
	echo "<script>window.location = 'inventory_list.php';</script>";
	
    exit();
}
?>
<?php 
// Gather this product's full information for inserting automatically into the edit form below on page
if (isset($_GET['pid'])) {
	$targetID = $_GET['pid'];
    $sql = mysql_query("SELECT * FROM productmaster WHERE pid='$targetID' LIMIT 1");
    $productCount = mysql_num_rows($sql); // count the output amount
    if ($productCount > 0) {
	    while($row = mysql_fetch_array($sql)){ 
             
			 $product_name = $row["product_name"];
			 $price = $row["price"];
			 $availability = $row["avail"];
			 $manufacturer = $row["manufacturer"];
			 $catagory = $row["catagory"];
			 $model = $row["model"];
			 $details = $row["details"];
			 $quantity = $row["quantity"];
			 $date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));
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
                <h3>Header</h3>
                <ul class="nav">
                    <li><a href="#">Lorem Ipsum dollar</a></li>
                    <li><a href="#">Dollar</a></li>
                    <li><a href="#">Lorem dollar</a></li>
                    <li><a href="#">Ipsum dollar</a></li>
                    <li><a href="#">Lorem Ipsum dollar</a></li>
                    <li><a href="#">Dollar Lorem Ipsum</a></li>
                </ul>
                <a href="#" class="link">Link here</a>
                <a href="#" class="link">Link here</a>
            </div>
            <div id="center-column">
                <div class="top-bar">
                  <h1>Inventory List</h1>
                   
                   
                </div>
                
              <p>&nbsp;</p>
              <p>             </p>
              <div id="center-column2">
                <hr />
                <center >
                  <a name="inventoryForm" id="inventoryForm"></a>
                </center>
                <center >
                  <h3> &darr; Edit Inventory Item Form &darr; </h3>
                </center>
                <form action="inventory_edit.php" enctype="multipart/form-data" name="myForm" id="myform" method="post">
                  <table width="90%" border="0" cellspacing="0" cellpadding="6">
                    <tr>
                      <td width="20%" align="right">Product Name</td>
                      <td width="80%"><label>
                        <input name="product_name" type="text" id="product_name" size="64" value="<?php echo $product_name; ?>" />
                      </label></td>
                    </tr>
                    <tr>
                      <td align="right">Product Price</td>
                      <td><label> Rs.
                        <input name="price" type="text" id="price" size="12" value="<?php echo $price; ?>" />
                      </label></td>
                    </tr>
                    <tr>
                      <td align="right">Quantity</td>
                      <td><label>
                        <input name="quantity" type="text" id="quantity" size="15" value="<?php echo $quantity; ?>" >
                      </label></td>
                    </tr>
                    <tr>
                      <td align="right">manufacturer</td>
                      <td>
                      <input name="manufacturer" type="text" id="manufacturer" size="20" value="<?php echo $manufacturer; ?>" />
                      </td>
                    </tr>
                   <tr>
        <td align="right">Category</td>
        <td><label>
          <select name="catagory" id="catagory">
          <option value="computer">Computer</option>
          <option value="laptop">Laptop</option>
          <option value="ram">Ram</option>
          <option value="processor">Processor</option>
          <option value="motherboard">Motherboard</option>
          <option value="graphicscard">Graphics Card</option>
          <option value="harddisk">Hard Disk</option>
          <option value="other product">Other Product</option>
          </select>
        </label></td>
      </tr>
                    <tr>
                      <td align="right">Model no.</td>
                      <td><label>
                        <input name="model" type="text" id="model" size="20" value="<?php echo $model; ?>" />
                      </label></td>
                    </tr>
                    <tr>
                      <td align="right">Product Details</td>
                      <td><textarea name="details" id="details" cols="64" rows="5"><?php echo $details; ?></textarea></td>
                    </tr>
                    <tr>
        <td align="right">Product Image</td>
        <td><label>
          <input type="file" name="fileField" id="fileField" />
        </label></td>
      </tr> 
                    <tr>
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