<?php

include("../test/class/class.php");
session_start();




include("../test/class/class.php");


if(isset($_SESSION['userId'])){
$sql1="SELECT userId FROM session WHERE userId='".$_SESSION['userId']."'";
$qur=mysqli_query($conn,$sql1);
$num = mysqli_num_rows($qur);
if($num == 0){// remove all session variables
require("logout.php");}

}






mysqli_close($this->connect);


?>
