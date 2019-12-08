
<?php
include 'connection.php';
/*if(empty($_SESSION['admin'])){
  header("location:index.php");
  }*/
if(isset($_POST['submit']))
{
$name=$_POST['name'];
$add=$_POST['add'];
$pno=$_POST['pno'];
$vehicle=$_POST['vehicle'];
$rate = $_POST['rate'];


$sql="insert into driver(name,address,pno,v_type,d_rate) values('$name','$add','$pno','$vehicle','$rate')";
$result = mysqli_query($conn,$sql);
if ($result) {
 ?>
            <script type="text/javascript">
              alert(" Successful !!");
              window.location="adddrivers.php";
            </script>
                            
                            <?php
}


}
//cuser($name,$email,$password,$add,$pno)
//$res=$obj->cuser($name,$email,$pass,$add,$pno);
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
        <script type="text/javascript">
            function change()
            {
                var val=document.getElementById('cat').value;
                $.ajax({
                    url:"ajaxcheck.php",
                    type:"POST",
                    datatype:"json",
                    data:{id:val},
                    success:function(data)
                    {
                        alert(data);
                    }
                });
            }
            </script>
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
            $des = $_POST['description'];
            $title = $_POST['title'];
            
                $sql = "INSERT INTO services (title,description)VALUES('$title','$des')";
                if($conn->query($sql)==TRUE)
                {
                    echo "<script>alert('Added Successfully')</script>";
                     echo "<script>window.location='dashboard.php'</script>";   
                }else{
                    echo "<script>alert('Couldn't Added')</script>";
                     echo "<script>window.location='service_add.php'</script>";   
               
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
                        </div>
                    <div class="panel panel-default">
                      
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="">
                                <div class="panel-body">
                                             
                                    <form name="myform" id="myform" method="POST" >
                                        Name: <input class="form-control" type="text" id="title" name="name" value="" placeholder="Enter full name"><br>
                                        Address :<input class="form-control" type="text" id="title" name="add" value="" placeholder="Enter address"><br> 
                                         Phone No :<input class="form-control" type="text" id="title" 
                                         name="pno" value="" placeholder="Enter phone number"><br> 
                                         Vehicle :<input class="form-control" type="text" id="title" 
                                         name="vehicle" value="" placeholder="Enter phone number"><br> 
                                         Rate :<input class="form-control" type="text" id="title" 
                                         name="rate" value="" placeholder="Enter phone number"><br> 

                                        
                                     <br><br> <input class="btn-default" type="submit" name="submit" value="Submit">
                                    </form>                               
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

