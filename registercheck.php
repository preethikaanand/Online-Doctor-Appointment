<?php

session_start();

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

if (!$conn){
	echo "Not connected";
	exit;
}

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$gen = $_POST['gen'];

$date = $_POST['date1'];
$address1 = $_POST['add1'];
$address2 = $_POST['add2'];
$city = $_POST['city'];
$state= $_POST['state'];

//$phone = $_POST['number'];
$mail = $_POST['mail'];
$pass = $_POST['pwd'];
$hashed_password = hash('sha512' , $pass);

$insert_contact = "INSERT INTO customer(fn,ln,gender,dob,add_line_one,add_line_two,city,state,email,password) VALUES ('$fname','$lname','$gen', '$date', '$address1','$address2','$city','$state','$mail','$hashed_password')";

if(mysqli_query($conn,$insert_contact))
{
	session_regenerate_id(); //recommended since the user session is now authenticated
    $_SESSION['name'] = $fname;

    session_write_close();

    header("location:userhome.php");
}
else
{
	echo "Failed to register Please retry at http://localhost/Project/register.php ";
}



?>
