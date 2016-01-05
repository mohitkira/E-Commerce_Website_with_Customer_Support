<?php 
session_start();
if (isset($_SESSION["manager"])) {
    header("location: index.php"); 
    exit();
}
?>
<?php 
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
include "functions/connect_to_mysql.php";


if (isset($_POST['fname'])) {
	$dob="0000-00-00";
	$fname = mysql_real_escape_string($_POST['fname']);
	$lname = mysql_real_escape_string($_POST['lname']);
	$username = mysql_real_escape_string($_POST['username']);
	$repassword = mysql_real_escape_string($_POST['repassword']);	
	$password = mysql_real_escape_string($_POST['password']);
	$gender = $_POST['gender'];
	$dob = mysql_real_escape_string($_POST['dob']);
	$mobileno = mysql_real_escape_string($_POST['mobileno']);
	$country = mysql_real_escape_string($_POST['country']);
	$state = mysql_real_escape_string($_POST['state']);
	$city = mysql_real_escape_string($_POST['city']);
	$email = mysql_real_escape_string($_POST['email']);
	$address = mysql_real_escape_string($_POST['address']);
	if(empty($fname)){
		echo "<script language=javascript> alert(' first name should not be blank!! ') </script>";
	echo "<script>window.location = 'register.php';</script>";
		
	}else{
		if(empty($lname)){
		echo "<script language=javascript> alert(' last name should not be blank!!!') </script>";
	echo "<script>window.location = 'register.php';</script>";
		
	}else{
		if(empty($username)){
		echo "<script language=javascript> alert('username should not be blank!!!') </script>";
	echo "<script>window.location = 'register.php';</script>";
		
	}else{
		if(empty($password)){
		echo "<script language=javascript> alert('password should not be blank!!!') </script>";
	echo "<script>window.location = 'register.php';</script>";
		
	}else{
		if(empty($mobileno) || !is_numeric($mobileno)){
		echo "<script language=javascript> alert('Mobile no. is blank or you entered text!!!!') </script>";
	echo "<script>window.location = 'register.php';</script>";
		
	}else{
		if(empty($email)){
		echo "<script language=javascript> alert('email should not be blank!!!') </script>";
	echo "<script>window.location = 'register.php';</script>";
		
	}else{
	if($password != $repassword){
		echo "<script language=javascript> alert(' Password Does not Match!!! ') </script>";
	}else{
	$sql = mysql_query("SELECT id FROM registerdetail WHERE username='$username' LIMIT 1");
	$productMatch = mysql_num_rows($sql); // count the output amount
    if ($productMatch > 0) {
		echo "<script language=javascript> alert(' Sorry you tried to place a duplicate Username into the system!!! ') </script>";
	echo "<script>window.location = 'register.php';</script>";
	}
	else{
	$sql = mysql_query("SELECT id FROM registerdetail WHERE email='$email' LIMIT 1");
	$productMatch = mysql_num_rows($sql); // count the output amount
    if ($productMatch > 0) {
		echo "<script language=javascript> alert(' This E-mail is already register!!! ') </script>";
	echo "<script>window.location = 'register.php';</script>";
	}
	else
	{

	$sql = mysql_query("INSERT INTO registerdetail (fname, lname, username, password, gender, dob, mobileno, email, country, state, city, Address,  date_added) 
        VALUES('$fname','$lname','$username','$password','$gender','$dob','$mobileno','$email','$country','$state','$city','$address',now())") or die (mysql_error());
		$sql = mysql_query("SELECT * FROM registerdetail WHERE username='$username' AND password='$password' LIMIT 1");
		while ($row = mysql_fetch_array($sql)) {
			$mid = $row["id"];
		}
$to = $email;
$subject = "Confirmation email for StationShop";
$message = "$fname,

Thank you for signing up with Stationshop. Please click this link to activate your account: 

http://".$site_url_address."/confirmed.php?chid=".$mid."

(If clicking the link in this message does not work, copy and paste it into the address bar of your browser .)";

$headers = "From:" . $from;
/*
mail($to,$subject,$message,$headers);
*/

 
 $headers = array ('From' => $from,
   'To' => $to,
   'Subject' => $subject);
 $smtp = Mail::factory('smtp',
   array ('host' => $host,
     'auth' => true,
     'username' => $username_email,
     'password' => $password_email));
 
 $mail = $smtp->send($to, $headers, $message);
 
/*
 if (PEAR::isError($mail)) {
   echo("<p>" . $mail->getMessage() . "</p>");
  } else {
   echo("<p>Message successfully sent!</p>");
  }
*/






$m = "Thank you ".$fname." for signing up with Stationshop. Please check your email-id for confirmation.";
$curl_handle=curl_init();
 curl_setopt($curl_handle, CURLOPT_URL, 'http://ubaid.tk/sms/sms.aspx?uid=7276671866&pwd=mohit&msg='.urlencode($m).'&phone='.urlencode($mobileno).'&provider=Site2Sms');
curl_exec($curl_handle);
curl_close($curl_handle);

		
echo "<script language=javascript> alert(' You have Register Successfully!!! Confirmation email has been emailed to your email-id') </script>";
	echo "<script>window.location = 'user_login.php';</script>";
	}
}
}}}}}}}}
?>
<?php include_once("template_header.php");?>
      <div id="content" class="float_r">
      
        	
        <h1> User Registeration:</h1>
       
        <table width="90%" border = "0">
         <form name="register" method="post"  action="register.php" >
       
 <tr>
          <td width="110">First Name:</td>
          <td width="155"><input type="text" id="fname" name="fname"/>
          </td>
          <td width="67">Last Name:</td>
          <td width="329"><input type="text" id="lname" name="lname" />
          </td>
</tr>
<tr>
	<td>
    UserName:
    </td>
    <td>
    <input type="text" id="username" name="username" />
    </td>
    </tr>
    <tr>
    <td>
    Password:
    </td>
    <td><input type="password" id="password" name="password" />
    </td>
    
    </tr>
<tr>

</tr>
    <tr>
    <td>
    ReType Password:
    </td>
    <td>
    <input type="password" id="repassword" name="repassword" />
    </td>
    </tr>
    
<tr>
		<td>Gender:</td>
		<td>Male:<input type="radio" name="gender" id="gender" value="male" checked="checked"/>
        Female:
        <input type="radio" value="female" id="gender" name="gender"/>
        </td>
         </tr>
         <tr>
         <td>
         Date of birth:
         </td>
         <td>
   <input type="date" name="dob" id="dob" />
				          
 </td></tr>
 
         <tr>
         <td>Mobile No:</td>
         <td><input type="text" name="mobileno" id="mobileno" maxlength="10" /></td>
         </tr>
         <tr>
         <td>E-Mail:
         </td>
         <td>
         <input type="email" name="email" id="email" />
         </td>
         </tr>
         <tr><td></td><td>Please Enter Valid Email-id.</td></tr>
         <tr>
 <td>Country</td>
 <td><input type="text" name="country" id="country" />
 </td>
 <tr>
 <td>
 State:
 </td><td><input type="text" name="state" id="state" />
 </td>
 <td>City:
 </td>
 <td><input type="text" name="city" id="city" />
 </td>
 </tr>
        </table>
        <table width="90%" border="0">
        <tr>
        <td width="106" height="80%">
        Address:
        </td>
       
        <td width="523"><textarea name="address"  id="address" cols="50" rows="5">
        </textarea></td></tr>
        <tr>
        </tr>
        <tr>
        </tr>
        <tr>
        <td>
        </td>
        <td><input type="submit" value="Submit"/></td>
        </tr></table>
        </form>
      </div> 		
        
      </div>
              
    
       
<div class="cleaner">
    
    </div>
<?php include_once("template_footer.php");?>