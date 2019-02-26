<?
	session_start();
	if(!isset($_SESSION['c_id']) || (trim($_SESSION['c_id']) == '')) {
	  header("location: Homepage.php");
	  exit();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="index.js"></script>
	<title>Home Page</title>
	<meta charset = "UTF-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
	<!-- <link rel="stylesheet" type="text/css" href="index.css"/>
	 -->
</head>

<body>
	<?
		$category=$_GET["category"];
		$location=$_GET["location"];
		$keyword=$_GET["search"];
		$name =  $_SESSION["name"];
		$page = $_GET["page"];
		$limit=1;
		$totalpages=0;
	?>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<ul class="nav navbar-nav topnav_home">
				<li><a href="#">Quick Health</a></li>
			</ul>
			<ul class="nav navbar-nav topnav_home navbar-right">
				<li><a> Welcome <?php echo $name?></a></li>
				<li><a href="#location">Book appointment</a></li>
				<li><a href="appointments.php"> Appointments</a></li>
      			<li><a href="logout.php"> Logout</a></li>
			</ul>
		</div>
	</nav>

	<div class="container-fluid">
		<form method="GET" action="userhome.php">
		    <div class="form-group">
		      	<div class="col-sm-4">          
		        	<input id="location" type="text" class="form-control" placeholder="Location" name="location" value="<? echo $location ?>">
		      	</div>
		    </div>
		    <div class="form-group">        
		      	<div class="col-sm-5">
		        	<input id="search" type="text" class="form-control" placeholder="Doctor/ Hospital/ Speciality" name="search" value="<? echo $keyword ?>">
		      	</div>
		    </div>
		    <div class="form-group">
		    	<div class="col-sm-1 dropdown">
				    <select name="category" class="form-control" value="<? echo $category ?>">
					  	<option value="Doctor">Doctor</option>
					  	<option value="Hospital">Hospital</option>
					  	<option value="Specialty">Speciality</option>
					</select>
				</div>
			</div>
			<input type ="hidden" name="page" value="<? echo $page ?>"/>
		   	<div class="form-group">
		   		<div class= "col-sm-2">
		   			<button id="query" class="btn btn-default">Submit</button>
		   		</div>
		   	</div>
		</form>
	</div>
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

	$sql="";
	$result="";
	if($page==""){
		$page =1;
	}
	if($category != "" and $location!= "" and $keyword!=""){
	if($category=="Doctor"){
		$sql ="SELECT doctor.d_id, hospital.h_id, concat(doctor.fn, ' ',doctor.ln) as 'doctor_name', hospital.name, doctor.specialty, doctor.experience, GROUP_CONCAT(doctor_time.day,', ', doctor_time.start_time,', ', doctor_time.end_time ORDER BY doctor_time.day SEPARATOR '; ') AS dow FROM hospital, doctor, doctor_time where hospital.city='".$location."' and hospital.h_id = doctor_time.h_id and doctor_time.d_id = doctor.d_id and doctor.fn='".$keyword."' GROUP BY doctor.d_id, hospital.h_id, 'doctor_name', hospital.name, doctor.specialty, doctor.experience";
		$result = mysqli_query($conn,$sql);
		$offset = ($page-1)*$limit;
		$totalpages=ceil(mysqli_num_rows($result)/$limit);
		$sql ="SELECT doctor.d_id, hospital.h_id, concat(doctor.fn, ' ',doctor.ln) as 'doctor_name', hospital.name, doctor.specialty, doctor.experience, price, GROUP_CONCAT(doctor_time.day,', ', doctor_time.start_time,', ', doctor_time.end_time ORDER BY doctor_time.day SEPARATOR '; ') AS dow FROM hospital, doctor, doctor_time where hospital.city='".$location."' and hospital.h_id = doctor_time.h_id and doctor_time.d_id = doctor.d_id and doctor.fn='".$keyword."' GROUP BY doctor.d_id, hospital.h_id, 'doctor_name', hospital.name, doctor.specialty, doctor.experience, price LIMIT $limit offset $offset";
		$result = mysqli_query($conn,$sql);
	}
	if($category=="Hospital"){
		$sql ="SELECT doctor.d_id, hospital.h_id, concat(doctor.fn, ' ',doctor.ln) as 'doctor_name', hospital.name, doctor.specialty, doctor.experience, price, GROUP_CONCAT(doctor_time.day,', ', doctor_time.start_time,', ', doctor_time.end_time ORDER BY doctor_time.day SEPARATOR '; ') AS dow FROM hospital, doctor, doctor_time where hospital.city='".$location."' and hospital.h_id = doctor_time.h_id and doctor_time.d_id = doctor.d_id and hospital.name='".$keyword."' GROUP BY doctor.d_id, hospital.h_id, 'doctor_name', hospital.name, doctor.specialty, doctor.experience, price";
		$result = mysqli_query($conn,$sql);
		$offset = ($page-1)*$limit;
		$totalpages=ceil(mysqli_num_rows($result)/$limit);
		$sql ="SELECT doctor.d_id, hospital.h_id, concat(doctor.fn, ' ',doctor.ln) as 'doctor_name', hospital.name, doctor.specialty, doctor.experience, price, GROUP_CONCAT(doctor_time.day,', ', doctor_time.start_time,', ', doctor_time.end_time ORDER BY doctor_time.day SEPARATOR '; ') AS dow FROM hospital, doctor, doctor_time where hospital.city='".$location."' and hospital.h_id = doctor_time.h_id and doctor_time.d_id = doctor.d_id and hospital.name='".$keyword."' GROUP BY doctor.d_id, hospital.h_id, 'doctor_name', hospital.name, doctor.specialty, doctor.experience, price LIMIT $limit offset $offset";
		$result = mysqli_query($conn,$sql);
	}
	if($category=="Specialty"){
		$sql ="SELECT doctor.d_id, hospital.h_id, concat(doctor.fn, ' ',doctor.ln) as 'doctor_name', hospital.name, doctor.specialty, doctor.experience, GROUP_CONCAT(doctor_time.day,', ', doctor_time.start_time,', ', doctor_time.end_time ORDER BY doctor_time.day SEPARATOR '; ') AS dow FROM hospital, doctor, doctor_time where hospital.city='".$location."' and hospital.h_id = doctor_time.h_id and doctor_time.d_id = doctor.d_id and doctor.specialty='".$keyword."' GROUP BY doctor.d_id, hospital.h_id, 'doctor_name', hospital.name, doctor.specialty, doctor.experience";
		$result = mysqli_query($conn,$sql);
		$offset = ($page-1)*$limit;
		$totalpages=ceil(mysqli_num_rows($result)/$limit);
		$sql ="SELECT doctor.d_id, hospital.h_id, concat(doctor.fn, ' ',doctor.ln) as 'doctor_name', hospital.name, doctor.specialty, doctor.experience, GROUP_CONCAT(doctor_time.day,', ', doctor_time.start_time,', ', doctor_time.end_time ORDER BY doctor_time.day SEPARATOR '; ') AS dow FROM hospital, doctor, doctor_time where hospital.city='".$location."' and hospital.h_id = doctor_time.h_id and doctor_time.d_id = doctor.d_id and doctor.specialty='".$keyword."' GROUP BY doctor.d_id, hospital.h_id, 'doctor_name', hospital.name, doctor.specialty, doctor.experience LIMIT $limit offset $offset";
		$result = mysqli_query($conn,$sql);
	}
	echo "<table class='table table-striped' id='results'><tr><td>Doctor Name</td><td>Hospital Name</td><td>Specialty</td><td>Experience</td><td>Price</td><td>Availablity</td></tr>";
	while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
		{
			$dName = $row["doctor_name"];
        	$hName = $row["name"];
        	$exp = $row["experience"];
        	$availabilty = $row["dow"];
        	$specialty = $row["specialty"];
        	echo "<tr><td>".$dName."</td><td>".$hName."</td><td>".$specialty."</td><td>".$exp."</td><td>".$row['price']."</td><td>".$availabilty."</td><td><a href='bookapp.php?did=".$row['d_id']."&hid=".$row['h_id']."'>Book Appointment</a></td></tr>";
		  
		}
	echo "</table>";
	}
	mysqli_close($conn);
?>
<ul class="pagination">
        <li class="<?php if($page <= 1){ echo 'disabled'; } ?>">
            <a href="userhome.php?location=<? echo $location; ?>&search=<? echo $keyword; ?>&category=<? echo $category; if($page <= 1){ echo '&page=1';} else { echo '&page='.($page - 1); } ?>">Prev</a>
        </li>
        <li class="<?php if($page >= $totalpages){ echo 'disabled'; } ?>">
            <a href="userhome.php?location=<? echo $location; ?>&search=<? echo $keyword; ?>&category=<? echo $category; if($page >= $totalpages){ echo '&page='.$totalpages;} else { echo '&page='.($page + 1); } ?>">Next</a>
        </li>
    </ul>
	
</body>
</html>