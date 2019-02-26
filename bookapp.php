<?
	ini_set('display_errors', 1);
	error_reporting(E_ALL);
	session_start();

	//Check whether the session variable SESS_MEMBER_ID is present or not
	if(!isset($_SESSION['name']) || (trim($_SESSION['name']) == '')) {
	  header("location: homepage.php");
	  exit();
	}
	$name=$_SESSION['name'];
	$cid=$_SESSION['c_id'];
	$did = $_GET['did'];
	$hid = $_GET['hid'];
?>
<html>
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
		<script type="text/javascript">
			$(document).ready(function(){
				var a =$('table tr #avail').text().split(";");
				var arr=[];
				$.each(a,function(i,val){
					var s = val.substring(0,3);
					switch(s){
						case 'sun':
							arr.push(0);
							break;
						case 'mon':
							arr.push(1);
							break;
						case 'tue':
							arr.push(2);
							break;
						case 'wed':
							arr.push(3);
							break;
						case 'thu':
							arr.push(4);
							break;
						case 'fri':
							arr.push(5);
							break;
						case 'sat':
							arr.push(6);
							break;

					}
					
				});

				console.log(arr);
				var d = new Date();
				var dates=[]
				var maxd =new Date( Date.parse(d)+14*86400000);
				var mind = new Date( Date.parse(d)+1*86400000);
				var day = mind.getDay();
				$.each(arr, function(i,val){
					var d1,d2;
					if(day <= val){
						d1 = new Date(Date.parse(mind)+(val-day)*86400000);
						d2 = new Date(Date.parse(d1)+7*86400000);
					}
					else
					{
						d1 = new Date(Date.parse(mind)+(val-day+7)*86400000);
						d2 = new Date(Date.parse(d1)+7*86400000);
					}
					/*var dd=d1.getDate();
					var mm = d1.getMonth()+1;
					var yyyy =d1.getFullYear();
					mm = mm<10?('0'+mm):mm;
					dd = dd<10?('0'+dd):dd;	
					dates.push(yyyy+"-"+mm+"-"+dd);
					dd=d2.getDate();
					mm = d2.getMonth()+1;
					yyyy =d2.getFullYear();
					mm = mm<10?('0'+mm):mm;
					dd = dd<10?('0'+dd):dd;	
					dates.push(yyyy+"-"+mm+"-"+dd);*/
					dates.push(d1.toString().substring(0,15));
					dates.push(d2.toString().substring(0,15));
				});
				console.log(dates);
				$('table tr').last().append("<td id = 'availabledates'></td><td id='availableapp'></td>");
				$.each(dates,function(i,val){
					$("#availabledates").append("<p>"+val +"</p>");
					$("#availableapp").append("<p><a href='confirmapp.php?did=<? echo $did;?>&hid=<? echo $hid; ?>&cid=<? echo $cid; ?>&date="+val+"'>Confirm Appointment</a></p>");


				});

				/*var dd=maxd.getDate();
				var mm = maxd.getMonth()+1;
				var yyyy =maxd.getFullYear();
				mm = mm<10?('0'+mm):mm;
				dd = dd<10?('0'+dd):dd;			
				$("#datepicker").attr('max',yyyy+"-"+mm+"-"+dd);
				dd=mind.getDate();
				mm = mind.getMonth()+1;
				yyyy =mind.getFullYear();
				mm = mm<10?('0'+mm):mm;
				dd = dd<10?('0'+dd):dd;
				$("#datepicker").attr('min',yyyy+"-"+mm+"-"+dd);
*/
			});
		</script>
	</head>
	<body>
		<h3>Pick Appointment Date</h3>
	</body>
</html>
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

	if(!$conn){
		echo "Connection Failed!";
		exit;
	}
	$sql="SELECT  doctor.d_id, hospital.h_id, concat(doctor.fn, ' ',doctor.ln) as 'doctor_name', hospital.name, doctor.specialty, doctor.experience, price, GROUP_CONCAT(doctor_time.day,', ', doctor_time.start_time,', ', doctor_time.end_time ORDER BY doctor_time.day SEPARATOR '; ') AS dow FROM hospital, doctor, doctor_time where hospital.h_id=".$hid." and hospital.h_id = doctor_time.h_id and doctor_time.d_id = doctor.d_id and doctor.d_id=".$did." GROUP BY 'doctor_name', hospital.name, doctor.specialty, doctor.experience,price";
	$result = mysqli_query($conn,$sql);
	echo "<table class='table table-striped table-hover table-dark' id='results'><tr><td>Doctor Name</td><td>Hospital Name</td><td>Specialty</td><td>Experience</td><td>Availablity</td><td>Price</td></tr>";
	
	$row=mysqli_fetch_array($result, MYSQLI_ASSOC);

	$dName = $row["doctor_name"];
	$hName = $row["name"];
	$exp = $row["experience"];
	$availabilty = $row["dow"];
	$specialty = $row["specialty"];
	echo "<tr><td>".$dName."</td><td>".$hName."</td><td>".$specialty."</td><td>".$exp."</td><td id='avail'>".$availabilty."</td><td>".$row['price']."</td><td></td></tr>";
  
	echo "</table>";
	echo "<a href='userhome.php'>Back to home page</a>";
	
	mysqli_close($conn);
?>
