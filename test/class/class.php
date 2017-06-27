<?php 
class DB {
	
	protected $db_name = 'post';
	protected $db_user = 'root';
	protected $db_pass = 'mysql';
	protected $db_host = 'localhost';
	public $connect;
	
	public function __construct() {
	
		$this->connect =  mysqli_connect( $this->db_host, $this->db_user, $this->db_pass, $this->db_name )or die("cannot connect");
		return true;
					}

	 function __destruct(){
                mysqli_close($this->connect);
					}
								}

###class session starts
class session  extends DB{
 public $userId;
 public $username;
 public $role;
 public $sessionId;
 public $sStart;

public function insert(){$sql3="INSERT INTO session (userId,username, sessionId, sStart, role) VALUES ('".$_SESSION['userId']."','".$_SESSION['username']."','".$_SESSION['sessionId']."','".$_SESSION['sStart']."','".$_SESSION['role']."')";

 $ret = mysqli_query($this->connect, $sql3);
 if($ret==false){echo"query fails ";}}

public function delete(){
$sql3="DELETE FROM `session` WHERE userId = '".$_SESSION['userId']."'";
$ret = mysqli_query($this->connect, $sql3);
 if($ret==false){echo"query fails ";}}

					
public function session_check(){$sql1="SELECT userId FROM session WHERE userId='".$_SESSION['userId']."'";

$ret = mysqli_query($this->connect, $sql1);
 if($ret==false){echo"query fails ";}
	if (mysqli_num_rows($ret) == 0) {  	require("../test/logout.php");}

}

}
###class session end


###class category starts
class category  extends DB{
 public $cId;
 public $categoryName;
 public $description;
 public $status;
 public $parentC;
				



public function categories($catss){
$sql3="SELECT cId,categoryName FROM `categories`  ";

 $results = mysqli_query($this->connect, $sql3);
if($results==false){echo"false ";}
return $results;
}

public function categorie(){
$sql3="SELECT cId,categoryName FROM `categories`  ";

 $results = mysqli_query($this->connect, $sql3);
if($results==false){echo"false ";}

$num = mysqli_num_rows($results);
if($num > 0){
	while($row = mysqli_fetch_array($results)){
		$cId=$row['cId'];
		if($post_category==$cId)
		{ $select='Selected="Selected"';}else{$select='';}
		$categoryname=$row['categoryName'];
		echo "<option value='".$row['cId']."' ".$select." >".$categoryname."</option>";
	}} 
}
}
###class category end


###class post starts
class post extends DB{
 public $post_id;
 public $post_title;
 public $post_content;
 public $author;
 public $post_created;
 public $post_updated;
 public $post_status;
 public $user_Id;
 public $post_category;
				

public function postindex(){
if(($_SESSION['role']==2) or !isset($_SESSION['role'])){$sql = " SELECT `post_id` , `post_title` , `post_content` , `author` , `post_created` , `post_updated` , `post_category` , 	`post_status` , `user_Id` FROM `blogpost` WHERE post_status = 1 ORDER BY  post_id DESC";
							}


elseif($_SESSION['role']==3){$sql = " SELECT `post_id` , `post_title` , `post_content` , `author` , `post_created` , `post_updated` , `post_category` , 	`post_status` , `user_Id` FROM `blogpost` ORDER BY post_status DESC, post_id DESC";
					}


$results = mysqli_query($this->connect, $sql);
		if($results==false){echo"false ";}
                return $results;
}


				
public function viewpost(){  
$sql="SELECT a.post_id , a.post_title , a.post_content , a.author , a.post_created , a.post_updated , b.categoryName , a.post_status , a.user_Id FROM blogpost a, categories b  WHERE a.post_id=". $_GET['pid']."  and b.cId = a.post_category  ";
 $results = mysqli_query($this->connect, $sql);
		if($results==false){echo"false ";}
                return $results;

				}

public function postsubmit($post_title,$post_content,$author,$post_category){		
$sql2 = "INSERT into blogpost (post_title,post_content,author,post_category,post_status,user_id) VALUES('".$post_title."','".$post_content."','".$author."','".$post_category."',1,'".$_SESSION['userId']."')" ;


 $results = mysqli_query($this->connect, $sql2);
if($results==false){echo"false ";}
                return $results;}


public function editpost($post_id,$post_title,$post_content,$post_category,$author,$post_updated,$post_status){

	if($_SESSION['role']==3){
	$sql2 = " UPDATE blogpost SET post_title='".$post_title."',post_content='".$post_content."',post_category='".$post_category."',author='".$author."',post_updated= '".$post_updated."' ,post_status='".$post_status."' WHERE post_id=".$post_id ;

					}
	elseif($_SESSION['role']==2){
			$sql2 = " UPDATE blogpost SET post_title='".$post_title."',post_content='".$post_content."',post_category='".$post_category."',author='".$author."',post_updated ='".$post_updated."'  WHERE post_id=".$post_id." AND user_Id = ".$_SESSION['userId'] ;
						}

$results = mysqli_query($this->connect, $sql2);
		if($results==false){echo"false ";}
                return $results;
}


public function select($post_id){ $sql = " SELECT `post_id` , `post_title` , `post_content` , `author` , `post_created` , `post_updated` , `post_category` , `post_status` , `user_Id` FROM `blogpost` WHERE `post_id`=".$post_id ;
 $results = mysqli_query($this->connect, $sql);
	return $results;
}


public function postdelete(){ 
if($_SESSION['role'] == 3){
$sql2 = " DELETE FROM blogpost WHERE post_id = ".$_GET['pid'] ;


 $results = mysqli_query($this->connect, $sql2);
if($results==false){echo"false ";}
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = "test/postindex.php";
header("Location: http://$host/$extra");
exit;
}

elseif($_SESSION['role']==2){
$sql = " DELETE FROM blogpost WHERE post_id = ".$_GET['pid']." AND user_Id=".$_SESSION['userId'] ;


 $results = mysqli_query($this->connect, $sql);
if($results==false){echo"false ";}

$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = "test/postindex.php?";
header("Location: http://$host/$extra");

}
else{die("cant delete the post sucka");}

				


				}








}###class post end


###class user starts
class user  extends DB{ 
 public $userId;
 public $username;
 public $password;
 public $emailId;
 public $firstName;
 public $lastName;
 public $dob;
 public $idCreated;
 public $role;
 public $lastLogin;
 public $status;
 public $lastLogout;
				
public function registration($username,$password,$emailId,$firstName,$lastName,$dob){	
$sql="insert into user (username,password,emailId,firstName,lastName,dob) values('".$username."','".$password."','".$emailId."','".$firstName."','".$lastName."','".$dob."')";
 $results = mysqli_query($this->connect, $sql);
                return $results;if($results==true){echo"false ";}
										}


public function lastlogin(){
$sqlq="UPDATE user SET  lastLogin = now()    WHERE userId = '".$_SESSION['userId']."'";
 $retv = mysqli_query($this->connect, $sqlq);
               // if($retv==false){echo"last login Fn fail ";}else{echo"it works";}

		}

public function lastlogout(){
$sqlw="UPDATE user SET lastLogout = now() WHERE userId ='".$_SESSION['userId']."'";
$retv= mysqli_query($this->connect,$sqlw);


}
public function login($username,$password){  $sql="select username,userId,role from user where username = '".$username."' and password = '".$password."'";

 $ret = mysqli_query($this->connect, $sql);
                if($ret==false){echo"login fail ";}
	if (mysqli_num_rows($ret) > 0) {  	user::lastLogin();


							 session_start();
    // output data of each row 

				    while($row = mysqli_fetch_assoc($ret)) { $_SESSION['username']=$row["username"];
										$_SESSION['userId']=$row["userId"];
										$_SESSION['role']=$row['role']; 
										$_SESSION['sStart']=$date = date("Y-m-d H:i:s");
									$_SESSION['sessionId']	 = session_id();
										session::insert();		}
						}
		return $ret;}


public function logout(){session::delete();    user::lastlogout();session_destroy();}

public function userindex(){ $sql = " SELECT `userId` , `username` , `password` , `emailId` , concat(concat_ws(' ' ,`firstName` , `lastName`)) AS Name , `dob` ,idCreated, `lastLogin` ,lastLogout, `role`,status
FROM `user`
WHERE 1
LIMIT 0 , 30 ";

#retval
$retval = mysqli_query( $this->connect, $sql);
if($retval==false){echo "querry fail";}
 return $retval;
}


public function userdel($userId){$sql = " DELETE FROM user WHERE userId = '".$userId."'" ;

$retval = mysqli_query( $this->connect, $sql);

if($retval==true){echo"asdasd";}
else{ echo"qqqqqqqqasdasdsadsdasdasd";}

}

public function passchange($a,$userId){
$sql="update user set password='".$a."'  where userId=".$userId;
	$ret=mysqli_query($this->connect,$sql);	
if($ret==true){echo"password Successfully changed";}
	return $ret;	}


public function useredit($firstName,$lastName,$dob,$role,$status){

$sql="update user set firstName='".$firstName."',lastName='".$lastName."',dob='".$dob."',role='".$role."',status='".$status."' where userId=".$_POST['userId'];


				

$ret=mysqli_query($this->connect,$sql);


if($ret==false){echo"asdsdsadsad";}

}
public function usereditu($firstName,$lastName,$dob){
$sql="update user set firstName='".$firstName."',lastName='".$lastName."',dob='".$dob."'  where userId=".$_SESSION['userId'];
				

$ret=mysqli_query($this->connect,$sql);


if($ret==false){echo"asdsdsadsad";}

}

public function selectu(){
if($_SESSION['role']==3){$sql2="select userId,username,emailId,firstName,lastName,dob,role,status from user where userId=".$_GET['uid'];		}

elseif($_SESSION['role']==2){$sql2="select userId,username,emailId,firstName,lastName,dob,role,status from user where userId=".$_SESSION['userId'];		}


$retval= mysqli_query($this->connect,$sql2);
return $retval;
}
}###class user end








###class comment starts
class comment  extends DB{
 public $comId;
 public $comment;
 public $parent;
 public $superparent;
 public $dateCreated;
 public $status;
 public $postId;
 public $userId;
 public $username;
 public $child;


 public function childcomment($postId,$parent,$superparent){
$sql= "SELECT comId, comment , parent, dateCreated, status , postId, userId, username, child  FROM comments WHERE postId= ".$postId."  and parent=".$parent."  ORDER BY parent asc , dateCreated desc "; 

$ret=mysqli_query($this->connect,$sql);
if($ret==false){echo "1111";}
$num = mysqli_num_rows($ret);

if($num > 0){ 
while($row2 = mysqli_fetch_array($ret)){$parent=$row2['parent'];
	$status=$row2['status'];
	$comment= $row2['comment'];
	$username=$row2['username'];
	$dateCreated=$row2['dateCreated'];
	$userId=$row2['userId'];
	$comId=$row2['comId'];	
	$postId=$row2['postId'];
	$child=$row2['child'];

if($row2['status']==1){
echo "<div style='padding-left: 20px'><p>--comId:". $row2['comId']."\nusername:". $row2['username']."\nCreated On:". $dateCreated ."</p><p ><b>comment:</b></p><textarea>". $row2['comment']."</textarea>";
}else{echo"<div style='padding-left: 20px'><p>--comment disabled</p>";}


if(isset($_SESSION['username'])){echo" <p> <a href='viewpost.php?pid=".$row2['postId']."&pat=".$row2['comId']."&sp=".$superparent."'>reply</a>";
if(($_SESSION['username']==$row2['username'])or($_SESSION['role']==3)){echo "<a href='comments/delcom.php?pid=".$postId."&comId=".$row2['comId']."'>del</a></p>";}
			}

if($row2['child']==1){ comment::childcomment($postId,$row2['comId'],$superparent);}	
echo"</div>";
						}#while
						}#ifnum
											

						}#fn				
public function comments($postId){  
$sql="SELECT comId,comment,parent,dateCreated,status,postId,userId,username FROM comments WHERE postId=".$postId." and parent=0 ORDER BY dateCreated desc"; 
 $results = mysqli_query($this->connect, $sql);
                return $results;
}

public function delcom($comId){
if($_SESSION['role'] == 3){
$sql = " DELETE FROM comments WHERE comId = ".$comId;
}
elseif(isset($_SESSION['userId'])){$sql = " DELETE FROM comments WHERE comId = ".$comId." AND userId=".$_SESSION['userId'] ;}

$results = mysqli_query($this->connect, $sql);
                return $results;

}

public function submitcom($comment,$postId){
$sql="INSERT INTO comments (comment,parent,postId,userId,username,superparent,child) VALUES('".$comment."', '".$_POST['pat']."','".$postId."','".$_SESSION['userId'] ."','".$_SESSION['username']."','".$_POST['sp']."','0')";
$retval = mysqli_query($this->connect, $sql);

if($retval==true){
$sql2="update comments set child=1 where comId='".$_POST['pat']."'";
$retval2 = mysqli_query($this->connect,$sql2);		}
else{
$sql2="update comments set child=0 where comId='".$_POST['pat']."'";
$retval2 = mysqli_query($this->connect,$sql2);
	}                return $retval;

}

}###class comment end

session_start();
?>
