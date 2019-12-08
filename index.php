<?php
include('classes/application_top.php');
include 'connection.php';
/*if(empty($_SESSION['admin'])){
  header("location:index.php");
  }*/
if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $pass = $_POST['pass'];
  $add = $_POST['add'];
  $pno = $_POST['pno'];

  $sql = "insert into tbl_register(name,email,password,address,phone_no) values('$name','$email','$pass','$add','$pno')";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    ?>
    <script type="text/javascript">
      alert("Register Successful !!");
      window.location = "new_login.php";
    </script>

  <?php
  }
}
//cuser($name,$email,$password,$add,$pno)
//$res=$obj->cuser($name,$email,$pass,$add,$pno);
?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Vehicle Renting System</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="css/landing-page.min.css" rel="stylesheet">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <script src="js/typeahead.min.js"></script>
  <script>
    $(document).ready(function() {
      $('input.typeahead').typeahead({
        name: 'typeahead',
        remote: 'search_query.php?key=%QUERY',
        limit: 10
      });
    });
  </script>


  <style type="text/css">
    .typeahead,
    .tt-query,
    .tt-hint {
      border: 2px solid #CCCCCC;
      border-radius: 8px;
      font-size: 24px;
      height: 45px;
      line-height: 30px;
      outline: medium none;
      padding: 8px 12px;
      width: 396px;
    }

    .typeahead {
      background-color: #FFFFFF;
    }

    .typeahead:focus {
      border: 2px solid #0097CF;
    }

    .tt-query {
      box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
    }

    .tt-hint {
      color: #999999;
    }

    .tt-dropdown-menu {
      background-color: #FFFFFF;
      border: 1px solid rgba(0, 0, 0, 0.2);
      border-radius: 8px;
      box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
      margin-top: 12px;
      padding: 8px 0;
      width: 422px;
      color: #000;
    }

    .tt-suggestion {
      font-size: 24px;
      line-height: 24px;
      padding: 3px 20px;
    }

    .tt-suggestion.tt-is-under-cursor {
      background-color: #0097CF;
      color: #FFFFFF;
    }

    .tt-suggestion p {
      margin: 0;
    }

    .navbar {
      background-color: lightcyan;
      margin-bottom: 0px;
    }
  hr { 
  display: block;
  color: black;
 margin: 0px;
  border-style:inset;
  border-radius:2px;
  border-width: 2px;
  border-color:papayawhip ;
}
  </style>

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar">
    <div class="container">
      <div class="col-md-10 header">
        <!-- <a class="navbar-brand" href="#"><img src="img/focus-vehicle-rental-logo.png" height="80px",
          width="150px" alt="image" ></a> -->

        <a href="index.php"><img src="img/focus-vehicle-rental-logo.png" height="80px" , width="150px" alt="" title="" /></a>
      </div>
      <div class="col-md-2">


        <?php
        if (!empty($_SESSION['username'])) {
          ?>

          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" data-toggle="dropdown" role="button" aria-expanded="false">
                <h4><span style="color: blue;">Welcome</span></h4><?php if (isset($_SESSION['username'])) {
                                                                    echo $_SESSION['username'];
                                                                  }
                                                                  ?> <span class="caret"></span>
              </a>

              <ul class="dropdown-menu" role="menu">
                <li><a href="logout.php">Logout</a></li>
                <li><a href="dashboard.php">Available Vehicles</a></li>
                <li><a href="mybookings.php">Booking History</a></li>


              </ul>
            </li>
          </ul>
        <?php
        } else {

          ?>


          <a class="btn btn-primary" href="login.php">Sign In</a>
          <a class="btn btn-success" href="#sign_up">Sign Up</a>



        <?php
        }


        ?>

      </div>
    </div>
  </nav>
  <hr>

  <!-- Masthead -->
  <header class="masthead text-white text-center">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <h1 class="mb-5">Trusted by 7 thousand customers and counting</h1>
        </div>
        <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
          <form method="POST" action="search_result.php">
            <div class="form-row">
              <!--<div class="col-12 col-md-9 mb-2 mb-md-0">
                  <input type="email" class="form-control form-control-lg" placeholder="Search Vehicle..">
                </div>-->
              <div class="bs-example col-12 col-md-9 mb-2 mb-md-0">
                <input type="text" name="typeahead" class="typeahead tt-query form-control form-control-lg" autocomplete="off" spellcheck="false" placeholder="Search Company of a Vehicle.." required="required">
              </div>


              <div class="col-12 col-md-3">
                <button type="submit" name="submit" class="btn btn-block btn-lg btn-primary">Find Now</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </header>

  <!-- Icons Grid -->
  <section class="features-icons bg-light text-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="icon-screen-desktop m-auto text-primary"></i>
            </div>
            <h3>Online Booking</h3>
            <p class="lead mb-0">Book Vehicle of your need from any place any time!!</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="far fa-address-card m-auto text-danger"></i>
            </div>
            <h3>Provide Driver</h3>
            <p class="lead mb-0">Need a driver for the tour along with the vehicle?</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="icon-check m-auto text-success"></i>
            </div>
            <h3>Easy to Use</h3>
            <p class="lead mb-0">Much easier to search and book the vehicle you want!!</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!--Slide--->

  <div id="carouselExampleIndicators" class="carousel slide col-md-12" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" style="height: 400px;" src="slide/1.jpg" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" style="height: 400px;" src="slide/2.jpg" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" style="height: 400px;" src="slide/3.png" alt="Third slide">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <!-- Testimonials -->
  <section class="testimonials text-center bg-light">
    <div class="container">
      <h2 class="mb-5">What people are saying...</h2>
      <div class="row">
        <div class="col-lg-4">
          <div class="testimonial-item mx-auto mb-5 mb-lg-0">
            <img class="img-fluid rounded-circle mb-3" src="img/testimonials-1.jpg" alt="">
            <h5>Margaret E.</h5>
            <p class="font-weight-light mb-0">"This is fantastic! Thanks so much guys!"</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="testimonial-item mx-auto mb-5 mb-lg-0">
            <img class="img-fluid rounded-circle mb-3" src="img/testimonials-2.jpg" alt="">
            <h5>Fred S.</h5>
            <p class="font-weight-light mb-0">"This is amazing.Its very easy to use"</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="testimonial-item mx-auto mb-5 mb-lg-0">
            <img class="img-fluid rounded-circle mb-3" src="img/testimonials-3.jpg" alt="">
            <h5>Sarah W.</h5>
            <p class="font-weight-light mb-0">"Thanks so much for making renting vehicles so easy to us!"</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Call to Action -->
  <a name="sign_up">
    <section class="call-to-action text-white text-center">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <h2 class="mb-4">Ready to get started? Sign up now!</h2>
          </div>
          <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
            <form action='' id="myform" method="POST" enctype='multipart/form-data'>
              <div class="form-row">
                <div class="form-group col-md-12">
                  <input type="text" class="form-control form-control-lg" name="name" placeholder="Enter Your Full Name.." required="">
                </div>

                <div class="col-12 col-md-12 form-group">
                  <input type="email" class="form-control form-control-lg" name="email" placeholder="Enter your email....." required="">
                </div>

                <div class="col-12 col-md-12 form-group">
                  <input type="password" class="form-control form-control-lg" name="pass" required placeholder="Enter your password...." required="">
                </div>

                <div class="col-12 col-md-12 form-group">
                  <input type="text" class="form-control form-control-lg" name="add" placeholder="Enter your address...." required="">
                </div>

                <div class="col-12 col-md-12 form-group">
                  <input type="text" class="form-control form-control-lg" name="pno" placeholder="Enter your phone number.." required="">
                </div>

                <div class="col-12 col-md-2">
                 <button type="submit" class="btn btn-primary" name="submit">Sign Up!</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="footer bg-light">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
            <ul class="list-inline mb-2">
              <li class="list-inline-item">
                <a href="about.php">About</a>
              </li>
              <li class="list-inline-item">&sdot;</li>
              <li class="list-inline-item">
                <a href="contac.php">Contact</a>
              </li>
              <li class="list-inline-item">&sdot;</li>
              <li class="list-inline-item">
                <a href="#">Terms of Use</a>
              </li>
              <li class="list-inline-item">&sdot;</li>
              <li class="list-inline-item">
                <a href="#">Privacy Policy</a>
              </li>
            </ul>
            <p class="text-muted small mb-4 mb-lg-0">&copy; Rental System 2018. All Rights Reserved.</p>
          </div>
          <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
            <ul class="list-inline mb-0">
              <li class="list-inline-item mr-3">
                <a href="#">
                  <i class="fab fa-facebook fa-2x fa-fw"></i>
                </a>
              </li>
              <li class="list-inline-item mr-3">
                <a href="#">
                  <i class="fab fa-twitter-square fa-2x fa-fw"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-instagram fa-2x fa-fw"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->

</body>

</html>