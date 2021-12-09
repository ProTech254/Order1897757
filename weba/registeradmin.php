<!DOCTYPE html>
<html>

<head>
<title>Registration by Constantin in PHP</title>
</head>

<body>

<form method="post" action="registeradmin.php">
<table width="600"  border= "8" align="center">
<tr>
<td colspan="7"> <h1>Registration for a new Admin</h1></td>
</tr>
<tr>
<td>ID:<input type="text" name= "id"></td><br>
</tr>
<tr>
<td>Position:<input type="text" name= "position"></td><br>
</tr>
<tr>
<td>Password:<input type="text" name= "password"></td><br>
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
 $a=$_POST['id'];
 $b=$_POST['position'];
 $c=$_POST['password'];

if($a=='')
{
 echo"<script>alert('Please enter your ID')</script>";
  exit();
}
if($b=='')
{
 echo"<script>alert('Please enter your position!')</script>";
  exit();
}
if($c=='')
{
 echo"<script>alert('Please enter your password!')</script>";
  exit();
}

$g="insert into administration(emp_id, position,password) values('$a','$b','$c')";

$i=mysqli_query($db,$g);
echo"<script>alert('Registration successfully done')</script>";
}
?>
























-
