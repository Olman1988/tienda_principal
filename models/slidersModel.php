<?php
class slidersModel{
    public function getAllSlidersAdmin(){
         $respuesta=[];
        try {
                $db = conexion::getConnect();
                $consulta =$db->prepare("SELECT * FROM HomeTypeSlider");
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
    public function getAllSliders(){
         $respuesta=[];
        try {
                $db = conexion::getConnect();
                $consulta =$db->prepare("SELECT * FROM HomeTypeSlider order by 'order'");
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
    public function insertSlider($title,$url,$order,$image){
        try {
            $db = conexion::getConnect();
            $consulta=$db->prepare("INSERT INTO [dbo].[HomeTypeSlider] (sliderPath,url,[order])"
                    . "VALUES (:image,:url,:order)");
            
            $db->beginTransaction(); //inicia la transaccion
           // $consulta->bindValue(':title', $title);
            $consulta->bindValue(':url', $url);
            $consulta->bindValue(':order', intval($order));
            $consulta->bindValue(':image', $image);
            $consulta->execute();
         $respuesta=$db->commit();

            
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
           
        }
        
      return $respuesta;
    }
    
    public function getSliderById($id){
        $respuesta;
    try {
            $db = conexion::getConnect();//Aqui se conecta a la base de datos
               // $consulta =$db->prepare("SELECT i.id, i.nombre, i.modelo, i.marca, i.descripcion, i.cantidad, i.precio, ci.nombre AS categoria, cs.nombre AS subcategoria, i.image, e.nombre AS estado FROM tbl_productos i INNER JOIN tbl_categorias ci ON i.id_categoria = ci.id INNER JOIN tbl_subcategorias cs ON i.id_subcategoria = cs.id INNER JOIN tbl_estados e ON i.estado = e.id ORDER BY id");
           $consulta =$db->prepare("SELECT * FROM [dbo].[HomeTypeSlider] where id = $id");
         
            $consulta->execute();
            
            $respuesta=$consulta->fetch(PDO::FETCH_OBJ);
            
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
        }
        return $respuesta;
    }
    public function updateSlider($title,$order,$url,$imagen,$id){
        try {
            $db = conexion::getConnect();
            $consulta=$db->prepare("UPDATE [dbo].[HomeTypeSlider] SET sliderPath=:sliderPath,[order] =:order, url =:url WHERE id =:id");
            $db->beginTransaction(); //inicia la transaccion
            $consulta->bindValue(':id', $id);
            $consulta->bindValue(':sliderPath', $imagen);
            $consulta->bindValue(':url', $url);
            $consulta->bindValue(':order', $order); 
            $consulta->execute();
           $respuesta=$db->commit();

            
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
           
        }
        
      return $respuesta; 
    }
    public function deleteSlider($id){
         $response;
        try {
            $db = conexion::getConnect();
            $consulta = $db->prepare("DELETE FROM [dbo].[HomeTypeSlider] WHERE id =:id");
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
