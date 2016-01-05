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
        <div id="content" class="faq float_r">
        
		<dl>
<dt> <strong>Are there any hidden charges when I make a purchase on StationShop (Octroi, Sales Tax)? </strong></dt>
<dd>- There are absolutely no hidden charges when you make a purchase with StationShop. We offer free delivery if the order is Rs. 300 or over, otherwise you will be charged an additional Rs. 30 for delivery. The prices listed for all items are final and all-inclusive. The prices you see on our product pages are exactly what you pay for the item.</dd>
<dt>&nbsp;</dt>

<dt> <strong>What is Cash on Delivery? </strong></dt>
<dd>- If you do not prefer to make an online payment on StationShop then you have option for the Cash-on-Delivery (C-o-D) payment method. With C-o-D you can pay us in cash at the time of actual delivery of product at your doorstep, without requiring you to make any advance payment on StationShop.</dd>
<dt> <strong>Are there any terms and conditions for a C-o-D purchase? </strong></dt>
<dd>- The maximum order value for a C-o-D payment is Rs. 50,000. It's strictly a cash-only payment method; e-Gift Vouchers or Store Credit cannot be used for C-o-D orders.
Please note, we do not accept foreign currency as payment against a COD order. All Electronics sold on StationShop are sourced from Indian suppliers authorized by the Manufacturer. They come with minimum 1 year Manufacturer's warranty & are serviceable at the corresponding brand's Authorized Service Center(s) in India, unless specified otherwise.
</dd>
<dt> <strong>How much are the delivery charges? </strong></dt>
<dd>- StationShop provides free delivery on all items if your total order amount is Rs. 300/- or more. Otherwise Rs. 30/- is charged as delivery charges.
</dd>
<dt> <strong>What about warranty and hidden costs (sales tax, octroi etc.)?
 </strong></dt>
<dd>- There are no extra taxes, hidden costs or additional shipping charges. The price mentioned on the website is the final price. What you see is what you pay. Our prices are all inclusive. All taxes are included with the list prices.
</dd>
<dt><strong> How are items packaged?</strong>
</dt>
<dd>- All items are carefully packaged at our warehouses - as to avoid any form of damage. We ensure the package is water proof with plastic wrap and fragile (electronic) items are safely secured with bubble wrap.
</dd>
<dt><strong>Our email-id for contact? </strong> </dt>
<dd>- mohit@aimorigami.com. </dd>
        </dl><br><br>

        </div> 
        <div class="cleaner"></div>
    </div>
    
    
<?php include_once("template_footer.php");?>