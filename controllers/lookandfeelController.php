<?php
require_once '../config/conexion.php';
require_once '../models/lookandfeelModel.php';

class lookandfeelController{
    public function insertarLAF($secundaryColor,$principalColor,$fontSub,$font,$navbarColor,$navbarFont,$navbarColorFont,$sidebarFont,$sidebarColor,$buttonFont,$buttonColor,$footerColor,$footerTextoColor,$footerTituloColor,$colorFuenteSidebar){
        $consultaLAF =  new lookandfeelModel();
        
       
             $respuestaLAF = $consultaLAF-> insertarLAF($secundaryColor,$principalColor,$fontSub,$font,$navbarColor,$navbarFont,$navbarColorFont,$sidebarFont,$sidebarColor,$buttonFont,$buttonColor,$footerColor,$footerTextoColor,$footerTituloColor,$colorFuenteSidebar);
            
             return $respuestaLAF;
    }
    public function consultarLAF(){
         
    }
    public function modificarLAF($secundaryColor,$principalColor,$fontSub,$font,$navbarColor,$navbarFont,$navbarColorFont,$sidebarFont,$sidebarColor,$buttonFont,$buttonColor,$footerColor,$footerTextoColor,$footerTituloColor,$colorFuenteSidebar,$id){
         $consultaLAF =  new lookandfeelModel();
         $respuestaLAF = $consultaLAF-> modificarLAF($secundaryColor,$principalColor,$fontSub,$font,$navbarColor,$navbarFont,$navbarColorFont,$sidebarFont,$sidebarColor,$buttonFont,$buttonColor,$footerColor,$footerTextoColor,$footerTituloColor,$colorFuenteSidebar,$id);
         return $respuestaLAF;
    }
}

if(isset($_POST['action'])){
    
    switch ($_POST['action']) {
        case "insertar":
            $secundaryColor= !empty($_POST['secundaryColor'])?$_POST['secundaryColor']:'';
            $principalColor= !empty($_POST['principalColor'])?$_POST['principalColor']:'';
            $fontSub= !empty($_POST['fontSub'])?$_POST['fontSub']:'';
            $font= !empty($_POST['font'])?$_POST['font']:'';
            $navbarColor= !empty($_POST['navbarColor'])?$_POST['navbarColor']:'';
            $navbarFont= !empty($_POST['navbarFont'])?$_POST['navbarFont']:'';
            $sidebarFont= !empty($_POST['sidebarFont'])?$_POST['sidebarFont']:'';
            $sidebarColor= !empty($_POST['colorSidebar'])?$_POST['colorSidebar']:'';
            $buttonFont= !empty($_POST['buttonFont'])?$_POST['buttonFont']:'';
            $buttonColor= !empty($_POST['buttonColor'])?$_POST['buttonColor']:'';
            $footerColor = !empty($_POST['footerColor'])?$_POST['footerColor']:'';
            $navbarColorFont = !empty($_POST['navbarColorFont'])?$_POST['navbarColorFont']:'';
            $footerTextoColor = !empty($_POST['footerTextoColor '])?$_POST['footerTextoColor ']:''; 
            $footerTituloColor = !empty($_POST['footerTituloColor '])?$_POST['footerTituloColor']:''; 
            $colorFuenteSidebar = !empty($_POST['colorFuenteSidebar'])?$_POST['colorFuenteSidebar']:''; 
            if($secundaryColor&&$principalColor&&$fontSub&&$font&&$navbarColor&&$navbarFont&&$sidebarFont&&$sidebarColor&&$buttonFont&&$footerColor&&$navbarColorFont&&$footerTextoColor&&$footerTituloColor&&$colorFuenteSidebar){
                $consultaLAF =  new lookandfeelController();
             $respuestaLAF = $consultaLAF->insertarLAF($secundaryColor,$principalColor,$fontSub,$font,$navbarColor,$navbarFont,$navbarColorFont,$sidebarFont,$sidebarColor,$buttonFont,$buttonColor,$footerColor,$footerTextoColor,$footerTituloColor,$colorFuenteSidebar);
            } else {
                $respuestaLAF = false;
            }
            
             echo $respuestaLAF;

            break;
         case "consultar":

             
             return false;
            break;
         case "modificar":
                $secundaryColor= !empty($_POST['secundaryColor'])?$_POST['secundaryColor']:'';
            $principalColor= !empty($_POST['principalColor'])?$_POST['principalColor']:'';
            $fontSub= !empty($_POST['fontSub'])?$_POST['fontSub']:'';
            $font= !empty($_POST['font'])?$_POST['font']:'';
            $navbarColor= !empty($_POST['navbarColor'])?$_POST['navbarColor']:'';
            $navbarFont= !empty($_POST['navbarFont'])?$_POST['navbarFont']:'';
            $navbarColorFont = !empty($_POST['navbarColorFont'])?$_POST['navbarColorFont']:'';
            $sidebarFont= !empty($_POST['sidebarFont'])?$_POST['sidebarFont']:'';
            $sidebarColor= !empty($_POST['colorSidebar'])?$_POST['colorSidebar']:'';
            $buttonFont= !empty($_POST['buttonFont'])?$_POST['buttonFont']:'';
            $buttonColor= !empty($_POST['buttonColor'])?$_POST['buttonColor']:'';
            $footerColor = !empty($_POST['footerColor'])?$_POST['footerColor']:'';
            $footerTextoColor = !empty($_POST['footerTextoColor'])?$_POST['footerTextoColor']:''; 
            $footerTituloColor = !empty($_POST['footerTituloColor'])?$_POST['footerTituloColor']:''; 
            $colorFuenteSidebar = !empty($_POST['colorFuenteSidebar'])?$_POST['colorFuenteSidebar']:''; 
            if($secundaryColor&&$principalColor&&$fontSub&&$font){
                $consultaLAF =  new lookandfeelController();
             $respuestaLAF = $consultaLAF->modificarLAF($secundaryColor,$principalColor,$fontSub,$font,$navbarColor,$navbarFont,$navbarColorFont,$sidebarFont,$sidebarColor,$buttonFont,$buttonColor,$footerColor,$footerTextoColor,$footerTituloColor,$colorFuenteSidebar,$_POST['id']);
            } else {
                $respuestaLAF = false;
            }
            
             echo $respuestaLAF;
            break;
        

        default:
            break;
    }
}
