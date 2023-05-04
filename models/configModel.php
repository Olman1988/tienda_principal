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
                    ,ISNULL([payment_active], 0) AS payment_active
                    ,[sliderType]
                    ,[sliderMobile]
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
    public function metodos_pago(){
        $respuesta=[];
        try {
            $db = conexion::getConnect();//Aqui se conecta a la base de datos
            $consulta =$db->prepare("SELECT 
                    [id]
                    ,[descripcion]
                    ,[estado]
                    ,[rutaImagen]
                    ,[alias]
                    ,[info]
                FROM [dbo].[store_PaymentType]");
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
    public function modificarConfiguracion($AppId, $Tax, $HomeType, $idPaymentType, $mostarPrecios, $accesoAnonimo, $envio, $blog, $preguntasFrecuentes, $generalShipping, $payment_active, $id,$sliderType,$sliderMobile){
        try {
            $db = conexion::getConnect();
            $IDPayment = '';

            if($idPaymentType != false){
                $IDPayment = ',[idPaymentType] =:idPaymentType';
            }            

            $consulta=$db->prepare("UPDATE [dbo].[store_StoreConfiguration] SET 
                     [AppId] =:AppId
                    ,[Tax] =:Tax
                    ,[HomeType] =:HomeType
                    " . $IDPayment . "
                    ,[mostarPrecios] =:mostarPrecios
                    ,[accesoAnonimo] =:accesoAnonimo
                    ,[envio] =:envio
                    ,[blog] =:blog
                    ,[preguntasFrecuentes] =:preguntasFrecuentes
                    ,[generalShipping] =:generalShipping
                    ,[payment_active] =:payment_active
                    ,[sliderType]=:sliderType
                    ,[sliderMobile]=:sliderMobile
                    WHERE id = :id");
            $db->beginTransaction(); //inicia la transaccion
            $consulta->bindValue(':AppId', $AppId);
            $consulta->bindValue(':Tax', $Tax);
            $consulta->bindValue(':HomeType', $HomeType);
            if($idPaymentType != false){
                $consulta->bindValue(':idPaymentType', $idPaymentType);
            }
            $consulta->bindValue(':mostarPrecios', $mostarPrecios);
            $consulta->bindValue(':accesoAnonimo', $accesoAnonimo);
            $consulta->bindValue(':envio', $envio);
            $consulta->bindValue(':blog', $blog);
            $consulta->bindValue(':preguntasFrecuentes', $preguntasFrecuentes);
            $consulta->bindValue(':generalShipping', $generalShipping);
            $consulta->bindValue(':payment_active', $payment_active);
            $consulta->bindValue(':id', $id);
            $consulta->bindValue(':sliderType', $sliderType);
            $consulta->bindValue(':sliderMobile', $sliderMobile);
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