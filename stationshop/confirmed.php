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
          <p>&nbsp;</p>
          <p>&nbsp;</p>
			<?
// Run the actual connection here  
mysql_connect("$db_host","$db_username","$db_pass") or die ("could not connect to mysql");
mysql_select_db("$db_name") or die ("no database");     

if (isset($_GET['chid'])) {
	$targetID = $_GET['chid'];
$sql = mysql_query("UPDATE registerdetail SET confirm='1' WHERE id='$targetID'");
echo '<h2>Thank you for registeration!!!! You can login by clicking <a href="user_login.php">here</a></h2>';
}

?>
        </div> 
        <div class="cleaner"></div>
    </div> 
    
    <?php include_once("template_footer.php");?>