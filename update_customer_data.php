
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
	
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$cid = $_POST['cid'];
$gen=$_POST['gen'];

$address1 = $_POST['add1'];
$address2 = $_POST['add2'];
$city1 = $_POST['city'];
$state1= $_POST['state'];
$zip1 = $_POST['zip'];

$dob = $_POST['date1'];

$phone = $_POST['pnumber'];
$mail = $_POST['mail'];
$pwd = $_POST['pwd'];
$grave=$_POST['grave'];


$sql="UPDATE customer SET fn = '$fname', ln = '$lname',  gender='$gen', dob ='$dob' , add_line_one = '$address1' , add_line_two = '$address2' , city= '$city1' , state = '$state1', phone='$phone', gravestone='$grave' WHERE c_id = '$cid'";
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
		<a href="admin_customer.php" id="but" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Return to Admin Home Page</a>
	</div>
  <?echo $sql?>

</body>
</html>