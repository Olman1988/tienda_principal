<?php
if(count($respuestaCategorias)>0){
     $servicios= new categoriasController();
 $respuestaServicios= $servicios->todasCategoriasServicios();

?>
      <section class="container pt-4 mt-4 mb-4">
        <h3 class="text-center mb-30 tbs">Categorías</h3>
        <div class="row">
            <?php
            $esPadre=false;
       $contador=1;
       $objetoPadre= new validacionMenu();
       $contadorCat = 0;
       $contadorNuevo = 0;
            $cont=0;
            
            foreach ($respuestaCategorias as $value) {
                
                foreach ($respuestaServicios as $valueServicios) {
               if($respuestaCategorias[$cont]['cat_CodigoCategoria']==$valueServicios['cat_CodigoCategoria']){
                   
                  $respuestaCategorias[$cont]['esServicio'] = true; 
               } 
               
           }
            
            
           if(!$respuestaCategorias[$cont]['esServicio']){
               $esPadre=$objetoPadre->esPadre($todasCategoriasPadre,$value['cat_CodigoCategoria']);
               if(!$esPadre){
            ?>
            
          <div class="col-md-4 col-sm-6 mt-4">
            <div class="card mb-30">
                <a class="card-img-tiles" href="<?=base_url?>?pag=categorias&&id=<?=$value['cat_CodigoCategoria']?>&&nombre=<?=$value['cat_Descripcion']?>">
                <div class="inner">
                  <div class="main-img" id="" ><img src="<?=base_url3.$value['rutaImagen']?>" alt="Categoria"></div>
                  
                </div></a>
              <div class="card-body text-center">
                <h4 class="card-title"><?=$value['cat_Descripcion']?></h4>
                
                  <a class="btn btn-outline-primary btn-sm" href="<?=base_url?>?pag=categorias&&id=<?=$value['cat_CodigoCategoria']?>&&nombre=<?=$value['cat_Descripcion']?>">VER PRODUCTOS</a>
              </div>
            </div>
          </div>
            <?php }
           }
            $cont++;
           }
            ?>
            
        </div>
  
    
     
      </section>
<div class="text-center"><a class="btn btn-outline-secondary m-4" href="<?=base_url?>?pag=categorias">TODAS LAS CATEGORÍAS</a></div>

<?php
}
?>


      


