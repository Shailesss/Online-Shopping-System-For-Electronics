<?php
session_start();

define("SITEURL","http://localhost/Online-Shoppy");
define("HOST","localhost");
define("USER","root");
define("PASSWORD","");
define("DATABASE","onlineshop");

$con = mysqli_connect(HOST, USER, PASSWORD) or die(mysqli_error());
$db_select = mysqli_select_db($con, DATABASE) or die(mysqli_error());
?>