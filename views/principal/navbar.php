<?php
$inicioPage='';
$nosotrosPage = '';
$categoriasPage = '';
$serviciosPage='';
$blogPage = '';
$contactoPage = '';
if(isset($_GET['pag'])){
    if(isset($_GET['type'])){
       $serviciosPage = 'li-active';
    } else {
    switch ($_GET['pag']) {
        case 'nosotros':
            $nosotrosPage = 'li-active';

            break;
        case 'categorias':
            $categoriasPage = 'li-active';

            break;
           case 'blog':
            $blogPage = 'li-active';

            break;
           case 'contacto':
            $contactoPage = 'li-active';

            break;

        default:
            $inicioPage='li-active';
            break;
       }
    }
} else {
    $inicioPage='li-active';
}


$categoriasParaSubmenu=[];
$cantidadArticulos=0;
if(isset($_SESSION['cotizacion'])){
    $cantidadArticulos=$cantidadArticulos+count($_SESSION['cotizacion']);
}
if(isset($_SESSION['carrito'])){
$cantidadArticulos=$cantidadArticulos+count($_SESSION['carrito']);    
}
 class validacionMenu{
     public function esPadre($todasCategoriasPadre,$categoria){
         for($i=0;$i<count($todasCategoriasPadre);$i++){
               if($todasCategoriasPadre[$i]['categoriaPadre']==$categoria){
                   return true;
               }
     }
 }

 }
 $servicios= new categoriasController();
 $respuestaServicios= $servicios->todasCategoriasServicios();

?>
<style>
    .site-search {
    display: block;
    position: absolute;
    width: 100%;
    height: 100%;
    transition: .3s;
    background-color: #fff;
    opacity: 0;
    visibility: hidden;
    z-index: 10;
}
.site-search input {
    padding-right: 105px;
    padding-left: 15px;
}

.site-search .search-tools {
    position: absolute;
    top: 50%;
    right: 30px;
    margin-top: -20px;
    z-index: 5;
}
.site-search .search-tools .clear-search {
    padding: 10px 0;
    color: #9da9b9;
    font-size: 11px;
    font-weight: 500;
    letter-spacing: .1em;
    text-transform: uppercase;
}
.site-search input {
    display: block;
    position: absolute;
    width: 100%;
    height: 100%;
    padding-right: 120px;
    padding-left: 30px;
    border: 0;
    background-color: #fff;
    color: #606975;
    font-size: 16px;
}
 
</style>
<div class='info-up' id="info-up"> 
    <div><a href="mailto:<?=$profile->infoEmail?>"><i class="fa-regular fa-envelope "></i><span style='margin-left:10px;'><?=$profile->infoEmail?></span></a></div>
    <div><a href="tel:+506<?=$profile->phone?>"><i class="fa-solid fa-mobile-screen-button "></i><span style='margin-left:10px;'>+506 <?=$profile->phone?></span></a></div>
    <?php
                  echo "<div>".$evaluar->evaluarInfo($profile->whatsApp, 'whatsApp')."</div>";
                  echo "<div>".$evaluar->evaluarInfo($profile->facebook, 'facebook')."</div>";
                  echo "<div>".$evaluar->evaluarInfo($profile->instagram, 'instagram')."</div>";
                  echo "<div>".$evaluar->evaluarInfo($profile->twitter, 'twitter')."</div>";
                  echo "<div>".$evaluar->evaluarInfo($profile->pinterest, 'pinterest')."</div>";
                  echo "<div>".$evaluar->evaluarInfo($profile->linkedin, 'linkedin')."</div>";
                  echo "<div>".$evaluar->evaluarInfo($profile->youtube, 'youtube')."</div>";
    ?>
</div>
 
<nav class="navbar navbar-prin navbar-expand-lg navbar-light bg-light" id="nav-fix" style="flex-wrap: nowrap! important;background:<?=$respuestaLAF['colorNavbar']?> !important;border:solid 1px <?=$respuestaLAF['colorSecundario']?>">
   
    <div  style="cursor:pointer;padding:15px 30px 15px 30px;border-right:solid 1px lightgray;color:white;" class="custom-toggler" >
      <span  onclick='openSidebar();' class="navbar-toggler-icon"></span>
    </div>
 
  
    <a class="ml-4" href="<?=base_url?>" style=""><img id="logo" src="<?=base_url3.$profile->logo?>" style=""></a>
 

  <div class="collapse navbar-collapse" id="navbarColor02" style="height:50px;">
      
    <ul class="navbar-nav mx-auto navbar_ul" style="height:75px;">
      
      <li class="nav-item <?=$inicioPage?>">
        <a class="nav-link" style="" id='' href="<?=base_url?>">INICIO</a>
      </li>
        <li class="nav-item dropdown <?=$nosotrosPage?>" onmouseover="abrirLista('dropNosotros')" onmouseleave="cerrarLista('dropNosotros')">
          <a class="nav-link" style="cursor:pointer">NOSOTROS</a>
          <div class="dropdown-menu animate__animated animate__fadeIn animate__faster" id="dropNosotros" style="top:100%">
          <?php
          foreach ($consultaAcercaDe as $consultaAcercaDevalue) {
              
          
          ?>
          <a class="dropdown-item" href="<?=base_url?>?pag=nosotros&&cod=<?=$consultaAcercaDevalue['codigo']?>"><?=$consultaAcercaDevalue['nombre']?></a>
             
        <?php 
          }
        ?>
          </div>
        </li>
      <li class="nav-item dropdown <?=$categoriasPage?>" onmouseover="abrirLista('dropCategorias')" onmouseleave="cerrarLista('dropCategorias')">
          <a href='<?=base_url?>?pag=categorias' class="nav-link" style="cursor:pointer">CATEGORIAS</a>
          <div class="dropdown-menu animate__animated animate__fadeIn animate__faster" id="dropCategorias" style="top:100%">
            <?php
            $subRespuesta= new categoriasController();
       $esPadre=false;
       $contador=1;
       $objetoPadre= new validacionMenu();
       $contadorCat = 0;
       $contadorNuevo = 0;
       
       for($i = 0; $i < count($respCategorias)-1;$i++){
           
           foreach ($respuestaServicios as $valueServicios) {
               if($respCategorias[$contadorCat]['cat_CodigoCategoria']==$valueServicios['cat_CodigoCategoria']){
                   
                  $respCategorias[$contadorCat]['esServicio'] = true; 
               } 
               
           }
           $contadorCat++;
           if(!$respCategorias[$contadorNuevo]['esServicio']){
           $esPadre=$objetoPadre->esPadre($todasCategoriasPadre,$respCategorias[$i]['cat_CodigoCategoria']);
           
           if(!$esPadre){
           ?>
               
             
        <a class="dropdown-item" style="" id='' href="<?=base_url?>?pag=categorias&&id=<?=$respCategorias[$i]['cat_CodigoCategoria']?>&&nombre=<?=$respCategorias[$i]['cat_Descripcion']?>"><?=$respCategorias[$i]['cat_Descripcion']?></a>
       
               <?php
           } else {
                
               ?>
      <div class="btn-group dropend w-100" onmouseover="abrirLista('<?=$respCategorias[$i]['cat_CodigoCategoria']?>')" onmouseleave="cerrarLista('<?=$respCategorias[$i]['cat_CodigoCategoria']?>')">
          <a class="dropdown-item dropdown-toggle" style="cursor:pointer" data-bs-toggle="dropdown" aria-expanded="false" ><?=$respCategorias[$i]['cat_Descripcion']?></a>

  <ul class="dropdown-menu" id="<?=$respCategorias[$i]['cat_CodigoCategoria']?>" style="left: 100%;">
      
      <?php
      
      $itemsSubmenu=$subRespuesta->todasSubCategoriasConHijos($respCategorias[$i]['cat_CodigoCategoria']);
      foreach($itemsSubmenu AS $itemSub){
      ?>
        
     <a class="dropdown-item" style="" id='' href="<?=base_url?>?pag=categorias&&id=<?=$itemSub['cat_CodigoCategoria']?>&&nombre=<?=$itemSub['cat_Descripcion']?>"><?=$itemSub['cat_Descripcion']?></a>
     
      <?php
      }
      ?>
  </ul>
</div>
      
      <?php
           }
       }  
       $contadorNuevo++;
       }
       
       ?>
              
            
        
          </div>
        </li>
        <?php
        if(isset($respuestaTodosServicios)&&count($respuestaTodosServicios)>0){
        ?>
        <li class="nav-item dropdown <?=$serviciosPage?>" onmouseover="abrirLista('dropServicios')" onmouseleave="cerrarLista('dropServicios')">
          <a class="nav-link" style="cursor:pointer">SERVICIOS</a>
          <div class="dropdown-menu animate__animated animate__fadeIn animate__faster" id="dropServicios" style="top:100%">
            <?php
                   foreach ($respuestaTodosServicios as $valueServicios) {
                       ?>
                      <a class="dropdown-item" style="" id='' href="<?=base_url?>?pag=product&&id=<?=$valueServicios['art_CodigoArticulo']?>&&nombre=<?=$valueServicios['art_Descripcion']?>&&type=service"><?=$valueServicios['art_Descripcion']?></a>

                           <?php
                   }
              
       ?>  </div>
        </li>
       <?php
       }
       ?>
  
      <li class="nav-item <?=$blogPage?>">
        <a class="nav-link" style="" id=''  href="<?=base_url?>?pag=blog">BLOG</a>
      </li>
      
       <li class="nav-item <?=$contactoPage?>">
        <a class="nav-link" style="" id=''  href="<?=base_url?>?pag=contacto">CONTACTO</a>
      </li>
    </ul>
    
  </div>
    <div class="icons_nav"> 
       <i id="search-icon" class="fa-solid fa-magnifying-glass float-left"></i>
       <div style='' onmouseover="abrirLista('containerPerfil')" onmouseleave="cerrarLista('containerPerfil')" >
        <i class="fa-regular fa-user"></i>
           

  <ul class="dropdown-menu animate__animated animate__fadeIn animate__faster pt-1 overflow-auto" id="containerPerfil" style="width:270px;max-height:90vh;right:50px;box-shadow: 2px 2px 10px rgb(200,200,200)"> 
      <?php
      if(!isset($_SESSION['perfil'])){
          
      ?>
<!--      <li class="row" style="width:230px;" id='' href=""><div class="col-5" style="">Recuperar Contraseña</div></li>   -->
<a class="dropdown-item" style="width:100%" href="./?pag=cuenta&&func=login">Iniciar Sesión</a>  
          
          
          <?php 
          } else {
          ?>
          <a class="dropdown-item" style="width:100%"><?=$_SESSION['email']?></a> 
          <a class="dropdown-item" style="width:100%" href="./?pag=cuenta&&func=perfil">Perfil</a> 
          <a class="dropdown-item" style="width:100%" href='./?pag=cuenta&&func=ordenes'>Ordenes</a>
         <a class="dropdown-item" style="width:100%" href='./?pag=cuenta&&func=cerrar'>Cerrar Sesión</a>
          <?php
          }
          ?>
  </ul>
        </div>
        
        <div style='' onmouseover="abrirLista('carritoCanasta')" onmouseleave="cerrarLista('carritoCanasta')" >
        <i  class="fa-solid fa-bag-shopping double-item "><span class="" style='margin-left:10px'><?=$cantidadArticulos?></span></i>
           

  <ul class="dropdown-menu animate__animated animate__fadeIn animate__faster pt-1 overflow-auto" id="carritoCanasta" style="width:270px;max-height:90vh;right:50px;box-shadow: 2px 2px 10px rgb(200,200,200)"> 
      <?php
        if(isset($_SESSION['carrito'])){
        echo"<h6 class='text-center mt-3'>Carrito Compras</h6>";
            foreach ($_SESSION['carrito'] as $value) {
                
            
      ?>
      <li class="row" style="width:230px;" id='' href=""><div class="col-5" style=""><img style="width:100%" src="<?=base_url2.$value['imagen']?>"  alt=""/></div><p class="col-7" style='color:black'><?=$value['nombre']?></p></li>
      <hr>
      <?php
        }
        }
    
        if(isset($_SESSION['cotizacion'])){
        echo"<h6 class='text-center mt-3'>Cotización</h6>";
            foreach ($_SESSION['cotizacion'] as $value) {
                
            
      ?>
      <li class="row" style="width:230px;" id='' href=""><div class="col-5" style=""><img style="width:100%" src="<?=base_url2.$value['imagen']?>"  alt=""/></div><p class="col-7" style='color:black'><?=$value['nombre']?></p></li>
      <hr>
      <?php
        }
        }
      ?>
      <div class="container w-100"><a href="<?=base_url?>?pag=carrito"><button class="btn-outline-success ml-4">completar</button></a></div>
 </ul>
        

        </div>
    </div>
    <form id="site-search" class="site-search" method="get" action="./">
        <input type="text" name="datos" placeholder="Digite lo que busca...">
        <input type="hidden" name="pag" value="resultados" >
        <div class="search-tools" style="cursor:pointer" id="search-tools"><span class="clear-search">Limpiar</span><span class="close-search"><i class="icon-cross"></i></span></div>
        <button class="btn btn-outline-primary-2" style="position:absolute;right:100px;top:50%;margin-top:-20px;"><i id="search-icon" class="fa-solid fa-magnifying-glass float-left"></i></button>  
    </form>
</nav>


<script>
    function abrirLista(lista){
        $("#"+lista).css("display","block");
    }
     function cerrarLista(lista){
        $("#"+lista).css("display","none");
    }
      var elemento=document.getElementById("info-up");
    var pos=elemento.getBoundingClientRect().bottom;
    $(window).scroll(function(){
   
          elemento=document.getElementById("info-up");
    pos=elemento.getBoundingClientRect().bottom; 
    });
    
       
    var accion=false;
function openSidebar(){

    if(accion==true){
        $("#side-bar").css("margin-left","-290px");
        accion=false;
        $("#page-body").css("margin-left","0px");
       $("#nav-fix").css("margin-left","0px");
       
        $("#box_w").css("margin-left","0px");  
        $("#body").css("overflow","auto");  
      /*  problema es el min-width de 100%*/
       
    } else {
        var tamano=screen.height;
        
                $("#side-bar").css("margin-left","0px");
                $("#page-body").css("margin-left","291px");
             $("#body").css("overflow","hidden");   
      if(pos<=0){
           $("#nav-fix").css("margin-left","290px");

           
       }else{
         $("#nav-fix").css("margin-left","0px");
      
       }
            
            $("#box_w").css("margin-left","290px");  
         
            
    accion=true;
    }
    
}
$("#search-tools").on("click",function(){
     $("#site-search").css("opacity","0");
    $("#site-search").css("visibility","hidden"); 
});
$("#search-icon").on("click",function(){
    $("#site-search").css("opacity","1");
    $("#site-search").css("visibility","visible");
});
</script>

<?php

?>