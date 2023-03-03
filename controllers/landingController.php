<?php
require_once '../config/conexion.php';
require_once '../models/landingModel.php';
class landingController{
    public function insertarLanding($nombrefinal,$titulo,$subtitulo,$emailSet,$descripcion,$estado,$idgen){
     $consultarLanding = new landingModel();
        $respuestaLanding = $consultarLanding ->insertarLanding($nombrefinal,$titulo,$subtitulo,$emailSet,$descripcion,$estado,$idgen);
        return $respuestaLanding;
    }
    
    public function actualizarLanding($nombrefinal = '',$titulo,$subtitulo,$emailSet,$descripcion,$estado,$id){
      $consultarLanding = new landingModel();
        $respuestaLanding = $consultarLanding ->actualizarLanding($nombrefinal,$titulo,$subtitulo,$emailSet,$descripcion,$estado,$id);
        return $respuestaLanding;  
    }
     public function codeGenerator() {
 $code=  strtoupper(uniqid());
   return $code;
    
} 
public function borrarLanding($idLanding){
       $consultarLanding = new landingModel();
        $respuestaLandings = $consultarLanding ->borrarLanding($idLanding);
        return $respuestaLandings;
}
}

if(isset($_POST['action'])){
    switch ($_POST['action']) {
           case "agregarLanding":

             $archivo;
           $observacion;
           $validacion = true;
           $promo= new landingController();
           $idgen=$promo->codeGenerator();
           $nombrefinal = '';
           if(isset($_FILES['file']['name'])){
               $archivo = $_FILES['file']['name'];
           } else {
               $archivo=null;
           }
         
            $titulo = !empty($_POST['titulo'])? $_POST['titulo']:false;
            $subtitulo = !empty($_POST['subtitulo'])? $_POST['subtitulo']:false;
            $descripcion = !empty($_POST['descripcion'])? $_POST['descripcion']:false;
            $estado = !empty($_POST['estado'])? $_POST['estado']:false;
            $emailSet = !empty($_POST['emailSet'])? $_POST['emailSet']:false;
       if (isset($archivo) && $archivo != "" && $titulo && $subtitulo && $emailSet && $descripcion) {
           
           $tipo = $_FILES['file']['type'];
           $tamano = $_FILES['file']['size'];
           $temp = $_FILES['file']['tmp_name'];
           if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000000))) {
               
               $errorimg = true;
            }else {
                $nombrefinal = $idgen.$archivo;
                if (!is_dir('../assets/imagenesLanding/')) {
                        mkdir('../assets/imagenesLanding/', 0777, true);
                    }

                    
                    if(file_exists('../assets/imagenesLanding/' . $nombrefinal)){
                        
                        unlink('../assets/imagenesLanding/' . $nombrefinal);
                         
                    } else {
                   
                        if (move_uploaded_file($temp, '../assets/imagenesLanding/'.$nombrefinal)) {
                    chmod('../assets/imagenesLanding/'.$nombrefinal, 0777);
                    
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
          $respuesaPromo = $promo ->insertarLanding($nombrefinal,$titulo,$subtitulo,$emailSet,$descripcion,$estado,$idgen);
          
      } else {
          echo $validacion;
      }
          echo $respuesaPromo; 
   
    
            break;
               case"editarLanding":
                       $archivo;
           $observacion;
           $validacion = true;
           $promo= new landingController();
           $idgen=$promo->codeGenerator();
           $nombrefinal = '';
           if(isset($_FILES['file']['name'])){
               $archivo = $_FILES['file']['name'];
           } else {
               $archivo=null;
           }
            $id = !empty($_POST['id'])? $_POST['id']:false;
            $titulo = !empty($_POST['titulo'])? $_POST['titulo']:false;
            $subtitulo = !empty($_POST['subtitulo'])? $_POST['subtitulo']:false;
            $descripcion = !empty($_POST['descripcion'])? $_POST['descripcion']:false;
            $estado = !empty($_POST['estado'])? $_POST['estado']:false;
            $emailSet = !empty($_POST['emailSet'])? $_POST['emailSet']:false;
       if (isset($archivo) && $archivo != "" ) {
           $tipo = $_FILES['file']['type'];
           $tamano = $_FILES['file']['size'];
           $temp = $_FILES['file']['tmp_name'];
           if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000000))) {
               $errorimg = true;
            }else {
                $nombrefinal = $idgen.$archivo;
                if (!is_dir('../assets/imagenesLanding/')) {
                        mkdir('../assets/imagenesLanding/', 0777, true);
                    }

                    
                    if(file_exists('../assets/imagenesLanding/' . $nombrefinal)){
                        
                        unlink('../assets/imagenesLanding/' . $nombrefinal);
                         
                    } else {
                   
                        if (move_uploaded_file($temp, '../assets/imagenesLanding/'.$nombrefinal)) {
                    chmod('../assets/imagenesLanding/'.$nombrefinal, 0777);
                    
                }else {
                    $errorimg = true;
                }
                        
                    }
                
                
            }
            
            
       } 
       $respuesaPromo = '';
      if($validacion){
          $respuesaPromo = $promo ->actualizarLanding($nombrefinal,$titulo,$subtitulo,$emailSet,$descripcion,$estado,$id);
          
      } else {
          echo "$validacion";
      }
          echo $respuesaPromo;  
            break; 
     
        case "borrar":
            $borrarLanding = new landingController();
            $respuestaPromo=$borrarLanding -> borrarLanding($_POST['idLanding']);
            echo $respuestaPromo;
            break;
        

        default:
            break;
         
    }
}