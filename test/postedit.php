<!DOCTYPE html>
<html>
<head>

<?php
ini_set('display_errors', '0');
include("../test/class/class.php"); $obj= new DB();
$obj2= new post();
$post_id=$_GET['pid'];

if(!isset($_SESSION['userId'])){die;}
####        add  userid
if($_POST['submit']=="Submit"){                          
//echo "<pre>";print_r($_POST);die;
//UPdate table: START
$post_id = $_POST['post_id'];
if(($post_id!="") ){ 
	echo"this is edit section";
	$post_title=$_POST['post_title'];
	$post_content=$_POST['post_content'];
	$post_category=$_POST['post_category'];
	$author=$_POST['author'];
	$post_updated= date("Y-m-d H:i:s");
	$post_status=$_POST['post_status'];
	
$a=$obj2->editpost($post_id,$post_title,$post_content,$post_category,$author,$post_updated,$post_status);

if($a==true){$host  = $_SERVER['HTTP_HOST'];
				$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
				$extra = "test/postindex.php?ul_id=".$_SESSION['userId'];
				header("Location: http://$host/$extra");}
}


}else{ 
if($_GET['pid']!="" && is_numeric($_GET['pid'])){
//Fetch values from Table as updated values



 $data = $obj2->select($post_id);

if (mysqli_num_rows($data) > 0) {
    while($row = mysqli_fetch_assoc($data)){ 
        $post_title= $row['post_title'];
	 $post_category= $row['post_category'];
	$post_content=$row['post_content'];
	$author=$row['author'];
	$post_created=	$row['post_created'];					
	$post_updated= $row['post_updated'];	$post_status= $row['post_status'];
	}}

else{
						
		die;				}

//Fetch values from Table as updated values: END
}
}

?>


</head>
<body>
<form id="newPost" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<div>
<h1><b>BLOG NAME</b></h1>
<div>
title<h3><p name= 'post_title' /><input type="text" name="post_title" value="<?php echo $post_title;?>"></h3>
<h3>category<select name="post_category" form="newPost" >
 <?php $cat=new category();
$p=$cat->categories($post_category);
 $num = mysqli_num_rows($p);
if($num > 0){
	while($row = mysqli_fetch_array($p)){
		$cId=$row['cId'];
		if($post_category==$cId)
		{ $select='Selected="Selected"';}else{$select='';}
		$categoryname=$row['categoryName'];
		echo "<option value='".$row['cId']."' ".$select." >".$categoryname."</option>";
	}} 

	
?>
</select></h3>
<br></br>
post body<br></br>
<textarea rows="10" cols="100" name='post_content' value='<?php if($post_content!=""){ echo $post_content;}?>'><?php echo $post_content;?></textarea><br></br>
author:<input type='text' name='author' value="<?php echo $author;?>"><br></br>
post_created:<input type='date' name='post_created' value="<?php echo $post_created;?>"readonly><br></br>
last updated:<input type='date' name='post_updated' value="<?php echo $post_updated;?>"readonly><br><br />
<input type="hidden" name="post_id" value="<?php echo $post_id;?>">
<?php if($_SESSION['role']==3){echo'post Status:'; if(isset($post_status)){ 
				echo "<select name='post_status' form='newPost' >";
				switch($post_status){ case "0":	echo "<option value='0' Selected='Selected'>disable</option>
									<option value='1'>enable</option>";break;
							case "1":echo "<option value='0'>disable</option>
									<option value='1' Selected='Selected'>enable</option>";break;default: echo"asdasdas";}echo"</select>";}}  ?>
<br></br><input type=submit name='submit' value="Submit">
</form>

</body>
<?php 
include("headers/pindex.php");
include("headers/logout.php");
mysqli_close($this->connect);
?>
</html>
