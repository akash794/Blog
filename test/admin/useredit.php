
<!DOCTYPE html>
<html>
<head></head>
<body>


<?php include("/var/www/html/test/class/class.php");
if(!isset( $_SESSION['username'])){die("cannot access this area");}
if($_SESSION['role']==3){echo"";}
elseif($_SESSION['userId']==$_GET['uid']){echo"";}



$obj = new DB();
$obj2 = new user();

if($_POST['submit']=="Submit"){ //echo "<pre>";print_r($_POST);die;
	$emailId=$_POST['emailId'];
	$firstName=$_POST['firstName'];
	$lastName=$_POST['lastName'];
	$dob=$_POST['dob'];
	$role=$_POST['role'];
	$status=$_POST['status'];

if($_SESSION['role']==3){$a=$obj2-> useredit($firstName,$lastName,$dob,$role,$status);
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = "test/admin/userindex.php";
header("Location: http://$host/$extra");
exit;}

if($_SESSION['role']==2){  $a=$obj2-> usereditu($firstName,$lastName,$dob);
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = "test/admin/userindex.php";
header("Location: http://$host/$extra");
exit;}
}

else{

if($_GET['uid']!="" && is_numeric($_GET['uid'])){

$data=$obj2->selectu($_GET['uid']);
if(mysqli_num_rows($data) > 0){
	while($row=mysqli_fetch_assoc($data)){        $userId=$row['userId']; 
							$username=$row['username'];						
							$emailId=$row['emailId'];
							$firstName=$row['firstName'];
							$lastName=$row['lastName'];
							$dob=$row['dob'];
							$role=$row['role'];
							$status=$row['status'];




										}}
}
}##############################################################################################################################33 
?>

<form id="useredit" method="POST" action= "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<h2>edit user</h2><pre>
username:<input type='text' name='username' value="<?php echo $username;?>"readonly><br>
emailId:<input type='text' name='emailId' value="<?php echo $emailId;?>"readonly><br>
First Name:<input type='text' name='firstName' value="<?php echo $firstName;?>"><br>
Last Name:<input type='text' name='lastName' value="<?php echo $lastName;?>"><br>
<input type="hidden" name='userId' value="<?php echo $userId;?>">
DOB:<input type='date' name='dob' value="<?php echo $dob;?>">


<p>

<?php
if($_SESSION['role']==3){ if(isset($role)){$sel='Selected="Selected"';}else{$sel='""';}
				echo "role:<select name='role' form='useredit' >";
				switch($role){ case "1":	echo "<option value='1'". $sel .">1</option>
									<option value='2'>2</option>
									<option value='3'>3</option>";break;
							case "2":echo "<option value='1'>1</option>
									<option value='2'". $sel.">2</option>		
									<option value='3'>3</option>";break;
									
							case "3":echo "<option value='1'>1</option>
									<option value='2'>2</option>
									<option value='3'". $sel.">3</option>";break;
									default: echo"asdasdas";}	}  ?></select></p>
	<p><?php if($_SESSION['role']==3){echo 'Status:'; if($status==1){$sel='Selected="Selected"';}else{$sel='""';}
				echo "<select name='status' form='useredit' >
					<option value='0'". $sel .">disable</option>
					<option value='1'". $sel.">enable</option></select>";}  ?></p>


<br></br><input type=submit name='submit' value="Submit">
</form>
</body></html>

<?php
mysqli_close($this->connect);
?>


