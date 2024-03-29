<?php 
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\SMTP;
 require '../phpmailer/src/Exception.php';
 require '../phpmailer/src/PHPMailer.php';
 require '../phpmailer/src/SMTP.php';
 require_once "../models/generalModel.php";
 
class cotizacion{
    private $profile;
    
    public function __construct() {
        $consultaGeneral=new generalModel();
        $this->profile=$consultaGeneral->consultaProfile();
    }
    public function sendEmailQuote($nombre,$email,$code,$data){
        require_once '../email/principalController.php';
        require_once '../config/parameters.php';
        
        $table = !empty($data)?$this->makeTableFromData($data):'';
        $msnData['title'] = "Solicitud Cotizar";
        $msnData['info'] = "Hemos recibido su solicitud #".$code.", le haremos llegar una respuesta lo antes posible";
        $msnData['intro'] = "Hola, $nombre";
        $msnData['url'] = base_url3."images/logo/prof20221006063306.png";
        $msnData['table'] = $table;
        $newTemplate = new principalController();
        $respTemplate = $newTemplate->sendEmailForQuote($msnData);
        //CONFIG PHPMAILER
       
        date_default_timezone_set('Etc/UTC');
      
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPDebug = SMTP::DEBUG_OFF ;//SMTP::DEBUG_SERVER;  // SMTP::DEBUG_OFF = off;
        $mail->SMTPAutoTLS = false;
        $mail->SMTPSecure = false;
        $mail->Host = 'tecnosula.com';
        $mail->CharSet = 'UTF-8';
        $mail->Port = 25;
        $mail->SMTPAuth = true;
        $mail->isHTML(true);
        $mail->Username = 'contacto@tecnosula.com';
        $mail->Password = 'C0ntact0/2022*1';
        $mail->setFrom('contacto@tecnosula.com', $this->profile->name);


            $mail->addAddress($email, 'Cliente');
            $mail->Subject = 'Cotizacion '.$code;
            $mail->Body = $respTemplate; 

        //ENVIO DE CORREO
        if ($mail->send()) {
        return true;
        } else {
        echo 'Mailer Error: ' . $mail->ErrorInfo;
        return false;
         
        }
        
    }
    
    public function sendEmailQuoteToBusiness($nombre,$email,$code,$data,$DNI,$provincia,$canton,$distrito,$direccion,$telefono){
        require_once '../email/principalController.php';
        require_once '../config/parameters.php';
        
        $table = !empty($data)?$this->makeTableFromData($data,true):'';
        $msnData['title'] = "Solicitud Cotizar";
        $msnData['info'] = "Ha recibido una solicitud #".$code." para cotizar con los siguintes datos";
        $intro = '';
        $intro .= '<ul>';
        $intro .= '<li>Nombre:'.utf8_decode($nombre).'</li>';
        $intro .= '<li>Email: '.utf8_decode($email).'</li>';
        $intro .= '<li>Identificación: '.utf8_decode($DNI).'</li>';
        $intro .= '<li>Provincia: '.utf8_decode($provincia).'</li>';
        $intro .= '<li>Cantón: '.utf8_decode($canton).'</li>';
        $intro .= '<li>Distrito: '.utf8_decode($distrito).'</li>';
        $intro .= '<li>Dirección: '.utf8_decode($direccion).'</li>';
        $intro .= '<li>Número telefónico: '.$telefono.'</li>';
        $intro .= '</ul>';
        $msnData['intro'] = $intro;
        $msnData['url'] = base_url3."images/logo/prof20221006063306.png";
        $msnData['table'] = $table;
        $newTemplate = new principalController();
        $respTemplate = $newTemplate->sendEmailForQuote($msnData);
        //CONFIG PHPMAILER
       
        date_default_timezone_set('Etc/UTC');
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPDebug = SMTP::DEBUG_OFF ;  // SMTP::DEBUG_OFF = off;// SMTP::DEBUG_SERVER
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

            $mail->addAddress($this->profile->infoEmail, 'Cliente');
            $mail->Subject = utf8_decode('Cotización ').$code;
            $mail->Body = $respTemplate; 

        //ENVIO DE CORREO
        if ($mail->send()) {
        return true;
        } else {
        echo 'Mailer Error: ' . $mail->ErrorInfo;
        return false;
         
        }
        
    }
    public function makeTableFromData($data,$adminEmail=false){
        $keys = array_keys($data[0]);
        $HTML = '<table><thead><tr>';
        foreach($keys as $keysvalues){
            if($keysvalues=='Files'){
                if($adminEmail){
                 $HTML.='<th style="font-size:23px;color:#333333;padding:0 0 20px 0; font-family:sans-serif;text-align:center;padding-top:75px;font-weight:400;">'.$keysvalues.'</th>'; 
                }
            } else {
                 $HTML.='<th style="font-size:23px;color:#333333;padding:0 0 20px 0; font-family:sans-serif;text-align:center;padding-top:75px;font-weight:400;">'.$keysvalues.'</th>'; 

            }
           }
        $HTML .='</tr></thead>';
        $HTML .='<tbody>';
        foreach($data as $index =>$datavalues){
           $HTML.='<tr>';
           foreach($keys as $keysvalues){
           //$datavalues
               if($keysvalues=='Files'){
                   if(!empty($datavalues[$keysvalues])&&$adminEmail){
                        $HTML.= '<td style="border:solid 1px gray;padding:30px;background:white;border-collapse:collapse;width:630px;">'
                                . '<button style="border-radius:10px;color:#6695FF;width:125px;padding:5px;"><a href="'.base_url."/assets/files/".$datavalues[$keysvalues].'">Ver Adjunto</a></td>';   
                   }
                }else{
                $HTML.= '<td style="border:solid 1px gray;padding:30px;background:white;border-collapse:collapse;width:630px;">'.$datavalues[$keysvalues]."</td>";

               }
           }
           
           $HTML.='</tr>'; 
        }
        $HTML .='</tbody>';
        $HTML .='</table>';
        return $HTML;
    }
}
?>
