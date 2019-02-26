
<?

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
if($conn)
{
	
  
    $day = $_POST['day'];
    $h_id = $_POST['hid'];
    $d_id = $_POST['did'];
    $stime = $_POST['stime'];
    $etime = $_POST['etime'];
    $price=$_POST['price'];


$sql="INSERT INTO doctor_time(h_id , d_id, day, start_time,end_time,price) VALUES ('$h_id', '$d_id','$day','$stime','$etime', '$price')";
mysqli_query($conn,$sql);
}
else
{
	echo "Somethin went wrong ! Connection failure";
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
  	.wrapper {
    text-align: center;
}

#but {
	top: 500%;
    margin: auto;
    display:block;
}
  </style>
</head>
<body>
	<div>
		<h3 style="text-align: center;">Record has been updated</h3>
	</div>
	<div class="wrapper">
		<a href="admin_doctor.php" id="but" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Return to doctor Home Page</a>
	</div>
  <?echo $sql?>

</body>
</html>