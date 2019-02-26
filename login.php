<?php
ini_set('display_errors', 1);
  error_reporting(E_ALL);
  session_start();
  // define variables and set to empty values
  $name = $pwd = "";
  $flag=0;

  if ($_SERVER["REQUEST_METHOD"] == "POST")
  {
    $name = $_POST["username"];
    $pwd = hash('sha512' ,$_POST["password"]);

    $cat = $_POST['button'];
   
  }
  if (empty($name))
    $flag=1;
  if (empty($password))
    $flag=1;

  $user = 'root';
  $password = 'root';
  $db = 'project';
  $host = 'localhost';
  $port = 3306;
  $sql= $result="";


  $conn = mysqli_connect( 
     $host, 
     $user, 
     $password, 
     $db,
     $port
  );
  $admin = "admin@quickhealth.com";
  $p = hash('sha512','admin');
  if(!$conn){
    echo "Connection Failed!";
    exit;
  }
  if($name == $admin && $pwd == $p)
  {
    
    header("location:adminhome.php");
  }
  else if($cat == "Doctor")
  {
    $sql ="SELECT * FROM doctor where email='$name' and password='$pwd'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    if($row)
      $flag=0;
    else
      $flag=1;
  
    if($flag==1)
      header("location:login.html");
    else{
      session_regenerate_id(); //recommended since the user session is now authenticated
      $_SESSION['name'] = $row["fn"];
      $_SESSION['d_id'] = $row['d_id'];

      session_write_close();

      header("location:doctorhome.php");
    }
  }
  else
  {
    $sql ="SELECT * FROM customer where email='$name' and password='$pwd' ";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if($row)
      $flag=0;
    else
      $flag=1;

    if($flag==1)
      header("location:login.html");
    else{
      session_regenerate_id(); //recommended since the user session is now authenticated
      $_SESSION['name'] = $row["fn"];
      $_SESSION['c_id'] = $row["c_id"];
      $_SESSION['offset'] = 0;

      session_write_close();
      header("location:userhome.php");
    }
  }
mysqli_close($conn);
?>
