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
	if(!isset($_SESSION['d_id']) || (trim($_SESSION['d_id']) == '')) {
	  header("location: homepage.php");
	  exit();
	}
	$name=$_SESSION['name'];
	$did=$_SESSION['d_id'];
	
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

	$sql = "SELECT customer.c_id, hospital.h_id, concat(customer.fn, ' ',customer.ln) as 'customer_name', hospital.name, date, d_comments FROM hospital, customer, doctor_appointment where hospital.h_id = doctor_appointment.h_id and doctor_appointment.c_id = customer.c_id and d_id=$did";

	$result = mysqli_query($conn,$sql);
	echo "<table class='table table-striped' id='results'><tr><td>Patient Name</td><td>Hospital Name</td><td>Date</td><td>Prescription</td></tr>";
	while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
		{
			$cName = $row["customer_name"];
        	$hName = $row["name"];
        	$date = $row["date"];
        	$c_id =  $row["c_id"];
        	$h_id = $row["h_id"];
        	
        	echo "<tr><td>".$cName."</td><td>".$hName."</td><td>".$date."</td><td>".$row['d_comments']."</td><td><a href = 'addpres.php?cid=".$c_id."&hid=".$h_id."' >Add prescription</a></td></tr>";
		  
		}
	echo "</table>";
	echo "<a href='doctorhome.php'>Back to home page</a>";
	mysqli_close($conn);
?>
