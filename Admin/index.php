<?php
date_default_timezone_set("America/Costa_Rica");
session_start();
require_once '../config/parameters.php';
require_once "../config/conexion.php";
require_once "../models/generalModel.php";
require_once "../models/faqModel.php";
require_once "../models/blogModel.php";
require_once "../models/configModel.php";
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
                                case "attributeValues":
                                    require_once "../controllers/attributesController.php";
                                    $attribute = new attributesController();
                                    $nombre = '';
                                        if(isset($_GET['description'])){
                                            $nombre = $_GET['description'];
                                        }
                                    if(isset($_GET['action'])){
                                        switch ($_GET['action']) {
                                            case "add":
                                                require_once 'views/attributes/add-value-attribute.php'; 
                                                break;
                                            case "edit":
                                                $id = !empty($_GET['id'])?filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT):false;
                                                if($id){
                                                   $attribute->getAttributeValueById($_GET['id']);
                                                }
                                                break;
                                            case "action-add":
                                                $description = !empty($_POST['nombre'])?filter_var($_POST['nombre'], FILTER_SANITIZE_STRING):'';
                                                $order = !empty($_POST['orden'])?filter_var($_POST['orden'], FILTER_SANITIZE_NUMBER_INT):'';
                                                $color = !empty($_POST['color'])?filter_var($_POST['color'], FILTER_SANITIZE_STRING):''; 
                                                $id = !empty($_POST['id'])?filter_var($_POST['id'], FILTER_SANITIZE_STRING):'';  
                                                $respInsert=false;
                                                $nombrefinal = '';
                                                $provisionalName = !empty($_POST['filenameImg'])? $_POST['filenameImg']:false;
                                                $idgen = $attribute->codeGenerator();
                                                if($description){
                                                    if(isset($_FILES['file']['name'])&&$_FILES['file']['name']!=''){

                                                        $archivo = $_FILES['file']['name'];
                                                        $tipo = $_FILES['file']['type'];
                                                        $tamano = $_FILES['file']['size'];
                                                        $temp = $_FILES['file']['tmp_name'];
                                                        if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000000))) {
                                                            $errorimg = true;
                                                         }else {
                                                        $nombrefinal = $idgen.$archivo;
                                                        if (!is_dir('../images/atributos/')) {
                                                                mkdir('../images/atributos/', 0777, true);
                                                            }
                                                            if(file_exists('../images/atributos/' . $nombrefinal)){

                                                                unlink('../images/atributos/' . $nombrefinal);

                                                            } else {



                                                                if (move_uploaded_file($temp, '../images/atributos/'.$nombrefinal)) {
                                                            chmod('../images/atributos/'.$nombrefinal, 0777);

                                                        }else {
                                                            $errorimg = true;
                                                        }

                                                            }


                                                        }
                                                    } 
                                                    $nombrefinal = $nombrefinal!=''?"/images/atributos/".$nombrefinal:'';
                                                    $respInsert = $attribute->setAttributeValues($description,$order,$color,$nombrefinal,$id);
                                                }
                                                if($respInsert){
                                                        echo"<script>Swal.fire('Elemento guardado con éxito!', '', 'success');";
                                                        echo"window.setTimeout(function () {window.location.href = './?seccion=attributeValues&&id=".$id."&&description=".$_GET['description']."'}, 2000)</script>";

                                                    }else {
                                                       echo "<script>Swal.fire({
                                                                    icon: 'error',
                                                                    title: 'Oops...',
                                                                    text: 'No fue posible agregar los datos, intente nuevamente!',
                                                                    footer: '',

                                                                })
                                                                      window.setTimeout(function () {history.back()}, 2000)
                                                                </script>";
                                                       
                                                    }
                                                break;
                                            case "action-edit":
                                                $description = !empty($_POST['nombre'])?filter_var($_POST['nombre'], FILTER_SANITIZE_STRING):'';
                                                $order = !empty($_POST['orden'])?filter_var($_POST['orden'], FILTER_SANITIZE_NUMBER_INT):0;
                                                $color = !empty($_POST['color'])?filter_var($_POST['color'], FILTER_SANITIZE_STRING):''; 
                                                $id = !empty($_POST['id'])?filter_var($_POST['id'], FILTER_SANITIZE_STRING):'';
                                                $idAtributoEspecial = !empty($_POST['idAtributoEspecial'])?filter_var($_POST['idAtributoEspecial'], FILTER_SANITIZE_NUMBER_INT):'';
                                                $descriptionGeneral = !empty($_POST['descriptionGeneral'])?filter_var($_POST['descriptionGeneral'], FILTER_SANITIZE_STRING):'';
                                                $idgen = $attribute->codeGenerator();
                                                $nombrefinal = '';
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
                                               if (!is_dir('../images/atributos/')) {
                                                       mkdir('../images/atributos/', 0777, true);

                                                   }


                                                   if(file_exists('../images/atributos/' . $nombrefinal)){

                                                       unlink('../images/atributos/' . $nombrefinal);

                                                   } else {



                                                       if (move_uploaded_file($temp, '../images/atributos/'.$nombrefinal)) {
                                                   chmod('../images/atributos/'.$nombrefinal, 0777);

                                               }else {
                                                   $errorimg = true;
                                               }

                                                   }


                                           }
                                           } else {
                                               $nombrefinal = $provisionalName;
                                            }
                                               $nombrefinal = $nombrefinal!=''?"/images/atributos/".$nombrefinal:'';
                                                $respInsert=false;
                                                if($description!=''&&$id){
                                                $respInsert = $attribute->updAttributesValues($description,$order,$color,$id,$nombrefinal);
                                                } 
                                                if($respInsert){
                                                        echo"<script>Swal.fire('Elemento modificado con éxito!', '', 'success');";
                                                      echo"window.setTimeout(function () {window.location.href = './?seccion=attributeValues&&id=$idAtributoEspecial&&description=$descriptionGeneral'}, 2000)</script>";

                                                    }else {
                                                       echo "<script>Swal.fire({
                                                                    icon: 'error',
                                                                    title: 'Oops...',
                                                                    text: 'No fue posible agregar los datos, intente nuevamente!',
                                                                    footer: '',

                                                                })
                                                                    /**window.setTimeout(function () {history.back()}, 2000)**/
                                                                </script>";
                                                       
                                                    }
                                                break;   
                                            case "delete":
                                                $id = !empty($_GET['id'])?filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT):false;
                                                $description = !empty($_GET['description'])?filter_var($_GET['description'],FILTER_SANITIZE_STRING):false;
                                                $idAtributo =!empty($_GET['idAtributo'])?filter_var($_GET['idAtributo'],FILTER_SANITIZE_NUMBER_INT):false;
                                              
                                                $respDel = false;
                                                if($id){
                                                $respDel = $attribute->delAttributesValues($id);
                                                }
                                                if($respDel){
                                                        echo"<script>Swal.fire('Elemento eliminado con éxito!', '', 'success');";
                                                        echo"window.setTimeout(function () {window.location.href = './?seccion=attributeValues&&id=$idAtributo&&description=$description'}, 2000)</script>";

                                                    }else {
                                                       echo "<script>Swal.fire({
                                                                    icon: 'error',
                                                                    title: 'Oops...',
                                                                    text: 'No fue posible eliminar los datos, intente nuevamente!',
                                                                    footer: '',

                                                                })
                                                           window.setTimeout(function () {history.back()}, 2000)
                                                                </script>";
                                                       
                                                    }
                                                break;
                                            default:
                                                break;
                                        }
                                    } else {
                                        
                                        if(isset($_GET['id'])&&!empty($_GET['id'])){
                                            $attribute->getAllAttributeValues($_GET['id'],$nombre);
                                            
                                        } else {
                                            echo "<script>Swal.fire({
                                                                    icon: 'error',
                                                                    title: 'Oops...',
                                                                    text: 'No fue posible mostrar los datos, intente nuevamente!',
                                                                    footer: '',

                                                                })
                                                           window.setTimeout(function () {history.back()}, 2000)
                                                                </script>";
                                        }
                                    }
                                    break;
                                case "attributes":
                                    require_once "../controllers/attributesController.php";
                                    $attribute = new attributesController();
                                    if(isset($_GET['action'])){
                                        switch ($_GET['action']) {
                                            case "add":
                                                require_once 'views/attributes/add-attribute.php'; 
                                                break;
                                            case "edit":
                                                $id = !empty($_GET['id'])?filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT):false;
                                                if($id){
                                                    $attribute->getAttributeById($_GET['id']);
                                                }
                                                
                                                break;
                                            case "action-add":
                                                $description = !empty($_POST['nombre'])?filter_var($_POST['nombre'], FILTER_SANITIZE_STRING):'';
                                                $control = !empty($_POST['control'])?filter_var($_POST['control'], FILTER_SANITIZE_STRING):'';
                                                    
                                                $respInsert=false;
                                                if($description!=''&&$control!=''){
                                                $respInsert = $attribute->setAttributes($description,$control);
                                                }
                                                if($respInsert){
                                                        echo"<script>Swal.fire('Elemento guardado con éxito!', '', 'success');";
                                                        echo"window.setTimeout(function () {window.location.href = './?seccion=attributes'}, 2000)</script>";

                                                    }else {
                                                       echo "<script>Swal.fire({
                                                                    icon: 'error',
                                                                    title: 'Oops...',
                                                                    text: 'No fue posible agregar los datos, intente nuevamente!',
                                                                    footer: '',

                                                                })
                                                                      window.setTimeout(function () {history.back()}, 2000)
                                                                </script>";
                                                       
                                                    }
                                                break;
                                            case "action-edit":
                                                $description = !empty($_POST['nombre'])?filter_var($_POST['nombre'], FILTER_SANITIZE_STRING):'';
                                                $id = !empty($_POST['id'])?filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT):false;
                                                $control = !empty($_POST['control'])?filter_var($_POST['control'], FILTER_SANITIZE_STRING):false;
                                               
                                                $respInsert=false;
                                                if($description!=''&&$id&&$control){
                                                $respInsert = $attribute->updAttributes($description,$id,$control);
                                                } 
                                                if($respInsert){
                                                        echo"<script>Swal.fire('Elemento modificado con éxito!', '', 'success');";
                                                      echo"window.setTimeout(function () {window.location.href = './?seccion=attributes'}, 2000)</script>";

                                                    }else {
                                                       echo "<script>Swal.fire({
                                                                    icon: 'error',
                                                                    title: 'Oops...',
                                                                    text: 'No fue posible agregar los datos, intente nuevamente!',
                                                                    footer: '',

                                                                })
                                                                    window.setTimeout(function () {history.back()}, 2000)
                                                                </script>";
                                                       
                                                    }
                                                break;   
                                            case "delete":
                                                $id = !empty($_GET['id'])?filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT):false;
                                                $respDel = false;
                                                if($id){
                                                $respDel = $attribute->delAttributes($id);
                                                }
                                                if($respDel){
                                                        echo"<script>Swal.fire('Elemento eliminado con éxito!', '', 'success');";
                                                        echo"window.setTimeout(function () {window.location.href = './?seccion=attributes'}, 2000)</script>";

                                                    }else {
                                                       echo "<script>Swal.fire({
                                                                    icon: 'error',
                                                                    title: 'Oops...',
                                                                    text: 'No fue posible eliminar los datos, intente nuevamente!',
                                                                    footer: '',

                                                                })
                                                           window.setTimeout(function () {history.back()}, 2000)
                                                                </script>";
                                                       
                                                    }
                                                break;
                                            default:
                                                break;
                                        }
                                    } else {
                                        $attribute->getAllAttributes();
                                    }
                                    //action-add
                                    break;
                                case "attributesGroup":
                                    require_once "../controllers/attributesController.php";
                                    $attribute = new attributesController();
                                    if(isset($_GET['action'])){
                                        switch ($_GET['action']) {
                                            case "desasociate-product":
                                                $resp = false;
                                                $cod= isset($_GET['cod'])&&$_GET['cod']>0?filter_var($_GET['cod'],FILTER_SANITIZE_NUMBER_INT):'';
                                                $description = isset($_GET['description'])?filter_var($_GET['description'],FILTER_SANITIZE_STRING):'';
                                                $idGroup =  isset($_GET['idGroup'])?filter_var($_GET['idGroup'],FILTER_SANITIZE_NUMBER_INT):''; 
                                              if(!empty($cod)&&!empty($idGroup)){
                                                    $resp = $attribute->delAttributesVsProduct($idGroup,$cod);
                                                }
                                                if($resp){
                                                            echo"<script>Swal.fire('Elemento desasociado con éxito!', '', 'success');";
                                                            echo"window.setTimeout(function () {window.location.href = './?seccion=attributesGroup&&action=asociate-product&&id=$cod&&desc=$description'}, 2000)</script>";

                                                        }else {
                                                           echo "<script>Swal.fire({
                                                                        icon: 'error',
                                                                        title: 'Oops...',
                                                                        text: 'No fue posible eliminar los datos, intente nuevamente!',
                                                                        footer: '',

                                                                    })
                                                               window.setTimeout(function () {history.back()}, 2000)
                                                                    </script>";

                                                        }
                                                break;
                                            case "asociate-product-add":
                                                $resp = false;
                                                $cod= isset($_POST['cod'])&&$_POST['cod']>0?filter_var($_POST['cod'],FILTER_SANITIZE_NUMBER_INT):'';
                                                $description = isset($_POST['description'])?filter_var($_POST['description'],FILTER_SANITIZE_STRING):'';
                                                $idAttribute =  isset($_POST['attribute'])?filter_var($_POST['attribute'],FILTER_SANITIZE_NUMBER_INT):''; 
                                                if(!empty($cod)&&!empty($idAttribute)&&$idAttribute>0){
                                                    $resp = $attribute->setAllAttributesByProduct($idAttribute,$cod);
                                                }
                                                if($resp){
                                                            echo"<script>Swal.fire('Elemento asociado con éxito!', '', 'success');";
                                                            echo"window.setTimeout(function () {window.location.href = './?seccion=attributesGroup&&action=asociate-product&&id=$cod&&desc=$description'}, 2000)</script>";

                                                        }else {
                                                           echo "<script>Swal.fire({
                                                                        icon: 'error',
                                                                        title: 'Oops...',
                                                                        text: 'No fue posible eliminar los datos, intente nuevamente!',
                                                                        footer: '',

                                                                    })
                                                               window.setTimeout(function () {history.back()}, 2000)
                                                                    </script>";

                                                        }
                                                break;
                                            case"asociate-product":
                                                $id= isset($_GET['id'])&&$_GET['id']>0?filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT):'';
                                                if(!empty($id)){
                                                    $attribute->getAllAttributesByProduct($_GET['id']);
                                                }
                                                break;
                                            case "asociate-attribute":
                                                $idAtributo = isset($_POST['attribute'])?filter_var($_POST['attribute'],FILTER_SANITIZE_NUMBER_INT):'';
                                                $idGroup= isset($_POST['idGroup'])?filter_var($_POST['idGroup'],FILTER_SANITIZE_NUMBER_INT):'';
                                                $description= isset($_POST['description'])?filter_var($_POST['description'],FILTER_SANITIZE_STRING):'';
                                                if($idAtributo&&$idGroup){
                                                    $respAttr = $attribute->setAttributeGroupVsAttribute($idAtributo,$idGroup);
                                                    if($respAttr){
                                                            echo"<script>Swal.fire('Elemento asociado con éxito!', '', 'success');";
                                                            echo"window.setTimeout(function () {window.location.href = './?seccion=attributesGroup&&action=asociate&&id=$idGroup&&description=$description'}, 2000)</script>";

                                                        }else {
                                                           echo "<script>Swal.fire({
                                                                        icon: 'error',
                                                                        title: 'Oops...',
                                                                        text: 'No fue posible eliminar los datos, intente nuevamente!',
                                                                        footer: '',

                                                                    })
                                                               window.setTimeout(function () {history.back()}, 2000)
                                                                    </script>";

                                                        }
                                                }else{
                                                    echo "<script>Swal.fire({
                                                                        icon: 'error',
                                                                        title: 'Oops...',
                                                                        text: 'No fue posible eliminar los datos, intente nuevamente!',
                                                                        footer: '',

                                                                    })
                                                               window.setTimeout(function () {history.back()}, 2000)
                                                                    </script>";
                                                }
                                                break;
                                            case "desasoc":
                                                $idGroup = isset($_GET['idGroup'])?filter_var($_GET['idGroup'],FILTER_SANITIZE_NUMBER_INT):'';
                                                $idAtributo= isset($_GET['id'])&&$_GET['id']>0?filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT):'';
                                                $description= isset($_GET['description'])?filter_var($_GET['description'],FILTER_SANITIZE_STRING):'';
                                                
                                                if($idAtributo&&$idGroup){
                                                    $respDel = $attribute->delAttributeGroupVsAttribute($idAtributo,$idGroup);
                                                    if($respDel){
                                                            echo"<script>Swal.fire('Elemento eliminado con éxito!', '', 'success');";
                                                            echo"window.setTimeout(function () {window.location.href = './?seccion=attributesGroup&&action=asociate&&id=$idGroup&&description=$description'}, 2000)</script>";

                                                        }else {
                                                           echo "<script>Swal.fire({
                                                                        icon: 'error',
                                                                        title: 'Oops...',
                                                                        text: 'No fue posible eliminar los datos, intente nuevamente!',
                                                                        footer: '',

                                                                    })
                                                               window.setTimeout(function () {history.back()}, 2000)
                                                                    </script>";

                                                        }
                                                } else {
                                                    echo "<script>Swal.fire({
                                                                        icon: 'error',
                                                                        title: 'Oops...',
                                                                        text: 'No fue posible eliminar los datos, intente nuevamente!',
                                                                        footer: '',

                                                                    })
                                                               window.setTimeout(function () {history.back()}, 2000)
                                                                    </script>";
                                                }
                                                break;
                                            case "add":
                                                require_once 'views/attributes/add-attributeGroup.php'; 
                                                break;
                                            case "edit":
                                                $id = !empty($_GET['id'])?filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT):false;
                                                if($id){
                                                    $attribute->getAttributeGroupById($_GET['id']);
                                                    
                                                }
                                                
                                                break;
                                            case "action-add":
                                                $description = !empty($_POST['nombre'])?filter_var($_POST['nombre'], FILTER_SANITIZE_STRING):'';
                                                $respInsert=false;
                                                if($description!=''){
                                                $respInsert = $attribute->setAttributesGroup($description);
                                                }
                                                if($respInsert){
                                                        echo"<script>Swal.fire('Elemento guardado con éxito!', '', 'success');";
                                                        echo"window.setTimeout(function () {window.location.href = './?seccion=attributesGroup'}, 2000)</script>";

                                                    }else {
                                                       echo "<script>Swal.fire({
                                                                    icon: 'error',
                                                                    title: 'Oops...',
                                                                    text: 'No fue posible agregar los datos, intente nuevamente!',
                                                                    footer: '',

                                                                })
                                                                        window.setTimeout(function () {history.back()}, 2000)
                                                                </script>";
                                                       
                                                    }
                                                break;
                                            case "action-edit":
                                                $description = !empty($_POST['nombre'])?filter_var($_POST['nombre'], FILTER_SANITIZE_STRING):'';
                                                $id = !empty($_POST['id'])?filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT):false;

                                                $respInsert=false;
                                                if($description!=''&&$id){
                                                $respInsert = $attribute->updAttributesGroup($description,$id);
                                                } 
                                                if($respInsert){
                                                        echo"<script>Swal.fire('Elemento modificado con éxito!', '', 'success');";
                                                        echo"window.setTimeout(function () {window.location.href = './?seccion=attributesGroup'}, 2000)</script>";

                                                    }else {
                                                       echo "<script>Swal.fire({
                                                                    icon: 'error',
                                                                    title: 'Oops...',
                                                                    text: 'No fue posible agregar los datos, intente nuevamente!',
                                                                    footer: '',

                                                                })
                                                                    window.setTimeout(function () {history.back()}, 2000)
                                                                </script>";
                                                       
                                                    }
                                                break;   
                                            case "delete":
                                                $id = !empty($_GET['id'])?filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT):false;
                                                $respDel = false;
                                                if($id){
                                                $respDel = $attribute->delAttributesGroup($id);
                                                }
                                                if($respDel){
                                                        echo"<script>Swal.fire('Elemento eliminado con éxito!', '', 'success');";
                                                        echo"window.setTimeout(function () {window.location.href = './?seccion=attributesGroup'}, 2000)</script>";

                                                    }else {
                                                       echo "<script>Swal.fire({
                                                                    icon: 'error',
                                                                    title: 'Oops...',
                                                                    text: 'No fue posible eliminar los datos, intente nuevamente!',
                                                                    footer: '',

                                                                })
                                                            window.setTimeout(function () {history.back()}, 2000)
                                                                </script>";
                                                       
                                                    }
                                                break;
                                            case "asociate":
                                                $id = !empty($_GET['id'])?filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT):false;
                                                $description = !empty($_GET['descripcion'])?filter_var($_GET['descripcion'], FILTER_SANITIZE_STRING):'';
                                                $attribute->getAllAttributesByGroup($id,$description);
                                                
                                                break;
                                            default:
                                                break;
                                        }
                                    } else {
                                         $respAttribute = $attribute->getAllAttributesGroup();
                                         require_once 'views/attributesGroup.php';
                                    
                                    }
                                    //action-add
                                    break;
                                case "quotes":
                                    require_once "../controllers/cotizacionesController.php";
                                    $consultaQuotes=  new cotizacionesController();
                                    $respQuote = $consultaQuotes-> getAllQuotes();
                                    break;
                                case "sliders":
                                    require_once "../controllers/slidersController.php";
                                    $consultaSliders =  new slidersController();
                                    if(isset($_GET['action'])){
                                        switch ($_GET['action']) {
                                            case "add":
                                                require_once 'views/sliders/add-sliders.php'; 
                                                break;
                                            case "edit":
                                                $respConsultaSliders = $consultaSliders->getSliderById($_GET['id']);
                                                require_once 'views/sliders/edit-sliders.php'; 
                                                break;
                                            case "action-add":
                                             require_once '../controllers/slidersController.php';
                                             break;
                                            case "action-edit":
                                            require_once '../controllers/slidersController.php';
                                            break;
                                            default:
                                                break;
                                        }
                                    } else {
                                         $respSliders =  $consultaSliders->getAllSlidersAdmin();
                                    
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
                                case 'faq_section':
                                    $_FAQ = new faqModel();

                                    if(isset($_GET['action'])){
                                        switch ($_GET['action']) {
                                            case "add":
                                                 require_once 'views/faq/add-faq.php'; 
                                                break;
                                            case "edit":
                                                if(isset($_GET['id'])){
                                                    //$_POST['action'] es encesario para usar la direccion de directorio de model correcta
                                                    $modelNotRequired = true;
                                                    require_once '../controllers/faqController.php';
                                                    $oneFAQ = $_FAQ->getFaqById($_GET['id']);
                                                    require_once 'views/faq/edit-faq.php'; 
                                                }
                                            break;
                                            case "action-add":
                                                require_once '../controllers/faqController.php';
                                            break;
                                            case "action-edit":
                                                require_once '../controllers/faqController.php';
                                            break;
                                            default:
                                            break;
                                        }
                                    } else {
                                        $respuestaFAQ = $_FAQ->consultarFAQ();
                                        require_once 'views/faq.php'; 
                                    }
                                break;
                                case 'perfil_tienda':
                                   
                                      require_once "../models/perfiltiendaModel.php";
                                    require_once "../controllers/perfiltiendaController.php";
                                    $PTC = new perfiltiendaController();
                                    $respuestaDatos = $PTC->consultarDatos();
                                    $respuestaDatos = $respuestaDatos[0];
                                    if(isset($respuestaDatos['id'])){
                                        
                                        if(isset($_GET['action'])){
                                         
                                            switch ($_GET['action']) {
                                                case "action-edit":
                                                    $name         = (isset($_POST['name'])) ? $_POST['name'] : '';
                                                    $address      = (isset($_POST['address'])) ? $_POST['address'] : '';
                                                    $infoEmail    = (isset($_POST['infoEmail'])) ? $_POST['infoEmail'] : '';
                                                    $supportEmail = (isset($_POST['supportEmail'])) ? $_POST['supportEmail'] : '';
                                                    $phone     	  = (isset($_POST['phone'])) ? $_POST['phone'] : '';
                                                    $mobile    	  = (isset($_POST['mobile'])) ? $_POST['mobile'] : '';
                                                    $whatsApp  	  = (isset($_POST['whatsApp'])) ? $_POST['whatsApp'] : '';
                                                    $latitude  	  = (isset($_POST['latitude'])) ? $_POST['latitude'] : '';
                                                    $longitude 	  = (isset($_POST['longitude'])) ? $_POST['longitude'] : '';
                                                    $logo         = (isset($_POST['logo'])) ? $_POST['logo'] : '';
                                                    $facebook     = (isset($_POST['facebook'])) ? $_POST['facebook'] : '';
                                                    $instagram    = (isset($_POST['instagram'])) ? $_POST['instagram'] : '';
                                                    $twitter      = (isset($_POST['twitter'])) ? $_POST['twitter'] : '';
                                                    $pinterest    = (isset($_POST['pinterest'])) ? $_POST['pinterest'] : '';
                                                    $linkedin     = (isset($_POST['linkedin'])) ? $_POST['linkedin'] : '';
                                                    $youtube      = (isset($_POST['youtube'])) ? $_POST['youtube'] : '';
                                                    $AppId        = (isset($_POST['AppId'])) ? $_POST['AppId'] : '';
                                                    $storeUrl     = (isset($_POST['storeUrl'])) ? $_POST['storeUrl'] : '';
                                                    $mapsEmbeded  = (isset($_POST['mapsEmbeded'])) ? $_POST['mapsEmbeded'] : '';
                                                    $id           = !empty($_POST['id']) ? $_POST['id'] : 0;
                                                    $nombrefinal  = '';

                                                    if(isset($_FILES['file']['name']) && $_FILES['file']['name']!=''){
                                                        $archivo = $_FILES['file']['name'];
                                                        $tipo = $_FILES['file']['type'];
                                                        $tamano = $_FILES['file']['size'];
                                                        $temp = $_FILES['file']['tmp_name'];

                                                        if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000000))) {
                                                            $errorimg = true;
                                                        }else {
                                                            $nombrefinal = $id.$archivo;
                                        
                                                            if(!is_dir('../images/admin/logos/')) {
                                                                    mkdir('../images/admin/logos/', 0777, true);
                                                            }

                                                            if(file_exists('../images/admin/logos/' . $nombrefinal)){
                                                                unlink('../images/admin/logos/' . $nombrefinal);
                                                            } else {
                                                                if (move_uploaded_file($temp, '../images/admin/logos/'.$nombrefinal)) {
                                                                    chmod('../images/admin/logos/'.$nombrefinal, 0777);
                                                                }else {
                                                                    $errorimg = true;
                                                                }
                                                            }
                                                        }
                                                    } else {
                                                        
                                                        $nombrefinal = (isset($_POST['filenameImg'])) ? $_POST['filenameImg'] : '';
                                                    }
                                                    $nombrefinal = 'images/admin/logos/'.$nombrefinal;
                                                    $ARR = [
                                                        'name'=>$name,
                                                        'address'=>$address,
                                                        'infoEmail'=>$infoEmail,
                                                        'supportEmail'=>$supportEmail,
                                                        'phone'=>$phone,
                                                        'mobile'=>$mobile,
                                                        'whatsApp'=>$whatsApp,
                                                        'latitude'=>$latitude,
                                                        'longitude'=>$longitude,
                                                        'logo'=>$nombrefinal,
                                                        'facebook'=>$facebook,
                                                        'instagram'=>$instagram,
                                                        'twitter'=>$twitter,
                                                        'pinterest'=>$pinterest,
                                                        'linkedin'=>$linkedin,
                                                        'youtube'=>$youtube,
                                                        'AppId'=>$AppId,
                                                        'storeUrl'=>$storeUrl,
                                                        'mapsEmbeded'=>$mapsEmbeded,
                                                        'id'=>$id
                                                    ];
                                                    
                                                    if(!empty($id)){
                                                       $respuestaDatos = $PTC->modificarDatos($ARR);
                                                        if($respuestaDatos){
                                                            echo"<script>Swal.fire('Elemento modificado con éxito!', '', 'success');";
                                                            echo"window.setTimeout(function () {window.location.href = './?seccion=perfil_tienda'}, 2000)";
                                                            echo "</script>";
                                                        }else {
                                                           echo "<script>Swal.fire({
                                                                icon: 'error',
                                                                title: 'Oops...',
                                                                text: 'No fue posible actualizar los datos, intente de nuevo',
                                                                footer: '',
                                                            })
                                                           //window.setTimeout(function () {history.back()}
                                                            , 2000)</script>";
                                                        }
                                                    }
                                                break;
                                            }
                                        }else{
                                            require_once 'views/perfiltienda.php';
                                        }
                                    }else{
                                        $respuestaInsert = $PTC->insertRecord();
                                        if($respuestaInsert){
                                            $respuestaDatos = $PTC->consultarDatos();
                                            $respuestaDatos = $respuestaDatos[0];
                                        }else{
                                            $respuestaDatos = [];
                                        }
                                        require_once 'views/perfiltienda.php';
                                    }
                                break;
                                case 'about_us':
                                    require_once "../controllers/aboutusController.php";
                                    $ABOUT = new aboutusController();
                                    
                                    if(isset($_GET['action'])){
                                        switch ($_GET['action']){
                                            case "edit":
                                                if(isset($_GET['codigo'])){
                                                    //$_POST['action'] es encesario para usar la direccion de directorio de model correcta
                                                    $modelNotRequired = true;
                                                    $oneAU = $ABOUT->getAUByCode($_GET['codigo']);
                                                    require_once 'views/about_us/edit-page.php'; 
                                                }
                                            break;
                                            case "action-edit":
                                                require_once "../controllers/aboutusController.php";
                                            break;
                                            default:
                                            break;
                                        }
                                    } else {
                                        $respuestaDatos = $ABOUT->consultarPaginas();
                                        require_once 'views/about_us.php'; 
                                    }
                                break;
                                case 'config_general':
                                    require_once "../controllers/configController.php";
                                    $CONFIG = new configuracionController();
                                    $respuestaDatos = $CONFIG->consultarDatos();
                                    $metodos_pago   = $CONFIG->metodos_pago();
                                    $respuestaDatos = $respuestaDatos[0];
                                    
                                    if(isset($respuestaDatos['id'])){
                                        if(isset($_GET['action'])){
                                            switch ($_GET['action']) {
                                                case "action-edit":
                                                    $AppId               = (isset($_POST['AppId'])) ? $_POST['AppId'] : '';
                                                    $Tax                 = (isset($_POST['Tax'])) ? $_POST['Tax'] : 0;
                                                    $HomeType            = (isset($_POST['HomeType'])) ? $_POST['HomeType'] : '';
                                                    $idPaymentType       = (isset($_POST['idPaymentType'])) ? $_POST['idPaymentType'] : false;
                                                    $mostarPrecios       = (isset($_POST['mostarPrecios'])) ? $_POST['mostarPrecios'] : 0;
                                                    $accesoAnonimo       = (isset($_POST['accesoAnonimo'])) ? $_POST['accesoAnonimo'] : 0;
                                                    $envio  	         = (isset($_POST['envio'])) ? $_POST['envio'] : 0;
                                                    $blog  	             = (isset($_POST['blog'])) ? $_POST['blog'] : 0;
                                                    $preguntasFrecuentes = (isset($_POST['preguntasFrecuentes'])) ? $_POST['preguntasFrecuentes'] : 0;
                                                    $generalShipping     = (isset($_POST['generalShipping'])) ? $_POST['generalShipping'] : 0;
                                                    $payment_active      = (isset($_POST['payment'])) ? $_POST['payment'] : 0;
                                                    $id                  = !empty($_POST['id']) ? $_POST['id'] : 0;

                                                    $ARR = [
                                                        'AppId'=>$AppId,
                                                        'Tax'=>$Tax,
                                                        'HomeType'=>$HomeType,
                                                        'idPaymentType'=>$idPaymentType,
                                                        'mostarPrecios'=>$mostarPrecios,
                                                        'accesoAnonimo'=>$accesoAnonimo,
                                                        'envio'=>$envio,
                                                        'blog'=>$blog,
                                                        'preguntasFrecuentes'=>$preguntasFrecuentes,
                                                        'generalShipping'=>$generalShipping,
                                                        'payment_active'=>$payment_active,
                                                        'id'=>$id
                                                    ];

                                                    if(!empty($id)){
                                                        $respuesta = $CONFIG->modificarDatos($ARR);
                                                        if($respuesta){
                                                            echo"<script>Swal.fire('Elemento modificado con éxito!', '', 'success');";
                                                            echo"window.setTimeout(function () {window.location.href = './?seccion=config_general'}, 2000)</script>";
                                                        }else {
                                                           echo "<script>Swal.fire({
                                                                icon: 'error',
                                                                title: 'Oops...',
                                                                text: 'No fue posible actualizar los datos, intente de nuevo',
                                                                footer: '',
                                                            })
                                                            window.setTimeout(function () {history.back()}, 2000)</script>";
                                                        }
                                                    }
                                                break;
                                            }
                                        }else{
                                            require_once 'views/configuraciones.php';
                                        }
                                    }else{
                                        $respuestaInsert = $CONFIG->insertRecord();
                                        if($respuestaInsert){
                                            $respuestaDatos = $CONFIG->consultarDatos();
                                            $respuestaDatos = $respuestaDatos[0];
                                        }else{
                                            $respuestaDatos = [];
                                        }

                                        require_once 'views/configuraciones.php';
                                    } 
                                break;
                                case 'blog_section':
                                    require_once '../models/blogModel.php';
                                    $BLOG = new blogModel();
                                    require_once '../controllers/blogController.php';
                                    $_BLOG = new blogController();

                                    if(isset($_GET['action'])){
                                        switch ($_GET['action']) {
                                            case "add":
                                                 require_once 'views/blog/add-post.php'; 
                                                break;
                                            case "edit":
                                                if(isset($_GET['id'])){
                                                    //$_POST['action'] es encesario para usar la direccion de directorio de model correcta
                                                    $modelNotRequired = true;
                                                    $onePost = $_BLOG->getPostById($_GET['id']);
                                                    require_once 'views/blog/edit-post.php'; 
                                                }
                                            break;
                                            case "action-add":
                                                require_once '../controllers/blogController.php';
                                            break;
                                            case "action-edit":
                                                require_once '../controllers/blogController.php';
                                            break;
                                            default:
                                                break;
                                        }
                                    } else {
                                        $respuestaBlogs = $BLOG->consultarBlogs();
                                        require_once 'views/blog.php';
                                    }
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