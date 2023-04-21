<?php

?>
<div style="width:95%;margin:auto;margin-top:100px; min-width:320px;min-height:90vh;margin-bottom:100px;padding:15px;padding-top:50px;border-radius:15px;background:white;box-shadow:2px 2px 10px gray;">
    <h2 class="text-center">Órdenes</h2>

          <div class="col-lg-12 m-auto">

<div class="m-auto" id="myContent">
            <div class="table-responsive">
              <table class="table table-hover margin-bottom-none" id="generalTable">
                <thead>
                  <tr>
                    <th>Orden #</th>
                    <th>Cliente</th>
                    <th>Contacto</th>
                    <th>Tipo Pago</th>
					    <th>Estado</th>
                     <th>Dirección de Entrega</th>
                    <th>Fecha</th>
                    <th style="min-width:80px;">SubTotal</th>
                    <th style="min-width:80px;">Costo de Envío</th>
                    <th style="min-width:80px;">Total Impuesto</th>
                   <th style="min-width:80px;">Total</th>
                    <th>Acciones</th>
                
                    
                  </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($ordenesRespuesta as $ordenesValue){
                       $entrega = '';
                    ?>
                    <tr>
                    <td><?=$ordenesValue['codigo']?></td>
                    <td><?=$ordenesValue['cliente']." ".$ordenesValue['apellido']?></td>
                    <td><?=$ordenesValue['userName']?><a style='padding:0px;background:transparent;color:gray;border-radius:50%;width:23px;height:23px;' rel='tooltip'type="button" class="btn btn-secondary ml-3" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="<?=$ordenesValue['email']."/".$ordenesValue['telefono']?>">
?
</a></td>
                    <td><?=$ordenesValue['idPaymentType']?></td>
						<td><?=$ordenesValue['status']!=''?$ordenesValue['status']:'Pendiente'?></td>
                    <?php
                    if($ordenesValue['shippingMethod']=='Ubicacion'){
                        $entrega = $ordenesValue['provincia']."/".$ordenesValue['canton']."/".$ordenesValue['distrito']."/".$ordenesValue['address']
                    ?>
                    <td><?=$entrega?></td>
                  <?php
                    } else {
                        $entrega =  $ordenesValue['shippingMethod'];
                      ?>
                    <td><?=$entrega?></td>
                    <?php
                    }
                  ?>
                    <td><?=$ordenesValue['creationdate']?></td>
                    <td>₡ <?=round($ordenesValue['SubTotal'],2)?></td>
                     <td>₡ <?=round($ordenesValue['Shipping'],2)?></td>
                      <td>₡ <?=round($ordenesValue['TotalTax'],2)?></td>
                   <td>₡ <?=intval($ordenesValue['Total'])?></td>
                    <td><button class="btn btn-outline-secondary" onclick="mostrarDetalles('<?=$ordenesValue['codigo']?>','<?=$ordenesValue['cliente']." ".$ordenesValue['apellido']?>','<?=$ordenesValue['idPaymentType']?>','<?=$ordenesValue['status']?>','<?=$entrega?>','<?=$ordenesValue['creationdate']?>','<?=$ordenesValue['email']."/".$ordenesValue['telefono']?>','<?=round($ordenesValue['SubTotal'],2)?>','<?=round($ordenesValue['Shipping'],2)?>','<?=round($ordenesValue['TotalTax'],2)?>','<?=intval($ordenesValue['Total'])?>')">Ver Detalles</button>
                    <button class="btn btn-outline-info" onclick="cambiarEstado('<?=$ordenesValue['codigo']?>','<?=$ordenesValue['idEstado']?>')">Editar</button></td>
                    
                    
                  </tr>
                  <?php
                    }
                  ?>
                </tbody>
              </table>
            </div>
            <hr>
            
          </div>
        </div>
     </div>
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
       <div class="modal fade" id="modalDetalles" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="exampleModalLabel">Detalles de Factura</h5>
           <button onclick='cerrarModal()' type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>

         <div class="modal-body">
             <div  class="container"><h4>Datos Generales</h4><hr>
        <div class="row">
            <div class="col-6 text-left"><strong>Orden</strong></div>
            <div class="col-6 text-right" id="info_orden"></div>
        </div>
        <div class="row">
            <div class="col-6 text-left"><strong>Cliente</strong></div>
            <div class="col-6 text-right" id="info_cliente"></div>
        </div>
        <div class="row">
            <div class="col-6 text-left"><strong>Contacto</strong></div>
            <div class="col-6 text-right" id="info_contacto"></div>
        </div>
        <div class="row">
            <div class="col-6 text-left"><strong>Tipo Pago</strong></div>
            <div class="col-6 text-right" id="info_tipopago"></div>
        </div>
                 <div class="row">
            <div class="col-6 text-left"><strong>Estado</strong></div>
            <div class="col-6 text-right" id="info_estado"></div>
        </div>
       
        <div class="row">
            <div class="col-6 text-left"><strong>Dirección de Entrega</strong></div>
            <div class="col-6 text-right" id="info_direccion"></div>
        </div>
        <div class="row">
            <div class="col-6 text-left"><strong>Fecha</strong></div>
            <div class="col-6 text-right" id="info_fecha"></div>
        </div>
        
    </div>
      <table class="table table-hover mt-4">
  <thead>
    <tr>
      <th scope="col">Nombre Artículo</th>
      
       <th scope="col">Cantidad</th>
              <th scope="col">SubTotal</th>
              <th scope="col">IVA</th>
               <th scope="col">Total</th>

    </tr>
  </thead>
  <tbody id="tblBody">
      
</tbody>
</table>
         <div class="container">
         <div style="font-size:25px;min-width:100%;">SubTotal: <div id="detail_subtotal" style="float:right;margin-right:30px;"></div></div>   
         <div style="font-size:25px;min-width:100%;">Costo de Envío: <div id="detail_costo" style="float:right;margin-right:30px;"></div></div> 
         <div style="font-size:25px;min-width:100%;">IVA: <div id="detail_iva" style="float:right;margin-right:30px;"></div></div> 
         <div style="font-size:25px;min-width:100%;">Total: <div id="detail_total" style="float:right;margin-right:30px;"></div></div> 
         </div>
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-secondary" onclick='cerrarModal()'>Cerrar</button>
         </div>
       </div>
     </div>
   </div>
<script>

    $(document).ready( function () {

    $('#generalTable').DataTable({
        paging: true,
        ordering: true,
        info: true,
        order: [[6, 'desc']]
    });
    });
function cambiarEstado(code,idEstado){
(async () => {
const { value: status } = await Swal.fire({
  title: 'Seleccione una opción',
  input: 'select',
  inputOptions: {
    1: 'Pendiente',
    2: 'Pagado',
    3:'Pago Rechazado',
    4:'Rechazado',
    5:'Entregado',
    6:'En Camino'
  },
  inputPlaceholder: 'Seleccione una opción',
  showCancelButton: true,
  inputValue:idEstado,
  inputValidator: (value) => {
    return new Promise((resolve) => {
        resolve()
    })
  }
})

if (status) {
    let parameters = {
        "action":"updateStatus",
        "code":code,
        "status":status
    }
              $.ajax({
                url: "../controllers/ordenController.php",
                type: "POST",
                datatype: "html",
                data: parameters,
                success: function (resp) {
                    console.log(resp);
                    let response = JSON.parse(resp);
                    if (response.status) {
                        Swal.fire(response.msn, '', 'success');
                        window.setTimeout(function () {
                            window.location.href = "<?=base_url?>Admin/?seccion=orders"
                        }, 2000);
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: response.msn,
                            footer: '',

                        })
                    }
                }


            })//fin 
}

})();
}
function mostrarDetalles(code,cliente,tipopago,estado,direccion,fecha,contacto,subtotal,costo,iva,total){
    $("#info_orden").text(code); 
     $("#info_cliente").text(cliente);    
$("#info_estado").text(estado);    
$("#info_tipopago").text(tipopago);    
$("#info_direccion").text(direccion); 
$("#info_contacto").text(contacto); 
$("#info_fecha").text(fecha);

$("#detail_subtotal").text("₡ "+subtotal);
$("#detail_costo").text("₡ "+costo);
$("#detail_iva").text("₡ "+iva)
$("#detail_total").text("₡ "+total)
    let data = {
        "action":"mostrarDetalles",
        "code":code
    }
                $.ajax({
    type : 'POST',
    url : '../controllers/ordenController.php',
    data : data,
   success:function(response){
                   
                    var tblBody= document.getElementById("tblBody");
                    $("#tblBody").html("");
                   var objetoJson=JSON.parse(response);
              let totalfactura=0;
                   for(let i=0;i<objetoJson.length;i++){
                       let iva=0;
                       var hilera = document.createElement("tr");
                       
                           var celda = document.createElement("td");
                           var textoCelda = document.createTextNode(objetoJson[i]['art_Descripcion']);
                          celda.appendChild(textoCelda);
                           hilera.appendChild(celda);
                           var celda = document.createElement("td");
                           var textoCelda = document.createTextNode(objetoJson[i]['cantidad']);
                          celda.appendChild(textoCelda);
                           hilera.appendChild(celda);
                           let cantidad=parseInt(objetoJson[i]['cantidad'], 10);
                           var celda = document.createElement("td");
                            let precioN = parseFloat(objetoJson[i]['price'],10);
                            if(isNaN(precioN)){
                               precioN=0;
                           }
                           var textoCelda = document.createTextNode(precioN);
                          celda.appendChild(textoCelda);
                           hilera.appendChild(celda);
                           var celda = document.createElement("td");
                           iva=parseFloat(objetoJson[i]['taxAmount'], 10);
                           if(isNaN(iva)){
                               iva=0;
                           }
                           var textoCelda = document.createTextNode(iva);
                          celda.appendChild(textoCelda);
                           hilera.appendChild(celda);
                           
                           
                          var celda = document.createElement("td");
                          let totalItem=parseFloat(objetoJson[i]['totalPrice'], 10);
                           if(isNaN(iva)){
                               totalItem=0;
                           }
                          var textoCelda = document.createTextNode(totalItem);
                          celda.appendChild(textoCelda);
                          hilera.appendChild(celda);
                       
                       tblBody.appendChild(hilera);
                       totalfactura=totalfactura+totalItem;
                   }
                    $("#textTotal").text("₡"+totalfactura);
                   $("#modalDetalles").appendTo("body").modal('show');
                   if(response!=0){
                       
                    
                     
                 
                }else { 
                   
                    if (response) {
                        Swal.fire('Producto eliminado con éxito!', '', 'success');
                        window.setTimeout(function () {
                            window.location.href = "./"
                        }, 2000);
                     
                        Swal.fire({
                            icon: 'error',
                            title: 'Error ',
                            text: 'Error al ingresar elemento',
                            footer: '',

                        })
                    }
                } 
    }
                }); 
            }            

function cerrarModal(){
  $("#modalDetalles").modal("hide");  
    
}

</script>
<script type="text/javascript">
    $(function () {
        $("[rel='tooltip']").tooltip();
    });
</script>
     
