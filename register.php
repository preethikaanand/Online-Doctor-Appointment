
    <html>
    <head>
        <title>Register Page</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
        <link href='custom.css' rel='stylesheet' type='text/css'>
        <style type="text/css">
            .wrapper {
    text-align: center;
}


        </style>
    </head>
    <body>
        <h2> Sign Up</h2>
         <div class="wrapper">
        <!--<a href="contact.html" id="but" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Return to Home Page</a>-->
    </div>
        <div class="container">

            <div class="row">

                <div class="col-xl-18 offset-xl-2 py-5">

                    <!-- We're going to place the form here in the next step -->
                    <form id="contact-form" method="post" action="registercheck.php" role="form">


                    <div class="controls">

                        <div class="row">
                              
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_name">Firstname:</label>
                                        <input id="form_name" type="text" name="fname" class="form-control" placeholder="Please enter your firstname *" required="required"">
                                        
                                    </div>
                                </div>
                            
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_lastname">Lastname:</label>
                                        <input id="form_lastname" type="text" name="lname" class="form-control" placeholder="Please enter your lastname *" >
                                        
                                    </div>
                                </div>
                        </div>
                        <div class="row">
                        
                                        <label for="form_addtype">Gender:</label>
                                    
                        
                                <div class="col-md-6">

                                        <input type="radio" name="gen" value="male">Male<br>
                                        
                                                
                                        
                                    
                                </div>
                                <div class="col-md-6">
                                    <input type="radio" name="gen" value="female">Female<br>
                                </div>
                        </div>
                        <div class="row">
        
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_name">Date of Birth</label>
                    <input type="date" id="form_name" name="date1" class="form-control" required="required">
                    
                </div>
            </div>
          </div>
                        <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_addtype">Address Line 1:</label>
                                        <input id="form_lastname" type="text" name="add1" class="form-control" placeholder="Please Address Type *" required="required" >
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_addtype">Address Line 2:</label>
                                        <input id="form_lastname" type="text" name="add2" class="form-control" placeholder="Please Address Type *" >
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_addtype">City:</label>
                                        <input id="form_lastname" type="text" name="city" class="form-control" placeholder="Please enter city *" required="required">
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_addtype">State:</label>
                                        <input id="form_lastname" type="text" name="state" class="form-control" placeholder="Please enter state *" required="required">
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_addtype">ZIP:</label>
                                        <input id="form_lastname" type="text" name="zip" class="form-control" placeholder="Please enter ZIP code*" required="required">
                                        
                                    </div>
                                </div>
                        </div>
                        
            
                    
            <div class="row">
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_middlename"> Phone Number:</label>
                            <input id="form_middlename" type="text" name="number" class="form-control" placeholder="Please enter the number*" required="required">
                            
                        </div>
                    </div>
            
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_name">Email Id:</label>
                    <input type="email" name="mail" class="form-control" placeholder="Please enter the mail-id*" required="required">
                 </div>   
            </div>

        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_name">Password:</label>
                    <input type="password" name="pwd" class="form-control" required="required">
                 </div>   
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_name">Confirm Password:</label>
                    <input type="password" name="pwd2" class="form-control" required="required">
                 </div>   
            </div>
        </div>
            <div class="row">
                <div class="col-md-12">
                    </br>
                
                    <input style="margin-left: 40%;" type="submit" name="insertdata" value="Register">
                </div>
            </div>
           
    </div>

</form>

                </div>

            </div>

        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js" integrity="sha256-dHf/YjH1A4tewEsKUSmNnV05DDbfGN3g7NMq86xgGh8=" crossorigin="anonymous"></script>
        <script src="contact.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
            var max_fields      = 2;
            var wrapper         = $("#refdiv");
            var wrapper2        = $('#refdiv2');
            var wrapper3        = $('#refdiv3');
            var add_button      = $(".addbutton");
            var add_phone_button = $(".addphonebutton");
            var add_date_button = $(".adddatebutton");
        var x = 1, y=1, z=1;
        $(add_button).click(function(e){
            e.preventDefault();
    
            if(x < max_fields){
                x++;
               
              $(wrapper).append('<div class="row"><div class="col-md-6"><div class="form-group"><label for="form_addtype">Address Type:</label>                                        <select id="form_addtype" name="addtype3" class="form-control">                                            <option value="Home">Home </option>                                            <option value="Work">Work</option>                                            <option value="Other">Other</option>                                        </select>         </div>                                </div>                        </div>                        <div class="row">                                <div class="col-md-6">                                    <div class="form-group">                                        <label for="form_addtype">Address:</label>                                        <input id="form_lastname" type="text" name="add3" class="form-control" placeholder="Please Address Type *" ></div></div>                                <div class="col-md-6">                                    <div class="form-group">                                        <label for="form_addtype">City:</label>                                        <input id="form_lastname" type="text" name="city3" class="form-control" placeholder="Please enter city *" >                                    </div>                                </div>                                <div class="col-md-6">                                    <div class="form-group">                                        <label for="form_addtype">State:</label>                                        <input id="form_lastname" type="text" name="state3" class="form-control" placeholder="Please enter state *" >                                                                            </div>                                </div>                                <div class="col-md-6">                                    <div class="form-group">                                        <label for="form_addtype">ZIP:</label>                                        <input id="form_lastname" type="text" name="zip3" class="form-control" placeholder="Please enter ZIP code*" >                                                                            </div>                                </div>                        </div>');
              
            }
      else
      {
      alert('You can add only one extra address details')
      }
        });
        $(add_phone_button).click(function(e){
            e.preventDefault();
    
            if(y < max_fields){
                y++;
               
              $(wrapper2).append('<div class="row">           <div class="col-md-6">                <div class="form-group">                    <label for="form_id">Phone Type: </label>                    <select id="form_addtype" name="phonetype4" class="form-control">                                    <option value="Home">Home</option>                                    <option value="Work">Work</option>                                    <option value="Cell">Cell</option>                                    <option value="Other">Other</option>                                </select>                                    </div>            </div>            <div class="col-md-6">                <div class="form-group">                    <label for="form_name">Area Code :</label>                    <input id="form_name" type="text" name="areacode4" class="form-control" placeholder="Please enter Area Code *">                                    </div>            </div>            <div class="col-md-6">                <div class="form-group">                    <label for="form_middlename">Number</label>                    <input id="form_middlename" type="text" name="number4" class="form-control" placeholder="Please enter the number *">                                    </div>            </div>               </div>');
              
            }
      else
      {
      alert('You can add only one extra phone details')
      }
        });
        $(add_date_button).click(function(e){
            e.preventDefault();
    
            if(z < max_fields){
                z++;
               
              $(wrapper3).append('<div class="row">            <div class="col-md-6">                <div class="form-group">                    <label for="form_id">Date Type: </label>                    <select id="form_addtype" name="datetype2" class="form-control">                                    <option value=""></option>                                    <option value="Birth date">Birth date</option>                                    <option value="Anniverdary date">Anniversary Date</option>                                </select>                                    </div>            </div>            <div class="col-md-6">                <div class="form-group">                    <label for="form_name">Date</label>                    <input type="date" id="form_name" name="date2" class="form-control" >                                    </div>            </div>         </div>');
              
            }
      else
      {
      alert('You can add only one extra phone details')
      }
        });
        
    });

            
        </script>
    </body>
</html>