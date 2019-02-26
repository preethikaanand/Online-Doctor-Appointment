<?
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

$sql1 = "SELECT * FROM customer WHERE c_id =".$id;

$result1 = mysqli_query($conn,$sql1);




if(mysqli_num_rows($result1)>0)
{
	

	$row1 = mysqli_fetch_array($result1);
	$fname = $row1['fn'];
	$lname = $row1['ln'];
    $gender = $row1['gender'];
    $dob = $row1['dob'];
    $add1 = $row1['add_line_one'];
    $add2 = $row1['add_line_two'];
    $city = $row1['city'];
    $state = $row1['state'];
    $email = $row1['email'];
    $pwd = $row1['password'];
    $ph = $row1['phone'];
    $grave = $row1['gravestone'];
    $zip = $row1['zip'];
	
}
else
{
  echo "Something Went Wrong!";
	exit();
}

?>
<html>
    <head>
        <title>Update Record</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
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
        <div class="wrapper"><!--add front page here -->
        <a href="admin_customer.php" id="but" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Return to Home Page</a>
    </div>
        <div class="container">

            <div class="row">

                <div class="col-xl-18 offset-xl-2 py-5">

                    <!-- We're going to place the form here in the next step -->
                    <form id="contact-form" method="post" action="update_customer_data.php" role="form">


                    <div class="controls">

                        <div class="row">
                              
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_name">Firstname:</label>
                                        <input id="form_name" type="text" name="fname" class="form-control" value="<?php echo $fname?>"/>
                                        
                                    </div>
                                </div>
                            
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_lastname">Lastname:</label>
                                        <input id="form_lastname" type="text" name="lname" class="form-control" value="<?php echo $lname?>" />
                                        
                                    </div>
                                </div>
                        </div>
                        <div class="row">
                        
                                        <label for="form_addtype">Gender:</label>
                                    
                        
                                <div class="col-md-6">

                                        <input type="radio" name="gen" value="male" <? if($gender=='male'){ echo 'checked';}?> >Male<br>
                                        
                                                
                                        
                                    
                                </div>
                                <div class="col-md-6">
                                    <input type="radio" name="gen" value="female" <? if($gender=='female'){ echo 'checked';}?> >Female<br>
                                </div>
                        </div>
                        <div class="row">
        
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_name">Date of Birth</label>
                    <input type="date" id="form_name" name="date1" class="form-control" value="<?php echo $dob?>">
                    
                </div>
            </div>
            <div class="col-md-6" style="visibility: hidden;">
                                    <div class="form-group">
                                        <label for="form_id">Contact ID:</label>
                                        <input id="form_id" type="number" name="cid" class="form-control" value="<?php echo $id?>">
                                    
                                    </div>
                                </div>
          </div>
                        <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_addtype">Address Line 1:</label>
                                        <input id="form_lastname" type="text" name="add1" class="form-control" value="<?php echo $add1?>">
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_addtype">Address Line 2:</label>
                                        <input id="form_lastname" type="text" name="add2" class="form-control" value="<?php echo $add2?>" >
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_addtype">City:</label>
                                        <input id="form_lastname" type="text" name="city" class="form-control" value="<?php echo $city?>">
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_addtype">State:</label>
                                        <input id="form_lastname" type="text" name="state" class="form-control" value="<?php echo $state?>">
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_addtype">ZIP:</label>
                                        <input id="form_lastname" type="text" name="zip" class="form-control" value="<?php echo $zip?>">
                                        
                                    </div>
                                </div>
                        </div>
                        
            
                    
            <div class="row">
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_middlename"> Phone Number:</label>
                            <input id="form_middlename" type="number" name="pnumber" class="form-control"  value="<?php echo $ph ?>" >
                            
                        </div>
                    </div>
            
        </div>
        <div class="row">
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_middlename"> Deleted:</label>
                            <input id="form_middlename" type="number" name="grave" class="form-control"  value="<?php echo $grave ?>" >
                            
                        </div>
                    </div>
            
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_name">Email Id:</label>
                    <input type="email" name="mail" class="form-control" value="<?php echo $email?>">
                 </div>   
            </div>

        </div>
        <!-- <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_name">Password:</label>
                    <input type="password" name="pwd" class="form-control" value="<?php echo $pwd?>">
                 </div>   
            </div>
            
        </div> -->
            <div class="row">
                <div class="col-md-12">
                    </br>
                
                    <input style="margin-left: 40%;" type="submit" name="insertdata" value="Update Data">
                </div>
            </div>
           
    </div>
</form>
                </div>

            </div>

        </div>

        
    </body>
</html>