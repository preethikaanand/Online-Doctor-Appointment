<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
</head>

<?php

$user = 'root';
$password = 'root';
$db = 'project';
$host = 'localhost';
$port = 3306;
$id = $_GET['contactidd'];
$conn = mysqli_connect( 
   $host, 
   $user, 
   $password, 
   $db,
   $port
);

$sql = "SELECT * FROM doctor_time WHERE gravestone = 0 and d_id =".$id;
	$result = mysqli_query($conn,$sql);
	echo "<table class='table table-striped' id='results'><tr><td>Hospital Id</td><td>Day</td><td>Start Time</td><td>End Time</td></tr>";
	while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
		{
			$hid = $row["h_id"];
        	$day = $row["day"];
        	$stime = $row["start_time"];
        	$etime =  $row["end_time"];

        	echo "<tr><td>".$hid."</td><td>".$day."</td><td>".$stime."</td><td>".$etime."</td><td><a href='delete_avail.php?hid=".$hid."&did=".$id."&day=".$day."&stime=".$stime."&etime=".$etime."'>Delete</a></td></tr>";
		  
		}
	echo "</table>";
	echo "<a href='admin_doctor.php'>Back to Doctor home</a>";
	mysqli_close($conn);
?>