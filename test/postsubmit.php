<!DOCTYPE html>
<html>
<head>

<?php 
include("../test/class/class.php");
if($_POST['submit'] == "Submit"){
//echo "<pre>";print_r($_POST);die;

$post_category=$_POST['post_category'];
####editing 
$obj= new DB();
$obj2= new post();
$a=$obj2->postsubmit($_POST['post_title'],$_POST['post_content'],$_POST['author'],$_POST['post_category']);
if($a==false){echo"unable to submit the post";}

$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = "test/postindex.php?";
header("Location: http://$host/$extra");




}




?>




</head>
<body>
<form id="newPost" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<div id='whole'>
<h1><b>BLOG NAME</b></h1>
<div>
<h3>title<input type="text" name= "post_title" /></h3>
<h3>category<select name="post_category" form="newPost" >
 <?php $p=new category();
$p->categorie();
 

	
?>
</select></h3>
<h3>author:<input type="text" name= "author" /></h3>
 <h3>post body</h3>
<textarea rows="10" cols="100" name="post_content" form="newPost">
Enter text here...</textarea><br></br>


<input type="submit" name= "submit" value="Submit"/>
</div></form>
<?php /*
include("headers/pindex.php");
include("headers/logout.php");

mysqli_close($conn);
*/
mysqli_close($this->connect);
?>


</body>
</html>
