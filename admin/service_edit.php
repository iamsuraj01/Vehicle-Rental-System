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
        <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css"> 
        <?php
        session_start();
        if (!($_SESSION['status'] == 'logedin')) {
            echo "<script> window.location='index.php';</script>";
            die();
        }
        ?>
         <?php 
       if ($_SERVER["REQUEST_METHOD"] == "POST") {
            require_once 'connection.php';
            $u= $_GET['id'];
            $name=$_POST['name'];
            $type=$_POST['type'];
            $model=$_POST['model'];
            $des=$_POST['des'];
            $rate = $_POST['rate'];
            $post_img = $_FILES['image']['name'];
            $post_img_temp = $_FILES['image']['tmp_name'];
            move_uploaded_file($post_img_temp, "../v_img/$post_img");
                $sql = "UPDATE tbl_vehical SET v_name='$name',description='$des', v_type='$type' , model='$model', rate='$rate', v_img='$post_img' where id='$u'";
                if($conn->query($sql)==TRUE)
                {
                    echo "<script>alert('updated Successfully')</script>";
                     echo "<script>window.location='addvehicle.php'</script>";   
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
                                        echo $_SESSION['email'];
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
                         </div>
                    <div class="panel panel-default">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="active" ><a href="dashboard.php">Please Proceed</a></li>
                            
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="">
                                <div class="panel-body">
                                            <?php
                                            require_once 'connection.php';
                                            $id = $_GET['id'];
                                            $sql = "SELECT *FROM tbl_vehical where id='$id'";
                                            $query = $conn->query($sql);
                                            if ($query->num_rows > 0) {
                                                $result = mysqli_fetch_array($query)
                                                    ?> 
                                    <form name="myform" id="myform" method="post" action="" enctype="multipart/form-data">
                                         Company Name: <input class="form-control" type="text" id="title" name="name" value="" placeholder="Enter company name of vehicle" ><br>
                                        Type :<input class="form-control" type="text" id="title" name="type" value="" placeholder="Enter Vehicle Type" ><br> 
                                         Model :<input class="form-control" type="text" id="title" 
                                         name="model" value="" placeholder="Enter Vehicle Model" ><br> 
                                         Description :<input class="form-control" type="text" id="title" 
                                         name="des" value="" placeholder="Enter description"><br> 
                                         Rate :<input class="form-control" type="text" id="title" 
                                         name="rate" value="" placeholder="Enter rate" ><br> 
                                         Image : <input type="file" name="image" >
                                                    </form>
                                                      <br><br> <input class="btn-default" type="submit" name="submit" value="Edit ">
                                                
                                                <?php }
                                           ?>
                                        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

