<?php 
session_start();
if (!isset($_SESSION["manager"])) {
    header("location: user_login.php"); 
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
$email="";
$message="";
if (isset($_POST['pid'])) {
    $pid = $_POST['pid'];
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
	header("location: shoppingcart.php"); 
    exit();
}
?>

<?php 
$email="";
$cartOutput = "";
$cartTotal = "";
$message = "";
$product_id_array = '';
if (!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1) {
} else {
		$i = 0; 
    foreach ($_SESSION["cart_array"] as $each_item) { 
		$item_id = $each_item['item_id'];
		$sql = mysql_query("SELECT * FROM productmaster WHERE pid='$item_id' LIMIT 1");
		while ($row = mysql_fetch_array($sql)) {
			$product_name = $row["product_name"];
			$pid = $row["pid"];
			$manufacturer = $row["manufacturer"];
			$catagory = $row["catagory"];
			$price = $row["price"];
			
		}
		$prod_id=999999;
		$pricetotal = $price * $each_item['quantity'];
		$q = $each_item['quantity'];
		$qo = $each_item['quantity'];
		$sql = mysql_query("SELECT * FROM purchase WHERE prod_id='$pid' LIMIT 1");
		while ($row = mysql_fetch_array($sql)) {
			$prod_id = $row["prod_id"];
			$price1 = $row["price"];
			$quntity = $row["quntity"];
		}
		
		if($prod_id == $pid)
		{
			$pricetotal = $pricetotal +  $price1;
		$q = $q + $quntity;
		
		
			$sql = mysql_query("UPDATE purchase SET price='$pricetotal', quntity='$q', dateofpurchace= curdate() WHERE prod_id='$pid'");
			
		}
		else
		{
			$sql = mysql_query("INSERT INTO purchase (prod_id, prod_name, quntity, price, manufacturer, catagory, dateofpurchace) 
        VALUES('$pid','$product_name','$q','$pricetotal','$manufacturer','$catagory',now())") or die (mysql_error());
		
			}
			
			$managerID;
			$sql = mysql_query("SELECT * FROM registerdetail WHERE id='$managerID' LIMIT 1");
			while ($row = mysql_fetch_array($sql)) {
			$fname = $row["fname"];
			$lname = $row["lname"];
			$mobileno = $row["mobileno"];
			$email = $row["email"];
			$country = $row["country"];
			$state = $row["state"];
			$city = $row["city"];
			$address = $row["Address"];
			$buyed = $row["buyed"];
		}
			$buyed = $buyed . '<br>' . $product_name;
			
			$sql = mysql_query("UPDATE registerdetail SET buyed='$buyed', datebuyed= curdate() WHERE id='$managerID'");
			$message .= "  Product name :".$product_name."  Price Rs".$pricetotal."   Quantity :".$qo." 
			";
			$sql = mysql_query("INSERT INTO sales_table (product, email, address, state, city, country, fname, lname, mobileno, price, quantity, purchased_on) 
        VALUES('$product_name','$email','$address','$state','$city','$country','$fname','$lname','$mobileno','$pricetotal','$qo', now())") or die (mysql_error());
		
    } 
	
}
$message = "Thanks for purchasing the products from StationShop. Your product purchased are
			".$message;
$to = $email;
$subject = "Product purchased form StationShop";
 
 $headers = array ('From' => $from,
   'To' => $to,
   'Subject' => $subject);
 $smtp = Mail::factory('smtp',
   array ('host' => $host,
     'auth' => true,
     'username' => $username_email,
     'password' => $password_email));
 
 $mail = $smtp->send($to, $headers, $message);			
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Untitled Document</title>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-34546889-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>

<body>
<?php

echo "<script language=javascript> alert(' Thanks for purchasing the product from StationShop your product will be delivered as quick as possible') </script>";
	echo "<script>window.location = 'index.php';</script>";
?>
</body>
</html>
