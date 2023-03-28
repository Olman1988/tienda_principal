<?php 
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\SMTP;
 require '../phpmailer/src/Exception.php';
 require '../phpmailer/src/PHPMailer.php';
 require '../phpmailer/src/SMTP.php';
 require_once "../models/generalModel.php";

class ordenes{
    private $profile;
    
    public function __construct() {
        $consultaGeneral=new generalModel();
        $this->profile=$consultaGeneral->consultaProfile();
        
    }

    
    public function sendEmailOrder($nombre,$email,$code,$data){
        require_once '../email/principalController.php';
        require_once '../config/parameters.php';
        
        $table = !empty($data)?$this->makeTableFromData($data):'';
        $msnData['title'] = "Orden";
        $msnData['info'] = "Hemos recibido su pedido #".$code.", le haremos llegar una respuesta lo antes posible";
        $msnData['intro'] = "Hola, $nombre";
        $msnData['url'] = base_url3.$this->profile->logo;
        $msnData['table'] = $table;
        $newTemplate = new principalController();
        $respTemplate = $newTemplate->sendEmailForQuote($msnData);
        //CONFIG PHPMAILER
       
        date_default_timezone_set('Etc/UTC');
      
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPDebug = SMTP::DEBUG_OFF;//SMTP::DEBUG_SERVER;  // SMTP::DEBUG_OFF = off;
        $mail->SMTPAutoTLS = false;
        $mail->SMTPSecure = false;
        $mail->Host = 'tecnosula.com';
        $mail->Port = 25;
        $mail->SMTPAuth = true;
        $mail->isHTML(true);
        $mail->Username = 'info@tecnosula.com';
        $mail->Password = 'C0nt@ct0/2022';
        $mail->setFrom('info@tecnosula.com', $this->profile->name);


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
    
    public function sendEmailOrderToBusiness($nombre,$email,$code,$data,$DNI,$provincia,$canton,$distrito,$direccion,$telefono){
        require_once '../email/principalController.php';
        require_once '../config/parameters.php';
        
        $table = !empty($data)?$this->makeTableFromData($data,true):'';
        $msnData['title'] = "Orden";
        $msnData['info'] = "Ha recibido una orden de compra #".$code." con los siguintes datos";
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
        $msnData['url'] = base_url3.$this->profile->logo;
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
        $mail->Username = 'info@tecnosula.com';
        $mail->Password = 'C0nt@ct0/2022';
        $mail->setFrom('info@tecnosula.com', $this->profile->name);
https://localhost/new_projects/tienda_principal/assets/files/641407733E261Tarea%20%234.pdf

            $mail->addAddress($this->profile->infoEmail, 'Cliente');
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