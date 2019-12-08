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
                        <div class="panel-heading"><h4>User Login </h4></div>
                        <div class="panel-body">                         
                            <form name="login" method="post" action="logincheck.php">
                                Username: <input class="form-control" type="text" id="username" name="username"><br>
                                Password: <input class="form-control" type="password" id="password" name="password"><br>
                                <input class="btn-default" type="submit" name="submit" value="Login" style="padding: 5px;">
                            </form> 
                            <a href="forgot_password.php">Forgot your password</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
