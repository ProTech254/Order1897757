<!DOCTYPE html>
<html>
<head>
<title>Login Administrator</title>
</head>
<body>
<form method='post' action='loginadmin.php'>
<table width ='600' border='8' align='center'>
<tr>
<td colspan='7'> <h1> Log in As Administrator </h1> </td>
</tr>
<tr>
<td> Employee ID: <input type ='text' name='empid'></td><br>
</tr>
<tr>
<td>  Position: <input type ='text' name='position'></td><br>
</tr>
<tr>
<td> Password: <input type ='password' name='password'></td><br>
</tr>
<tr><td colspan ='5' align ='center'> <br><br /><input type ='submit'  name = 'submit' value='Login Now'/></td>
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

if (isset($_POST['submit']))
{
	$a =$_POST['empid'];
        $b =$_POST['position'];
	$c =$_POST['password'];
	
	if($a =='')

	{
		echo"<script> alert('please enter your employee ID!')</script>";
		exit();
	}

	if($b =='')
	{
		echo"<script> alert('please enter your position!')</script>";
		exit();
	}
       if($c =='')
	{
		echo"<script> alert('please enter your password!')</script>";
		exit();
	}
	
	$d= "select * from administration where emp_id='$a' AND password='$c'" ;

if ($e=mysqli_query($db,$d))
{
$f=mysqli_num_rows($e);
header('Location:http://localhost/adminright.php/');
exit();
}

else 

{
echo "invalid Login details ";
exit();
}

}

?>










