<!DOCTYPE html>
<html>
<head>
<title>Feedback form by Constantin in PHP</title>
</head>
<body>
<form method='post' action='feedback.php'>
<table width ='1200' border='8' align='center'>
<tr>
<td colspan='7'> <h1> FEEDBACK  </h1> </td>
</tr>
<tr>
<td> Do you like our product ? </br>
<input type="radio" id="excellent" name="fav_language" value="Excellent">
<label for="html">Excellent</label><br>
<input type="radio" id="good" name="fav_language" value="Good">
<label for="html">Good</label><br>
<input type="radio" id="not good" name="fav_language" value="Not good">
<label for="html">Not good</label><br>
<input type="radio" id="bad" name="fav_language" value="Bad">
<label for="html">Bad</label><br></td>
</tr>
<tr>
<td> Is website easy to navigate ? say yes or no :<input type ='text' name='q2'></td><br>
</tr>
<tr>
<td> Overall experience was good ?say yes or no :<input type ='text' name='q3'></td><br>
</tr>
<tr>
<td> Are you going to buy more products from us in future? say yes or no :<input type ='text' name='q4'></td><br>
</tr>
<td> Do you recommend us to others ? say yes or no :<input type ='text' name='q5'></td><br>
</tr>
<tr><td>
<label for="w3review">Review your valuable comands:</label>
<textarea id="Comments" name="Comments" rows="4" cols="50">
  Please put your comments here.
  </textarea></td></tr>
<tr><td colspan ='5' align ='center'> <br><br /><input type ='submit'  name = 'submit' value='Send Feedback now'/></td>
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

echo "Connected successfully";

error_reporting(E_ALL);
ini_set('display_errors',1);

if (isset($_POST['submit']))
{
	$a =$_POST['q1'];
	$b =$_POST['q2'];
        $c =$_POST['q3'];
        $d =$_POST['q4'];
        $e =$_POST['q5'];

	
	if($a =='')

	{
		echo"<script> alert('please enter your answer for Question 1')</script>";
		exit();
	}

	if($b =='')
	{
		echo"<script> alert('please enter your answer for Question 2')</script>";
		exit();
	}

        if($c =='')

	{
		echo"<script> alert('please enter your answer for Question 3')</script>";
		exit();
	}
        if($d =='')

	{
		echo"<script> alert('please enter your answer for Question 4')</script>";
		exit();
	}
       if($e =='')

	{
		echo"<script> alert('please enter your answer for Question 5')</script>";
		exit();
	}


	
    
     $f = " insert into feedback (q1,q2,q3,q4,q5) values ('$a','$b','$c','$d','$e')";

    $g= mysql_query($db,$f);
   
    echo"<script> alert('Thankyou for feedback')</script>";

       
}

?>

