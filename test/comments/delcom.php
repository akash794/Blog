<!DOCTYPE html>
<html>
<head>

<?php
 include("/var/www/html/test/class/class.php");

if(!isset($_SESSION['userId'])){die("cant delete it sucka");}

$obj = new DB();
$obj2= new comment();
$obj2-> delcom($_GET['comId']);


$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = "test/viewpost.php?pid=".$_GET['pid'];
header("Location: http://$host/$extra");



mysqli_close($this->connect);
?>



</body>
</html>
