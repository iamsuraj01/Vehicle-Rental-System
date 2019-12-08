
<?php
include_once('classes/application_top.php');
if (isset($_POST['submit']))
{
    require_once 'connection.php';
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $sql = "select * from tbl_register where email='$email' and password='$pass'";
    $result= $conn->query($sql);
    while($row = mysqli_fetch_array($result)){
      $username = $row['name'];
       $id = $row['id'];
    }
    if ($result->num_rows>0) 
    {
        $_SESSION['username'] = $username;
        $_SESSION['user_id']=$id;
        $_SESSION['status'] = 'logedin';
        $vehicle_id = $_SESSION['vehicle_id'];
        header('Location: customer_dash.php?id='. $vehicle_id);
    } else{
        echo "<script>alert('Username/Password Invalid')</script>";
        echo "<script>window.location='login.php'</script>";
    }          
 
}
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


    <style >
      body, html{
     height: 100%;
  background-repeat: no-repeat;
  background-color: #d3d3d3;
  font-family: 'Oxygen', sans-serif;
}

.main{
  margin-top: 70px;
}

h1.title { 
  font-size: 50px;
  font-family: 'Passion One', cursive; 
  font-weight: 400; 
}

hr{
  width: 10%;
  color: #fff;
}

.form-group{
  margin-bottom: 15px;
}

label{
  margin-bottom: 15px;
}

input,
input::-webkit-input-placeholder {
    font-size: 11px;
    padding-top: 3px;
}

.main-login{
  background-color: #fff;
    /* shadows and rounded borders */
    -moz-border-radius: 2px;
    -webkit-border-radius: 2px;
    border-radius: 2px;
    -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);

}

.main-center{
  margin-top: 30px;
  margin: 0 auto;
  max-width: 330px;
    padding: 40px 40px;

}

.login-button{
  margin-top: 5px;
}

.login-register{
  font-size: 11px;
  text-align: center;
}
.navbar {
      background-color: lightcyan;
      margin-bottom: 5px;
    }
  hr { 
  display: block;
  color: black;
 margin: 0px;
  border-style:inset;
  border-radius:2px;
  border-width: 0px;
  border-color:papayawhip ;
}
.navbar {
      background-color: lightcyan;
      margin-bottom: 5px;
    }

    </style>
     </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar">
      <div class="container">
        <div class="col-md-9">
        <a class="navbar-brand" href="index.php"><img src="img/focus-vehicle-rental-logo.png" height="100px",
          width="150px" alt="image"></a>
</div>

    </div>
    </nav>
    

    <div class="container">
      <div class="col-sm-8">
        <div class="panel-heading text-center">
                    <h3 class="title" ><span>User Login</span></h3>
                  </div>
        <div class="main-login main-center">
          <form class="form-horizontal" method="post" action="#">
            

            <div class="form-group">
              <label for="email" class="cols-sm-2 control-label">Your Email</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email"/>
                </div>
              </div>
            </div>


            <div class="form-group">
              <label for="password" class="cols-sm-2 control-label">Password</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                  <input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
                </div>
              </div>
            </div>

           

            <div class="form-group ">
               <button type="submit" class="btn btn-primary" name="submit">Login</button>
            </div>
             <div class="form-group">
      <label><?php if(!empty($err)){ echo $err; }; ?></label>
      </div>
            <div class="login-register">
                    <a href="index.php#sign_up">Register</a>
                 </div>
          </form>
        </div>
      </div>
    </div>

    <script type="text/javascript" src="assets/js/bootstrap.js"></script>

    
  

<?php
include_once('inc/inc_footer.php');

?>