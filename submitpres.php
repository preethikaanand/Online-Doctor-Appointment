<?
	ini_set('display_errors', 1);
	error_reporting(E_ALL);
	session_start();

	//Check whether the session variable SESS_MEMBER_ID is present or not
	if(!isset($_SESSION['d_id']) || (trim($_SESSION['d_id']) == '')) {
	  header("location: homepage.php");
	  exit();
	}
	$name=$_SESSION['name'];
	$did=$_SESSION['d_id'];
	$cid=$_GET['cid'];
	$hid=$_GET['hid'];
	$pres=$_GET['pres'];
	
	$user = 'root';
	$password = 'root';
	$db = 'project';
	$host = 'localhost';
	$port = 3306;


	$conn = mysqli_connect( 
	   $host, 
	   $user, 
	   $password, 
	   $db,
	   $port
	);

	if(!$conn){
		echo "Connection Failed!";
		exit;
	}

	$sql =  "UPDATE doctor_appointment SET d_comments='$pres' where d_id=$did and h_id=$hid and c_id=$cid";
	echo $sql;
	$result = mysqli_query($conn,$sql);
	if($result)
		header("location: dappointments.php");
	else
		echo "hi";

	mysqli_close($conn);
?>