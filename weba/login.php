<!DOCTYPE html>
<html>
<head>
<title>Login by Constantin in PHP</title>
</head>
<body>
<form method='post' action='login.php'>
<table width ='600' border='8' align='center'>
<tr>
<td colspan='7'> <h1> Log in As Existing Customer  </h1> </td>
</tr>
<tr>
<td> Email: <input type ='text' name='email'></td><br>
</tr>
<tr>
<td>  Password: <input type ='password' name='pass'></td><br>
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
	$a =$_POST['email'];
	$b =$_POST['pass'];
	
	if($a =='')

	{
		echo"<script> alert('please enter your email!')</script>";
		exit();
	}

	if($b =='')
	{
		echo"<script> alert('please enter your password!')</script>";
		exit();
	}
	
	$c= "select * from registration where email='$a' AND pass ='$b'";

if($d=mysqli_query($db,$c))
{
$e=mysqli_num_rows($d);
echo "Hello customers ";
exit();
}

else 

{
echo "invalid Login details ";
exit();
}

}

?>











