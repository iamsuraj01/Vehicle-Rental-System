<?php include 'inc/inc_customer.php';
include 'connection.php';

?>
<div class="" style="background-color: rgb(30, 126, 52); color: #fff; padding: 10px 10px 0 10px; border-radius: 5px;"><h5 class="card-title">Available Vehicles</h5></div>
 <div class="container">
		  <div class="row">
	
<?php
$select_vid= "SELECT * FROM tbl_vehical ";
$select_vid_execute = mysqli_query($conn,$select_vid);
While($row=mysqli_fetch_assoc($select_vid_execute))
{
    $v_name = $row['v_name'];
    $v_img = $row['v_img'];
    $model = $row['model'];
    $description = $row['description'];
    $id = $row['id'];

    ?>
  
               <div class="col-sm-3"> 
	    	        <div class="card">
		      <img class="card-img-top" src="v_img/<?php echo $v_img; ?>" style="height: 150px;">
		      <div class="card-body">
		      	<h5 class="card-title"><?php echo $v_name; ?></h5>
		        <h5 class="card-title"><?php echo $model; ?></h5>
		        <p class="card-text"><?php echo $description; ?></p>
		        <a href="customer_dash.php?id=<?php echo $id; ?>" name="book_now" class="btn btn-success">Book Now</a>
	      




  </div>

  </div>

</div>

<br>
    <?php
}
?>

</div>
    </div>






<?php include 'inc/inc_footer.php'; ?>