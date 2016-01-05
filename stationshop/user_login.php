<?php 
session_start();
if (isset($_SESSION["manager"])) {
    header("location:index.php"); 
    exit();
}
?>

<?php 
// Parse the log in form if the user has filled it out and pressed "Log In"
if (isset($_POST["username"]) && isset($_POST["password"])) {

	$manager = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["username"]); // filter everything but numbers and letters
    $password = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password"]); // filter everything but numbers and letters
    // Connect to the MySQL database  
   include "functions/connect_to_mysql.php";
   echo $manager."<br>".$password;
    $sql = mysql_query("SELECT id FROM registerdetail WHERE username='$manager' AND password='$password' AND confirm='1' LIMIT 1"); // query the person
    // ------- MAKE SURE PERSON EXISTS IN DATABASE ---------
    $existCount = mysql_num_rows($sql); // count the row nums
    if ($existCount == 1) { // evaluate the count
	     while($row = mysql_fetch_array($sql)){ 
             $id = $row["id"];
		 }
		 $_SESSION["id"] = $id;
		 $_SESSION["manager"] = $manager;
		 $_SESSION["password"] = $password;
		 $sql = mysql_query("UPDATE registerdetail SET last_log_date = NOW() WHERE id ='$id'");
		 echo "<script>window.location = 'index.php';</script>";
         exit();
    } else {
		echo "<script language=javascript> alert(' That information is incorrect, try again ') </script>";
		echo "<script>window.location = 'user_login.php';</script>";
		exit();
	}
}
?>

<?php include_once("template_header.php");?>
      <div id="content" class="float_r">
      
        	
        <h1>LOGIN:</h1>
       <form name="login" method="post" action="user_login.php" >
        <table width="50%" border = "0" align="center">
         
	<tr>
	<td>USERNAME:</td>
	<td><input type="text" name="username" autofocus="autofocus"/>
	</td>
	</tr>
	<tr>
	<td>PASSWORD:</td>
	<td><input type="password" name="password"  />
	</td>
	</tr>
	<tr>
	<td>
	</td>
	<td>
	<a href="register.php">Register Here</a></td>
	</tr>
    <tr>
	<td>
	</td>
	<td>
	<a href="forget.php">Forgot your password?</a></td>
	</tr>
	<tr>
	<td></td>
	<td><input type="submit" value="Submit"  /></td>
	</tr>
    
	</table>
    </form>
   
    

      </div> 		
        
      </div>
              
    
       
<div class="cleaner">
    
    </div>
<?php include_once("template_footer.php");?>


	