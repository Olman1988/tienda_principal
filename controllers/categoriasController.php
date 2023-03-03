<?php
class categoriasController{
    public function __construct() {
        
    }
    public function todasCategoriasPadre(){
        require_once 'models/categoriasModel.php'; 
        $categorias= new categoriasModel();
           $respuestaCategorias=$categorias->todasCategoriasPadre(); 
           return $respuestaCategorias;
    }
    public function todasCategoriasPrincipal(){
        require_once 'models/categoriasModel.php'; 
       $categorias= new categoriasModel();
        $respuestaCategorias=$categorias->todasCategoriasDestacadas();

        require_once "views/principal/categoriasPrincipal.php";   
    }
    public function todasCategorias(){
        require_once 'models/categoriasModel.php'; 
        $categorias= new categoriasModel();
        $respuestaCategorias=$categorias->todasCategorias();
        $categorias= new categoriasController();
$todasCategoriasPadre=$categorias->todasCategoriasPadre();

        require_once "views/principal/categorias.php";
    }
    public function allCategoriesForAdmin(){
        require_once '../models/categoriasModel.php'; 
        $categories= new categoriasModel();
        $respCategories=$categories->allCategoriesForAdmin();
        return $respCategories;
    }
    public function todasCategoriasDestacadas(){
        require_once 'models/categoriasModel.php'; 
        $categorias= new categoriasModel();
        $respuestaCategorias=$categorias->todasCategorias();
       
        require_once "views/principal/categorias.php";
    }
    
    
    public function todasSubCategorias($idCategoria){
        require_once 'models/categoriasModel.php'; 
       $subcategorias= new categoriasModel();
       $respuestaSubCategorias=$subcategorias->consultarCategoriaPadre($idCategoria); 
       
       if(count($respuestaSubCategorias)>0){
           
           
           return $respuestaSubCategorias;
           
       } else {
           return false;
       }
        
      
        
    }
    public function todasSubCategoriasSidebar($idCategoria){
        require_once 'models/categoriasModel.php'; 
       $subcategorias= new categoriasModel();
       $respuestaSubCategorias=$subcategorias->consultarCategoriaPadre($idCategoria); 
       
       if(count($respuestaSubCategorias)>0){
           
           
           return true;
           
       } else {
           return false;
       }
        
      
        
    }
    public function todasSubCategoriasConHijos($idCategoria){
        require_once 'models/categoriasModel.php'; 
       $subcategorias= new categoriasModel();
       $respuestaSubCategorias=$subcategorias->consultarCategoriaPadre($idCategoria); 
            return $respuestaSubCategorias;
    }
    public function todasCategoriasParaMenu(){
        require_once 'models/categoriasModel.php'; 
        $categorias= new categoriasModel();
        $respuestaCategorias=$categorias->todasCategoriasParaMenu();
       
        return $respuestaCategorias;
    }
    public function todasCategoriasServicios(){
        require_once 'models/categoriasModel.php'; 
        $categorias= new categoriasModel();
        $respuestaServicios=$categorias->todasCategoriasServicios();
       
        return $respuestaServicios;
    }
     public function getCategoryById($id){
        
        $categorias= new categoriasModel();
        $respuestaCategorias=$categorias->getCategoryById($id);
        return $respuestaCategorias;
    }
    public function codeGenerator() {
                  $code=  strtoupper(uniqid());
                  return $code;
        }
        public function updateCategory($nombre,$categoriaPadre,$nombrefinal,$esServicio,$visible,$menu,$destacado,$id){
           require_once '../models/categoriasModel.php'; 
           $categorias= new categoriasModel();
           $respuestaCategorias=$categorias->updateCategory($nombre,$categoriaPadre,$nombrefinal,$esServicio,$visible,$menu,$destacado,$id);
           return $respuestaCategorias; 
        }
        public function insertCategory($nombre,$categoriaPadre,$nombrefinal,$esServicio,$visible,$menu,$destacado){
          require_once '../models/categoriasModel.php'; 
           $categorias= new categoriasModel();
           $respuestaCategorias=$categorias->insertCategory($nombre,$categoriaPadre,$nombrefinal,$esServicio,$visible,$menu,$destacado);
           return $respuestaCategorias;   
        }
        public function deleteCategory($id){
            $Result = Array();
            require_once '../config/conexion.php';
            require_once '../models/categoriasModel.php'; 
            require_once '../models/articulosModel.php'; 
            $requestArticulo= new articulosModel();
            $respArticulo = $requestArticulo->getArticulosByCategoriaID($id);
            
            if(!empty($respArticulo)&&count($respArticulo)>0){
               $Result['msn'] = "La categoría no puede borrarse, ya que está asociada a un producto";
               $Result['status'] = false;
              
            } else {
                
             $deleteCategory= new categoriasModel();
             $respDelete = $deleteCategory->deleteCategory($id);
             if($respDelete){
                $Result['msn'] = "Elemento eliminado con éxito";
                $Result['status'] = true;
             } else {
                $Result['msn'] = "Hubo un error al eliminar el item, intente nuevamente";
                $Result['status'] = false;
             }
            }
           header('Content-Type: application/json');
           echo json_encode($Result);
        }
}
if(isset($_POST['action-categories'])){
    switch ($_POST['action-categories']) {
        case 'edit':
           $archivo;
           $observacion;
           $validacion = true;
           $category= new categoriasController();
           $idgen=$category->codeGenerator();
           $nombrefinal = '';
            $id = !empty($_POST['id'])? $_POST['id']:false;
            $nombre = !empty($_POST['nombre'])? $_POST['nombre']:false;
            $categoriaPadre = !empty($_POST['categoriaPadre'])&&$_POST['categoriaPadre']!=-1? $_POST['categoriaPadre']:false;
            $esServicio = !empty($_POST['esServicio'])? 1:0;
            $visible= !empty($_POST['visible'])? 1:0;
            $menu = !empty($_POST['menu'])? 1:0;
            $destacado = !empty($_POST['destacado'])? 1:0;
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
                if (!is_dir('../images/shop/categories/')) {
                        mkdir('../images/shop/categories/', 0777, true);
                      
                    }

                    
                    if(file_exists('../images/shop/categories/' . $nombrefinal)){
                        
                        unlink('../images/shop/categories/' . $nombrefinal);
                   
                    } else {
                        
                       
                   
                        if (move_uploaded_file($temp, '../images/shop/categories/'.$nombrefinal)) {
                    chmod('../images/shop/categories/'.$nombrefinal, 0777);
                    
                }else {
                    $errorimg = true;
                }
                        
                    }
                
                
            }
            } else {
                $nombrefinal = $provisionalName;
            }
            
            $nombrefinal = "/images/shop/categories/".$nombrefinal;
           
            
            $respuestaInsertar = $category-> updateCategory($nombre,$categoriaPadre,$nombrefinal,$esServicio,$visible,$menu,$destacado,$id);
            
            if($respuestaInsertar){
                echo"<script>Swal.fire('Elemento modificado con éxito!', '', 'success');";
                echo"window.setTimeout(function () {window.location.href = './?seccion=categories'}, 2000)</script>";
                
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
            $category= new categoriasController();
            $idgen=$category->codeGenerator();
            $nombrefinal = '';
            $nombre = !empty($_POST['nombre'])? $_POST['nombre']:false;
            $categoriaPadre = !empty($_POST['categoriaPadre'])&&$_POST['categoriaPadre']!=-1? $_POST['categoriaPadre']:false;
            $esServicio = !empty($_POST['esServicio'])? 1:0;
            $visible= !empty($_POST['visible'])? 1:0;
            $menu = !empty($_POST['menu'])? 1:0;
            $destacado = !empty($_POST['destacado'])? 1:0;
            $provisionalName = !empty($_POST['filenameImg'])? $_POST['filenameImg']:false;
            if($nombre){
                if(isset($_FILES['file']['name'])&&$_FILES['file']['name']!=''){

                    $archivo = $_FILES['file']['name'];
                    $tipo = $_FILES['file']['type'];
                    $tamano = $_FILES['file']['size'];
                    $temp = $_FILES['file']['tmp_name'];
                    if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000000))) {
                        $errorimg = true;
                     }else {
                    $nombrefinal = $idgen.$archivo;
                    if (!is_dir('../images/shop/categories/')) {
                            mkdir('../images/shop/categories/', 0777, true);

                        }


                        if(file_exists('../images/shop/categories/' . $nombrefinal)){

                            unlink('../images/shop/categories/' . $nombrefinal);

                        } else {



                            if (move_uploaded_file($temp, '../images/shop/categories/'.$nombrefinal)) {
                        chmod('../images/shop/categories/'.$nombrefinal, 0777);

                    }else {
                        $errorimg = true;
                    }

                        }


                    }
                } 
            }
            $nombrefinal = "/images/shop/categories/".$nombrefinal;
            $respuestaInsertar = $category-> insertCategory($nombre,$categoriaPadre,$nombrefinal,$esServicio,$visible,$menu,$destacado);
            
            if($respuestaInsertar){
                echo"<script>Swal.fire('Elemento guardado con éxito!', '', 'success');";
                echo"window.setTimeout(function () {window.location.href = './?seccion=categories'}, 2000)</script>";
                
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
            $delete = new categoriasController();
            $respuestaPromo=$delete -> deleteCategory($_POST['id']);
            echo $respuestaPromo;
            break;
        default:
            break;
    }
    
}
