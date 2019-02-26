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


img{
  width:80px;
  height:80px;
  }
  </style>

</head>
<body>
  <div class="wrapper">
        <a href="registerdoctor.php" id="but" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Insert New Doctor Details</a>
    </div>
<table style= "color: red;"class="table table-striped"><tr><td>DOCTOR Image</td><td>DOCTOR ID</td><td>FIRST NAME</td><td>OPERATIONS</td></tr>
<?php

session_start();
//$id = $_GET['contactid'];
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


$query ="SELECT * from doctor";
$rx = mysqli_query($conn,$query);
$row_count += mysqli_num_rows($rx);

while ($rw = mysqli_fetch_array($rx))
{
echo "<tr><td><img src='data:image/png;base64,".base64_encode($rw["image"]) . "'/></td><td>".$rw["d_id"] . "</td><td>" .$rw['fn']. "</td><td><a href=admin_doctor_update.php?contactidd=".$rw["d_id"].">  Update  </a><a href=delete_doctor.php?contactidd=".$rw["d_id"].">  Delete  </a><a href=admin_doctor_view.php?contactidd=".$rw["d_id"].">View</a> <a href=admin_doctor_avail_insert.php?contactidd=".$rw["d_id"].">Insert Availability</a> <a href=admin_doctor_avail_view.php?contactidd=".$rw["d_id"].">View Availability  </a></td> </tr>"; 

 }
}
 
?>
</table>
<div class="wrapper">
    <a href="adminhome.php" id="but" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Return to Doctor Page</a>
  </div>
</body>
</html>