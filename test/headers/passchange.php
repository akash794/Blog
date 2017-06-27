





<?php 





#user or admin
if(isset($_SESSION['userId'])){
echo"<p><a href='admin/passchange.php?uid=".$_SESSION['userId']."'>edit your password</a></p><br></br>";
}

?>

