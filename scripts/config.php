<?php
ini_set("log_errors", TRUE);
ini_set('error_log', "/home/dimian/php-error.log");
// I will not have too many prints so I will sloppily put them all in the error log
error_log("Hello errors");

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '12345678');
define('DB_NAME', 'HR');


/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);


// Check connection
if($link === false){
    echo "failed";
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
