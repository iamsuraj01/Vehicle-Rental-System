<?php
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

            $sql = "DELETE from  driver where id='$u'";
                if($conn->query($sql)==TRUE)
                {
                    echo "<script>alert('Deleted Successfully')</script>";
                     echo "<script>window.location='adddrivers.php'</script>";   
                }
                
            $sql1 = "DELETE from  tbl_vehical where id='$u'";
                if($conn->query($sql1)==TRUE)
                {
                    echo "<script>alert('Deleted Successfully')</script>";
                     echo "<script>window.location='addvehicle.php'</script>";   
                }

                $sql2 = "DELETE from  tbl_rent where id='$u'";
                if($conn->query($sql2)==TRUE)
                {
                    echo "<script>alert('Deleted Successfully')</script>";
                     echo "<script>window.location='dashboard.php'</script>";   
                }
                
            
        ?>