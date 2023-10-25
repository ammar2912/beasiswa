<?php
require 'phpmailer/PHPMailerAutoload.php';
$mail = new PHPMailer;
// $mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPAuth=true;
$mail->SMTPSecure='tls';

$mail->Username = 'grassetya@gmail.com';
$mail->Password = 'gucialit';

$mail->setFrom('grassetya@gmail.com', 'ANDIS');
$mail->addAddress('geaayu16@gmail.com');
$mail->addReplyTo('grassetya@gmail.com');

$mail->isHTML(true);
$mail->Subject='PHP Mailer Subject';
$mail->Body='<h1>BERHASIL</h1>';

if (!$mail->send()) {
  echo "gagal".$mail->ErrorInfo;
} else {
  echo "BERHASIL";
}

 ?>
