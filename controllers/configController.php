<?php
class configuracionController{
	public $_CONF;
	public function __construct(){
		$this->_CONF = new configModel();
	}
	/**
	  * 
	  * 
	  */
	 public function consultarDatos(){
		  $Configs = $this->_CONF->consultarConfigs();
		  
		  return $Configs;
	 }
	 /**
	  * 
	  * 
	  */
	public function insertRecord(){
		$respuestaInsertar = $this->_CONF->insertConfiguracion();

		return $respuestaInsertar;
	}
	 /**
	  * 
	  * 
	  */
	public function modificarDatos($ARR){
		if (isset($_POST['action'])) {
			require_once '../config/conexion.php';
		}

		$respuestaModificar = $this->_CONF->modificarConfiguracion(
			$ARR['AppId'],
			$ARR['Tax'],
			$ARR['HomeType'],
			$ARR['idPaymentType'],
			$ARR['mostarPrecios'],
			$ARR['accesoAnonimo'],
			$ARR['envio'],
			$ARR['blog'],
			$ARR['preguntasFrecuentes'],
			$ARR['generalShipping'],
			$ARR['id']
		);

		return $respuestaModificar;
	}
}
//if (isset($_POST['action-config'])) {
//    $CC = new configuracionController();
//
//    switch ($_POST['action-config']){
//        case 'edit':
//			$AppId               = (isset($_POST['AppId'])) ? $_POST['AppId'] : '';
//			$Tax                 = (isset($_POST['Tax'])) ? $_POST['Tax'] : 0;
//			$HomeType            = (isset($_POST['HomeType'])) ? $_POST['HomeType'] : '';
//			$idPaymentType       = (isset($_POST['idPaymentType'])) ? $_POST['idPaymentType'] : 0;
//			$mostarPrecios       = (isset($_POST['mostarPrecios'])) ? $_POST['mostarPrecios'] : 0;
//			$accesoAnonimo       = (isset($_POST['accesoAnonimo'])) ? $_POST['accesoAnonimo'] : 0;
//			$envio  	         = (isset($_POST['envio'])) ? $_POST['envio'] : 0;
//			$blog  	             = (isset($_POST['blog'])) ? $_POST['blog'] : 0;
//			$preguntasFrecuentes = (isset($_POST['preguntasFrecuentes'])) ? $_POST['preguntasFrecuentes'] : 0;
//			$generalShipping     = (isset($_POST['generalShipping'])) ? $_POST['generalShipping'] : 0;
//			$id                  = !empty($_POST['id']) ? $_POST['id'] : 0;
//            $respuestaModificar = $CC->modificarDatos([
//				$AppId,
//				$Tax,
//				$HomeType,
//				$idPaymentType,
//				$mostarPrecios,
//				$accesoAnonimo,
//				$envio,
//				$blog,
//				$preguntasFrecuentes,
//				$generalShipping,
//				$id
//			]);
//			
//			if($respuestaModificar){
//                echo"<script>Swal.fire('Elemento modificado con éxito!', '', 'success');";
//                echo"window.setTimeout(function () {window.location.href = './?seccion=config_general'}, 2000)</script>";
//            }else {
//               echo "<script>Swal.fire({
//                    icon: 'error',
//                    title: 'Oops...',
//                    text: 'No fue posible actualizar los datos, intente de nuevo',
//                    footer: '',
//                })
//                window.setTimeout(function () {history.back()}, 2000)</script>";
//            }
//        break;
//        default:
//        break;
//    }
//}