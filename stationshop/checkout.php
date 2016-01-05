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
        <div id="content" class="float_r">
        <h1>Checkout</h1>
        	<h5>&nbsp;</h5>
            <h2>Are you sure you want to buy the products from <br> <br>StationShop?</h2>
            <p>&nbsp;</p>
            <table width="409" height="55" cellspacing="14" >
              <tr>
                <td width="255"><a href="insert.php"><img src="images/cash_on_delivery.jpg" width="324" height="229" alt="111" /></a></td>
                <td width="138"><a href="shoppingcart.php"><img src="images/cancel.jpg" width="295" height="123" alt="333" /></a></td>
              </tr>
            </table>
            <p>&nbsp;</p>
            
      </div> 
        <div class="cleaner"></div>
    </div> 
    
    <?php include_once("template_footer.php");?>