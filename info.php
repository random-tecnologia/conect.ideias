<?php
session_start();

$con = mysqli_connect("localhost","root","", "conect_ideias");

if(!$con) {
	die("Trouble connecting");
}

$aql="SELECT * FROM usuarios WHERE email='".$_SESSION['info']."'";
$aqlq=mysqli_query($con,$aql);
$aqlqq=mysqli_fetch_assoc($aqlq);

$email=$aqlqq['email'];
$p=$aqlqq['senha'];
$nome=$aqlqq['nome'];

use PHPMailer\PHPMailer\PHPMailer;
require 'vendor/autoload.php';

$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 4;
$mail->Host = 'smtp.gmail.com';
$mail->Port = 465;
$mail->SMTPSecure = 'ssl';
$mail->SMTPAuth = true;
$mail->Username = ""; //email de origem
$mail->Password = ""; //senha do email
$mail->setFrom('', ''); //email de origem, nome 
$mail->addReplyTo('', ''); //email, nome para reply
$mail->addAddress($email);
$mail->Subject = 'Recuperação de senha';
$mail->Body = 'Sua senha é $p';
$mail->AltBody = 'Sua senha é $p';

if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}

?>