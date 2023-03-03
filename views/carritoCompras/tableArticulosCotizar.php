<?php

?>
<div class="page-title" id='page-title'>
        <div class="container">
          <div class="column">
            <h1>Cotizar</h1>
          </div>
          <div class="column">
            <ul class="breadcrumbs">
              <li><a href="/">Inicio</a>
              </li>
              <li class="separator">&nbsp;</li>
              <li>Cotizar</li>
            </ul>
          </div>
        </div>
      </div>

<div class="container" style="width:90%;min-width:300px;margin-bottom:50px;">
    <div class="">
    <a class="btn btn-sm btn-outline-danger mb-3" style="float:right;" onclick="vaciarCotizacion()">LIMPIAR COTIZACIÓN</a>
</div>
<table class="table table-striped table-bordered" cellspacing="0" cellpadding="4" rules="cols" border="1" id="ContentPlaceHolder1_CartList" style="border-collapse:collapse;">
		<tr>
			<th scope="col">&nbsp;</th><th scope="col">Nombre</th><th scope="col">Cantidad</th><th scope="col">Acciones</th>
		</tr>
                <?php
                if(isset($_SESSION['cotizacion'])){
                    
                    foreach ($_SESSION['cotizacion'] as $carritoTabla) {
                        
                    
                ?>
                
                <tr>
			<td style="width:120px;">
                            <img style="width:100px;" src="<?=base_url2.$carritoTabla['imagen']?>" alt="" />
                                </td><td>
                                    <span id=""> <?=$carritoTabla['nombre']?></span><br/>
                                   <?php
                                   if(isset($carritoTabla['observacion'])&& $carritoTabla['observacion']){
                                       echo "Observación: ".$carritoTabla['observacion']."<br>";
                                   }
                                   if(isset($carritoTabla['file'])&& $carritoTabla['file']){
                                       echo "<div class='alert alert-info' role='alert'>Archivo: ".$carritoTabla['file']."<div/>";
                                   } else {
                                       echo "<div class='alert alert-info' role='alert'>Sin archivos adjuntos<div/>";
                                   }
                                   ?>
                                </td><td>
                                          <input onchange="validarCantidad(this,<?=$carritoTabla['cantidadMinima']?>)" name="" type="number" value="<?=$carritoTabla['cantidad']?>" id="cantidadArticulo" style="width:40px;" />
                                    <input id="idArticulo" type="hidden" name="idArticulo" value="<?=$carritoTabla['id']?>">
                              
                                </td>
                           
                                
                                <td>
                                    <a href="./?pag=product&&id=<?=$carritoTabla['id']?>" class="btn btn-outline-primary-2" style='font-family:"Maven Pro","Helvetica","Arial","sans-serif"!important'>Editar</a>
                                    <a onclick ="removerProductoCotizacion(<?=$carritoTabla['id']?>);" class="btn btn-sm btn-outline-danger">Eliminar</a>
                                </td>
		</tr>
                
                <?php
                    }
                }
                ?>
                
	</table>
    <div class="pb-4">
        <a class="btn btn-outline-secondary" href="<?=base_url?>">SEGUIR COTIZANDO</a>
        <hr class="mb-4 pb-2">
        <hr>
    </div>
    <div class="text-right">
          <a class="btn btn-outline-success" onclick="actualizarCotizacion();" style="float:right;margin-left:15px">COTIZAR</a> 
     
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
        
    }
function vaciarCarrito2(){
    
                Swal.fire({
                    title: '¿Seguro que desea remover este producto de la Cotización?',
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
                                            window.location.href = "./?pag=carrito"}, 2000);
                                              


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
      Swal.fire({
                    title: '¿Seguro que desea remover los productos de la Cotización?',
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
       })
    }
    function removerProductoCotizacion(idProducto){
        let datosEnviar={
            'idProducto':idProducto,
            'action': 'removerProductoCotizacion'
        }
            Swal.fire({
                        title: '¿Seguro que desea remover este producto de la Cotización?',
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
                                        console.log(dat);
                                        if(dat){
                                             Swal.fire({
                                                   icon: 'success',
                                                   title: 'Actualizado',
                                                   text: 'Cotización actualizada con éxito'

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
    function actualizarCotizacion(){
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
        "action":"actualizarCantidadCotizacion"
   }
                             $.ajax({
                                 type:'POST',    
                                    url:'./carritoCompras/carritoController.php',
                                      data:datoFinal,
                                    success:function(dat){
                                        console.log(dat);
                                        if(dat){
                                             Swal.fire({
                                                   icon: 'success',
                                                   title: 'Actualizado',
                                                   text: 'Cotización actualizada con éxito'

                                                 });
                                                    window.setTimeout(function () {
                            window.location.href = "<?=base_url?>?pag=checkout&&step=general"
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
//                            window.location.href = "<?=base_url?>?pag=checkout&&step=general"
//                        }, 1000);  
                        }
                     
    

</script>
