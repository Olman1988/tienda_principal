<?php
require_once './config/conexion.php';
class logisticModel{
    public function  getGeneralLogistic(){
        $respuesta=[];
    try {
            $db = conexion::getConnect();//Aqui se conecta a la base de datos
           $consulta =$db->prepare("select entregaOficina,direccion,entregaDomicilio,maps from generalLogistic order by ID desc");
            $consulta->execute();
            foreach($consulta->fetchAll(PDO::FETCH_ASSOC) as $value){
                    $respuesta[]=$value;
                }
            
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
        }
        
        return $respuesta; 
    }
}

