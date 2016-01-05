<?php 
session_start();
if (!isset($_SESSION["manager"])) {
	echo "<script language=javascript> alert(' Please first login!!!!!! ') </script>"; 
	echo "<script>window.location = 'user_login.php';</script>";
    exit();
}

// Be sure to check that this manager SESSION value is in fact in the database
$managerID = preg_replace('#[^0-9]#i', '', $_SESSION["id"]); // filter everything but numbers and letters
$manager = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["manager"]); // filter everything but numbers and letters
$password = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["password"]); // filter everything but numbers and letters
// Run mySQL query to be sure that this person is an admin and that their password session var equals the database information
// Connect to the MySQL database  
include "functions/connect_to_mysql.php"; 
$sql = mysql_query("SELECT id FROM registerdetail WHERE username='$manager' AND password='$password' LIMIT 1"); // query the person
// ------- MAKE SURE PERSON EXISTS IN DATABASE ---------
$existCount = mysql_num_rows($sql); // count the row nums
if ($existCount == 0) { // evaluate the count
	 echo "Your login session data is not on record in the database.";
     exit();
}

include "functions/connect_to_mysql.php";
?>
<?php
if (isset($_POST['pid'])) {
    $pid = $_POST['pid'];
	$quantity = 1;
	if (isset($_POST['quantity'])){
				$quantity = $_POST['quantity'];
		}
	$wasFound = false;
	$i = 0;
	// If the cart session variable is not set or cart array is empty
	if (!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1) { 
	    // RUN IF THE CART IS EMPTY OR NOT SET
		$_SESSION["cart_array"] = array(0 => array("item_id" => $pid, "quantity" => $quantity));
	} else
	{
	// RUN IF THE CART HAS AT LEAST ONE ITEM IN IT
		foreach ($_SESSION["cart_array"] as $each_item) { 
		      $i++;
		      while (list($key, $value) = each($each_item)) {
				  if ($key == "item_id" && $value == $pid) {
					  // That item is in cart already so let's adjust its quantity using array_splice()
					  array_splice($_SESSION["cart_array"], $i-1, 1, array(array("item_id" => $pid, "quantity" => $each_item['quantity'] + 1)));
					  $wasFound = true;
				  } // close if condition
		      } // close while loop
	       } // close foreach loop
		   if ($wasFound == false) {
			   array_push($_SESSION["cart_array"], array("item_id" => $pid, "quantity" => $quantity));
		   }
	}
	/*echo "<script>window.location = 'shoppingcart.php';</script>";  

*/}
?>


<?php
if (isset($_GET['pid'])) {
    $pid = $_GET['pid'];
	$quantity = 1;
	
	$wasFound = false;
	$i = 0;
	// If the cart session variable is not set or cart array is empty
	if (!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1) { 
	    // RUN IF THE CART IS EMPTY OR NOT SET
		$_SESSION["cart_array"] = array(0 => array("item_id" => $pid, "quantity" => $quantity));
	} else
	{
	// RUN IF THE CART HAS AT LEAST ONE ITEM IN IT
		foreach ($_SESSION["cart_array"] as $each_item) { 
		      $i++;
		      while (list($key, $value) = each($each_item)) {
				  if ($key == "item_id" && $value == $pid) {
					  // That item is in cart already so let's adjust its quantity using array_splice()
					  array_splice($_SESSION["cart_array"], $i-1, 1, array(array("item_id" => $pid, "quantity" => $each_item['quantity'] + 1)));
					  $wasFound = true;
				  } // close if condition
		      } // close while loop
	       } // close foreach loop
		   if ($wasFound == false) {
			   array_push($_SESSION["cart_array"], array("item_id" => $pid, "quantity" => 1));
		   }
	}
	/*echo "<script>window.location = 'shoppingcart.php';</script>";  

*/}
?>



<?php
if (isset($_POST['index_to_remove']) && $_POST['index_to_remove'] != "") {
    // Access the array and run code to remove that array index
 	$key_to_remove = $_POST['index_to_remove'];
	if (count($_SESSION["cart_array"]) <= 1) {
		unset($_SESSION["cart_array"]);
	} else {
		unset($_SESSION["cart_array"]["$key_to_remove"]);
		sort($_SESSION["cart_array"]);
	}/* echo "<script>window.location = 'shoppingcart.php';</script>";  
    */
}

?>
<?php
if (isset($_POST['item_to_adjust']) && $_POST['item_to_adjust'] != "") {
    // execute some code
	$item_to_adjust = $_POST['item_to_adjust'];
	$quantity = $_POST['quantity'];
	$quantity = preg_replace('#[^0-9]#i', '', $quantity); // filter everything but numbers
	$sql = mysql_query("SELECT * FROM productmaster WHERE pid='$item_to_adjust' LIMIT 1");
	while ($row = mysql_fetch_array($sql)) {
	$qua = $row["quantity"]; 
	}
	if ($quantity > $qua) { $quantity = $qua; 
	echo "<script language=javascript> alert(' Sorry maximum ".$qua."  quantity available!!!! ') </script>";
	}
	if ($quantity >= 100) { $quantity = 99; }
	if ($quantity < 1) { $quantity = 1; }
	if ($quantity == "") { $quantity = 1; }
	$i = 0;
	foreach ($_SESSION["cart_array"] as $each_item) { 
		      $i++;
		      while (list($key, $value) = each($each_item)) {
				  if ($key == "item_id" && $value == $item_to_adjust) {
					  // That item is in cart already so let's adjust its quantity using array_splice()
					  array_splice($_SESSION["cart_array"], $i-1, 1, array(array("item_id" => $item_to_adjust, "quantity" => $quantity)));
				  } // close if condition
		      } // close while loop
	} // close foreach loop
}
?>
<?php 

if (isset($_GET['cmd']) && $_GET['cmd'] == "emptycart") {
    unset($_SESSION["cart_array"]);
}
?>
<?php 

$cartOutput = "";
$cartTotal = "";

$product_id_array = '';
if (!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1) {
    $cartOutput = "<h2 align='center'>Your shopping cart is empty</h2>";
} else {
		$i = 0; 
    foreach ($_SESSION["cart_array"] as $each_item) { 
		$item_id = $each_item['item_id'];
		$sql = mysql_query("SELECT * FROM productmaster WHERE pid='$item_id' LIMIT 1");
		while ($row = mysql_fetch_array($sql)) {
			$product_name = $row["product_name"];
			$price = $row["price"];
		}
		$pricetotal = $price * $each_item['quantity'];
		$cartTotal = $pricetotal + $cartTotal;
		// Dynamic table row assembly
		$cartOutput .= "<tr>";
		$cartOutput .= '<td><a href="anyproduct.php?pid='.$item_id.'"><img src="images/'.$item_id.'.jpg" height="150" width="200" alt="Image 01" /></a></td>';
		$cartOutput .= '<td><a href="anyproduct.php?pid='.$item_id.'">'.$product_name.'</a></td>';
		$cartOutput .= '<td><form action="shoppingcart.php" method="post">
		<input name="quantity" type="text" value="' . $each_item['quantity'] . '" size="1" maxlength="2" />
		<input name="adjustBtn' . $item_id . '" type="submit" value="change" />
		<input name="item_to_adjust" type="hidden" value="' . $item_id . '" />
		</form></td>';
		$cartOutput .= '<td>Rs.' . $price . '</td>';
		//$cartOutput .= '<td>' . $each_item['quantity'] . '</td>';
		$cartOutput .= '<td>Rs.' . $pricetotal . '</td>';
		$cartOutput .= '<td><form action="shoppingcart.php" method="post"><input name="deleteBtn' . $item_id . '" type="submit" value="X" /><input name="index_to_remove" type="hidden" value="' . $i . '" /></form></td>';
		$cartOutput .= '</tr>';
		$i++; 
    } 	}
?>

<?php include_once("template_header.php");?>
        <div id="content" class="float_r">
        	<h1>Shopping Cart</h1>
        	<table  width="687" cellspacing="0" cellpadding="5">
                   	  	<tr bgcolor="#ddd">
                        	<th width="200" align="center">Image </th> 
                        	<th width="73" align="left">Product Name </th> 
                       	  	<th width="78" align="left">Quantity </th> 
                        	<th width="35" align="left">Price </th> 
                        	<th width="36" align="left">Total </th> 
                        	<th width="123" align="left"> Remove</th>
                      	</tr>
                    	 <?php echo $cartOutput; ?>
                      
                        <tr>
                        	<td colspan="3" align="right"  height="30px">&nbsp; </td>
                            <td align="right" style="background:#ddd; font-weight:bold"> Total </td>
                            <td align="right" style="background:#ddd; font-weight:bold">Rs.<? echo $cartTotal; ?> </td>
                            <td style="background:#ddd; font-weight:bold"> </td>
						</tr>
                        
					</table>
                    
                    
					<p>&nbsp;</p>
					<table width="533"  cellspacing="13" align="right">
					  <tr>
					    <td width="51">
                        <?php
                        if($cartOutput == "<h2 align='center'>Your shopping cart is empty</h2>")
						{
						
						}
						else
						{
							echo '<a href="checkout.php"><img src="images/checkout-post-image.jpg" width="214" height="39" alt="90" /></a>';
						}
						?></td>
					    <td width="53"><a href="index.php"><img src="images/button-continue_shopping.jpg" width="185" height="34" alt="99" /></a></td>
					    <td width="363"><a href="shoppingcart.php?cmd=emptycart"><img src="images/remove_from_shopping_cart.jpg" width="128" height="128" alt="998" /></a></td>
				      </tr>
		  </table>
					
                    	
                   
            
      </div> 
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->
    
    
<?php include_once("template_footer.php");?>