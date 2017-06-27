<style> .container * {
     padding-left: 50px;
			}

</style>
<h2>COMMENTS:</h2>

<ul style="list-style: none"><?php


include("/var/www/html/testBlog/include/config.php");



function comment($parent,$child){include("/var/www/html/testBlog/include/config2.php");
$sql= "SELECT comId, comment , parent, dateCreated, status , postId, userId, username, child  FROM comments WHERE postId= 1 and parent=".$parent."  ORDER BY parent asc , dateCreated desc "; 

$ret=mysqli_query($conn,$sql);
if($ret==false){echo "1111";}
$num = mysqli_num_rows($ret);

if($num > 0){ 
while($row2 = mysqli_fetch_array($ret)){$parent=$row['parent'];
	$comment= $row2['comment'];
	$username=$row2['username'];
	$dateCreated=$row2['dateCreated'];
	$userId=$row2['userId'];
	$comId=$row2['comId'];	
	$pid=$row2['postId'];
	$child=$row2['child'];


echo "<div class= container ><p>--comId:". $row2['comId']."\nusername:". $row2['username']."\ndateCreated:". $dateCreated ."</p><p row2s='4' cols='50' ><b>comment:</b>". $row2['comment']."</p>";



if(isset($_SESSION['username'])){echo" <p  class= container >  <a href='viewpost.php?pid=".$row2['postId']."&pat=".$row2['comId']."&sp=".$row2['comId']."'>reply</a>";
if(($_SESSION['username']==$row2['username'])or($_SESSION['role']==3)){echo "<a href='comments/delcom.php?pid=".$_GET['pid']."&comId=".$row2['comId']."'>del</a></p>";}
else{echo"</p>";}			}

if($row2['child']==1){ comment($row2['comId']);

}
			
echo"</div>";						}#while
								}#ifnum
											

									}#fn




comment(194);



echo "</li></ul>
<br><p><b>no more comments<p>";

?>


