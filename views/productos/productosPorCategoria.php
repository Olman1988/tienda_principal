<?php
$nombre;
if(isset($_GET['nombre'])){
    $nombre=$_GET['nombre'];
} else {
  $nombre=" ";  
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
              <li><a href="/">Inicio</a>
              </li>
              <li class="separator">&nbsp;</li>
              <li><?=$nombre?></li>
            </ul>
          </div>
        </div>
      </div>

    <div class="container pb-3 mb-1 section-category">
        <div class="row content-categories">
          <!-- Products-->
          <div class="col-xl-10 col-lg-9 order-lg-2">
            <!-- Shop Toolbar-->
            <div class="shop-toolbar mb-2">
              
              <div class="column">
                  <div class="shop-view"><a class="grid-view active" href="<?=base_url?>?pag=product&&id=1"><span></span><span></span><span></span></a><a class="list-view" href="https://bordados.tecnosula.com/CategoriaLista/4/Pantalones"><span></span><span></span><span></span></a></div>
              </div>
            </div>


            <!-- Products Grid-->
            <div class="row">
                
              <?php 
              $cont=0;
              var_dump($respuestaArticulos);
              foreach ($respuestaArticulos as $value) {
                  $cont++;
                  $ext="ex$cont";  
                ?>
              <!-- Product-->
              <div class="col-xl-4 col-md-6 col-sm-12">
                <div class="product-card">
                  
                    <a class="product-thumb" href="<?=base_url?>?pag=product&&id=1">
<!--                    <div class="zoom" id="<?=$ext?>">
                        <img src="<?=base_url.$value['rutaImagen']?>" alt="Producto">
                       </div> -->
                        <div class="main-img" id="">
                        <img src="<?=base_url.$value['rutaImagen']?>" alt="Producto">
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
              ?>
                
             
                
            </div>
            
          </div>
          <!-- Sidebar          -->
          <div class="col-xl-2 col-lg-2 order-lg-1">
            
              <!-- Widget Categories-->
              <section class="widget widget-categories">
                <h3 class="widget-title">Categorías</h3>
                <ul>
                    
                    <li class="has-children expanded"><a href="<?=base_url?>?pag=categorias&&id=1">Camisas y Blusas</a>
                      
                  </li>
                    
                  <li class="has-children expanded"><a href="<?=base_url?>?pag=categorias&&id=1">Camisetas</a>
                      
                  </li>
                    
                  <li class="has-children expanded"><a href="<?=base_url?>?pag=categorias&&id=1">Delantales y Petos</a>
                      
                  </li>
                    
                  <li class="has-children expanded"><a href="<?=base_url?>?pag=categorias&&id=1">Gorras, Viseras y Sombreros</a>
                      
                            <ul>
                                
                                    <li><a href="<?=base_url?>?pag=categorias&&id=1">Gorras</a>
                                
                                    <li><a href="<?=base_url?>?pag=categorias&&id=1">Sombreros</a>
                                
                                    <li><a href="<?=base_url?>?pag=categorias&&id=1">Viseras</a>
                                
                            </ul>
                      
                  </li>
                    
                  <li class="has-children expanded"><a href="<?=base_url?>?pag=categorias&&id=1">Jackets y Sudaderas</a>
                      
                  </li>
                    
                  <li class="has-children expanded"><a href="<?=base_url?>?pag=categorias&&id=1">Pantalones</a>
                      
                  </li>
                    
                </ul>
              </section>
              
            </aside>
          </div>
        </div>
      </div>

        
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