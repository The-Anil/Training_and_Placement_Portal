<?php
require 'PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPSecure = 'ssl';
$mail->SMTPAuth = true;
$mail->Host = 'smtp.gmail.com';
$mail->Port = 465;
$mail->Username = 'theparth1996@gmail.com';
$mail->Password = 'parthofkrishna';
$mail->setFrom('theparth1996@gmail.com');
$mail->addAddress('anilyadv2014@gmail.com');
$mail->Subject = 'Message from The_Anil!';
$mail->Body = 'This is a test message';
//send the message, check for errors
if (!$mail->send()) {
    echo "ERROR: " . $mail->ErrorInfo;
} else {
    echo "SUCCESS";
}