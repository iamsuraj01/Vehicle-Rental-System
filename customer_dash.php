<?php
  include_once('classes/application_top.php');
  include 'connection.php';
  $message = "";
if(!empty($_REQUEST['id'])){
	$id=$_REQUEST['id'];
	$uid=1;
$vdata=$obj->Getinfo($id,VEHICAL);
$udata=$obj->Getinfo($uid,ADMIN);


}
$username = $_SESSION['username'];
$query = "SELECT * FROM tbl_register WHERE name = '$username'";
$result = mysqli_query($conn,$query);
while($row = mysqli_fetch_assoc($result)){
  $name = $row['name'];
  $email = $row['email'];
  $address = $row['address'];
  $phone = $row['phone_no'];
}


$vehicle_id = $_GET['id'];
$select_vehicle = "SELECT * FROM tbl_vehical WHERE id = '$vehicle_id'";
$select_vehicle_execute = mysqli_query($conn,$select_vehicle);
while($row = mysqli_fetch_assoc($select_vehicle_execute)){
  $vtype = $row['v_type'];
  $rate = $row['rate'];
  $_SESSION['rate'] = $rate;

}
$select_driver = "SELECT * FROM driver WHERE v_type = '$vtype' ";
$select_driver_execute = mysqli_query($conn,$select_driver);
while($row = mysqli_fetch_assoc($select_driver_execute)) {
  $d_rate = $row['d_rate'];
  $_SESSION['d_rate'] = $d_rate;

}
        date_default_timezone_set("Asia/Kathmandu");
        $todays_date = date('y-m-d');
        if(isset($_POST['submit'])){
          $tdate = $_POST['tdate'];
          $fdate = $_POST['fdate'];

          if($fdate <= $todays_date){
             $message = "Please Select a valid date";

          }elseif ($tdate==$fdate) {
            $message = "Same dates cannot be selected";
            
          }else{
             $difference = strtotime($tdate) - strtotime($fdate);
             $days = $difference/86400;
              $d_rate = $_SESSION['d_rate'];
              $amt = $_SESSION['rate'];
              $price = $days * $amt;
              $user_id=$_SESSION['user_id'];
              if(isset($_POST['d_check'])){
                $price = $price + $days * $d_rate;
              }
                $query = "INSERT INTO tbl_rent(user_id,v_id,price, start_date, end_date) VALUES('$user_id' ,'$vehicle_id','$price','$fdate','$tdate')";
                $result = mysqli_query($conn,$query);
                $id = mysqli_insert_id($conn);
                $_SESSION['id'] = $id;
                $message = "<h4>Vehicle has been booked</h4>" . "<a href='confirm.php' class='btn btn-primary'>View My Booking</a>";
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

    <style>
      
      </style>

     </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-light bg-light static-top">
      <div class="container">
        <div class="col-md-9">
        <a class="navbar-brand" href="index.php"><img src="img/focus-vehicle-rental-logo.png" height="80px",
          width="150px" alt="image"></a>
</div>
<div class="col-md-3">
       <span style="color: red;">Welcome,</span> 
      <?php if (isset($_SESSION['username'])) {
        echo $_SESSION['username'];
      }
      ?>
                                    
      </div>
    </div>
    </nav>
<?php echo $message; ?>
  <div class="col-sm-10">
    <div class="card card-primary">
    	<div class="card-heading "></div>
      <img class="card-img-top" src="v_img/<?php echo $vdata['v_img']; ?>" >
      <div class="card-body">
        <h5 class="card-title"><?php echo $vdata['model']; ?></h5>
        <p class="card-text"><?php echo $vdata['description']; ?></p>
        <p class="card-text"><b>Per Day Rate : Rs.<?php echo $vdata['rate']; ?>/-</b></p>
        <form method="post" action="">
        	<input type="hidden" name="vid" value="<?php echo $id; ?>">
        	<div class="form-group col-md-6">
        		<input type="text" name="name" placeholder="Full Name" class="form-control" value="<?php echo $name; ?>" readonly>
        	</div>
        	<div class="form-group col-md-6">
        		<input type="text" name="address" placeholder="Address" value="<?php echo $address; ?>" class="form-control">
        	</div>
        	<div class="form-group col-md-6">
        		<input type="email" name="email" value="<?php echo $email; ?>" class="form-control" placeholder="E-mail" readonly="readonly">
        	</div>
        	<div class="form-group col-md-6">
        		<input type="number" name="ph" value="<?php echo $phone; ?>" class="form-control" placeholder="Contact Number" readonly="readonly">
        	</div>
        	<div class="form-group col-md-6">
        	<input type="checkbox" value="1" name='d_check' class="col-sm-1">With Driver (Rs.<?php echo $d_rate; ?> Per day)
        	</div>

        	<div class="form-group">
        		<label class="control-label">From Date</label>
        		<input type="date" name="fdate" value="" class="form-control col-md-6" required="required">
        	</div>
        	<div class="form-group" >
        		<label class="control-label">To Date</label>
        		<input type="date" name="tdate" value="" class="form-control col-md-6"  required="required">
        	</div>
        	<input type="submit" value="Book Now" name="submit" class="btn btn-success col-md-6">
        </form>
       
      </div>
    </div>
  </div>
<?php
include_once('inc/inc_footer.php');
?>