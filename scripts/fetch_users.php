<?php
   include_once("config.php");
   session_start();
   
   //Prepare and make the SQL query for the login
   $sql = "SELECT id, name, surname, email, type_admin  FROM user";
   $result = mysqli_query($link,$sql);
   
?>
