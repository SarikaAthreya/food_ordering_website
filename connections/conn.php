<?php
//start session
session_start();
define('LOCALHOST','localhost');
define('USERNAME','root');
define('PASSWORD','');
define('DB_NAME','dessert_order');
define('HOME','http://localhost/lavender&purplewebsite/');
$conn= mysqli_connect(LOCALHOST,USERNAME,PASSWORD) or die(mysqli_error());
$db_select= mysqli_select_db($conn,DB_NAME) or die(mysqli_error());
?>