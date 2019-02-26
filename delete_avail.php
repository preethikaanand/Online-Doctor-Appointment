<?
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
	$did = $_GET['did'];
	$hid = $_GET['hid'];
	$day = $_GET['day'];
	$stime = $_GET['stime'];
	$etime = $_GET['etime'];

$sql1 = "UPDATE doctor_time set gravestone =1 where h_id=$hid and d_id = $did and day='$day' and start_time= '$stime' and end_time ='$etime'";
echo $sql1;
$result1 = mysqli_query($conn,$sql1);
	if($result1)
		header('location:admin_doctor_avail_view.php?contactidd='.$did);

	else 
		echo "error", $sql1;
}
mysqli_close($conn);

