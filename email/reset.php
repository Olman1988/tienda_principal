<?php 
require_once "../config/parameters.php";
require_once "../models/generalModel.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
date_default_timezone_set('Etc/UTC');
require '../phpmailer/src/Exception.php';
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';
class reset{
    public function resetPass($email,$OTP){
//GET VARS
//CONFIG PHPMAILER
$consultaGeneral=new generalModel();
$profile=$consultaGeneral->consultaProfile();		
var_dump($profile->name);
		var_dump($email);
$mail = new PHPMailer();
		
$mail = new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPDebug = SMTP::DEBUG_OFF; //SMTP::DEBUG_SERVER;  // SMTP::DEBUG_OFF = off;
        $mail->SMTPAutoTLS = false;
        $mail->SMTPSecure = false;
		$mail->CharSet = 'UTF-8';
        $mail->Host = 'tecnosula.com';
        $mail->Port = 25;
        $mail->SMTPAuth = true;
        $mail->isHTML(true);
         $mail->Username = 'contacto@tecnosula.com';
        $mail->Password = 'C0ntact0/2022*1';
        $mail->setFrom('contacto@tecnosula.com', $this->profile->name);		
    $mail->addAddress($email, 'Cliente');
    $mail->Subject = 'Restablecimiento de contraseña';
    $mail->Body = "
        <!doctype html>
        <html>
        <head>
        <title>Notification</title>
        </head>
        <body style='background:whitesmoke;'>
        <div style='padding:20px;border-radius:15px;background:white;box-shadow:5px 5px 5px gray;'>
    <h2>Restablecimiento de contraseña</h2>
    <p>Hemos recibido una solicitud de restablecimiento de contraseña, por favor ingrese al siguiente link para restablecer su contraseña </p> <br>
    <a href='".base_url."recoveryPassword/?OTP=$OTP' style='padding:15px;text-align:center;background:#54A7FF;color:white;width:150px;'>Recuperar Contraseña</a>
    </div>
  </body>
    "; 


$status = '';
//ENVIO DE CORREO
if (!$mail->send()) {
//echo 'Mailer Error: ' . $mail->ErrorInfo;
$status = false;
} else {
$status = true;
}
		var_dump($status);
return $status;
}
}


?>