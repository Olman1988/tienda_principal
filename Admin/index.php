<?php
date_default_timezone_set("America/Costa_Rica");
session_start();
require_once '../config/parameters.php';
require_once "../config/conexion.php";
require_once "../models/generalModel.php";
require_once "../models/articulosModel.php";
require_once "../models/landingModel.php";
require_once "../models/categoriasModel.php";
require_once "../Security/userSecurity.php";

$consultaGeneral=new generalModel();
$profile=$consultaGeneral->consultaProfile();
require_once 'views/header.php';
$security = new userSecurity();
$securityAdmin = $security->isAdmin();
        if(isset($_SESSION['perfil'])){
            require_once 'views/navbar.php';
            switch ($_SESSION['perfil']) {
                case 'Admin':
                    if($securityAdmin){
                        if(isset($_GET['seccion'])){

                            switch ($_GET['seccion']) {
                                case "sliders":
                                    require_once "../controllers/slidersController.php";
                                    $consultaSliders =  new slidersController();
                                    $respSliders =  $consultaSliders->getSliders();
                                    if(!empty($respSliders)&&count($respSliders)>0){
                                       require_once 'views/sliders.php';  
                                    }
                                break;
                                case 'dashboard':
                                    echo 'dash';

                                    break;
                                case 'promociones':
                                    echo "<div style='margin-top:200px'></div>";

                                    $consultarPromociones = new generalModel();
                                    $respuestaPromos = $consultarPromociones -> consultarPromociones();
                                    require_once 'views/promociones.php';  
                                    break;
                                case 'categories':
                            if(isset($_GET['action'])){
                                switch ($_GET['action']) {

                                    case "add":
                                         $consultarCategorias = new categoriasModel();
                                         $responseAllCategories = $consultarCategorias->todasCategoriasAdmin(); 
                                         require_once 'views/categories/add-categories.php'; 
                                        break;
                                    case "edit":
                                         $consultarCategorias = new categoriasModel();
                                         $respuestaCategorias = $consultarCategorias->todasCategoriasAdmin();
                                         if(isset($_GET['id'])){
                                             //$_POST['action'] es encesario para usar la direccion de directorio de model correcta
                                            $modelNotRequired = true;
                                            require_once '../controllers/categoriasController.php';
                                            $responseCategories = new categoriasController();
                                            $responseAllCategories = $responseCategories->allCategoriesForAdmin();
                                            $oneCategory = $responseCategories->getCategoryById($_GET['id']);
                                            require_once 'views/categories/edit-categories.php'; 
                                             }
                                        break;
                                    case "action-add":
                                        require_once '../controllers/categoriasController.php';
                                        break;
                                    case "action-edit":
                                        require_once '../controllers/categoriasController.php';
                                        break;

                                    default:
                                        break;
                                }

                            } else {
                            $categories = new categoriasModel();
                            $respCategories = $categories -> allCategoriesForAdmin();
                            require_once 'views/categories.php'; 
                            }
                            break;
                                case 'paginaAterrizaje':
                                    $consultarLanding = new landingModel();
                                    $respuestaLanding = $consultarLanding -> consultarLandings();
                                    require_once 'views/landing.php';          
                                    break;
                                case "lookandfeel":
                                    require_once '../models/lookandfeelModel.php';  
                                    $consultaLAF = new lookandfeelModel();
                                    $respuestaLAF = $consultaLAF->consultarLAF();

                                    require_once 'views/lookandfeel.php';  
                                    require_once 'views/disenoImagen.php'; 
                                    break;
                                case 'cerrarSession':

                                    unset($_SESSION['perfil']);
                                    unset($_SESSION['idUsuario']);
                                    unset($_SESSION['nombre']);
                                    unset($_SESSION['apellido']);
                                    unset($_SESSION['DNI']);
                                    unset($_SESSION['provincia']);
                                    unset($_SESSION['canton']);
                                    unset($_SESSION['distrito']);
                                    unset($_SESSION['direccion']);
                                    unset($_SESSION['email']);
                                    unset($_SESSION['telefono']);
                                    unset($_SESSION['estado']);
                                    echo"<script>"
                                    . "  window.location.href = './'</script>";

                                    break;
                                case'infoLanding':
                                    $consultarClientes = new landingModel();
                                    $respuestaClientes=$consultarClientes->consultarClientes();
                                    require_once 'views/infoFormLanding.php';  
                                    break;
                                case'orders':
                                    $ordenes=new generalModel();
                                    $ordenesRespuesta=$ordenes->consultarOrdenesTodas();

                                    require_once 'views/orders.php';  
                                    break;
                                case "products":
                                    if(isset($_GET['action'])){
                                        switch ($_GET['action']) {

                                            case "add":
                                                 $consultarCategorias = new categoriasModel();
                                                 $respuestaCategorias = $consultarCategorias->todasCategoriasAdmin(); 
                                                 require_once 'views/products/add-product.php'; 
                                                break;
                                            case "edit":
                                                 $consultarCategorias = new categoriasModel();
                                                 $respuestaCategorias = $consultarCategorias->todasCategoriasAdmin();
                                                 if(isset($_GET['id'])){
                                                     //$_POST['action'] es encesario para usar la direccione de directorio de model correcta
                                                     $_POST['action'] = "edit";
                                                     require_once '../controllers/articulosController.php';
                                                    $responseArticulo = new articulosController();
                                                    $responseArticulo = $responseArticulo->articuloPorIdAdmin($_GET['id']);
                                                    require_once 'views/products/edit-product.php'; 
                                                     }
                                                break;
                                            case "action-add":
                                                require_once '../controllers/articulosController.php';
                                                break;
                                            case "action-edit":

                                                require_once '../controllers/articulosController.php';
                                                break;

                                            default:
                                                break;
                                        }

                                    } else {

                                         $consultarProductos = new articulosModel();
                                        $respuestaProductos = $consultarProductos -> todosArticulosAdmin();
                                          require_once 'views/products.php';
                                    }
                                    break;
                                    case "images":
                                        if(isset($_GET['action'])){
                                        switch ($_GET['action']) {
                                            case "add-images":
                                                require_once 'views/images/add-images.php'; 
                                                break;
                                            case "action-edit":
                                                                                case "action-edit":
                                                if(isset($_GET['id'])){
                                                     //$_POST['action'] es encesario para usar la direccione de directorio de model correcta
                                                     $_POST['action'] = "edit";
                                                     require_once '../controllers/articulosController.php';
                                                    $imagen= new articulosController();
                                                    $responseImagen = $imagen->imagenPorID($_GET['id']);
                                                    require_once 'views/images/edit-images.php'; 
                                                     }
                                                break;
                                            case "action-edit-image":
                                                require_once '../controllers/articulosController.php';

                                                break;
                                            case "action-add-image":
                                                require_once '../controllers/articulosController.php';
                                                break;
                                            default:
                                                break;
                                        }

                                    } else {
                                        $respuestaImagen= [];
                                        //Es necesario agregar esto para que el directorio de models se cargue bien
                                        $_POST['action'] = "images";
                                        if(isset($_GET['id'])){
                                           require_once '../controllers/articulosController.php';
                                        $imagen= new articulosController();
                                        $respuestaImagen=$imagen->todosImagenesPorId($_GET['id']);  
                                        }

                                        require_once 'views/images/general-images.php'; 
                                    }

                                        break;
                                default:
                                    break;
                            }
                        }
                    }
                    break;

                default:
                        unset($_SESSION['perfil']);
                            unset($_SESSION['idUsuario']);
                            unset($_SESSION['nombre']);
                            unset($_SESSION['apellido']);
                            unset($_SESSION['DNI']);
                            unset($_SESSION['provincia']);
                            unset($_SESSION['canton']);
                            unset($_SESSION['distrito']);
                            unset($_SESSION['direccion']);
                            unset($_SESSION['email']);
                            unset($_SESSION['telefono']);
                            unset($_SESSION['estado']);
                            echo"<script>"
                            . "  window.location.href = './'</script>";
                    break;
            }


        //FIN DEL DIV WRAPPER
            echo "</div>";
        } else {
          require_once 'views/login.php';  
        }


require_once 'views/footer.php';

?>