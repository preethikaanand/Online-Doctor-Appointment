
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
	
$name = $_POST['name'];
$hid = $_POST['cid'];
$address1 = $_POST['add1'];
$address2 = $_POST['add2'];
$city1 = $_POST['city'];
$state1=$_POST['state'];
$phone = $_POST['pnumber'];


$sql="UPDATE hospital SET name = '$name', add_line_one = '$address1' , add_line_two = '$address2' , city= '$city1' , state = '$state1' , ph = '$phone' WHERE h_id = '$hid'";
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
		<a href="admin_hospital.php" id="but" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Return to Admin Home Page</a>
	</div>
  <?echo $sql?>

</body>
</html>