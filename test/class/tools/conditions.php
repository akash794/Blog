<?php








<html>
<?php 
#any user
if(isset($_SESSION['userId'])){

echo "<p align='left'><a href= 'postsubmit.php'>submit a post</a></p><br></br>";
echo "<p align='left'><a href=logout.php>logout</a></p>";

}

#user or admin
elseif(isset($_SESSION['userId']) or ($_SESSION['role']==3){}

echo "<p align='left'><a href= 'postsubmit.php'>submit a post</a></p><br></br>";
echo "<p align='left'><a href=logout.php>logout</a></p>";
#strict admin
elseif(isset($_SESSION['userId']) and ($_SESSION['role']==3){

echo "<p align='left'><a href=testblog/admin/admin.php>admin panel</a></p><br></br>";
echo "<p align='left'><a href= 'postsubmit.php'>submit a post</a></p><br></br>";
echo "<p align='left'><a href=logout.php>logout</a></p>";

}

#anoun
else{
echo"<p><a href='login.php'>user login</a></p><br></br>";
echo"<p><a href='login.php'>admin login</a></p><br></br>";

}
?>
</html>

?>
