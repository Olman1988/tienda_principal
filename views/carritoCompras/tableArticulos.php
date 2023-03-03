<?php
?>
<div class="page-title" id='page-title'>
        <div class="container">
          <div class="column">
            <h1>Carrito</h1>
          </div>
          <div class="column">
            <ul class="breadcrumbs">
              <li><a href="/">Inicio</a>
              </li>
              <li class="separator">&nbsp;</li>
              <li>Carrito</li>
            </ul>
          </div>
        </div>
      </div>

<div class="container" style="width:90%;min-width:300px;margin-bottom:50px;">
    <div >
    <a class="btn btn-sm btn-outline-danger mb-3" style="float:right" onclick="vaciarCarrito2()">VACIAR CARRITO</a>
   
</div>
<table class="table table-striped table-bordered" cellspacing="0" cellpadding="4" rules="cols" border="1" id="ContentPlaceHolder1_CartList" style="border-collapse:collapse;">
		<tr>
			<th scope="col">&nbsp;</th><th scope="col">Nombre</th><th scope="col">Cantidad</th><th>Precio</th>
                        <th scope="col">Impuesto</th>
                        <th scope="col">Total</th>
                        <th scope="col">Acciones</th>
                        
		</tr>
                <?php
              
                if(isset($_SESSION['carrito'])){
                    foreach ($_SESSION['carrito'] as $carritoTabla) {
                      $impuesto = 0;  
                      $subTotal = 0 ;
                      $total = 0;
                      $subTotal =  $carritoTabla['art_PrecioUnitario']*$carritoTabla['cantidad'];
                            if($carritoTabla['impuesto']!=''){
                                $impuesto = intval($carritoTabla['impuesto']);
                                $impuesto=round($impuesto,2);   
                            }
                         $subTotal = $subTotal+(($subTotal * ($impuesto/100)));  
                       
                              $subTotal=round($subTotal,2);  
//                    if(!is_null($impuesto)){
//                        $impuesto=number_format(intval($impuesto),2);
//                    } else {
//                        $impuesto = 0;
//                    }            
                            
                ?>
                
                <tr>
			<td style="width:120px;">
                            
                            <img style="width:100px;" src="<?=base_url2.$carritoTabla['imagen']?>" alt="" />
                                </td><td>
                                    <a href="<?=base_url?>?pag=product&&id=<?=$carritoTabla['id']?>"><span id=""> <?=$carritoTabla['nombre']?></span></a>
                                </td><td>
                                    <input onchange="validarCantidad(this,<?=$carritoTabla['cantidadMinima']?>)" name="" type="number" value="<?=$carritoTabla['cantidad']?>" id="cantidadArticulo" style="width:40px;" />
                                    <input id="idArticulo" type="hidden" name="idArticulo" value="<?=$carritoTabla['id']?>">
                                    
                                </td>
                                <td>
                                    <span id="precio_Un"><?=round($carritoTabla['art_PrecioUnitario'],2)?></span>
                                </td>
                                <td>
                                    %<input type="hidden" id="impuestos" value="<?=$carritoTabla['IVAIncluido']==1?0:$impuesto?>"><?=$impuesto?>
                                    <br/><span style="color:gray;font-size:10px;font-style:italic"><?=$carritoTabla['IVAIncluido']?"***Precio incluye el IVA":""?></span>
                                </td>
                                <td>
                                    <span id="subTotalConImp"><?=$subTotal?></span>
                                </td>
                                
                                <td>
                                   <a onclick ="removerProductoCoarrito(<?=$carritoTabla['id']?>);" class="btn btn-outline-warning-2">Eliminar</a>
                                </td>
		</tr>
                
                <?php
                    }
                }
                
                if(isset($_SESSION['cotizacion'])){
                    foreach ($_SESSION['cotizacion'] as $carritoTabla) {
                    
                ?>
                
                <tr>
			<td style="width:120px;">
                            <img style="width:100px;" src="<?=base_url2.$carritoTabla['imagen']?>" alt="" />
                                </td><td>
                                    <span id=""> <?=$carritoTabla['nombre']?></span>
                                </td><td>
                                    <input onchange="validarCantidad(this,<?=$carritoTabla['cantidadMinima']?>)" name="" type="number" value="<?=$carritoTabla['cantidad']?>" id="cantidadArticulo" style="width:40px;" />
                                    <input id="idArticulo" type="hidden" name="idArticulo" value="<?=$carritoTabla['id']?>">
                                </td>
                                <td>
                                    <span id=""> Cotización</span>
                                </td>
                                <td>
                                    <input id="" type="checkbox" name="" />
                                </td>
		</tr>
                
                <?php
                    }
                }
                ?>
                
	</table>
    <hr>
   
    <div class="pb-4">
        <a class="btn btn-outline-secondary" href="<?=base_url?>">SEGUIR COMPRANDO</a>
        <hr class="mb-4 pb-2">
        <div class="row justify-content-end">
        <h4 class="col-3" style="">Subtotal: </h4>
        <span style="font-size:20px;font-weight:400;" class="ml-1 col-1">₡</span><span style="font-size:20px;font-weight:400;" class="col-2 text-right" id="subTotalFinal">0</span>
        </div>
        <hr>
        <div class="row justify-content-end">
        <h4 class="col-3" style="">Impuesto Total: </h4>
        <span style="font-size:20px;font-weight:400;" class="ml-1 col-1">₡</span><span style="font-size:20px;font-weight:400;" class="col-2 text-right" id="impuestoFinal">0</span>
        </div>
        <hr>
                 <div class="row justify-content-end">
        <h4 class="col-3" style="">Total: </h4>
        <span style="font-size:20px;font-weight:400;" class="ml-1 col-1">₡</span><span style="font-size:20px;font-weight:400;" class="col-2 text-right" id="TotalFinal">0</span>
        </div>
 <hr>
    </div>
    <div class="text-right">
          <a class="btn btn-outline-success" id="btnContinuar" href="" style="float:right;margin-left:15px">COMPRAR</a> 
      
    </div>
    </div>
<script>
    function validarCantidad(data,cantidadMinima){
        let cantidad = $(data).val();
        if(cantidad <cantidadMinima){
            $(data).val(cantidadMinima);
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'La cantidad mínima para este producto es: '+cantidadMinima
              
              })
        }
        calcularSubtotal();
    }
    
    function calcularSubtotal(){
         let total = Array();
         let cantidades = document.querySelectorAll("td #cantidadArticulo");
         let precioUnitario = document.querySelectorAll("td #precio_Un");
         let impuestos = document.querySelectorAll("td #impuestos");
         let subTotalConImp = document.querySelectorAll("td #subTotalConImp");
         let subtotal = Array();
         let totalImp = Array();
         var subTotalFinal = 0
         var totalimpFinal = 0;
         var TotalFinal = 0;
         for(let i = 0; i < cantidades.length; i++){
             let precioUn = parseInt($(precioUnitario[i]).text());
             if(!isNaN(precioUn)){
                let sub =  $(cantidades[i]).val()*parseInt($(precioUnitario[i]).text());
                let impuestoPorc = (parseInt($(impuestos[i]).val())!==0)?parseInt($(impuestos[i]).val()):0;
                let impValue = (sub*impuestoPorc)/100;
                let subPrecio = impuestoPorc==0?0:impValue;
                let TotalPrecio = sub + subPrecio;
                totalImp.push(impValue);
                $(subTotalConImp[i]).text(TotalPrecio);
                subtotal.push(sub);
                total.push(TotalPrecio);
            } else {
                subtotal.push(0); 
                total.push(0);
            }
         }
        for(let i = 0; i < total.length; i++){ 
            subTotalFinal = subTotalFinal + subtotal[i];
            TotalFinal = TotalFinal + total[i];
            totalimpFinal = totalimpFinal+totalImp[i];
        }
        $("#impuestoFinal").text(totalimpFinal);
        $("#subTotalFinal").text(subTotalFinal);
        $("#TotalFinal").text(TotalFinal);
    }
            $("#btnContinuar").on('click', function(event){
        event.preventDefault();
        var respuestaFinal=0;
        var cantidades=document.querySelectorAll("#cantidadArticulo");
        var idArticulos=document.querySelectorAll("#idArticulo");
        var datoFinal=[];
        var datosInfo=[];
        var datosEnviar=[];
        for(let i=0;i<cantidades.length;i++){
            
           
            datosEnviar={
            "idArticulos":$(idArticulos[i]).val(),
            "cantidad":$(cantidades[i]).val(),
            
        }
  datosInfo.push(datosEnviar);
          
        
    }
    datoFinal={
        "array":datosInfo,
        "action":"actualizarCantidadCarrito"
   }
    //"action":"actualizarCantidadCarrito"
     $.ajax({
        type:'POST',    
        url:'./carritoCompras/carritoController.php',
        data:datoFinal,
        success:function(dat){
                if(dat!=false){
                Swal.fire({
                                                   icon: 'success',
                                                   title: 'Datos Guardados Exitosamente',
                                                   text: 'Será redireccionado para completar su compra'

                                                 });
               
               window.setTimeout(function () {
                            window.location.href = "./?pag=checkout&&step=general"
                        }, 2000);
            } else {
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ocurrió un error al guardar los datos, recargue la página e intente de nuevo'
              
              })
            }
          
        }
    });
    
       
         
});
function vaciarCarrito2(){
Swal.fire({
                        title: '¿Seguro que desea remover los productos del Carrito?',
                        text: "",
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
                                data:'action=vaciarCarrito',
                                success:function(dat){

                                    if(dat!=false){

                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Carrito Vaciado',
                                            text: 'Su carrito fue vaciado'
                                         });

                                       window.setTimeout(function () {
                                                    window.location.href = "./?pag=carrito"
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
                      })
  
    }
    function vaciarCotizacion(){
    $.ajax({
        type:'POST',    
        url:'./carritoCompras/carritoController.php',
        data:'action=vaciarCotizacion',
        success:function(dat){
           
            if(dat!=false){
                
                Swal.fire({
                                                   icon: 'success',
                                                   title: 'Lista de Cotización Vaciada',
                                                   text: 'Su lista fue vaciada exitosamente'

                                                 });
               
               window.setTimeout(function () {
                            window.location.href = "./?pag=carrito"
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
    
    function removerProductoCoarrito(idProducto){
               let datosEnviar={
            'idProducto':idProducto,
            'action': 'removerProductoCarrito'
        }
            Swal.fire({
                        title: '¿Seguro que desea remover este producto del Carrito?',
                        text: "",
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
                                      data:datosEnviar,
                                    success:function(dat){
                                        if(dat){
                                             Swal.fire({
                                                   icon: 'success',
                                                   title: 'Actualizado',
                                                   text: 'Carrito actualizado con éxito'

                                                 });
                                                    window.setTimeout(function () {
                            window.location.href = "./?pag=carrito"
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
    calcularSubtotal();

</script>
