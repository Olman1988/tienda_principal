<?php
require_once '../models/cotizacionModel.php';
class cotizacionesController{
    public function getAllQuotes(){
        $quote = new cotizacionModel();
        $respQuote = $quote->getAllQuotes();
        
        return $respQuote;
    }
    public function getQuoteDetails($code){
        $quote = new cotizacionModel();
        $respQuote = $quote->getDataQuoteByCode($code);
        return $respQuote;
    }
    public function updateStatusQuote($code,$status){
        $quote = new cotizacionModel();
        $respQuote = $quote->updateStatusQuote($code,$status);
        return $respQuote;
    }
}
if(isset($_POST['action'])){
    switch ($_POST['action']) {
        case "mostrarDetalles":
            $respQuote=Array();
            $result = Array();
            $code= !empty($_POST['code'])?filter_var($_POST['code'], FILTER_SANITIZE_STRING):0;
           if($code!=0){
              $quote = new cotizacionesController();
              $respQuote = $quote->getQuoteDetails($code); 
              if(!empty($respQuote)){
                 $result['data']=$respQuote;
                 $result['status']=true; 
              }else {
                  $result['msn']="No existe información para esta cotización";
                  $result['status']=false;
              }
           } else{
              $result['msn']="Error en el codigo indicado";
              $result['status']=false;
           }
            header('Content-Type: application/json');
            echo json_encode($result);

            break;
        case "updateStatus":
            $respQuote=Array();
            $result = Array();
            $code= !empty($_POST['code'])?filter_var($_POST['code'], FILTER_SANITIZE_STRING):0;
            $status= !empty($_POST['status'])?filter_var($_POST['status'], FILTER_SANITIZE_NUMBER_INT):0;
            if($code!=0&&$status!=0){
              $quote = new cotizacionesController();
              $respQuote = $quote->updateStatusQuote($code,$status); 
              if(!empty($respQuote)){
                 $result['msn']="Cotización actualizada con éxito";
                 $result['status']=true; 
              }else {
                  $result['msn']="Error al actualizar el estado de la cotización";
                  $result['status']=false;
              }
           } else{
              $result['msn']="Los datos ingresados son incorrectos";
              $result['status']=false;
           }
             header('Content-Type: application/json');
            echo json_encode($result);
            break;

        default:
            break;
    }
}
