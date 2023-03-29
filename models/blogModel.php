<?php
require_once '../config/conexion.php';
class blogModel{
    
    public function consultarBlogs(){
        $respuesta=[];
        try {
            $db = conexion::getConnect();//Aqui se conecta a la base de datos
            $consulta =$db->prepare("SELECT 
                    [id]
                    ,[title]
                    ,[photo]
                    ,[status]
                    ,[description]
                    FROM blog_Post ORDER BY updateDate DESC");
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
    public function consultarBlog($id){
        $resultado = [];
        try {
            $db = conexion::getConnect();
            $consulta =$db->prepare("SELECT 
                    [id]
                    ,[title]
                    ,[photo]
                    ,[status]
                    ,[content]
                    ,[description]
                FROM blog_Post  WHERE id = :id");
            $consulta->bindValue(':id', $id);
            $consulta->execute();
            $resultado= $consulta->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
        }

        return $resultado;
    }
    /**
     * 
     * 
     */
    public function insertBlog($title, $content, $description, $photo){
        try {
            $db = conexion::getConnect();
            $consulta=$db->prepare("INSERT INTO [dbo].[blog_Post] (
                     [title]
                    ,[content]
                    ,[status]
                    ,[authorId]
                    ,[author]
                    ,[idCategory]
                    ,[AppId]
                    ,[description]
                    ,[acceptComments]
                    ,[photo]
                    ,[codigo]
                )VALUES(
                    :title,
                    :content,
                    :status,
                    :authorId,
                    :author,
                    :idCategory,
                    :AppId,
                    :description,
                    :acceptComments,
                    :photo,
                    :codigo
                )");
            
            $db->beginTransaction(); //inicia la transaccion
            $consulta->bindValue(':title', $title);
            $consulta->bindValue(':content', $content);
            $consulta->bindValue(':status', 'Activo');
            $consulta->bindValue(':authorId', '');
            $consulta->bindValue(':author', '');
            $consulta->bindValue(':idCategory', 1);
            $consulta->bindValue(':AppId', '');
            $consulta->bindValue(':description', $description);
            $consulta->bindValue(':acceptComments', 1);
            $consulta->bindValue(':photo', $photo);
            $consulta->bindValue(':codigo', '');
            $consulta->execute();
            $respuesta=$db->commit();

            
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
    public function updateBlog($id, $titulo, $descripcion, $nombrefinal, $contenido, $status){
        try {
            $db = conexion::getConnect();
            $consulta=$db->prepare("UPDATE [dbo].[blog_Post]
                        SET 
                         [title] =:title
                        ,[content] =:content
                        ,[status] =:status
                        ,[updateDate] =getdate()
                        ,[description] =:description
                        ,[photo] =:photo
                    WHERE id =:id");
            $db->beginTransaction(); //inicia la transaccion
            $consulta->bindValue(':id', $id);
            $consulta->bindValue(':title', $titulo);
            $consulta->bindValue(':content', $contenido);
            $consulta->bindValue(':status', $status);
            $consulta->bindValue(':description', $descripcion);
            $consulta->bindValue(':photo', $nombrefinal);
            $consulta->execute();
            
            $respuesta=$db->commit();
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
    public function deleteBlog($id){
        $response = [];
        try {
            
            $db = conexion::getConnect();
            $consulta = $db->prepare("DELETE FROM [dbo].[blog_Post] WHERE id =:id");
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
?>