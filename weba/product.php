<!DOCTYPE html>
<html>
<head>
<title>Serch product</title>
</head>

<body>
<h1>Search your product</h1>
<form action="product.php" method="get">
<input type="text" name="search" placeholder="Search here...">
<input type="button" name="submit" value="Submit">
<input type= reset>
</form>

</body>
</html>

<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'ecommerce');

$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);


// Check connection

if (!$db) 
{
die("Connection failed: ".mysqli_connect_error());
}

echo "Connected successfully";

error_reporting(E_ALL);
ini_set('display_errors',1);


if(isset($_GET['search'])) {
// Search database for products

$query = $_GET['search'];
// posts value sent over search form

$min_length = 3;
// you can set minimum length of the query if you want

if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then

$query = htmlspecialchars($query);
// changes characters used in html to their equivalents, for example: < to &gt;

$query = mysqli_real_escape_string($db, $query);
// makes sure nobody uses SQL injection

$raw_results = mysqli_query($db, "SELECT * FROM product
WHERE (`prod_name` LIKE '%".$query."%') OR (`prod_description` LIKE '%".$query."%')") or die(mysqli_error($db));

// * means that it selects all fields, you can also write: `prod_id`, `prod_name`, `prod_description`
// products is the name of our table

// '%$query%' is what we're looking for, % means anything, for example if $query is Hello
// it will match "hello", "Hello man", "gogohello", if you want exact match use `prod_name`='$query'
// or if you want to match just full word so "gogohello" is out use '% $query %' ...OR ... '$query %' ... OR ... '% $query'

if(mysqli_num_rows($raw_results) > 0){ // if one or more rows are returned do following

while($results = mysqli_fetch_array($raw_results)){
// $results = mysqli_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop

echo "<p><h3>".$results['prod_name']."</h3>".$results['prod_description']."</p>";
echo "<p><h3>£".$results['prod_price']."</h3></p>";
echo "<img src= '".$results['prod_image']."'>";
<p> No more products < a href="homepage.php"> Home </a> </p>
// posts results gotten from database
}

}
else { 
echo "No results";
}


}
//else{ // if query length is less than minimum
//echo "Minimum length is ".$min_length;
//}

}


 ?>
