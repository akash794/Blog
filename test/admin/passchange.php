
<!DOCTYPE html>
<html>
<head></head>
<body>


<?php include("/var/www/html/test/class/class.php");

if($_POST['submit']=="Submit"){

	$a=$_POST['password'];
	$a2=md5($a);
	$b=$_POST['password2'];
	if($a!=$b){echo "password dont match. please confirm password";}
	
		else{
	
	if(isset($_SESSION['userId'])){

	$obj = new DB();
$obj2= new user();
 $obj2->passchange($a2,$_SESSION['userId']);					
			}	}		}



?>
<pre>
<form id="passchange" method="POST" action= "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

username:<input name="username" type= "text" value="<?php echo $_SESSION['username']  ;?>"readonly>
new password:<input name="password" type= "text" value="<?php echo $_POST['password']  ;?>">
confirm password:<input name="password2" type= "text" value="<?php echo $_POST['password2']  ;?>">



<br></br><input type=submit name='submit' value="Submit">
</form></pre>
</body></html>

<?php
mysqli_close($this->connect);
?>
