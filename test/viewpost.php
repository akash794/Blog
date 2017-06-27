	<!DOCTYPE html>
<html>
<head>
<style>
.two {
  position:absolute;
   top:0;
   right:0;
	
} 
</style>
<?php

include("../test/class/class.php");


$obj = new DB();
$obj2= new post();
$data = $obj2->viewpost();


    while($row = mysqli_fetch_assoc($data)){
        $post_title= $row['post_title'];
	 $post_category=$row['post_category'];
	$post_content=$row['post_content'];
	$author=$row['author'];
	$post_created=	$row['post_created'];					
	$post_updated= $row['post_updated'];
	$post_category= $row['categoryName'];}




 
?>

</head>
<body>
<form id="newPost" method="" >
<div>
<h1><b>THIS IS MY BLOG</b></h1>

<h3><p name= 'post_title' />TITLE:    <?php echo $post_title?></p></h3>
<p name= 'post_category'>
  <option value='1'>CATEGORY:  <b><?php echo $post_category?></b></option>

</select>
<br><b>POST BODY</b></br>
<textarea rows="10" cols="100"  name='post_content' readonly><?php echo $post_content?></textarea><br></br>
<p  type='text' name='author'>AUTHOR:<?php echo $author?></p>
post created:<?php echo $post_created?>
 post updated:<?php echo $post_updated?></p></div>
</form>

<div class="two" > <?php include("headers/logout.php");
?></div>

</body>
</html>


<?php 

include("comments/comments.php");
include("comments/submitcom.php");

mysqli_close($this->connect);?>






