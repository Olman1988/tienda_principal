<?php 
//CONFIG PHPMAILER
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
date_default_timezone_set('Etc/UTC');
require '../phpmailer/src/Exception.php';
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';

require_once "../config/conexion.php";
require_once "../models/landingModel.php";

if(isset($_POST['code'])){
  $consultarLanding= new landingModel();
  $respuestaLanding = $consultarLanding->consultarLandingCode($_POST['code']);
    if(count($respuestaLanding)>0){
$emailToSend= $respuestaLanding['emailSet'];
//GET VARS
$mensajeCompleto = '';
$nombre = addslashes($_POST['nombre']);
$email = addslashes($_POST['email']);
$cedula = addslashes($_POST['cedula']);
$telefono=addslashes($_POST['telefono']);
$code = addslashes($_POST['code']);

$insertarInfo = new landingModel();
$respuestaInfo = $insertarInfo->insertarInfoCliente($nombre,$email,$cedula,$telefono,$code);



$mensajeCompleto.="Ha recibido una solicitud relacionada a la promoción $code <br>";
$mensajeCompleto.="Nombre: $nombre <br>";
$mensajeCompleto.="Email: $email <br>";
$mensajeCompleto.="Identificación: $cedula <br>";
$mensajeCompleto.="Teléfono: $telefono <br>";
$mensajeCompleto.="Código: $code <br>";
$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPDebug = SMTP::DEBUG_OFF;  // SMTP::DEBUG_OFF  // SMTP::DEBUG_SERVER;
$mail->SMTPAutoTLS = false;
$mail->SMTPSecure = false;
$mail->Host = 'tecnosula.com';
$mail->CharSet = 'UTF-8';
$mail->Port = 25;
$mail->SMTPAuth = true;
$mail->isHTML(true);
$mail->Username = 'olman.monge@tecnosula.com';
$mail->Password = 'Monge/2022*1';
$mail->setFrom('olman.monge@tecnosula.com', 'Tienda');

 
    $mail->addAddress($emailToSend, 'Solicitud Cliente');
    $mail->Subject = 'Contacto desde el sitio web';
    $mail->Body = "
    <h2>Nuevo contacto</h2>
    <p>Solicitud: <br>". $mensajeCompleto ."</p>
    "; 



        //ENVIO DE CORREO
        if (!$mail->send()) {
        //echo 'Mailer Error: ' . $mail->ErrorInfo;
            echo 0;
        } else {
       echo 1;
        }

   }

} else {
    echo 0;
}
?>
