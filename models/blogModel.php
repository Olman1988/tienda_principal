<?php

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
            $consulta = $db->prepare("SELECT 
                [id]
                ,[pregunta]
                ,[contenido]
                ,[idTipoPregunta]
                ,[orden]
            FROM base_PreguntasFrecuentes  WHERE id = :id");
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
    public function insertBlog(){

    }
    /**
     * 
     * 
     */
    public function updateBlog(){

    }
    /**
     * 
     * 
     */
    public function deleteBlog(){

    }
}
?>