<?php 
session_start();
if (!isset($_SESSION["manager"])) {
    header("location: user_login.php"); 
    exit();
}
?>
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
<?php
if(isset($_POST['mobileno']) || isset($_POST['city']) || isset($_POST['state']) || isset($_POST['address']))
{
	
		$mobileno = mysql_real_escape_string($_POST['mobileno']);
		$city = mysql_real_escape_string($_POST['city']);
		$state = mysql_real_escape_string($_POST['state']);
		$address = mysql_real_escape_string($_POST['address']);
		
			$sql = mysql_query("UPDATE registerdetail SET mobileno='$mobileno', state='$state', city='$city',Address='$address' WHERE id='$managerID'");
			
			echo "<script language=javascript> alert(' Infromation Updated Successfully ') </script>";
			
			$sql = mysql_query("SELECT * FROM registerdetail WHERE id='$managerID'");
		while ($row = mysql_fetch_array($sql)) {
			$email = $row["email"];
		}
			$to = $email;
$subject = "Personal information Changed email for StationShop";
$message = $manager.",

You have changed your Personal Information successfully. Your current Address is ".$address."
Your City is ".$city."
Your State is ".$state."
and Mobile no. is ".$mobileno;
$headers = "From:" . $from;
mail($to,$subject,$message,$headers);
	echo "<script>window.location = 'index.php';</script>";
			
		

}

?>
<?php include_once("template_header.php");?>
            
        <div id="content" class="faq float_r">
			<div><form action="address.php" enctype="multipart/form-data" name="myForm" id="myform" method="post">
                  <table width="90%" border="0" cellspacing="0" cellpadding="6">
                    <tr>
                      <td align="right">Mobile No.</td>
                      <td>
                      <input type="text" name="mobileno" id="mobileno" /></td>
                    </tr>
                    <tr>
                      <td align="right">City</td>
                      <td>
                      <input type="text" name="city" id="city" /></td>
                    </tr>
                    <tr>
                      <td align="right">State</td>
                      <td>
                      <input type="text" name="state" id="state" /></td>
                    </tr>
                   <tr>
        <td align="right">Address</td>
        <td>
          <textarea name="address" id="address" cols="45" rows="5"></textarea></td>
      </tr>
                    
                   
                    
                      <td>&nbsp;</td>
                      <td><label>
                        
                        <input type="submit" name="button" id="button" value="Make Changes" />
                      </label></td>
                    </tr>
                  </table>
                </form>
            </div>
        </div> 
        <div class="cleaner"></div>
    </div> 
    
    <?php include_once("template_footer.php");?>