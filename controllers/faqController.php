<?php

class faqController{
    public $_FAQ;
    public function __construct(){
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
    public function insertarFAQ($pregunta, $contenido){
        if (isset($_POST['action'])) {
            require_once '../config/conexion.php';
        }
        $respuestaInsertar = $this->_FAQ->insertarFAQ($pregunta, $contenido);

        return $respuestaInsertar;
    }
    /**
     * 
     * 
     */
    public function modificarFAQ($pregunta, $contenido, $id){
        if (isset($_POST['action'])) {
            require_once '../config/conexion.php';
        }

        $respuestaModificar = $this->_FAQ->modificarFAQ($pregunta, $contenido, $id);

        return $respuestaModificar;
    }
    /**
     * 
     * 
     */
    public function borrarFAQ($id){
        if (isset($_POST['action'])) {
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
            $pregunta = !empty($_POST['pregunta']) ? filter_var($_POST['pregunta'], FILTER_SANITIZE_STRING) : '';
            $contenido = !empty($_POST['contenido']) ? filter_var($_POST['contenido'], FILTER_SANITIZE_STRING) : '';
            
            $respuestaInsertar = $FAQ->insertarFAQ($pregunta,$contenido);

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
            $pregunta  = !empty($_POST['pregunta']) ? $_POST['pregunta'] : '';
            $contenido = !empty($_POST['contenido']) ? $_POST['contenido'] : '';
            $id        = !empty($_POST['id']) ? $_POST['id'] : 0;
            
            $respuestaModificar = $FAQ->modificarFAQ($pregunta,$contenido,$id);
            if($respuestaModificar){
                echo"<script>Swal.fire('Elemento modificado con éxito!', '', 'success');";
                echo"window.setTimeout(function () {window.location.href = './?seccion=faq_section'}, 2000)</script>";
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
        case "borrar":
            $respuestaBorrar = $FAQ->borrarFAQ($_POST['id']);
            echo $respuestaBorrar;
        break;
        default:
        break;
    }
}
