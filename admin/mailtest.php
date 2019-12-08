<?php
if(isset($_POST['submit']))
{
$to=$_POST['username'];
require_once 'connection.php';
$q="select username from users where username='".$to."'";
$r=$conn->query($q);
$n=mysqli_num_rows($r);
if($n==0){echo "Email id is not registered";die();}
$token=time();
$q="INSERT INTO tokens(token,email,timestamp)VALUES('$token','$to',$token)";
if($conn->query($q)==FALSE)
{
    echo "Not inserted";
}
$uri = 'http://'. $_SERVER['HTTP_HOST'].'/myproject/admin' ;
require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();                            // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                     // Enable SMTP authentication
$mail->Username = 'your gmail username';          // SMTP username
$mail->Password = 'your gmail password'; // SMTP password
$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                          // TCP port to connect to

$mail->setFrom('your gmail username', 'Subject');
$mail->addReplyTo('your gmail username', 'Subject');
$mail->addAddress($to);   // Add a recipient
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

$mail->isHTML(true);  // Set email format to HTML

$bodyContent = '<p>Click on the given link to reset your password <a href="'.$uri.'/reset_password.php?token='.$token.'">Reset Password</a></p>';

$mail->Subject = 'Email from Localhost';
$mail->Body    = $bodyContent;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo "<script>alert('We have sent the password reset link to your  email id')</script>";
    echo "<script>window.location='index.php'</script>";   
               
}
}
?>