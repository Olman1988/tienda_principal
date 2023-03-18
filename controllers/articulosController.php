<?php
if(isset($_POST['action'])){
   require_once '../models/articulosModel.php'; 

}else {
   require_once 'models/articulosModel.php'; 
}

class articulosController{
    public function __construct() {
        
        }
        public function todosArticulosPorCategoria($idCategoria){
            $consultaArticulos=new articulosModel();
            $respuestaArticulos=$consultaArticulos->todosArticulosPorCategoria($idCategoria);
            
            return $respuestaArticulos;
            
        }
         public function todosImagenesPorId($idArticulo){
            $consultaArticulos=new articulosModel();
            $respuestaArticulos=$consultaArticulos->todosImagenesPorId($idArticulo);
            
            return $respuestaArticulos;
            
        }
        public function articuloPorId($idArticulo){
            $consultaArticulo=new articulosModel();
            $respuestaArticulo=$consultaArticulo->articuloPorId($idArticulo);
            if(!empty($respuestaArticulo)){
               $respuestaAtributos  =  $consultaArticulo->atributosEspecialesPorArticulo($idArticulo);
               $respuestaAtributosGrupo=[];
               if(!empty($respuestaAtributos)){
                   $respuestaAtributosGrupo = $consultaArticulo->atributosEspecialesPorGrupo($respuestaAtributos['idGrupo']);
                   $counter = 0;
                    $respuestaDetalle=[];
                    foreach ($respuestaAtributosGrupo as $valueAtributos) {
                        $respuestaAtributosGrupo[$counter]['Detalles'] = $consultaArticulo->detalleAtributosEspeciales($valueAtributos['idAtributoEspecial']);
                      //  $respuestaDetalle[] = $consultaArticulo->detalleAtributosEspeciales($valueAtributos['idAtributoEspecial']);
                        $counter++;    
                    }
                } 
                require_once"views/productos/productoPrincipal.php";
            } else {
                
                 echo "<script>Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'No fue posible mostrar los datos, intente nuevamente!',
                            footer: '',

                        })
                        
                        window.setTimeout(function () {history.back()}, 2000)</script>";
                
            }
            
        }
        public function articuloPorIdAdmin($idArticulo){
            $consultaArticulo=new articulosModel();
            $respuestaArticulo=$consultaArticulo->articuloPorIdAdmin($idArticulo);
            return $respuestaArticulo;
        }
        public function articuloForIdForCart($idArticulo){
            $consultaArticulo=new articulosModel();
            $respuestaArticulo=$consultaArticulo->articuloPorIdAdmin($idArticulo);
            return $respuestaArticulo;
        }
        public function articulosDestacados(){
            $consultaArticulo=new articulosModel();
            $respuestaArticulo=$consultaArticulo->articulosDestacados();
             if($respuestaArticulo!=0 && COUNT($respuestaArticulo)>0){
                 require_once "views/principal/destacados.php";
             }
            
        }
          public function buscadorArticulos($buscar){
               $buscadores = addslashes($buscar);
            $buscadorArray=explode(" ", $buscadores); 

        $articulos= new articulosModel();
        
        $respuestaArticulos=[];
        for($i=0;$i<count($buscadorArray);$i++){
           $respuestaArticulos[]=$articulos->buscadorArticulos($buscadorArray[$i]);
           //echo count($respuestaArticulos);
        }
        
        $respuestaArticulos = array_map("unserialize", array_unique(array_map("serialize", $respuestaArticulos)));
        require_once 'views/productos/resultadosBusqueda.php';
        }
       
        
       public function servicios(){
            $consultaServicio=new articulosModel();
            $respuestaServicio=$consultaServicio->servicios();
             require_once 'views/principal/servicios.php';
        }
        public function serviciosPrincipal(){
            $consultaServicio=new articulosModel();
            $respuestaServicio=$consultaServicio->servicios();
             require_once 'views/principal/serviciosPrincipal.php';
        }
        public function todosServicios(){
            $consultaServicio=new articulosModel();
            $respuestaServicio=$consultaServicio->servicios();
            
            return $respuestaServicio;
        }
        public function atributosEspecialesPorArticulo($idArticulo){
        $atributos = new articulosModel();
        $respuestaAtributos = $atributos-> atributosEspecialesPorArticulo($idArticulo);
        return $respuestaAtributos;
       }
       public function atributosEspecialesPorGrupo($idGrupo){
        $atributos = new articulosModel();
        $respuestaAtributosPorGrupo = $atributos-> atributosEspecialesPorGrupo($idGrupo);
        return $respuestaAtributosPorGrupo;
       }
       
       public function detalleAtributosEspeciales($idDetalles){
          $atributosEspeciales = new articulosModel();
        $respuestaDetalleAtributos = $atributosEspeciales-> detalleAtributosEspeciales($idDetalles);
        return $respuestaDetalleAtributos; 
        
       }
        
        public function insertarArticulo($nombre,$descripcion,$estado,$categoria,$precio,$esServicio,$mejorComentario,$masVendido,$destacado,$productoNuevo,$nombrefinal,$disponibleCotizacion,$disponibleCompra,$cantidadMinima,$sku,$tax,$taxRequired,$littleDescription,$taxIncluded){
            if(isset($_POST['action'])){
                require_once '../config/conexion.php'; 

            }
            $producto = new articulosModel();
            $respuestaProducto = $producto ->insertarArticulo($nombre,$descripcion,$estado,$categoria,$precio,$esServicio,$mejorComentario,$masVendido,$destacado,$productoNuevo,$nombrefinal,$disponibleCotizacion,$disponibleCompra,$cantidadMinima,$sku,$tax,$taxRequired,$littleDescription,$taxIncluded);
        return $respuestaProducto;
           
        }
        
        public function modificarArticulo($nombre,$descripcion,$estado,$categoria,$precio,$esServicio,$mejorComentario,$masVendido,$destacado,$productoNuevo,$nombrefinal,$disponibleCotizacion,$disponibleCompra,$IDProduct,$cantidadMinima,$sku,$tax,$taxRequired,$littleDescription,$taxIncluded){
   
             if(isset($_POST['action'])){
                require_once '../config/conexion.php'; 

            }
            $producto = new articulosModel();
           $respuestaProducto = $producto ->modificarArticulo($nombre,$descripcion,$estado,$categoria,$precio,$esServicio,$mejorComentario,$masVendido,$destacado,$productoNuevo,$nombrefinal,$disponibleCotizacion,$disponibleCompra,$IDProduct,$cantidadMinima,$sku,$tax,$taxRequired,$littleDescription,$taxIncluded);
       
           return $respuestaProducto;
           
        }
        
        public function codeGenerator() {
                  $code=  strtoupper(uniqid());
                  return $code;
        }
        
        public function borrarPromo($idPromo){
            if(isset($_POST['action'])){
               require_once '../config/conexion.php'; 
            }
       $consultarPromos = new articulosModel();
        $respuestaPromociones = $consultarPromos ->borrarPromo($idPromo);
        return $respuestaPromociones;
}
public function imagenPorID($id){
            if(isset($_POST['action'])){
                require_once '../config/conexion.php'; 

            }
            $articulo = new articulosModel();
            $respuestaImagen = $articulo ->imagenPorID($id);
        return $respuestaImagen;
        }
        public function insertarImagen($ID,$nombrefinal){
             if(isset($_POST['action'])){
                require_once '../config/conexion.php'; 

            }
            $articulo = new articulosModel();
            $respuestaImagen = $articulo ->insertarImagen($ID,$nombrefinal);
        return $respuestaImagen;
        }
        public function updateImagen($ID,$nombrefinal){
            if(isset($_POST['action'])){
                require_once '../config/conexion.php'; 

            }
            $articulo = new articulosModel();
            $respuestaImagen = $articulo ->updateImagen($ID,$nombrefinal);
        return $respuestaImagen;
        }
        
        public function deleteImage($idImagen){
            if(isset($_POST['action'])){
                require_once '../config/conexion.php'; 

            }
            $articulo = new articulosModel();
            $respuestaImagen = $articulo ->deleteImage($idImagen);
            return $respuestaImagen;
        }
        public function SKUExist($sku){
           if(isset($_POST['action'])){
                require_once '../config/conexion.php'; 

            }
            $articulo = new articulosModel();
            $respuestaSKU = $articulo ->SKUExist($sku);
            return $respuestaSKU; 
        }
        public function SKUExistByID($sku,$IDProduct){
            if(isset($_POST['action'])){
                require_once '../config/conexion.php'; 

            }
            $articulo = new articulosModel();
            $respuestaSKU = $articulo ->SKUExistByID($sku,$IDProduct);
            return $respuestaSKU; 
        }
        
         
    }
    
   if(isset($_POST['action'])){
   switch ($_POST['action']) {
       case "deleteImagen":
           $idImagen = !empty($_POST['idImagen'])? filter_var($_POST['idImagen'],FILTER_SANITIZE_STRING):false;
           $imagen =  new articulosController();
           $respImagen['status'] = $imagen->deleteImage($idImagen);
           
           if($respImagen['status']){
               $respImagen['msn'] = 'Producto eliminado con éxito';
           }else {
               $respImagen['msn'] = 'Hubo un error al eliminar la imagen, intente nuevamente';
           }
           $respImagen['msn'] = 'Producto eliminado con éxito';
           header('Content-Type: application/json');
           echo json_encode($respImagen);
           
           break;
       case "action-add-image":
           $nombrefinal = '';
           $archivo = '';
           if(isset($_FILES['file']['name'])){
               $archivo = $_FILES['file']['name'];
           } else {
               $archivo=null;
           }
           $promo= new articulosController();
           $idgen=$promo->codeGenerator();
           $ID = !empty($_POST['id'])? filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT):false;
           if (isset($archivo) && $archivo != "" && $ID) {
           
           $tipo = $_FILES['file']['type'];
           $tamano = $_FILES['file']['size'];
           $temp = $_FILES['file']['tmp_name'];
           if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000000))) {
               $errorimg = true;
            }else {
                $nombrefinal = $idgen.$archivo;
                if (!is_dir('../images/shop/products/')) {
                        mkdir('../images/shop/products/', 0777, true);
                    }
                    if(file_exists('../images/shop/products/' . $nombrefinal)){
                        unlink('../images/shop/products/' . $nombrefinal);
                    } else {
                        if (move_uploaded_file($temp, '../images/shop/products/'.$nombrefinal)) {
                    chmod('../images/shop/products/'.$nombrefinal, 0777);
                    
                }else {
                    $errorimg = true;
                }
                    }
            }
       
           }
           $nombrefinal = "/images/shop/products/".$nombrefinal;
           $articulo= new articulosController();
            $respuestaInsertar = $articulo-> insertarImagen($ID,$nombrefinal);    
            if($respuestaInsertar){
                echo"<script>Swal.fire('Elemento guardado con éxito!', '', 'success');";
                echo"window.setTimeout(function () {window.location.href = './?seccion=products'}, 2000)</script>";
                
            }else {
                echo "<script>Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'No fue posible eliminar los datos, intente nuevamente!',
                            footer: '',

                        })";
                echo"window.setTimeout(function () {window.location.href = './?seccion=products&&action=add'}, 2000)</script>";
            }
           break;
       case "action-edit-image":
           $nombrefinal = '';
           $archivo = '';
           if(isset($_FILES['file']['name'])){
               $archivo = $_FILES['file']['name'];
           } else {
               $archivo=null;
           }
           $promo= new articulosController();
           $idgen=$promo->codeGenerator();
           $ID = !empty($_POST['id'])? filter_var($_POST['id'],FILTER_SANITIZE_STRING):false;
           $provisionalName = !empty($_POST['filenameImg'])? $_POST['filenameImg']:false;
           if (isset($archivo) && $archivo != "" && $ID) {
           if(isset($_FILES['file']['name'])&&$_FILES['file']['name']!=''){
                
                $archivo = $_FILES['file']['name'];
                $tipo = $_FILES['file']['type'];
                $tamano = $_FILES['file']['size'];
                $temp = $_FILES['file']['tmp_name'];
                if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000000))) {
                    $errorimg = true;
                 }else {
                $nombrefinal = $idgen.$archivo;
                if (!is_dir('../images/shop/products/')) {
                        mkdir('../images/shop/products/', 0777, true);
                    }
                    if(file_exists('../images/shop/products/' . $nombrefinal)){
                        
                        unlink('../images/shop/products/' . $nombrefinal);
                   
                    } else {
                        
                       
                   
                        if (move_uploaded_file($temp, '../images/shop/products/'.$nombrefinal)) {
                    chmod('../images/shop/products/'.$nombrefinal, 0777);
                    
                        }else {
                            $errorimg = true;
                        }
                        
                    }
                }
            } else {
                $nombrefinal = $provisionalName;
            }
       
           }
           $nombrefinal = "/images/shop/products/".$nombrefinal;
           $articulo= new articulosController();
            $respuestaInsertar = $articulo-> updateImagen($ID,$nombrefinal);    
            if($respuestaInsertar){
                echo"<script>Swal.fire('Elemento guardado con éxito!', '', 'success');";
                echo"window.setTimeout(function () {window.location.href = './?seccion=products'}, 2000)</script>";
                
            }else {
                echo "<script>Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'No fue posible eliminar los datos, intente nuevamente!',
                            footer: '',

                        })
                        
                        window.setTimeout(function () {history.back()}, 2000)</script>";
            }
           break;
       case 'agregar':
           $archivo;
           $observacion;
           $validacion = true;
           $promo= new articulosController();
           $idgen=$promo->codeGenerator();
           $nombrefinal = '';
           if(isset($_FILES['file']['name'])){
               $archivo = $_FILES['file']['name'];
           } else {
               $archivo=null;
           }
         
            $nombre = !empty($_POST['nombre'])? filter_var($_POST['nombre'],FILTER_SANITIZE_STRING):'';
            $descripcion = !empty($_POST['descripcion'])? filter_var($_POST['descripcion'],FILTER_SANITIZE_STRING):'';
            $estado = !empty($_POST['estado'])&&$_POST['estado']!=-1? filter_var($_POST['estado'],FILTER_SANITIZE_NUMBER_INT):0;
            $categoria = !empty($_POST['categoria'])&&$_POST['categoria']!=-1? filter_var($_POST['categoria'],FILTER_SANITIZE_NUMBER_INT):0;
            $precio = !empty($_POST['precio'])? filter_var($_POST['precio'], FILTER_SANITIZE_NUMBER_INT):0;
            $esServicio = !empty($_POST['esServicio'])? 1:0;
            $productoNuevo= !empty($_POST['productoNuevo'])? 1:0;
            $mejorComentario = !empty($_POST['mejorComentario'])? 1:0;
            $masVendido = !empty($_POST['masVendido'])? 1:0;
            $disponibilidad = !empty($_POST['disponibleCompraCotizacion'])? filter_var($_POST['disponibleCompraCotizacion'],FILTER_SANITIZE_STRING):'';
            $destacado = !empty($_POST['destacado'])? 1:0;
            $cantidadMinima = !empty($_POST['cantidadMinima'])? filter_var($_POST['cantidadMinima'], FILTER_SANITIZE_NUMBER_INT):0;
            $sku  = !empty($_POST['sku'])? filter_var($_POST['sku'],FILTER_SANITIZE_STRING):'';
            $tax = !empty($_POST['tax'])? filter_var($_POST['tax'], FILTER_SANITIZE_NUMBER_INT):0;
            $taxRequired = !empty($_POST['taxRequired'])? filter_var($_POST['taxRequired'], FILTER_SANITIZE_NUMBER_INT):0;
            $littleDescription = !empty($_POST['littledescription'])? filter_var($_POST['littledescription'],FILTER_SANITIZE_STRING):'';
            $taxIncluded = !empty($_POST['taxIncluded'])? 1:0;
            $validateTax = true;
            if($taxRequired==1){
                if($tax<=0){
                   $validateTax = false; 
                }
            }
            $SKUExist = false;
            $respSKU = Array();
            $consultaArticulo = new articulosController();
            if($sku!=''){
                $respSKU = $consultaArticulo->SKUExist($sku);
                
                if(is_array($respSKU)&&count($respSKU)>0){
                    $SKUExist = true;
                } else {
                    $SKUExist = false;
                }
            }
            
            if(!$SKUExist){
                if (isset($archivo) && $archivo != "" && $nombre &&$categoria) {
                     if (isset($archivo) && $archivo != "" ) {
                    $tipo = $_FILES['file']['type'];
                    $tamano = $_FILES['file']['size'];
                    $temp = $_FILES['file']['tmp_name'];
                    if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000000))) {
                        $errorimg = true;
                     }else {
                         $nombrefinal = $idgen.$archivo;
                         if (!is_dir('../images/shop/products/')) {
                                 mkdir('../images/shop/products/', 0777, true);
                             }
                             if(file_exists('../images/shop/products/' . $nombrefinal)){
                                 unlink('../images/shop/products/' . $nombrefinal);
                             } else {
                                 if (move_uploaded_file($temp, '../images/shop/products/'.$nombrefinal)) {
                             chmod('../images/shop/products/'.$nombrefinal, 0777);

                         }else {
                             $errorimg = true;
                         }
                             }
                     }
                } 
                     $disponibleCotizacion= 0;
                     $disponibleCompra = 0;

                     if($disponibilidad=='cotizacion'){
                         $disponibleCotizacion = 1;
                     }
                     if($disponibilidad=='compra'){
                         $disponibleCompra = 1;
                     }
                     $nombrefinal = "/images/shop/products/".$nombrefinal;

                     $respuestaInsertar = $consultaArticulo-> insertarArticulo($nombre,$descripcion,$estado,$categoria,$precio,$esServicio,$mejorComentario,$masVendido,$destacado,$productoNuevo,$nombrefinal,$disponibleCotizacion,$disponibleCompra,$cantidadMinima,$sku,$tax,$taxRequired,$littleDescription,$taxIncluded);    
                     if($respuestaInsertar){
                         echo"<script>Swal.fire('Elemento guardado con éxito!', '', 'success');";
                         echo"window.setTimeout(function () {window.location.href = './?seccion=products'}, 2000)</script>";

                     }else {
                        echo "<script>Swal.fire({
                                     icon: 'error',
                                     title: 'Oops...',
                                     text: 'No fue posible agregar los datos, verifique que los datos son correctos!',
                                     footer: '',

                                 })

                                 window.setTimeout(function () {history.back()}, 2000)</script>";
                     }
                     } else {
                          echo "<script>Swal.fire({
                                     icon: 'error',
                                     title: 'Oops...',
                                     text: 'No fue posible agregar los datos, intente nuevamente!',
                                     footer: '',

                                 })

                                 window.setTimeout(function () {history.back()}, 2000)</script>";
                     }
                } else {
                     echo "<script>Swal.fire({
                                     icon: 'error',
                                     title: 'Oops...',
                                     text: 'SKU ingresado ya existe, intente con otro SKU',
                                     footer: '',

                                 })

                                 window.setTimeout(function () {history.back()}, 2000)</script>";
                }     
           
           break;
       case 'modificar':
        $archivo;
           $observacion;
           $validacion = true;
           $promo= new articulosController();
           $idgen=$promo->codeGenerator();
           $nombrefinal = '';
          
           $nombre = !empty($_POST['nombre'])? $_POST['nombre']:false;
            $descripcion = !empty($_POST['descripcion'])? $_POST['descripcion']:false;
            $estado = !empty($_POST['estado'])&&$_POST['estado']!=-1? $_POST['estado']:false;
            $categoria = !empty($_POST['categoria'])&&$_POST['categoria']!=-1? $_POST['categoria']:false;
            $precio = !empty($_POST['precio'])? $_POST['precio']:0;
           
            $esServicio = !empty($_POST['esServicio'])? 1:0;
            $productoNuevo= !empty($_POST['productoNuevo'])? 1:0;
            $mejorComentario = !empty($_POST['mejorComentario'])? 1:0;
            $masVendido = !empty($_POST['masVendido'])? 1:0;
            $disponibilidad = !empty($_POST['disponibleCompraCotizacion'])? $_POST['disponibleCompraCotizacion']:false;
            $destacado = !empty($_POST['destacado'])? 1:0;
            $IDProduct = !empty($_POST['IDProduct'])? $_POST['IDProduct']:false;
            $cantidadMinima = $_POST['cantidadMinima']<1? $_POST['cantidadMinima']:1;
            $cantidadMinima = !empty($_POST['cantidadMinima'])? $_POST['cantidadMinima']:false;
            
            $provisionalName = !empty($_POST['filenameImg'])? $_POST['filenameImg']:false;
            $sku  = !empty($_POST['sku'])? filter_var($_POST['sku'],FILTER_SANITIZE_STRING):'';
            $tax = !empty($_POST['tax'])? filter_var($_POST['tax'], FILTER_SANITIZE_NUMBER_INT):0;
            $taxRequired = !empty($_POST['taxRequired'])? filter_var($_POST['taxRequired'], FILTER_SANITIZE_NUMBER_INT):0;
            $littleDescription = !empty($_POST['littledescription'])? filter_var($_POST['littledescription'],FILTER_SANITIZE_STRING):'';
            $taxIncluded = !empty($_POST['taxIncluded'])? 1:0;
            $validateTax = true;
            if($taxRequired==1){
                if($tax<=0){
                   $validateTax = false; 
                }
            }
             $consultaArticulo = new articulosController();
            $SKUExist = false;
            $respSKU = Array();
            if($sku!=''){
                $respSKU = $consultaArticulo->SKUExistByID($sku,$IDProduct);
                if(is_array($respSKU)&&count($respSKU)>0){
                    $SKUExist = true;
                } else {
                    $SKUExist = false;
                }
            }
            
            if(isset($_FILES['file']['name'])&&$_FILES['file']['name']!=''){
                
                $archivo = $_FILES['file']['name'];
                   $tipo = $_FILES['file']['type'];
                $tamano = $_FILES['file']['size'];
                $temp = $_FILES['file']['tmp_name'];
                if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000000))) {
                    $errorimg = true;
                 }else {
                $nombrefinal = $idgen.$archivo;
                if (!is_dir('../images/shop/products/')) {
                        mkdir('../images/shop/products/', 0777, true);
                      
                    }

                    
                    if(file_exists('../images/shop/products/' . $nombrefinal)){
                        
                        unlink('../images/shop/products/' . $nombrefinal);
                   
                    } else {
                        
                       
                   
                        if (move_uploaded_file($temp, '../images/shop/products/'.$nombrefinal)) {
                    chmod('../images/shop/products/'.$nombrefinal, 0777);
                    
                }else {
                    $errorimg = true;
                }
                        
                    }
                
                
            }
            } else {
                $nombrefinal = $provisionalName;
            }
        if(!$SKUExist){
            if(isset($IDProduct)&&$IDProduct!=''){
                
                 $disponibleCotizacion= 0;
            $disponibleCompra = 0;
            
            if($disponibilidad=='cotizacion'){
                $disponibleCotizacion = 1;
            }
            if($disponibilidad=='compra'){
                $disponibleCompra = 1;
            }
            $nombrefinal = "/images/shop/products/".$nombrefinal;
           
            
            $respuestaInsertar = $consultaArticulo-> modificarArticulo($nombre,$descripcion,$estado,$categoria,$precio,$esServicio,$mejorComentario,$masVendido,$destacado,$productoNuevo,$nombrefinal,$disponibleCotizacion,$disponibleCompra,$IDProduct,$cantidadMinima,$sku,$tax,$taxRequired,$littleDescription,$taxIncluded);
            
           
            if($respuestaInsertar){
                echo"<script>Swal.fire('Elemento modificado con éxito!', '', 'success');";
                echo"window.setTimeout(function () {window.location.href = './?seccion=products'}, 2000)</script>";
                
            }else {
               echo "<script>Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'No fue posible eliminar los datos, intente nuevamente!',
                            footer: '',

                        })
                        
                        window.setTimeout(function () {history.back()}, 2000)</script>";
            }
            } else {
               echo "<script>Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'No fue posible eliminar los datos, intente nuevamente!',
                            footer: '',

                        })
                        
                        window.setTimeout(function () {history.back()}, 2000)</script>";
            }
        } else {
             echo "<script>Swal.fire({
                                     icon: 'error',
                                     title: 'Oops...',
                                     text: 'SKU ingresado ya existe, intente con otro SKU',
                                     footer: '',

                                 })
                                 window.setTimeout(function () {history.back()}, 2000)</script>";
        } 
           break;
             case "borrar":
            $borrarPromo = new articulosController();
            $respuestaPromo=$borrarPromo -> borrarPromo($_POST['idPromo']);
            echo $respuestaPromo;
            break;
       default:
           break;
   }
   }


    

