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
    public function createAU($nombre, $contenido, $orden, $active, $codigo){
        if (isset($_POST['action'])) {
            require_once '../config/conexion.php';
        }
        $respuestaInsertar = $this->_CONF->createAU($nombre, $contenido, $orden, $active, $codigo);
        return $respuestaInsertar;
    }
    
    public function codeGeneratorSmallCode(){
                
 $code=  strtoupper(uniqid());
 return $code;
      }
      public function deletePage($code){
          if (isset($_POST['action-edit'])) {
            require_once '../config/conexion.php';
        }
        $respuestaInsertar = $this->_CONF->deletePage($code);
        return $respuestaInsertar;
      }
}
if (isset($_POST['action-edit'])){
    $AUS = new aboutusController();

    switch ($_POST['action-edit']){
        case 'edit':
             $nombre    = (!empty($_POST['nombre']))    ? $_POST['nombre'] : '';
            $contenido = (!empty($_POST['contenido'])) ? $_POST['contenido'] : '';
            $orden     = (!empty($_POST['orden']))     ? $_POST['orden'] : 1;
            $activo    = (!empty($_POST['activo']))    ? $_POST['activo'] : 0;
            $codigo    = (!empty($_POST['codigo']))    ? $_POST['codigo'] : null;
            
            if(!empty($codigo) && !empty($nombre) && !empty($contenido)){
                $respuestaModificar = $AUS->modifyAUByCode($nombre, $contenido, $orden, $activo, $codigo);
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
        case "add":
            $nombre    = (!empty($_POST['nombre']))    ? $_POST['nombre'] : '';
            $contenido = (!empty($_POST['contenido'])) ? $_POST['contenido'] : '';
            $orden     = (!empty($_POST['orden']))     ? $_POST['orden'] : 1;
            $activo    = (!empty($_POST['activo']))    ? $_POST['activo'] : 0;
            $codigo    = $AUS->codeGeneratorSmallCode();
            
            if(!empty($codigo) && !empty($nombre) && !empty($contenido)){
                $respuestaInsertar = $AUS->createAU($nombre, $contenido, $orden, $activo, $codigo);
                var_dump($respuestaInsertar);
                if($respuestaInsertar){
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
            case"delete":
                
                 require_once '../models/aboutusModel.php';
                 $respuestaEliminar = $AUS->deletePage($_POST['code']);
                 echo $respuestaEliminar;
          
		break;
                break;
        default:
        break;
    }
}