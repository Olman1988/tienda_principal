<?php
$vendidos=[];
$nuevos=[];
$comentarios=[];
foreach ($respuestaArticulo as $value) {
 if($value['mejorComentario']==1){
     $comentarios[]=$value;
 }  
if($value['nuevo']==1){
     $nuevos[]=$value;
 } 
if($value['masVendido']==1){
     $vendidos[]=$value;
 }  
 if($value['destacado']==1){
     $destacados[]=$value;
 }
}
?>
     
     <section class="container" style="padding-top:20px; padding-bottom:20px;">
        <?php
        if(isset($destacados)&&count($destacados)>0){
        ?>
         <h3 class="text-center mb-30 tbs">Productos Destacados</h3>
        <div class="row">
            <?php 
              $cont=0;
              foreach ($destacados as $value) {
                  $cont++;
                 // $ext="ex$cont";  
                ?>
              <!-- Product-->
              <div class="col-xl-4 col-md-6 col-sm-12">
                <div class="product-card">
                  
                    <a class="product-thumb" href="<?=base_url?>?pag=product&&id=<?=$value['art_CodigoArticulo']?>">
                    <div class="imagenDestacados" style="overflow:hidden;" id="">
                        <img src="<?=base_url2.$value['rutaImagen']?>" alt="Producto">
                       </div> 
                        </a>
                    <div class="card-body text-center">
                  <h4 class="card-title mt-3">
                      <?=$value['art_Descripcion']?> </h4>
                    </div>
                  <div class="product-buttons">
                    
                    
                    <a class="btn btn-outline-primary btn-sm"  
                        href="<?=base_url?>?pag=product&&id=<?=$value['art_CodigoArticulo']?>">Ver</a>
                  </div>
                </div>
              </div>
              
              <?php
              }
              ?>
        </div>
         <?php
        }
         ?>
      </section>
      <!-- Product Widgets-->
      <section class="container mb-4">
        <div class="row" style='height:auto'>
            <?php
                if(count($vendidos)>0){
                ?>
          <div class="col-md-4 col-sm-6">
            <div class="widget">
                
              <h3 class="widget-title-products">Más vendidos</h3>
              <!-- Entry-->
              <?php
                              foreach ($vendidos as $valueVendidos) {
                                  
                              
              ?>
              <div class="row mb-4 mt-4" style="display:flex;align-items: center;">
                  <img class="col-md-6" style="width:100px;" src="<?=base_url2.$valueVendidos['rutaImagen']?>" alt=""/>
                  <h4 class="col-md-6"><a class="link-general" style="text-decoration: none; font-size:15px;" href="?pag=product&id=<?=$valueVendidos['art_CodigoArticulo']?>"><?=$valueVendidos['art_Descripcion']?></a></h4>
              </div>
              <?php 
                              }
              ?>
              
            </div>
          </div>
            
            <?php
                }
            ?>
          <?php
                if(count($nuevos)>0){
                ?>
          <div class="col-md-4 col-sm-6">
            <div class="widget">
                
              <h3 class="widget-title-products">Productos Nuevos</h3>
              <!-- Entry-->
              <?php
                              foreach ($nuevos as $valueNuevos) {
                                  
                              
              ?>
              <div class="row mb-4 mt-4" style="display:flex;align-items: center;">
                  <img class="col-md-6" style="width:100px;" src="<?=base_url2.$valueNuevos['rutaImagen']?>" alt=""/>
                  <h4 class="col-md-6"><a class="link-general" style="text-decoration: none; font-size:15px;" href="?pag=product&id=<?=$valueNuevos['art_CodigoArticulo']?>"><?=$valueNuevos['art_Descripcion']?></a></h4>
              </div>
              <?php 
                              }
              ?>
              
            </div>
          </div>
            
            <?php
                }
            ?>
            <?php
                if(count($comentarios)>0){
                ?>
          <div class="col-md-4 col-sm-6">
            <div class="widget">
                
              <h3 class="widget-title-products">Mejores Comentarios</h3>
              <!-- Entry-->
              <?php
                              foreach ($comentarios as $valueComentario) {
                                  
                              
              ?>
              <div class="row mb-4 mt-4" style="display:flex;align-items: center;">
                  <img class="col-md-6" style="width:100px;" src="<?=base_url2.$valueComentario['rutaImagen']?>" alt=""/>
                  <h4 class="col-md-6"><a class="link-general"  style="text-decoration: none; font-size:15px;" href="?pag=product&id=<?=$valueComentario['art_CodigoArticulo']?>"><?=$valueComentario['art_Descripcion']?></a></h4>
              </div>
              <?php 
                              }
              ?>
              
            </div>
          </div>
            
            <?php
                }
            ?>
        </div>
      </section>
     
      


