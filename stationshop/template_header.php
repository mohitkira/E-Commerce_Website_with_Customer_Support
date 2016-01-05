<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Station Shop</title>
<link href="css/templatemo_style.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/ddsmoothmenu.js">


</script>

<script language="javascript" type="text/javascript">
function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
</script>

<script type="text/javascript">

ddsmoothmenu.init({
	mainmenuid: "top_nav", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

</script>

<link rel="stylesheet" type="text/css" media="all" href="css/jquery.dualSlider.0.2.css" />

<script src="js/jquery-1.3.2.min.js" type="text/javascript"></script>
<script src="js/jquery.easing.1.3.js" type="text/javascript"></script>
<script src="js/jquery.timers-1.2.js" type="text/javascript"></script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-34546889-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>

<body>

<div id="templatemo_wrapper">
	<div id="templatemo_header">
    	
    	<div id="site_title">
        	<h1><a href="index.php"></a></h1>
        </div>
        
        <div id="header_right">
	        <a href="user_account.php">My Account</a> | <a href="shoppingcart.php">My Cart</a>  | 
			 <?php 
			
			if(isset($_SESSION["manager"])){
				echo '<a href="logout.php"> Logout </a> | ';
				echo "<b><i>Hello</i></b> "."<b><i>".$manager."</i></b>";
			}
			else
			{ echo '<a href="user_login.php"> Login </a>';
				}
			 ?>
		</div>
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_header -->
    
    <div id="templatemo_menu">
    	<div id="top_nav" class="ddsmoothmenu">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="index.php">Products</a>
                    <ul>
                        <li><a href="catagory.php?catagory=computer">Computer</a></li>
                        <li><a href="catagory.php?catagory=laptop">Laptops</a></li>
                        <li><a href="catagory.php?catagory=ram">RAM</a></li>
                        <li><a href="catagory.php?catagory=processor">Processor</a></li>
                        <li><a href="catagory.php?catagory=motherboard">Motherboard</a></li>
                        <li><a href="catagory.php?catagory=graphicscard">Graphics Card</a></li>
                        <li><a href="catagory.php?catagory=harddisk">Hard Disk</a></li>
                        <li><a href="catagory.php?catagory=other+product">Other Products</a></li>
                  </ul>
                </li>
                <li><a href="about.php">About</a>
                    </li>
                <li><a href="faqs.php">FAQs</a></li>
                <li><a href="shoppingcart.php">MyCart</a></li>
                <li><a href="support.php">Support</a></li>
            </ul>
            <br style="clear: left" />
        </div> <!-- end of ddsmoothmenu -->
         <div id="menu_second_bar">
        	<div id="top_shopping_cart">
            <strong></strong> 
            </div>
        	<div id="templatemo_search">
                 <form action="search.php" method="post">
                <input type="text" value="Search" name="keyword" id="keyword" title="keyword" onfocus="clearText(this)" onblur="clearText(this)" class="txt_field" />
                  <input type="submit" name="Search" value=" Search " alt="Search" id="searchbutton" title="Search" class="sub_btn"  />
                </form>
            </div>
            <div class="cleaner"></div>
    	</div>
    </div> <!-- END of templatemo_menu -->
    
    <div id="templatemo_main">
   		<div id="sidebar" class="float_l">
        	<div class="sidebar_box">
            	<h3>Categories</h3>   
                <div class="content"> 
                	<ul class="sidebar_list">
                    	<li class="first"><a href="catagory.php?catagory=computer">Computer</a></li>
                        <li><a href="catagory.php?catagory=laptop">Laptops</a></li>
                        <li><a href="catagory.php?catagory=ram">RAM</a></li>
                        <li><a href="catagory.php?catagory=processor">Processor</a></li>
                        <li><a href="catagory.php?catagory=motherboard">Motherboard</a></li>
                        <li><a href="catagory.php?catagory=graphicscard">Graphics Card</a></li>
                        <li><a href="catagory.php?catagory=harddisk">Hard Disk</a></li>
                        <li><a href="catagory.php?catagory=other+product">Other Products</a></li>
                      
                    </ul>
                </div>
            </div>
            <div class="sidebar_box">
            <h3>Best Sellers </h3>   
                <div class="content"> 
                	<?php 
include "functions/connect_to_mysql.php"; 
$sql = mysql_query("SELECT * FROM productmaster WHERE catagory = 'other product' LIMIT 4");
$productCount = mysql_num_rows($sql); // count the output amount
if ($productCount > 0) {
	
	while($row = mysql_fetch_array($sql)){ 
             $id = $row["pid"];
			 $product_name = $row["product_name"];
			 $price = $row["price"];
			 $availability = $row["avail"];
			 $manufacturer = $row["manufacturer"];
			 $model = $row["model"];
			 $date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));
			
			 
			 echo '<div class="bs_box">
            	<a href="anyproduct.php?pid='.$id.'"><img src="images/'.$id.'.jpg" width="58" height="58" alt="Image 01" /></a>
                <h4><a href="anyproduct.php?pid='.$id.'">'.$product_name.'</a></h4>
                <p class="price">Rs.'.$price.'</p>
				<div class="cleaner"></div>
				</div>
                    
               ';
			 
    }
} else {
	$product_list = "You have no products listed in your store yet";
}
?>
                </div>
            </div>
        </div>