





<?php


 include("var/www/html/testBlog/include/config.php") ;

#strict admin
if(isset($_SESSION['userId']) and ($_SESSION['role']==3)){
echo"<a href='/test/admin/userindex.php'>1.user list</a>";
}

?>


