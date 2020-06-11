<?php
   include_once('config.php');
   session_start();

   // Very simplistic, good for demo purposes only
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
      die();
   }
   
?>
