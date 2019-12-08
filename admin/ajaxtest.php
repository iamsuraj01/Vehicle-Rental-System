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
            function addfile()
            {
                var fileContainer = document.getElementById('file');
                var fileCount = document.getElementById('filecount').value;
                var fileCount = parseInt(fileCount)+1;
                document.getElementById('filecount').value=fileCount;
                var add = "<div id='f_"+fileCount+"'><br>Image:<input type=file name=images[]><a href='javascript:void(0)' onclick='remove("+fileCount+")'><span>remove</span></a></div>";
                fileContainer.insertAdjacentHTML('beforeend',add);
            }
            function remove(e)
            {
                $('#f_'+e).remove();
            }
            </script>
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
                                    <?php if (isset($_SESSION['username'])) {
                                        echo $_SESSION['username'];
                                    }
                                    ?> <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="logout.php">Logout</a></li>
                                    <li><a href="register.php">Register</a></li>
                                    <li><a href="password_change.php">Change Password</a></li>
                                    <li><a href="ajaxtest.php">Test ajax</a></li>
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
                            <li class=""><a href="dashboard.php">Service</a></li>
                            <li class="" ><a href="gallery.php">Gallery</a></li>
                            <li class="active" ><a href="ajaxtest.php">Ajax Test</a></li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="">
                                <div class="panel-body">
                                             
                                    <form name="myform" id="myform" method="post" action=""> 
                                        <div id="file">
                                            <input type="hidden" id="filecount" value="0">
                                        Image: 
                                        <input type="file" name="images[]">
                                        </div>
                                        <input type="button" onclick="addfile()" value="addfile">
                                        <br>
                                        Category:
                                        <select name="category" id="cat" onchange="change()">
                                            <option value="0">Please select</option>
                                             <option value="1">country-1</option>
                                              <option value="2">Option-2</option>
                                        </select>
                                     <br><br>   <br> <input class="btn-default" type="submit" name="submit" value="Submit">
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

