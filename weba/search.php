<!DOCTYPE html>
<html>
<head>
<title>Serch product</title>
</head>

<body>
<h1>Search your product</h1>
<form action="search.php" method="get">
<input type="text" name="search" placeholder="Search here...">
<input type="button" name="submit" value="Submit">
</form>

</body>
</html>

<?php

// Database configuration  
$dbHost     = "localhost";  
$dbUsername = "root";  
$dbPassword = "";  
$dbName     = "ecommerce";
 
// Create database connection  
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);  
 
// Check connection  
if ($db->connect_error) {  
    die("Connection failed: " . $db->connect_error);  
}

// Once connected, disable else
else {

echo "You are connected!";  
}

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
// posts results gotten from database
}

}
else{ // if there is no matching rows do following
echo "No results";
}

}
else{ // if query length is less than minimum
echo "Minimum length is ".$min_length;
}
}


 ?>
