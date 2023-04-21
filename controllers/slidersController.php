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
    public function insertSlider($nombrefinal,$url,$nombrefinl2,$url_mobile,$order){
        require_once '../config/conexion.php';
        require_once '../models/slidersModel.php';
        $slider = new slidersModel();
        $respSlider =  $slider->insertSlider($nombrefinal,$url,$nombrefinl2,$url_mobile,$order);
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
    public function updateSlider($nombrefinal,$url,$nombrefinl2,$url_mobile,$order,$id){
        require_once '../config/conexion.php';
        require_once '../models/slidersModel.php';
        $slider = new slidersModel();
        $respSlider =  $slider->updateSlider($nombrefinal,$url,$nombrefinl2,$url_mobile,$order,$id);
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
            $idgen2      = $slider->codeGenerator();
            $nombrefinal = '';
            $nombrefinl2 = '';
            $title       = !empty($_POST['titulo'])?$_POST['titulo']:'';
            $order       = !empty($_POST['order'])?$_POST['order']:'';
            $url         = !empty($_POST['url'])?$_POST['url']:'';
            $url_mobile  = !empty($_POST['url_mobile'])?$_POST['url_mobile']:'';

            if($title){
                if(isset($_FILES['file']['name']) && $_FILES['file']['name']!=''){
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
                        }else{
                            if (move_uploaded_file($temp, '../images/slider/'.$nombrefinal)) {
                                chmod('../images/slider/'.$nombrefinal, 0777);
                            }else {
                                $errorimg = true;
                            }
                        }
                    }
                }

                if(isset($_FILES['file_mobile']['name']) && $_FILES['file_mobile']['name']!=''){
                    $archivo = $_FILES['file_mobile']['name'];
                    $tipo = $_FILES['file_mobile']['type'];
                    $tamano = $_FILES['file_mobile']['size'];
                    $temp = $_FILES['file_mobile']['tmp_name'];

                    if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000000))) {
                        $errorimg = true;
                    }else {
                        $nombrefinl2 = $idgen2.$archivo;
                        if (!is_dir('../images/slider/mobile/')) {
                            mkdir('../images/slider/mobile/', 0777, true);
                        }
                        if(file_exists('../images/slider/mobile/' . $nombrefinl2)){
                            unlink('../images/slider/mobile/' . $nombrefinl2);
                        }else{
                            if (move_uploaded_file($temp, '../images/slider/'.$nombrefinl2)) {
                                chmod('../images/slider/mobile/'.$nombrefinl2, 0777);
                            }else {
                                $errorimg = true;
                            }
                        }
                    }
                }

                $nombrefinal = "/images/slider/".$nombrefinal;
                $nombrefinl2 = "/images/slider/mobile/".$nombrefinl2;

                $respuestaInsertar = $slider-> insertSlider($nombrefinal,$url,$nombrefinl2,$url_mobile,$order);
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
            $idgen = $slider->codeGenerator();
            $idgn2 = $slider->codeGenerator();
            $nombrefinal = '';
            $nombrefinl2 = '';
            $id              = !empty($_POST['id'])? filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT):false;
            $title           = !empty($_POST['titulo'])?filter_var($_POST['titulo'],FILTER_SANITIZE_STRING):'';
            $order           = !empty($_POST['order'])?filter_var($_POST['order'],FILTER_SANITIZE_STRING):'';
            $url             = !empty($_POST['url'])?filter_var($_POST['url'],FILTER_SANITIZE_STRING):'';
            $url_mobile      = !empty($_POST['url_mobile'])?filter_var($_POST['url_mobile'],FILTER_SANITIZE_STRING):'';
            $provisionalName = !empty($_POST['filenameImg'])? $_POST['filenameImg']:false;
            $provisiMoblName = !empty($_POST['file_mobile'])? $_POST['file_mobile']:false;
            
            if(isset($_FILES['file']['name']) && $_FILES['file']['name']!=''){
                $archivo = $_FILES['file']['name'];
                $tipo = $_FILES['file']['type'];
                $tamano = $_FILES['file']['size'];
                $temp = $_FILES['file']['tmp_name'];
                if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000000))) {
                    $errorimg = true;
                }else{
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

            if(isset($_FILES['file_mobile']['name']) && $_FILES['file_mobile']['name']!=''){
                $archivo = $_FILES['file_mobile']['name'];
                $tipo = $_FILES['file_mobile']['type'];
                $tamano = $_FILES['file_mobile']['size'];
                $temp = $_FILES['file_mobile']['tmp_name'];
                if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000000))) {
                    $errorimg = true;
                }else{
                    $nombrefinl2 = $idgn2.$archivo;
                    if (!is_dir('../images/slider/mobile/')) {
                        mkdir('../images/slider/mobile/', 0777, true);
                    }
                    if(file_exists('../images/slider/mobile/' . $nombrefinl2)){
                        unlink('../images/slider/mobile/' . $nombrefinl2);
                    } else {
                        if (move_uploaded_file($temp, '../images/slider/mobile/'.$nombrefinl2)) {
                            chmod('../images/slider/mobile/'.$nombrefinl2, 0777);
                        }else {
                            $errorimg = true;
                        }
                    }
                }
            } else {
                $nombrefinl2 = $provisiMoblName;
            }
            $nombrefinal = "/images/slider/".$nombrefinal;
            $nombrefinl2 = "/images/slider/mobile/".$nombrefinl2;

            $respuestaInsertar=false;
            if($id){
                $respuestaInsertar = $slider-> updateSlider($nombrefinal,$url,$nombrefinl2,$url_mobile,$order,$id);
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
