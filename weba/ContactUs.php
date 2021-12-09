<!DOCTYPE html>
<html>
<head>
<title>Contact Us by Constantin in PHP</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
<form method='post' action='contactus.php'>
<table width ='600' border='8' align='center'>
<tr>
<td colspan='7'> <h1> CONTACT US  </h1> </td>
</tr>
<tr>
<td> Name: <input type ='text' name='name'></td><br>
</tr>
<tr>
<td>  Email: <input type ='text' name='email'></td><br>
</tr>
<tr>
<td> Message<input type ='text' name='message'></td></tr></br>
<tr><td colspan ='5' align ='center'> <br><br /><input type ='submit'  name = 'submit' value='send message'/></td>
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
die("Connection failed: ".mysqli_connect_error());
}

echo "Connected successfully";

error_reporting(E_ALL);
ini_set('display_errors',1);

if (isset($_POST['submit']))
{
	$a =$_POST['name'];
	$b =$_POST['email'];
	$c =$_POST['message'];
	if($a =='')

	{
		echo"<script> alert('please enter your name!')</script>";
		exit();
	}

	if($b == '')
	{
		echo"<script> alert('please enter your email!')</script>";
		exit();
	}

	if($c == '')
	{
		echo"<script> alert('please type your message!')</script>";
		exit();
			}



	$d ="insert into contactus(name,email,message)values('$a','$b','$c')";
						  
	if (mysqli_query($db,$d))
	{
		echo "<script> Alert('Message send successfully done'</script>";
	}
}
	
?>



