<html>
<title>userindex</title>
<body>
<form id="userindex" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<?php
include("/var/www/html/test/class/class.php");
if($_SESSION['role']!=3){$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = "test/postindex.php";
header("Location: http://$host/$extra");
exit;
}
#query
$obj = new DB();
$obj2= new user();
$data = $obj2->userindex();
$num = mysqli_num_rows($data);
#index columns
echo $table = "<table  style='background-color: #0f0' ; border=1>";
echo $table ="<tr>
              <th>userId</th>
              <th>username</th>
              <th>emailId</th>
              <th>Name</th>
              <th>dob</th>
		<th>idCreated</th>
              <th>lastLogin</th>
		<th>last logout</th>
              <th>role</th><th>status</th><th>actions</th>
          </tr>";

#fetching user details
if($num > 0){
while($row = mysqli_fetch_array($data)){
	?>
	<tr>
	<td><?php echo $row['userId']; ?></td> 
	<td><?php echo $row['username']; ?></td> 
	<td><?php echo $row['emailId']; ?></td> 
	<td><?php echo $row['Name'];?></td>
	<td><?php echo $row['dob'];?></td>
	<td><?php echo $row['idCreated'];?></td>
	<td><?php echo $row['lastLogin'];?></td>
	<td><?php echo $row['lastLogout'];?></td>
	<td><?php echo $row['role'];?></td>	
	<td><?php echo $row['status'];?></td>


			<?php echo "<td><a href= userdel.php?uid=".$row['userId'].">Delete</a>
					<a href= useredit.php?uid=".$row['userId'].">edit</a></td>" ; 


		?> 
	</tr> 
	<?php 

}
}
		echo "</table>";
 
		?>


<p align='left'><a href= 'admin.php'><?php if(isset($_SESSION['userId']) and $_SESSION['role']==3){echo "admin panel</a></p>";}?>


<?php include("/var/www/html/test/headers/logout.php");



?><input type=submit name='submit' value="Submit"></td>


</form>
<?php 
mysqli_close($this->connect);
					?>
</body>

</html>
