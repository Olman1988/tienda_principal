<?php 
if (isset($_POST['submit'])) {
    if ($_POST['captcha'] == $_SESSION['cap_code']) {
        // Captcha verification is Correct. Do something here!
        echo '<p>El captcha introducido es correcto</p>';
    }
    else {
        // Captcha verification is wrong. Take other action
        echo '<p>El captcha introducido no es correcto</p>';
    }
}
//GET VARS
$nombre = addslashes($_POST['nombre']);
if(isset($_POST['nameBusiness'])){
   $nameBusiness = addslashes($_POST['nameBusiness']); 
}
if(isset($_POST['emailBusiness'])){
   $emailBusiness = addslashes($_POST['emailBusiness']);
}

$mensajeCompleto="";
$email = addslashes($_POST['email']);
$telefono=addslashes($_POST['telefono']);
$mensaje = addslashes($_POST['mensajeForm']);

$mensajeCompleto.=$mensaje;

//CONFIG PHPMAILER
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
date_default_timezone_set('Etc/UTC');
require '../phpmailer/src/Exception.php';
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';
$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPDebug = SMTP::DEBUG_OFF;  // SMTP::DEBUG_OFF = off; SMTP::DEBUG_SERVER;
$mail->SMTPAutoTLS = false;
$mail->SMTPSecure = false;
$mail->CharSet = 'UTF-8';
$mail->Host = 'tecnosula.com';
$mail->Port = 25;
$mail->SMTPAuth = true;
$mail->isHTML(true);
$mail->Username = 'contacto@tecnosula.com';
$mail->Password = 'C0ntact0/2022*1';
$mail->setFrom('contacto@tecnosula.com', $nameBusiness);

 
    $mail->addAddress($emailBusiness, 'Cliente');
    $mail->Subject = 'Contacto desde el sitio web';
    $mail->Body = "
    <h2>Nuevo contacto</h2>
    <p>Hemos recibido la siguiente información del sitio web: </p> <br>
    <p>Nombre: <b>". $nombre ."</b></p>
    <p>Correo: <b>". $email ."</b></p>
  <p>Teléfono: <b>". $telefono ."</b></p>
    <p>Solicitud: <br>". $mensajeCompleto ."</p>
    
    "; 



//ENVIO DE CORREO
if (!$mail->send()) {
    echo 0;
//echo 'Mailer Error: ' . $mail->ErrorInfo;
header("Refresh:0; url=../index.php");
} else {
    echo 1;
header("Refresh:0; url=../index.php");
}


?>