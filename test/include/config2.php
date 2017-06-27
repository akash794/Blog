
<html>
<head>
<?php
#require_once('/home/gesdgd418/Documents/testBlog/include/config.php');

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'mysql';
$db = 'post';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db);
if(! $conn )
{
  die('Could not connect: ' . mysqli_error());
}
?>
</head></html>
