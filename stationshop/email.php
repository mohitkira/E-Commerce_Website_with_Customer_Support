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
if(isset($_POST['newe']))
{
	
		$newemail = mysql_real_escape_string($_POST['newe']);
		$renewemail = mysql_real_escape_string($_POST['renewe']);
		if($newemail == $renewemail)
		{
			$sql = mysql_query("UPDATE registerdetail SET email='$newemail' WHERE id='$managerID'");
			
			echo "<script language=javascript> alert(' Email-id Updated Successfully ') </script>";
			
			$sql = mysql_query("SELECT * FROM registerdetail WHERE id='$managerID'");
		while ($row = mysql_fetch_array($sql)) {
			$email = $row["email"];
		}
			$to = $email;
$subject = "Email-id Changed email for StationShop";
$message = $manager.",

You have changed your Email-id successfully. ";


 
 $headers = array ('From' => $from,
   'To' => $to,
   'Subject' => $subject);
 $smtp = Mail::factory('smtp',
   array ('host' => $host,
     'auth' => true,
     'username' => $username_email,
     'password' => $password_email));
 
 $mail = $smtp->send($to, $headers, $message);


	echo "<script>window.location = 'index.php';</script>";
			
		}
		else
		{
			echo "<script language=javascript> alert(' Incorrect Email-id please reenter the Email-id') </script>";
	echo "<script>window.location = 'setting.php';</script>";
			}

}

?>
<?php include_once("template_header.php");?>
        <div id="content" class="faq float_r">
			<div><hr />
                <center >
                  <a name="inventoryForm" id="inventoryForm"></a>
                </center>
                <center >
                  <h3> &darr; Edit Your Email &darr; </h3>
                </center>
                <form action="email.php" enctype="multipart/form-data" name="myForm" id="myform" method="post">
    <table width="90%" border="0" cellspacing="0" cellpadding="6">
    	 <tr>
        <td width="20%" align="right">User-id</td>
        <td width="40%"><label>
          <? echo $manager; ?>
        </label></td>
      </tr>
      
      <tr>
        <td width="20%" align="right">New Email-id</td>
        <td width="40%"><label>
         <input type="text" id="newe" name="newe" />
        </label></td>
      </tr>
      <tr>
        <td width="20%" align="right">Retype New Email-id</td>
        <td width="40%"><label>
         <input type="text" id="renewe" name="renewe" />
        </label></td>
      </tr>
     <tr>
        <td>&nbsp;</td>
        <td><label>
          <input type="submit" name="button" id="button" value="Change Email-id" />
        </label></td>
      </tr>
    </table>
    </form>
            </div>
        </div> 
        <div class="cleaner"></div>
    </div> 
    
    <?php include_once("template_footer.php");?>