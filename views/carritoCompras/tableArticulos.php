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
    <div>
    <a class="btn btn-sm btn-outline-danger mb-3" style="float:right" onclick="vaciarCarrito2()">VACIAR CARRITO</a>
   
</div>
    <div class="container overflow-auto">
<table class="table table-striped table-bordered" cellspacing="0" cellpadding="4" rules="cols" border="1" id="ContentPlaceHolder1_CartList" style="border-collapse:collapse;">
		<tr>
			<th scope="col">&nbsp;</th><th scope="col">Nombre</th><th scope="col">Personalización</th><th scope="col">Cantidad</th><th>Precio Unitario</th>
                        <th scope="col">Impuesto Unitario</th>
                        <th scope="col">Total</th>
                        <th scope="col">Acciones</th>
                        
		</tr>
                <?php
              
                if(isset($_SESSION['carrito'])){
                    foreach ($_SESSION['carrito'] as $carritoTabla) {
                      $impuesto = 0;  
                      $subTotal = 0 ;
                      $total = 0;
                      $llevaimpuesto= isset($carritoTabla["llevaimpuesto"])&&$carritoTabla["llevaimpuesto"]!=0?$carritoTabla["llevaimpuesto"]:0;
                      $impuesto = intval($carritoTabla['impuesto']);
                            if($carritoTabla['impuesto']!=''){
                                
                                $impuesto=round($impuesto,2);   
                            }
                         
//                    if(!is_null($impuesto)){
//                        $impuesto=number_format(intval($impuesto),2);
//                    } else {
//                        $impuesto = 0;
//                    }            
                 //$carritoTabla['IVAIncluido']=0;
                              $precioIni =round($carritoTabla['art_PrecioUnitario'],2);
                              $precio = $llevaimpuesto==1?$carritoTabla['IVAIncluido']==1&&$impuesto!=0?round(($precioIni/(1+($impuesto/100))),2):round($precioIni,2):round($precioIni,2); 
                              $impMonto=$llevaimpuesto==1?$impuesto!=0?$carritoTabla['IVAIncluido']==1?$precioIni-$precio:$precio*($impuesto/100):0:0;
                              $subTotal =  ($precio+$impMonto)*$carritoTabla['cantidad'];
                              
                ?>
                
                <tr>
			<td style="width:120px;">
                            
                            <img style="width:100px;" src="<?=base_url2.$carritoTabla['imagen']?>" alt="" />
                                </td><td>
                                    <a href="<?=base_url?>?pag=product&&id=<?=$carritoTabla['id']?>"><span id=""> <?=$carritoTabla['nombre']?></span></a>
                                </td>
                                <td>
                                    <?=isset($carritoTabla['radioColor'])&&!empty($carritoTabla['radioColor'])?'Color: <label style ="cursor:pointer;box-shadow:1px 1px 3px;border:solid 5px white;width:40px;height:40px;background:'.$carritoTabla["radioColor"].'"></label><br>':'';?>
                                    <?=isset($carritoTabla['radioImg'])&&!empty($carritoTabla['radioImg'])?"Imagen: <img style='width:100px' src ='".base_url."".$carritoTabla['radioImg']."'><br>":'';?>
                                    <?=isset($carritoTabla['listAttribute'])&&!empty($carritoTabla['listAttribute'])?"Selección: ".$carritoTabla['listAttribute']:'';?>
                                </td>
                                
                                
                                <td>
                                    <input onchange="validarCantidad(this,<?=$carritoTabla['cantidadMinima']?>)" name="" type="number" value="<?=$carritoTabla['cantidad']?>" id="cantidadArticulo" style="width:40px;" />
                                    <input id="idArticulo" type="hidden" name="idArticulo" value="<?=$carritoTabla['id']?>">
                                    
                                </td>
                                <td class="text-num">
                                    <input type="hidden" id="precio_Un" value="<?=round($carritoTabla['art_PrecioUnitario'],2)?>">
                                    <span id="precio" ><?=$precio?></span>
                                </td>
                                <td class="text-num">
                                    <input type="hidden" id="impuestos" value="<?=$impuesto?>">
                        <input id="ivaIncluido" type="hidden" name="ivaIncluido" value="<?=$carritoTabla['IVAIncluido']?>">
                        <input id="llevaimpuesto" type="hidden" name="llevaimpuesto" value="<?=$carritoTabla['llevaimpuesto']?>">
                        <?=$impMonto?>
                                    <br/>
                                </td>
                                <td class="text-num">
                                    <span id="subTotalConImp"><?=$subTotal?></span>
                                </td>
                                
                                <td class="text-num">
                                   <a onclick ="removerProductoCoarrito(<?=$carritoTabla['id']?>)" class="btn btn-outline-danger">Eliminar</a>
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
</div>
    <hr>
   
    <div class="pb-4">
        <a class="btn btn-outline-secondary" href="<?=base_url?>">SEGUIR COMPRANDO</a>
        <hr class="mb-4 pb-2">
        <div class="row justify-content-end">
        <h4 class="col-4" style="">Subtotal: </h4>
        <span style="font-size:20px;font-weight:400;text-align:right;" class="ml-1 col-1 text-right">₡</span><span style="font-size:20px;font-weight:400;text-align:right;" class="col-3" id="subTotalFinal">0</span>
        </div>
        <hr>
        <div class="row justify-content-end">
        <h4 class="col-4" style="">Impuesto Total: </h4>
        <span style="font-size:20px;font-weight:400;text-align:right;" class="ml-1 col-1 ">₡</span><span style="font-size:20px;font-weight:400;text-align:right;" class="col-3 text-right" id="impuestoFinal">0</span>
        </div>
        <hr>
                 <div class="row justify-content-end">
        <h4 class="col-4" style="">Total: </h4>
        <span style="font-size:20px;font-weight:400;text-align:right;" class="ml-1 col-1">₡</span><span style="font-size:20px;font-weight:400;text-align:right;" class="col-3 text-right" id="TotalFinal">0</span>
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
         let ivaIncluido = document.querySelectorAll("td #ivaIncluido");
         let llevaimpuesto = document.querySelectorAll("td #llevaimpuesto");
         let subtotal = Array();
         let totalImp = Array();
         var subTotalFinal = 0
         var totalimpFinal = 0;
         var TotalFinal = 0;
         for(let i = 0; i < cantidades.length; i++){
             let precioUn = parseInt($(precioUnitario[i]).val());
             if(!isNaN(precioUn)){
                let precioSinImp =  $(llevaimpuesto[i]).val()==1?$(ivaIncluido[i]).val()!=1?$(cantidades[i]).val()*precioUn:$(cantidades[i]).val()*(precioUn/(1+($(impuestos[i]).val()/100))):$(cantidades[i]).val()*precioUn;
                let impuestoPorc = $(llevaimpuesto[i]).val()==1?$(impuestos[i]).val()!==0?parseInt($(impuestos[i]).val()):0:0;
                let impValue = parseInt($(llevaimpuesto[i]).val())==1?impuestoPorc!=0?((precioSinImp*impuestoPorc)/100):0:0;
                let TotalPrecio = impValue + precioSinImp;
                
                totalImp.push(impValue);
                $(subTotalConImp[i]).text(TotalPrecio.toFixed(2));
                subtotal.push(precioSinImp);
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
        $("#impuestoFinal").text(totalimpFinal.toFixed(2));
        $("#subTotalFinal").text(subTotalFinal.toFixed(2));
        $("#TotalFinal").text(TotalFinal.toFixed(2));
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
