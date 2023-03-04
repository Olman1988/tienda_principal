<?php
if(count($respuestaCategorias)>0){
     $servicios= new categoriasController();
 $respuestaServicios= $servicios->todasCategoriasServicios();

?>
      <section class="container pt-4 mt-4">
        <h3 class="text-center mb-30 tbs">Categorías</h3>
        <div class="row">
            <?php
            $cont=0;
            $limit= 0;
            
            foreach ($respuestaCategorias as $value) {
                
                foreach ($respuestaServicios as $valueServicios) {
               if($respuestaCategorias[$cont]['cat_CodigoCategoria']==$valueServicios['cat_CodigoCategoria']){
                   
                  $respuestaCategorias[$cont]['esServicio'] = true; 
               } 
               
           }
            
            
           if(!$respuestaCategorias[$cont]['esServicio'] && $limit<6){
            ?>
            
          <div class="col-md-4 col-sm-6 mt-4">
            <div class="card mb-30">
                <a class="card-img-tiles" href="<?=base_url?>?pag=categorias&&id=<?=$value['cat_CodigoCategoria']?>&&nombre=<?=$value['cat_Descripcion']?>">
                <div class="inner">
                  <div class="main-img" id="" ><img src="<?=base_url.$value['rutaImagen']?>" alt="Categoria"></div>
                  
                </div></a>
              <div class="card-body text-center">
                <h4 class="card-title"><?=$value['cat_Descripcion']?></h4>
                
                  <a class="btn btn-outline-primary btn-sm" href="<?=base_url?>?pag=categorias&&id=<?=$value['cat_CodigoCategoria']?>&&nombre=<?=$value['cat_Descripcion']?>">VER PRODUCTOS</a>
              </div>
            </div>
          </div>
            <?php $limit++; }
            $cont++;
           }
            ?>
            
        </div>
        <div class="text-center"><a class="btn btn-outline-secondary m-4" href="<?=base_url?>?pag=categorias">TODAS LAS CATEGORÍAS</a></div>
  
    
     
      </section>
<?php
}
?>


