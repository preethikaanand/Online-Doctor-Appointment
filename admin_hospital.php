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
        <a href="registerhospital.php" id="but" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Insert New Hospital Details</a>
    </div>
<table class="table table-striped"><tr><td>HOSPITAL ID</td><td>NAME</td></tr>
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


$query ="SELECT * from hospital";
$rx = mysqli_query($conn,$query);
$row_count += mysqli_num_rows($rx);

while ($rw = mysqli_fetch_array($rx))
{
echo "<tr><td>".$rw["h_id"] . "</td><td>" .$rw['name']. "</td><td><a href=admin_hospital_update.php?contactidd=".$rw["h_id"].">  Update  </a><a href=delete_hospital.php?contactidd=".$rw["h_id"].">  Delete  </a><a href=admin_hospital_view.php?contactidd=".$rw["h_id"].">  View  </a></td></tr>"; 


 }
 }

?>
</table>
<div class="wrapper">
    <a href="adminhome.php" id="but" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Return to Admin Home Page</a>
  </div>
</body>
</html>