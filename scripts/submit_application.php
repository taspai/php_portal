<?php
   include_once("config.php");
   include_once("session.php");
   session_start();
   $error = "";
   if($_SERVER["REQUEST_METHOD"] == "POST") {
	$date_start = strtotime($_POST['Date_start']);
	$date_end   = strtotime($_POST['Date_end']);
	$date_now   = strtotime(date("Y-m-d"));

	error_log("date start : ".$date_start." date end: ".$date_end." date now : ".$date_now);
	// it is unclear if reason can be blank, or any other limitations take place.
	if ($date_start && $date_end && $date_start > $date_now && $date_end > $date_start) {
		$day_num = round(($date_end - $date_start)/(60 * 60 * 24));
		// normally leave days only count on weakdays/work days. Weekends and holidays 
		// should be accounted for this normally, but maybe some other time
		// Also the statement bellow is completely unreadable. TODO fix
		$reason = mysqli_real_escape_string ($link, $_POST['reason']);
		$sql = "INSERT INTO application (uid, date_submitted, date_from, date_to, days, text, status)". 
			" VALUES (".$_SESSION['login_id'].", CURDATE(), \"".date("Y-m-d", $date_start).
	                "\", \"".date("Y-m-d", $date_end)."\", ".$day_num.", \"".$reason."\", 0); ";
		// This string should output : "INSERT INTO application (uid, date_submitted, date_from, date_to, days, text, status)
		// VALUES (id, CURDATE(), date_from, date_to, num, text, 0)"

		error_log($sql);
		
		if (!$result = mysqli_query($link,$sql)){
			$error = "Internal Server Error: \n".mysqli_sqlstate($link);
		} else {
			$headers = 'From: webmaster@example.com' . "\r\n";
			$headers .= 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
			$message = "Dear supervisor, employee ".$_SESSION['login_user']." requested \r\n".
				"for some time off, starting on ".date("Y-m-d", $date_start)."\r\n".
				"and ending on ".date("Y-m-d", $date_end).",\r\n".
				"stating the reason: ".$reason."\r\n".
				"Click on one of the below links to approve or reject the application:\r\n";
			$message .= "<a href='http://localhost/verify.php?id=".mysqli_insert_id($link)."&result=0'>Reject</a>  -  ";
			$message .= "<a href='http://localhost/verify.php?id=".mysqli_insert_id($link)."&result=1'>Accept</a>";
			error_log($message);
			$sql = "SELECT email FROM user where type_admin = 1";
			if (!$result = mysqli_query($link,$sql)){
				$error = "Internal Server Error: \n".mysqli_sqlstate($link);
			} else {
      				$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
				mail($row['email'], "Leave request", $message, $headers);
				header('Location: welcome.php');
				die();
			}
		}
      	}else {
        	$error = "Invalid dates";
	}
   }
?>
