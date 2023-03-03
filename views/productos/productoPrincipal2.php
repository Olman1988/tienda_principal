<?php
if(isset($_SESSION)){
    if(isset($_SESSION['carrito'])){
        
    }
    
} else {
   session_start(); 
   if(isset($_SESSION['carrito'])){
        
    }
}
?>
<div class="page-title" id='page-title'>
        <div class="container">
          <div class="column">
            <h1><?=$respuestaArticulo['art_Descripcion']?></h1>
          </div>
          <div class="column">
            <ul class="breadcrumbs">
              <li><a href="/">Inicio</a>
              </li>
              <li class="separator">&nbsp;</li>
              <li><a href="<?=base_url?>?pag=categorias&&id=<?=$respuestaArticulo['cat_CodigoCategoria']?>&&nombre=<?=$respuestaArticulo['cat_Descripcion']?>"><?=$respuestaArticulo['categoria']?></a></li>
              <li class="separator">&nbsp;</li>
              <li><?=$respuestaArticulo['art_Descripcion']?></li>
            </ul>
          </div>
        </div>
      </div>
<div class="container padding-bottom-3x mb-1">
        <div class="row">
            <!-- Poduct Gallery-->
            <div class="col-md-6" >
                <div class="product-gallery">
                    <div class="border-1 rounded" style="position:relative;border:solid 1px gray;">
                        <i class="fa-solid fa-magnifying-glass-plus" data-bs-toggle="modal" data-bs-target="#exampleModal" style="cursor:pointer;font-size:25px;color:rgb(100,100,100);position:absolute;top:20px;right:20px;border-radius:50%;padding:10px;border:solid 1px rgb(200,200,200)"></i>
                        <div>
                    <div class="gallery-wrapper zoom" id="ex9" style="margin:20px;margin-top:80px;" >
                        <img style="width:100%;" src="<?=base_url2.$respuestaArticulo['rutaImagen']?>" alt="alt"/>
                    </div>
                        </div>
                        </div>
                    <div class="product-carousel owl-carousel">
                        
                    </div>
                    <ul class="product-thumbnails">
                        
                    </ul>
                </div>
            </div>

         <div class="col-md-6">
                <div class="padding-top-2x mt-2 hidden-md-up"></div>
                <div class="rating-stars">
                    <span class='fa fa-star '></span><span class='fa fa-star '></span><span class='fa fa-star '></span><span class='fa fa-star '></span><span class='fa fa-star '></span>
                </div>
                <span class="text-muted align-middle">&nbsp;&nbsp;0 | 0 comentarios</span>
                <h2 class="padding-top-1x text-normal"><?=$respuestaArticulo['art_Descripcion']?></h2>
                
                
                <p>
                    
                </p>
                
                
                Personalización escogida:
                <div id="seleccion" style="background-color:#ccc;"></div>
                


                <div class="row ">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="quantity">Cantidad</label>
                            <input name="ctl00$ContentPlaceHolder1$Cantidad" type="number" value="1" maxlength="3" id="ContentPlaceHolder1_Cantidad" class="form-control" style="width:100px;" />
                            <span data-val-controltovalidate="ContentPlaceHolder1_Cantidad" data-val-errormessage="Requerido" id="ContentPlaceHolder1_ctl00" class="text-danger" data-val="true" data-val-evaluationfunction="RequiredFieldValidatorEvaluateIsValid" data-val-initialvalue="" style="visibility:hidden;">Requerido</span>
                        </div>
                    </div>
                </div>

                <div class="pt-1 mb-2"><span class="text-medium">SKU:</span> #</div>
                <div class="padding-bottom-1x mb-2"><span class="text-medium">Categoría:&nbsp;</span><?=$respuestaArticulo['categoria']?></div>
                <hr class="mb-3">
                <div class="d-flex flex-wrap justify-content-between">
                    
                    <div class="sp-buttons mt-2 mb-2">
                        
                        
                        <input type="button" name="" style='text-transform: uppercase;font-size:12px;' value="Agregar" onclick="agregarCarrito(<?=$respuestaArticulo['art_CodigoArticulo']?>,'agregarCarrito','<?=$respuestaArticulo['art_Descripcion']?>','<?=base_url2.$respuestaArticulo['rutaImagen']?>')" id="" class="btn-outline-primary" />
                                           <input type="button" name="" style='text-transform: uppercase;font-size:12px;' value="Cotizar" onclick="agregarCarrito(<?=$respuestaArticulo['art_CodigoArticulo']?>,'agregarCotizacion','<?=$respuestaArticulo['art_Descripcion']?>','<?=base_url2.$respuestaArticulo['rutaImagen']?>')" id="" class="btn-outline-secondary" />

                    </div>
                </div>
            </div>
        </div>
        <!-- Product Tabs-->
        <div class="row padding-top-3x mb-3">
            <div class="col-lg-10 offset-lg-1">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item"><a class="nav-link active" href="#description" data-toggle="tab" role="tab">Descripción</a></li>
                    <li class="nav-item"><a class="nav-link" href="#reviews" data-toggle="tab" role="tab">Comentarios (0)</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="description" role="tabpanel">
                        
                        
                    </div>
                   
                </div>
            </div>
        </div>

        <!-- Related Products Carousel-->
        <h3 class="text-center p-4 mt-2 ">Productos más vendidos</h3>
        <!-- Carousel-->
        <div class="owl-carousel" data-owl-carousel="{ &quot;nav&quot;: false, &quot;dots&quot;: true, &quot;margin&quot;: 30, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;576&quot;:{&quot;items&quot;:2},&quot;768&quot;:{&quot;items&quot;:3},&quot;991&quot;:{&quot;items&quot;:4},&quot;1200&quot;:{&quot;items&quot;:4}} }">
            
        </div>
        
    </div>



<!-- Modal -->
<div class="modal fade"  id="exampleModal" style='' aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
      
        <h5 class="modal-title p-4" id="exampleModalLabel"><?=$respuestaArticulo['art_Descripcion']?></h5>
        
      <div class="modal-body center-align mx-auto" style="min-width:100%;">
          <div class="zoom" id="ex10" style="margin:0px 20px 0px 20px;">
        <img style="margin:auto;" src="<?=base_url2.$respuestaArticulo['rutaImagen']?>" alt="alt"/>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
  </div>
</div>



         <script>
            // $('#exampleModal').appendTo("body").modal('show');

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

$('#exampleModal').appendTo("body");
function agregarCarrito(idArticulo,action,nombre,imagen){
    
    
 


    if(idArticulo){
   
    $.ajax({
        type:'POST',    
        url:'./carritoCompras/carritoController.php',
        data:'idArticulo='+idArticulo+'&action='+action+'&nombre='+nombre+'&imagen='+imagen,
        success:function(dat){
          
            if(dat!=false){
                if(action=='agregarCarrito'){
                Swal.fire({
                                                   icon: 'success',
                                                   title: 'Agregado',
                                                   text: 'Producto agregado al Carrito'

                                                 });
               
               window.setTimeout(function () {
                            window.location.href = "./?pag=product&&id="+idArticulo+""
                        }, 2000);
                    } else {
                       Swal.fire({
                                                   icon: 'success',
                                                   title: 'Enviado',
                                                   text: 'Producto agregado para Cotizar'

                                                 });
               
               window.setTimeout(function () {
                            window.location.href = "./?pag=product&&id="+idArticulo+""
                        }, 2000);  
                    }
            } else {
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Datos incorrectos'
              
              })
            }
        }
    });
    } else {
         Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Existen algunos valores vacíos'
              
              })
    }
}
</script>
        
