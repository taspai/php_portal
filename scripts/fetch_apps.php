<?php
   include_once("config.php");
   session_start();
   
   // Prepare and make the SQL query to get all applicationsl
   // It is unclear whether all users' applications should be included or "where uid = $_SESSION['login_id']" should be used
   // Because of sql date ordering and because we do not store time, applications made the same day will sometimes appear in 
   // different order
   $sql = "SELECT application.id, name, surname, email, date_submitted, date_from, date_to, days, text, status  FROM user INNER JOIN application ON user.id = application.uid ORDER BY date_submitted DESC";
   $result = mysqli_query($link,$sql);
   
?>
