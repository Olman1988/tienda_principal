<?php
$loadedDetails = [true,true,true];

if(!isset($_SESSION)){
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
if($respuestaArticulo['disponibleCompra']==1){
$habilitarPrecio=true;
}
$minimoArticulo = $respuestaArticulo['art_Minimo']!=0?intval($respuestaArticulo['art_Minimo']):1;
?>
<style>
                  
              input[type="radio"][id^="radioImg"]{
   display:none;
}
input[type="radio"][id^="radioColor"]{
   display:none;
}

</style>
<div class="page-title" id='page-title'>
        <div class="container">
          <div class="column">
            <h1><?=$respuestaArticulo['art_Descripcion']?></h1>
          </div>
          <div class="column">
            <ul class="breadcrumbs">
              <li><a href="<?=base_url?>">Inicio</a>
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
            <div class="col-md-6 mx-auto" >
                <div class="product-gallery">
                    <div class="border-1 rounded" style="position:relative;border:solid 1px gray;">
                        <i class="fa-solid fa-magnifying-glass-plus" data-bs-toggle="modal" data-bs-target="#exampleModal" style="cursor:pointer;font-size:25px;color:rgb(100,100,100);position:absolute;top:20px;right:20px;border-radius:50%;padding:10px;border:solid 1px rgb(200,200,200)"></i>
                        <div>
                    <div class="gallery-wrapper" id="" style="margin:20px;margin-top:80px;" >
                        <img id="imagePrincipal" style="width:100%;" src="<?=base_url2.$respuestaArticulo['rutaImagen']?>" alt="alt"/>
                    </div>
                        </div>
<div class="row mx-auto <?=!empty($respuesFin)&&count($respuesFin)>1?'owl-carousel owl-theme':""?>" id="<?=!empty($respuesFin)&&count($respuesFin)>1?'carousel-service':""?>" style="width:90%;">
    <div style="height:120px;margin-right:14px;margin-bottom:20px;cursor:pointer;<?=!empty($respuesFin)&&count($respuesFin)>3?'':'width:120px'?>" onclick="cambiarImagen('<?=$respuestaArticulo['rutaImagen']?>')" class="active">
                            <img style="width:100%; height:100%;object-fit:cover;" src="<?=base_url2.$respuestaArticulo['rutaImagen']?>" alt="Product">
		</div>
    <?php
    if(count($respuesFin)>0){
        foreach ($respuesFin as $valueRespuesta) {
     ?>
    <div style="height:120px;margin-right:14px;cursor:pointer;<?=!empty($respuesFin)&&count($respuesFin)>3?'':'width:120px'?>" onclick="cambiarImagen('<?=$valueRespuesta['rutaImagen']?>')" class="">
                            <img style="width:100%; height:100%;object-fit:cover;" src="<?=base_url2?><?=$valueRespuesta['rutaImagen']?>" alt="Product">
		</div>
    <?php
        }
    }
    ?>     
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
                <h2 class="padding-top-1x text-justify"><?=$respuestaArticulo['art_Descripcion']?></h2>
                <?php if($habilitarPrecio){ ?>
                <h4>Precio Unitario<br><span class="mr-1">₡</span> <?=number_format($respuestaArticulo['art_PrecioUnitario'],2)?>
                    <span style="color:gray;font-style:italic;font-size:17px;">***<?=$respuestaArticulo['art_LlevaImpuesto']!=0?$respuestaArticulo['IVAIncluido']==1?'Este precio incluye el IVA':'+IVA':'';?></span>
                </h4>
                <?php }?>
                <p>
                    <?=$respuestaArticulo['art_Observaciones']?>
                </p>

                <div class="pt-1 mb-2" style="display:<?=$respuestaArticulo['sku']!=''?'block':'none'?>"><span class="text-medium">SKU:</span> #<?=$respuestaArticulo['sku']?></div>
                <div class="row ">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="quantity">Cantidad</label>
                            <input name="cantidadMinima" type="number" onchange="validarCantidad(<?=$minimoArticulo?>)" value='<?=$minimoArticulo?>' id="cantidadMinima" class="form-control"  />
                        </div>
                    </div>
                </div>
                <hr>
                    
                    <?php
                if(count($respuestaAtributosGrupo)>0){
                    echo "<h5>Personalización de Producto</h5>";
                    //$counterId=1;
                    foreach ($respuestaAtributosGrupo as $atributos) {
                        echo "<h6 class='mt-4'>".$atributos['nombre']."</h6>";
                        switch ($atributos['idTipoControl']) {
                                case "SQUARECOLORS":
                                    if($loadedDetails[0]){
                                    echo"<div class='row' style='width:250px'>";
                                    echo '<p id="colorAlert" style="color:red;display:none;">***Esta selección es requerida</p>';
                                   foreach ($atributos['Detalles'] as $detalles) {
                                       
                                   ?>
                                    <div class="col-4 m-auto" style ="width:60px;height:60px;">
                                        
                                         <label id="" style ="cursor:pointer;box-shadow:1px 1px 3px;border:solid 5px white;width:40px;height:40px;background:<?=$detalles['cuadroColorRgb']?>">
                                             <input onchange="validateSelectionRadio(this)" type="radio" id="radioColor" name="radioColor" value="<?=$detalles['cuadroColorRgb']?>">
                                        </label>
                                    </div>
                                    
                                  <?php
                                  
                                }
                                echo"</div>";
                                $loadedDetails[0]=false;
                               
                                    } 
                                    break;
                                case "PHOTOS":
                                    if($loadedDetails[1]){
                                    echo"<div class='row' style='width:250px'>";
                                    echo '<p id="imgAlert" style="color:red;display:none;">***Esta selección es requerida</p>';
                                    foreach ($atributos['Detalles'] as $detalles) {
                                    
                                   ?>
                                    <div class="col-4 m-auto" style ="width:100px;height:100px;">
                                        <label class='img-rd' style ="cursor:pointer;box-shadow:1px'img-rd 1px 3px;border:solid 5px white;width:40px;height:40px;background:<?=$detalles['cuadroColorRgb']?>">
                                            <input type="radio" onchange="validateSelectionImg(this)" id="radioImg" name="radioImg" value="<?=$detalles['foto']?>">
                                            <img style='width:100%;' src="<?=base_url.$detalles['foto']?>" alt="alt"/>
                                        </label>
                                    </div>
                                    
                                  <?php
                                    }
                                    $loadedDetails[1]=false;
                                }
                                    echo "</div>";
                                    break;
                                case "DROPDOWN":
                                if($loadedDetails[2]){
                                    echo"<div class='row' style='width:250px'>";
                                    echo '<p id="selectAlert" style="color:red;display:none;">***Esta selección es requerida</p>';
                                   ?>
            <select id="selectAtribute" onchange="validateSelection(this)" name="selectAtribute" style='width:200px' class="form-control selectpicker show-tick">
                <option value="0">Seleccione</option>
                <?php
                
                foreach ($atributos['Detalles'] as $detalles) {
                    echo "<option >".$detalles['valor']."</option>";
                }
                ?>
                </select>
                                    
                                    
                                  <?php
                               echo"</div>";    
                               $loadedDetails[2]=false;
                                }

                                    break;

                                default:
                                    break;
                            }
                     
                    }
                    echo'<hr>
                    <h6>Personalización Elegida:</h6>
                    <div id="seleccion" style="padding:15px;">
                    
                    <p id="radioColorText">
                    
                        <div id="radioColorTextContainer" class="col-4 " style ="width:60px;height:60px;display:none;">
                                         <label style ="cursor:pointer;box-shadow:1px 1px 3px;border:solid 5px white;width:40px;height:40px;">
                                             
                                        </label>
                                    </div>
                    </p>
                    <p id="radioImgText" > <img id="radioImgN" style="width:100px" src=""></p>
                    <p id="selectedList"> </p>
                </div>';
                }
                ?>
                   
<!--                Personalización escogida:-->
                
                
                <?php
                        if($respuestaArticulo['disponibleCompra']!=1){
                       
                        ?>
                <div class="form-group">
                            <label for="quantity">Observación</label>
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
<!--                <div class="padding-bottom-1x mb-2"><span class="text-medium">Categoría:&nbsp;</span><?=$respuestaArticulo['categoria']?></div>-->
                <hr class="mb-3">
                <div class="d-flex flex-wrap justify-content-between">
                    
                    <div class="sp-buttons mt-2 mb-2">
                        
                        <?php
                        if($respuestaArticulo['disponibleCompra']==1){
                            
                            $habilitarPrecio=true;
                            
                        ?>
                        <input type="button" name="" style='text-transform: uppercase;font-size:12px;' value="Agregar" onclick="agregarCarrito(<?=$respuestaArticulo['art_CodigoArticulo']?>,'agregarCarrito','<?=$respuestaArticulo['art_Descripcion']?>','<?=$respuestaArticulo['rutaImagen']?>','<?=$respuestaArticulo['art_PrecioUnitario']?>','<?=$respuestaArticulo['art_PorcentajeIV']?>','<?=$respuestaArticulo['IVAIncluido']?>','<?=$respuestaArticulo['art_LlevaImpuesto']?>')" id="" class="btn-outline-primary" />
                      <script>
                        </script>
                        <?php
                        } else {
                       
                        }
                        if($respuestaArticulo['disponibleCotizacion']==1 && $habilitarPrecio== false){
                        ?>                  
                        
                        <input type="button" name="" style='text-transform: uppercase;font-size:12px;' value="Cotizar" onclick="agregarCarrito(<?=$respuestaArticulo['art_CodigoArticulo']?>,'agregarCotizacion','<?=$respuestaArticulo['art_Descripcion']?>','<?=$respuestaArticulo['rutaImagen']?>')" id="" class="btn-outline-secondary" />
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
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Descripcion</button>
  </li>
<!--  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Comentarios</button>
  </li>-->
 
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active p-4" id="home" style="border:solid 1px #ccc;border-top:none;border-radius:0px 0px 10px 10px;"  role="tabpanel" aria-labelledby="home-tab"><?=$respuestaArticulo['descripcionAmpliada']?></div>
  <div class="tab-pane fade p-4" id="profile" style="border:solid 1px #ccc;border-top:none;border-radius:0px 0px 10px 10px;" role="tabpanel" aria-labelledby="profile-tab">...</div>
 
</div>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
   <div class="modal-content">
      
        <h5 class="modal-title p-4" id="modalTextProducto"><?=$respuestaArticulo['art_Descripcion']?></h5>
        
      <div class="modal-body center-align mx-auto" style="">
          <div class="" id="" style="margin:0px 20px 0px 20px;overflow:auto;">
        <img id="img-modal" style="margin:auto;width:100%;" src="<?=base_url2.$respuestaArticulo['rutaImagen']?>" alt="alt"/>
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
         <script>
$('#carousel-service').owlCarousel({
       autoHeight: false,
       autoHeightClass: 'owl-height',
       items:1,
       pagination:true,
       autoplay:true,
       autoplayTimeout: 4000,
       autoplayHoverPause:true,
       loop:true,
       dots:false,
       nav:true,
       center:true,
       
       responsive:{
                0:{
                    items:3
                },
                800:{
                    items:3
                },
                1200:{
                    items:3
                },
                
                1400:{
                    items:4
                },
                1900:{
                    items:4
                }
      }
   });
            // $('#exampleModal').appendTo("body").modal('show');
function validarCantidad(data){
        let cantidad = $("#cantidadMinima").val();
        if(cantidad <data){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'La cantidad mínima para este producto es: '+data
              
              })
            $("#cantidadMinima").val(data);
            
        }
    }
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
function agregarCarrito(idArticulo,action,nombre,imagen,precio,impuesto,IVAIncluido,llevaimpuesto){
    let sendData = true;
    // Initialize to know if the container is already exists for validate data 
    let colorContainer =  $('input:radio[name=radioColor]');
    let imgContainer =  $('input:radio[name=radioImg]');
    let selectContainer =  $("#selectAtribute");
    console.log(selectContainer.length)
    //Get the values for any selection
    let radioColor = $('input:radio[name=radioColor]:checked').val();
    let radioImg = $('input:radio[name=radioImg]:checked').val();
    let listSelection  = $("#selectAtribute").val();
    
    //Get values for quotes
    let observacion=$("#observacion").val();
    let cantidad = $("#cantidadMinima").val();
    
    //Create form
     var file_data = '';
     var form_data = new FormData();
     if(document.getElementById( "file-1" )){
       file_data = $("#file-1").prop("files")[0]; 
     }
   if(typeof radioColor ==='undefined'){
      if(colorContainer.length>0){
          $("#colorAlert").css("display","block");
          sendData = false;
      }
    }else {
           form_data.append("radioColor", radioColor);
           $("#colorAlert").css("display","none");
       
    }
       if(typeof radioImg ==='undefined'){
        if(imgContainer.length>0){
          $("#imgAlert").css("display","block");
          sendData = false;
      }
    }else {
           form_data.append("radioImg", radioImg);
           $("#imgAlert").css("display","none");
         
    }
    if(typeof listSelection ==='undefined' || listSelection=="0"){
        if(selectContainer.length>0){
            $("#selectAlert").css("display","block");
            sendData = false;
        }
    }else {
           form_data.append("listAttr", listSelection);
           $("#selectAlert").css("display","none");
         
    }
     form_data.append("idArticulo", idArticulo);
     if(!observacion){
        
    }else{
        form_data.append("observacion", observacion);
    }
    if(!cantidad){
        
    }else{
        form_data.append("cantidad", cantidad);
    }
        form_data.append("cantidadMinima", <?=$minimoArticulo?>);
        form_data.append("file", file_data);
    
    
     form_data.append("action", action);
     form_data.append("nombre", nombre);
     form_data.append("imagen", imagen);
     form_data.append("precio", precio);
     form_data.append("llevaimpuesto", llevaimpuesto);
     form_data.append("impuesto", impuesto);
     form_data.append("IVAIncluido", IVAIncluido);
     
     
   
    if(idArticulo&&sendData){
   
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
                            
                            
                          window.setTimeout(function () {
                            window.location.href = "./?pag=carrito"
                        }, 1000);  
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
   
    $("#imagePrincipal").attr("src","<?=base_url2?>"+src);
    $("#img-modal").attr("src","<?=base_url2?>"+src);
    $("#imagePrincipal").next().attr("src","<?=base_url2?>"+src);
    $("#img-modal").next().attr("src","<?=base_url2?>"+src);
}

function validateSelectionRadio(data){

   let radio = $('input:radio[name=radioColor]:checked').val();
   $("#radioColorText").text("Color: "+radio)
  $("#radioColorTextContainer").css("display","block");
  $("#radioColorTextContainer label").css("background",radio)

   
}
function validateSelectionImg(data){
   
   let radio = $('input:radio[name=radioImg]:checked').val();
   console.log(radio);
   $("#radioImgText").text("Imagen: ")
   let myElement = document.createElement("img");
   $(myElement).attr("id","radioImgN");
   $(myElement).attr("style","width:150px");
   $("#radioImgText").append(myElement);
   $("#radioImgN").attr("src","<?=base_url2?>"+radio);

   
}
function validateSelection(data){
    let selected = $("#selectedList").text("Selección: "+$("#selectAtribute").val());
   
}
//  <p id="radioColorText"></p>
//                    <p id="radioImgText"></p> id="selectAtribute" onchange="validateSelection(this)"
//                    <p id="selectedList"></p>
</script>
        
