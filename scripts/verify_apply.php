<?php
   include_once("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "GET") {
	   //These two are used in the front end to show which application and what the result was.
      	$_SESSION['app_id'] = $_GET['id'];
      	$_SESSION['app_result'] = $_GET['result'];
      	// Again there are tons of security issues with this. Bare database use, no encryption in link
      	// but again it is ommited as it is not the main focus at this time
      	// There are many ways to make verification links secure, but not enough time right now
	$newstatus = ($_GET['result'] == 0 ? 2 : 1); 
        //Prepare and make the SQL query for the login
	$sql = "UPDATE application SET status = ".$newstatus." WHERE id = ".$_GET['id'];
	$result = mysqli_query($link,$sql);
	
	// Find user's email and submission date from the application id.
	$sql = "SELECT email, date_submitted FROM user INNER JOIN application ON user.id = application.uid 
		WHERE application.id =".$_GET['id'].";";

	$headers = 'From: webmaster@example.com' . "\r\n";
	$headers .= 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";


		if (!$result = mysqli_query($link,$sql)){
			$error = "Internal Server Error: \n".mysqli_sqlstate($link);
		} else {
			$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
			$message = "Dear employee, your supervisor has ".($_GET['result'] == 0 ? "rejected" : "accepted")." \r\n".
	      		"your application submitted on ".$row['date_submitted'];
			mail($row['email'], "Leave Request Review", $message, $headers);
		}
  }
?>
