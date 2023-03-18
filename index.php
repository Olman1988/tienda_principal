        <?php
date_default_timezone_set("America/Costa_Rica");
ini_set('display_errors',1);
ini_set('log_errors',1);
ini_set("error_log","C:/xampp/htdocs/proyectos_2021/errores/logs");
 session_start(); 
require_once "config/parameters.php";
require_once "config/conexion.php";
require_once "models/generalModel.php";
require_once "models/lookandfeelModel.php";
$consultaLAF= new lookandfeelModel();
$respuestaLAF =  $consultaLAF -> consultarLAF();
$consultaGeneral=new generalModel();
$profile=$consultaGeneral->consultaProfile();
require_once "views/principal/header.php";
require_once "views/principal/socialMedia.php";
require_once "views/principal/buttons.php";
//Se usa para indicar el contenedor de referencia para que aparezcan los botones de WA y scroll
$referenciaParaBotones = 'sliderP';
$evaluar=new socialMedia();
 setlocale (LC_TIME, "es_ES");
 require_once 'controllers/articulosController.php';
 
//$respuesta;
//    try {
//            $db = conexion::getConnect();//Aqui se conecta a la base de datos
//               // $consulta =$db->prepare("SELECT i.id, i.nombre, i.modelo, i.marca, i.descripcion, i.cantidad, i.precio, ci.nombre AS categoria, cs.nombre AS subcategoria, i.image, e.nombre AS estado FROM tbl_productos i INNER JOIN tbl_categorias ci ON i.id_categoria = ci.id INNER JOIN tbl_subcategorias cs ON i.id_subcategoria = cs.id INNER JOIN tbl_estados e ON i.estado = e.id ORDER BY id");
//           $consulta =$db->prepare("SELECT * FROM Categorias");
//            $consulta->execute();
//            
//            foreach($consulta->fetchAll(PDO::FETCH_ASSOC) as $value){
//                    $respuesta[]=$value;
//                }
//            
//        } catch (PDOException $e) {
//            echo "se ha presentado un error " . $e->getMessage();
//            throw $e;
//        }
//        var_dump($respuesta);
?>
<!-- INICIO SIDEBAR -->

<div class="page-body" id="page-body" style="position:relative;z-index:10;overflow:hidden;max-height: 100%;">
    
<?php
require_once 'controllers/categoriasController.php';
$categorias= new categoriasController();
$todasCategoriasPadre=Array();
$todasCategoriasPadre=$categorias->todasCategoriasPadre();

$respCategorias=$categorias->todasCategoriasParaMenu();
$consultaAcercaDe=$consultaGeneral->consultaAcercaDe();
$servicios =  new articulosController();
$respuestaTodosServicios = $servicios ->todosServicios();

require_once "views/principal/sidebar.php";
require_once "views/principal/navbar.php";
if(isset($_GET['pag'])){
    
    switch ($_GET['pag']) {
        case "servicios":
            require_once 'controllers/articulosController.php';
            $servicios =  new articulosController();
            $servicios ->servicios();
            $productos=new articulosController();
            $productos->articulosDestacados();
            break;
        case "contacto":
            require_once "views/principal/contacto.php";
            break;
        case "resultados":
            
            require_once 'controllers/articulosController.php';
            $consultaBusqueda= new articulosController();
            if(isset($_GET['datos'])){
            $consultaBusqueda->buscadorArticulos($_GET['datos']);
            }
            break;
        case "nosotros":
            $referenciaParaBotones='info-up';
            require_once"views/nosotros/principalNosotros.php";
            
            break;
        
        case "blog":
            $referenciaParaBotones='info-up';
            if(isset($_GET['id'])){
               $blogPorId=$blog=$consultaGeneral->consultarBlogPorId($_GET['id']);
            }
            
               $blog=$consultaGeneral->consultarBlog(); 
            
            
            require_once"views/blog/principalBlog.php";

            break;
        case "categorias":
            
             if(isset($_GET['id'])){
                $referenciaParaBotones = 'info-up';
                require_once"views/principal/buttons.php";
                require_once 'controllers/categoriasController.php';
                $consultaCategoria= new categoriasController();
                $respuestaSubCategorias= $consultaCategoria->todasSubCategorias($_GET['id']);
               if($respuestaSubCategorias!=false){
                    if(count($respuestaSubCategorias)>0){
                       require_once "views/categorias/subCategorias.php";
                   }
               }
                if($respuestaSubCategorias==false){
                     
                require_once 'controllers/articulosController.php';
                $consulta= new articulosController();
                $respuestaArticulos=$consulta->todosArticulosPorCategoria($_GET['id']);
                require_once"views/categorias/productosPorCategoria.php";
                
                }
            
            } else {
                require_once 'controllers/articulosController.php';
                $referenciaParaBotones = 'categorias';
                $categorias->todasCategorias();
                $productos=new articulosController();
                $productos->articulosDestacados();
            }
            break;
            case "categoriasLista":
            
            if(isset($_GET['id'])){
                
                require_once 'controllers/categoriasController.php';
                $consultaCategoria= new categoriasController();
                $consultaCategoria= $consultaCategoria->todasSubCategorias($_GET['id']);
          if($consultaCategoria!=false){
              $respuestaSubCategorias = $consultaCategoria;
                    if(count($respuestaSubCategorias)>0){
                       require_once "views/categorias/subCategoriasLista.php";
                   }
               }
                if($consultaCategoria==false){
                     
                require_once 'controllers/articulosController.php';
                $consulta= new articulosController();
                $respuestaArticulos=$consulta->todosArticulosPorCategoria($_GET['id']);
                require_once"views/categorias/productosPorCategoriaLista.php";
                }
            
            } else {
                require_once"views/categorias/principalCategorias.php";
                $productos=new articulosController();
                 $productos->articulosDestacados();
            }
            break;
            case "product":
                if(isset($_GET['id'])){
                require_once 'controllers/articulosController.php';
                require_once 'carritoCompras/carritoController.php';
                $consulta= new articulosController();
                $consulta->articuloPorId($_GET['id']);
                }
            

            break;
         case "carrito":
             $_POST = [];
            require_once 'controllers/articulosController.php';
                require_once 'carritoCompras/carritoController.php';
                $articulo = new articulosController();
                if(isset($_SESSION['cotizacion'])){
                  require_once 'views/carritoCompras/tableArticulosCotizar.php';  
                }elseif (isset($_SESSION['carrito'])){
                    $carritoAnalisys =  new carritoController();
                    $arrayFromAnalisys = $carritoAnalisys->getDataForCart();
                    
                    echo "<div class='analisys'>";
                    if(isset($arrayFromAnalisys['status'])){
                        switch ($arrayFromAnalisys['status']) {
                            case "Change":
                                echo "<script>"
                                . "Swal.fire({
                                            title: 'Aviso',
                                            icon: 'info',
                                            text:'".$arrayFromAnalisys['msn']."',
                                            showCloseButton: true});</script>";
                                break;

                            default:
                                break;
                        }
                    }
                      echo "</div>";
                    require_once 'views/carritoCompras/tableArticulos.php'; 
                }else{
                    echo"<div class='text-center container' style='height:50vh'><h2 class='mt-4 text-center'>Sin datos que mostrar</h2>"
                    . "<h2 class='mt-4 text-center'>Carrito vacío</h2>"
                            . "<a href='./' class='btn btn-outline-secondary text-center mt-4'>SEGUIR COMPRANDO</a></div>";
                }    
        break;
        case "cuenta":
            
            if(isset($_GET['func'])){
            switch ($_GET['func']) {
                case "login":
                    
                    if(!isset($_SESSION['perfil'])){
                    require_once 'views/usuarios/login.php';
                    }else {
                        
                      require_once 'views/usuarios/menuNavegacion.php';
                      require_once 'views/usuarios/ordenes.php';  
                    }
                    break;
                case "registro":
                    require_once 'views/usuarios/registro.php';
                    break;
                case "ordenes":
                    require_once 'views/usuarios/menuNavegacion.php';
                    require_once 'views/usuarios/ordenes.php';
                    break;
                case "cerrar":
                    require_once 'views/usuarios/cerrarSesion.php';
                    break;
                 case "perfil":
                     require_once 'views/usuarios/menuNavegacion.php';
                    require_once 'views/usuarios/perfil.php';
                    break;
                case "cambioClave":
                     require_once 'views/usuarios/menuNavegacion.php';
                    require_once 'views/usuarios/cambioPassword.php';
                    break;
              
                default:
                    break;
            }
            } else {
                if(!isset($_SESSION['perfil'])){
                    require_once 'views/usuarios/login.php';
                    }else {
                      require_once 'views/usuarios/ordenes.php';  
                    }
            }
        break;
    case "checkout":
        
                require_once 'controllers/articulosController.php';
                require_once 'carritoCompras/carritoController.php';
                require_once 'controllers/accesos.php';
                $consultarSesion= new accesos();
                $respuestaSession=$consultarSesion::sessionIniciada();
                if($respuestaSession==true){
                    if (isset($_SESSION['carrito'])|| isset($_SESSION['cotizacion'])){
                switch ($_GET['step']) {
                     case 'resultTransaction':
                        require_once 'views/carritoCompras/resultTransaction.php';
                        break;
                    case 'general':
                        if(isset($_SESSION['cotizacion'])){
                            require_once 'views/carritoCompras/checkoutCotizar.php';
                        }else{
                            require_once 'views/carritoCompras/checkout.php';
                        }

                        break;
                    case 'shipping':
                        require_once 'controllers/logisticController.php';
                        $logistic = new logisticController();
                        $respLogistic = $logistic->getGeneralLogistic();
                        require_once 'views/carritoCompras/shipping.php';
                        break;
                    case 'payment':
                        $respuestaMetodos = $consultaGeneral ->consultarMetodos();
                        require_once 'views/carritoCompras/payment.php';
                        break;
                    case "review":
                        require_once 'views/carritoCompras/checkInformation.php';
                        break;

                    default:
                        echo "<script>window.setTimeout(function () {
                            window.location.href ='./?pag=carrito'
                        }, 0);              
                        </script>";
                        break;
                }
                    }else{
                       echo "<div style='height:60vh'></div><script>
                            window.setTimeout(function () {
                            window.location.href ='./?pag=carrito'
                            }, 0);              
                            </script>"; 
                    }
                } else {
                    echo "<div style='height:60vh'></div><script>Swal.fire({
                            icon: 'error',
                             title: 'Oops...',
                             text: 'Debe iniciar sesion para completar el proceso'
                                })
                            window.setTimeout(function () {
                            window.location.href ='./?pag=cuenta&&func=login'
                            }, 2000);              
                            </script>";
                }
                
        break;
                    

        default:
            break;
    }
    $respuestaMetodos = $consultaGeneral ->consultarMetodos();
   require_once "views/principal/footer2.php"; 
} else {
 
 $respuestaSlider=$consultaGeneral->consultarSlider();
 
require_once "views/principal/slider.php";
require_once 'controllers/generalController.php';

$consultaOfertas= new generalController();
$consultaOfertas->consultarOfertas();
$categorias->todasCategoriasPrincipal();
$productos=new articulosController();
$servicios =  new articulosController();
$servicios ->serviciosPrincipal();
$productos->articulosDestacados();
$respuestaMetodos = $consultaGeneral ->consultarMetodos();

require_once "views/principal/footer.php";


}


?>

    </div>
    </div>
</body>
</html>