<?php
$envio=" ";
$lugar="";
$radioColor="";
$radioImg="";
$listAttribute="";
$shippingCost = 0;
if($_SESSION['orden']['tipoEnvio']['radio']=='Oficina'){
    $envio=$_SESSION['orden']['tipoEnvio']['radio'];
    $lugar='Oficina';
}else {
$envio=$_SESSION['orden']['tipoEnvio']['provincia']."/".$_SESSION['orden']['tipoEnvio']['canton']."/".$_SESSION['orden']['tipoEnvio']['distrito']."/".$_SESSION['orden']['tipoEnvio']['direccion'];
$lugar="Ubicacion";
$shippingCost = isset($_SESSION['orden']['tipoEnvio']["ShippingCost"])?$_SESSION['orden']['tipoEnvio']["ShippingCost"]:0;
}
if(isset($_SESSION['carrito'][0]['radioColor'])&&!empty($_SESSION['carrito'][0]['radioColor'])){
   $radioColor = $_SESSION['carrito'][0]['radioColor']; 
}

if(isset($_SESSION['carrito'][0]['radioImg'])&&!empty($_SESSION['carrito'][0]['radioImg'])){
   $radioImg = $_SESSION['carrito'][0]['radioImg']; 
}

if(isset($_SESSION['carrito'][0]['listAttribute'])&&!empty($_SESSION['carrito'][0]['listAttribute'])){
   $listAttribute = $_SESSION['carrito'][0]['listAttribute']; 
}
?>
<div class="page-title" id='page-title'>
        <div class="container">
          <div class="column">
            <h1>Revisión</h1>
          </div>
          <div class="column">
            <ul class="breadcrumbs">
              <li><a href="/">Inicio</a>
              </li>
              <li class="separator">&nbsp;</li>
              <li>Revisión</li>
            </ul>
          </div>
        </div>
      </div>
<div class="container" style="margin-bottom:50px;">
    <div class="row">
        <div class="col-xl-9 col-lg-8 col-md-12">
            <div class="checkout-steps">
    
         <a class="active" href="<?=base_url?>?pag=checkout&&step=review">Revisión</a>
    <a class="" href="<?=base_url?>?pag=checkout&&step=payment"><span class="angle"></span>Pago</a>

    
    <a class="" href="<?=base_url?>?pag=checkout&&step=shipping"><span class="angle"></span>Envío</a>
    
    <a class="" href="<?=base_url?>?pag=checkout&&step=general"><span class="angle"></span>General</a>
    
</div>
          <h4>Revise su orden</h4>
            <hr class="padding-bottom-1x">
              
            <div class="table-responsive shopping-cart">
                <table class="table">
                <thead>
                  <tr>
                    <th>Producto</th>
                    <th class="text-center">Subtotal</th>
                    <th class="text-center">Impuesto</th>
                    <th class="text-center">Total</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    $subtotalFinal = 0;
                    $totalFinal = 0;
                    $impuestosFinal = 0;
                    foreach($_SESSION['carrito'] as $valueCarrito){
                        
                        
                                      $impuesto = 0;  
                      $subTotal = 0 ;
                      $total = 0;
                     
                            if(intval($valueCarrito['impuesto'])!=''){
                                
                                $impuesto=round(intval($valueCarrito['impuesto']),2);   
                            }
                            //Calcular el precio si llevaimpuesto, si tiene IVa y el porcentaje
                              $precioIni =round($valueCarrito['art_PrecioUnitario'],2);
                              $precio = $valueCarrito['llevaimpuesto']==1?$valueCarrito['IVAIncluido']==1&&$impuesto!=0?($precioIni/(1+($impuesto/100))):$precioIni:$precioIni; 
                              $impMonto=$valueCarrito['llevaimpuesto']==1?$impuesto!=0?$valueCarrito['IVAIncluido']==1?$precioIni-$precio:$precio*($impuesto/100):0:0;
                              $subTotal =  $precio*$valueCarrito['cantidad'];
                              $impTotal = $valueCarrito['llevaimpuesto']==1?round($impMonto*$valueCarrito['cantidad'],2):0;
                              
                                //Parciales
                              $total = ($precio+$impMonto)*$valueCarrito['cantidad'];
                              $total=round($total,2); 
                              $subTotal=round($subTotal,2);   
                              $impuesto=round($impuesto,2); 
                              //Totales
                              $impuestosFinal = $impuestosFinal + $impTotal;
                              $subtotalFinal = $subtotalFinal + $subTotal;
                              $totalFinal = $totalFinal + $total;
                    ?>
                  <tr>
                    <td>
                        <div class="product-item float-left"><a class="product-thumb" href="<?=base_url?>?pag=product&&id=<?=$valueCarrito['id']?>"><img style="width:100px;" src="<?=base_url2?><?=$valueCarrito['imagen']?>" alt="Product"></a>
                        <div class="product-info">
                            <h4 class="product-title"><a style="text-decoration: none;" href="<?=base_url?>?pag=product&&id=<?=$valueCarrito['id']?>"> <?=$valueCarrito['nombre']?> -<small>x <?=$valueCarrito['cantidad']?></small></a></h4>
                        </div>
                      </div>
                    </td>
                      
                    <td class="text-center text-lg text-medium">
                        <?=$subTotal?>
                    </td>
                    <td class="text-center text-lg text-medium">
                        <?=$impTotal?>
                    </td>
                    <td class="text-center text-lg text-medium">
                        <?=$total?>
                    </td>
                      
                    <td class="text-center"><a class="btn btn-outline-primary btn-sm mt-4" href="<?=base_url?>?pag=carrito">Editar</a></td>
                  </tr>
                    <?php
                    }
                    //Adicionar el costo de entrega
                  if($shippingCost!=0){
                        $impuestosFinal = $impuestosFinal + ($shippingCost*0.13);    
                        $subtotalFinal = $subtotalFinal + $shippingCost;
                        $totalFinal = $impuestosFinal + $subtotalFinal;
                    }
                    ?>
                </tbody>
              </table>
<hr>
<div class="justify-content-between w-100 d-flex">
    <div style="font-size:20px;">Subtotal</div><div class="mr-4" style="font-size:17px;">₡<span class="ml-1"><?=$subtotalFinal?></span></div>
</div>
<hr>
<div class="justify-content-between w-100 d-flex">
    <div style="font-size:20px;">Impuestos</div><div class="mr-4" style="font-size:17px;">₡<span class="ml-1"><?=$impuestosFinal?></span></div>
</div>
<hr>
<div class="justify-content-between w-100 d-flex">
    <div style="font-size:20px;"><strong>Total</strong></div><div class="mr-4" style="font-size:17px;">₡<span class="ml-1"><?=$totalFinal?></span></div>
</div>
            </div>
            <div class="shopping-cart-footer">
              <div class="column">
                  
              </div>
              <div class="column text-lg">
                  </div>
            </div>
            <div class="row padding-top-1x mt-3">
              <div class="col-sm-6">
                <h5>Envío a:</h5>
                <ul class="list-unstyled">
                  <li><span class="text-muted">Cliente:</span><?= $_SESSION['orden']['InfoGeneral']['Nombre']?></li>
                    <li><span class="text-muted">Envío en:</span> <?= $lugar?></li>
                  <li><span class="text-muted">Dirección:</span> <?=$envio?></li>
                  <li>   </li>
                  <li><span class="text-muted">Teléfono:</span> <?=$_SESSION['orden']['InfoGeneral']['Telefono']?></li>
                </ul>
              </div>
              <div class="col-sm-6">
                <h5>Método de pago:</h5>
                <ul class="list-unstyled">
                    
                  <li><span class="text-muted"></span> <?=$_SESSION['orden']['tipoPago']?></li>
                    
                </ul>
              </div>
                <?php
                if(!empty($radioColor)||!empty($radioImg)||!empty($listAttribute)){
                ?>
                <div class="col-sm-6">
                <h5>Personalización: </h5>
                <ul class="list-unstyled">
                    <?php 
                    if(!empty($radioColor)){
                        ?>
                  <li><span class="text-muted">Color elegido:</span> <?=$radioColor?></li>
                    <?php
                    }
                    if(!empty($radioImg)){
                        ?>
                  <li><span class="text-muted">Imagen Elegida:</span> <?=$radioImg?></li>
                    <?php
                    }
                    if(!empty($listAttribute)){
                        ?>
                  <li><span class="text-muted">Selección:</span> <?=$listAttribute?></li>
                    <?php
                    }
                    ?>
                </ul>
              </div>
                <?php
                }
                ?>
            </div>

              <div class="row padding-top-1x mt-3">
                  <div class="col-sm-12">
                      <input id="terminosCondiciones" type="checkbox" name="" /> Acepto las <a href="<?=base_url?>?pag=nosotros&&cod=POLITICAS">Políticas y Restricciones</a>  
                  </div>
              </div>
<div class="alert alert-danger alert-dismissible" id="contenedor-mensaje" style="display:none;height:auto;">
             <span  class="close" style="cursor:pointer;float:right" onclick="cerrarMensaje()">&times;</span>
  <p id="mensajePass"></p>
</div>
            <div class="checkout-footer margin-top-1x">
              <div class="column hidden-xs-down"><a class="btn btn-outline-secondary" href="checkout-payment"><i class="icon-arrow-left"></i>&nbsp;Regresar</a></div>
              <div class="column">
                  <input type="button" name="" style="font-size:15px;text-transform: uppercase"  value="Ordenar" id="btnCompletar" class="btn btn-outline-primary-2" />
              </div>
            </div>
              
          </div>
        </div>
    </div>
<script>
    $("#btnCompletar").on('click', function(event){
        event.preventDefault();
        
    if($('#terminosCondiciones').prop('checked')){
    let data={
         "action":"CompletarOrden"
     }
          $.ajax({
    type : 'POST',
    url : './carritoCompras/carritoController.php',
    data : data,
    beforeSend:function(){
                Swal.fire({
                title: 'Por favor espere !',
                html: 'procesando su orden',// add html attribute if you want or remove
                allowOutsideClick: false,
                onBeforeOpen: () => {
                    Swal.showLoading()
                },
            });
             $("#btnCompletar").prop('disabled', true);
            },
   success:function(dat){
if(dat!=false){
						if(dat != 'denied'){
							//vaciarCarrito2();
							window.setTimeout(function () {
								window.location.href = dat;
							}, 500);
                                                        
						}else{
                                                    Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: 'Datos incorrectos'
						});
                                              setTimeout(window.location.href = "./?pag=checkout&&step=payment", 2000);
						}
					} else {
						Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: 'Datos incorrectos'
						
						});
					}
        }
            });
        } else {
             $("#contenedor-mensaje").css("display","block")
      $("#mensajePass").text("Debe aceptar los términos y condiciones para continuar");
        }
         
});
function vaciarCarrito2(){

   
    $.ajax({
        type:'POST',    
        url:'./carritoCompras/carritoController.php',
        data:'action=vaciarCarrito',
        success:function(dat){
           
            if(dat!=false){
                
                Swal.fire({
                                                   icon: 'success',
                                                   title: 'Muchas gracias',
                                                   text: '¡Su pedido ha sido procesado exitosamente! En breve le estaremos contactando'

                                                 });
               
               window.setTimeout(function () {
                            window.location.href = "./"
                        }, 2000);
                    
                    
            } else {
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Datos incorrectos'
              
              })
            }
        }
    });
  
    }
    function cerrarMensaje(){
      $("#contenedor-mensaje").css("display","none")
  }
</script>