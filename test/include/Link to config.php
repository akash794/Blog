
<?php





$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'mysql';
$db = 'post';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db);
if(! $conn )
{
  die('Could not connect: ' . mysqli_error());
}

	session_start();
include_once("/var/www/html/testBlog/session.php");





?>




