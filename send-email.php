<?php
require 'PHPMailer-master/class.phpmailer.php';
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = 'smtp';
$mail->SMTPAuth = true;
$mail->Host = 'smtp.gmail.com'; // "ssl://smtp.gmail.com" didn't worked
$mail->Port = 465;
$mail->SMTPSecure = 'ssl';
// or try these settings (worked on XAMPP and WAMP):
// $mail->Port = 587;
// $mail->SMTPSecure = 'tls';


$mail->Username = "atharvapatil1996@gmail.com";
$mail->Password = "8425959435123";

$mail->IsHTML(true); // if you are going to send HTML formatted emails
$mail->SingleTo = true; // if you want to send a same email to multiple users. multiple emails will be sent one-by-one.

$mail->From = "atharvapatil1996@gmail.com";
$mail->FromName = "Atharva";

$mail->addAddress("atharvapatil1996@outlook.com","User 1");
$mail->addAddress("ishapandya126@gmail.com","User 2");
$mail->addAddress("raheja.prem1996@gmail.com","User 3");




$mail->Subject = "New Registration";
$mail->Body = "Hi,<br /><br />There is a new Registration!!<br>First Name: $myfname<br>Middle Name: $mymname<br>Last Name: $mylname<br>Email ID: $myemail<br>";

if(!$mail->Send())
	echo "Email was not sent <br />PHPMailer Error: " . $mail->ErrorInfo;
else
	echo "Email has been sent";
?>