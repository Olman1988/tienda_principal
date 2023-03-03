<?php

if(isset($_SESSION)){
   
    
} else {
   session_start(); 
   if(isset($_SESSION['carrito'])){
        
    }
}
$observaciones= '';
$archivoCotizacion = 'Elegir Archivo';
 if(isset($_SESSION['cotizacion'])){
     foreach ($_SESSION['cotizacion'] as $valueCotizacion) {
         
         if($valueCotizacion['id']==$_GET['id']){
             $observaciones=$valueCotizacion['observacion'];
             
             if($valueCotizacion['file']){
               $archivoCotizacion = $valueCotizacion['file'];  
             } else {
               $archivoCotizacion = 'Elegir Archivo';
             }
             
          
         }
     }
 }
require_once './controllers/articulosController.php';
$respuestaImagen= new articulosController();
$respuesFin=$respuestaImagen->todosImagenesPorId($respuestaArticulo['art_CodigoArticulo']);

//Habilitar precio
$habilitarPrecio = false;
if($respuestaArticulo['disponibleCompra']==1&&intval($respuestaArticulo['art_PrecioUnitario'])!=0){
$habilitarPrecio=true;
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
            <!-- Product Gallery-->
            <div class="col-md-6 mx-auto" >
                <div class="product-gallery">
                    <div class="border-1 rounded" style="position:relative;border:solid 1px gray;">
                        <i class="fa-solid fa-magnifying-glass-plus" data-bs-toggle="modal" data-bs-target="#exampleModal" style="cursor:pointer;font-size:25px;color:rgb(100,100,100);position:absolute;top:20px;right:20px;border-radius:50%;padding:10px;border:solid 1px rgb(200,200,200)"></i>
                        <div>
                     <div class="" id="gallery" style="margin:20px;margin-top:80px;" >
                            <?php
                                if(count($respuesFin)>0){
                                   foreach ($respuesFin as $valueRespuesta) {
                              ?>
                                <img style="width:100%; height:100%;object-fit:cover;" src="<?=base_url2?><?=$valueRespuesta['rutaImagen']?>" alt="Product">
                            <?php
                                  }
                              }
                              ?> 
                        </div>
                   
<script type="text/javascript">
    $(document).ready(function(){
	$("#gallery").unitegallery();
    });

</script>
                        </div>

                    <div class="product-carousel owl-carousel">
                        
                    </div>
                    <ul class="product-thumbnails">
                        
                    </ul>
                </div>
            </div>
                </div>

         <div class="col-md-6">
                <div class="padding-top-2x mt-2 hidden-md-up"></div>
<!--                <div class="rating-stars">
                    <span class='fa fa-star '></span><span class='fa fa-star '></span><span class='fa fa-star '></span><span class='fa fa-star '></span><span class='fa fa-star '></span>
                </div>-->
               
                <h2 class="padding-top-1x text-normal"><?=$respuestaArticulo['art_Descripcion']?></h2>
                <?php if($habilitarPrecio){ ?>
                <h4>Precio Unitario<br><span class="mr-1">₡</span> <?=number_format($respuestaArticulo['art_PrecioUnitario'],2)?></h4>
                <?php }?>
                <p>
                    <?=$respuestaArticulo['descripcionAmpliada']?>
                </p>
                
                
<!--                Personalización escogida:
                <div id="seleccion" style="background-color:#ccc;"></div>-->
                
                <?php
                if(isset($respuestaArticulo['sku'])&&$respuestaArticulo['sku']!=''){
                ?>
                <div class="pt-1 mb-2"><span class="">SKU:</span> #<?=$respuestaArticulo['sku']?></div>
                <?php
                }
                ?>
                <div class="row ">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label style="font-size:15px!important;font-weight:400 !important;padding-left:0!important;" for="quantity">Cantidad</label>
                            <input name="" type="number" value="1" maxlength="3" id="ContentPlaceHolder1_Cantidad" class="form-control" style="width:100px;" />
                            <span data-val-controltovalidate="ContentPlaceHolder1_Cantidad" data-val-errormessage="Requerido" id="ContentPlaceHolder1_ctl00" class="text-danger" data-val="true" data-val-evaluationfunction="RequiredFieldValidatorEvaluateIsValid" data-val-initialvalue="" style="visibility:hidden;">Requerido</span>
                        </div>
                    </div>
                </div>
                <?php
                        if(!$habilitarPrecio){
                       
                        ?>
                <div class="form-group">
                            <label style="font-size:15px!important;font-weight:400 !important;padding-left:0!important;" for="quantity">Observación</label>
                            <textarea class='form-control' value="" id="observacion" name="observacion" style='min-width:300px;height:150px;'><?=$observaciones?></textarea>
                </div>
                        <div class="container-input">
                            <input type="file" name="file" id="file-1" value="<?=$archivoCotizacion?>" class="inputfile inputfile-1" data-multiple-caption="{count} archivos seleccionados" multiple />
<label for="file-1">
<svg xmlns="http://www.w3.org/2000/svg" class="iborrainputfile" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg>
<span class="iborrainputfile"><?=$archivoCotizacion?></span>
</label>
</div>
                <?php
                        }   
                ?>
                <div class="padding-bottom-1x mb-2"><span class="text-medium">Categoría:&nbsp;</span><?=$respuestaArticulo['categoria']?></div>
                <hr class="mb-3">
                <div class="d-flex flex-wrap justify-content-between">
                    
                    <div class="sp-buttons mt-2 mb-2">
                        
                        <?php
                        if($respuestaArticulo['disponibleCompra']==1 &&intval($respuestaArticulo['art_PrecioUnitario'])!=0){
                            
                            $habilitarPrecio=true;
                            
                        ?>
                        <input type="button" name="" style='text-transform: uppercase;font-size:16px;width:180px;' value="Agregar" onclick="agregarCarrito(<?=$respuestaArticulo['art_CodigoArticulo']?>,'agregarCarrito','<?=$respuestaArticulo['art_Descripcion']?>','<?=$respuestaArticulo['rutaImagen']?>','<?=$respuestaArticulo['art_PrecioUnitario']?>','<?=$respuestaArticulo['art_PorcentajeIV']?>')" id="" class="btn-outline-primary" />
                      <script>
                     
           
                        </script>
                        <?php
                        } else {
                       
                        }
                        if($respuestaArticulo['disponibleCotizacion']==1 && $habilitarPrecio== false){
                        ?>                  
                        
                        <input type="button" name="" style='text-transform: uppercase;font-size:16px;width:180px;' value="Cotizar" onclick="agregarCarrito(<?=$respuestaArticulo['art_CodigoArticulo']?>,'agregarCotizacion','<?=$respuestaArticulo['art_Descripcion']?>','<?=$respuestaArticulo['rutaImagen']?>')" id="" class="btn-outline-primary-2" />
                        <?php
                        } 
                        ?>                   
                    </div>
                </div>
                
                
            </div>
        </div>
        <!-- Product Tabs-->
      <ul class="nav nav-tabs mt-2" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Descripción</button>
  </li>
<!--  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Comentarios</button>
  </li>-->
 
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active p-4" id="home" style="border:solid 1px #ccc;border-top:none;border-radius:0px 0px 10px 10px;"  role="tabpanel" aria-labelledby="home-tab"><?=$respuestaArticulo['art_Observaciones']?></div>
  <div class="tab-pane fade p-4" id="profile" style="border:solid 1px #ccc;border-top:none;border-radius:0px 0px 10px 10px;" role="tabpanel" aria-labelledby="profile-tab">...</div>
 
</div>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
   <div class="modal-content">
      
        <h5 class="modal-title p-4" id="modalTextProducto"><?=$respuestaArticulo['art_Descripcion']?></h5>
        
      <div class="modal-body center-align mx-auto" style="min-width:100%;">
          <div class="zoom" id="ex10" style="margin:0px 20px 0px 20px;">
        <img id="img-modal" style="margin:auto;" src="<?=base_url2.$respuestaArticulo['rutaImagen']?>" alt="alt"/>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
  </div>
</div>

        
        

<?php
$respuestaArticulo= new articulosModel();
$respuestaArticulo=$respuestaArticulo-> articulosDestacados();
if(count($respuestaArticulo)>0){
require_once 'views/principal/destacados.php';
}
?>
        
    </div>







<script type="text/javascript">
    jQuery(document).ready(function(){
	jQuery("#gallery").unitegallery();
    });
$(document).ready(function(){
        ;( function ( document, window, index )
{
	var inputs = document.querySelectorAll( '.inputfile' );
	Array.prototype.forEach.call( inputs, function( input )
	{
		var label	 = input.nextElementSibling,
			labelVal = label.innerHTML;

		input.addEventListener( 'change', function( e )
		{
			var fileName = '';
			if( this.files && this.files.length > 1 )
				fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
			else
				fileName = e.target.value.split( '\\' ).pop();

			if( fileName )
				label.querySelector( 'span' ).innerHTML = fileName;
			else
				label.innerHTML = labelVal;
		});
	});
    }( document, window, 0 ));
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
        $('html').css("scrollBehavior", "smooth");
    });
     $('.href_contact').click(function(){
        $('html').css("scrollBehavior", "smooth");
    });
    $("#js-top").click(function(event) {
        event.preventDefault();
        $("html, body").animate({ scrollTop: 0 }, "slow");
            return false;
    });  
});

$('#exampleModal').appendTo("body");
function agregarCarrito(idArticulo,action,nombre,imagen,precio,impuesto){
    let observacion=$("#observacion").val();
     var file_data = '';
     var form_data = new FormData();
     if(document.getElementById( "file-1" )){
       file_data = $("#file-1").prop("files")[0]; 
     }
     form_data.append("idArticulo", idArticulo);
     if(!observacion){
    }else{
        form_data.append("observacion", observacion);
    }
    form_data.append("file", file_data);
    form_data.append("action", action);
    form_data.append("nombre", nombre);
    form_data.append("imagen", imagen);
    form_data.append("precio", precio);
    form_data.append("impuesto", impuesto);
    if(idArticulo){
    $.ajax({
        type:'POST',    
        url:'./carritoCompras/carritoController.php',
        enctype: 'multipart/form-data',
        cache: false,
        contentType: false,
        processData: false,
        data:form_data,
        success:function(dat){
            if(dat!=3){
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
                            $.ajax({
                                    type:'POST',    
                                    url:'./carritoCompras/carritoController.php',
                                    data:"action=actualizarCotizacion",
                                    success:function(dat){
                                        alert(dat);
                                        if(dat){
                                             Swal.fire({
                                                   icon: 'success',
                                                   title: 'Actualizado',
                                                   text: 'Cotización actualizada con éxito'

                                                 });
                                            window.setTimeout(function () {
                                                 window.location.href = "./?pag=product&&id="+idArticulo+""
                                            }, 2000);  
                                        } else {
                                            Swal.fire({
                                            icon: 'error',
                                            title: 'Oops...',
                                            text: 'Ha ocurrido un inconveniente, recargue la página e intente de nuevo'
                                            })
                                        }
                                    }
                                });
                            
//                          window.setTimeout(function () {
//                            window.location.href = "./?pag=carrito"
//                        }, 1000);  
                        }
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
function cambiarImagen(src){
   
    console.log($("#img-modal"));
    $("#imagePrincipal").attr("src","<?=base_url2?>"+src);
    $("#img-modal").attr("src","<?=base_url2?>"+src);
    $("#imagePrincipal").next().attr("src","<?=base_url2?>"+src);
    $("#img-modal").next().attr("src","<?=base_url2?>"+src);
}
</script>
        


