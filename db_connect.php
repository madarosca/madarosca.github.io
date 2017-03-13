<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'website3');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die("Failed to connect to MySQL: " . mysqli_error($connection));
$select_db = mysqli_select_db($connection, 'website3');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}
header('Content-Type: text/html; charset=utf-8'); 

?>