<?php
require_once '../config/conexion.php';
class cotizacionModel{
public function crearCotizacion($code,$email,$nombre,$apellidos,$DNI,$provincia,$canton,$distrito,$direccion,$telefono){
 
        try {
            $db = conexion::getConnect(); //inicia la conexion
            $db->beginTransaction(); //inicia la transaccion
            $consulta = $db->prepare("insert into [atheneal_AdminBordados].[Cotizacion] (idCliente,nombre,apellido,DNI,provincia,canton,distrito,"
                    . "direccion,email,telefono,fecha,codigo)"
                    . " values (:idCliente,:nombre,:apellido,:DNI,:provincia,:canton,:distrito,:direccion,:email,"
                    . ":telefono,:fecha,:codigo)");
           
            $consulta->bindValue(':idCliente',1);
            $consulta->bindValue(':nombre', $nombre);
            $consulta->bindValue(':apellido', $apellidos);
            $consulta->bindValue(':DNI', $DNI);
            $consulta->bindValue(':provincia', $provincia);
            $consulta->bindValue(':canton',$canton);
            $consulta->bindValue(':distrito', $distrito);
            $consulta->bindValue(':direccion', $direccion);
            $consulta->bindValue(':email', $email);
            $consulta->bindValue(':telefono', $telefono);
            $consulta->bindValue(':fecha', date("Y-m-d"));
            $consulta->bindValue(':codigo', $code);
          
           
//           idCotizacion int IDENTITY(1,1) PRIMARY KEY,
//   idCliente int not null,
//  nombre varchar(255) not null,
//   apellido varchar(255),
//   DNI varchar(255) not null,
//    provincia varchar(255),
//   canton varchar(255),
//  distrito varchar(255),
//   direccion varchar(255),
//   email varchar(255),
//    telefono varchar(255),
//   fecha date,
//   codigo varchar(255)

            $consulta->execute(); //ejecuta la consulta
            
            $response=$db->commit(); //verifica la ejecucion
           
            
        } catch (Exception $e) { //captura en caso de error de proceso db
            echo "se ha presentado un error " . $e->getMessage();
            $db->rollBack();
            throw $e;
            $response=false;
        } 
        return $response;
}
public function crearDetalles($idProducto,$cantidad,$code,$file=1,$observacion=1,$personalizacion=''){
             try {
                $db = conexion::getConnect(); //inicia la conexion
                $db->beginTransaction(); //inicia la transaccion
                $consulta = $db->prepare("insert into [atheneal_AdminBordados].[detallesCotizacion] (idProducto,cantidad,codCotizacion,observacion,archivos,personalizacion)"
                        . " values (:idProducto,:cantidad,:codCotizacion,:observacion,:archivos,:personalizacion)");

                $consulta->bindValue(':idProducto',$idProducto);
                $consulta->bindValue(':cantidad', $cantidad);
                $consulta->bindValue(':codCotizacion', $code);
                $consulta->bindValue(':archivos', $file);
                $consulta->bindValue(':observacion', $observacion);
                   $consulta->bindValue(':personalizacion',$personalizacion);


                $consulta->execute(); //ejecuta la consulta

                $response=$db->commit(); //verifica la ejecucion


            } catch (Exception $e) { //captura en caso de error de proceso db
                echo "se ha presentado un error " . $e->getMessage();
                $db->rollBack();
                throw $e;
                $response=false;
            } 
            return $response;
    }
  public function getDataQuoteByCode($code){
        $respuesta=[];
        try {
                $db = conexion::getConnect();
               $consulta =$db->prepare("SELECT a.art_Descripcion AS Producto, dc.cantidad AS Cantidad, dc.observacion AS Nota, dc.archivos AS Files FROM [atheneal_AdminBordados].[detallesCotizacion] dc INNER JOIN [dbo].[Articulo] a ON dc.idProducto = a.art_CodigoArticulo WHERE dc.codCotizacion = '$code'");
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
