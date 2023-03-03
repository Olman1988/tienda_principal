<?php
$nombre;
if(isset($_GET['nombre'])){
    $nombre=$_GET['nombre'];
} else {
  $nombre=" ";  
}
 class validacionParaProductosLista{
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

    <div class="container pb-3 mb-1 section-category">
        <div class="row content-categories">
          <!-- Products-->
          <div class="col-xl-10 col-lg-9 order-lg-2">
            <!-- Shop Toolbar-->
            <div class="shop-toolbar mb-2">
              
              <div class="column">
                  <div class="float-right shop-view"><a class="grid-view" href="<?=base_url?>?pag=categorias&&id=<?=$_GET['id']?>&&nombre=<?=$_GET['nombre']?>"><i class="fa-solid fa-grip"></i></a><a class="list-view active" href="<?=base_url?>?pag=categoriasLista&&id=<?=$_GET['id']?>&&nombre=<?=$_GET['nombre']?>"><i class="fa-solid fa-list"></i></a></div>
              </div>
            </div>

            
            <!-- Products Grid-->
            <div class="row">
                
              <?php 
              $cont=0;
              foreach ($respuestaArticulos as $value) {
                  $cont++;
                  $ext="ex$cont";  
                ?>
              <!-- Product-->
              <div class="col-xl-6 col-md-6 col-sm-11 mx-auto p-4">
                <div class="product-card row " style="min-height:230px;height:auto;min-width:300px;">
                  <div class="col-xl-6 col-sm-12">
                    <a class="product-thumb" href="<?=base_url?>?pag=product&&id=<?=$value['art_CodigoArticulo']?>">
<!--                    <div class="zoom" id="<?=$ext?>">
                        <img class="fluid" src="<?=base_url2.$value['rutaImagen']?>" alt="Producto">
                       </div> -->
                         <div class="main-img" id="">
                        <img src="<?=base_url2.$value['rutaImagen']?>" alt="Producto">
                       </div>
                        </a>
                      </div>
                    <div class="col-xl-5 col-sm-12" style="display:grid;align-items:center">
                  <h3 class="product-title"><a href="">
                      <?=$value['art_Descripcion']?> </a></h3>
                    
                  <div class="product-buttons">
                    
                    
                                        <a class="btn btn-outline-primary btn-sm" onclick="validarProductoCotizado(<?=$value['art_CodigoArticulo']?>)"]>Ver producto</a>

                  </div>
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

function validarProductoCotizado(id){
   
    var id = id;
    var action = 'validarProductoCotizado';
    let data ={
        "id":id,
        "action":action
    }
     
    $.ajax({
        type:'POST',    
        url:'./carritoCompras/carritoController.php',
        data:data,
        success:function(dat){
           
            if(dat!=3){
          
               
               window.setTimeout(function () {
                            window.location.href = "./?pag=product&&id="+id+""
                        }, 2000);
                     
             
        } else {
           Swal.fire({
                        title: 'Este producto ya fue agregado para cotizar',
                        text: "Desea modificar la información?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Sí'
                      }).then((result) => {
                        if (result.isConfirmed) {
                              window.setTimeout(function () {
                            window.location.href = "./?pag=product&&id="+id+""
                        }, 2000);
                        }
                      });
        }
        }
    });
    
}

</script>