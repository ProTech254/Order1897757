<!DOCTYPE html>
<html>

<head>
<title>Registration by Constantin in PHP</title>
<link rel="stylesheet" href="styles.css">
</head>

<body>

<form action="registration.php" method="post">
  <div class="imgcontainer">
    <p>Register as a customer</p>
  </div>

  <div class="container">
    <label for="uname"><b>FirstName</b></label>
    <input type="text" placeholder="Enter firstname" name="fname" required>

    <label for="uname"><b>LastName</b></label>
    <input type="text" placeholder="Enter lastname" name="lname" required>

    <label for="uname"><b>Email</b></label>
    <input type="text" placeholder="Enter email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="pass" required>

    <label for="psw"><b>Confirm Password</b></label>
    <input type="password" placeholder="Confirm Password" name="cpass" required>

    <button type="submit" name = "submit">Login</button>
    
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button"  class="cancelbtn">Cancel</button>
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
 }else{
   echo "database connected";
 }


if(isset($_POST['submit']))
{
 $a=$_POST['fname'];
 $b=$_POST['lname'];
 $c=$_POST['email'];
 $d=$_POST['pass'];
 $e=$_POST['cpass'];

 if($e == $d)
    {
        echo "passwords same";
    
        //INSERT USER DATA INTO THE USERS TABLE

        //hash user password
        // $hashed_password = hash('sha512', $user_password);
            $sql_insert = "INSERT INTO users (
                 fname,
                 lname,
                 email,
                 password
                ) VALUES (
                    '$a',
                    '$b',
                    '$c',
                    '$d'
                    )";

        if(mysqli_query($conn, $sql_insert)){
            echo "user succesfully inserted";
            // echo $hashed_password;

            //after succesful registration login user to create a session and direct to home page
            $sql_select_user = "SELECT * FROM users WHERE email ='".$c."' AND password ='".$d."' limit 1";
            $user_result = mysqli_query($conn, $sql_select_user);
            $row = mysqli_fetch_array($user_result);

            if(mysqli_num_rows($user_result) == 1 ){

                $_SESSION['user_id'] = $row['id'];
               
                $_SESSION['register_message'] = 'Successfully logged in!';
                $_SESSION['register_msg_type'] = 'success';
                header('location: homepage.php');
                
            }else{
                echo 'user not found';
                $_SESSION['register_message'] = 'If you have registered continue to login';
                $_SESSION['register_msg_type'] = 'danger';
                header('location: registration.php');
            }
            
            
            

        
        }
        else{
            echo "ERROR: Could not insert data" . mysqli_error($conn);
        }
    }else{
            echo 'Passwords did not match';
            $_SESSION['register_message'] = 'Paaswords did not match';
            $_SESSION['register_msg_type'] = 'danger';
            header('location: ../pages/account.php');
    }
}
?>
























-
