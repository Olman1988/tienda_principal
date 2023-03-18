<?php
if(isset($_POST['action'])){
 require_once '../config/conexion.php';
require_once '../models/generalModel.php';   
require_once '../models/landingModel.php';
} else {
  require_once './config/conexion.php';
require_once './models/generalModel.php';  
  
}

class generalController{
    public function todosArticulos(){
            $consultaArticulos=new articulosModel();
            $respuestaArticulos=$consultaArticulos->todosArticulos();
            return $respuestaArticulos;
            
        }
    public function todasPreguntasFrecuentes($idtipo){
        $consultaFAQ= new generalModel();
        $respuestaFAQ=$consultaFAQ->todasPreguntasFrecuentes($idtipo);
        return $respuestaFAQ;
    }
    public function tiposPreguntas(){
      $consultaFAQ= new generalModel();
        $respuestaFAQ=$consultaFAQ->tiposPreguntas();
        return $respuestaFAQ;  
    }
    public function consultarOfertas(){
        $consultaOferta= new generalModel();
        $respuestaOferta=$consultaOferta->consultarOfertas();
        $respuestaOfertaActiva = $consultaOferta->consultarOfertaActiva();
        
        if(count($respuestaOferta)>0){
            require_once 'views/principal/ofertaLimitada.php';
        }
    }
    
    public function consultarMarcas(){
        $consultaMarcas= new generalModel();
        $respuestaMarcas=$consultaMarcas->consultarMarcas();
        if(count($respuestaMarcas)>0){
             require_once "views/principal/marcas.php";   
        }
       
    }
    public function consultarOrdenes($email){
        
        $consultaOrdenes= new generalModel();
        $respuestaOrdenes=$consultaOrdenes->consultarOrdenes($email);
        return $respuestaOrdenes;
    }
    public function consultarPromociones(){
        $consultarPromos = new generalModel();
        $respuestaPromociones = $consultarPromos ->consultarPromociones();
        return $respuestaPromociones;
    }
    
    public function insertarOferta($nombrefinal,$nombre,$descripcion,$estado){
       
         $consultarPromos = new generalModel();
        $respuestaPromociones = $consultarPromos ->insertarOferta($nombrefinal,$nombre,$descripcion,$estado);
        return $respuestaPromociones;
        
    }
     public function codeGenerator() {
 $code=  strtoupper(uniqid());
   return $code;
    
} 
public function actualizarOferta($nombrefinal = '',$nombre,$descripcion,$estado,$id){
    $consultarPromos = new generalModel();
        $respuestaPromociones = $consultarPromos ->actualizarOferta($nombrefinal,$nombre,$descripcion,$estado,$id);
        return $respuestaPromociones;
}
public function borrarPromo($idPromo){
       $consultarPromos = new generalModel();
        $respuestaPromociones = $consultarPromos ->borrarPromo($idPromo);
        return $respuestaPromociones;
}
public function consultarMetodos(){
   $consultaGeneral = new generalModel();
   $respuestaGeneral = $consultaGeneral -> consultarMetodos();
   return $respuestaGeneral;
}
public function getGeneralShippingCost(){
    $general = new generalModel();
    $respShippingCost = $general ->getGeneralShippingCost();
    return $respShippingCost;
}

    
    
}
    
if(isset($_POST['action'])){
   
    switch ($_POST['action']) {
        case 'agregarPromo':
           $archivo;
           $observacion;
           $validacion = true;
           $promo= new generalController();
           $idgen=$promo->codeGenerator();
           $nombrefinal = '';
           if(isset($_FILES['file']['name'])){
               $archivo = $_FILES['file']['name'];
           } else {
               $archivo=null;
           }
         
            $nombre = !empty($_POST['nombre'])? $_POST['nombre']:false;
            $descripcion = !empty($_POST['descripcion'])? $_POST['descripcion']:false;
            $estado = !empty($_POST['estado'])? $_POST['estado']:false;
           
       if (isset($archivo) && $archivo != "" && $nombre && $descripcion) {
           
           $tipo = $_FILES['file']['type'];
           $tamano = $_FILES['file']['size'];
           $temp = $_FILES['file']['tmp_name'];
           if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000000))) {
               
               $errorimg = true;
            }else {
                $nombrefinal = $idgen.$tipo;
                if (!is_dir('../assets/imagenesPromo/')) {
                        mkdir('../assets/imagenesPromo/', 0777, true);
                    }

                    
                    if(file_exists('../assets/imagenesPromo/' . $nombrefinal)){
                        
                        unlink('../assets/imagenesPromo/' . $nombrefinal);
                         
                    } else {
                   
                        if (move_uploaded_file($temp, '../assets/imagenesPromo/'.$nombrefinal)) {
                    chmod('../assets/imagenesPromo/'.$nombrefinal, 0777);
                    
                }else {
                    $errorimg = true;
                }
                        
                    }
                
                
            }
            
            
       } else {
       $validacion=false;
       }
       $respuesaPromo = '';
      if($validacion){
          $respuesaPromo = $promo ->insertarOferta($nombrefinal,$nombre,$descripcion,$estado);
          
      } else {
          echo $validacion;
      }
          echo $respuesaPromo;  

            break;
            case"editarPromo":
                       $archivo;
           $observacion;
           $validacion = true;
           $promo= new generalController();
           $idgen=$promo->codeGenerator();
           $nombrefinal = '';
           if(isset($_FILES['file']['name'])){
               $archivo = $_FILES['file']['name'];
           } else {
               $archivo=null;
           }
         
            $nombre = !empty($_POST['nombre'])? $_POST['nombre']:false;
            $descripcion = !empty($_POST['descripcion'])? $_POST['descripcion']:false;
            $estado = !empty($_POST['estado'])? $_POST['estado']:false;
            $id = !empty($_POST['idEditar'])? $_POST['idEditar']:false;
       if (isset($archivo) && $archivo != "" ) {
           $tipo = $_FILES['file']['type'];
           $tamano = $_FILES['file']['size'];
           $temp = $_FILES['file']['tmp_name'];
           if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000000))) {
               $errorimg = true;
            }else {
                $nombrefinal = $idgen.$archivo;
                if (!is_dir('../assets/imagenesPromo/')) {
                        mkdir('../assets/imagenesPromo/', 0777, true);
                    }

                    
                    if(file_exists('../assets/imagenesPromo/' . $nombrefinal)){
                        
                        unlink('../assets/imagenesPromo/' . $nombrefinal);
                         
                    } else {
                   
                        if (move_uploaded_file($temp, '../assets/imagenesPromo/'.$nombrefinal)) {
                    chmod('../assets/imagenesPromo/'.$nombrefinal, 0777);
                    
                }else {
                    $errorimg = true;
                }
                        
                    }
                
                
            }
            
            
       } 
       $respuesaPromo = '';
      if($validacion){
          $respuesaPromo = $promo ->actualizarOferta($nombrefinal,$nombre,$descripcion,$estado,$id);
          
      } else {
          echo "$validacion";
      }
          echo $respuesaPromo;  
            break; 
     
        case "borrar":
            $borrarPromo = new generalController();
            $respuestaPromo=$borrarPromo -> borrarPromo($_POST['idPromo']);
            echo $respuestaPromo;
            break;
        case "calcularCCosto":
            $general = new generalController();
            $respCosto = $general->getGeneralShippingCost();
            $resp = isset($respCosto[0]["generalShipping"])&& !is_null($respCosto[0]["generalShipping"])?$respCosto[0]["generalShipping"]:false;
            echo $resp;
            break;
        default:
            break;
    }
}