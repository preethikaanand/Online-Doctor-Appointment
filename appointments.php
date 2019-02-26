<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
</head>
<body>
	<h3> Appointments</h3>
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

	$sql = "SELECT concat(doctor.fn, ' ',doctor.ln) as 'doctor_name', hospital.name, c_id, date, d_comments FROM hospital, doctor, doctor_appointment where hospital.h_id = doctor_appointment.h_id and doctor_appointment.d_id = doctor.d_id and c_id=$cid";
	
	$result = mysqli_query($conn,$sql);
	echo "<table class='table table-striped' id='results'><tr><td>Doctor Name</td><td>Hospital Name</td><td>Date</td><td>Doctor remarks</td></tr>";
	while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
		{
			$dName = $row["doctor_name"];
        	$hName = $row["name"];
        	$date = $row["date"];
        	
        	echo "<tr><td>".$dName."</td><td>".$hName."</td><td>".$date."</td><td>".$row['d_comments']."</td></tr>";
		  
		}
	echo "</table>";
	echo "<a href='userhome.php'>Back to home page</a>";
	mysqli_close($conn);
?>
