<?php
require_once '../models/aboutusModel.php';
class aboutusController{
	public $_CONF;
	public function __construct(){
		$this->_CONF = new aboutusModel();
	}
    /**
	 * @method consultarPaginas
	 * @return array
	 */
	public function consultarPaginas(){
        $Configs = $this->_CONF->consultarPaginas();
        
        return $Configs;
    }
    /**
    * @method getAUByCode
    * 
    */
    public function getAUByCode($Codigo){
        $data = $this->_CONF->getAUByCode($Codigo);
        
        return $data;
    }
    /**
     * @method modifyAUByCode
     * 
     */
    public function modifyAUByCode($nombre, $contenido, $orden, $active, $codigo){
        if (isset($_POST['action'])) {
            require_once '../config/conexion.php';
        }
        $respuestaModificar = $this->_CONF->modifyAUByCode($nombre, $contenido, $orden, $active, $codigo);
        return $respuestaModificar;
    }
}
if (isset($_POST['action-edit'])){
    $AUS = new aboutusController();

    switch ($_POST['action-edit']){
        case 'edit':
            $nombre    = !empty($_POST['nombre']) ? $_POST['nombre'] : '';
            $contenido = !empty($_POST['contenido']) ? $_POST['contenido'] : '';
            $orden     = !empty($_POST['orden']) ? $_POST['orden'] : 1;
            $activo    = !empty($_POST['activo']) ? $_POST['activo'] : 1;
            $codigo    = !empty($_POST['codigo']) ? $_POST['codigo'] : null;
            
            if(!empty($codigo) && !empty($nombre) && !empty($contenido)){
                $respuestaModificar = $AUS->modifyAUByCode($pregunta, $contenido, $orden, $activo, $codigo);
                if($respuestaModificar){
                    echo"<script>Swal.fire('Elemento modificado con éxito!', '', 'success');";
                    echo"window.setTimeout(function () {window.location.href = './?seccion=about_us'}, 2000)</script>";
                }else {
                   echo "<script>Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'No fue posible editar los datos, intente nuevamente!',
                        footer: '',
                    })
                    
                    window.setTimeout(function () {history.back()}, 2000)</script>";
                }
            }else{
                echo "<script>Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'No fue posible editar los datos, intente nuevamente!',
                    footer: '',
                })
                
                window.setTimeout(function () {history.back()}, 2000)</script>";
            }
        break;
        default:
        break;
    }
}