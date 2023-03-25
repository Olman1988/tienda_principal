<?php
class attributesModel{
    private $db;
    public function __construct() {
        $this->db = conexion::getConnect();
    }

    public function getAllAttributesGroup(){
        $respuesta=[];
    try {
           $consulta =$this->db->prepare("select id,nombre,idTipoControl FROM AtributoEspecialGrupo ORDER BY orden");
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
    public function setAttributesGroup($description){
        $respuesta= false;
        try {
            $consulta=$this->db->prepare("INSERT INTO [dbo].[AtributoEspecialGrupo] (nombre) VALUES (:descripcion)");
            
            $this->db->beginTransaction(); //inicia la transaccion
            $consulta->bindValue(':descripcion', $description);
            $consulta->execute();
         $respuesta=$this->db->commit();

            
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
           
        }
        
      return $respuesta;
    }
    public function getAttributeGroupById($id){
             $respuesta=[];
    try {
           $consulta =$this->db->prepare("select id,nombre,idTipoControl FROM AtributoEspecialGrupo WHERE id = :id ORDER BY orden");
           $this->db->beginTransaction(); //inicia la transaccion
            $consulta->bindValue(':id', $id);
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
     public function updAttributesGroup($description,$id){
         $respuesta=false;
          try {
            $consulta=$this->db->prepare("UPDATE [dbo].[AtributoEspecialGrupo] SET nombre=:descripcion WHERE id = :id");
            $this->db->beginTransaction(); //inicia la transaccion
            $consulta->bindValue(':descripcion', $description);
            $consulta->bindValue(':id', $id);
            $consulta->execute();
            $respuesta=$this->db->commit();

            
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
           
        }
        
      return $respuesta;
     }
     public function delAttributesGroup($id){
         $response;
        try {
            $consulta = $this->db->prepare("DELETE FROM [dbo].[AtributoEspecialGrupo] WHERE id =:id");
            $consulta->bindValue(':id', $id);
            $response=$consulta->execute();
        } catch (PDOException $e) { //captura en caso de error de proceso db
            echo "se ha presentado un error " . $e->getMessage(); //muestra el mensaje de error.
            $this->db->rollBack(); //en caso de error, elimina las transacciones que se han realizado
            throw $e;
            $response=0;
        }
        return $response;
     }
     public function getAllAttributes(){
         $respuesta=[];
    try {
           $consulta =$this->db->prepare("select id,nombre,idTipoControl FROM AtributoEspecial");
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
     public function setAttributes($description,$control){
         $respuesta= false;
        try {
            $consulta=$this->db->prepare("INSERT INTO [dbo].[AtributoEspecial] (nombre,idTipoControl) VALUES (:descripcion,:control)");
            $this->db->beginTransaction(); //inicia la transaccion
            $consulta->bindValue(':descripcion', $description);
            $consulta->bindValue(':control', $control);
            $consulta->execute();
            $respuesta=$this->db->commit();

            
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
           
        }
        
      return $respuesta;
     }
     public function getAttributeById($id){
       $respuesta=[];
    try {
           $consulta =$this->db->prepare("select id,nombre,idTipoControl FROM AtributoEspecial WHERE id = :id");
           $this->db->beginTransaction(); //inicia la transaccion
            $consulta->bindValue(':id', $id);
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
      public function updAttributes($description,$id,$control){
          $respuesta=false;
       
          try {
            $consulta=$this->db->prepare("UPDATE [dbo].[AtributoEspecial] SET nombre=:descripcion,idTipoControl = :control WHERE id = :id");
            $this->db->beginTransaction(); //inicia la transaccion
            $consulta->bindValue(':descripcion', $description);
            $consulta->bindValue(':control', $control);
            $consulta->bindValue(':id', $id);
            $consulta->execute();
            $respuesta=$this->db->commit();

        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
           
        }
        
      return $respuesta;
      }
      public function delAttributes($id){
         $response;
        try {
            
            $consulta = $this->db->prepare("DELETE FROM [dbo].[AtributoEspecial] WHERE id =:id");
            $consulta->bindValue(':id', $id);
            $response=$consulta->execute();
        } catch (PDOException $e) { //captura en caso de error de proceso db
            echo "se ha presentado un error " . $e->getMessage(); //muestra el mensaje de error.
            $this->db->rollBack(); //en caso de error, elimina las transacciones que se han realizado
            throw $e;
            $response=0;
        }
        return $response;
     }
     public function getAllAttributeValues($id){
         $respuesta=[];
    try {
           $consulta =$this->db->prepare("select id,idAtributoEspecial,valor,orden,cuadroColorRgb,foto FROM AtributoEspecialValores WHERE idAtributoEspecial = :id");
           $this->db->beginTransaction(); //inicia la transaccion
            $consulta->bindValue(':id', $id);
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
     public function setAttributeValues($description,$order,$color,$nombrefinal,$id){
         $respuesta= false;
        try {
            $consulta=$this->db->prepare("INSERT INTO [dbo].[AtributoEspecialValores] (idAtributoEspecial,valor,orden,cuadroColorRgb,foto) VALUES (:id,:descripcion,:orden,:color,:imagen)");
            $this->db->beginTransaction(); //inicia la transaccion
            $consulta->bindValue(':descripcion', $description);
            $consulta->bindValue(':orden', $order);
            $consulta->bindValue(':color', $color);
            $consulta->bindValue(':imagen', $nombrefinal);
            $consulta->bindValue(':id', $id);
            $consulta->execute();
            $respuesta=$this->db->commit();

            
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
           
        }
        
      return $respuesta;
     }
     public function getAttributeValueById($id){
        $respuesta=[];
           try {
           $consulta =$this->db->prepare("select id,valor,orden,cuadroColorRgb,foto,idAtributoEspecial FROM AtributoEspecialValores WHERE id = :id");
           $this->db->beginTransaction(); //inicia la transaccion
           $consulta->bindValue(':id', $id);
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
     public function updAttributesValues($description,$order,$color,$id,$imagen){
         $respuesta=false;
          try {
            $consulta=$this->db->prepare("UPDATE [dbo].[AtributoEspecialValores] SET valor=:descripcion,orden = :order,cuadroColorRgb=:color,foto=:foto WHERE id = :id");
            $this->db->beginTransaction(); //inicia la transaccion
            $consulta->bindValue(':descripcion', $description);
            $consulta->bindValue(':order', $order);
            $consulta->bindValue(':color', $color);
            $consulta->bindValue(':foto', $imagen);
            $consulta->bindValue(':id', $id);
            $consulta->execute();
            $respuesta=$this->db->commit();
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
           
        }
        
      return $respuesta;
     }
     public function delAttributesValues($id){
         $response;
        try {
            
            $consulta = $this->db->prepare("DELETE FROM [dbo].[AtributoEspecialValores] WHERE id =:id");
            $consulta->bindValue(':id', $id);
            $response=$consulta->execute();
        } catch (PDOException $e) { //captura en caso de error de proceso db
            echo "se ha presentado un error " . $e->getMessage(); //muestra el mensaje de error.
            $this->db->rollBack(); //en caso de error, elimina las transacciones que se han realizado
            throw $e;
            $response=0;
        }
        return $response;
     }
     public function getAllAttributesByGroup($id){
         $respuesta=[];
           try {
           $consulta =$this->db->prepare("select a.id, a.nombre, a.idTipoControl, a.cuadroColorRgb, a.foto from AtributoEspecialGrupoAtributo ga LEFT JOIN AtributoEspecial a on ga.idAtributoEspecial=a.id WHERE ga.idGrupo = :id");
           $this->db->beginTransaction(); //inicia la transaccion
           $consulta->bindValue(':id', $id);
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
     public function delAttributeGroupVsAttribute($idAtributo,$idGroup){
        
         $response;
        try {
            
            $consulta = $this->db->prepare("DELETE FROM [dbo].[AtributoEspecialGrupoAtributo] WHERE idGrupo =:id AND idAtributoEspecial = :idAtributo");
            $consulta->bindValue(':id', $idGroup);
            $consulta->bindValue(':idAtributo', $idAtributo);
            $response=$consulta->execute();
        } catch (PDOException $e) { //captura en caso de error de proceso db
            echo "se ha presentado un error " . $e->getMessage(); //muestra el mensaje de error.
            $this->db->rollBack(); //en caso de error, elimina las transacciones que se han realizado
            throw $e;
            $response=0;
        }
        return $response;
     }
     
     public function setAttributeGroupVsAttribute($idAtributo,$idGroup){
         $respuesta= false;
        try {
            $consulta=$this->db->prepare("INSERT INTO [dbo].[AtributoEspecialGrupoAtributo] (idGrupo,idAtributoEspecial) VALUES (:idGroup,:idAtributo)");
            $this->db->beginTransaction(); //inicia la transaccion
            $consulta->bindValue(':idAtributo', $idAtributo);
            $consulta->bindValue(':idGroup', $idGroup);
            $consulta->execute();
            $respuesta=$this->db->commit();

            
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
           
        }
        
      return $respuesta;
     }
     public function getAllAttributesByProduct($id){
         $respuesta=[];
           try {
           $consulta =$this->db->prepare("SELECT ag.nombre,ag.id FROM AtributoEspecialGrupoArticulo ae LEFT JOIN AtributoEspecialGrupo ag ON ae.idGrupo = ag.id WHERE ae.codArticulo = :id");
           $this->db->beginTransaction(); //inicia la transaccion
           $consulta->bindValue(':id', $id);
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
     public function setAllAttributesByProduct($id,$cod){
         $respuesta= false;
        try {
            $consulta=$this->db->prepare("INSERT INTO [dbo].[AtributoEspecialGrupoArticulo] (idGrupo,codArticulo) VALUES (:idGrupo,:codArt)");
            $this->db->beginTransaction(); //inicia la transaccion
            $consulta->bindValue(':idGrupo', $id);
            $consulta->bindValue(':codArt', $cod);
            $consulta->execute();
            $respuesta=$this->db->commit();

            
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
           
        }
        
      return $respuesta;
     }
     public function delAttributesVsProduct($idGroup,$cod){
         $response;
        try {
            $consulta = $this->db->prepare("DELETE FROM [dbo].[AtributoEspecialGrupoArticulo] WHERE idGrupo =:idGroup AND codArticulo = :cod");
            $consulta->bindValue(':cod', $cod);
            $consulta->bindValue(':idGroup', $idGroup);
            $response=$consulta->execute();
        } catch (PDOException $e) { //captura en caso de error de proceso db
            echo "se ha presentado un error " . $e->getMessage(); //muestra el mensaje de error.
            $this->db->rollBack(); //en caso de error, elimina las transacciones que se han realizado
            throw $e;
            $response=0;
        }
        return $response;
     }
     
}

