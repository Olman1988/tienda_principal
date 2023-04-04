<?php
require_once '../models/blogModel.php';
require_once '../models/blogModel.php';
class blogController{
	public $_BLOG;
	public function __construct(){
		$this->_BLOG = new blogModel();
	}
	/**
	 * 
	 * 
	 */
	public function consultarBlogs(){
        $respuestaBlogs = $this->_BLOG->consultarBlogs();

        return $respuestaBlogs;
	}
	/**
	 * 
	 * 
	 */
	public function getPostById($id){
        $respuestaPost = $this->_BLOG->consultarBlog($id);

        return $respuestaPost;
	}
	/**
	 * 
	 * 
	 */
	public function insertBlog($titulo, $descripcion, $nombrefinal, $contenido){
		$respuestaInsert = $this->_BLOG->insertBlog($titulo, $descripcion, $nombrefinal, $contenido);
		return $respuestaInsert;   
	}
	/**
	 * 
	 * 
	 */
	public function updateBlog($id, $titulo, $descripcion, $nombrefinal, $contenido, $status){
		$respuestaUpdate = $this->_BLOG->updateBlog($id, $titulo, $descripcion, $nombrefinal, $contenido, $status);
		return $respuestaUpdate; 
	}
	/**
	 * 
	 * 
	 */
	public function deleteBlog($id){
		$Result = [];
		$respDelete = $this->_BLOG->deleteBlog($id);
		if($respDelete){
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
if(isset($_POST['action-blog'])){
	$BLOG = new blogController();

    switch ($_POST['action-blog']) {
        case 'edit':
			$archivo;
			$observacion;
			$validacion = true;
			$nombrefinal = '';

            $id = !empty($_POST['id'])? $_POST['id']:false;
            $titulo = !empty($_POST['title'])? $_POST['title']:false;
            $descripcion = !empty($_POST['description']) ? $_POST['description']: false;
            $contenido = !empty($_POST['content']) ? $_POST['content']: false;
            $status = ($_POST['status'] == 1) ? 'Active': 'Disabled';

			$provisionalName = !empty($_POST['filenameImg'])? $_POST['filenameImg']: false;
            if(isset($_FILES['file']['name'])&&$_FILES['file']['name']!=''){
                $archivo = $_FILES['file']['name'];
				$tipo = $_FILES['file']['type'];
                $tamano = $_FILES['file']['size'];
                $temp = $_FILES['file']['tmp_name'];
                if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000000))) {
                    $errorimg = true;
				}else {
	                $nombrefinal = $id.$archivo;

					if(!is_dir('../images/admin/blog/')) {
							mkdir('../images/admin/blog/', 0777, true);
					}
					if(file_exists('../images/admin/blog/' . $nombrefinal)){
						unlink('../images/admin/blog/' . $nombrefinal);
					} else {
						if (move_uploaded_file($temp, '../images/admin/blog/'.$nombrefinal)) {
							chmod('../images/admin/blog/'.$nombrefinal, 0777);
						}else {
							$errorimg = true;
						}
                    }
	            }
            } else {
                $nombrefinal = $provisionalName;
            }
            
            $nombrefinal = "images/admin/blog/".$nombrefinal;
            $respuestaActualizar = $BLOG->updateBlog($id, $titulo, $descripcion, $nombrefinal, $contenido, $status);
            
            if($respuestaActualizar){
                echo"<script>Swal.fire('Elemento modificado con éxito!', '', 'success');";
                echo"window.setTimeout(function () {window.location.href = './?seccion=blog_section'}, 2000)</script>";
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
        case "add":
            $archivo;
            $observacion;
            $validacion = true;
            $titulo = !empty($_POST['title'])? $_POST['title']:false;
            $descripcion = !empty($_POST['description']) ? $_POST['description']: false;
            $contenido = !empty($_POST['content']) ? $_POST['content']: false;
			
            $provisionalName = !empty($_POST['filenameImg'])? $_POST['filenameImg']:false;
            if($titulo){
                if(isset($_FILES['file']['name'])&&$_FILES['file']['name']!=''){
                    $archivo = $_FILES['file']['name'];
                    $tipo = $_FILES['file']['type'];
                    $tamano = $_FILES['file']['size'];
                    $temp = $_FILES['file']['tmp_name'];

					if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000000))) {
                        $errorimg = true;
					}else {
	                    $nombrefinal = $archivo;

						if (!is_dir('../images/admin/blog/')) {
							mkdir('../images/admin/blog/', 0777, true);
						}

						if(file_exists('../images/admin/blog/' . $nombrefinal)){
							unlink('../images/admin/blog/' . $nombrefinal);
						} else {
							if (move_uploaded_file($temp, '../images/admin/blog/'.$nombrefinal)) {
								chmod('../images/admin/blog/'.$nombrefinal, 0777);
							}else {
								$errorimg = true;
							}
                        }
                    }
                } 
            }

            $nombrefinal = "/images/admin/blog/".$nombrefinal;
            $respuestaInsertar = $BLOG->insertBlog($titulo, $descripcion, $contenido, $nombrefinal);
            
            if($respuestaInsertar){
                echo"<script>Swal.fire('Elemento guardado con éxito!', '', 'success');";
                echo"window.setTimeout(function () {window.location.href = './?seccion=blog_section'}, 2000)</script>";
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
            require_once '../models/blogModel.php';
            $respuestaEliminar = $BLOG->deleteBlog($_POST['id']);
          
		break;
        default:
		break;
    }
}