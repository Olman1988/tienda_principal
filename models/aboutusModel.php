<?php

class aboutusModel{
    /**
     * @method consultarPaginas
     * @return array
     */
    public function consultarPaginas(){
        $respuesta=[];
        try {
            $db = conexion::getConnect();//Aqui se conecta a la base de datos
            $consulta =$db->prepare("SELECT 
                     [codigo]
                    ,[nombre]
                    ,[contenido]
                    ,[orden]
                    ,[activo]
                FROM [atheneal_tienda].[dbo].[base_AcercaDe]");
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
    /**
     * @method getAUByCode
     * @return array
     */
    public function getAUByCode($Codigo){
        $respuesta=[];
        try {
            $db = conexion::getConnect();//Aqui se conecta a la base de datos
            $consulta =$db->prepare("SELECT 
                     [codigo]
                    ,[nombre]
                    ,[contenido]
                    ,[orden]
                    ,[activo]
                FROM [dbo].[base_AcercaDe]
                WHERE codigo =:codigo");
            $consulta->bindValue(':codigo', $Codigo);
            $consulta->execute();
            $respuesta = $consulta->fetch(PDO::FETCH_ASSOC);        
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
        }
        
        return $respuesta;
    }
    /**
     * @method modifyAUByCode
     * @return boolean
     */
    public function modifyAUByCode($nombre, $contenido, $orden, $activo, $codigo){
        try {
            $db = conexion::getConnect();
            $consulta=$db->prepare("UPDATE [dbo].[base_AcercaDe] SET nombre=:nombre, contenido=:contenido, orden=:orden, activo=:activo WHERE codigo = :codigo");            
            $db->beginTransaction(); //inicia la transaccion
            $consulta->bindValue(':nombre', $nombre);
            $consulta->bindValue(':contenido', $contenido);
            $consulta->bindValue(':orden', $orden);
            $consulta->bindValue(':activo', $activo);
            $consulta->bindValue(':codigo', $codigo);
            $consulta->execute();
            
            $respuesta=$db->commit();
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
        }
        
        return $respuesta; 
    }
}