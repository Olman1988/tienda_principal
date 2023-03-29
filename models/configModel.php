<?php

class configModel{
    public function consultarConfigs(){
        $respuesta=[];
        try {
            $db = conexion::getConnect();//Aqui se conecta a la base de datos
            $consulta =$db->prepare("SELECT 
                    [id]
                    ,[AppId]
                    ,[Tax]
                    ,[HomeType]
                    ,[idPaymentType]
                    ,[mostarPrecios]
                    ,[accesoAnonimo]
                    ,[envio]
                    ,[blog]
                    ,[preguntasFrecuentes]
                    ,[generalShipping]
                FROM [dbo].[store_StoreConfiguration]");
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
     * 
     * 
     */
    public function insertConfiguracion(){
        $respuesta = false;
        try {
            $db = conexion::getConnect();
            $consulta=$db->prepare("INSERT INTO [dbo].[store_StoreConfiguration](AppId) VALUES (:AppId)");
            
            $db->beginTransaction(); //inicia la transaccion
            $consulta->bindValue(':AppId', '000000');
            $consulta->execute();
            
            $respuesta = $db->commit();
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
        }
        
        return $respuesta;
    }
     /**
     * 
     * 
     */
    public function modificarConfiguracion($AppId, $Tax, $HomeType, $idPaymentType, $mostarPrecios, $accesoAnonimo, $envio, $blog, $preguntasFrecuentes, $generalShipping, $id){
        try {
            $db = conexion::getConnect();
            $consulta=$db->prepare("UPDATE [dbo].[store_StoreConfiguration] SET 
                     [AppId] =:AppId
                    ,[Tax] =:Tax
                    ,[HomeType] =:HomeType
                    ,[idPaymentType] =:idPaymentType
                    ,[mostarPrecios] =:mostarPrecios
                    ,[accesoAnonimo] =:accesoAnonimo
                    ,[envio] =:envio
                    ,[blog] =:blog
                    ,[preguntasFrecuentes] =:preguntasFrecuentes
                    ,[generalShipping] =:generalShipping
                    WHERE id = :id");
            $db->beginTransaction(); //inicia la transaccion
            $consulta->bindValue(':AppId', $AppId);
            $consulta->bindValue(':Tax', $Tax);
            $consulta->bindValue(':HomeType', $HomeType);
            $consulta->bindValue(':idPaymentType', $idPaymentType);
            $consulta->bindValue(':mostarPrecios', $mostarPrecios);
            $consulta->bindValue(':accesoAnonimo', $accesoAnonimo);
            $consulta->bindValue(':envio', $envio);
            $consulta->bindValue(':blog', $blog);
            $consulta->bindValue(':preguntasFrecuentes', $preguntasFrecuentes);
            $consulta->bindValue(':generalShipping', $generalShipping);
            $consulta->bindValue(':id', $id);
            $consulta->execute();
            
            $respuesta=$db->commit();
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
        }
        
        return $respuesta;  
    }
}
?>