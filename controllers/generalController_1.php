<?php
require_once './config/conexion.php';
require_once './models/generalModel.php';
class generalController{
    public function todasPreguntasFrecuentes(){
        $consultaFAQ= new generalModel();
        $respuestaFAQ=$consultaFAQ->todasPreguntasFrecuentes();
        return $respuestaFAQ;
    }
    public function consultarOfertas(){
        $consultaOferta= new generalModel();
        $respuestaOferta=$consultaOferta->consultarOfertas();
        if(count($respuestaOferta)>0){
            require_once 'views/principal/ofertaLimitada.php';
        }
    }
    public function consultarMarcas(){
        $consultaMarcas= new generalModel();
        $respuestaMarcas=$consultaMarcas->consultarMarcas();
        if(count($respuestaMarcas)>0){
             require_once "views/principal/marcas.php";   
        }
       
    }
    public function consultarOrdenes($email){
        
        $consultaOrdenes= new generalModel();
        $respuestaOrdenes=$consultaOrdenes->consultarOrdenes($email);
        return $respuestaOrdenes;
    }
    
}