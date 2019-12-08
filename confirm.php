<?php
  include_once('classes/application_top.php');
  
include_once('inc/inc_customer.php');
include 'connection.php';
$id = $_SESSION['id'];
$query= "SELECT * FROM tbl_rent WHERE id='$id' ";
$result = mysqli_query($conn,$query);
while($row=mysqli_fetch_array($result))
{
   $user_id=$row['user_id'];
    $fdate = $row['start_date'];
    $tdate = $row['end_date'];
    $price = $row['price'];
   $v_id = $row['v_id'];
 
}
$select_vid= "SELECT * FROM tbl_vehical WHERE id='$v_id' ";
$select_vid_execute = mysqli_query($conn,$select_vid);
While($row=mysqli_fetch_assoc($select_vid_execute))
{
    $model = $row['model'];
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

  <div class="col-sm-4">
    <div class="card card-primary">
    	<div class="card-heading" style="background-color: rgb(30, 126, 52); color: #fff; padding: 10px 10px 0 10px; border-radius: 5px;"><h5 class="card-title">Order Details</h5></div>
      <img class="card-img-top" src="v_img/<?php echo $v_img; ?>" style="height: 200px;">
      <div class="card-body">

        <h5 class="card-title"><?php echo $model; ?></h5>
        <p class="card-text"><b>Date: <?php echo $fdate; ?> To <?php echo $tdate; ?> </b></p>
        <p class="card-text"><b>Total Charge: Rs. <?php echo $price; ?></b></p>
        <p class="card-text"><b>Full Name:  <?php echo $full_name ?> </b></p>
         <p class="card-text"><b>Address:  <?php echo $address ?> </b></p>
         <p class="card-text"><b>Phone:  <?php echo $phone ?> </b></p>
          <p class="card-text"><b>E-mail:  <?php echo $email ?> </b></p>
        <a href="index.php" class="btn btn-primary">Ok</a>
        <a href="index.php" class="btn btn-primary">Edit</a>
        <a href="index.php" class="btn btn-primary">Cancel</a>
        
      </div>
    </div>
  </div>
<?php
include_once('inc/inc_footer.php');
?>