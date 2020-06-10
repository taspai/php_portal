<?php
   include("config.php");
   session_start();
   
   //Prepare and make the SQL query for the login
   $sql = "SELECT application.id, name, surname, email, date_submitted, date_from, date_to, days, text, status  FROM user INNER JOIN application ON user.id = application.uid";
   $result = mysqli_query($link,$sql);
   
?>
