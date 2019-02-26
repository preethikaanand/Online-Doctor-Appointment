<?
	ini_set('display_errors', 1);
	error_reporting(E_ALL);
	session_start();

	//Check whether the session variable SESS_MEMBER_ID is present or not
	if(!isset($_SESSION['name']) || (trim($_SESSION['name']) == '')) {
	  header("location: homepage.php");
	  exit();
	}
	$name=$_SESSION['name'];
	$cid=$_SESSION['c_id'];
	$did = $_GET['did'];
	$hid = $_GET['hid'];
	$date = strtotime($_GET['date']);
	$d = date("Y-m-d", $date);
	
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

	$sql = "INSERT INTO doctor_appointment(c_id, d_id, h_id, date) VALUES ('$cid','$did','$hid', '$d')";
	echo $sql;
	if(mysqli_query($conn,$sql))
	{
	    header("location:appointments.php");
	}
	else
	{
		echo "Failed to book appointment Please retry ";
	}
	mysqli_close($conn);
?>
