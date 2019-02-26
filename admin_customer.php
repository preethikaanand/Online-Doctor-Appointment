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
        <a href="registercustomer.php" id="but" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Insert New Patient Details</a>
    </div>
<table class="table table-striped"><tr><td>C_ID</td><td>FIRST NAME</td><td>LAST NAME</td><td>OPERATIONS</td></tr>
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

if(!$conn)
{
  exit;
}

$query ="SELECT * from customer";
$rx = mysqli_query($conn,$query);
$row_count += mysqli_num_rows($rx);
while ($rw = mysqli_fetch_array($rx))
{
echo "<tr><td>".$rw["c_id"] . "</td><td>" .$rw['fn']. "</td><td>" .$rw['ln']. "</td><td><a href=admin_customer_update.php?contactidd=".$rw["c_id"].">  Update  </a><a href=delete_customer.php?contactidd=".$rw["c_id"].">  Delete  </a><a href=admin_customer_view.php?contactidd=".$rw["c_id"].">  View  </a></td></tr>"; 


 }
 

?>
</table>
<div class="wrapper">
    <a href="adminhome.php" id="but" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Return to Home Page</a>
  </div>
</body>
</html>