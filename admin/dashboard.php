<?php
 
include 'connection.php';
?>




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
                            <li class="active" ><a href="dashboard.php">Bookings</a></li>
                            <li class="" ><a href="addvehicle.php">Add Vehicles</a></li>
                             <li class="" ><a href="adddrivers.php">Add Drivers</a></li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="">
                                <div class="panel-body">
                                   
                                    <table class="table table-striped table-bordered">
                                        <thead style="font-weight: bold;">
                                        <td class="text-center" width="14%" style="color:red">Name</td>
                                        <td class="text-center" width="14%" style="color:red">Address</td>
                                        <td class="text-center" width="14%" style="color:red">E-mail</td>
                                        <td class="text-center" width="14%" style="color:red">Mobile No.</td>
                                        <td class="text-center" width="14%" style="color:red">Price</td>
                                        <td class="text-center" width="14%" style="color:red">Vehicle Name</td>
                                        <td class="text-center" width="14%" style="color:red">Vehicle Image</td>
                                        <td class="text-center" width="14%" style="color:red">Pick up Date</td>
                                        <td class="text-center" width="14%" style="color:red">Drop Off Date</td>
                                         <td class="text-center" width="14%" style="color:red"></td>
                                        </thead>
                                        <tbody>
                                            <?php
                                            
                                            $query= "SELECT * FROM tbl_rent";
                                                $result = mysqli_query($conn,$query);
                                                while($row=mysqli_fetch_assoc($result))
                                                {
                                                   $rent_id=$row['id'];
                                                    $fdate = $row['start_date'];
                                                    $tdate = $row['end_date'];
                                                    $price = $row['price'];
                                                    $v_id = $row['v_id'];
                                                    $user_id=$row['user_id'];
                                                
                                                
                                                $_SESSION['v_id'] = $v_id;
                                                $select_vid= "SELECT * FROM tbl_vehical WHERE id='$v_id' ";
                                                $select_vid_execute = mysqli_query($conn,$select_vid);
                                                While($row=mysqli_fetch_assoc($select_vid_execute))
                                                {
                                                    $v_name = $row['v_name'];
                                            

                                                    $v_img = $row['v_img'];
                                                   
                                                }

                                                $select_user="SELECT * FROM tbl_register WHERE id='$user_id'";
                                                $select_user_execute = mysqli_query($conn,$select_user);
                                                While($row=mysqli_fetch_assoc($select_user_execute))
                                                {
                                                    $full_name = $row['name'];
                                                    $phone= $row['phone_no'];
                                                    $email = $row['email'];
                                                    $address = $row['address'];
                                                   
                                               }  


                                                    ?>
                                            <tr>
                                                <td class="text-center">
                                                    <?php echo $full_name; ?>
                                                    
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $address; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $email; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $phone ?>
                                                </td>
                                                <td class="text-center">
                                                  <?php echo $price ?>
                                                </td>
                                                 <td class="text-center">
                                                  <?php echo $v_name; ?>
                                                </td>
                                                 <td class="text-center">
                                                    <img src="../v_img/<?php echo $v_img;?>" style="height: 50px; width: 50px;" >
                                                  
                                                </td>
                                                 <td class="text-center">
                                                    <?php echo $fdate; ?>


                                                </td>
                                                 <td class="text-center">
                                                    <?php echo $tdate; ?>
                                                </td>

                                                <td class="text-center">
                                           
                                                  <a href="delete_bookings.php?id=<?php echo $rent_id;?>" class="btn btn-sm btn-default" title="Delete" onclick="return confirm('Confirm delete?')"><i class="glyphicon glyphicon-trash"></i></a>    
                                                </td>
                                             
                                                <td>
                                                    <input type="radio" name="check"  > Sucess<br>
                                            
                                                    <input type="radio" name="check"  > Pending</br>
                                                </td>
                                            </tr>
                                                <?php 
                                            }
                                           ?>
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

