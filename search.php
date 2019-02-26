<?php
	ini_set('display_errors', 1);
	error_reporting(E_ALL);
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

	$category=$_GET["category"];
	$location=$_GET["location"];
	$keyword=$_GET["search"];
	$sql="";
	$result="";
	if($category != "" and $location!= "" and $keyword!=""){
	if($category=="Doctor"){
		$sql ="SELECT doctor.d_id, hospital.h_id, concat(doctor.fn, ' ',doctor.ln) as 'doctor_name', hospital.name, doctor.specialty, doctor.experience, GROUP_CONCAT(doctor_time.day,', ', doctor_time.start_time,', ', doctor_time.end_time ORDER BY doctor_time.day SEPARATOR '; ') AS dow FROM hospital, doctor, doctor_time where hospital.city='".$location."' and hospital.h_id = doctor_time.h_id and doctor_time.d_id = doctor.d_id and doctor.fn='".$keyword."' GROUP BY 'doctor name', hospital.name, doctor.specialty, doctor.experience";
		$result = mysqli_query($conn,$sql);
	}
	if($category=="Hospital"){
		$sql ="SELECT doctor.d_id, hospital.h_id, concat(doctor.fn, ' ',doctor.ln) as 'doctor_name', hospital.name, doctor.specialty, doctor.experience, GROUP_CONCAT(doctor_time.day,', ', doctor_time.start_time,', ', doctor_time.end_time ORDER BY doctor_time.day SEPARATOR '; ') AS dow FROM hospital, doctor, doctor_time where hospital.city='".$location."' and hospital.h_id = doctor_time.h_id and doctor_time.d_id = doctor.d_id and hospital.name='".$keyword."' GROUP BY 'doctor name', hospital.name, doctor.specialty, doctor.experience";
		$result = mysqli_query($conn,$sql);
	}
	if($category=="Specialty"){
		$sql ="SELECT doctor.d_id, hospital.h_id, concat(doctor.fn, ' ',doctor.ln) as 'doctor_name', hospital.name, doctor.specialty, doctor.experience, GROUP_CONCAT(doctor_time.day,', ', doctor_time.start_time,', ', doctor_time.end_time ORDER BY doctor_time.day SEPARATOR '; ') AS dow FROM hospital, doctor, doctor_time where hospital.city='".$location."' and hospital.h_id = doctor_time.h_id and doctor_time.d_id = doctor.d_id and doctor.specialty='".$keyword."' GROUP BY 'doctor name', hospital.name, doctor.specialty, doctor.experience";
		$result = mysqli_query($conn,$sql);	
	}

	echo "<tr><td>Doctor Name</td><td>Hospital Name</td><td>Specialty</td><td>Experience</td><td>Availablity</td></tr>";
	while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
		{
			print_r($row);
			$dName = $row["doctor_name"];
        	$hName = $row["name"];
        	$exp = $row["experience"];
        	$availabilty = $row["dow"];
        	$specialty = $row["specialty"];
        	echo "<tr><td>".$dName."</td><td>".$hName."</td><td>".$specialty."</td><td>".$exp."</td><td>".$availabilty."</td></tr>";
		  
		}
	}
	mysqli_close($conn);
?>