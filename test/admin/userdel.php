<!DOCTYPE html>
<html>
<head>

<?php

include("/var/www/html/test/class/class.php");
if($_SESSION['role']!=3){$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = "test/postindex.php";
header("Location: http://$host/$extra");
exit;
}





if($_GET['uid']!="" ){$obj = new DB();
$obj2= new user();
 $obj2->userdel($_GET['uid']);


$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = "/test/admin/userindex.php?ul_Id=".$_SESSION['userId'];
header("Location: http://$host/$extra");}mysqli_close($this->connect);
?>

</head>
<body>
</body>
</html>
