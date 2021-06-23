<?php require("email/phpmailer/PHPMailerAutoload.php");?>

<?php
header('Content-Type: text/html; charset=utf-8');

$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
//$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
$mail->Host = "xn--12c2dmlk5cbn8j.com";
$mail->Port = 465; // or 587
$mail->IsHTML(true);
$mail->Username = "notreply@xn--12c2dmlk5cbn8j.com";
$mail->Password = "#asd0960404810";

$sender = "KohPhaluay Support"; // ชื่อผู้ส่ง
$email_sender = "notreply@xn--12c2dmlk5cbn8j.com"; // เมล์ผู้ส่ง 

$mail->SetFrom($email_sender,$sender);

?>