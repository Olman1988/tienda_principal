<?php

class categoriasModel{
    public function __construct() {
        
    }
    public function todasCategoriasAdmin(){
        $respuesta=[];
    try {
            $db = conexion::getConnect();//Aqui se conecta a la base de datos
               // $consulta =$db->prepare("SELECT i.id, i.nombre, i.modelo, i.marca, i.descripcion, i.cantidad, i.precio, ci.nombre AS categoria, cs.nombre AS subcategoria, i.image, e.nombre AS estado FROM tbl_productos i INNER JOIN tbl_categorias ci ON i.id_categoria = ci.id INNER JOIN tbl_subcategorias cs ON i.id_subcategoria = cs.id INNER JOIN tbl_estados e ON i.estado = e.id ORDER BY id");
           $consulta =$db->prepare("SELECT * FROM Categorias");
           
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
	  public function todasCategoriasDestacadas(){
        $respuesta=[];
    try {
            $db = conexion::getConnect();//Aqui se conecta a la base de datos
               // $consulta =$db->prepare("SELECT i.id, i.nombre, i.modelo, i.marca, i.descripcion, i.cantidad, i.precio, ci.nombre AS categoria, cs.nombre AS subcategoria, i.image, e.nombre AS estado FROM tbl_productos i INNER JOIN tbl_categorias ci ON i.id_categoria = ci.id INNER JOIN tbl_subcategorias cs ON i.id_subcategoria = cs.id INNER JOIN tbl_estados e ON i.estado = e.id ORDER BY id");
           $consulta =$db->prepare("SELECT * FROM Categorias where destacada = 1 and visible =1");
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
    public function todasCategorias(){
        $respuesta=[];
    try {
            $db = conexion::getConnect();//Aqui se conecta a la base de datos
               // $consulta =$db->prepare("SELECT i.id, i.nombre, i.modelo, i.marca, i.descripcion, i.cantidad, i.precio, ci.nombre AS categoria, cs.nombre AS subcategoria, i.image, e.nombre AS estado FROM tbl_productos i INNER JOIN tbl_categorias ci ON i.id_categoria = ci.id INNER JOIN tbl_subcategorias cs ON i.id_subcategoria = cs.id INNER JOIN tbl_estados e ON i.estado = e.id ORDER BY id");
           $consulta =$db->prepare("SELECT * FROM Categorias where visible=1");
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
   public function consultarCategoriaPadre($idCategoria){
       
          $respuesta=[];
    try {
            $db = conexion::getConnect();//Aqui se conecta a la base de datos
               // $consulta =$db->prepare("SELECT i.id, i.nombre, i.modelo, i.marca, i.descripcion, i.cantidad, i.precio, ci.nombre AS categoria, cs.nombre AS subcategoria, i.image, e.nombre AS estado FROM tbl_productos i INNER JOIN tbl_categorias ci ON i.id_categoria = ci.id INNER JOIN tbl_subcategorias cs ON i.id_subcategoria = cs.id INNER JOIN tbl_estados e ON i.estado = e.id ORDER BY id");
           $consulta =$db->prepare("SELECT * FROM Categorias where categoriaPadre= :id and visible =1");
           $consulta->bindValue(':id', $idCategoria);
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
   
    public function todasSubCategorias(){
        $respuesta=[];
    try {
            $db = conexion::getConnect();//Aqui se conecta a la base de datos
               // $consulta =$db->prepare("SELECT i.id, i.nombre, i.modelo, i.marca, i.descripcion, i.cantidad, i.precio, ci.nombre AS categoria, cs.nombre AS subcategoria, i.image, e.nombre AS estado FROM tbl_productos i INNER JOIN tbl_categorias ci ON i.id_categoria = ci.id INNER JOIN tbl_subcategorias cs ON i.id_subcategoria = cs.id INNER JOIN tbl_estados e ON i.estado = e.id ORDER BY id");
           $consulta =$db->prepare("SELECT * FROM Categorias visible = 1");
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
    public function todasCategoriasPadre(){
        $respuesta = [];
        try {
            $db = conexion::getConnect();//Aqui se conecta a la base de datos
               // $consulta =$db->prepare("SELECT i.id, i.nombre, i.modelo, i.marca, i.descripcion, i.cantidad, i.precio, ci.nombre AS categoria, cs.nombre AS subcategoria, i.image, e.nombre AS estado FROM tbl_productos i INNER JOIN tbl_categorias ci ON i.id_categoria = ci.id INNER JOIN tbl_subcategorias cs ON i.id_subcategoria = cs.id INNER JOIN tbl_estados e ON i.estado = e.id ORDER BY id");
           $consulta =$db->prepare("SELECT distinct c.categoriaPadre FROM Categorias c inner join Categorias a on c.categoriaPadre = a.cat_CodigoCategoria where c.categoriaPadre!=-1 and a.visible = 1");
           // $consulta =$db->prepare("update Categorias set categoriaPadre=-1 where categoriaPadre=2 ");
            $consulta->execute();
            
            foreach($consulta->fetchAll(PDO::FETCH_ASSOC) as $value){
                    $respuesta[]=$value;
                }
            
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
        }
        
          if(!empty($respuesta)){
            return $respuesta;
        }else {
            
          return 0;  
        }
    }
    
    public function todasCategoriasParaMenu(){
        $respuesta=[];
    try {
            $db = conexion::getConnect();//Aqui se conecta a la base de datos
               // $consulta =$db->prepare("SELECT i.id, i.nombre, i.modelo, i.marca, i.descripcion, i.cantidad, i.precio, ci.nombre AS categoria, cs.nombre AS subcategoria, i.image, e.nombre AS estado FROM tbl_productos i INNER JOIN tbl_categorias ci ON i.id_categoria = ci.id INNER JOIN tbl_subcategorias cs ON i.id_subcategoria = cs.id INNER JOIN tbl_estados e ON i.estado = e.id ORDER BY id");
           $consulta =$db->prepare("SELECT * FROM Categorias where menu=1 AND (categoriaPadre=-1 or  categoriaPadre=0)and visible = 1 and menu =1");
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
    public function todasCategoriasServicios(){
              $respuesta=[];
    try {
            $db = conexion::getConnect();//Aqui se conecta a la base de datos
               // $consulta =$db->prepare("SELECT i.id, i.nombre, i.modelo, i.marca, i.descripcion, i.cantidad, i.precio, ci.nombre AS categoria, cs.nombre AS subcategoria, i.image, e.nombre AS estado FROM tbl_productos i INNER JOIN tbl_categorias ci ON i.id_categoria = ci.id INNER JOIN tbl_subcategorias cs ON i.id_subcategoria = cs.id INNER JOIN tbl_estados e ON i.estado = e.id ORDER BY id");
           $consulta =$db->prepare("SELECT DISTINCT c.cat_Descripcion,c.cat_CodigoCategoria FROM Articulo a INNER JOIN Categorias c ON a.cat_CodigoCategoria_FK=c.cat_CodigoCategoria"
                   . " where a.esServicio = 1");
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
    public function allCategoriesForAdmin(){
            $respuesta=[];
    try {
            $db = conexion::getConnect();//Aqui se conecta a la base de datos
               // $consulta =$db->prepare("SELECT i.id, i.nombre, i.modelo, i.marca, i.descripcion, i.cantidad, i.precio, ci.nombre AS categoria, cs.nombre AS subcategoria, i.image, e.nombre AS estado FROM tbl_productos i INNER JOIN tbl_categorias ci ON i.id_categoria = ci.id INNER JOIN tbl_subcategorias cs ON i.id_subcategoria = cs.id INNER JOIN tbl_estados e ON i.estado = e.id ORDER BY id");
           $consulta =$db->prepare("SELECT *,(SELECT cat_Descripcion FROM Categorias WHERE cat_CodigoCategoria = c.categoriaPadre) AS Padre FROM Categorias c");
           
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
    public function getCategoryById($id){
          $resultado;
    try {
            $db = conexion::getConnect();
            $consulta = $db->prepare("SELECT c.*,(SELECT cat_Descripcion FROM Categorias WHERE cat_CodigoCategoria = c.categoriaPadre) AS Padre FROM Categorias c WHERE c.cat_CodigoCategoria = :id");
            $consulta->bindValue(':id', $id);
            $consulta->execute();
            $resultado= $consulta->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
        }
        return $resultado;
    }
    
    public function updateCategory($nombre,$categoriaPadre,$imagen,$esServicio,$visible,$menu,$destacado,$id){
         try {
            $db = conexion::getConnect();
            $consulta=$db->prepare("UPDATE [dbo].[Categorias] SET cat_Descripcion =:nombre, rutaImagen = :imagen,destacada =:destacado,visible =:visible,menu =:menu,categoriaPadre =:categoriaPadre,esServicio =:esServicio WHERE cat_CodigoCategoria =:id");
            $db->beginTransaction(); //inicia la transaccion
            $consulta->bindValue(':id', $id);
             $consulta->bindValue(':nombre', $nombre);
            $consulta->bindValue(':categoriaPadre', $categoriaPadre);
            $consulta->bindValue(':imagen', $imagen);
             $consulta->bindValue(':esServicio', $esServicio);
            $consulta->bindValue(':visible', $visible);
            $consulta->bindValue(':menu', $menu);
            $consulta->bindValue(':destacado', $destacado);
            $consulta->execute();
           $respuesta=$db->commit();

            
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
           
        }
        
      return $respuesta;  
    }
    
    public function insertCategory($nombre,$categoriaPadre,$imagen,$esServicio,$visible,$menu,$destacado){
        try {
            $db = conexion::getConnect();
            $consulta=$db->prepare("INSERT INTO [dbo].[Categorias] (cat_Descripcion,rutaImagen,destacada,visible,menu,categoriaPadre,esServicio)"
                    . "VALUES (:nombre,:imagen,:destacado,:visible,:menu,:categoriaPadre,:esServicio)");
            
            $db->beginTransaction(); //inicia la transaccion
            $consulta->bindValue(':nombre', $nombre);
            $consulta->bindValue(':categoriaPadre', $categoriaPadre);
            $consulta->bindValue(':imagen', $imagen);
            $consulta->bindValue(':esServicio', $esServicio);
            $consulta->bindValue(':visible', $visible);
            $consulta->bindValue(':menu', $menu);
            $consulta->bindValue(':destacado', $destacado);
            $consulta->execute();
         $respuesta=$db->commit();

            
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
           
        }
        
      return $respuesta;
    }
    
    public function deleteCategory($id){
         $response;
        try {
            
            $db = conexion::getConnect();
            $consulta = $db->prepare("DELETE FROM [dbo].[Categorias] WHERE cat_CodigoCategoria =:id");
            $consulta->bindValue(':id', $id);
            $response=$consulta->execute();
        } catch (PDOException $e) { //captura en caso de error de proceso db
            echo "se ha presentado un error " . $e->getMessage(); //muestra el mensaje de error.
            $db->rollBack(); //en caso de error, elimina las transacciones que se han realizado
            throw $e;
            $response=0;
        }
        return $response;
    }
    
}
