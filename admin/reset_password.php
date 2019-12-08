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
        <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
        <?php
        if(isset($_POST['submit']))
        {
            $pass=md5($_POST['newpassword']);
                                    require_once 'connection.php';
                                    $token=$_POST['token'];
                                    $sql = "SELECT email from tokens where token='$token' limit 1";
                                    $rt = $conn->query($sql);
                                    if($rt->num_rows>0)
                                    {
                                        $result=mysqli_fetch_array($rt);
                                        $email = $result['email'];
                                        $sql = "UPDATE users SET password='$pass' where username='$email'";                                       
                                        if($conn->query($sql)==TRUE)
                                        {
                                            echo "<script>alert('password reset Successfully')</script>";
                                            echo "<script>window.location='index.php'</script>";   
               
                                        }
                                    }else{
                                        echo "<script>alert('Link Expires')</script>";
                                            echo "<script>window.location='index.php'</script>";   
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
                    <a class="navbar-brand" href="index.php">
                        <img src="">
                    </a>
                    <div class="collapse navbar-collapse" id="app-navbar-collapse">
                        <!-- Left Side Of Navbar -->
                        <ul class="nav navbar-nav">

                        </ul>
                    </div>
                </div> 
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                    <div class="page-header">
                        <h1>Welcome to admin panel</h1>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading"><h4>Password Reset </h4></div>
                        <div class="panel-body">                                
                            <form name="change" id="change" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                <input type="hidden" name="token" value="<?php echo $_GET['token'] ?>"> 
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
