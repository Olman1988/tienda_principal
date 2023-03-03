<?php

class lookandfeelModel{
    
    public function consultarLAF(){
              $resultado;
    try {
            $db = conexion::getConnect();
            $consulta = $db->prepare("SELECT TOP 1 * from [dbo].[lookAndFeel] order by id desc");
            $consulta->execute();
            $resultado= $consulta->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
        }
        return $resultado;
    }
      public function insertarLAF($secundaryColor,$principalColor,$fontSub,$font,$navbarColor,$navbarFont,$navbarColorFont,$sidebarFont,$sidebarColor,$buttonFont,$buttonColor,$footerColor,$footerTextoColor,$footerTituloColor,$colorFuenteSidebar){
          $respuesta = '';
         
                try {
            $db = conexion::getConnect();
            $consulta=$db->prepare("INSERT INTO [atheneal_Tecnosula].[lookAndFeel] values(:fuenteTitulo,:fuenteSubTitulo,:colorPrincipal,"
                    . ":colorSecundario,:navbarFont,:navbarColor,:sidebarFont,:sidebarColor,:buttonFont,:buttonColor,:footerColor,:navbarColorFont,:footerTextoColor,:footerTituloColor,:colorFuenteSidebar)");
            
             $db->beginTransaction(); //inicia la transaccion
            $consulta->bindValue(':fuenteTitulo', $font);
            $consulta->bindValue(':fuenteSubTitulo', $fontSub);
            $consulta->bindValue(':colorPrincipal', $principalColor);
            $consulta->bindValue(':colorSecundario', $secundaryColor);
            $consulta->bindValue(':navbarColor', $navbarColor);
            $consulta->bindValue(':navbarFont', $navbarFont);
            $consulta->bindValue(':sidebarFont', $sidebarFont);
            $consulta->bindValue(':sidebarColor', $sidebarColor);
             $consulta->bindValue(':buttonFont', $buttonFont);
            $consulta->bindValue(':buttonColor', $buttonColor);
            $consulta->bindValue(':footerColor', $footerColor);
            $consulta->bindValue(':navbarColorFont', $navbarColorFont);
            $consulta->bindValue(':footerTextoColor', $footerTextoColor);
            $consulta->bindValue(':footerTituloColor', $footerTituloColor);
            $consulta->bindValue(':colorFuenteSidebar', $colorFuenteSidebar);
            //$colorFuenteSidebar
            $consulta->execute();
         $respuesta=$db->commit();

            
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
           
        }
        
      return $respuesta;
    }
    
public function modificarLAF($secundaryColor,$principalColor,$fontSub,$font,$navbarColor,$navbarFont,$navbarColorFont,$sidebarFont,$sidebarColor,$buttonFont,$buttonColor,$footerColor,$footerTextoColor,$footerTituloColor,$colorFuenteSidebar,$id){
                      try {
            $db = conexion::getConnect();
          
            $consulta=$db->prepare("UPDATE [dbo].[lookAndFeel] SET fuenteTitulo = :font, fuenteSubTitulo = :fontSub,colorPrincipal = :principalColor,colorSecundario = :secundaryColor,"
                    . " fuenteNavbar = :navbarFont,colorNavbar= :navbarColor,fuenteSideBar= :sidebarFont,colorSideBar= :sidebarColor,"
                    . " fuenteBotones= :buttonFont,colorBotones= :buttonColor,colorFooter= :footerColor,colorFuenteNavbar= :navbarColorFont,footerTextoColor= :footerTextoColor, footerTituloColor = :footerTituloColor, colorFuenteSidebar = :colorFuenteSidebar where id = :id");
            
             $db->beginTransaction(); //inicia la transaccion
            
            
     
            $consulta->bindValue(':fontSub', $fontSub);
            $consulta->bindValue(':font', $font);
            $consulta->bindValue(':secundaryColor', $secundaryColor);
            $consulta->bindValue(':principalColor', $principalColor);
            $consulta->bindValue(':navbarColor', $navbarColor);
            $consulta->bindValue(':navbarFont', $navbarFont);
            $consulta->bindValue(':sidebarFont', $sidebarFont);
            $consulta->bindValue(':sidebarColor', $sidebarColor);
             $consulta->bindValue(':buttonFont', $buttonFont);
            $consulta->bindValue(':buttonColor', $buttonColor);
            $consulta->bindValue(':footerColor', $footerColor);
            $consulta->bindValue(':navbarColorFont', $navbarColorFont);
              $consulta->bindValue(':footerTextoColor', $footerTextoColor);
            $consulta->bindValue(':footerTituloColor', $footerTituloColor);
             $consulta->bindValue(':colorFuenteSidebar', $colorFuenteSidebar);
            $consulta->bindValue(':id', $id);
            $consulta->execute();
           
         $respuesta=$db->commit();
        }
    catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
            $respuesta = false;
           
        }
        return $respuesta;
}
    
    
    
}

