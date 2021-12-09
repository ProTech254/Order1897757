
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
</head>
<body>

<div class="header">
<img src = "pictures/logo.png" align = "left" ><h1>H2o Website</h1>
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
      
      <div class="image2" style="height:200px;">Image</div>
      <p>Famous reviews from our customers</p>
      <p>" I like the service of this company " ... john</p>
    </div>
  </div>
  <div class="rightcolumn">
    <div class="card">
      <h2>About Us</h2>
      <div class="fakeimg" style="height:100px;">Image</div>
      <p>Our address is :   </p>
    </div>
    <div class="card">
      <h3>Popular Recent sold prodcuts</h3>
      <div class="fakeimg"><p>Image</p></div>
      <div class="fakeimg"><p>Image</p></div>
      <div class="fakeimg"><p>Image</p></div>
    </div>
    <div class="card">
      <h3>Follow Me</h3>
      <p>logo facebook</p>
      <p>logo twitter</p>
       <p>logo instagram</p>
    </div>
  </div>
</div>

<div class="footer">
  <h2>constantin@copyright</h2>
</div>

</body>
</html>