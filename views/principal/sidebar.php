<?php
//Se crea un array para guardar los id de las categorias que tienen hijos para crear un segundo nivel

 class validacion{
     public function esPadre($todasCategoriasPadre,$categoria){
         if(!empty($todasCategoriasPadre)){
         for($i=0;$i<count($todasCategoriasPadre);$i++){
             
               if($todasCategoriasPadre[$i]['categoriaPadre']==$categoria){
                   return true;
               }
     }
         } else {return false;}
 }

 }
 
 $respCategorias['servicios'] = $respuestaTodosServicios;
?>
<div class='side-bar fx-side' id='side-bar' style="z-index: 1000;">
    <ul class='secondary_submenu'>
        <li class="secondary-sidebar">
                <div class="user-ava"><img src="<?=base_url?>images/account/user-ava-md.jpg" alt="">
        </div>

      </li>
      <div id="submenu2" class="row submenu2" style="width:880px;margin-left:0px;">
          <!--<!-- PRINCIPAL -->
          <ul class="col-lg-4 col-md-4 col-sm-4 col-4 lista-principal" id='lista-principal' style="">
    <li class="">
        <a class="nav-link" style="" id='' href="<?=base_url?>">INICIO</a>
      </li>
       <li class="item-lis-one">
          <a class="nav-link" style="" id='' >CUENTA<i class="col-lg-2 fa-solid fa-caret-right arrow-right-one" onclick="slideMenuRight2(3)"></i></a>
      </li>
      <li class="item-lis-one">
          <a class="nav-link" style="" id=''>NOSOTROS<i class="col-lg-2 fa-solid fa-caret-right arrow-right-one" onclick="slideMenuRight2(1)"></i></a>
      </li>
      <li class="item-lis-one">
          <a class="nav-link" style="" id='' >CATEGORÍAS<i class="col-lg-2 fa-solid fa-caret-right arrow-right-one" onclick="slideMenuRight2(2)"></i></a>
      </li>
      
     
      <li class="item-lis-one">
          <a class="nav-link" style="" id='' >SERVICIOS<i class="col-lg-2 fa-solid fa-caret-right arrow-right-one" onclick="slideMenuRight2(4)"></i></a>
      </li>
      <li class="">
        <a class="nav-link" style="" id='' href="<?=base_url?>?pag=blog">BLOG</a>
      </li>
      <li class="">
        <a class="nav-link" style="" id='' href="<?=base_url?>?pag=contacto">CONTACTO</a>
      </li>
      </ul>
          <!-- NOSOTROS -->
          <ul class="col-lg-4 col-md-4 col-sm-4 col-4 lista-secundaria" id='lista-secundaria' style="display:none;">
       <li class="">
        <a class="nav-link" style="cursor:pointer;" id='' onclick="slideMenuLeft2()">REGRESO</a>
      </li>
      <?php
          foreach ($consultaAcercaDe as $consultaAcercaDevalue) {
              
          
          ?>
      <li class="item-lis-one">
          <a class="nav-link" style='text-transform: uppercase' href="<?=base_url?>?pag=nosotros&&cod=<?=$consultaAcercaDevalue['codigo']?>"><?=$consultaAcercaDevalue['nombre']?></a>
        </li>    
        <?php 
          }
        ?>
     
     
      </ul>
          <!-- CATEGORIAS -->
          <ul class="col-lg-4 col-md-4 col-sm-4 col-4 lista-secundaria" id='lista-secundaria' style="display:none;">
              <li class="">
        <a class="nav-link" style="cursor:pointer;" id='' onclick="slideMenuLeft2()">REGRESO</a>
      </li>
        <?php
       $esPadre=false;
       $contador=1;
       $objetoPadre= new validacion();
       
       for ($i=0;$i<count($respCategorias)-1;$i++){
           $esPadre=$objetoPadre->esPadre($todasCategoriasPadre,$respCategorias[$i]['cat_CodigoCategoria']);
           if(!$esPadre){
           ?>
               
             <li class="">
        <a class="nav-link" style="text-transform: uppercase;" id='' href="<?=base_url?>?pag=categorias&&id=<?=$respCategorias[$i]['cat_CodigoCategoria']?>&&nombre=<?=$respCategorias[$i]['cat_Descripcion']?>"><?=$respCategorias[$i]['cat_Descripcion']?></a>
      </li>  
               <?php
           } else {
                
               ?>
      <li class="item-lis">
        <a class="nav-link float-left col-lg-9" style="text-transform: uppercase;" id='' href="<?=base_url?>?pag=categorias&&id=<?=$respCategorias[$i]['cat_CodigoCategoria']?>&&nombre=<?=$respCategorias[$i]['cat_Descripcion']?>"><?=$respCategorias[$i]['cat_Descripcion']?></a><i class="col-lg-2 fa-solid fa-caret-right arrow-right-two" onclick="slideMenuRightSec2(<?=$contador?>)"></i>
      </li>
      <?php
          $contador++; 
       }
       }
    
      ?>
      
      </ul>
        
          <ul class="col-lg-4 col-md-4 col-sm-4 col-4 lista-secundaria" id='lista-secundaria' style="display:none;">
              <li class="">
        <a class="nav-link" style="cursor:pointer;" id='' onclick="slideMenuLeft2()">REGRESO</a>
      </li>
      <?php
      if(!isset($_SESSION['perfil'])){
      ?>
    <li class="">
        <a class="nav-link" style="" id='' href="./?pag=cuenta&&func=login">INICIAR SESIÓN</a>
      </li>
      <?php
      } else {
      ?>
      <li class="">
        <a class="nav-link" style="" id='' href="./?pag=cuenta&&func=perfil">PERFIL</a>
      </li>
      <li class="">
        <a class="nav-link" style="" id='' href="./?pag=cuenta&&func=ordenes">ORDENES</a>
      </li>
      <li class="">
        <a class="nav-link" style="" id='' href="./?pag=cuenta&&func=cerrar">CERRAR SESIÓN</a>
      </li>
      
      
      <?php
      }
      ?>
      </ul>
          <!--<!-- GORRAS Y OTROS -->
          <?php
           $cont=1;
            
       foreach ($todasCategoriasPadre as $value) {
           
          ?>
             <ul class="col-lg-4 col-md-4 col-sm-4 col-4 lista-tercer" id='lista-tercer' style="display:none;transition:all 0.3s ease-in-out;">
    <li class="">
        <a class="nav-link" style="cursor:pointer;" id='' onclick="slideMenuLeftSecon2()">REGRESO</a>
      </li>
        
               <?php
       
          $respSubCategoria=$categorias->todasSubCategoriasConHijos($value['categoriaPadre']);
          foreach ($respSubCategoria as $value) {
              
          
          ?>
             
      <li class="">
        <a class="nav-link" style="text-transform: uppercase;" id='' href="<?=base_url?>?pag=categorias&&id=<?=$value['cat_CodigoCategoria']?>&&nombre=<?=$value['cat_Descripcion']?>"><?=$value['cat_Descripcion']?></a>
      </li>
     
   
     
          <?php
       }
       ?>
   
      </ul>
       <?php
           $cont++;
       }
          ?>
                     <ul class="col-lg-4 col-md-4 col-sm-4 col-4 lista-secundaria" id='lista-secundaria<?=$cont?>' style="transition:all 0.3s ease-in-out;">
    <li class="">
        <a class="nav-link" style="cursor:pointer;" id='' onclick="slideMenuLeft2()">REGRESO</a>
      </li>
               
               <?php
       
        
           foreach ($respuestaTodosServicios as $value) {
            
          
          ?>
             
      <li class="">
        <a class="nav-link" style="text-transform: uppercase;" id='' href="<?=base_url?>?pag=product&&id=<?=$value['art_CodigoArticulo']?>"><?=$value['art_Descripcion']?></a>
      </li>
     
   
     
          <?php
       }
       ?>
           </ul>
      </div>
      </ul>
      <ul class='primary_submenu'>
        <li class="secondary-sidebar" >
         Categorías

      </li>
      <div id="submenu" class="row submenu" style="width:880px;margin-left:0px;">
       
          <!-- CATEGORIAS -->
          <ul class="col-lg-4 col-md-4 col-sm-4 col-4 lista-principal" id='lista-principal' style="overflow:auto">
       <?php
       $esPadre=false;
       $contador=5;
       for ($i=0;$i<count($respCategorias)-1;$i++){
           $esPadre=$objetoPadre->esPadre($todasCategoriasPadre,$respCategorias[$i]['cat_CodigoCategoria']);
           if(!$esPadre){
           ?>
               
             <li class="">
        <a class="nav-link" style="text-transform: uppercase;" id='' href="<?=base_url?>?pag=categorias&&id=<?=$respCategorias[$i]['cat_CodigoCategoria']?>&&nombre=<?=$respCategorias[$i]['cat_Descripcion']?>"><?=$respCategorias[$i]['cat_Descripcion']?></a>
      </li>  
               <?php
           } else {
                
               ?>
      <li class="item-lis">
        <a class="nav-link float-left col-lg-9" style="text-transform: uppercase;" id='' href="<?=base_url?>?pag=categorias&&id=<?=$respCategorias[$i]['cat_CodigoCategoria']?>&&nombre=<?=$respCategorias[$i]['cat_Descripcion']?>"><?=$respCategorias[$i]['cat_Descripcion']?></a><i class="col-lg-2 fa-solid fa-caret-right arrow-right-two" onclick="slideMenuRight(<?=$contador?>)"></i>
      </li>
      <?php
          $contador++; 
       }
       }
          if(isset($respCategorias['servicios'])){
           if(count($respCategorias['servicios'])>0){
       ?>
      <li class="item-lis">
        <a class="nav-link float-left col-lg-9" style="text-transform: uppercase;" id='' href=''>Servicios</a><i class="col-lg-2 fa-solid fa-caret-right arrow-right-two" onclick="slideMenuRight(<?=$contador?>)"></i>
      <?php
           }
           
       }
       ?>
      </ul>
        
          <!--<!-- SE CARGA DE LA BASE DE DATOS LAS CATEGORIAS CON HIJOS-->
          <?php
       $cont=1;
       if(!empty($todasCategoriasPadre)){
       foreach ($todasCategoriasPadre as $value) {
           
           ?>
               <ul class="col-lg-4 col-md-4 col-sm-4 col-4 lista-secundaria" id='lista-secundaria<?=$cont?>' style="transition:all 0.3s ease-in-out;">
    <li class="">
        <a class="nav-link" style="cursor:pointer;" id='' onclick="slideMenuLeft()">REGRESO</a>
      </li>
               
               <?php
       
          $respSubCategoria=$categorias->todasSubCategoriasConHijos($value['categoriaPadre']);
          foreach ($respSubCategoria as $value) {
              
          
          ?>
             
      <li class="">
        <a class="nav-link" style="text-transform: uppercase;" id='' href="<?=base_url?>?pag=categorias&&id=<?=$value['cat_CodigoCategoria']?>&&nombre=<?=$value['cat_Descripcion']?>"><?=$value['cat_Descripcion']?></a>
      </li>
     
   
     
          <?php
       }
       ?>
           </ul>
         
           <?php
           $cont++;
       }
       }
        
           
           ?>
               <ul class="col-lg-4 col-md-4 col-sm-4 col-4 lista-secundaria" id='lista-secundaria<?=$cont?>' style="transition:all 0.3s ease-in-out;">
    <li class="">
        <a class="nav-link" style="cursor:pointer;" id='' onclick="slideMenuLeft()">REGRESO</a>
      </li>
               
               <?php
       
        
           foreach ($respuestaTodosServicios as $value) {
            
          
          ?>
             
      <li class="">
        <a class="nav-link" style="text-transform: uppercase;" id='' href="<?=base_url?>?pag=product&&id=<?=$value['art_CodigoArticulo']?>"><?=$value['art_Descripcion']?></a>
      </li>
     
   
     
          <?php
       }
       ?>
           </ul>
         
           <?php
           $cont++;
       
       
          ?>
      </div>
      
     
      </ul>
</div>
<script>
slideMenuRight(0);
function slideMenuRight(menu){
  
    var menus = document.querySelectorAll('.lista-secundaria');
   
    for(let i=0;i<=menus.length;i++){
        
        if(i==(menu-1)){
      
            
            $("#submenu").css("margin-left","-290px");
            $(menus[i]).css("display","block");
            i=menus.length;
        } else {
           $(menus[i]).css("display","none"); 
        }
        
    }
    
}
function slideMenuRightSec(menu){
  
    var menus = document.querySelectorAll('.lista-tercer');
   
   for(let i=0;i<=menus.length;i++){
   $(menus[i]).css("display","none"); 
   }
    for(let i=0;i<=menus.length;i++){
        
        if(i==(menu-1)){
          
            
            $("#submenu").css("margin-left","-580px");
            $(menus[i]).css("display","block");
            i=menus.length;
        } 
        
    }
    
}

function slideMenuLeft(){
    $(".lista-principal").css("display","block");
    $("#submenu").css("margin-left","0px");
    var menusN = document.querySelectorAll('.lista-tercer');
    var menus = document.querySelectorAll('.lista-secundaria');
   for(let i=0;i<menus.length;i++){
       $(menus[i]).css("display","none");
    }
    for(let i=0;i<menusN.length;i++){
       $(menusN[i]).css("display","none");
    }
}
function slideMenuLeftSecon(){
     var menusN = document.querySelectorAll('.lista-tercer');
   
    for(let i=0;i<menusN.length;i++){
       $(menusN[i]).css("display","none");
    }
    $(".lista-principal").css("display","block");
    $("#submenu").css("margin-left","-290px");
}

function slideMenuRight2(menu){
  
    var menus = document.querySelectorAll('.lista-secundaria');
   
    for(let i=0;i<=menus.length;i++){
        
        if(i==(menu-1)){
      
            
            $("#submenu2").css("margin-left","-290px");
            $(menus[i]).css("display","block");
            i=menus.length;
        } else {
           $(menus[i]).css("display","none"); 
        }
        
    }
    
}
function slideMenuRightSec2(menu){
  
    var menus = document.querySelectorAll('.lista-tercer');
   
   for(let i=0;i<=menus.length;i++){
   $(menus[i]).css("display","none"); 
   }
    for(let i=0;i<=menus.length;i++){
        
        if(i==(menu-1)){
          
            
            $("#submenu2").css("margin-left","-580px");
            $(menus[i]).css("display","block");
            i=menus.length;
        } 
        
    }
    
}

function slideMenuLeft2(){
    $(".lista-principal").css("display","block");
    $("#submenu2").css("margin-left","0px");
    var menusN = document.querySelectorAll('.lista-tercer');
    var menus = document.querySelectorAll('.lista-secundaria');
   for(let i=0;i<menus.length;i++){
       $(menus[i]).css("display","none");
    }
    for(let i=0;i<menusN.length;i++){
       $(menusN[i]).css("display","none");
    }
}
function slideMenuLeftSecon2(){
     var menusN = document.querySelectorAll('.lista-tercer');
   
    for(let i=0;i<menusN.length;i++){
       $(menusN[i]).css("display","none");
    }
    $(".lista-principal").css("display","block");
    $("#submenu2").css("margin-left","-290px");
}
</script>