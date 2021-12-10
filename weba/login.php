<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="styles.css">
<title>Login by Constantin in PHP</title>
</head>
<body>


<form action="login.php" method="post">
  <div class="imgcontainer">
    <p>Login as an existing customer</p>
  </div>

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="pass" required>

    <button type="submit">Login</button>
    
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
</form> 
</body>
</html>

<?php

$servername = "localhost";
 $dBusername = "root";
 $password = "";
 $dbname = "shop";
 
 // Create connection
 $conn = new mysqli($servername, $dBusername, $password, $dbname);
 // Check connection
 if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
 }

//  Attempt user login

if(isset($_POST['email']) && isset($_POST['pass'])){
	$email = $_POST['email'];  
	$pass = $_POST['pass'];  
	// $hashed_password = hash('md5', $password);
	
	$sql_select_user = "SELECT * FROM users WHERE email ='".$email."' AND password ='".$pass."' limit 1";
	$user_result = mysqli_query($conn, $sql_select_user);
	$row = mysqli_fetch_array($user_result);

	if(mysqli_num_rows($user_result) == 1 ){
		$_SESSION['login'] = $row['id'];
		
		$_SESSION['login_message'] = 'Successfully logged in!';
		$_SESSION['login_msg_type'] = 'success';
		echo "<br>";
		echo  $_SESSION['login_msg_type'];
		echo "<br>";
		
		
		header('location: homepage.php');
		
	}else{
		echo"<script> alert('User Not found!')</script>";
		echo 'agent not found';
		echo $hashed_password;
		echo '<br>';
		echo $password;
		$_SESSION['login_message'] = 'Incorrect credentials';
		$_SESSION['login_msg_type'] = 'danger';
		echo  $_SESSION['login_message'];
		header('location: login.php');
	}
}




?>











