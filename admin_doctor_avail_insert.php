<?
$id = $_GET['contactidd'];
?>

<html>
    <head>
        <title>Insert Availability</title>
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
        <a href="admin_doctor.php" id="but" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Return to Home Page</a>
    </div>
        <div class="container">

            <div class="row">

                <div class="col-xl-18 offset-xl-2 py-5">

                    <!-- We're going to place the form here in the next step -->
                    <form id="contact-form" method="post" action="admin_doctor_insert.php" role="form">


                    <div class="controls">

                        <div class="row">
                              
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="form_name">Day:</label>
                                        <input id="form_name" type="text" name="day" class="form-control" placeholder="day">
                                        
                                    </div>
                                </div>
                            
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="form_lastname">Hospital Id:</label>
                                        <input id="form_lastname" type="text" name="hid" class="form-control" />
                                        
                                    </div>
                                </div>
                        </div>
                        <div class="col-md-6" style="visibility: hidden;">
                                    <div class="form-group">
                                        <label for="form_id">Contact ID:</label>
                                        <input id="form_id" type="number" name="did" class="form-control" value="<?php echo $id?>">
                                    
                                    </div>
                                </div>
              
                        
            
                    
            <!-- <div class="row">
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_middlename"> Phone Number:</label>
                            <input id="form_middlename" type="text" name="pnumber" class="form-control" placeholder="Please enter the number*" >
                            
                        </div>
                    </div>
            
        </div> -->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_name">Start Time:</label>
                    <input type="time" name="stime" class="form-control" >
                 </div>   
            </div>

        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_name">End Time : </label>
                    <input type="time" name="etime" class="form-control">
                 </div>   
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_name">Price : </label>
                    <input type="decimal" name="price" class="form-control">
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
                
                    <input style="margin-left: 40%;" type="submit" name="insertdata" value="Insert Availability">
                </div>
            </div>
           
    </div>
</form>
                </div>

            </div>

        </div>

        
    </body>
</html>