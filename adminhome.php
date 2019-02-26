<?php

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

	if(!$conn)
	{
		exit;
	}
	?>
	<!DOCTYPE html>
<html>
<head>
<style>
body {
    background-image: url("background.jpg");
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: 2000px 1000px;
}
.dropbtn1, .dropbtn2 , .dropbtn3{
    background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropdown {
    position: center;
    display: inline-block;
}

.dropdown-content1 {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}
.dropdown-content2 {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content3 {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}
.dropdown-content1 a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content1 a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content1 {
    display: block;
}


.dropdown:hover .dropdown-content3 {
    display: block;
}
.dropdown:hover .dropbtn1 .dropbtn2 .dropbtn3{
    background-color: #3e8e41;
}
a{
    text-decoration: none;
}
h2{
    color:white;
}
</style>
</head>
<body>

<h2>Admin Home Page</h2>


<div class="dropdown">
  <button class="dropbtn1"><a href= "admin_hospital.php"/>Hospital</button>
  <!-- <div class="dropdown-content1">
    <a href="#">Update</a>
    <a href="#">View</a>
    <a href="#">Delete</a>
  </div> -->
  
</div>
<div class="dropdown">
<button class="dropbtn2"><a href= "admin_customer.php"/>Patient</button>
  <!-- <div class="dropdown-content2">
    <a href="#">Update</a>
    <a href="#">View</a>
    <a href="#">Delete</a>
  </div> -->
</div>
<div class="dropdown">
<button class="dropbtn3"><a href= "admin_doctor.php"/>Doctor</button>
  <!-- <div class="dropdown-content3">
    <a href="#">Update</a>
    <a href="#">View</a>
    <a href="#">Delete</a>
  </div> -->
</div>
</body>
</html>
