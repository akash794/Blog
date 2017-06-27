
 <form id="comment" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div>
	<p><label>username:</label>
      <?php echo $_SESSION['username'];?></p>

<p>COMMENT:</br>
	<textarea rows="10" cols="100" type='text' name='comment' ></textarea><br></br>
<p><label>postId:<?php echo $_POST['pid'];?></label></p>
<input type="hidden" name="pat" value="<?php echo $_GET['pat'];?>">
<input type="hidden" name="pid" value="<?php echo $_GET['pid'];?>">
<input type="hidden" name="sp" value="<?php echo $_GET['sp'];?>">
<?php echo" reply to:".  $_GET['pat']; ?> 
<?php echo" SP:".  $_GET['sp']; ?> 		
<input type="submit" name= "submit" value="Submit"/>
</div>
</form>
<?php










					
if(!isset($_SESSION['userId'])){die;}

if($_POST['submit'] == "Submit"){
//echo "<pre>";print_r($_POST);print_r($_POST);die;

$postId=$_POST['pid'];
$comment=$_POST['comment'];


if($_POST['comment']==''){	$host  = $_SERVER['HTTP_HOST'];
				$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
				$extra = "test/viewpost.php?pid=".$_GET['pid'];
				header("Location: http://$host/$extra");
					die("enter comment first");}
				

$objs= new comment();
$datas = $objs->submitcom($comment,$postId);

if($datas==false){echo'sdf;jsdlkf';}	

else{
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = "test/viewpost.php?pid=".$_POST['pid'];
header("Location: http://$host/$extra");
exit;}
}

?>


    
	


