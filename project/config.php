<?php
//session and DB connection

$host = "localhost"; // Host
$user = "root"; // User
$password = ""; // Password 
$dbname = "php_db_practice"; // Database 

$con = mysqli_connect($host, $user, $password,$dbname);

// Check connection
if (!$con) {
   echo "Connection failed: " . mysqli_connect_error();
   die();
}
?>