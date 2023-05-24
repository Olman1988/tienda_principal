<?php
?>

<div style="width:80%;margin-top:100px; min-width:320px;min-height:90vh;">
    <h2 class="text-center">Promociones</h2>
    <div class="col-lg-8 m-auto">

<div class="m-auto" id="myContent">
 
  <div class="" id="profile" style="padding-top:20px;">
      <button class="btn btn-primary" onclick="abrirModalPromo()">+Agregar</button>
      <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Imagen</th>
      <th scope="col">Estado</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
      <?php
      if(isset($respuestaPromos)&&count($respuestaPromos)>0){
          foreach ($respuestaPromos as $respuestaPromosvalue) {
              
          
      ?>
       <tr class="table-active" style="">
      <th scope="row"><?=$respuestaPromosvalue['ID']?></th>
      <td><?=$respuestaPromosvalue['nombre']?></td>
      <td><?=$respuestaPromosvalue['descripcion']?></td>
      <td><img style='width:100px' src="<?=base_url?>assets/imagenesPromo/<?=$respuestaPromosvalue['rutaImagen']?>" alt="alt"/></td>
      <td>
        <?php if($respuestaPromosvalue['estado']){
            echo "Activo";
        } else {
            echo "Inactivo";
        }
                
                ?> 
      </td>
      <td>
          <i class="fa-solid fa-pen-to-square" style="cursor:pointer;color:white;font-size:20px;" onclick="editarPromo('<?=$respuestaPromosvalue['ID']?>','<?=$respuestaPromosvalue['nombre']?>','<?=$respuestaPromosvalue['descripcion']?>','<?=$respuestaPromosvalue['rutaImagen']?>','<?=$respuestaPromosvalue['estado']?>')"></i> 
          <i class="fa-solid fa-trash" style="cursor:pointer;color:white;font-size:20px; margin-left:10px;" onclick="eliminarPromo('<?=$respuestaPromosvalue['ID']?>')"></i>
      </td>
      
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
           <h5 class="modal-title" id="tituloModal">Agregar</h5>
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
                         <label for="estado">Estado</label>
                            <select id="estado" name="estado"  class="form-control selectpicker show-tick">
                                <option  style="border-radius:15px;" value="1">Activo</option>
                                <option value="0">Inactivo</option>
                                 </select>
                                      <span  class="text-danger" style="display:none;">Requerido.</span>

                        </div>
                      </div>
                        
                        <div class="col-6">
                         <div class="form-group">
                          <label for="reg-ln">Imagen</label>   
                      <div class="container-input">
                            <input type="file" name="file" id="file-1" value="" class="inputfile inputfile-1" data-multiple-caption="{count} archivos seleccionados" multiple />
<label for="file-1" style='max-width:200px;' class="btn btn-primary">
<svg xmlns="http://www.w3.org/2000/svg" class="iborrainputfile" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg>
<span class="iborrainputfile " id="iborrainputfile">Subir Imagen</span>
</label>
</div>
</div>
                      </div>
                        
                        
                       
                        <div class="col-12">
                        <div class="form-group">
                          <label for="reg-ln">Descripción</label>
                          <textarea class='form-control' id="descripcion" name="descripcion" rows="5" cols="10"></textarea>
                            <span data-val-controltovalidate="ContentPlaceHolder1_Apellidos" data-val-errormessage="Requerido." data-val-display="Dynamic" id="ContentPlaceHolder1_ctl01" class="text-danger" data-val="true" data-val-evaluationfunction="RequiredFieldValidatorEvaluateIsValid" data-val-initialvalue="" style="display:none;">Requerido.</span>
                        </div>
                      </div>
                        </div>
                
        </form>
         </div>
         <div class="modal-footer">
             <a id="btnagregar" class="btn btn-success" onclick='agregarPromo()'>Agregar</a>
           <button type="button" class="btn btn-secondary" onclick='cerrarModal()'>Cerrar</button>
         </div>
       </div>
     </div>
   </div>
</div>
</div>

<script>
$(document).ready(function(){
    var editorAdded = false;
    
        $('#modalAgregar')
        .on('shown.bs.modal', (e) => {
            if(!editorAdded){
              tinymce.init({
        selector: 'textarea',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
        mergetags_list: [
            { value: 'First.Name', title: 'First Name' },
            { value: 'Email', title: 'Email' },
        ]
    });
              editorAdded = true;
             }
        }); 
     
    
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
$("#tituloModal").html('Agregar');
 $("#action").val('agregarPromo');
    $("#modalAgregar").appendTo("body").modal('show');
 //   $("#modalAgregar").modal('show');
    
}

function cerrarModal(){
  $("#modalAgregar").modal("hide");  
    
}

var imagenEditar = '';
function editarPromo(id,nombre,descripcion,imagen,estado){
 imagenEditar = imagen;   
$("#tituloModal").html('Editar');
 $("#id").val(id);
 $("#action").val('editarPromo');
 $("#btnagregar").html('Editar');
 $("#iborrainputfile").html(imagen);
 $("#nombre").val(nombre);
 $("#descripcion").val(descripcion);
 $("#file-1").html(imagen);
 $("#estado").val(estado);
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
     let descrip =$(".cke_editable").html();
     console.log(descrip);
     form_data.append("descripcion", descrip);
     
     form_data.append("file", file_data);
     form_data.append("action", $("#action").val());
     form_data.append("estado", $("#estado").val());
     console.log(form_data);
       $.ajax({
        type:'POST',    
        url:'../controllers/generalController.php',
        enctype: 'multipart/form-data',
        cache: false,
    contentType: false,
    processData: false,
        data:form_data,
        success:function(dat){
          console.log(dat);
            if(dat==1){
                if($("#tituloModal").html()=='Editar'){
                    Swal.fire({
                                                   icon: 'success',
                                                   title: 'Modificado',
                                                   text: 'Promo modificada'

                                                 });
                } else {
                    Swal.fire({
                                                   icon: 'success',
                                                   title: 'Agregado',
                                                   text: 'Promoción agregada'

                                                 });
                }
               window.setTimeout(function () {
                        //    window.location.href = "./?seccion=promociones"
                        }, 2000);
                    } else {
                       Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Datos incorrectos'
              });
               window.setTimeout(function () {
                       //     window.location.href = "./?seccion=promociones"
                        }, 2000);  
                    }
    }
    });
} 

function eliminarPromo(id){
       var parametros = {
        "idPromo": parseInt(id, 10),
        "action": "borrar"
    };
    
    Swal.fire({
        title: '¿Desea desea eliminar esta promoción?',
        showCancelButton: true,
        denyButtonText: `Cancelar`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {

            $.ajax({
                url: "../controllers/generalController.php",
                type: "POST",
                datatype: "html",
                data: parametros,
                success: function (response) {
                   
                    if (response) {
                        Swal.fire('Elemento eliminado con éxito!', '', 'success');
                        window.setTimeout(function () {
                            window.location.href = "./?seccion=promociones"
                        }, 2000);
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'No fue posible eliminar los datos, intente nuevamente!',
                            footer: '',

                        })
                    }
                }


            })//fin 

        } else if (result.isDenied) {
            Swal.fire('Changes are not saved', '', 'info')
        }
    })
}

</script>

    
</div>

