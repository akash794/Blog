<h2>COMMENTS:</h2>
<style>


.container * {
     padding-left: 50px;
			}

</style>
<?php





$sql="SELECT comId,comment,parent,dateCreated,status,postId,userId,username FROM comments WHERE postId=".$_GET['pid']." and parent=0 ORDER BY comId ASC "; 

$ret=mysqli_query($conn,$sql);
if($ret==false){echo "111111";}
$num = mysqli_num_rows($ret);
############looop1
if($num > 0){ 
while($row = mysqli_fetch_array($ret)){
	$comment= $row['comment'];
	$username=$row['username'];
	$dateCreated=$row['dateCreated'];
	$userId=$row['userId'];
	$comId=$row['comId'];	
	$pid=$row['postId'];


echo "	
<div><p>-comId:". $row['comId']."\nusername:". $row['username']."\ndateCreated:". $row['dateCreated'] ."</p><p rows='4' cols='50' ><b>comment:</b>". $row['comment']."</p>";
if(isset($_SESSION['username'])){echo"<p  class= container ><a href='viewpost.php?pid=".$row['postId']."&pat=".$row['comId']."&sp=".$row['comId']."'>reply</a>";
if(($_SESSION['username']==$row['username'])or($_SESSION['role']==3)){echo "<a href='comments/delcom.php?pid=".$_GET['pid']."&comId=".$row['comId']."'>del</a>";}
else{echo"</p>";}}
															


$sql3="SELECT comId,
comment , parent, dateCreated,
STATUS , postId, userId, username
FROM comments
WHERE postId =".$_GET['pid']."
AND parent !=0 AND superparent=".$row['comId']." order by parent asc,dateCreated asc"; 

$ret3=mysqli_query($conn,$sql3);
if($ret3==false){echo "asdasds";}
$num3 = mysqli_num_rows($ret3);
##################3333loop3
if($num3 > 0){ 
while($row3 = mysqli_fetch_array($ret3)){
$comment3= $row3['comment'];
	$username3=$row3['username'];
	$dateCreated3=$row3['dateCreated'];
	$userId3=$row3['userId'];
	$comId3=$row3['comId'];	
	$postId3=$row3['postId'];




echo "
	
	<div class= container ><p>--comId:". $row3['comId']."\nusername:". $row3['username']."\ndateCreated:". $dateCreated3 ."</p><p rows='4' cols='50' ><b>comment:</b>". $row3['comment']."</p>reply to:". $row3['parent']."<p> 




					</p>	
							</div>";



if(isset($_SESSION['username'])){echo" <p  class= container >  <a href='viewpost.php?pid=".$row3['postId']."&pat=".$row3['comId']."&sp=".$row['comId']."'>reply</a>";
if(($_SESSION['username']==$row3['username'])or($_SESSION['role']==3)){echo "<a href='comments/delcom.php?pid=".$_GET['pid']."&comId=".$row3['comId']."'>del</a></p>";}
else{echo"</p>";}
				}

																}}




}echo"</div>";
}














echo "
<br><p><b>no more comments<p>";

?>


