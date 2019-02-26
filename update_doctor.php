
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
	
// $fname = $_POST['fname'];
// $lname = $_POST['lname'];
// $email = $_POST['mail'];
// $edu = $_POST['edu'];
// $spec = $_POST['spc'];
$did = $_POST['cid'];

  $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['mail'];
    $pwd = $_POST['pwd'];

    $gender = $_POST['gen'];
    $dob = $_POST['date1'];
    $add1 = $_POST['add1'];
    $add2 = $_POST['add2'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    
    $grave=$_POST['pnumber'];
    $exp = $_POST['exp'];
    $edu = $_POST['edu'];
    $spec = $_POST['spc'];
$sql="UPDATE doctor SET fn = '$fname', ln = '$lname', gender = '$gender',dob ='$dob',add_line_one = '$add1', add_line_two = '$add2' , city = '$city' , state = '$state' , experience = '$exp' , email = '$email' , education = '$edu' , specialty = '$spec' WHERE d_id = '$did'";
echo $sql;
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
		<a href="admin_doctor.php" id="but" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Return to Admin Home Page</a>
	</div>

</body>
</html>