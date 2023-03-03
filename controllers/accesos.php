<?php
require_once 'models/accesosModel.php';
class accesos{
    public static function sessionIniciada(){
        if(isset($_SESSION['perfil'])){
            return true;
        } else {
            return false;
        }
    }
    public static function validarAccesos($pass,$email){
        $acceso = new accesosModel();
        $respuestaAcceso = $acceso -> validarAccesos($pass,$email);
        if($respuestaAcceso['role'] == 'Admin'){
            return true;
        } else {
            return false;
        }
    }

}
