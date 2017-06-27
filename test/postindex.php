<html>
<title>postindex</title>
<body>
<?php



#query
include("../test/class/class.php");


$obj = new DB();
$obj2= new post();
$data = $obj2->postindex();
$num = mysqli_num_rows($data);
#index columns
echo $table = "<table  style='background-color: #0f0' ; border=1>";
echo $table ="<tr>
              <th>Post ID</th>
              <th>Title</th>
              <th>author</th>";
	if(isset($_SESSION['userId'])){echo" <th>action</th>";}
          if($_SESSION['role']==3){echo"<th>post status</th>";}
		echo $table = "</tr>";

#fetching post
if($num > 0){
while($row = mysqli_fetch_array($data)){
	?>
	<tr>
	<td><?php echo $row['post_id']; ?></a></td> 
	<td>
<a href="<?php echo 'viewpost.php?pid='.$row['post_id']; ?>"><?php echo substr($row['post_title'],0,30); ?></a>
	</td> 
	<td><?php echo $row['author']; ?></td> 
	<?php 
		if(($row['user_Id'] == $_SESSION['userId']) or $_SESSION['role']=="3"){
			echo '<td><a href= postedit.php?pid='.$row['post_id']."&ul_Id=".$row['user_Id'].">Edit</a>"; }
	?> 
	<?php 
		if(($row['user_Id'] == $_SESSION['userId']) or $_SESSION['role']=="3"){
			echo '<a href= postdel.php?pid='.$row['post_id']."&".$_SESSION['userId'].">Delete</a></td>"; }
		

		if($_SESSION['role']==3){ 
			echo "<td>".$row['post_status']."</td>";}  

	?> 
			</tr> 
	<?php

}
}	
		echo "</table>";



?>





<?php if($_SESSION['username']!=''){
echo $_SESSION['username'];








}
include("headers/login.php") ;
include("headers/panel.php");

include("headers/logout.php");
include("headers/edituser.php");
include("headers/newpost.php");

 include("headers/regist.php");
mysqli_close($this->connect);
die;





?>
</body>

</html>
