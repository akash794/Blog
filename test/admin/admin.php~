<!DOCTYPE html>
<html>
<title>admin panel</title>

<?php
include("/var/www/html/test/class/class.php");
if($_SESSION['role']!=3){$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = "test/postindex.php";
header("Location: http://$host/$extra");
exit;
}

?>

<head> <h1>Blog Name</h1>
<style>

h1   {color: blue;}
p    {color: red;}

</style>

</head>
<body>
<table><h3>Admin Panel</h3>

<tr><?php include("/var/www/html/test/headers/ulist.php");

?></tr>
<tr><?php include("/var/www/html/test/headers/adduser.php");

?></tr>


</tr>

<tr><a href='/test/postindex.php'>2.post</a></tr>
 <tr>

</tr>

<th>3.comments</th>
 
<td>add comment</td>
<td>delete commment</td>
<td>hide comment</td>
</tr>







</table>
<p><?php include("/var/www/html/testBlog/headers/logout.php");

?>
</html>
