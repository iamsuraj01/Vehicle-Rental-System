<?php
if (isset($_POST['submit']))
{
    require_once 'connection.php';
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $sql = "select * from users where username='$user' and password='$pass'";
    $result= $conn->query($sql);
    if ($result->num_rows>0) 
    {
        session_start();
        $_SESSION['admin'] = $_POST['username'];
        $_SESSION['status'] = 'logedin';
        header('Location: dashboard.php');
    } else{
        echo "<script>alert('Username/Password Invalid')</script>";
        echo "<script>window.location='index.php'</script>";
    }          
 
}
    ?>
