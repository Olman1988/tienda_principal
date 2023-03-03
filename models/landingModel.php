<?php

class landingModel{
    
     public function insertarLanding($nombrefinalImagen,$titulo,$subtitulo,$emailSet,$descripcion,$estado,$code){
                try {
            $db = conexion::getConnect();
            $consulta=$db->prepare("INSERT INTO [dbo].[landings] values(:titulo,:subtitulo,:rutaImagen,:estado,:emailSet,:descripcion,:code)");
            
             $db->beginTransaction(); //inicia la transaccion
            $consulta->bindValue(':titulo', $titulo);
            $consulta->bindValue(':subtitulo', $subtitulo);
            $consulta->bindValue(':emailSet', $emailSet);
            $consulta->bindValue(':rutaImagen', $nombrefinalImagen);
            $consulta->bindValue(':descripcion', $descripcion);
            $consulta->bindValue(':estado', $estado);
            $consulta->bindValue(':code', $code);
            $consulta->execute();
         $respuesta=$db->commit();

            
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
           
        }
        
      return $respuesta;
    }
       public function consultarLandings(){
        
               $respuesta=[];
    try {
            $db = conexion::getConnect();
           $consulta =$db->prepare("select * from [landings] where estado = 1 order by id desc");
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
    public function insertarInfoCliente($nombre,$email,$cedula,$telefono,$code){
              try {
            $db = conexion::getConnect();
            $consulta=$db->prepare("INSERT INTO [dbo].[infoClientesForm] values(:nombre,:email,:cedula,:telefono,:code)");
            
             $db->beginTransaction(); //inicia la transaccion
            $consulta->bindValue(':nombre', $nombre);
            $consulta->bindValue(':email', $email);
            $consulta->bindValue(':cedula', $cedula);
            $consulta->bindValue(':telefono', $telefono);
            $consulta->bindValue(':code', $code);
            $consulta->execute();
         $respuesta=$db->commit();

            
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
           
        }
        
      return $respuesta;
    }
    
    public function actualizarLanding($nombrefinalImagen='',$titulo,$subtitulo,$emailSet,$descripcion,$estado,$id){
                     try {
                   $AddToQuery = '';
                   
                   if($nombrefinalImagen!=''){
                     $AddToQuery=  'rutaImagen = :rutaImagen,';
                   }
            $db = conexion::getConnect();
          
            $consulta=$db->prepare("UPDATE [landings] SET titulo = :titulo, subtitulo = :subtitulo ,".$AddToQuery." estado = :estado, emailSet = :emailSet,descripcion = :descripcion where id = :id");
            
             $db->beginTransaction(); //inicia la transaccion
            
           
     
            $consulta->bindValue(':titulo', $titulo);
            $consulta->bindValue(':subtitulo', $subtitulo);
            $consulta->bindValue(':emailSet', $emailSet);
            $consulta->bindValue(':descripcion', $descripcion);
            if($nombrefinalImagen!=''){
                     $consulta->bindValue(':rutaImagen', $nombrefinalImagen);
                   }
            $consulta->bindValue(':estado', $estado);
            $consulta->bindValue(':id',$id);
        
          
            

            $consulta->execute();
         $respuesta=$db->commit();
        }
    catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
            $respuesta = false;
           
        }
        return $respuesta;
    }
    
        public function borrarLanding($idLanding){
         $response;
        try {
            
            $db = conexion::getConnect();
            $consulta = $db->prepare("DELETE FROM [landings] WHERE id =:id");
            $consulta->bindValue(':id', $idLanding);
            $response=$consulta->execute();
            
        } catch (PDOException $e) { //captura en caso de error de proceso db
            echo "se ha presentado un error " . $e->getMessage(); //muestra el mensaje de error.
            $db->rollBack(); //en caso de error, elimina las transacciones que se han realizado
            throw $e;
            $response=0;
        }
        return $response;
}
        public function consultarLandingCode($code){
                   $resultado;
            try {
                    $db = conexion::getConnect();
                    $consulta = $db->prepare("SELECT * from [landings] where code = :code AND estado = 1");
                    $consulta->bindValue(':code', $code);
                    $consulta->execute();
                    $resultado= $consulta->fetch(PDO::FETCH_ASSOC);
                } catch (PDOException $e) {
                    echo "se ha presentado un error " . $e->getMessage();
                    throw $e;
                }
                return $resultado;
        }
        public function consultarClientes(){
                     $respuesta=[];
            try {
                    $db = conexion::getConnect();
                    $consulta = $db->prepare("SELECT * from [infoClientesForm]");
                    
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
