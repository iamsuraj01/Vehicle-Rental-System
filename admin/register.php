<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script type="text/javascript" src="../js/jquery.min.js"></script>
        <script type="text/javascript" src="../js/jquery.validate.js"></script>
         <script type="text/javascript" src="../js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css"> 
        <?php
        session_start();
        if (!($_SESSION['status'] == 'logedin')) {
            echo "<script> window.location='index.php';</script>";
            die();
        }
        ?>
        
     <script type="text/javascript">
               $().ready(function() {
                $("#register").validate({
                rules: {
                        "name": "required",
                        "email":{
                            required:true,
                            email:true
                        },
                        "phone": "required",
                        "password": "required",
                        "cnfpassword": 
                                {
                                    required:true,
                                    equalTo: "#password"
                                }
            },
                messages: {
                        "name": "<p style='color:red'>This Field is required</p>",
                        "email": {
                           required:"<p style='color:red'>This Field is required</p>",
                           email:"<p style='color:red'>Please Enter valid email</p>"
                            },
                        "phone": "<p style='color:red'>This Field is required</p>",
                        "password": "<p style='color:red'>This Field is required</p>",
                        "cnfpassword": 
                                {
                                    required:"<p style='color:red'>This Field is required</p>",
                                    equalTo: "<p style='color:red'>Password do not match</p>"
                                }
                        }
                    });   
                });
            </script>   
    </head>
    <body id="app-layouts">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="dashboard.php">
                        <img src="">
                    </a>
                    <div class="collapse navbar-collapse" id="app-navbar-collapse">
                        <!-- Left Side Of Navbar -->
                        <ul class="nav navbar-nav">
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <?php if (isset($_SESSION['username'])) {
                                        echo $_SESSION['username'];
                                    }
                                    ?> <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="logout.php">Logout</a></li>
                                    <li><a href="register.php">Register</a></li>
                                   </ul>
                            </li>
                        </ul>
                    </div>
                </div> 
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                   <div class="panel-heading"><h4>Register user</h4></div>
                        <div class="panel-body">                         
                            <form name="reister" id="register" method="post" action="register_save.php">
                                Name: <input class="form-control" type="text" id="name" name="name"><br>
                                 Email: <input class="form-control" type="text" id="email" name="email"><br>
                                Phone: <input class="form-control" type="text" id="phone" name="phone"><br>
                                Password: <input class="form-control" type="password" id="password" name="password"><br>
                                Confirm Password: <input class="form-control" type="password" id="cnfpassword" name="cnfpassword"><br>
                                <input class="btn-default" type="submit" name="submit" value="Submit">
                            </form>
                        </div>
                    </div>
            </div>
        </div>
    </body>
</html>

