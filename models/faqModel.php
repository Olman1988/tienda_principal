<?php
class faqModel{
    public function getFaqById($ID){
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
            $consulta->bindValue(':id', $ID);
            $consulta->execute();
            $resultado= $consulta->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
        }

        return $resultado;
    }

    public function consultarFAQ(){
        $respuesta=[];

        try {
            $db = conexion::getConnect();//Aqui se conecta a la base de datos
            $consulta =$db->prepare(
                "SELECT 
                    [id]
                    ,[pregunta]
                    ,contenido
                    ,[idTipoPregunta]
                    ,[orden]
                FROM [base_PreguntasFrecuentes] order by orden asc"
            );
            $consulta->execute();
            
            foreach($consulta->fetchAll(PDO::FETCH_ASSOC) as $value){
                $respuesta[] = $value;
            }
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
        }
        
        return $respuesta;
    }

    public function insertarFAQ($pregunta, $contenido){
        try {
            $db = conexion::getConnect();
            $consulta=$db->prepare("INSERT INTO [dbo].[base_PreguntasFrecuentes](pregunta, contenido, idTipoPregunta,orden)"
                    . "VALUES (:pregunta,:contenido,:idTipoPregunta,:orden)");
            
            $db->beginTransaction(); //inicia la transaccion
            $consulta->bindValue(':pregunta', $pregunta);
            $consulta->bindValue(':contenido', $contenido);
            $consulta->bindValue(':idTipoPregunta', 1);
            $consulta->bindValue(':orden', 1);
            
            $consulta->execute();
            
            $respuesta=$db->commit();
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
        }
        
        return $respuesta;
    }

    public function modificarFAQ($pregunta, $contenido, $id){
        try {
            $db = conexion::getConnect();
            $consulta=$db->prepare("UPDATE [dbo].[base_PreguntasFrecuentes] SET pregunta=:pregunta, contenido=:contenido WHERE id = :id");
            $db->beginTransaction(); //inicia la transaccion
            $consulta->bindValue(':pregunta', $pregunta);
            $consulta->bindValue(':contenido', $contenido);
            $consulta->bindValue(':id', $id);
            $consulta->execute();
            
            $respuesta=$db->commit();
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
        }
        
        return $respuesta;  
    }
 
    public function borrarFAQ($id){
        $response = '';
        try {
            $db = conexion::getConnect();
            $consulta = $db->prepare("DELETE FROM [dbo].[base_PreguntasFrecuentes] WHERE id =:id");
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