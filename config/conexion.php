<?php
class conexion{
    //VARIABLES NECESARIAS PARA CREAR LA CONEXION
    private static $instance = NULL; //VARIABLE DE LA CLASE, NO DEL OBJETO
    private function __construct(){}
    public static function getConnect(){
        try{
            //PREGUNTAR SI LA INSTANCIA NO EXISTE PARA CREARLA 
            if(!isset(self::$instance)){
                $pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;//INVESTIGAR 29-08
                //$conexion=new PDO("sqlsrv:server=wdb4.my-hosting-panel.com;database=atheneal_balloons","atheneal_balloons","Balloons/2022*");

                $pdo_options=self::$instance=new PDO("sqlsrv:server=wdb4.my-hosting-panel.com;database=atheneal_tienda","atheneal_tienda","Bee#36k97");
                $pdo_options->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                
            }// DEVUELVE LA INSTANCIA SI EXISTE
            return self::$instance;
            
        }catch(PDOException $e){
            echo 'Conexion fallida ' . $e->getMessage();
        }
    }
}
?>
