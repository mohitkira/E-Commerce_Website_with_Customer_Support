﻿<?php 
session_start();
if (isset($_SESSION["manager"])) {
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
}
?>
<?php include_once("template_header_scroll.php");?>
<?php 
		$i=0;
include "functions/connect_to_mysql.php"; 
$query_for_sql= "SELECT * FROM productmaster ORDER BY date_added DESC";
if(isset($_GET['catagory']))
{
	$catagory=$_GET['catagory'];
$query_for_sql= "SELECT * FROM productmaster WHERE catagory = '".$catagory."' ORDER BY date_added DESC ";
if(isset($_GET['price']))
{
	$price_status=$_GET['price'];
	$query_for_sql= "SELECT * FROM productmaster WHERE catagory = '".$catagory."' ORDER BY price ".$price_status;
	}
}

$sql = mysql_query($query_for_sql);
$productCount = mysql_num_rows($sql); // count the output amount
if ($productCount > 0) {
	
	while($row = mysql_fetch_array($sql)){ 
	$i++;
	
             $id = $row["pid"];
			 $product_name = $row["product_name"];
			 $price = $row["price"];
			 $availability = $row["avail"];
			 $manufacturer = $row["manufacturer"];
			 $model = $row["model"];
			 $date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));
			
			if($i%3==0)
	{ 
			 $display .= '<div class="product_box no_margin_right">
            	<a href="anyproduct.php?pid='.$id.'"><img src="images/'.$id.'.jpg" height="150px" width="200px" alt="Image 01" /></a></td>
               <td> <h3><a href="anyproduct.php?pid='.$id.'">'.$product_name.'</a></h3>
                <p class="product_price">Rs.'.$price.'</p>
               <a href="shoppingcart.php?pid='.$id.'" class="add_to_card">Add to Cart</a>
                <a href="anyproduct.php?pid='.$id.'" class="detail">Detail</a>
            </div>';
	}
	else{
		$display .= '<div class="product_box">
            	<a href="anyproduct.php?pid='.$id.'"><img src="images/'.$id.'.jpg" height="150px" width="200px" alt="Image 01" /></a></td>
               <td> <h3><a href="anyproduct.php?pid='.$id.'">'.$product_name.'</a></h3>
                <p class="product_price">Rs.'.$price.'</p>
               <a href="shoppingcart.php?pid='.$id.'" class="add_to_card">Add to Cart</a>
                <a href="anyproduct.php?pid='.$id.'" class="detail">Detail</a>
            </div>';
		}
    }
} else {
	$display = "You have no products listed in your store yet";
}
?> 
<div id="content" class="float_r">
<?php echo "Showing ".$productCount." products "; 

if($productCount > 0)
{
	echo '
	<form action="" method="get" enctype="multipart/form-data">
	Sort by:
            <select name="price" onchange="this.form.submit()" >
                                   
                <option  value="" >Select</option>
                    <option  value="DESC" >Price -- High to Low</option>
                
                    <option  value="ASC" >Price -- Low to High</option>
					
                 
                                    
            </select>';
			
			if (isset($_GET['catagory']))
 {
 $hidden=$_GET['catagory'];
 
 echo '<input type="hidden" name="catagory" value="'.$hidden.'" />';
 }
		echo '</form>';
	}
?>
</div>
       <div id="content" class="float_r">
                 
        <?php echo $display; ?>
        </div> 
        <div class="cleaner"></div>
    </div> 
    
    <?php include_once("template_footer.php");?>
