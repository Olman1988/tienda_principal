<?php



class slidersController{
    public function getAllSlidersAdmin(){
        require_once '../models/slidersModel.php';
        $slider = new slidersModel();
        $respSlider =  $slider->getAllSlidersAdmin();
        return $respSlider;
    }
     public function getAllSliders(){
        $slider = new slidersModel();
        $respSlider =  $slider->getAllSliders();
        return $respSlider;
    }
    public function insertSlider($title,$url,$order,$nombrefinal){
        require_once '../config/conexion.php';
        require_once '../models/slidersModel.php';
        $slider = new slidersModel();
        $respSlider =  $slider->insertSlider($title,$url,$order,$nombrefinal);
        return $respSlider;
    }
     public function codeGenerator() {
                  $code=  strtoupper(uniqid());
                  return $code;
        }
     public function getSliderById($id){
         require_once '../config/conexion.php';
        require_once '../models/slidersModel.php';
        $slider = new slidersModel();
        $respSlider =  $slider->getSliderById($id);
        return $respSlider;
     } 
     public function updateSlider($title,$order,$url,$nombrefinal,$id){
        require_once '../config/conexion.php';
        require_once '../models/slidersModel.php';
        $slider = new slidersModel();
        $respSlider =  $slider->updateSlider($title,$order,$url,$nombrefinal,$id);
        return $respSlider;
     }
     public function deleteSlider($id){
         require_once '../config/conexion.php';
        require_once '../models/slidersModel.php';
        $slider = new slidersModel();
        $respSlider =  $slider->deleteSlider($id);
             if($respSlider){
                $Result['msn'] = "Elemento eliminado con éxito";
                $Result['status'] = true;
             } else {
                $Result['msn'] = "Hubo un error al eliminar el item, intente nuevamente";
                $Result['status'] = false;
             }
             
             header('Content-Type: application/json');
           echo json_encode($Result);
     }
             
}

if(isset($_POST['action'])){
    switch ($_POST['action']) {
        case 'action-add':
            $slider= new slidersController();
           $idgen=$slider->codeGenerator();
           $nombrefinal = '';
            $title = !empty($_POST['titulo'])?$_POST['titulo']:'';
            $order = !empty($_POST['order'])?$_POST['order']:'';
            $url = !empty($_POST['url'])?$_POST['url']:'';
            if($title){
                if(isset($_FILES['file']['name'])&&$_FILES['file']['name']!=''){

                    $archivo = $_FILES['file']['name'];
                    $tipo = $_FILES['file']['type'];
                    $tamano = $_FILES['file']['size'];
                    $temp = $_FILES['file']['tmp_name'];
                    if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000000))) {
                        $errorimg = true;
                     }else {
                    $nombrefinal = $idgen.$archivo;
                    if (!is_dir('../images/slider/')) {
                            mkdir('../images/slider/', 0777, true);

                        }


                        if(file_exists('../images/slider/' . $nombrefinal)){

                            unlink('../images/slider/' . $nombrefinal);

                        } else {



                            if (move_uploaded_file($temp, '../images/slider/'.$nombrefinal)) {
                        chmod('../images/slider/'.$nombrefinal, 0777);

                    }else {
                        $errorimg = true;
                    }

                        }


                    }
                } 
                $nombrefinal = "/images/slider/".$nombrefinal;
                $respuestaInsertar = $slider-> insertSlider($title,$url,$order,$nombrefinal);
                if($respuestaInsertar){
                echo"<script>Swal.fire('Elemento guardado con éxito!', '', 'success');";
                echo"window.setTimeout(function () {window.location.href = './?seccion=sliders'}, 2000)</script>";
                
            }else {
               echo "<script>Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'No fue posible eliminar los datos, intente nuevamente!',
                            footer: '',

                        })
                        
                        window.setTimeout(function () {history.back()}, 2000)
                        </script>";
            }
            }
            break;
            case 'action-edit':
            $archivo;
            $observacion;
            $validacion = true;
            $slider= new slidersController();
            $idgen=$slider->codeGenerator();
            $nombrefinal = '';
            $id              = !empty($_POST['id'])? filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT):false;
            $title           = !empty($_POST['titulo'])?filter_var($_POST['titulo'],FILTER_SANITIZE_STRING):'';
            $order           = !empty($_POST['order'])?filter_var($_POST['order'],FILTER_SANITIZE_STRING):'';
            $url             = !empty($_POST['url'])?filter_var($_POST['url'],FILTER_SANITIZE_STRING):'';
            $provisionalName = !empty($_POST['filenameImg'])? $_POST['filenameImg']:false;
            
            if(isset($_FILES['file']['name'])&&$_FILES['file']['name']!=''){
                
                $archivo = $_FILES['file']['name'];
                   $tipo = $_FILES['file']['type'];
                $tamano = $_FILES['file']['size'];
                $temp = $_FILES['file']['tmp_name'];
                if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000000))) {
                    $errorimg = true;
                 }else {
                $nombrefinal = $idgen.$archivo;
                if (!is_dir('../images/slider/')) {
                        mkdir('../images/slider/', 0777, true);
                    }
                    if(file_exists('../images/slider/' . $nombrefinal)){
                        
                        unlink('../images/slider/' . $nombrefinal);
                    } else {
                        if (move_uploaded_file($temp, '../images/slider/'.$nombrefinal)) {
                    chmod('../images/slider/'.$nombrefinal, 0777);
                    
                }else {
                    $errorimg = true;
                }
                    }
            }
            } else {
                $nombrefinal = $provisionalName;
            }
            $nombrefinal = "/images/slider/".$nombrefinal;
            $respuestaInsertar=false;
            if($id){
                $respuestaInsertar = $slider-> updateSlider($title,$order,$url,$nombrefinal,$id);
            }
            if($respuestaInsertar){
                echo"<script>Swal.fire('Elemento modificado con éxito!', '', 'success');";
                echo"window.setTimeout(function () {window.location.href = './?seccion=sliders'}, 2000)</script>";
                
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
            case 'delete':
            $delete = new slidersController();
            $respuestaSlider=$delete->deleteSlider($_POST['id']);
            echo $respuestaSlider;
            break;
        default:
            break;
    }
}
