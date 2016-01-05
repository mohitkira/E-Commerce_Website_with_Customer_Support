<?php 
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


<?php include_once("template_header.php");?>
<?php 

include "functions/connect_to_mysql.php"; 

if (isset($_GET['pid'])) {
	 
$product_list =" ";
$pid = $_GET['pid'];
$sql = mysql_query("SELECT * FROM productmaster WHERE pid='".$pid."'");
$productCount = mysql_num_rows($sql); // count the output amount
if ($productCount > 0) {
	while($row = mysql_fetch_array($sql)){ 
             $id = $row["pid"];
			 $product_name = $row["product_name"];
			 $price = $row["price"];
			 $quantity = $row["quantity"];
			 $manufacturer = $row["manufacturer"];
			 $model = $row["model"];
			 $detail= $row["details"];
			 
			 $date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));
			 }
}
}
?>
        <div id="content" class="float_r">
        	
            <h1><?php echo $product_name;  ?></h1>
            <div class="content_half float_l">
            <a  rel="lightbox[portfolio]" href="images/<? echo $id ?>.jpg">
        	<img src="images/<?php echo $id ?>.jpg" alt="Image 01" width="250" height="200" /></a>
            </div>
            
            <div class="content_half float_r">
		  <table>
                    <tr>
                        <td height="30" width="160">Price:</td>
                        <td>Rs.<?php echo $price; ?></td>
                    </tr>
                    <tr>
                        <td height="30">Availability:</td>
                        <td><?php if($quantity > 0)
						{
							echo "In Stock";
						}
						else
						{
							echo"Out of Stock";
							}?></td>
                    </tr>
                    <tr>
                        <td height="30">Model:</td>
                        <td><?php echo  $model; ?></td>
                    </tr>
                    <tr>
                        <td height="30">Manufacturer:</td>
                        <td><?php echo $manufacturer; ?></td>
                    </tr>
                    <tr><form id="form1" name="form1" method="post" action="shoppingcart.php">
            <td height="30">Quantity</td><td>
            
            <input type="text" value="1" style="width: 20px; text-align: right" name="quantity" />
            
            
            
            </td></tr>
                            </table>
                <div class="cleaner h20"></div>
                <form id="form1" name="form1" method="post" action="shoppingcart.php">
        <input type="hidden" name="pid" id="pid" value="<?php echo $id; ?>" />
       <?php if($quantity > 0)
						{
							echo '<input type="submit" name="button" id="button" value="Add to Cart" />';
						}
						else
						{
							echo"Soon This Product will be Available";
							}?> 
      </form>
			</div>
            <h5>&nbsp;</h5>
      <h5>&nbsp;</h5>
      <h5>&nbsp;</h5>
      <h5>&nbsp;</h5>
      <h5>&nbsp;</h5>
      <h5>&nbsp;</h5>
      <h5>&nbsp;</h5>
      <h5>&nbsp;</h5>
      <h5>Product Description</h5>
      <p><?php echo $detail; ?>
      </p>
      
            
   	    <table cellspacing="0">
        <tbody>
          
          <tr>
            <td ></td>
            <td ></td>
          </tr>
          
          </tbody>
      </table>
        </div> 
        </div> 
        <div class="cleaner"></div>
    
    <?php include_once("template_footer.php");?>