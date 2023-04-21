<?php 
require_once "../models/generalModel.php";
$consultaGeneral=new generalModel();
$profile=$consultaGeneral->consultaProfile();
//GET VARS
$nombre = addslashes($_POST['nombre']);

$email = addslashes($_POST['email']);

$mensaje = addslashes($_POST['asunto']);

//CONFIG PHPMAILER
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
date_default_timezone_set('Etc/UTC');
require '../phpmailer/src/Exception.php';
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';
$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPDebug = SMTP::DEBUG_OFF;  // SMTP::DEBUG_OFF = off SMTP::DEBUG_SERVER;
$mail->SMTPAutoTLS = false;
$mail->SMTPSecure = false;
$mail->Host = 'tecnosula.com';
$mail->CharSet = 'UTF-8';
$mail->Port = 25;
$mail->SMTPAuth = true;
$mail->isHTML(true);
$mail->Username = 'contacto@tecnosula.com';
$mail->Password = 'C0nt@ct0/2022';
$mail->setFrom('contacto@tecnosula.com', $profile->name);

 
    $mail->addAddress($profile->infoEmail, 'Cliente');
    $mail->Subject = 'Contacto desde el sitio web';
    $mail->Body = "
    <h2>Nuevo contacto</h2>
    <p>Hemos recibido la siguiente información del sitio web: </p> <br>
    <p>Nombre: <b>". $nombre ."</b></p>
    <p>Correo: <b>". $email ."</b></p>
  
    <p>Mensaje: ". $mensaje ."</p>
    
    "; 



//ENVIO DE CORREO
if (!$mail->send()) {
//echo 'Mailer Error: ' . $mail->ErrorInfo;
header("Refresh:0; url=../index.php");
} else {
header("Refresh:0; url=../index.php");
}


?>