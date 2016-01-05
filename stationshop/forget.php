

<?php 
include "functions/connect_to_mysql.php"; 
// Parse the log in form if the user has filled it out and pressed "Log In"
if (isset($_POST["username"])) 
{

	$manager = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["username"]); // filter everything but numbers and letters
       // Connect to the MySQL database  
	   $sql = mysql_query("SELECT id FROM registerdetail WHERE username='$manager' AND confirm='1' LIMIT 1"); // query the person
    // ------- MAKE SURE PERSON EXISTS IN DATABASE ---------
    $existCount = mysql_num_rows($sql); // count the row nums
    if ($existCount == 1) { // evaluate the count
	      
             $sql = mysql_query("SELECT * FROM registerdetail WHERE username='$manager'");
		while ($row = mysql_fetch_array($sql)) {
			$email = $row["email"];
			$password = $row["password"];
		}
		$to = $email;
$subject = "Your Password for login from StationShop";
$message = $manager.",

Your current login password for StationShop is ".$password;


 
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
		 } else {
		echo "<script language=javascript> alert(' Username does not exist, try again ') </script>";
		echo "<script>window.location = 'forget.php';</script>";
		exit();
	}
}
?>
<?php include_once("template_header.php");?>
        <div id="content" class="faq float_r">
			<div><h3>
            
           <form name="login" method="post" action="forget.php" >
           <center><p>Username :
  <input type="text" name="username",value="username" />
           </p>
           <p>&nbsp; </p>
           <p>Enter your username above password will be send to your email-id</p>
          <input type="submit" name="button" id="button" value="Submit" /></center>
         
           </form>
           </h3><br /><br />
            </div>
        </div> 
        <div class="cleaner"></div>
    </div> 
    
    <?php include_once("template_footer.php");?>