<?php
 
?>
<div class="container" style="width:80%;background:white;border-radius:15px;height:auto;margin-top:100px;padding:20px">
    <h2 class="text-center">Clientes</h2>
    <div class="col-lg-8 m-auto">
<?php

?>
<div class="m-auto" id="myContent">
 
  <div class="" id="profile" style="padding-top:20px;">

      <table class="table" id="tabla-clientes">
  <thead>
    <tr>
      <th scope="col">Código</th>
      <th scope="col">Nombre</th>
      <th scope="col">Cédula</th>
      <th scope="col">Email</th>
      <th scope="col">Teléfono</th> 
    
    </tr>
  </thead>
  <tbody>
      <?php
     
      foreach ($respuestaClientes as $valueRespuestaClientes) {
          ?>
      <tr class="table-active">
      <td scope="col"><?=$valueRespuestaClientes['code']?></td>
      <td scope="col"><?=$valueRespuestaClientes['nombre']?></td>
      <td scope="col"><?=$valueRespuestaClientes['cedula']?></td>
      <td scope="col"><?=$valueRespuestaClientes['email']?></td>
      <td scope="col"><?=$valueRespuestaClientes['telefono']?></td>
    </tr>
      <?php
      }
      ?>
   </tbody>  
   </table>
<!--       <div class=""> <button id="exporttable" class="btn btn-primary">Export</button> </div>-->
 </div>
    </div>
</div>
    </div>

<script>
 $(document).ready(function(){

        $('#tabla-clientes').DataTable({
        paging: true,
        dom: 'Bfrtip',
        buttons: [
            'excel'
        ]
    });
});


$(document).ready(function(){
 $("#search").keyup(function(){
 _this = this;
 // Show only matching TR, hide rest of them
 $.each($("#tabla-clientes tbody tr"), function() {
 if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
 $(this).hide();
 else
 $(this).show();
 });
 });
});

</script>