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
                                    <?php if (isset($_SESSION['admin'])) {
                                        echo $_SESSION['admin'];
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
                        <h1>Welcome to admin Dashboard</h1>
                    </div>
                    <div class="panel panel-default">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="" ><a href="dashboard.php">Bookings</a></li>
                            <li class="active" ><a href="addvehicle.php">Add Vehicles</a></li>
                             <li class="" ><a href="adddrivers.php">Add Drivers</a></li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="">
                                <div class="panel-body">
                                    <a href="service_addvehicle.php" class="btn btn-sm btn-warning" title="Add">Add</a>    
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                        <td class="text-center" width="20%" style="color:red">Name</td>
                                        <td class="text-center" width="20%" style="color:red">Type</td>
                                        <td class="text-center" width="20%" style="color:red">MOdel</td>
                                        <td class="text-center" width="20%" style="color:red">Description</td>
                                        <td class="text-center" width="20%" style="color:red">Rate</td>
                                        <td class="text-center" width="20%" style="color:red">Image</td>
                                        <td class="text-center" width="20%" style="color: red"></td>
                                        </thead>
                                        <tbody>
                                            <?php
                                            require_once 'connection.php';
                                            $sql = "SELECT * FROM tbl_vehical";
                                            $query = $conn->query($sql);
                                            if ($query->num_rows > 0) {
                                                while ($result = mysqli_fetch_array($query)) {
                                                    ?>
                                            <tr>
                                            <td class="text-center">
                                                    <?php echo $result['v_name']; ?>
                                                  
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $result['v_type']; ?>
                                                </td>
                                                <td class="text-center">
                                                  <?php echo $result['model']; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $result['description']; ?>

                                                </td>
                                                </td>
                                                 <td class="text-center">
                                                    <?php echo $result['rate']; ?>

                                                </td>

                                                 <td class="text-center">
                                                    <img src="../v_img/<?php echo $result['v_img'];?>" style="height: 50px; width: 50px;" >
                                                
                                                <td class="text-center">
                                                    <a href="service_edit.php?id=<?php echo $result['id'];?>" class="btn btn-sm btn-default" title="Edit"><i class="glyphicon glyphicon-edit"></i></a> 
                                           
                                                  <a href="delete_vehicle.php?id=<?php echo $result['id'];?>" class="btn btn-sm btn-default" title="Delete" onclick="return confirm('Confirm delete?')"><i class="glyphicon glyphicon-trash"></i></a>    
                                                </td>
                                            
                                            </tr>
                                                <?php }
                                           } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

