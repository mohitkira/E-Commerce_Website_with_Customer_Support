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
        <h1>Download Driver</h1>
        <table width="200" cellspacing="13" align="center">
          <tr>
            <td><a href="http://support.apple.com/downloads" ><img src="images/apple-logo1.jpg" width="250" height="250" /></a></td>
            
          </tr>
          <tr>
            <td><a href="http://www.dell.com/support/drivers/in/en/indhs1/DriversHome/NeedProductSelection"><img src="images/501px-Dell_Logo.svg.jpg" alt="" width="249" height="227" /></a></td>
          
          </tr>
          <tr>
            <td><a href="http://www8.hp.com/in/en/support-drivers.html"><img src="images/hp_logo.jpg" width="249" height="162" /></a></td>			
            
          </tr>
          <tr>
            <td><a href="http://support.lenovo.com/en_US/downloads/default.page"><img src="images/lenovo-logo.jpg" width="282" height="70" alt="" /></a></td>
            
          </tr>
          <tr>
            <td><a href="http://www.samsung.com/in/support/download/supportDownloadMain.do"><img src="images/samsung-logo.jpg" width="282" height="70" /></a></td>
            
          </tr>
        </table>
        <p>&nbsp;</p>
        	
            
      </div> 
        <div class="cleaner"></div>
    </div> 
    
    <?php include_once("template_footer.php");?>