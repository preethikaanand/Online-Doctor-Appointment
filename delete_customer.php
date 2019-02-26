<?

session_start();
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

if($conn)
{	
  $sql1 = "update customer set gravestone=1 WHERE c_id =".$id;
  $result1 = mysqli_query($conn,$sql1);
}
else{
	echo "not connected";
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
	<div class="wrapper">
		<a href="admin_customer.php" id="but" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Return to Admin Home Page</a>
	</div>

</body>
</html>