
<?php
if(count($respuestaServicio)>0){
?>
      <section class="container pt-4 mt-4 mb-4">
        <h3 class="text-center mb-30 tbs">Servicios</h3>
        <div class="row">
            <?php
            $cont=0;
            
            foreach ($respuestaServicio as $value) {
            
           if($cont<6){
            
            ?>
            
          <div class="col-md-4 col-sm-6 mt-4">
            <div class="card mb-30">
                <a class="card-img-tiles" href="<?=base_url?>?pag=product&&id=<?=$value['art_CodigoArticulo']?>">
                <div class="inner">
                  <div class="main-img" id="" ><img src="<?=base_url2.$value['rutaImagen']?>" alt="Categoria"></div>
                  
                </div></a>
              <div class="card-body text-center">
                <h4 class="card-title"><?=$value['art_Descripcion']?></h4>
                
                  <a class="btn btn-outline-primary btn-sm" href="<?=base_url?>?pag=product&&id=<?=$value['art_CodigoArticulo']?>">VER SERVICIO</a>
              </div>
            </div>
          </div>
       <?php  
       $cont++;
            }   
            }
            ?>
            
        </div>
  <div class="text-center"><a class="btn btn-outline-secondary m-4" href="<?=base_url?>?pag=servicios">TODOS LOS SERVICIOS</a></div>
    
     
      </section>
<?php
}
?>