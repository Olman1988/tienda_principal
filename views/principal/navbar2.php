<?php
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

?>

<div class='info-up' id="info-up"> 
    <div><i class="fa-regular fa-envelope "></i><span style='margin-left:10px;'><?=$profile->infoEmail?></span></div>
    <div><i class="fa-solid fa-mobile-screen-button "></i><span style='margin-left:10px;'>+506 <?=$profile->phone?></span></div>
    <div><i class="fa-brands fa-whatsapp"></i></div>
</div>
 
<nav class="navbar navbar-expand-lg navbar-light bg-light" id="nav-fix" style="flex-wrap: nowrap! important">
   
    <div  style="cursor:pointer;padding:15px 30px 15px 30px;border-right:solid 1px lightgray;" >
      <span  onclick='openSidebar();' class="navbar-toggler-icon"></span>
    </div>
 
  
    <a class="ml-4" href="<?=base_url?>" style=""><img id="logo" src="<?=base_url2.$profile->logo?>" style=""></a>
 

  <div class="collapse navbar-collapse" id="navbarColor02" style="height:50px;">
      
    <ul class="navbar-nav mx-auto navbar_ul" style="height:75px;">
      
      <li class="nav-item li-active">
        <a class="nav-link" style="" id='' href="<?=base_url?>">INICIO</a>
      </li>
        <li class="nav-item dropdown" onmouseover="abrirLista('dropNosotros')" onmouseleave="cerrarLista('dropNosotros')">
          <a class="nav-link" style="cursor:pointer">NOSOTROS</a>
          <div class="dropdown-menu animate animate__bounceIn" id="dropNosotros" style="top:100%">
          <?php
          foreach ($consultaAcercaDe as $consultaAcercaDevalue) {
              
          
          ?>
          <a class="dropdown-item" href="<?=base_url?>?pag=nosotros&&cod=<?=$consultaAcercaDevalue['codigo']?>"><?=$consultaAcercaDevalue['nombre']?></a>
             
        <?php 
          }
        ?>
          </div>
        </li>
      <li class="nav-item dropdown" onmouseover="abrirLista('dropCategorias')" onmouseleave="cerrarLista('dropCategorias')">
          <a class="nav-link" style="cursor:pointer">CATEGORIAS</a>
          <div class="dropdown-menu animate animate__bounceIn" id="dropCategorias" style="top:100%">
            <?php
            $subRespuesta= new categoriasController();
       $esPadre=false;
       $contador=1;
       $objetoPadre= new validacionMenu();
       foreach ($respCategorias as $valueCategori) {
           $esPadre=$objetoPadre->esPadre($todasCategoriasPadre,$valueCategori['cat_CodigoCategoria']);
           
           if(!$esPadre){
           ?>
               
             
        <a class="dropdown-item" style="" id='' href="<?=base_url?>?pag=categorias&&id=<?=$valueCategori['cat_CodigoCategoria']?>&&nombre=<?=$valueCategori['cat_Descripcion']?>"><?=$valueCategori['cat_Descripcion']?></a>
       
               <?php
           } else {
                
               ?>
      <div class="btn-group dropend w-100" onmouseover="abrirLista('<?=$valueCategori['cat_CodigoCategoria']?>')" onmouseleave="cerrarLista('<?=$valueCategori['cat_CodigoCategoria']?>')">
          <a class="dropdown-item dropdown-toggle" style="cursor:pointer" data-bs-toggle="dropdown" aria-expanded="false" ><?=$valueCategori['cat_Descripcion']?></a>

  <ul class="dropdown-menu" id="<?=$valueCategori['cat_CodigoCategoria']?>" style="left: 100%;">
      
      <?php
      
      $itemsSubmenu=$subRespuesta->todasSubCategoriasConHijos($valueCategori['cat_CodigoCategoria']);
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
       
       ?>
              
            
        
          </div>
        </li>
       
  
      <li class="nav-item">
        <a class="nav-link" style="" id=''  href="<?=base_url?>?pag=blog">BLOG</a>
      </li>
      
       <li class="nav-item">
        <a class="nav-link" style="" id=''  href="<?=base_url?>blog.php">CONTACTO</a>
      </li>
    </ul>
    
  </div>
    <div class="icons_nav"> 
       <i class="fa-solid fa-magnifying-glass float-left"></i>
        <i class="fa-regular fa-user"></i>
        <div style='' onmouseover="abrirLista('carritoCanasta')" onmouseleave="cerrarLista('carritoCanasta')" >
        <i  class="fa-solid fa-bag-shopping double-item "><span class="" style='margin-left:10px'><?=$cantidadArticulos?></span></i>
           

  <ul class="dropdown-menu animate__animated animate__bounceIn pt-1 overflow-auto" id="carritoCanasta" style="width:270px;max-height:90vh;right:50px;box-shadow: 2px 2px 10px rgb(200,200,200)"> 
      <?php
        if(isset($_SESSION['carrito'])){
        echo"<h6 class='text-center mt-3'>Carrito Compras</h6>";
            foreach ($_SESSION['carrito'] as $value) {
                
            
      ?>
      <li class="row" style="width:230px;" id='' href=""><div class="col-5" style=""><img style="width:100%" src="<?=$value['imagen']?>"  alt=""/></div><p class="col-7"><?=$value['nombre']?></p></li>
      <hr>
      <?php
        }
        }
    
        if(isset($_SESSION['cotizacion'])){
        echo"<h6 class='text-center mt-3'>Cotización</h6>";
            foreach ($_SESSION['cotizacion'] as $value) {
                
            
      ?>
      <li class="row" style="width:230px;" id='' href=""><div class="col-5" style=""><img style="width:100%" src="<?=$value['imagen']?>"  alt=""/></div><p class="col-7"><?=$value['nombre']?></p></li>
      <hr>
      <?php
        }
        }
      ?>
      <div class="container w-100"><a href="<?=base_url?>?pag=carrito"><button class="btn-outline-success">completar</button></a></div>
 </ul>
        

        </div>
    </div>
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

</script>

