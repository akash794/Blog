



<?php 



if((isset($_SESSION['userId']))  and ($_SESSION['role'] == 3)){

echo"<p ><a href=/test/logout.php>logout</a></p>";




}


elseif(isset($_SESSION['userId'])){

echo"<p ><a href=/test/logout.php>logout</a></p>";

}
?>

