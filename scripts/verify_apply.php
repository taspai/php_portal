<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "GET") {
      $_SESSION['app_id'] = $_GET['id'];
      $_SESSION['app_result'] = $_GET['result'];
      // Again there are tons of security issues with this. Bare database use, no encryption in link
      // but again it is ommited as it is not the main focus at this time
      // There are many ways to make verification links secure, but not enough time right now
      $newstatus = ($_GET['result'] == 0 ? 2 : 1); 
      //Prepare and make the SQL query for the login
      $sql = "UPDATE application SET status = ".$newstatus." WHERE id = ".$_GET['id'];
      $result = mysqli_query($link,$sql);

      //send_email();
  }
?>
