<?php
$consultarPromociones = new generalController();
$respuestaPromos = $consultarPromociones -> consultarPromociones();

?>
<div class="col-lg-8">
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Página de Aterrizaje</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Promociones</button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">...</div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab" style="padding-top:20px;">
      <button class="btn btn-outline-primary-2" onclick="abrirModalPromo()">+Agregar</button>
      <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Imagen</th>
      <th scope="col">Estado</th>
      <th scope="col">Tipo</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
      <?php
      if(isset($respuestaPromos)&&count($respuestaPromos)>0){
          foreach ($respuestaPromos as $respuestaPromosvalue) {
              
          
      ?>
       <tr>
      <th scope="row"><?=$respuestaPromosvalue['ID']?></th>
      <td><?=$respuestaPromosvalue['nombre']?></td>
      <td><?=$respuestaPromosvalue['descripcion']?></td>
      <td><img style='width:100px' src="<?=base_url?>assets/imagenesPromo/<?=$respuestaPromosvalue['rutaImagen']?>" alt="alt"/></td>
      <td>
        <?=$respuestaPromosvalue['estado']?> 
      </td>
      <td><?=$respuestaPromosvalue['tipo']?></td>
      <td><a class='btn btn-outline-primary-2' onclick="editarPromo(<?=$respuestaPromosvalue['ID']?>,'<?=$respuestaPromosvalue['nombre']?>','<?=$respuestaPromosvalue['descripcion']?>','<?=$respuestaPromosvalue['rutaImagen']?>','<?=$respuestaPromosvalue['estado']?>','<?=$respuestaPromosvalue['tipo']?>')">Editar</a></td>
      
    </tr>
      <?php
           }
      }
      ?>
   
  </tbody>
</table>
  
  </div>
    <div class="modal fade" id="modalAgregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="exampleModalLabel">Agregar</h5>
           <button onclick='cerrarModal()' type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>

         <div class="modal-body container p-3" >
             <form id="formularioRegistro" action="" >
                <input type="hidden" id="action" name="action" value="indexPromo">
                <input type="hidden" id="id" name="id" value="">
                    <div class="row">
                      <div class="col-6">
                        <div class="form-group">
                          <label for="reg-fn">Nombre</label>
                          <input name="nombre" type="text" id="nombre" class="form-control"  />
                            <span data-val-controltovalidate="" data-val-errormessage="" data-val-display="Dynamic" id="ContentPlaceHolder1_ctl00" class="text-danger" data-val="true" data-val-evaluationfunction="RequiredFieldValidatorEvaluateIsValid" data-val-initialvalue="" style="display:none;">Requerido.</span>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <label for="reg-ln">Descripción</label>
                          <textarea class='form-control' id="descripcion" name="descripcion" rows="5" cols="10"></textarea>
                            <span data-val-controltovalidate="ContentPlaceHolder1_Apellidos" data-val-errormessage="Requerido." data-val-display="Dynamic" id="ContentPlaceHolder1_ctl01" class="text-danger" data-val="true" data-val-evaluationfunction="RequiredFieldValidatorEvaluateIsValid" data-val-initialvalue="" style="display:none;">Requerido.</span>
                        </div>
                      </div>
                        
                        <div class="col-6">
                         <div class="form-group">
                          <label for="reg-ln">Imagen</label>   
                      <div class="container-input">
                            <input type="file" name="file" id="file-1" value="" class="inputfile inputfile-1" data-multiple-caption="{count} archivos seleccionados" multiple />
<label for="file-1" style='max-width:200px;'>
<svg xmlns="http://www.w3.org/2000/svg" class="iborrainputfile" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg>
<span class="iborrainputfile" id="iborrainputfile">Subir Imagen</span>
</label>
</div>
</div>
                      </div>
                        
                        <div class="col-6">
                       <div class="form-group">
                         <label for="estado">Estado</label>
                            <select id="estado" name="estado" class="form-control">
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                                 </select>
                                      <span  class="text-danger" style="display:none;">Requerido.</span>

                        </div>
                      </div>
                         <div class="col-6">
                       <div class="form-group">
                         <label for="tipo">Tipo</label>
                            <select id="tipo" name="tipo" class="form-control">
                                <option value="promo">Promo</option>
                                <option value="oferta">Oferta</option>
                                 </select>
                                      <span  class="text-danger" style="display:none;">Requerido.</span>

                        </div>
                      </div>
                        </div>
                <a id="btnagregar" class="btn btn-outline-primary" onclick='agregarPromo()'>Agregar</a>
        </form>
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-secondary" onclick='cerrarModal()'>Cerrar</button>
         </div>
       </div>
     </div>
   </div>
</div>
</div>

<script>
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
});
function abrirModalPromo(){
    $("#action").val('indexPromo');
    $("#btnagregar").html('Agregar');
    $("#iborrainputfile").html('Subir imagen');
     $("#nombre").val('');
 $("#descripcion").val('');
 $("#file-1").html('');
 $("#estado").val('');
 $("#tipo").val('');
 $("#action").val('agregarPromo');
    $("#modalAgregar").appendTo("body").modal('show');
 //   $("#modalAgregar").modal('show');
    
}

function cerrarModal(){
  $("#modalAgregar").modal("hide");  
    
}

var imagenEditar = '';
function editarPromo(id,nombre,descripcion,imagen,estado,tipo){
 imagenEditar = imagen;   

 $("#id").val(id);
 $("#action").val('editarPromo');
 $("#btnagregar").html('Editar');
 $("#iborrainputfile").html(imagen);
 $("#nombre").val(nombre);
 $("#descripcion").val(descripcion);
 $("#file-1").html(imagen);
 $("#estado").val(estado);
 $("#tipo").val(tipo);
 $("#modalAgregar").appendTo("body").modal('show'); 
}

function agregarPromo(){


var file_data = '';
     var form_data = new FormData();
     if(document.getElementById( "file-1" )){
       file_data = $("#file-1").prop("files")[0]; 
       
     }
         
   
     form_data.append("idEditar", $("#id").val());
     form_data.append("nombre", $("#nombre").val());
     form_data.append("descripcion", $("#descripcion").val());
     form_data.append("file", file_data);
     form_data.append("action", $("#action").val());
     form_data.append("estado", $("#estado").val());
     form_data.append("tipo", $("#tipo").val());
     console.log(form_data);
       $.ajax({
        type:'POST',    
        url:'./controllers/generalController.php',
        enctype: 'multipart/form-data',
        cache: false,
    contentType: false,
    processData: false,
        data:form_data,
        success:function(dat){
        
            if(dat==1){
                Swal.fire({
                                                   icon: 'success',
                                                   title: 'Agregado',
                                                   text: 'Promo agregada'

                                                 });
               
               window.setTimeout(function () {
                            window.location.href = "./?pag=cuenta&&func=admin"
                        }, 2000);
                    } else {
                       Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Datos incorrectos'
              
              });
               
               window.setTimeout(function () {
                            window.location.href = "./?pag=cuenta&&func=admin"
                        }, 2000);  
                    }
   
    }
    });
} 

</script>


