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
if (isset($_POST['product_name'])) {
	
    $product_name = mysql_real_escape_string($_POST['product_name']);
	$price = mysql_real_escape_string($_POST['price']);
	$category = mysql_real_escape_string($_POST['category']);
	$quantity = mysql_real_escape_string($_POST['quantity']);
	$manufacturer = mysql_real_escape_string($_POST['manufacturer']);
	$model = mysql_real_escape_string($_POST['model']);
	$details = mysql_real_escape_string($_POST['details']);
		// See if that product name is an identical match to another product in the system
	$sql = mysql_query("SELECT pid FROM productmaster WHERE product_name='$product_name' LIMIT 1");
	$productMatch = mysql_num_rows($sql); // count the output amount
    if ($productMatch > 0) {
		echo 'Sorry you tried to place a duplicate "Product Name" into the system, <a href="new_product.php">click here</a>';
		exit();
	}
	else{// Add this product into the database now
	$sql = mysql_query("INSERT INTO productmaster (product_name, price, quantity, manufacturer, model, catagory, details, date_added) 
        VALUES('$product_name','$price','$quantity','$manufacturer','$model','$category','$details',now())") or die (mysql_error());
     $pid = mysql_insert_id();
	// Place image in the folder 
	$newname = "$pid.jpg";
	move_uploaded_file( $_FILES['fileField']['tmp_name'], "../images/$newname");
	echo "<script>window.location = 'inventory_list.php';</script>"; 
    exit();
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
            <a href="index.php" class="logo"><img src="img/logo.png" width="183" height="36" alt="" /></a>
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
                    <li>This page deals with adding the new products in the database i.e. on website</li>
                    
                </ul>
                
            </div>
            <div id="center-column">
                <div class="top-bar">
                  <h1>Add New Product</h1>
                   
                   
                </div>
                
              <p>&nbsp;</p>
              <p>             </p>
              <div id="center-column2">
                <hr />
                <center >
                  <a name="inventoryForm" id="inventoryForm"></a>
                </center>
                <center >
                  <h3> &darr; Add New Product Form &darr; </h3>
                </center>
                <form action="new_product.php" enctype="multipart/form-data" name="myForm" id="myform" method="post">
    <table width="90%" border="0" cellspacing="0" cellpadding="6">
      <tr>
        <td width="20%" align="right">Product Name</td>
        <td width="80%"><label>
          <input name="product_name" type="text" id="product_name" size="64" />
        </label></td>
      </tr>
      <tr>
        <td align="right">Product Price</td>
        <td><label>
          Rs.
          <input name="price" type="text" id="price" size="12" />
        </label></td>
      </tr>
      <tr>
        <td align="right">Category</td>
        <td><label>
          <select name="category" id="category">
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
        <td align="right">Quantity</td>
        <td><label>
          <input name="quantity" type="text" id="quantity" size="64" />
        </label></td>
      </tr>
      <tr>
        <td align="right">Manufacturer</td>
        <td><label>
          <input name="manufacturer" type="text" id="manufacturer" size="64" />
        </label></td>
      </tr>
      <tr>
        <td align="right">Model</td>
        <td><label>
          <input name="model" type="text" id="model" size="64" />
        </label></td>
      </tr>
      <tr>
        <td align="right">Product Details</td>
        <td><label>
          <textarea name="details" id="details" cols="64" rows="5"></textarea>
        </label></td>
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
          <input type="submit" name="button" id="button" value="Add This Item Now" />
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