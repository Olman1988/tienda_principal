<?php
$nombre = "Busqueda";
require_once 'controllers/categoriasController.php';
$categorias= new categoriasController();
$subRespuesta = new categoriasController();
$respCategorias=$categorias->todasCategoriasParaMenu();
$todasCategoriasPadre=$categorias->todasCategoriasPadre();
 class validacionParaProductos{
     public function esPadre($todasCategoriasPadre,$categoria){
         for($i=0;$i<count($todasCategoriasPadre);$i++){
               if($todasCategoriasPadre[$i]['categoriaPadre']==$categoria){
                   return true;
               }
     }
 }

 }


?>

 <!-- Page Title-->
      <div class="page-title" id="page-title">
        <div class="container">
          <div class="column">
            <h1><?=$nombre?></h1>
          </div>
          <div class="column">
            <ul class="breadcrumbs">
              <li><a href="<?=base_url?>">Inicio</a>
              </li>
              <li class="separator">&nbsp;</li>
              <li><?=$nombre?></li>
            </ul>
          </div>
        </div>
      </div>
 <?php 
 if(count($respuestaArticulos[0])>0){
 ?>

    <div class="container pb-3 mb-1 section-category">
        <div class="row content-categories">
          <!-- Products-->
          <div class="col-xl-10 col-lg-9 order-lg-2">
            <!-- Shop Toolbar-->
           


            <!-- Products Grid-->
            <div class="row">
                
              <?php 
              $cont=0;
              foreach($respuestaArticulos as $respArt){
              foreach ($respArt as $value) {
                  $cont++;
                  if($cont>8){
                    $ext="ex".($cont+2);    
                  }else {
                  $ext="ex$cont";  
                  }
                ?>
              <!-- Product-->
              <div class="col-xl-4 col-md-6 col-sm-12">
                <div class="product-card">
                    
                  
                    <a class="product-thumb" href="<?=base_url?>?pag=product&&id=<?=$value['art_CodigoArticulo']?>">
                    <div class="imagenDestacados" style="overflow:hidden;" id="">
                        <img src="<?=base_url2.$value['rutaImagen']?>" alt="Producto">
                       </div> 
                        </a>
                  <h3 class="product-title"><a href="">
                      <?=$value['art_Descripcion']?> </a></h3>
                    
                  <div class="product-buttons">
                    
                    
                    <a class="btn btn-outline-primary btn-sm"  
                        href="<?=base_url?>?pag=product&&id=<?=$value['art_CodigoArticulo']?>">Ver producto</a>
                  </div>
                </div>
              </div>
              <?php
              }
 
              }       ?>
                
             
                
            </div>
            
          </div>
          <!-- Sidebar          -->
                <!-- Sidebar          -->
          <div class="col-xl-2 col-lg-2 order-lg-1">
            
              <!-- Widget Categories-->
              <section class="widget widget-categories">
                <h3 class="widget-title">Categorías</h3>
                <ul>
            <?php
       $esPadre=false;
       $contador=1;
       $objetoPadre= new validacion();
       for($i = 0; $i < count($respCategorias)-1;$i++){
           $esPadre=$objetoPadre->esPadre($todasCategoriasPadre,$respCategorias[$i]['cat_CodigoCategoria']);
           if(!$esPadre){
           ?>
               
             
        <li class="has-children expanded"><a class="" style="" id='' href="<?=base_url?>?pag=categorias&&id=<?=$respCategorias[$i]['cat_CodigoCategoria']?>&&nombre=<?=$respCategorias[$i]['cat_Descripcion']?>"><?=$respCategorias[$i]['cat_Descripcion']?></a>
       </li>
               <?php
           } else {
                
               ?>
       <li class="has-children expanded"><a class="" style="" id='' href="<?=base_url?>?pag=categorias&&id=<?=$respCategorias[$i]['cat_CodigoCategoria']?>&&nombre=<?=$respCategorias[$i]['cat_Descripcion']?>"><?=$respCategorias[$i]['cat_Descripcion']?></a>
       
             
       <ul>
    <?php
       
          $itemsSubmenu=$subRespuesta->todasSubCategoriasConHijos($respCategorias[$i]['cat_CodigoCategoria']);
      foreach($itemsSubmenu AS $valueNue) {
              
          
          ?>
       
                                
                                    <li><a href="<?=base_url?>?pag=categorias&&id=<?=$valueNue['cat_CodigoCategoria']?>&&nombre=<?=$valueNue['cat_Descripcion']?>"><?=$valueNue['cat_Descripcion']?></a></li>
                                
  <?php
       }
       ?>
                                    </ul>
       </li> 
  

      
     <?php
          $contador++; 
       }
       }
       ?>
                    
            </ul>        
              </section>
              
            
          </div>
        </div>
      </div>

  <?php
  } else {
      echo"<div class='container mt-2'style='min-height:50vh;'>"
      . "<h2 class='text-center'>No se encontraron resultados en la búsqueda</h2>"
              . "<h3 class='text-center'>Intente nuevamente</h3></div>";
  }
  ?>
<script>

    $(document).ready(function(){
    
    $(window).scroll(function(){
        
        let elemento=document.getElementById("info-up");
        let pos=elemento.getBoundingClientRect().bottom;
           
        
       if(pos<=0){
           $('#nav-fix').addClass('fixed-top');
           $('#page-title').css('margin-top','80px');

       }else{
         $('#nav-fix').removeClass('fixed-top');
         $('#page-title').css('margin-top','0px');
       
       }   
       
    });
 $('.navbr ul li a').click(function(){
        // applying again smooth scroll on menu items click
        $('html').css("scrollBehavior", "smooth");
    });
 $('.href_contact').click(function(){
        // applying again smooth scroll on menu items click
        $('html').css("scrollBehavior", "smooth");
    });


  $("#js-top").click(function(event) {
        event.preventDefault();
        $("html, body").animate({ scrollTop: 0 }, "slow");
        return false;
    });  
});
</script>