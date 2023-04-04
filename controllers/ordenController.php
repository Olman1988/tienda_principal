<?php
require_once'../config/conexion.php';
if(isset($_SESSION)){
    
} else {
   session_start(); 
}
class ordenController{
    public function insertarEnvioOrdenEntrega($code,$shipping,$provincia='',$canton='',$distrito='',$direccion=''){
        
            try {
            $db = conexion::getConnect();
            $consulta=$db->prepare("INSERT INTO OrdenEntrega (idOrden,shippingMethod,deliveryTime,handlingFee,address,provincia,canton,distrito) values(:id,:shippingMethod,:deliveryTime,:handlingFee,:address,:provincia,:canton,:distrito)");
            
             $db->beginTransaction(); //inicia la transaccion
           
             
            $consulta->bindValue(':id',$code);
            $consulta->bindValue(':shippingMethod',$shipping);
            $consulta->bindValue(':deliveryTime', date('Y-m-d H:i:s'));
            $consulta->bindValue(':handlingFee',1);
            $consulta->bindValue(':address', $direccion);
            $consulta->bindValue(':provincia', $provincia);
            $consulta->bindValue(':canton',$canton);
            $consulta->bindValue(':distrito', $distrito);
            $consulta->execute();
         $respuesta=$db->commit();

            
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
        }
      return $respuesta; 
        
    }
    
    public function insertarOrdenNueva($code,$codeSmall,$total){
        date_default_timezone_set('America/Costa_Rica');
            try {
            $db = conexion::getConnect();


          
            $consulta=$db->prepare("INSERT INTO Orden (id,userName,codigo,fecha,idPaymentType,Total) values(convert(uniqueidentifier,:id),:userName,:codigo,:fecha,:idPaymentType,:Total)");
            
             $db->beginTransaction(); //inicia la transaccion
           
             
            $consulta->bindValue(':id',$code);
            $consulta->bindValue(':userName', $_SESSION['email']);
            $consulta->bindValue(':codigo', $codeSmall);
            $consulta->bindValue(':fecha', date("Y-m-d H:i:s"));
           
            $consulta->bindValue(':idPaymentType',$_SESSION['orden']['tipoPago']);
            $consulta->bindValue(':Total', $total);
      
            

            $consulta->execute();
         $respuesta=$db->commit();

            
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
           
        }
        
      return $respuesta;
        
    }
    public function calcularTotal(){
        $total=0;
        $parcial=0;
        foreach ($_SESSION['carrito'] as $value) {
            $parcial=$value['art_PrecioUnitario']*$value['cantidad'];
            $total=$total+$parcial;
        }
        return $total;
    }
      public function codeGenerator() {
 
 $code  = vsprintf('%s%s-%s-4000-8%.3s-%s%s%s0',str_split(dechex( microtime(true) * 1000 ) . bin2hex( random_bytes(8) ),4));
   return $code;
      }
      public function codeGeneratorSmallCode(){
                
 $code=  strtoupper(uniqid());
 return $code;
      }
      public function insertarDetalles($code,$idArticulo, $cantidad,$nombre, $imagen, $idDetalle, $precio,$total,$personalizacion,$impTotal,$subTotal){
         $precio=!empty($precio)?$precio:1;
         $personalizacion = json_encode($personalizacion);
            try {
            $db = conexion::getConnect();
            $consulta=$db->prepare("INSERT INTO OrdenDetalle (idOrden,art_CodigoArticulo,cantidad,art_Descripcion,rutaImagen,id,price,totalPrice,taxAmount,personalizacion) "
                    . "values(convert(uniqueidentifier,:idOrden),:idarticulo,:cantidad,:nombre,:imagen,convert(uniqueidentifier,:idDetalle),:precio,:total,:taxamount,:personalizacion)");
            
             $db->beginTransaction(); //inicia la transaccion
           
             
            $consulta->bindValue(':idOrden',$code);
            $consulta->bindValue(':idarticulo', $idArticulo);
            $consulta->bindValue(':cantidad', $cantidad);
            $consulta->bindValue(':imagen', $imagen);
           $consulta->bindValue(':idDetalle', $idDetalle);
           $consulta->bindValue(':precio', $subTotal);
            $consulta->bindValue(':nombre', $nombre);
            $consulta->bindValue(':total', $total);        
            $consulta->bindValue(':personalizacion', $personalizacion);
            $consulta->bindValue(':taxamount', $impTotal);
            $consulta->bindValue(':total', ($subTotal+$impTotal));
            $consulta->execute();
             
         $respuesta=$db->commit();

            
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
           $consulta =$db->prepare("SELECT od.cantidad,od.art_Descripcion,od.price, od.taxAmount,od.totalPrice,od.personalizacion FROM OrdenDetalle od INNER JOIN Orden o ON o.id= od.idOrden INNER JOIN Articulo a ON od.art_CodigoArticulo = a.art_CodigoArticulo where o.codigo"
                   . "='$code'");
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
        public function updateOrden($impuestosFinal,$subtotalFinal,$totalFinal,$respCosto,$id){
//            $respCostoN = isset($respCosto[0]['generalShipping'])?($respCosto[0]['generalShipping']):0;
//            
//            
//            $impuestosFinal = $impuestosFinal+($respCostoN*0.13);
//            $subtotalFinal = $subtotalFinal;
//            $totalFinal = $impuestosFinal+$subtotalFinal+$respCostoN;
            $resp = false;
            try {
            $db = conexion::getConnect();
            $consulta=$db->prepare("UPDATE Orden SET Total = :totalFinal, TotalTax = :impuestosFinal, SubTotal = :subtotalFinal, Shipping = :shipping where id = :id");
            
             $db->beginTransaction(); //inicia la transaccion
           
            $consulta->bindValue(':totalFinal',$totalFinal); 
            $consulta->bindValue(':impuestosFinal',$impuestosFinal);
            $consulta->bindValue(':subtotalFinal',$subtotalFinal);
            $consulta->bindValue(':shipping',intval($respCosto)); 
            $consulta->bindValue(':id',strtoupper($id));
            $consulta->execute();
         $respuesta=$db->commit();
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
           
        }
        
      return $respuesta;
        }
    
}

 if(isset($_POST['action']) &&$_POST['action']== 'mostrarDetalles'){
        switch ($_POST['action']) {
            case "mostrarDetalles":
                $ordenes= new ordenController();
                $respuestaCode = $ordenes->mostrarDetalles($_POST['code']);
                
                $respuesta = json_encode($respuestaCode);
                echo $respuesta;
                break;

            default:
                break;
        }
    } 