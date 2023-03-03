<?php

class articulosModel{
    public function todosArticulosPorCategoria($idCategoria){
        $respuesta=[];
    try {
            $db = conexion::getConnect();//Aqui se conecta a la base de datos
               // $consulta =$db->prepare("SELECT i.id, i.nombre, i.modelo, i.marca, i.descripcion, i.cantidad, i.precio, ci.nombre AS categoria, cs.nombre AS subcategoria, i.image, e.nombre AS estado FROM tbl_productos i INNER JOIN tbl_categorias ci ON i.id_categoria = ci.id INNER JOIN tbl_subcategorias cs ON i.id_subcategoria = cs.id INNER JOIN tbl_estados e ON i.estado = e.id ORDER BY id");
           $consulta =$db->prepare("SELECT * FROM Articulo where cat_CodigoCategoria_FK=$idCategoria AND activo = 1 ORDER BY sku");
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
    public function getArticulosByCategoriaID($idCategoria){
         $respuesta=[];
    try {
            $db = conexion::getConnect();//Aqui se conecta a la base de datos
               // $consulta =$db->prepare("SELECT i.id, i.nombre, i.modelo, i.marca, i.descripcion, i.cantidad, i.precio, ci.nombre AS categoria, cs.nombre AS subcategoria, i.image, e.nombre AS estado FROM tbl_productos i INNER JOIN tbl_categorias ci ON i.id_categoria = ci.id INNER JOIN tbl_subcategorias cs ON i.id_subcategoria = cs.id INNER JOIN tbl_estados e ON i.estado = e.id ORDER BY id");
           $consulta =$db->prepare("SELECT * FROM Articulo where cat_CodigoCategoria_FK=$idCategoria");
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
    public function todosArticulosAdmin(){
          $respuesta=[];
    try {
            $db = conexion::getConnect();//Aqui se conecta a la base de datos
               // $consulta =$db->prepare("SELECT i.id, i.nombre, i.modelo, i.marca, i.descripcion, i.cantidad, i.precio, ci.nombre AS categoria, cs.nombre AS subcategoria, i.image, e.nombre AS estado FROM tbl_productos i INNER JOIN tbl_categorias ci ON i.id_categoria = ci.id INNER JOIN tbl_subcategorias cs ON i.id_subcategoria = cs.id INNER JOIN tbl_estados e ON i.estado = e.id ORDER BY id");
           $consulta =$db->prepare("SELECT a.*,c.cat_Descripcion as categoria FROM Articulo a INNER JOIN Categorias c ON a.cat_CodigoCategoria_FK=c.cat_CodigoCategoria ");
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
    public function todosArticulos(){
        $respuesta=[];
    try {
            $db = conexion::getConnect();//Aqui se conecta a la base de datos
               // $consulta =$db->prepare("SELECT i.id, i.nombre, i.modelo, i.marca, i.descripcion, i.cantidad, i.precio, ci.nombre AS categoria, cs.nombre AS subcategoria, i.image, e.nombre AS estado FROM tbl_productos i INNER JOIN tbl_categorias ci ON i.id_categoria = ci.id INNER JOIN tbl_subcategorias cs ON i.id_subcategoria = cs.id INNER JOIN tbl_estados e ON i.estado = e.id ORDER BY id");
           $consulta =$db->prepare("SELECT a.*,c.cat_Descripcion as categoria FROM Articulo a INNER JOIN Categorias c ON a.cat_CodigoCategoria_FK=c.cat_CodigoCategoria WHERE a.activo = 1 ORDER BY a.sku");
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
    public function articuloPorId($idArticulo){
        $resultado;
    try {
            $db = conexion::getConnect();
            $consulta = $db->prepare("SELECT a.*,c.cat_Descripcion as categoria,c.cat_CodigoCategoria,c.cat_Descripcion from [dbo].[Articulo] a INNER JOIN [dbo].[Categorias] c ON a.cat_CodigoCategoria_FK=c.cat_CodigoCategoria where a.art_CodigoArticulo=:id AND a.activo = 1");
            $consulta->bindValue(':id', $idArticulo);
            $consulta->execute();
            $resultado= $consulta->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
        }
        return $resultado;
}
public function articuloPorIdAdmin($idArticulo){
        $resultado;
    try {
            $db = conexion::getConnect();
            $consulta = $db->prepare("SELECT a.*,c.cat_Descripcion as categoria,c.cat_CodigoCategoria,c.cat_Descripcion from [dbo].[Articulo] a INNER JOIN [dbo].[Categorias] c ON a.cat_CodigoCategoria_FK=c.cat_CodigoCategoria where a.art_CodigoArticulo=:id");
            $consulta->bindValue(':id', $idArticulo);
            $consulta->execute();
            $resultado= $consulta->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
        }
        return $resultado;
}
public function articulosDestacados(){
                 $respuesta=[];
    try {
            $db = conexion::getConnect();//Aqui se conecta a la base de datos
               // $consulta =$db->prepare("SELECT i.id, i.nombre, i.modelo, i.marca, i.descripcion, i.cantidad, i.precio, ci.nombre AS categoria, cs.nombre AS subcategoria, i.image, e.nombre AS estado FROM tbl_productos i INNER JOIN tbl_categorias ci ON i.id_categoria = ci.id INNER JOIN tbl_subcategorias cs ON i.id_subcategoria = cs.id INNER JOIN tbl_estados e ON i.estado = e.id ORDER BY id");
           $consulta =$db->prepare("SELECT * FROM Articulo where (masVendido=1 OR nuevo=1 OR mejorComentario=1 OR destacado=1 AND esServicio != 1) AND activo = 1 ORDER BY sku");
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
        public function buscadorArticulos($buscador){
                             $respuesta=[];
    try {
            $db = conexion::getConnect();//Aqui se conecta a la base de datos
               // $consulta =$db->prepare("SELECT i.id, i.nombre, i.modelo, i.marca, i.descripcion, i.cantidad, i.precio, ci.nombre AS categoria, cs.nombre AS subcategoria, i.image, e.nombre AS estado FROM tbl_productos i INNER JOIN tbl_categorias ci ON i.id_categoria = ci.id INNER JOIN tbl_subcategorias cs ON i.id_subcategoria = cs.id INNER JOIN tbl_estados e ON i.estado = e.id ORDER BY id");
           $consulta =$db->prepare("SELECT * FROM Articulo where art_Descripcion like '%$buscador%' or art_Observaciones like '%$buscador%' or descripcionAmpliada like'%$buscador%' AND activo = 1 ORDER BY sku");
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
        public function todosImagenesPorId($idArticulo){
          
            $respuesta=[];
    try {
            $db = conexion::getConnect();//Aqui se conecta a la base de datos
               // $consulta =$db->prepare("SELECT i.id, i.nombre, i.modelo, i.marca, i.descripcion, i.cantidad, i.precio, ci.nombre AS categoria, cs.nombre AS subcategoria, i.image, e.nombre AS estado FROM tbl_productos i INNER JOIN tbl_categorias ci ON i.id_categoria = ci.id INNER JOIN tbl_subcategorias cs ON i.id_subcategoria = cs.id INNER JOIN tbl_estados e ON i.estado = e.id ORDER BY id");
           $consulta =$db->prepare("SELECT * FROM ArticuloImagenes where art_CodigoArticulo = $idArticulo");
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
        public function mostrarDetalles($code){
                      
            $respuesta=[];
    try {
            $db = conexion::getConnect();//Aqui se conecta a la base de datos
               // $consulta =$db->prepare("SELECT i.id, i.nombre, i.modelo, i.marca, i.descripcion, i.cantidad, i.precio, ci.nombre AS categoria, cs.nombre AS subcategoria, i.image, e.nombre AS estado FROM tbl_productos i INNER JOIN tbl_categorias ci ON i.id_categoria = ci.id INNER JOIN tbl_subcategorias cs ON i.id_subcategoria = cs.id INNER JOIN tbl_estados e ON i.estado = e.id ORDER BY id");
           $consulta =$db->prepare("SELECT * FROM OrdenDetalle where art_CodigoArticulo=$code");
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
        
          public function servicios(){
          $respuesta=[];
    try {
            $db = conexion::getConnect();//Aqui se conecta a la base de datos
               // $consulta =$db->prepare("SELECT i.id, i.nombre, i.modelo, i.marca, i.descripcion, i.cantidad, i.precio, ci.nombre AS categoria, cs.nombre AS subcategoria, i.image, e.nombre AS estado FROM tbl_productos i INNER JOIN tbl_categorias ci ON i.id_categoria = ci.id INNER JOIN tbl_subcategorias cs ON i.id_subcategoria = cs.id INNER JOIN tbl_estados e ON i.estado = e.id ORDER BY id");
           $consulta =$db->prepare("SELECT * FROM Articulo where esServicio=1 AND activo = 1 ORDER BY sku");
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
        public function atributosEspecialesPorArticulo($idArticulo){
              $resultado='';
    try {
            $db = conexion::getConnect();//Aqui se conecta a la base de datos
               // $consulta =$db->prepare("SELECT i.id, i.nombre, i.modelo, i.marca, i.descripcion, i.cantidad, i.precio, ci.nombre AS categoria, cs.nombre AS subcategoria, i.image, e.nombre AS estado FROM tbl_productos i INNER JOIN tbl_categorias ci ON i.id_categoria = ci.id INNER JOIN tbl_subcategorias cs ON i.id_subcategoria = cs.id INNER JOIN tbl_estados e ON i.estado = e.id ORDER BY id");
           $consulta =$db->prepare("SELECT * FROM AtributoEspecialGrupoArticulo AEGA INNER JOIN AtributoEspecialGrupo AEG ON AEGA.idGrupo = AEG.id "
                   . "where AEGA.codArticulo = $idArticulo");
            $consulta->execute();
           $resultado= $consulta->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
        }
            
       

        return $resultado;   
            
        }
        
        public function atributosEspecialesPorGrupo($idGrupo){
              $respuestaAtr=[];
    try {
            $db = conexion::getConnect();//Aqui se conecta a la base de datos
               // $consulta =$db->prepare("SELECT i.id, i.nombre, i.modelo, i.marca, i.descripcion, i.cantidad, i.precio, ci.nombre AS categoria, cs.nombre AS subcategoria, i.image, e.nombre AS estado FROM tbl_productos i INNER JOIN tbl_categorias ci ON i.id_categoria = ci.id INNER JOIN tbl_subcategorias cs ON i.id_subcategoria = cs.id INNER JOIN tbl_estados e ON i.estado = e.id ORDER BY id");
           $consulta =$db->prepare("SELECT * FROM AtributoEspecialGrupoAtributo AEGA INNER JOIN AtributoEspecial AE ON AEGA.idAtributoEspecial = AE.id"
                   . " where AEGA.idGrupo = $idGrupo");
            $consulta->execute();
            
            foreach($consulta->fetchAll(PDO::FETCH_ASSOC) as $value){
                    $respuestaAtr[]=$value;
                }
            
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
        }

        return $respuestaAtr;   
            
        }
    public function detalleAtributosEspeciales($idDetalles){
                    $respuestaAtr=[];
    try {
            $db = conexion::getConnect();//Aqui se conecta a la base de datos
               // $consulta =$db->prepare("SELECT i.id, i.nombre, i.modelo, i.marca, i.descripcion, i.cantidad, i.precio, ci.nombre AS categoria, cs.nombre AS subcategoria, i.image, e.nombre AS estado FROM tbl_productos i INNER JOIN tbl_categorias ci ON i.id_categoria = ci.id INNER JOIN tbl_subcategorias cs ON i.id_subcategoria = cs.id INNER JOIN tbl_estados e ON i.estado = e.id ORDER BY id");
           $consulta =$db->prepare("SELECT * FROM AtributoEspecial AE INNER JOIN AtributoEspecialValores AEV ON AE.id = AEV.idAtributoEspecial"
                   . " where AE.id = $idDetalles");
            $consulta->execute();
            
            foreach($consulta->fetchAll(PDO::FETCH_ASSOC) as $value){
                    $respuestaAtr[]=$value;
                }
            
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
        }

        return $respuestaAtr;   
        
    }
     public function insertarArticulo($nombre,$descripcion,$estado,$categoria,$precio,$esServicio,$mejorComentario,$masVendido,$destacado,$productoNuevo,$nombrefinal,$disponibleCotizacion,$disponibleCompra,$cantidadMinima,$sku,$tax,$taxRequired,$littleDescription,$taxIncluded){
           try {
            $db = conexion::getConnect();
            $consulta=$db->prepare("INSERT INTO [dbo].[Articulo] (cat_CodigoCategoria_FK,art_Descripcion,art_PrecioUnitario,art_Minimo,art_Maximo,art_LlevaImpuesto,art_Observaciones,art_PorcentajeIV,destacado,activo,rutaImagen,masVendido,nuevo,mejorComentario,sku,descripcionAmpliada,esServicio,disponibleCompra,disponibleCotizacion,IVAIncluido)"
                    . "VALUES (:categoria,:nombre,:precio,:art_Minimo,:art_Maximo,:art_LlevaImpuesto,:observacion,:tax,:destacado,:estado,:imagen,:masVendido,:productoNuevo,:mejorComentario,:sku,:largedescription,:esServicio,:disponibleCompra,:disponibleCotizacion,:taxIncluded)");
            
             $db->beginTransaction(); //inicia la transaccion
            $consulta->bindValue(':categoria', $categoria);
            $consulta->bindValue(':nombre', $nombre);
            $consulta->bindValue(':precio', $precio);
            $consulta->bindValue(':art_Maximo', 100);
            $consulta->bindValue(':art_LlevaImpuesto', $taxRequired);
            $consulta->bindValue(':observacion', $littleDescription);
            $consulta->bindValue(':destacado', $destacado);
            $consulta->bindValue(':estado', $estado);
            $consulta->bindValue(':imagen', $nombrefinal);
            $consulta->bindValue(':masVendido', $masVendido);
            $consulta->bindValue(':productoNuevo', $productoNuevo);
            $consulta->bindValue(':mejorComentario', $mejorComentario);
            $consulta->bindValue(':esServicio', $esServicio);
            $consulta->bindValue(':disponibleCompra', $disponibleCompra);
            $consulta->bindValue(':disponibleCotizacion', $disponibleCotizacion);
            $consulta->bindValue(':art_Minimo', $cantidadMinima);
            $consulta->bindValue(':sku', $sku);
            $consulta->bindValue(':tax', $tax);
            $consulta->bindValue(':largedescription', $descripcion);
            $consulta->bindValue(':taxIncluded', $taxIncluded);
            
          //$taxIncluded
            $consulta->execute();
            
         $respuesta=$db->commit();

            
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
           
        }
        
      return $respuesta;
    }
    public function modificarArticulo($nombre,$descripcion,$estado,$categoria,$precio,$esServicio,$mejorComentario,$masVendido,$destacado,$productoNuevo,$imagen,$disponibleCotizacion,$disponibleCompra,$IDProduct,$cantidadMinima,$sku,$tax,$taxRequired,$littleDescription,$taxIncluded){
        if($cantidadMinima<1){
               $cantidadMinima = 1;
           }       
        try {
            $db = conexion::getConnect();
            $consulta=$db->prepare("UPDATE [dbo].[Articulo] SET cat_CodigoCategoria_FK=:categoria,art_Descripcion=:nombre,art_PrecioUnitario=:precio,art_Minimo=:art_Minimo,art_Maximo=:art_Maximo,art_LlevaImpuesto=:art_LlevaImpuesto,"
                    . "art_Observaciones=:observacion,art_PorcentajeIV=:tax,destacado=:destacado,activo=:estado,"
                    . "rutaImagen=:imagen,masVendido=:masVendido,nuevo=:productoNuevo,mejorComentario=:mejorComentario,sku = :sku,descripcionAmpliada=:largedescription,esServicio=:esServicio,"
                    . "disponibleCompra=:disponibleCompra,disponibleCotizacion=:disponibleCotizacion,IVAIncluido = :taxIncluded WHERE art_CodigoArticulo = :IDProduct");
             $db->beginTransaction(); //inicia la transaccion
            $consulta->bindValue(':categoria', $categoria);
            $consulta->bindValue(':nombre', $nombre);
            $consulta->bindValue(':precio', $precio);
            $consulta->bindValue(':art_Maximo', 100);
            $consulta->bindValue(':art_LlevaImpuesto', $taxRequired);
            $consulta->bindValue(':observacion', $littleDescription);
            $consulta->bindValue(':destacado', $destacado);
            $consulta->bindValue(':estado', $estado);
            $consulta->bindValue(':imagen', $imagen);
            $consulta->bindValue(':masVendido', $masVendido);
            $consulta->bindValue(':productoNuevo', $productoNuevo);
            $consulta->bindValue(':mejorComentario', $mejorComentario);
            $consulta->bindValue(':esServicio', $esServicio);
            $consulta->bindValue(':disponibleCompra', $disponibleCompra);
            $consulta->bindValue(':disponibleCotizacion', $disponibleCotizacion);
            $consulta->bindValue(':IDProduct', $IDProduct);
            $consulta->bindValue(':art_Minimo', $cantidadMinima);
            $consulta->bindValue(':sku', $sku);
            $consulta->bindValue(':tax', $tax);
            $consulta->bindValue(':largedescription', $descripcion);
            $consulta->bindValue(':taxIncluded', $taxIncluded);
            $consulta->execute();
            
          
         $respuesta=$db->commit();

            
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
           
        }
        
      return $respuesta;  
        
    }
    
        public function borrarPromo($idPromo){
         $response;
        try {
            
            $db = conexion::getConnect();
            $consulta = $db->prepare("DELETE FROM [dbo].[Articulo] WHERE art_CodigoArticulo =:id");
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
    public function insertarImagen($ID,$imagen){
        try {
            $db = conexion::getConnect();
            $consulta=$db->prepare("INSERT INTO [dbo].[ArticuloImagenes] (id, rutaImagen, art_CodigoArticulo, rutaImagenTh)"
                    . "VALUES (NEWID(),'$imagen',$ID,'$imagen')");
             $db->beginTransaction(); //inicia la transaccion
            $consulta->execute();
         $respuesta=$db->commit();

            
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
           
        }
        
      return $respuesta;
    }
    public function imagenPorID($id){
                 $resultado='';
    try {
            $db = conexion::getConnect();//Aqui se conecta a la base de datos
               // $consulta =$db->prepare("SELECT i.id, i.nombre, i.modelo, i.marca, i.descripcion, i.cantidad, i.precio, ci.nombre AS categoria, cs.nombre AS subcategoria, i.image, e.nombre AS estado FROM tbl_productos i INNER JOIN tbl_categorias ci ON i.id_categoria = ci.id INNER JOIN tbl_subcategorias cs ON i.id_subcategoria = cs.id INNER JOIN tbl_estados e ON i.estado = e.id ORDER BY id");
           $consulta =$db->prepare("SELECT ai.*,a.art_Descripcion AS name FROM ArticuloImagenes ai INNER JOIN Articulo a ON ai.art_CodigoArticulo=a.art_CodigoArticulo where ai.id='$id'");
            $consulta->execute();
           $resultado= $consulta->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
        }
        return $resultado;  
    }
    
    public function updateImagen($ID,$imagen){
        $respuesta  = '';
           try {
                 
            $db = conexion::getConnect();
            $consulta=$db->prepare("UPDATE [dbo].[ArticuloImagenes] SET rutaImagen = '$imagen', rutaImagenTh = '$imagen' WHERE id = '$ID'");
             $db->beginTransaction(); //inicia la transaccion
            $consulta->execute();
            $respuesta=$db->commit();
                           } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
           $respuesta = false;
        }
        
      return $respuesta;  
    }
    public function deleteImage($idImagen){
        $response;
        try {
            $db = conexion::getConnect();
            $consulta = $db->prepare("DELETE FROM [dbo].[ArticuloImagenes] WHERE id =:id");
            $consulta->bindValue(':id', $idImagen);
            $response=$consulta->execute();
            
        } catch (PDOException $e) { //captura en caso de error de proceso db
            echo "se ha presentado un error " . $e->getMessage(); //muestra el mensaje de error.
            $db->rollBack(); //en caso de error, elimina las transacciones que se han realizado
            throw $e;
            $response=false;
        }
        return $response;
    }
    public function SKUExist($sku){
             $resultado;
    try {
            $db = conexion::getConnect();
            $consulta = $db->prepare("SELECT * FROM [dbo].[Articulo] WHERE sku =:sku");
            $consulta->bindValue(':sku', $sku);
            $consulta->execute();
            $resultado= $consulta->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
        }
        return $resultado;
    }
    
    public function SKUExistByID($sku,$IDProduct){
                 $resultado;
    try {
            $db = conexion::getConnect();
            $consulta = $db->prepare("SELECT * FROM [dbo].[Articulo] WHERE sku =:sku AND art_CodigoArticulo!=:id");
            $consulta->bindValue(':sku', $sku);
            $consulta->bindValue(':id', $IDProduct);
            $consulta->execute();
            $resultado= $consulta->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
        }
        return $resultado;
    }
}

