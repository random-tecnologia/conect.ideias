<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPDebug = 4;
$mail->Host = 'smtp.gmail.com';
$mail->Username = '';
$mail->Password = '';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;

$mail->From = '';
$mail->FromName = '';
$mail->addReplyTo('','');
$mail->addAddress('','');

$mail->Subject = 'Recuperação de senha';
$mail->Body = 'Sua senha é ';
$mail->AltBody = 'This is the body of an email!';

var_dump($mail->send());

?>