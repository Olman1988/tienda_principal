<?php

class perfiltiendaModel{    
    public function consultarDatos(){
        $respuesta=[];
        try {
            $db = conexion::getConnect();//Aqui se conecta a la base de datos
            $consulta =$db->prepare("SELECT 
                    [id]
                    ,[name]
                    ,[address]
                    ,[infoEmail]
                    ,[supportEmail]
                    ,[phone]
                    ,[mobile]
                    ,[whatsApp]
                    ,[latitude]
                    ,[longitude]
                    ,[logo]
                    ,[facebook]
                    ,[instagram]
                    ,[twitter]
                    ,[pinterest]
                    ,[linkedin]
                    ,[youtube]
                    ,[AppId]
                    ,[storeUrl]
                    ,[mapsEmbeded]
                FROM [dbo].[store_StoreProfile]");
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
    public function insertRecord(){
        $respuesta = false;
        try {
            $db = conexion::getConnect();
            $consulta=$db->prepare("INSERT INTO [dbo].[store_StoreProfile](name) VALUES (:name)");
            
            $db->beginTransaction(); //inicia la transaccion
            $consulta->bindValue(':name', 'Tienda');
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
    public function modificarDatos($name,$address, $infoEmail, $supportEmail, $phone, $mobile, $whatsApp, $latitude, $longitude, $logo, $facebook, $instagram, $twitter,
        $pinterest, $linkedin, $youtube, $AppId, $storeUrl, $mapsEmbeded, $id){
        try {
            $db = conexion::getConnect();
            $consulta=$db->prepare("UPDATE [dbo].[store_StoreProfile] SET 
                    [name] =:name
                    ,[address] =:address
                    ,[infoEmail] =:infoEmail
                    ,[supportEmail] =:supportEmail
                    ,[phone] =:phone
                    ,[mobile] =:mobile
                    ,[whatsApp] =:whatsApp
                    ,[latitude] =:latitude
                    ,[longitude] =:longitude
                    ,[logo] =:logo
                    ,[facebook] =:facebook
                    ,[instagram] =:instagram
                    ,[twitter] =:twitter
                    ,[pinterest] =:pinterest
                    ,[linkedin] =:linkedin
                    ,[youtube] =:youtube
                    ,[AppId] =:AppId
                    ,[storeUrl] =:storeUrl
                    ,[mapsEmbeded] =:mapsEmbeded
                    WHERE id = :id");
            $db->beginTransaction(); //inicia la transaccion
            $consulta->bindValue(':name', $name);
            $consulta->bindValue(':address', $address);
            $consulta->bindValue(':infoEmail', $infoEmail);
            $consulta->bindValue(':supportEmail', $supportEmail);
            $consulta->bindValue(':phone', $phone);
            $consulta->bindValue(':mobile', $mobile);
            $consulta->bindValue(':whatsApp', $whatsApp);
            $consulta->bindValue(':latitude', $latitude);
            $consulta->bindValue(':longitude', $longitude);
            $consulta->bindValue(':logo', $logo);
            $consulta->bindValue(':facebook', $facebook);
            $consulta->bindValue(':instagram', $instagram);
            $consulta->bindValue(':twitter', $twitter);
            $consulta->bindValue(':pinterest', $pinterest);
            $consulta->bindValue(':linkedin', $linkedin);
            $consulta->bindValue(':youtube', $youtube);
            $consulta->bindValue(':AppId', $AppId);
            $consulta->bindValue(':storeUrl', $storeUrl);
            $consulta->bindValue(':mapsEmbeded', $mapsEmbeded);
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