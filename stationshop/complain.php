<?php 
session_start();
if (!isset($_SESSION["manager"])) {
	echo "<script language=javascript> alert(' Please first login to write your query!!!!!! ') </script>"; 
	echo "<script>window.location = 'user_login.php';</script>";
    exit();
}

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
	 echo "<script language=javascript> alert(' Your login session data is not on record in the database. ') </script>";
	echo "<script>window.location = 'user_login.php';</script>";
}

?>
<?php 
// Parse the form data and add inventory item to the system
include "functions/connect_to_mysql.php";
if (isset($_POST['productname'])) {
	
	$sql = mysql_query("SELECT * FROM registerdetail WHERE id='$managerID' LIMIT 1");
		while ($row = mysql_fetch_array($sql)) {
			$fname = $row["fname"];
			$lname = $row["lname"];
			$name = $fname." ".$lname;
			$email = $row["email"];
			$mobileno = $row["mobileno"];
			
		}
	$pid = mysql_real_escape_string($_POST['thisID']);
	$productname = mysql_real_escape_string($_POST['productname']);
	$query = mysql_real_escape_string($_POST['query']);
	
	// See if that product name is an identical match to another product in the system
	$sql = mysql_query("INSERT INTO support_table (suid, name, productname, email, mobileno, query, complain_date) 
        VALUES('$pid','$name','$productname','$email','$mobileno','$query',now())") or die (mysql_error());
		$to = $email;
$subject = "Complain email for StationShop";
$message = $fname.",

Your Complain has been registered successfully.";

 
 $headers = array ('From' => $from,
   'To' => $to,
   'Subject' => $subject);
 $smtp = Mail::factory('smtp',
   array ('host' => $host,
     'auth' => true,
     'username' => $username_email,
     'password' => $password_email));
 
 $mail = $smtp->send($to, $headers, $message);
	
	echo "<script language=javascript> alert(' You have been logged your query Successfully!!!! ') </script>";
	echo "<script>window.location = 'index.php';</script>";
}
?>
<?php include_once("template_header.php");?>
        <div id="content" class="float_r">
        <h1>&nbsp;</h1>
        	<h5>&nbsp;</h5>
            <div id="center-column2">
                <hr />
                <center >
                  <a name="inventoryForm" id="inventoryForm"></a>
                </center>
                <center >
                  <h3> &darr; Enter Your Query Here &darr; </h3>
                </center>
                <form action="complain.php" enctype="multipart/form-data" name="myForm" id="myform" method="post">
                  <table width="90%" border="0" cellspacing="0" cellpadding="6">
                    
                    <tr>
                      <td align="right">Product Name</td>
                      <td>
                      <input type="text" name="productname" id="productname" /></td>
                    </tr>
                   <tr>
        <td align="right">Query</td>
        <td><label for="query"></label>
          <textarea name="query" id="query" cols="45" rows="5"></textarea></td>
      </tr>
                    
                   
                    
                      <td>&nbsp;</td>
                      <td><label>
                        <input name="thisID" type="hidden" value="<?php echo $targetID; ?>" />
                        <input type="submit" name="button" id="button" value="Make Changes" />
                      </label></td>
                    </tr>
                  </table>
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
            
</div> 
        <div class="cleaner"></div>
    </div> 
    
   <?php include_once("template_footer.php");?>