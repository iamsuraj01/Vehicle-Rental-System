<?php
  include_once('classes/application_top.php');
  include 'connection.php';
if(isset($_POST['submit'])){
  $name = $_POST['typeahead'];
  $query = "SELECT * FROM tbl_vehical WHERE v_name = '$name' ";
  $result = mysqli_query($conn,$query);
}



?>

<?php
include_once('inc/inc_header.php');
?>

<div class="container">
  <div class="row">
  <h3>Search results for <?php if(!empty($name)){ echo $name; } ?></h3>
</div>
<div class="row">
  <?php
  while($row = mysqli_fetch_assoc($result)){
    $image = $row['v_img'];
    $model = $row['model'];
    $description = $row['description'];
    $id = $row['id'];
    $_SESSION['vehicle_id'] = $id;
  ?>
  <div class="col-sm-3">
    <div class="card">
      <img class="card-img-top" src="v_img/<?php echo $image; ?>" style="height: 150px;">
      <div class="card-body">
        <h5 class="card-title"><?php echo $model; ?></h5>
        <p class="card-text"><?php echo $description; ?></p>
<?php
$_SESSION['id'] = $id;
    if(!empty($_SESSION['username'])){
    $url = 'customer_dash.php?id=' .  $id;
  }
  else{
    $url = 'new_login.php';
  }
?>


        <a href="<?php echo $url; ?>" name="book_now" class="btn btn-success">Book Now</a>
      </div>
    </div>
  </div>
  <?php
}
?>
  </div>
</div>
</div>
<br>
<?php

include_once('inc/inc_footer.php');

?>

