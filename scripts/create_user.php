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
	} else {		
	$name = mysqli_real_escape_string ($link, $_POST['name']);
	$surname = mysqli_real_escape_string ($link, $_POST['surname']);
	$email = mysqli_real_escape_string ($link, $_POST['email']);
	$password = mysqli_real_escape_string ($link, $_POST['pass1']);

	error_log("name : ".$name." surname: ".$surname." email : ".$email." Pass: ".$password);
	$sql = "INSERT INTO user (name, surname, email, type_admin, password)". 
			" VALUES (\"".$name."\", \"".$surname."\", \"".$email."\", ".$_POST["type_admin"].", \"".$password."\"); ";
		// This string should output : "INSERT INTO user (name, surname, email, type_admin, password) 
		// VALUES ("name", "surname", "email", type, "pass");"
	error_log($sql);
		
	if (!$result = mysqli_query($link,$sql)){
		$error = "Internal Server Error: \n".mysqli_sqlstate($link);
	} else {
		header('Location: admin.php');
		die();
	}
     }
   }
?>
