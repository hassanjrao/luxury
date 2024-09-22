<?php 

if(!isset($_POST['name'])) {
    return;
}
$name=$_POST['name'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$message=$_POST['message'];

$page=$_POST['page'];

$to = "AlexLluch3@gmail.com";
// $to='hassanjrao@gmail.com';
$subject = "Contact Form";
$txt = "Name: ".$name."\nPhone: ".$phone."\nEmail: ".$email."\nMessage: ".$message;
$headers = "From: $to";


$mail=mail($to,$subject,$txt,$headers);




header("Location: $page?mailsend#contact");