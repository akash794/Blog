<?php

include("../test/class/class.php");

if(!isset($_SESSION['userId'])){die("cant logout meathead");}


$obj= new DB();
$obj2= new user();
 $obj2->logout();

$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = "test/postindex.php?";
header("Location: http://$host/$extra");

mysqli_close($this->connect);
?>
