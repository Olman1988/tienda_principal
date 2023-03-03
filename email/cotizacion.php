<?php 
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\SMTP;
 require '../phpmailer/src/Exception.php';
 require '../phpmailer/src/PHPMailer.php';
 require '../phpmailer/src/SMTP.php';
class cotizacion{
    
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
        $mail->SMTPDebug = SMTP::DEBUG_OFF;  // SMTP::DEBUG_OFF = off;
        $mail->SMTPAutoTLS = false;
        $mail->SMTPSecure = false;
        $mail->Host = 'tecnosula.com';
        $mail->Port = 25;
        $mail->SMTPAuth = true;
        $mail->isHTML(true);
        $mail->Username = 'contacto@tecnosula.com';
        $mail->Password = 'C0nt@ct0/2022';
        $mail->setFrom('contacto@tecnosula.com', 'Balloons');


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
        
        $table = !empty($data)?$this->makeTableFromData($data):'';
        $msnData['title'] = "Solicitud Cotizar";
        $msnData['info'] = "Ha recibido una solicitud #".$code." para cotizar con los siguintes datos";
        $intro = '';
        $intro .= '<ul>';
        $intro .= '<li>Nombre:'.$nombre.'</li>';
        $intro .= '<li>Email: '.$email.'</li>';
        $intro .= '<li>Identificación: '.$DNI.'</li>';
        $intro .= '<li>Provincia: '.$provincia.'</li>';
        $intro .= '<li>Cantón: '.$canton.'</li>';
        $intro .= '<li>Distrito: '.$distrito.'</li>';
        $intro .= '<li>Dirección: '.$direccion.'</li>';
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
        $mail->SMTPDebug = SMTP::DEBUG_OFF;  // SMTP::DEBUG_OFF = off;
        $mail->SMTPAutoTLS = false;
        $mail->SMTPSecure = false;
        $mail->Host = 'tecnosula.com';
        $mail->Port = 25;
        $mail->SMTPAuth = true;
        $mail->isHTML(true);
        $mail->Username = 'contacto@tecnosula.com';
        $mail->Password = 'C0nt@ct0/2022';
        $mail->setFrom('contacto@tecnosula.com', 'Balloons');


            $mail->addAddress("olman1000@gmail.com", 'Cliente');
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
    public function makeTableFromData($data){
        $keys = array_keys($data[0]);
        $HTML = '<table><thead><tr>';
        foreach($keys as $keysvalues){
           $HTML.='<th style="font-size:23px;color:#333333;padding:0 0 20px 0; font-family:sans-serif;text-align:center;padding-top:75px;font-weight:400;">'.$keysvalues.'</th>'; 
        }
        $HTML .='</tr></thead>';
        $HTML .='<tbody>';
        foreach($data as $index =>$datavalues){
           $HTML.='<tr>';
           foreach($keys as $keysvalues){
           //$datavalues
               $HTML.= '<td style="border:solid 1px gray;padding:30px;background:white;border-collapse:collapse;width:630px;">'.$datavalues[$keysvalues]."</td>";
           }
           
           $HTML.='</tr>'; 
        }
        $HTML .='</tbody>';
        $HTML .='</table>';
        return $HTML;
    }
}
?>
