<!DOCTYPE html>
<html>
<head>
<title>Admin Rights</title>
</head>
<body>
<form method='post' action='adminright.php'>
<table width ='600' border='8' align='center'>
<tr>
<td colspan='7'> <h1>Select one pf the option</h1> </td>
</tr>
<tr>
<td> Add product: <input type ='submit' name='submit1' value ='Add Product'></td><br>
</tr>
<tr>
<td>Check payment: <input type ='submit' name='submit2' value ='Check payment'></td><br>
</tr>
<tr>
<td> Add another admin: <input type ='submit' name='submit3' value ='Add another admin'></td><br>
</tr>
</form>
</table>
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
die("Connection failed:".mysqli_connect_error());
}

//echo "Connected successfully";

error_reporting(E_ALL);
ini_set('display_errors',1);

if (isset($_POST['submit3']))
{
header('Location:http://localhost/registeradmin.php/');

exit;	
}
?>










