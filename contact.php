<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'vendor/autoload.php';

$mail = new PHPMailer(true);



try {
    if (!isset($_POST['name'])) {
        return;
    }
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $page = $_POST['page'];

    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'email-smtp.us-west-2.amazonaws.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'AKIATIHPRBECRGGDMAES';                     //SMTP username
    $mail->Password   = 'BPAWFnx4jmyjcoV4wxZJfGp7psMuUVqRY0dh2TbGip+q';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;

    $to = "info@modernluxurybuilders.com";
    // $to='hassanjrao@gmail.com';
    $subject = "Contact Form";
    $txt = "Name: " . $name . "\nPhone: " . $phone . "\nEmail: " . $email . "\nMessage: " . $message;

    $mail->setFrom($to, 'Contact Form');
    $mail->addAddress($to);     //Add a recipient
    $mail->Subject = $subject;
    $mail->Body    = $txt;

    $mail->isHTML(true);                                  //Set email format to HTML

    $mailStatus = $mail->send();



    header("Location: $page?mailsend#contact");
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
