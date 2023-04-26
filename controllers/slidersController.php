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
    public function insertSlider($nombrefinal,$url,$order,$type){
        require_once '../config/conexion.php';
        require_once '../models/slidersModel.php';
        $slider = new slidersModel();
        $respSlider =  $slider->insertSlider($nombrefinal,$url,$order,$type);
        return $respSlider;
    }
    public function codeGenerator(){
        $code =  strtoupper(uniqid());
        return $code;
    }
    public function getSliderById($id){
        require_once '../config/conexion.php';
        require_once '../models/slidersModel.php';
        $slider = new slidersModel();
        $respSlider =  $slider->getSliderById($id);
        return $respSlider;
    }
    public function updateSlider($nombrefinal,$url,$order,$type,$Status,$id){
        require_once '../config/conexion.php';
        require_once '../models/slidersModel.php';
        $slider = new slidersModel();
        $respSlider =  $slider->updateSlider($nombrefinal,$url,$order,$type,$Status,$id);
        return $respSlider;
    }
    public function deleteSlider($id){
        require_once '../config/conexion.php';
        require_once '../models/slidersModel.php';
        $slider = new slidersModel();
        $respSlider =  $slider->deleteSlider($id);
        if ($respSlider) {
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
            $slider      = new slidersController();
            $idgen       = $slider->codeGenerator();
            $nombrefinal = '';
            $Path = '';

            $title           = !empty($_POST['titulo'])?filter_var($_POST['titulo'],FILTER_SANITIZE_STRING):'';
            $order           = !empty($_POST['order'])?filter_var($_POST['order'],FILTER_SANITIZE_STRING):'';
            $url             = !empty($_POST['url'])?filter_var($_POST['url'],FILTER_SANITIZE_STRING):'';
            $provisionalName = !empty($_POST['filenameImg'])? $_POST['filenameImg']:false;
            $type            = !empty($_POST['type'])? filter_var($_POST['type'], FILTER_SANITIZE_NUMBER_INT): 0;

            if($title){
                if(isset($_FILES['file']['name']) && $_FILES['file']['name']!=''){
                    $Path = '../images/slider/';
                    $archivo = $_FILES['file']['name'];
                    $tipo = $_FILES['file']['type'];
                    $tamano = $_FILES['file']['size'];
                    $temp = $_FILES['file']['tmp_name'];

                    if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000000))) {
                        $errorimg = true;
                    }else {
                        $nombrefinal = $idgen.$archivo;
                        if (!is_dir($Path)) {
                            mkdir($Path, 0777, true);
                        }
                        if(file_exists($Path . $nombrefinal)){
                            unlink($Path . $nombrefinal);
                        }else{
                            if (move_uploaded_file($temp, $Path.$nombrefinal)) {
                                chmod($Path.$nombrefinal, 0777);
                            }else {
                                $errorimg = true;
                            }
                        }
                    }
                }
                $nombrefinal = "/images/slider/".$nombrefinal;

                $respuestaInsertar = $slider->insertSlider($nombrefinal,$url,$order,$type);
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
            $slider= new slidersController();
            $idgen = $slider->codeGenerator();
            $Path = '';
            $archivo;
            $nombrefinal = '';

            $id              = !empty($_POST['id'])? filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT):false;
            $title           = !empty($_POST['titulo'])?filter_var($_POST['titulo'],FILTER_SANITIZE_STRING):'';
            $order           = !empty($_POST['order'])?filter_var($_POST['order'],FILTER_SANITIZE_STRING):'';
            $url             = !empty($_POST['url'])?filter_var($_POST['url'],FILTER_SANITIZE_STRING):'';
            $provisionalName = !empty($_POST['filenameImg'])? $_POST['filenameImg']:false;
            $type            = !empty($_POST['type'])? filter_var($_POST['type'], FILTER_SANITIZE_NUMBER_INT): 0;
            $Status          = !empty($_POST['status'])? filter_var($_POST['status'], FILTER_VALIDATE_BOOLEAN): false;

            if(isset($_FILES['file']['name']) && $_FILES['file']['name']!=''){
                $Path = '../images/slider/';
                $archivo = $_FILES['file']['name'];
                $tipo = $_FILES['file']['type'];
                $tamano = $_FILES['file']['size'];
                $temp = $_FILES['file']['tmp_name'];
                if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000000))) {
                    $errorimg = true;
                }else{
                    $nombrefinal = $idgen.$archivo;
                    if (!is_dir($Path)) {
                        mkdir($Path, 0777, true);
                    }
                    if(file_exists($Path . $nombrefinal)){
                        unlink($Path . $nombrefinal);
                    } else {
                        if (move_uploaded_file($temp, $Path.$nombrefinal)) {
                            chmod($Path.$nombrefinal, 0777);
                        }else {
                            $errorimg = true;
                        }
                    }
                }
                $nombrefinal = '/images/slider/'.$nombrefinal;
            } else {
                $nombrefinal = '/images/slider/'.$provisionalName;
            }

            $respuestaInsertar=false;
            /* var_dump($nombrefinal);
            die(); */
            if($id){
                $respuestaInsertar = $slider-> updateSlider($nombrefinal,$url,$order,$type,$Status,$id);
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
