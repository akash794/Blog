<?php



if(isset($_SESSION['userId'])){
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

header("Location: http://$host/test/postindex.php");










?>
