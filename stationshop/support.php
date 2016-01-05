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
        <h1>Support</h1>
        <p>&nbsp;</p>
        <table width="200" cellspacing="13">
          <tr>
            <td><a href="driver.php"><img src="images/dell driver.jpg" width="260" height="228" alt="324" /></a></td>
            <td><a href="complain.php"><img src="images/exclamation_warning_message_alert.jpg" width="273" height="237" alt="350" /></a></td>
          </tr>
          <tr>
          <td><a href="driver.php"><h3>Drivers & Downloads</h3></a></td>
          <td><a href="complain.php"><h3>Write Your Query</h3></a></td></tr>
        </table>
        <p>&nbsp;</p>
        	
      </div> 
        <p>&nbsp;</p>
        <div class="cleaner"></div>
    </div> 
    
    
<?php include_once("template_footer.php");?>