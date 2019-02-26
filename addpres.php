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

	$sql =  "SELECT customer.c_id, hospital.h_id, concat(customer.fn, ' ',customer.ln) as 'customer_name', hospital.name, date, c_comments FROM hospital, customer, doctor_appointment where hospital.h_id = doctor_appointment.h_id and doctor_appointment.c_id = customer.c_id and d_id=$did and customer.c_id = $cid and hospital.h_id=$hid";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result);
	echo "<h3>Add Prescription for appointment with ".$row['customer_name']." at hospital ".$row['name']."on ".$row['date']."</h3>";
	echo "<form method='GET' action='submitpres.php'><input name ='cid' value='$cid' type='hidden'/><input name ='hid' value='$hid' type='hidden' /><input name='pres' type ='textarea'/><input type='submit'/></form>";
	mysqli_close($conn);
?>