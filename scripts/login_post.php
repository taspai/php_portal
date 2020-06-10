<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      // The real escape string function protects against hazzards such as sql injection attacks      
      $myusername = mysqli_real_escape_string($link,$_POST['username']);
      $mypassword = mysqli_real_escape_string($link,$_POST['password']); 
      // Honestly I feel there is a lot more to be done for security, like prepared statements
      // but I am omitting it for now as it is not the main focus at this time

      //Prepare and make the SQL query for the login
      $sql = "SELECT id, name FROM user WHERE email = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($link,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['name'];
	
      // It should be exactly one row
      $count = mysqli_num_rows($result);
      
      if($count == 1) {
         $_SESSION['login_user'] = $myusername;
         $_SESSION['login_id'] = $row['id'];
	 $_SESSION['login_name'] = $row['name'];
         $_SESSION["loggedin"] = true; // Store as logged in and redirect to welcome page 
	 header('Location: welcome.php');
         die();
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
