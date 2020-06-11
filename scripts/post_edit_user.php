<?php
   include_once("config.php");
   include_once("session.php");
   session_start();

   if (!isset($_SESSION['admin'])){  
  	header("Location:welcome.php");
	die();
   }

   $error = "";
   if($_SERVER["REQUEST_METHOD"] == "POST") {
	if ($_POST['pass1'] !=  $_POST['pass2']){
		$error = "Passwords do not match";
	} elseif ($_POST['email'] == "") {
		$error = "Email is required";
	} else {		
	$id       = intval($_POST['id']);
	$name 	  = mysqli_real_escape_string ($link, $_POST['name']);
	$surname  = mysqli_real_escape_string ($link, $_POST['surname']);
	$email 	  = mysqli_real_escape_string ($link, $_POST['email']);
	$password = mysqli_real_escape_string ($link, $_POST['pass1']);

	// Create a format of the UPDATE query
	$sql = "UPDATE  user SET name = \"%s\" , surname = \"%s\", email = \"%s\", type_admin = %d "; 
	if ($_POST['pass1']!= ""){ //Password shall not change if left untouched
		$sql .= ", password = \"".$_POST['pass1']."\" ";
	}

	$sql .= "where id = ".$id." ;";
	
	// Fill the format with the values needed. 	
	$sql_filled = sprintf($sql, $name, $surname, $email, $_POST['type_admin']);
	// UPDATE user SET name = name , surname = sname, email = email, type_admin = type where id = num ;


		
	if (!$result = mysqli_query($link,$sql_filled)){
		$error = "Internal Server Error: \n".mysqli_sqlstate($link);
		error_log("Internal Server Error: ".mysqli_sqlstate($link));
	} else {
		header('Location: admin.php');
		die();
	}
     }
   }
?>
