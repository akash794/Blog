<!DOCTYPE html>
<html>
<head>

<?php
include("../test/class/class.php");
session_start();
if(!isset($_SESSION['userId'])){include("headers/hpindex");}
$obj = new DB();
$obj2= new post();
$data = $obj2->postdelete();

mysqli_close($this->connect);






?>



</body>
</html>
