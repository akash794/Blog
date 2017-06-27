

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
		
	

function viewpost(){  
$sql="SELECT  post_id ,  post_title ,  post_content ,  author ,  post_created ,  post_updated ,  post_status ,  user_Id FROM blogpost WHERE  post_id= 307";
 $results = mysqli_query($this->connect, $sql);
                return $results;

				}



							




}


?>


