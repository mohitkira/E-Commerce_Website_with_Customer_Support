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
        <h1>About Us</h1>
        	<h5>&nbsp;</h5>
            <div class="line bmargin20"><h3>Hello! </h3></div><h5>&nbsp;</h5><h4>
            <p>It's nice of you to take the time to get to know us better. Here are some things about us that we thought
                you might like to know.</p>

            <p>StationShop went live in 2012 with the objective of making computer product easily available to anyone who had internet
                access.</p>

            <p>We believe that our success is largely due to our obsession with providing our customers a memorable
                online shopping experience. Be it our path-breaking services like Cash on Delivery,free shipping - and of course the great prices that we offer. Then there's our
                dedicated StationShop delivery team that works round the clock to personally make sure packages reach on
                time. </p>

            <p>So it's no surprise that we're a favourite online shopping destination.</p>

            <p>And it's all thanks to you!</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            </h4>
</div> 
        <div class="cleaner"></div>
    </div> 
    
   <?php include_once("template_footer.php");?>