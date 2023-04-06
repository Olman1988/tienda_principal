<?php
class faqController{
    public $_FAQ;
    public function __construct(){
        require_once "../models/faqModel.php";
        $this->_FAQ = new faqModel();
    }
    /**
     * 
     * 
     */
    public function consultarFAQ($idCategoria){
        $FAQs = $this->_FAQ->consultarFAQ($idCategoria);
        
        return $FAQs;
    }
    /**
     * 
     * 
     */
    public function insertarFAQ($pregunta, $contenido, $orden){
        if (isset($_POST['action'])) {
            require_once '../config/conexion.php';
        }
        $respuestaInsertar = $this->_FAQ->insertarFAQ($pregunta, $contenido, $orden);
        return $respuestaInsertar;
    }
    /**
     * 
     * 
     */
    public function modificarFAQ($pregunta, $contenido, $orden, $id){
        if (isset($_POST['action'])) {
            require_once '../config/conexion.php';
        }
        $respuestaModificar = $this->_FAQ->modificarFAQ($pregunta, $contenido, $orden, $id);
        return $respuestaModificar;
    }
    /**
     * 
     * 
     */
    public function borrarFAQ($id){
        
        if (isset($_POST['action-faq'])) {
            require_once '../config/conexion.php';
        }

        $respuestaBorrar = $this->_FAQ->borrarFAQ($id);
        return $respuestaBorrar;
    }
}


if (isset($_POST['action-faq'])) {
    $FAQ = new faqController();

    switch ($_POST['action-faq']){
        case 'add':
            $FAQ = new faqController();
            $pregunta  = !empty($_POST['pregunta'])  ? filter_var($_POST['pregunta'], FILTER_SANITIZE_STRING) : '';
            $contenido = !empty($_POST['contenido']) ? filter_var($_POST['contenido'], FILTER_SANITIZE_STRING) : '';
            $orden     = !empty($_POST['orden'])     ? filter_var($_POST['orden'], FILTER_SANITIZE_NUMBER_INT) : 1;

            $respuestaInsertar = $FAQ->insertarFAQ($pregunta, $contenido, $orden);
            if($respuestaInsertar){
                echo"<script>Swal.fire('Elemento guardado con éxito!', '', 'success');";
                echo"window.setTimeout(function () {window.location.href = './?seccion=faq_section'}, 2000)</script>";
            }else {
                echo "<script>Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'No fue posible agregar los datos, verifique que los datos son correctos!',
                    footer: '',
                })
                window.setTimeout(function () {history.back()}, 2000)</script>";
            }

        break;
        case 'edit':
            $FAQ = new faqController();
            $pregunta  = !empty($_POST['pregunta']) ? $_POST['pregunta'] : '';
            $contenido = !empty($_POST['contenido']) ? $_POST['contenido'] : '';
            $orden     = !empty($_POST['orden']) ? $_POST['orden'] : 1;
            $id        = !empty($_POST['id']) ? $_POST['id'] : 0;
            
            $respuestaModificar = $FAQ->modificarFAQ($pregunta,$contenido,$orden,$id);
            if($respuestaModificar){
                echo"<script>Swal.fire('Elemento modificado con éxito!', '', 'success');";
                echo"window.setTimeout(function () {window.location.href = './?seccion=faq_section'}, 2000)</script>";
            }else {
               echo "<script>Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'No fue posible eliminar los datos, intente nuevamente!',
                    text: 'No fue posible modificar los datos, intente de nuevo',
                    footer: '',
                })
                
                window.setTimeout(function () {history.back()}, 2000)</script>";
            }
        break;
        case "borrar":
            $respuestaBorrar = $FAQ->borrarFAQ($_POST['id']);
            $FAQ = new faqController();
            $result = Array();
            $id = (!empty($_POST['id'])) ? $_POST['id'] : 0;
            if(!empty($id)){
                $respuestaBorrar = $FAQ->borrarFAQ($_POST['id']);
                if($respuestaBorrar){
                  $result['status']=  true;
                  $result['msn'] = "Elemento eliminado con éxito";
                } else {
                  $result['status']=  false;
                  $result['msn'] = "Hubo un inconveniente al borrar el elemento, intente nuevamente";
                }
           } else {
               $result['status']=  false;
                  $result['msn'] = "Parámetros no definidos";
           }
           echo json_encode($result);
        break;
        default:
        break;
    }
}