<?
	session_start();
	if(!isset($_SESSION['d_id']) || (trim($_SESSION['d_id']) == '')) {
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
	<style>
	img{
		height:150px;
		width:150px;
	}
	</style>
	<script>
		$(function(){
			$("#det li").addClass("list-group-item");
		})
	</script>
	<!-- <link rel="stylesheet" type="text/css" href="index.css"/> -->
	
</head>

<body>
	<?

		$name =  $_SESSION["name"];
	?>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<ul class="nav navbar-nav topnav_home">
				<li><a href="#">Quick Health</a></li>
			</ul>
			<ul class="nav navbar-nav topnav_home navbar-right">
				<li><a> Welcome Doctor <?php echo $name?></a></li>
				<li><a href="dappointments.php"> Appointments</a></li>
      			<li><a href="logout.php"> Logout</a></li>
			</ul>
		</div>
	</nav>
	<h3> Your Personal Info and Current Schedule</h3>

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
	$sql="Select * from doctor where d_id=".$_SESSION['d_id'];

	$result=mysqli_query($conn,$sql);
	$rw = mysqli_fetch_array($result);
	echo "<ul id ='det' class='list-group'><li><img src='data:image/png;base64,".base64_encode($rw["image"]) . "'/></li><li>".$rw["d_id"] . "</li><li>" .$rw['fn']. "</li><li>" .$rw['ln']. "</li><li>" .$rw['gender']. "</li><li>" .$rw['dob']. "</li><li>" .$rw['add_line_one'].", ".$rw['add_line_one']. "</li><li>" .$rw['city'].", ".$rw['state']. "</li><li>" .$rw['education']. "</li><li>" .$rw['experience']. "</li><li>" .$rw['specialty']. "</li></ul>";

	mysqli_close($conn);
?>
	
</body>
</html>