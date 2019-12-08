<?php
if(isset($_POST['submit']))
{
    require_once 'connection.php';
    $name = $_POST['name'];
    $user = $_POST['email'];
    $phone = $_POST['phone'];
    $pass = md5($_POST['password']);

    $sql= "INSERT INTO users (name,phone,username,password)VALUES ('$name', '$phone', '$user','$pass')";
    if($conn->query($sql)==TRUE)
    {
        echo "<script>alert('Registered Successfully')</script>";
        echo "<script>window.location='dashboard.php'</script>";
    }else{
         echo "<script>alert('Not Registered please try again')</script>";
        echo "<script>window.location='register.php'</script>";
    }        
}