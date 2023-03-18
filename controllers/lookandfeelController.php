<?php
require_once '../config/conexion.php';
require_once '../models/lookandfeelModel.php';

class lookandfeelController{
    public function insertarLAF($secundaryColor,$principalColor,$fontSub,$font,$navbarColor,$navbarFont,$navbarColorFont,$sidebarFont,$sidebarColor,$buttonFont,$buttonColor,$footerColor,$footerTextoColor,$footerTituloColor,$colorFuenteSidebar,$colorHoverNavbar){
        $consultaLAF =  new lookandfeelModel();
        
       
             $respuestaLAF = $consultaLAF-> insertarLAF($secundaryColor,$principalColor,$fontSub,$font,$navbarColor,$navbarFont,$navbarColorFont,$sidebarFont,$sidebarColor,$buttonFont,$buttonColor,$footerColor,$footerTextoColor,$footerTituloColor,$colorFuenteSidebar,$colorHoverNavbar);
            
             return $respuestaLAF;
    }
    public function consultarLAF(){
         
    }
    public function modificarLAF($secundaryColor,$principalColor,$fontSub,$font,$navbarColor,$navbarFont,$navbarColorFont,$sidebarFont,$sidebarColor,$buttonFont,$buttonColor,$footerColor,$footerTextoColor,$footerTituloColor,$colorFuenteSidebar,$colorHoverNavbar,$id){
         $consultaLAF =  new lookandfeelModel();
         $respuestaLAF = $consultaLAF-> modificarLAF($secundaryColor,$principalColor,$fontSub,$font,$navbarColor,$navbarFont,$navbarColorFont,$sidebarFont,$sidebarColor,$buttonFont,$buttonColor,$footerColor,$footerTextoColor,$footerTituloColor,$colorFuenteSidebar,$colorHoverNavbar,$id);
         return $respuestaLAF;
    }
}

if(isset($_POST['action'])){
    
    switch ($_POST['action']) {
        case "insertar":
            $secundaryColor= !empty($_POST['secundaryColor'])?filter_var($_POST['secundaryColor'],FILTER_SANITIZE_STRING):'';
            $principalColor= !empty($_POST['principalColor'])?filter_var($_POST['principalColor'],FILTER_SANITIZE_STRING):'';
            $fontSub= !empty($_POST['fontSub'])?filter_var($_POST['fontSub'],FILTER_SANITIZE_STRING):'';
            $font= !empty($_POST['font'])?filter_var($_POST['font'],FILTER_SANITIZE_STRING):'';
            $navbarColor= !empty($_POST['navbarColor'])?filter_var($_POST['navbarColor'],FILTER_SANITIZE_STRING):'';
            $navbarFont= !empty($_POST['navbarFont'])?filter_var($_POST['navbarFont'],FILTER_SANITIZE_STRING):'';
            $sidebarFont= !empty($_POST['sidebarFont'])?filter_var($_POST['sidebarFont'],FILTER_SANITIZE_STRING):'';
            $sidebarColor= !empty($_POST['colorSidebar'])?filter_var($_POST['colorSidebar'],FILTER_SANITIZE_STRING):'';
            $buttonFont= !empty($_POST['buttonFont'])?filter_var($_POST['buttonFont'],FILTER_SANITIZE_STRING):'';
            $buttonColor= !empty($_POST['buttonColor'])?filter_var($_POST['buttonColor'],FILTER_SANITIZE_STRING):'';
            $footerColor = !empty($_POST['footerColor'])?filter_var($_POST['footerColor'],FILTER_SANITIZE_STRING):'';
            $navbarColorFont = !empty($_POST['navbarColorFont'])?filter_var($_POST['navbarColorFont'],FILTER_SANITIZE_STRING):'';
            $footerTextoColor = !empty($_POST['footerTextoColor '])?filter_var($_POST['footerTextoColor '],FILTER_SANITIZE_STRING):''; 
            $footerTituloColor = !empty($_POST['footerTituloColor '])?filter_var($_POST['footerTituloColor'],FILTER_SANITIZE_STRING):''; 
            $colorFuenteSidebar = !empty($_POST['colorFuenteSidebar'])?filter_var($_POST['colorFuenteSidebar'],FILTER_SANITIZE_STRING):''; 
            $colorHoverNavbar = !empty($_POST['colorHoverNavbar'])?filter_var($_POST['colorHoverNavbar'],FILTER_SANITIZE_STRING):'';
            if($secundaryColor&&$principalColor&&$fontSub&&$font&&$navbarColor&&$navbarFont&&$sidebarFont&&$sidebarColor&&$buttonFont&&$footerColor&&$navbarColorFont&&$footerTextoColor&&$footerTituloColor&&$colorFuenteSidebar&&$colorHoverNavbar){
                $consultaLAF =  new lookandfeelController();
             $respuestaLAF = $consultaLAF->insertarLAF($secundaryColor,$principalColor,$fontSub,$font,$navbarColor,$navbarFont,$navbarColorFont,$sidebarFont,$sidebarColor,$buttonFont,$buttonColor,$footerColor,$footerTextoColor,$footerTituloColor,$colorFuenteSidebar,$colorHoverNavbar);
            } else {
                $respuestaLAF = false;
            }
            
             echo $respuestaLAF;

            break;
         case "consultar":

             
             return false;
            break;
         case "modificar":
                $secundaryColor= !empty($_POST['secundaryColor'])?filter_var($_POST['secundaryColor'],FILTER_SANITIZE_STRING):'';
            $principalColor= !empty($_POST['principalColor'])?filter_var($_POST['principalColor'],FILTER_SANITIZE_STRING):'';
            $fontSub= !empty($_POST['fontSub'])?filter_var($_POST['fontSub'],FILTER_SANITIZE_STRING):'';
            $font= !empty($_POST['font'])?filter_var($_POST['font'],FILTER_SANITIZE_STRING):'';
            $navbarColor= !empty($_POST['navbarColor'])?filter_var($_POST['navbarColor'],FILTER_SANITIZE_STRING):'';
            $navbarFont= !empty($_POST['navbarFont'])?filter_var($_POST['navbarFont'],FILTER_SANITIZE_STRING):'';
            $navbarColorFont = !empty($_POST['navbarColorFont'])?filter_var($_POST['navbarColorFont'],FILTER_SANITIZE_STRING):'';
            $sidebarFont= !empty($_POST['sidebarFont'])?filter_var($_POST['sidebarFont'],FILTER_SANITIZE_STRING):'';
            $sidebarColor= !empty($_POST['colorSidebar'])?filter_var($_POST['colorSidebar'],FILTER_SANITIZE_STRING):'';
            $buttonFont= !empty($_POST['buttonFont'])?filter_var($_POST['buttonFont'],FILTER_SANITIZE_STRING):'';
            $buttonColor= !empty($_POST['buttonColor'])?filter_var($_POST['buttonColor'],FILTER_SANITIZE_STRING):'';
            $footerColor = !empty($_POST['footerColor'])?filter_var($_POST['footerColor'],FILTER_SANITIZE_STRING):'';
            $footerTextoColor = !empty($_POST['footerTextoColor'])?filter_var($_POST['footerTextoColor'],FILTER_SANITIZE_STRING):''; 
            $footerTituloColor = !empty($_POST['footerTituloColor'])?filter_var($_POST['footerTituloColor'],FILTER_SANITIZE_STRING):''; 
            $colorFuenteSidebar = !empty($_POST['colorFuenteSidebar'])?filter_var($_POST['colorFuenteSidebar'],FILTER_SANITIZE_STRING):''; 
            $colorHoverNavbar = !empty($_POST['colorHoverNavbar'])?filter_var($_POST['colorHoverNavbar'],FILTER_SANITIZE_STRING):''; 
            if($secundaryColor&&$principalColor&&$fontSub&&$font){
                $consultaLAF =  new lookandfeelController();
             $respuestaLAF = $consultaLAF->modificarLAF($secundaryColor,$principalColor,$fontSub,$font,$navbarColor,$navbarFont,$navbarColorFont,$sidebarFont,$sidebarColor,$buttonFont,$buttonColor,$footerColor,$footerTextoColor,$footerTituloColor,$colorFuenteSidebar,$colorHoverNavbar,$_POST['id']);
            } else {
                $respuestaLAF = false;
            }
            
             echo $respuestaLAF;
            break;
        

        default:
            break;
    }
}
