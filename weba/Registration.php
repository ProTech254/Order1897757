<!DOCTYPE html>
<html>

<head>
<title>Registration by Constantin in PHP</title>
</head>

<body>

<form method="post" action="Registration.php">
<table width="600"  border= "8" align="center">
<tr>
<td colspan="7"> <h1>Registration for a new customer</h1></td>
</tr>
<tr>
<td>First name:<input type="text" name= "fname"></td><br>
</tr>
<tr>
<td>Last name:<input type="text" name= "lname"></td><br>
</tr>
<tr>
<td>Email:<input type="text" name= "email"></td><br>
</tr>
<tr>
<td>Password:<input type="password" name= "pass"></td><br>
</tr>
<tr>
<td>Confirm password:<input type="password" name= "cpass"></td><br>
</tr>
<tr>
<tr><td colspan = "5" align = "center"><br><br/>
<input type="submit" name="submit" value="Register now"/></td>
</tr>

</form>
</table>
</body>
</html>

<?php

define('DB_SERVER','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_DATABASE','ecommerce');

$db=mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD,DB_DATABASE);

//Check connection

if(!$db)
{
die("Connection failed:".mysqli_connect_error());
}
echo"Connected successfully";
error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_POST['submit']))
{
 $a=$_POST['fname'];
 $b=$_POST['lname'];
 $c=$_POST['email'];
 $d=$_POST['pass'];
 $e=$_POST['cpass'];

if($a=='')
{
 echo"<script>alert('Please enter your first name!')</script>";
  exit();
}
if($b=='')
{
 echo"<script>alert('Please enter your last name!')</script>";
  exit();
}
if($c=='')
{
 echo"<script>alert('Please enter your email!')</script>";
  exit();
}
if($d=='')
{
 echo"<script>alert('Please enter your password!')</script>";
  exit();
}
if($e =='')
{
 echo"<script>alert('Please confirm your password!')</script>"; 
  exit();
}

$f= "select * from registartion where email='$c'";
$g= mysqli_query($db,$f);

if(mysqli_num_rows($g)==1)
{
 echo"<script>alert('Email already exist!')</script>";
  exit();
}


$h="insert into registration(fname,lname,email,pass,cpass) values('$a','$b','$c','$d','$e')";

$i=mysqli_query($db,$h);
echo"<script>alert('Registration successfully done')</script>";
}
?>
























-
