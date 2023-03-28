<?php

class generalModel{
    
    public function consultarOrdenes($email){
          $respuesta=[];
    try {
            $db = conexion::getConnect();//Aqui se conecta a la base de datos
               // $consulta =$db->prepare("SELECT i.id, i.nombre, i.modelo, i.marca, i.descripcion, i.cantidad, i.precio, ci.nombre AS categoria, cs.nombre AS subcategoria, i.image, e.nombre AS estado FROM tbl_productos i INNER JOIN tbl_categorias ci ON i.id_categoria = ci.id INNER JOIN tbl_subcategorias cs ON i.id_subcategoria = cs.id INNER JOIN tbl_estados e ON i.estado = e.id ORDER BY id");
           $consulta =$db->prepare("SELECT * FROM Orden where userName='$email' order by fecha desc");
           //$consulta->bindValue(':id', $idCategoria);
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
    public function consultarSlider(){
              $respuesta=[];
    try {
            $db = conexion::getConnect();//Aqui se conecta a la base de datos
               // $consulta =$db->prepare("SELECT i.id, i.nombre, i.modelo, i.marca, i.descripcion, i.cantidad, i.precio, ci.nombre AS categoria, cs.nombre AS subcategoria, i.image, e.nombre AS estado FROM tbl_productos i INNER JOIN tbl_categorias ci ON i.id_categoria = ci.id INNER JOIN tbl_subcategorias cs ON i.id_subcategoria = cs.id INNER JOIN tbl_estados e ON i.estado = e.id ORDER BY id");
           $consulta =$db->prepare("SELECT * FROM HomeTypeSlider order by 'order'");
           //$consulta->bindValue(':id', $idCategoria);
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
    public function consultarOrdenesTodas(){
          $respuesta=[];
    try {
            $db = conexion::getConnect();//Aqui se conecta a la base de datos
               // $consulta =$db->prepare("SELECT i.id, i.nombre, i.modelo, i.marca, i.descripcion, i.cantidad, i.precio, ci.nombre AS categoria, cs.nombre AS subcategoria, i.image, e.nombre AS estado FROM tbl_productos i INNER JOIN tbl_categorias ci ON i.id_categoria = ci.id INNER JOIN tbl_subcategorias cs ON i.id_subcategoria = cs.id INNER JOIN tbl_estados e ON i.estado = e.id ORDER BY id");
           $consulta =$db->prepare("SELECT o.codigo,o.Total,o.idPaymentType,o.fecha as creationdate,o.TotalTax,o.Shipping,o.SubTotal,o.userName,u.nombre AS cliente,u.apellido,u.telefono,u.email,oe.provincia,oe.canton,oe.distrito,oe.address,oe.shippingMethod FROM Orden o LEFT JOIN usuarios u on o.userName = u.email LEFT JOIN OrdenEntrega oe ON o.id = oe.idOrden order by o.fecha desc");
           //$consulta->bindValue(':id', $idCategoria);
            $consulta->execute();
            
            foreach($consulta->fetchAll(PDO::FETCH_ASSOC) as $index => $value){
                    $respuesta[$index]=$value;
                    $respuesta[$index]['id'] = $index;
                }
            
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
        }
        
        return $respuesta;
    }
    public function consultaAcercaDe(){
              $respuesta=[];
              $respuestaFAQ=[];
              $arrayFAQ = [];
        try {
            $db = conexion::getConnect();//Aqui se conecta a la base de datos
               // $consulta =$db->prepare("SELECT i.id, i.nombre, i.modelo, i.marca, i.descripcion, i.cantidad, i.precio, ci.nombre AS categoria, cs.nombre AS subcategoria, i.image, e.nombre AS estado FROM tbl_productos i INNER JOIN tbl_categorias ci ON i.id_categoria = ci.id INNER JOIN tbl_subcategorias cs ON i.id_subcategoria = cs.id INNER JOIN tbl_estados e ON i.estado = e.id ORDER BY id");
           $consulta =$db->prepare("SELECT * FROM base_AcercaDe where activo= :valid order by orden");
           $consulta->bindValue(':valid', true);
            $consulta->execute();
            
            foreach($consulta->fetchAll(PDO::FETCH_ASSOC) as $value){
                    $respuesta[]=$value;
                }
                $consultaNueva =$db->prepare("select preguntasFrecuentes from store_StoreConfiguration where preguntasFrecuentes=1");
           
            $consultaNueva->execute();
            foreach($consultaNueva->fetchAll(PDO::FETCH_ASSOC) as $valueNuevo){
                    $respuestaFAQ[]=$valueNuevo;
                }
           
            if(count($respuestaFAQ)>0){
                $arrayFAQ= array(
                    "codigo"=>"FAQ",
                    "nombre"=>"FAQ"
            );
                $respuesta[]=$arrayFAQ;
            }
            
           
            
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
        }
        
        return $respuesta;
    }
    public function consultaProfile(){
              $respuesta = '';
        try {
            $db = conexion::getConnect();//Aqui se conecta a la base de datos
               // $consulta =$db->prepare("SELECT i.id, i.nombre, i.modelo, i.marca, i.descripcion, i.cantidad, i.precio, ci.nombre AS categoria, cs.nombre AS subcategoria, i.image, e.nombre AS estado FROM tbl_productos i INNER JOIN tbl_categorias ci ON i.id_categoria = ci.id INNER JOIN tbl_subcategorias cs ON i.id_subcategoria = cs.id INNER JOIN tbl_estados e ON i.estado = e.id ORDER BY id");
           $consulta =$db->prepare("SELECT * FROM store_StoreProfile");
         
            $consulta->execute();
            
            $respuesta=$consulta->fetch(PDO::FETCH_OBJ);
            
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
        }
        
        return $respuesta;
    }
    public function consultarBlog(){
                   $respuesta=[];
    try {
            $db = conexion::getConnect();//Aqui se conecta a la base de datos
               // $consulta =$db->prepare("SELECT i.id, i.nombre, i.modelo, i.marca, i.descripcion, i.cantidad, i.precio, ci.nombre AS categoria, cs.nombre AS subcategoria, i.image, e.nombre AS estado FROM tbl_productos i INNER JOIN tbl_categorias ci ON i.id_categoria = ci.id INNER JOIN tbl_subcategorias cs ON i.id_subcategoria = cs.id INNER JOIN tbl_estados e ON i.estado = e.id ORDER BY id");
           $consulta =$db->prepare("SELECT * FROM blog_Post");
           //$consulta->bindValue(':id', $idCategoria);
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
    public function consultarBlogPorId($id){
           $respuesta = '';
        try {
            $db = conexion::getConnect();//Aqui se conecta a la base de datos
               // $consulta =$db->prepare("SELECT i.id, i.nombre, i.modelo, i.marca, i.descripcion, i.cantidad, i.precio, ci.nombre AS categoria, cs.nombre AS subcategoria, i.image, e.nombre AS estado FROM tbl_productos i INNER JOIN tbl_categorias ci ON i.id_categoria = ci.id INNER JOIN tbl_subcategorias cs ON i.id_subcategoria = cs.id INNER JOIN tbl_estados e ON i.estado = e.id ORDER BY id");
           $consulta =$db->prepare("SELECT * FROM blog_Post where id = $id");
         
            $consulta->execute();
            
            $respuesta=$consulta->fetch(PDO::FETCH_OBJ);
            
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
        }
        
        return $respuesta;
    }
          public function todasPreguntasFrecuentes($idtipo){
                        $respuesta=[];
    try {
            $db = conexion::getConnect();//Aqui se conecta a la base de datos
               // $consulta =$db->prepare("SELECT i.id, i.nombre, i.modelo, i.marca, i.descripcion, i.cantidad, i.precio, ci.nombre AS categoria, cs.nombre AS subcategoria, i.image, e.nombre AS estado FROM tbl_productos i INNER JOIN tbl_categorias ci ON i.id_categoria = ci.id INNER JOIN tbl_subcategorias cs ON i.id_subcategoria = cs.id INNER JOIN tbl_estados e ON i.estado = e.id ORDER BY id");
           $consulta =$db->prepare("SELECT * FROM base_PreguntasFrecuentes where idTipoPregunta= :id order by ORDEN");
           $consulta->bindValue(':id', $idtipo);
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
    public function tiposPreguntas(){
                          $respuesta=[];
    try {
            $db = conexion::getConnect();//Aqui se conecta a la base de datos
               // $consulta =$db->prepare("SELECT i.id, i.nombre, i.modelo, i.marca, i.descripcion, i.cantidad, i.precio, ci.nombre AS categoria, cs.nombre AS subcategoria, i.image, e.nombre AS estado FROM tbl_productos i INNER JOIN tbl_categorias ci ON i.id_categoria = ci.id INNER JOIN tbl_subcategorias cs ON i.id_subcategoria = cs.id INNER JOIN tbl_estados e ON i.estado = e.id ORDER BY id");
           $consulta =$db->prepare("SELECT distinct * FROM base_TipoPreguntaFrecuente order by orden");
           //$consulta->bindValue(':id', $idCategoria);
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
    public function consultarOfertas(){
                             $respuesta=[];
    try {
            $db = conexion::getConnect();//Aqui se conecta a la base de datos
               // $consulta =$db->prepare("SELECT i.id, i.nombre, i.modelo, i.marca, i.descripcion, i.cantidad, i.precio, ci.nombre AS categoria, cs.nombre AS subcategoria, i.image, e.nombre AS estado FROM tbl_productos i INNER JOIN tbl_categorias ci ON i.id_categoria = ci.id INNER JOIN tbl_subcategorias cs ON i.id_subcategoria = cs.id INNER JOIN tbl_estados e ON i.estado = e.id ORDER BY id");
           $consulta =$db->prepare("SELECT * FROM OfertaTemporizada where activo=1");
           //$consulta->bindValue(':id', $idCategoria);
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
    public function consultarMarcas(){
    $respuesta=[];
    try {
            $db = conexion::getConnect();//Aqui se conecta a la base de datos
               // $consulta =$db->prepare("SELECT i.id, i.nombre, i.modelo, i.marca, i.descripcion, i.cantidad, i.precio, ci.nombre AS categoria, cs.nombre AS subcategoria, i.image, e.nombre AS estado FROM tbl_productos i INNER JOIN tbl_categorias ci ON i.id_categoria = ci.id INNER JOIN tbl_subcategorias cs ON i.id_subcategoria = cs.id INNER JOIN tbl_estados e ON i.estado = e.id ORDER BY id");
           $consulta =$db->prepare("select * from store_Brands");
           //$consulta->bindValue(':id', $idCategoria);
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
    public function consultarMetodos(){
        
               $respuesta=[];
    try {
            $db = conexion::getConnect();
           $consulta =$db->prepare("select * from [store_PaymentType] where estado = 1 order by id desc");
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
    public function consultarPromociones(){
        $respuesta=[];
    try {
            $db = conexion::getConnect();//Aqui se conecta a la base de datos
               // $consulta =$db->prepare("SELECT i.id, i.nombre, i.modelo, i.marca, i.descripcion, i.cantidad, i.precio, ci.nombre AS categoria, cs.nombre AS subcategoria, i.image, e.nombre AS estado FROM tbl_productos i INNER JOIN tbl_categorias ci ON i.id_categoria = ci.id INNER JOIN tbl_subcategorias cs ON i.id_subcategoria = cs.id INNER JOIN tbl_estados e ON i.estado = e.id ORDER BY id");
           $consulta =$db->prepare("select * from [dbo].[promociones]");
           //$consulta->bindValue(':id', $idCategoria);
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
    public function consultarOfertaActiva(){
         $respuesta=[];
    try {
            $db = conexion::getConnect();//Aqui se conecta a la base de datos
               // $consulta =$db->prepare("SELECT i.id, i.nombre, i.modelo, i.marca, i.descripcion, i.cantidad, i.precio, ci.nombre AS categoria, cs.nombre AS subcategoria, i.image, e.nombre AS estado FROM tbl_productos i INNER JOIN tbl_categorias ci ON i.id_categoria = ci.id INNER JOIN tbl_subcategorias cs ON i.id_subcategoria = cs.id INNER JOIN tbl_estados e ON i.estado = e.id ORDER BY id");
           $consulta =$db->prepare("select top 1 * from [dbo].[promociones] where estado = 1 order by ID desc");
           //$consulta->bindValue(':id', $idCategoria);
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
    public function insertarOferta($nombrefinalImagen,$nombre,$descripcion,$estado){
                try {
            $db = conexion::getConnect();
            $consulta=$db->prepare("INSERT INTO [dbo].[promociones] values(:nombre,:descripcion,:rutaImagen,:estado)");
            
             $db->beginTransaction(); //inicia la transaccion
            $consulta->bindValue(':nombre', $nombre);
            $consulta->bindValue(':rutaImagen', $nombrefinalImagen);
            $consulta->bindValue(':descripcion', $descripcion);
            $consulta->bindValue(':estado', $estado);
            $consulta->execute();
         $respuesta=$db->commit();

            
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
           
        }
        
      return $respuesta;
    }
    public function actualizarOferta($imagen,$nombre,$descripcion,$estado,$id){
               try {
                   $AddToQuery = '';
                   
                   if($imagen!=''){
                     $AddToQuery=  'rutaImagen = :rutaImagen,';
                   }
            $db = conexion::getConnect();
          
            $consulta=$db->prepare("UPDATE [dbo].[promociones] SET nombre = :nombre, descripcion = :descripcion,".$AddToQuery." estado = :estado where ID = :id");
            
             $db->beginTransaction(); //inicia la transaccion
            $consulta->bindValue(':nombre', $nombre);
            $consulta->bindValue(':descripcion', $descripcion);
            if($imagen!=''){
                     $consulta->bindValue(':rutaImagen', $imagen);
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
    
    public function borrarPromo($idPromo){
        $response = '';
        try {
            
            $db = conexion::getConnect();
            $consulta = $db->prepare("DELETE FROM [dbo].[promociones] WHERE ID =:id");
            $consulta->bindValue(':id', $idPromo);
            $response=$consulta->execute();
            
        } catch (PDOException $e) { //captura en caso de error de proceso db
            echo "se ha presentado un error " . $e->getMessage(); //muestra el mensaje de error.
            $db->rollBack(); //en caso de error, elimina las transacciones que se han realizado
            throw $e;
            $response=0;
        }
        return $response;
}
    public function getGeneralShippingCost(){
        $respuesta=[];
        try {
                $db = conexion::getConnect();//Aqui se conecta a la base de datos
                   // $consulta =$db->prepare("SELECT i.id, i.nombre, i.modelo, i.marca, i.descripcion, i.cantidad, i.precio, ci.nombre AS categoria, cs.nombre AS subcategoria, i.image, e.nombre AS estado FROM tbl_productos i INNER JOIN tbl_categorias ci ON i.id_categoria = ci.id INNER JOIN tbl_subcategorias cs ON i.id_subcategoria = cs.id INNER JOIN tbl_estados e ON i.estado = e.id ORDER BY id");
               $consulta =$db->prepare("select top 1 generalShipping from [dbo].[store_StoreConfiguration] order by ID desc");
               //$consulta->bindValue(':id', $idCategoria);
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
