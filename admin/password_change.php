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
        <script type="text/javascript" src="../js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../js/jquery.validate.js"></script>
        <script type="text/javascript" src="../js/additional-methods.js"></script>
        <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css"> 
        <?php
        session_start();
        if (!($_SESSION['status'] == 'logedin')) {
            echo "<script> window.location='index.php';</script>";
            die();
        }
        ?>
        <script type="text/javascript">
            function check()
            {
                var opass = document.getElementById('oldpassword').value;
                $.ajax({
                    type: "POST",
                    url: 'test.php',
                    data: {name: opass},
                    success: function (data) {
                        alert(data);
                    }
                });
            }
            $().ready(function () {
                $("#change").validate({
                    rules: {
                        "oldpassword": "required",
                        "newpassword": "required",
                        "cnfnewpassword":
                                {
                                    required: true,
                                    equalTo: "#newpassword"
                                }
                    },
                    messages: {
                        "oldpassword": "<p style='color:red'>This Field is required</p>",
                        "newpassword": "<p style='color:red'>This Field is required</p>",
                        "cnfnewpassword":
                                {
                                    required: "<p style='color:red'>This Field is required</p>",
                                    equalTo: "<p style='color:red'>Password do not match</p>"
                                }
                    }
                });
            });
        </script>
        <?php 
        $wrongoldpass='';
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            require_once 'connection.php';
            $oldpass = $_POST['oldpassword'];
            $newpass = md5($_POST['newpassword']);
            $user = $_SESSION['username'];
            $sql = "SELECT password FROM users where username='$user'";
            $result = mysqli_fetch_array($conn->query($sql));
            if($result['password']==md5($oldpass))
            {
                $sql = "UPDATE users SET password='$newpass' where username='$user'";
                if($conn->query($sql)==TRUE)
                {
                    echo "<script>alert('password changed Successfully')</script>";
                     echo "<script>window.location='dashboard.php'</script>";   
                }
                
            }else{
                $wrongoldpass="Incorect Old password";
            }
            }
        ?>
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
                                    <li><a href="password_change.php">Change Password</a></li>
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
                    <div class="page-header">
                        <h1>Welcome to admin Dashboard
                            <a href="dashboard.php" class="btn btn-warning btn-xs pull-right" title="Back">Back</a>
                        </h1>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Change Password</h4>                            
                        </div>
                        <div class="panel-body">                         
                            <form name="change" id="change" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                Old Password:<p style="color:red"><?php echo $wrongoldpass; ?></p> <input class="form-control" type="password" id="oldpassword" name="oldpassword"><br>
                                New Password: <input class="form-control" type="password" id="newpassword" name="newpassword"><br>
                                Confirm New Password: <input class="form-control" type="password" id="cnfnewpassword" name="cnfnewpassword"><br>
                                <input class="btn-default" type="submit" name="submit" value="Submit">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

