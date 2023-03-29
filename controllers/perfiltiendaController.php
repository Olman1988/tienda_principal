<?php
class perfiltiendaController{
	public $_PT;
	public function __construct(){
		$this->_PT = new perfiltiendaModel();
	}
	/**
     * 
     * 
     */
    public function consultarDatos(){
        $Perfil = $this->_PT->consultarDatos();
        
        return $Perfil;
    }
    /**
     * 
     * 
     */
	public function insertRecord(){
		$respuestaInsertar = $this->_PT->insertRecord();

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

        $respuestaModificar = $this->_PT->modificarDatos(
			$ARR['name'],
			$ARR['address'],
			$ARR['infoEmail'],
			$ARR['supportEmail'],
			$ARR['phone'],
			$ARR['mobile'],
			$ARR['whatsApp'],
			$ARR['latitude'],
			$ARR['longitude'],
			$ARR['logo'],
			$ARR['facebook'],
			$ARR['instagram'],
			$ARR['twitter'],
			$ARR['pinterest'],
			$ARR['linkedin'],
			$ARR['youtube'],
			$ARR['AppId'],
			$ARR['storeUrl'],
			$ARR['mapsEmbeded'],
			$ARR['id']
		);

        return $respuestaModificar;
    }
}
if (isset($_POST['action-perfil'])) {
    $PF = new perfiltiendaController();

    switch ($_POST['action-perfil']){
        case 'edit':
            $respuestaModificar = $PF->modificarDatos(
				$name,
				$address,
				$infoEmail,
				$supportEmail,
				$phone,
				$mobile,
				$whatsApp,
				$latitude,
				$longitude,
				$logo,
				$facebook,
				$instagram,
				$twitter,
				$pinterest,
				$linkedin,
				$youtube,
				$AppId,
				$storeUrl,
				$mapsEmbeded,
				$id
			);
            if($respuestaModificar){
                echo"<script>Swal.fire('Elemento modificado con éxito!', '', 'success');";
                echo"window.setTimeout(function () {window.location.href = './?seccion=perfil_tienda'}, 2000)</script>";
            }else {
               echo "<script>Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'No fue posible actualizar los datos, intente de nuevo',
                    footer: '',
                })
                window.setTimeout(function () {history.back()}, 2000)</script>";
            }
        break;
        default:
        break;
    }
}
?>