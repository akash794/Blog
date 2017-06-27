<h2>COMMENTS:</h2>
<div>






<?php







$objc= new comment();
$datac = $objc->comments($_GET['pid']);

if($datac==false){echo'sdf;jsdlkf';}

$num = mysqli_num_rows($datac);
############looop1
if($num > 0){ 
while($row = mysqli_fetch_array($datac)){
	$comment= $row['comment'];
	$username=$row['username'];
	$dateCreated=$row['dateCreated'];
	$userId=$row['userId'];
	$comId=$row['comId'];	
	$pid=$row['postId'];
	$status=$row['status'];
if($row['status']==1){
echo "<div><div><p>-comId:". $row['comId']."\nusername:". $row['username']."\nCreated On:". $row['dateCreated'] ."</p>
<textarea rows='4' cols='50' >".$row['comment']."</textarea><p></p>";
		}
else{echo"<div ><p>-comment disabled</p>";}



if(isset($_SESSION['username'])){echo"<p ><a href='viewpost.php?pid=".$row['postId']."&pat=".$row['comId']."&sp=".$row['comId']."'>reply</a>";
if(($_SESSION['username']==$row['username'])or($_SESSION['role']==3)){echo "<a href='comments/delcom.php?pid=".$_GET['pid']."&comId=".$row['comId']."'>del</a>";}
}
echo"</div>";							




$datac2 = $objc->childcomment($_GET['pid'],$comId,$comId);






															}}



echo "</div><p><b>no more comments</p></b><br></br>";

?>


