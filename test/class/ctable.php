

<form id="newPost" method="POST">
category<select name="post_category" form="newPost" >
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

  
$sql="SELECT `cId` , `categoryName` , `description` , `status` , `parentC`
FROM `categories`
WHERE 1 ";
$retval = mysqli_query( $conn, $sql);
$num = mysqli_num_rows($retval);
if($num > 0){
while($row = mysqli_fetch_array($retval)){

$cId=$row['cId'];
$categoryname=$row['categoryName'];
$status=$row['status'];
$parentC=$row['parentC'];









echo"<option value='".$row['cId']."' selected>".$categoryname."</option>";
}}			?>

</select> </form id="newPost" method="POST">








