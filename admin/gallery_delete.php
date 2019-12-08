?php
        session_start();
        if (!($_SESSION['status'] == 'logedin')) {
            echo "<script> window.location='index.php';</script>";
            die();
        }
               
           require_once 'connection.php';
           if(!is_numeric($_GET['id']))
				{
				
				echo"invalid request";
				die();
				}
				else
				{
				 	$u=$_GET['id'];
				}
            $sql = "SELECT images from gallery where id='$u'";
            $result = mysqli_fetch_array($conn->query($sql));
            if(file_exists('../upload/'.$result['images']))
            {
                unlink('../upload/'.$result['images']);
            }
            $sql = "DELETE from gallery where id='$u'";
                if($conn->query($sql)==TRUE)
                {
                    echo "<script>alert('Deleted Successfully')</script>";
                     echo "<script>window.location='gallery.php'</script>";   
                }
                
            
        ?>