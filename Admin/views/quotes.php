<?php


?>
<div style="width:95%;margin:auto;margin-top:100px; min-width:320px;min-height:90vh;margin-bottom:100px;padding:15px;padding-top:50px;border-radius:15px;background:white;box-shadow:2px 2px 10px gray;">
    <h2 class="text-center">Cotizaciones</h2>

          <div class="col-lg-12 m-auto">
<div class="col-xl-4 col-md-12">
                    <div class="form-group">
                        <label for="estadoCotizacion">Filtrar por Estado</label>
                            <select id="estadoCotizacion" name="estado" class="form-control selectpicker show-tick">
                                <option  style="border-radius:15px;" value=''>Seleccione</option>
                                <option  style="border-radius:15px;" value='Pendiente'>Pendiente</option>
                                <option  style="border-radius:15px;" value='Enviada'>Enviada</option>
                                <option  style="border-radius:15px;" value='Rechazada'>Rechazada</option>
                            </select>
                    </div>
                </div>
<div class="m-auto" id="myContent">
            <div class="table-responsive">
              <table class="table table-striped table-hover margin-bottom-none table-bordered " id="generalTable">
                <thead>
                  <tr>
                    <th>Orden #</th>
                    <th>Cliente</th>
                    <th>Contacto</th>
                    
                     <th>Dirección de Entrega</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                
                    
                  </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($respQuote as $respQuoteResp){
                       
                    ?>
                    <tr>
                    <td><?=$respQuoteResp['codigo']?></td>
                    <td><?=$respQuoteResp['cliente']." ".$respQuoteResp['apellido']?></td>
                    <td><?=$respQuoteResp['email']?><a style='padding:0px;background:transparent;color:gray;border-radius:50%;width:23px;height:23px;' rel='tooltip'type="button" class="btn btn-secondary ml-3" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="<?=$respQuoteResp['email']."/".$respQuoteResp['telefono']?>">
?
</a></td>
                   <td><?=$respQuoteResp['provincia']."/".$respQuoteResp['canton']."/".$respQuoteResp['distrito']."/".$respQuoteResp['direccion']?></td>
                    <td><?=$respQuoteResp['fecha']?></td>
                     <td><?=$respQuoteResp['estado']?></td>
                    <td><button class="btn btn-outline-secondary" onclick="mostrarDetalles('<?=$respQuoteResp['codigo']?>')">Ver Detalles</button>
                    <button class="btn btn-outline-info" onclick="cambiarEstado('<?=$respQuoteResp['codigo']?>')">Editar</button>
                    </td>
                    
                    
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
 
       <div class="modal fade" id="modalDetalles" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="exampleModalLabel">Detalles de Cotización</h5>
           <button onclick='cerrarModal()' type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>

         <div class="modal-body">
      <table class="table table-hover mt-4">
  <thead>
    <tr>
      <th scope="col">Artículo Id</th>
      <th scope="col">Nombre Artículo</th>
      
       <th scope="col">Cantidad</th>
              <th scope="col">Notas</th>
              <th scope="col">Archivo</th>

    </tr>
  </thead>
  <tbody id="tblBody">
      
</tbody>
</table>
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-secondary" onclick='cerrarModal()'>Cerrar</button>
         </div>
       </div>
     </div>
   </div>
<script>

$("#estadoCotizacion" ).change(function() {
    console.log(this.value);
    var table = $('#generalTable').DataTable();
  table
        .columns(5)
        .search( this.value )
        .draw();
});
    $(document).ready( function () {

    $('#generalTable').DataTable({
        paging: true,
        ordering: true,
        info: true,
        order: [[4, 'desc']]
    });
    });

function mostrarDetalles(code){
    let data = {
        "action":"mostrarDetalles",
        "code":code
    }
                $.ajax({
    type : 'POST',
    url : '../controllers/cotizacionesController.php',
    data : data,
   success:function(response){
               console.log(response);    
                    var tblBody= document.getElementById("tblBody");
                    $("#tblBody").html("");
                   var objetoJson=response.data;
                   
              let totalfactura=0;
                   for(let i=0;i<objetoJson.length;i++){
                       let iva=0;
                       var hilera = document.createElement("tr");
                       
                          var celda = document.createElement("td");
                          var textoCelda = document.createTextNode(objetoJson[i]['idArticulo']);
                          celda.appendChild(textoCelda);
                           hilera.appendChild(celda);
                           var celda = document.createElement("td");
                           var textoCelda = document.createTextNode(objetoJson[i]['Producto']);
                          celda.appendChild(textoCelda);
                           hilera.appendChild(celda);
                           var celda = document.createElement("td");
                           var textoCelda = document.createTextNode(objetoJson[i]['Cantidad']);
                          celda.appendChild(textoCelda);
                           hilera.appendChild(celda);
                           var celda = document.createElement("td");
                          var textoCelda = document.createTextNode(objetoJson[i]['Nota']);
                          celda.appendChild(textoCelda);
                           hilera.appendChild(celda);
                            var celda = document.createElement("td");
                          
                          if(objetoJson[i]['Files']!=''){
                              var textoCelda = document.createTextNode(objetoJson[i]['Files']);
                          let a = document.createElement("a");
                        a.setAttribute("href", "<?=base_url?>assets/files/"+objetoJson[i]['Files']);
                        a.setAttribute("class", "btn btn-primary");
                        a.setAttribute("target", "_blank");
                        let aTexto = document.createTextNode("Ver Archivo");
                        a.appendChild(aTexto);
                        celda.appendChild(a);
                           hilera.appendChild(celda);
                    }else{
                         var textoCelda = document.createTextNode("No hay archivos adjuntos");
                         celda.appendChild(textoCelda);
                           hilera.appendChild(celda);
                       }
                        
                       tblBody.appendChild(hilera);
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
function cambiarEstado(code){
(async () => {
const { value: status } = await Swal.fire({
  title: 'Seleccione una opción',
  input: 'select',
  inputOptions: {
    1: 'Pendiente',
    2: 'Enviada',
    3:'Rechazada'
  },
  inputPlaceholder: 'Seleccione una opción',
  showCancelButton: true,
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
                url: "../controllers/cotizacionesController.php",
                type: "POST",
                datatype: "html",
                data: parameters,
                success: function (response) {
                    console.log(response);
                    if (response.status) {
                        Swal.fire(response.msn, '', 'success');
                        window.setTimeout(function () {
                            window.location.href = "<?=base_url?>Admin/?seccion=quotes"
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



</script>
<script type="text/javascript">
    $(function () {
        $("[rel='tooltip']").tooltip();
    });
</script>
     
