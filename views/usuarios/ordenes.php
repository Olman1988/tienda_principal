<?php
?>
         <div class="col-lg-8">
            <div class="padding-top-2x mt-2 hidden-lg-up"></div>
            <div class="table-responsive">
              <table class="table table-hover margin-bottom-none" id="generalTable">
                <thead>
                  <tr>
                    <th>Orden #</th>
             <th>Estado</th>
                    <th>Tipo Pago</th>
                    
                     <th>Dirección de Entrega</th>
                    <th>Fecha</th>
                    <th style="min-width:80px;">SubTotal</th>
                    <th style="min-width:80px;">Costo de Envío</th>
                    <th style="min-width:80px;">Total Impuesto</th>
                   <th style="min-width:80px;">Total</th>
                    <th>Detalles</th>
                
                    
                  </tr>
                </thead>
                <tbody>
                    <?php
                    $entrega = '';
                    foreach($ordenesRespuesta as $ordenesValue){
                       
                    ?>
                    <tr>
                    <td><?=$ordenesValue['codigo']?></td>
                <td><?=$ordenesValue['estado']=='Pago Rechazado'||$ordenesValue['estado']=='Pagado'?'Pendiente':$ordenesValue['estado']?></td>
                <td><?= $ordenesValue['idPaymentType']?></td>
                    <?php
                    if($ordenesValue['shippingMethod']=='Ubicacion'){
                        $entrega = $ordenesValue['provincia']."/".$ordenesValue['canton']."/".$ordenesValue['distrito']."/".$ordenesValue['address'];
                    ?>
                    <td><?=$entrega?></td>
                  <?php
                    } else {
                        $entrega = $ordenesValue['shippingMethod'];
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
                    <td><button class="btn btn-outline-secondary" onclick="mostrarDetalles('<?=$ordenesValue['codigo']?>','<?=round($ordenesValue['Shipping'],2)?>','<?=round($ordenesValue['TotalTax'],2)?>','<?=intval($ordenesValue['Total'])?>','<?=$ordenesValue['estado']=='Pago Rechazado'||$ordenesValue['estado']=='Pagado'?'Pendiente':$ordenesValue['estado']?>','<?=$ordenesValue['idPaymentType']?>','<?=$entrega?>','<?=$ordenesValue['creationdate']?>',<?=round($ordenesValue['SubTotal'],2)?>)">Ver</button></td>
                    
                    
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
           <h5 class="modal-title" id="exampleModalLabel">Detalles de la Órden</h5>
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
        order: [[4, 'desc']]
    });
    });
function cont(){
    alert("hello");
}
function mostrarDetalles(code,costo,iva,total,estado,tipopago,direccion,fecha,subtotal){
$("#info_orden").text(code);    
$("#info_estado").text(estado);    
$("#info_tipopago").text(tipopago);    
$("#info_direccion").text(direccion); 
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
    url : './controllers/ordenController.php',
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

     
