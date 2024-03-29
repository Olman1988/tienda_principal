<?php
if(isset($_SESSION)){
    
} else {
   session_start(); 
}
//session_destroy(); 
//unset($_SESSION['carrito']);
//unset($_SESSION['cotizacion']);
class carritoController{
    public function agregarCarrito($idArticulo,$nombre,$imagen,$precio,$impuesto,$radioColor,$radioImg,$listAttribute,$cantidadMinima,$cantidadElegida,$IVAIncluido,$llevaimpuesto){
     if(isset($_SESSION['carrito'])){
         $cont=0;
         foreach($_SESSION['carrito'] as $valueCarrito){
     if($valueCarrito['id']==$idArticulo){
         $_SESSION['carrito'][$cont]['cantidad']=$cantidadElegida;
         $_SESSION['carrito'][$cont]['radioColor'] = $radioColor;
         $_SESSION['carrito'][$cont]['radioImg'] = $radioImg;
         $_SESSION['carrito'][$cont]['listAttribute'] = $listAttribute;
                 return true;
             }
             $cont++;
         }
         
         $nuevoProducto= $_SESSION['carrito'];
     }
     $nuevoarray=array(
          "id" => $idArticulo,
         "nombre" => $nombre,
         "imagen" => $imagen,
         "art_PrecioUnitario"=>$precio,
         "impuesto"=>$impuesto,
         "cantidad"=>1,
         "radioColor"=>$radioColor,
         "radioImg"=>  $radioImg,
         "listAttribute"=>$listAttribute,
         "cantidad"=>$cantidadElegida,
         "cantidadMinima"=>$cantidadMinima,
         "IVAIncluido" =>$IVAIncluido,
         "llevaimpuesto"=>$llevaimpuesto
     );
     
     $nuevoProducto[]=$nuevoarray;
     
   $_SESSION['carrito']=$nuevoProducto;
 
        if(!empty($nuevoProducto)){
            return true;
        } else {
            return false;
        }
    }
    public function validarProductoCotizado($idArticulo){
        $nuevoProductoCotizar=[];
        if(isset($_SESSION['cotizacion'])){
            $cont=0;
            foreach($_SESSION['cotizacion'] as $valueCot){

        if($valueCot['id']==$idArticulo){

            return 3;
            }


            $nuevoProductoCotizar= $_SESSION['cotizacion'];
        }
        return $nuevoProductoCotizar;
        }

    }
    public function agregarCotizacion($idArticulo,$nombre,$imagen,$file,$observacion,$radioColor,$radioImg,$listAttribute,$cantidadMinima,$cantidadElegida){
       $nuevoProductoCotizar=[];
        $nuevoarrayCotizar=array(
          "id" => $idArticulo,
         "nombre" => $nombre,
         "imagen" => $imagen,
         "file"=>$file,
         "observacion"=>$observacion,
         "radioColor"=>$radioColor,
         "radioImg"=>  $radioImg,
         "listAttribute"=>$listAttribute,
            "cantidad"=>$cantidadElegida,
         "cantidadMinima"=>$cantidadMinima
     );
        $_SESSION['cotizarTemporal']=$nuevoarrayCotizar;
     
        $carrito = new carritoController();
        $respuestaValidacion=$carrito->validarProductoCotizado($idArticulo);
        if($respuestaValidacion==3){
         return $respuestaValidacion; 
        } else {
           $nuevoProductoCotizar=$respuestaValidacion;
        }
     
        
        $nuevoProductoCotizar[]= $nuevoarrayCotizar;
        $_SESSION['cotizacion']=$nuevoProductoCotizar;

       if(!empty($nuevoProductoCotizar)){
            return true;
        } else {
            return false;
        }
 
   }
   public function actualizarCotizacion(){
       if(isset($_SESSION['cotizarTemporal'])){
      
           
         $cont=0;
            foreach($_SESSION['cotizacion'] as $valueCot){

                   if($valueCot['id']==$_SESSION['cotizarTemporal']['id']){

                   $_SESSION['cotizacion'][$cont]=$_SESSION['cotizarTemporal'];


                   }
                  $cont++;
            }
         $_SESSION['cotizarTemporal']=[];
          echo 1;
       }    else {
         echo 0;
       }
   }

    public function vaciarCarrito(){
        if(isset($_SESSION['carrito'])){
      unset($_SESSION['carrito']);  
        }
        return true;
    }
    public function vaciarCotizacion(){
        if(isset($_SESSION['cotizacion'])){
          unset($_SESSION['cotizacion']);
        }
        
        return true;
    }
    public function codeGenerator() {
    $code=  strtoupper(uniqid());
      return $code;

   } 
   public function crearCotizacion($code,$email,$nombre,$apellidos,$DNI,$provincia,$canton,$distrito,$direccion,$telefono){
       require_once '../models/cotizacionModel.php';

       $cotizacion= new cotizacionModel();
       $respuestaCotizar=$cotizacion->crearCotizacion($code,$email,$nombre,$apellidos,$DNI,$provincia,$canton,$distrito,$direccion,$telefono);
       return $respuestaCotizar;

   }
   public function crearDetalles($code){
           require_once '../models/cotizacionModel.php';
           $respuesta= new cotizacionModel();
         $resp=false;  
         if(isset($_SESSION['cotizacion'])){
            foreach ($_SESSION['cotizacion'] as $value) {
                $file=null;
                $observacion=null;
                $radioColor;
                $radioImg;
                $listAttribute;
                
                if(isset($value['radioColor']) && !empty($value['radioColor'])){
                    $radioColor=$value['radioColor'];
                } else {
                    $radioColor=false;
                }
                if(isset($value['radioImg']) && !empty($value['radioImg'])){
                   $radioImg=$value['radioImg'];
                } else {
                   $radioImg=false;
                }
                if(isset($value['listAttr']) && !empty($value['listAttr'])){
                $listAttribute=$value['listAttr'];
                } else {
                $listAttribute=false;
                }
                if(isset($value['file'])){
                   $file= $value['file'];
                }
                $personalizacion=array(
                   "radioColor"=>$radioColor,
                   "radioImg"=>  $radioImg,
                   "listAttribute"=>$listAttribute
                );
                if(isset($value['observacion'])){
                   $observacion= $value['observacion'];
                }
                  
                $resp=$respuesta->crearDetalles($value['id'],$value['cantidad'],$code,$file,$observacion,json_encode($personalizacion));
                
            }
         }
       return $resp;
   }

   public function actualizarPrecios($id){
       require_once '../config/conexion.php';
       require_once '../models/articulosModel.php';
       $carrito = new articulosModel();
       $respuesta = $carrito -> articuloPorId($id);
       return $respuesta;
   }

       public function eliminarProductoCotizar($idProducto){
           $arrayCotizacion =[];
           foreach($_SESSION['cotizacion'] as $valueCot){
               
               if($valueCot['id']!=$idProducto){
               $arrayCotizacion[] = $valueCot;
               }
           }
           unset($_SESSION['cotizacion']);
      
           if(count($arrayCotizacion)>0){
               $_SESSION['cotizacion']=$arrayCotizacion;
           }
           if(!count($_SESSION['cotizacion'])>0){
               $this->vaciarCotizacion();
           }
           return 1;
       }
       
       public function removerProductoCarrito($idProducto){
           $arrayCarrito =[];
           foreach($_SESSION['carrito'] as $valueCot){
               if($valueCot['id']!=$idProducto){
               $arrayCarrito[] = $valueCot;
               }
           }
           unset($_SESSION['carrito']);
           if(count($arrayCarrito)>0){
               $_SESSION['carrito']=$arrayCarrito;
           }
           
           return 1;
       }
       public function getDataForCart(){
           //VALIDAR SI EL PRODUCTO EXISTE, ESTA ACTIVO Y LISTO PARA COMPRAR  
           $Result = Array();
           $articuloRequest = new articulosController();
           if(isset($_SESSION['carrito'])){
               foreach ($_SESSION['carrito'] as $index => $valueCarrito) {
                   $respArticuloRequest = $articuloRequest->articuloForIdForCart($valueCarrito['id']);
                   if($valueCarrito['art_PrecioUnitario']!=$respArticuloRequest['art_PrecioUnitario']){
                      $Result['msn'] = "Algunos datos han cambiado, la información será actualizada";
                      $Result['status']= "Change";
                      $_SESSION['carrito'][$index]['art_PrecioUnitario'] = $respArticuloRequest['art_PrecioUnitario'];
                   }
                   if($valueCarrito['cantidadMinima']!=$respArticuloRequest['art_Minimo']){
                      $Result['msn'] = "Algunos datos han cambiado, la información será actualizada";
                      $Result['status']= "Change";
                      $_SESSION['carrito'][$index]['cantidadMinima'] = $respArticuloRequest['art_Minimo'];
                   }
                   if($valueCarrito['impuesto']!=intval($respArticuloRequest['art_PorcentajeIV'])){
                      $Result['msn'] = "Algunos datos han cambiado, la información será actualizada";
                      $Result['status']= "Change";
                      $_SESSION['carrito'][$index]['impuesto'] = intval($respArticuloRequest['art_PorcentajeIV']);
                   }
                   if($valueCarrito['IVAIncluido']!=intval($respArticuloRequest['IVAIncluido'])){
                      $Result['msn'] = "Algunos datos han cambiado, la información será actualizada";
                      $Result['status']= "Change";
                      $_SESSION['carrito'][$index]['IVAIncluido'] = intval($respArticuloRequest['IVAIncluido']);
                   }
                   if($respArticuloRequest['activo']==0){
                       $this->removerProductoCarrito($valueCarrito['id']);
                   }
               }
               
           }
           return $Result;
       }
       public function getDataQuoteByCode($code){
           require_once '../models/cotizacionModel.php';
           $cotizacion= new cotizacionModel();
           $respuestaCotizar=$cotizacion->getDataQuoteByCode($code);
           return $respuestaCotizar;
       }
   }

if(isset($_POST['action'])){
    switch ($_POST['action']) {
        case 'agregarCarrito':
            $impuesto =0;
            $radioColor;
            $radioImg;
            $listAttribute;
            $IVAIncluido = '';
            $cantidadElegidad=0;
            $cantidadMinima = 0;
            $llevaimpuesto = 0;
            if(!is_null($_POST['impuesto'])||!empty($_POST['impuesto'])){
                $impuesto = $_POST['impuesto'];
            }
            if(isset($_POST['radioColor']) && !empty($_POST['radioColor'])){
                $radioColor=$_POST['radioColor'];
            } else {
                $radioColor=false;
            }
            if(isset($_POST['radioImg']) && !empty($_POST['radioImg'])){
               $radioImg=$_POST['radioImg'];
            } else {
               $radioImg=false;
            }
            if(isset($_POST['listAttr']) && !empty($_POST['listAttr'])){
            $listAttribute=$_POST['listAttr'];
            } else {
            $listAttribute=false;
            }
            if(isset($_POST['cantidadMinima']) && !empty($_POST['cantidadMinima'])){
            $cantidadMinima=$_POST['cantidadMinima'];
            } 
            if(isset($_POST['cantidad']) && !empty($_POST['cantidad'])){
            $cantidadElegida=$_POST['cantidad'];
            } 
            if(isset($_POST['IVAIncluido']) && !empty($_POST['IVAIncluido'])){
            $IVAIncluido=$_POST['IVAIncluido'];
            } 
            if(isset($_POST['llevaimpuesto']) && !empty($_POST['llevaimpuesto'])){
            $llevaimpuesto=$_POST['llevaimpuesto'];
            } 
            $idArticulo = filter_var($_POST['idArticulo'], FILTER_SANITIZE_NUMBER_INT);
            $carrito= new carritoController();
            $respuesta=$carrito->agregarCarrito($idArticulo,$_POST['nombre'],$_POST['imagen'],$_POST['precio'],$impuesto,$radioColor,$radioImg,$listAttribute,$cantidadMinima,$cantidadElegida,$IVAIncluido,$llevaimpuesto);
            echo $respuesta;
            break;
        case 'agregarCotizacion':
            $archivo;
            $observacion;
            $radioColor;
            $radioImg;
            $listAttribute;
            $cantidadElegidad=0;
            $cantidadMinima = 0;
            $carrito= new carritoController();
           $idgen=$carrito->codeGenerator();
           $nombrefinal;
           if(isset($_FILES['file']['name'])){
               $archivo = $_FILES['file']['name'];
           } else {
               $archivo=null;
           }
            
           
       if (isset($archivo) && $archivo != "") {
           
           $tipo = $_FILES['file']['type'];
           $tamano = $_FILES['file']['size'];
           $temp = $_FILES['file']['tmp_name'];
           if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")|| strpos($tipo, "pdf")) && ($tamano < 2000000000))) {
               
               $errorimg = true;
            }else {
                $nombrefinal = $idgen.$archivo;
                if (!is_dir('../assets/files/')) {
                        mkdir('../assets/files/', 0777, true);
                    }

                    
                    if(file_exists('../assets/files/' . $nombrefinal)){
                        
                        unlink('../assets/files/' . $nombrefinal);
                         
                    } else {
                   
                        if (move_uploaded_file($temp, '../assets/files/'.$nombrefinal)) {
                    chmod('../assets/files/'.$nombrefinal, 0777);
                    
                }else {
                    $errorimg = true;
                }
                        
                    }
                
                
            }
            
            
       } else {
       $nombrefinal=false;
       }
       if(isset($_POST['observacion']) && !empty($_POST['observacion'])){
           
           $observacion=$_POST['observacion'];
          
       } else {
           $observacion=false;
          
       }
       if(isset($_POST['radioColor']) && !empty($_POST['radioColor'])){
           
           $radioColor=$_POST['radioColor'];
          
       } else {
           $radioColor=false;
          
       }
       if(isset($_POST['radioImg']) && !empty($_POST['radioImg'])){
           
           $radioImg=$_POST['radioImg'];
          
       } else {
           $radioImg=false;
          
       }
       if(isset($_POST['listAttr']) && !empty($_POST['listAttr'])){
           
           $listAttribute=$_POST['listAttr'];
          
       } else {
           $listAttribute=false;
          
       }
        if(isset($_POST['cantidadMinima']) && !empty($_POST['cantidadMinima'])){
            $cantidadMinima=$_POST['cantidadMinima'];
            } 
            if(isset($_POST['cantidad']) && !empty($_POST['cantidad'])){
            $cantidadElegida=$_POST['cantidad'];
            } 
           
            
            $respuesta=$carrito->agregarCotizacion($_POST['idArticulo'],$_POST['nombre'],$_POST['imagen'],$nombrefinal,$observacion,$radioColor,$radioImg,$listAttribute,$cantidadMinima,$cantidadElegida);
            echo $respuesta;
            break;
        case 'actualizarCotizacion':
            $carrito= new carritoController();
            $respuestaActualizarCot=$carrito->actualizarCotizacion();
           
            break;
        case 'vaciarCarrito':
            $carrito= new carritoController();
            $respuesta=$carrito->vaciarCarrito();
            echo $respuesta;
            break;
        case 'vaciarCotizacion':
            $carrito= new carritoController();
            $respuesta=$carrito->vaciarCotizacion();
            echo $respuesta;
            break;
        case 'removerProductoCotizacion':
            
            
            $carrito= new carritoController();
            $respuesta=$carrito->eliminarProductoCotizar($_POST['idProducto']);
            echo $respuesta;
            break;
        case "removerProductoCarrito":
             $carrito= new carritoController();
            $respuesta=$carrito->removerProductoCarrito($_POST['idProducto']);
            echo $respuesta;
            break;
        
         case 'datosCotizar':
             
            $carrito= new carritoController();
             $code=$carrito->codeGenerator();
             //pendiente la validacion de espacios vacios
             $nombre=!empty($_POST['Nombre'])?filter_var($_POST['Nombre'],FILTER_SANITIZE_STRING):'';
             $apellidos=!empty($_POST['Apellidos'])?filter_var($_POST['Apellidos'],FILTER_SANITIZE_STRING):'';
             $DNI=!empty($_POST['Cedula'])?filter_var($_POST['Cedula'],FILTER_SANITIZE_STRING):'';
             $provincia=!empty($_POST['provincia'])?filter_var($_POST['provincia'],FILTER_SANITIZE_STRING):'';
             $canton=!empty($_POST['canton'])?filter_var($_POST['canton'],FILTER_SANITIZE_STRING):'';
             $distrito=!empty($_POST['distrito'])?filter_var($_POST['distrito'],FILTER_SANITIZE_STRING):'';
             $direccion=!empty($_POST['Direccion'])?filter_var($_POST['Direccion'],FILTER_SANITIZE_STRING):'';
             $telefono=!empty($_POST['Telefono'])?filter_var($_POST['Telefono'],FILTER_SANITIZE_NUMBER_INT):'';
             $email=!empty($_POST['Email'])?filter_var($_POST['Email'],FILTER_SANITIZE_EMAIL):'';
             $respDetails = '';
             $resp=[];
             
            if($nombre&&$apellidos&&$DNI&&$provincia&&$canton&&$distrito&&$direccion&&$telefono&&$email){
                $respuesta=$carrito->crearCotizacion($code,$email,$nombre,$apellidos,$DNI,$provincia,$canton,$distrito,$direccion,$telefono);
                if($respuesta){
                   $respDetails=$carrito->crearDetalles($code); 
                }else {
                 $resp['title']="Error al ingresar datos";
                 $resp['msn']="Intente de nuevo mas tarde o contacte al administrador!";
                 $resp['status']=false;
                 }
                 
                if($respDetails){
                    $respCotizacionBusiness='';
                    $cotizacion = new carritoController();
                    $respCotizacion = $cotizacion->getDataQuoteByCode($code);
                    $respCotizacionBusiness = $cotizacion->getDataQuoteByCode($code);
                    require_once '../email/cotizacion.php';
                    $emailSent = new cotizacion();
                    $fullname = $nombre." ".$apellidos;
                    $respEmaiSent = $emailSent->sendEmailQuote($fullname,$email,$code,$respCotizacion);
                    if($respEmaiSent){
                       $respCotizacionBusiness = $emailSent->sendEmailQuoteToBusiness($fullname,$email,$code,$respCotizacion,$DNI,$provincia,$canton,$distrito,$direccion,$telefono);
                    }
                    if($respCotizacionBusiness){
                        $cotizacion->vaciarCotizacion();
                        $resp['title']="Cotizacion Enviada";
                        $resp['msn']="En breve le estaremos contactando!";
                        $resp['status']=true;   
                    } else {
                        $resp['title']="Error al ingresar datos";
                        $resp['msn']="Intente de nuevo mas tarde o contacte al administrador!";
                        $resp['status']=false;
                    }
                 }else {
                 $resp['title']="Error al ingresar datos";
                 $resp['msn']="Intente de nuevo mas tarde o contacte al administrador!";
                 $resp['status']=false;
                 }
             } else {
                 $resp['title']="Error al ingresar datos";
                 $resp['msn']="Hay datos requeridos que no fueron ingresados, ingrese los datos solicitados e intente nuevamente";
                 $resp['status']=false;
             }
             
            
            echo json_encode($resp);
            break;
        case 'datosCarrito':
        $nombre = isset($_POST['Nombre']) ? $_POST['Nombre'] : false;
        $apellido = isset($_POST['Apellidos']) ? $_POST['Apellidos'] : false;
        $direccion = isset($_POST['Direccion']) ? $_POST['Direccion'] : false;
        $DNI = isset($_POST['Cedula']) ? $_POST['Cedula'] : false;
        $email = isset($_POST['Email']) ? $_POST['Email'] : false;
        $telefono = isset($_POST['Telefono']) ? $_POST['Telefono'] : false;
        $provincia = isset($_POST['provincia']) ? $_POST['provincia'] : false;
        $canton = isset($_POST['canton']) ? $_POST['canton'] : false;
        $distrito = isset($_POST['distrito']) ? $_POST['distrito'] : false;
        if($nombre&&$apellido&&$direccion&&$DNI&&$email&&$telefono&&$provincia&&$canton&&$distrito){
        
            $_SESSION['orden']['InfoGeneral']=$_POST;
            if(!empty($_SESSION['orden']['InfoGeneral'])){
              echo 1;  
            } else {
                echo 0;
            }
            
        } else {
            echo 0;
        }
        case 'carritoEnvio':
            $respuestaEnvio=true;
            if(isset($_POST['radio'])){
                if($_POST['radio']=='Ubicacion'){
                  $provincia = isset($_POST['provincia']) ? $_POST['provincia'] : false;
        $canton = isset($_POST['canton']) ? $_POST['canton'] : false;
        $distrito = isset($_POST['distrito']) ? $_POST['distrito'] : false; 
        $tipoEnvio = isset($_POST['radio']) ? $_POST['radio'] : false;
        $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;
           if($provincia &&$canton&& $distrito&& $tipoEnvio&&$direccion){
                 require_once '../controllers/generalController.php';
            $general = new generalController();
            $respGeneral = $general->getGeneralShippingCost();
               $_SESSION['orden']['tipoEnvio']=$_POST;
               $_SESSION['orden']['tipoEnvio']['ShippingCost'] = isset($respGeneral[0]['generalShipping'])?$respGeneral[0]['generalShipping']:0;
               $respuestaEnvio=true;
           }else{
               $respuestaEnvio=false;
               
           }
                }else {
                  $_SESSION['orden']['tipoEnvio']['radio']=$_POST['radio']; 
                  $respuestaEnvio=true;
                }
            } else {
                $respuestaEnvio=false;
            }
          
           echo $respuestaEnvio;
           
            break;
        case "carritoTipoPago":
            $respuestaEnvio=true;
            if(isset($_POST['radio'])){
               $direccion = isset($_POST['radio']) ? $_POST['radio'] : false; 
               if($direccion){
                 $_SESSION['orden']['tipoPago']= $direccion; 
                 $respuestaEnvio=true;
               } else {
                  $respuestaEnvio=false; 
               }
            } else {
              $respuestaEnvio=false;  
            }
            echo $respuestaEnvio;
            break;
            
        case "validarProductoCotizado":
            $carrito = new carritoController();
            $respuestaCotizacion = $carrito -> validarProductoCotizado($_POST['id']);
            if(is_array($respuestaCotizacion)){
               echo  1; 
            } else {
                echo  $respuestaCotizacion;
            }
            
            break;
             case "actualizarCantidadCotizacion":
            if(isset($_POST['array'])){
                foreach ($_POST['array'] as $valueArray) {
                    if(isset($_SESSION['cotizacion'])){
                         foreach ($_SESSION['cotizacion'] as $index => $valuecotizar) {
                             if($valueArray['idArticulos']==$valuecotizar['id']){
                                 $_SESSION['cotizacion'][$index]['cantidad']=$valueArray['cantidad'];
                             }
                        }
                    }
                }       
            }
              echo 1;

            break;
        case "actualizarCantidadCarrito":
            $carrito = new carritoController();
            $eliminar=[];
            $respuesta=false;
            unset($_POST['action']);
            $cont=0;
           $_SESSION['carrito'] = array_values($_SESSION['carrito']);
            for($i=0;$i<count($_SESSION['carrito']);$i++) {
                
            $respuestaInfoProducto = $carrito -> actualizarPrecios($_SESSION['carrito'][$i]['id']);
            $_SESSION['carrito'][$i]['art_PrecioUnitario'] = $respuestaInfoProducto['art_PrecioUnitario'];
            $_SESSION['carrito'][$i]['impuesto'] = $respuestaInfoProducto['art_PorcentajeIV'];
                for($j=0;$j<count($_POST['array']);$j++){
                
                    if($_SESSION['carrito'][$i]['id']==$_POST['array'][$j]['idArticulos']){
                      $_SESSION['carrito'][$i]['cantidad']=$_POST['array'][$j]['cantidad'];
                      if($_SESSION['carrito'][$i]['cantidad']<=0){
                         
                         $eliminar[]=$i;
                      }
                      
                     $respuesta=true;
                  }  
                  $cont++;
              
                              }
                  $cont=0;
                }
                for($h=0;$h<count($eliminar);$h++){
                   unset($_SESSION['carrito'][$eliminar[$h]]); 
                }
                
                echo $respuesta;
     break;
        case "CompletarOrden":
              $respuestaInsertar='';
            require_once'../controllers/ordenController.php';
            $orden=new ordenController();
            $code=$orden->codeGenerator();
            $codeSmall=$orden->codeGeneratorSmallCode();
            $total=$orden->calcularTotal();
            $respuestaInsertar = $orden->insertarOrdenNueva($code,$codeSmall,$total);
            $TotalOrder = 0;
            $subtotalFinal = 0;
                    $totalFinal = 0;
                    $impuestosFinal = 0;
            $response = false;

            if($respuestaInsertar){
                if(isset($_SESSION['carrito']) && count($_SESSION['carrito']) > 0){
                    require_once '../controllers/articulosController.php';
                    $articulos = new articulosController();
                    require_once '../controllers/generalController.php';
                    $general = new generalController();
                      
                    foreach ($_SESSION['carrito'] as $key =>$valueProducto) {
                      $impuesto = 0;  
                      $subTotal = 0 ;
                      $total = 0;
                      $respCosto = 0;
                      
                       $codeDetalle=$orden->codeGenerator();
                       $idArticulo=$valueProducto['id'];
                       //calcular precio de la base de datos ESTE ES SOLO UN PRODUCTO
                       $respArticulo = $articulos->articuloForIdForCart($idArticulo);
                       $_SESSION['carrito'][$key]['art_PrecioUnitario'] = $respArticulo['art_PrecioUnitario'];
                       if(intval($respArticulo['art_PorcentajeIV'])!=''){
                                
                                $impuesto=round(intval($respArticulo['art_PorcentajeIV']),2);   
                            }
                        $respCostoN =0;  
                        $precioIni =round($respArticulo['art_PrecioUnitario'],2);
                        $precio = $respArticulo['art_LlevaImpuesto']==1?$respArticulo['IVAIncluido']==1&&$impuesto!=0?($precioIni/(1+($impuesto/100))):$precioIni:$precioIni; 
                        $impMonto=$respArticulo['art_LlevaImpuesto']==1?$impuesto!=0?$respArticulo['IVAIncluido']==1?$precioIni-$precio:$precio*($impuesto/100):0:0;
                        $subTotal =  $precio*$valueProducto['cantidad'];
                        $impTotal = $respArticulo['art_LlevaImpuesto']==1?round($impMonto*$valueProducto['cantidad'],2):0;
                        $impuestosFinal = $impuestosFinal + $impTotal;
                        $total = ($precio+$impMonto)*$valueProducto['cantidad'];
                        $subTotal=round($subTotal,2);   
                        $total=round($total,2); 
                        $impuesto=round($impuesto,2); 
                        $subtotalFinal = $subtotalFinal + $subTotal;
                        $totalFinal = $totalFinal + $total;     
                       $precio=$respArticulo['art_PrecioUnitario'];
                       $cantidad= $valueProducto['cantidad'];
                       $nombre= $valueProducto['nombre'];
                       $imagen=$valueProducto['imagen'];
                       $radioColor=!empty($valueProducto['radioColor'])?$valueProducto['radioColor']:'0';
                       $radioImg=!empty($valueProducto['radioImg'])?$valueProducto['radioImg']:'0';
                       $listAttribute=!empty($valueProducto['listAttribute'])?$valueProducto['listAttribute']:'0';
                       $personalizacion = Array(
                           "radioImg"=>$radioImg,
                           "radioColor"=>$radioColor,
                           "listAttribute"=>$listAttribute
                       );
                       
                       
                       
                       $total = $cantidad*$precio;
                       $respuestaInsertar=$orden->insertarDetalles($code,$idArticulo, $cantidad,$nombre, $imagen, $codeDetalle, $precio,$total,$personalizacion,$impTotal,$subTotal);
                       $TotalOrder = $TotalOrder + $total;
                    }
                    $respCosto = $general->getGeneralShippingCost();
                  if($respuestaInsertar){
                      $respCostoN = isset($respCosto[0]['generalShipping'])&&$respCosto[0]['generalShipping']!=0?($respCosto[0]['generalShipping']):0;
                      $impuestosFinal = $impuestosFinal+($respCostoN*0.13);
                      $subtotalFinal = $subtotalFinal;
                      $totalFinal = $impuestosFinal+$subtotalFinal+$respCostoN;
                      $respuestaInsertar=$orden->updateOrden($impuestosFinal,$subtotalFinal,$totalFinal,$respCostoN,$code);
                  }
                  
                  $nombreCliente = $_SESSION['nombre'];
                  $apellidos = $_SESSION['apellido'];
                  $email = $_SESSION['email'];
                  $DNI = $_SESSION['DNI'];
                  $provincia = $_SESSION['provincia'];
                  $canton = $_SESSION['canton'];
                  $distrito = $_SESSION['distrito'];
                  $direccion = $_SESSION['direccion'];
                  $telefono = $_SESSION['telefono'];
                   require_once'../controllers/ordenController.php';
                     $orderDetails = new ordenController();
                    $respOrden = $orderDetails->mostrarDetalles($codeSmall);
                    $newCostumArray = Array();
                    foreach ($respOrden as $index=>$valuesOrder) {
                        $costum = json_decode($valuesOrder['personalizacion'],true);
                        $newCostumArray = Array(
                            "Imagen"=>$costum['radioImg'],
                            "Color"=>$costum['radioColor'],
                            "Seleccion"=>$costum['listAttribute']
                        );
                        $newArray[$index]['ID']= $valuesOrder['ID'];
                        $newArray[$index]['Cantidad']= $valuesOrder['cantidad'];
                        $newArray[$index]['Descripción']= $valuesOrder['art_Descripcion'];
                        $newArray[$index]['Personalización']= $newCostumArray;
                        $newArray[$index]['Precio']= $valuesOrder['price'];
                        $newArray[$index]['Impuesto']= $valuesOrder['taxAmount'];
                        $newArray[$index]['Total']= $valuesOrder['totalPrice'];
                        
                    }
                    $respOrden = $newArray;
                    $respCotizacionBusiness='';
                    require_once '../email/ordenes.php';
                    $emailSent = new ordenes();
                    $fullname = $nombreCliente." ".$apellidos;
                    
                      $respuestaInsertar=$orden->updateOrden($impuestosFinal,$subtotalFinal,$totalFinal,$respCostoN,$code);
                    $respEmaiSent = $emailSent->sendEmailOrder($fullname,$email,$codeSmall,$respOrden,$subtotalFinal,$totalFinal,$impuestosFinal,$respCostoN);
                    if($respEmaiSent){
                       $respCotizacionBusiness = $emailSent->sendEmailOrderToBusiness($fullname,$email,$codeSmall,$respOrden,$DNI,$provincia,$canton,$distrito,$direccion,$telefono,$subtotalFinal,$totalFinal,$impuestosFinal,$respCostoN);
                    }
                    if(isset($_SESSION['orden']['tipoEnvio'])){
                        if($_SESSION['orden']['tipoEnvio'] != 'Oficina'){
                            $provincia = (isset($_SESSION['orden']['tipoEnvio']['provincia'])) ? $_SESSION['orden']['tipoEnvio']['provincia']: 'No definido';
                            $canton = (isset($_SESSION['orden']['tipoEnvio']['canton'])) ? $_SESSION['orden']['tipoEnvio']['canton']: 'No definido';
                            $distrito = (isset($_SESSION['orden']['tipoEnvio']['distrito'])) ? $_SESSION['orden']['tipoEnvio']['distrito']: 'No definido';
                            $direccion = (isset($_SESSION['orden']['tipoEnvio']['direccion'])) ? $_SESSION['orden']['tipoEnvio']['direccion']: 'No definido';
                            
                            $respuestaInsertar = $orden->insertarEnvioOrdenEntrega($code,$_SESSION['orden']['tipoEnvio']['radio'],$provincia,$canton,$distrito,$direccion);   
                        } else {
                            $respuestaInsertar = $orden->insertarEnvioOrdenEntrega($code,$_SESSION['orden']['tipoEnvio']);  
                        }
                    }
                    
                   
                    
                    
                    $carrito = new carritoController();
                    
                    if($_SESSION['orden']['tipoPago']=='tarjeta'){
                        require_once('../payment/tilopay/class.tilopay.php');
                        $payment = new Tilopay();
                        
                        $direccion = (!empty($_SESSION['direccion'])) ? filter_var($_SESSION['direccion'], FILTER_SANITIZE_STRING) : 'No Definido';
                        $distrito  = (!empty($_SESSION['distrito'])) ? filter_var($_SESSION['distrito'], FILTER_SANITIZE_STRING) : 'No Definido';
                        $canton    = (!empty($_SESSION['canton'])) ? filter_var($_SESSION['canton'], FILTER_SANITIZE_STRING) : 'No Definido';
                        $provincia = (!empty($_SESSION['provincia'])) ? filter_var($_SESSION['provincia'], FILTER_SANITIZE_STRING) : 'No Definido';
                        
                        $pay = $payment->processPayment(
                            array(
                                "amount"=> $totalFinal,
                                "currency"=> "CRC",
                                "billToFirstName"=> $_SESSION['nombre'],
                                "billToLastName"=> $_SESSION['apellido'],
                                "billToAddress"=> $direccion,
                                "billToAddress2"=> $distrito,
                                "billToCity"=> $canton,
                                "billToState"=> $provincia,
                                "billToZipPostCode"=> "10061",
                                "billToCountry"=> "CR",
                                "billToTelephone"=> $_SESSION['telefono'],
                                "billToEmail"=> $_SESSION['email'],
                                "orderNumber"=> $code
                            )
                        );
                        
                        if($pay['result']){
                            if(isset($pay['url'])){
                                
                                $response = $pay['url'];
                            }else{
                                $response = 'denied';
                            }
                        }
                    }else{
                        require_once '../config/parameters.php';
                         if($respuestaInsertar){
                             $carrito->vaciarCarrito();
                                $response = base_url."?pag=checkout&&step=resultTransaction&&descrip=success";
                            } else {
                                $response = base_url."?pag=checkout&&step=resultTransaction&&descrip=error";
                            }
            
                    }
                }
            }
           

            echo $response;
            break;
        default:
            
            echo 0;
            break;
    }
}
