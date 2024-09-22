<?php 

if(!isset($_POST['name'])) {
    return;
}
$name=$_POST['name'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$message=$_POST['message'];

$to = "hassanjrao@gmail.com";
$subject = "Contact Form";
$txt = "Name: ".$name."\nPhone: ".$phone."\nEmail: ".$email."\nMessage: ".$message;
$headers = "From: ".$email;

$mail=mail($to,$subject,$txt,$headers);


header("Location: index.html?mailsend#contact");