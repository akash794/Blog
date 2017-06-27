<!DOCTYPE html>
<html>
<head>
<?php 
include("../test/class/class.php");

if(isset($_SESSION['username'])){die;}
#if($_POST['password']!=$_POST['passwordConfirm']){die 'pass not matched';}
if($_POST['submit']=="Submit"){



$a= $_POST['username'];
$b= $_POST['password'];
$b2= $_POST['passwordConfirm'];
$b3=md5($b);
$c= $_POST['emailId'];
$d= $_POST['firstName'];
$e= $_POST['lastName'];
$f= $_POST['dob'];
if($b!=$b2){echo"PASSWORD NOT CONFIRMED...PLEASE CONFIRM THE PASSWORD";
}else{
$obj= new DB();
$obj2= new user();
$z=$obj2->registration($a,$b3,$c,$d,$e,$f);


if($z==true){echo"you are registered. username:".$a;}}
}
?>

<body>
<form id="registrationForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    
	<p><label>Username</label><br />
        <input type='text' name='username' value='<?php if(isset($error)){ echo $_POST['username'];}?>'></p>

    	<p><label>Password</label><br />
    	<input type='password' name='password' value='<?php if(isset($error)){ echo $_POST['password'];}?>'></p>

	<p><label>Confirm Password</label><br />
	<input type='password' name='passwordConfirm' value='<?php if(isset($error)){ echo $_POST['passwordConfirm'];}?>'></p>

	<p><label>EmailID</label><br />
    <input type='text' name='emailId' value='<?php if(isset($error)){ echo $_POST['emailId'];}?>'></p>

	<p><label>First Name</label><br />
    <input type='text' name='firstName' value='<?php if(isset($error)){ echo $_POST['firstName'];}?>'></p>

	<p><label>Last Name</label><br />
    <input type='text' name='lastName' value='<?php if(isset($error)){ echo $_POST['lastName'];}?>'></p>

	<p><label>Birth Date</label><br />
    <input type='date' name='dob' placeholder="YYYY-MM-DD" value='<?php if(isset($error)){ echo $_POST['dob'];}?>'></p>
    
    <p><input type='submit' name='submit' value='Submit'></p>

</form>
<?php
mysqli_close($this->obj);
?>
</body>
</html>
