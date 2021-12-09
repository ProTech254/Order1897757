<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_GET['action']) && $_GET['action']=="add"){
	$id=intval($_GET['id']);
	if(isset($_SESSION['cart'][$id])){
		$_SESSION['cart'][$id]['quantity']++;
	}else{
		$sql_p="SELECT * FROM products WHERE id={$id}";
		$query_p=mysqli_query($con,$sql_p);
		if(mysqli_num_rows($query_p)!=0){
			$row_p=mysqli_fetch_array($query_p);
			$_SESSION['cart'][$row_p['id']]=array("quantity" => 1, "price" => $row_p['productPrice']);
		
		}else{
			$message="Product ID is invalid";
		}
	}
		echo "<script>alert('Product has been added to the cart')</script>";
		echo "<script type='text/javascript'> document.location ='my-cart.php'; </script>";
}

?>

<html>
<head>
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial;
  padding: 10px;
  background: blue;
}

/* Header/Blog Title */
.header {
  padding: 30px;
  text-align: center;
  color: white;
  background: light-blue;
}

.header h1 {
  font-size: 50px;
   color: white;
}

/* Style the top navigation bar */
.topnav {
  overflow: hidden;
  background-color: blue;
}

/* Style the topnav links */
.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

/* Change color on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}

/* Create two unequal columns that floats next to each other */
/* Left column */
.leftcolumn {   
  float: left;
  width: 75%;
}
/* search bar  */
.topnav input[type=text] {
  float: right;
  padding: 6px;
  margin-top: 8px;
  margin-right: 16px;
  border: none;
  font-size: 17px;
}
/* Right column */
.rightcolumn {
  float: left;
  width: 25%;
  background-color: #f1f1f1;
  padding-left: 20px;
}

/* Fake image */
.fake img {
  background-color: #aaa;
  width: 100%;
  padding: 20px;
}

/* Add a card effect for articles */
.card {
  background-color: white;
  padding: 20px;
  margin-top: 20px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Footer */
.footer {
  padding: 20px;
  text-align: center;
  background: #ddd;
  margin-top: 20px;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 800px) {
  .leftcolumn, .rightcolumn {   
    width: 100%;
    padding: 0;
  }
}

/* Responsive layout - when the screen is less than 400px wide, make the navigation links stack on top of each other instead of next to each other */
@media screen and (max-width: 400px) {
  .topnav a {
    float: none;
    width: 100%;
  }
}
</style>

<!-- <link rel="stylesheet" href="assets/css/main.css"> -->
<link rel="shortcut icon" href="assets/images/favicon.ico">

</head>
<body>

<div class="header">
<img src = "pictures/logo.png" align = "left" >
<h1>H2o Website</h1>
  <p>We are Europe no.1 water suppliers</p>
</div>

<div class="topnav">
  <a href="product.php">Products</a>
  <a href="login.php">Login</a>
  <a href="Registration.php">Register</a>
 <a href="ContactUs.php">Contact Us</a>
  <a href="Feedback.php">Feedback</a>
  <a href="">Get a quote</a>
  <a href="registeradmin.php">Register Web Master</a>
  <a href="loginadmin.php">Login Web Master </a>
  <a href="#" style="float:right">chat</a>
 <input type="text" placeholder="Search..">
</div>

<div class="row">
  <div class="leftcolumn">
    <div class="card">
     <center> <h1>Welcome to H2On website</h1></center>
      
      <div class="image" style="height:200px;"><center><img src = "pictures/img9.jpg"  width="400" height="200" ></center></div>
<br>
<br>
<br>

      <p>Our products are the best prodcuts in the Europe</p>
      <p>Most efficient products in the Europe</p>
    </div>
    <div class="card">
      <h2>Our famous Products</h2>
      <div class="image2" style="height:350px;">
      <?php
$ret=mysqli_query($con,"select * from products  where id between 1 and 5");
while ($row=mysqli_fetch_array($ret)) 
{
	# code...


?>					    	
<div class="det" style="float:left;">
			
				<a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>">
				<img  src="pictures/<?php echo htmlentities($row['productImage1']);?>" data-echo="pictures/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>"  width="180" height="300" alt=""></a>
			
                <center>
                <h3 class="name"><a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($row['productName']);?></a></h3>
                </center>
           	
                </div>
	
	<?php } ?>
    </div><!-- /.image -->		
   
      <p>Famous reviews from our customers</p>
      <p>" I like the service of this company " ... john</p>
    </div>
  </div>
  <div class="rightcolumn">
    <div class="card">
      <h2>About Us</h2>
     

      
      <?php
$ret=mysqli_query($con,"select * from products limit 1");
while ($row=mysqli_fetch_array($ret)) 
{
	# code...
?>


<div class="fakeimg" style="padding:14px;">
				<a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>">
				<img  src="pictures/<?php echo htmlentities($row['productImage1']);?>" data-echo="pictures/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>"  width="120" height="120" alt=""></a>
		

            </div><!-- /.image -->			
	<?php } ?>

      <p>Our address is :   </p>
      <p>412 - 01500 Calfornia, USA   </p>
      <p> Call </p>
      <p>+1-4589-7892   </p>
    </div>
    <div class="card">
      <h3>Popular Recent sold prodcuts</h3>

      <?php
$ret=mysqli_query($con,"select * from products where id between 10 and 13");
while ($row=mysqli_fetch_array($ret)) 
{
	# code...


?>


<div class="fakeimg" style="padding:14px;">
				<a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>">
				<img  src="pictures/<?php echo htmlentities($row['productImage1']);?>" data-echo="pictures/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>"  width="120" height="120" alt=""></a>
		

            </div><!-- /.image -->			
	<?php } ?>
   
    </div>
    <div class="card">
      <h3>Follow Me</h3>
     	
      <img  src="assets/images/facebook-logo.png"  width="40" height="40" alt="" style="float:left;"> <p>Facebook</p> <br>

      <img  src="assets/images/twitter-logo.png"  width="40" height="40" alt="" style="float:left"> <p>Twitter</p> <br>

      <img  src="assets/images/instagram-logo.jpg"  width="40" height="40" alt="" style="float:left;"> <p>Instagram</p><br>

    </div>
  </div>
</div>

<div class="footer">
  <h2>constantin@copyright</h2>
</div>

</body>
</html>