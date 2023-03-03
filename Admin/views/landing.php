<?php
?>

<div style="width:80%;margin-top:100px; min-width:320px;min-height:90vh;">
    <h2 class="text-center">Página de Aterrizaje</h2>
    <div class="col-lg-8 m-auto">

<div class="m-auto" id="myContent">
 
  <div class="" id="profile" style="padding-top:20px;">
      <button class="btn btn-primary" onclick="abrirModalLanding()">+Agregar</button>
      <table class="table">
  <thead>
    <tr>
      <th scope="col">Código</th>
      <th scope="col">Título</th>
      <th scope="col">Sub Título</th>
      <th scope="col">Imagen</th>
      <th scope="col">Estado</th>
      <th scope="col">Email</th>
      <th scope="col">Descripción</th>
      <th scope="col" style='min-width:150px;'>Acciones</th>
    </tr>
  </thead>
  <tbody>
      <?php
      if(isset($respuestaLanding)&&count($respuestaLanding)>0){
          foreach ($respuestaLanding as $respuestaLandingvalue) {
      ?>
       <tr class="table-active" style="">
      <th scope="row"><?=$respuestaLandingvalue['code']?></th>
      <td><?=$respuestaLandingvalue['titulo']?></td>
      <td><?=$respuestaLandingvalue['subtitulo']?></td>
      <td><img style='width:100px' src="<?=base_url?>assets/imagenesLanding/<?=$respuestaLandingvalue['rutaImagen']?>" alt="alt"/></td>
      <td>
        <?php if($respuestaLandingvalue['estado']){
            echo "Activo";
        } else {
            echo "Inactivo";
        }
                
                ?> 
      </td>
      <td><?=$respuestaLandingvalue['emailSet']?></td>
      <td id='<?=$respuestaLandingvalue['code']?>'><?=$respuestaLandingvalue['descripcion']?></td>
      <td>
          
          <i class="fa-solid fa-pen-to-square" style="cursor:pointer;color:white;font-size:20px;" onclick="editarPromo('<?=$respuestaLandingvalue['id']?>','<?=$respuestaLandingvalue['titulo']?>','<?=$respuestaLandingvalue['subtitulo']?>','<?=$respuestaLandingvalue['emailSet']?>','<?=$respuestaLandingvalue['rutaImagen']?>','<?=$respuestaLandingvalue['estado']?>','<?=$respuestaLandingvalue['code']?>')"></i> 
          <i class="fa-solid fa-trash" style="cursor:pointer;color:white;font-size:20px; margin-left:10px;" onclick="eliminarLanding('<?=$respuestaLandingvalue['id']?>')"></i>
          <i class="fa-solid fa-copy" style="cursor:pointer;color:white;font-size:20px; margin-left:10px;" onclick="copiarAlPortapapeles('<?=$respuestaLandingvalue['code']?>')"></i>
          <i class="fa-solid fa-qrcode" style="cursor:pointer;color:white;font-size:20px; margin-left:10px;" onclick="makeCode('<?=$respuestaLandingvalue['code']?>')"></i>
          
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
                          <label for="reg-fn">Título</label>
                          <input name="titulo" type="text" id="titulo" class="form-control"  />
                            <span data-val-controltovalidate="" data-val-errormessage="" data-val-display="Dynamic" id="ContentPlaceHolder1_ctl00" class="text-danger" data-val="true" data-val-evaluationfunction="RequiredFieldValidatorEvaluateIsValid" data-val-initialvalue="" style="display:none;">Requerido.</span>
                        </div>
                      </div>
                        <div class="col-6">
                        <div class="form-group">
                          <label for="reg-fn">Sub Título</label>
                          <input name="subtitulo" type="text" id="subtitulo" class="form-control"  />
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
                          <label for="reg-fn">Email</label>
                          <input name="emailSet" type="text" id="emailSet" class="form-control"  />
                            <span data-val-controltovalidate="" data-val-errormessage="" data-val-display="Dynamic" id="ContentPlaceHolder1_ctl00" class="text-danger" data-val="true" data-val-evaluationfunction="RequiredFieldValidatorEvaluateIsValid" data-val-initialvalue="" style="display:none;">Requerido.</span>
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
                        
                        
                       
                        <div class="col-6">
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
             <a id="btnagregar" class="btn btn-success" onclick='agregarLanding()'>Agregar</a>
           <button type="button" class="btn btn-secondary" onclick='cerrarModal()'>Cerrar</button>
         </div>
       </div>
     </div>
   </div>
</div>
</div>
    <div class="modal fade" id="modalQR" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="tituloModal">Código QR</h5>
           <button onclick='cerrarModalQR()' type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>

         <div class="modal-body container p-3" >
              <div class="m-auto" id="qrcode" style="width:300px; height:300px; margin-top:15px;"></div>
             </div>
           
             <div class="modal-footer">
            <button type="button" class="btn btn-primary" onclick='downloaQR()'>Descargar</button>
           <button type="button" class="btn btn-secondary" onclick='cerrarModalQR()'>Cerrar</button>
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

   var qrcode = new QRCode(document.getElementById("qrcode"), {
            width : 300,
            height : 300,
            id:'canvas'
        });
        
  function downloaQR(){
      var link = document.createElement('a');
  link.download = 'CodidoQR.png';
  var element =  $("#qrcode canvas");
 
  link.href = element[0].toDataURL()
  link.click();
  }      
  function makeCode (code) {
      let url = "<?=base_url?>/landingView/?code="+code;      
            if (!url) {
                alert("Ingresa un texto");
               
                return;
            }
            qrcode.makeCode(url);
            abrirModalQR();
            
        } 
  function abrirModalQR(){
      $("#modalQR").appendTo("body").modal('show');
  }      
function abrirModalLanding(){
    $("#btnagregar").html('Agregar');
    $("#iborrainputfile").html('Subir imagen');
     $("#titulo").val('');
      $("#subtitulo").val('');
 $("#descripcion").val('');
 $("#emailSet").val('');
 $("#file-1").html('');
 $("#estado").val('');
$("#tituloModal").html('Agregar');
 $("#action").val('agregarLanding');
    $("#modalAgregar").appendTo("body").modal('show');
 //   $("#modalAgregar").modal('show');
    
}

function cerrarModal(){
  $("#modalAgregar").modal("hide");  
    
}
function cerrarModalQR(){
  $("#modalQR").modal("hide");  
    
}

var imagenEditar = '';
function editarPromo(id,titulo,subtitulo,emailSet,imagen,estado,code){
 imagenEditar = imagen;   
$("#tituloModal").html('Editar');
 $("#id").val(id);
 $("#action").val('editarLanding');
 $("#btnagregar").html('Editar');
 $("#iborrainputfile").html(imagen);
 $("#titulo").val(titulo);
 $("#subtitulo").val(subtitulo);
  $("#emailSet").val(emailSet);
 $("#descripcion").val($("#"+code).text());
 
 console.log("valores",$("#descripcion").val());
 $("#file-1").html(imagen);
 $("#estado").val(estado);
 $("#modalAgregar").appendTo("body").modal('show'); 
}

function agregarLanding(){


var file_data = '';
     var form_data = new FormData();
     if(document.getElementById( "file-1" )){
       file_data = $("#file-1").prop("files")[0]; 
     }
     form_data.append("titulo", $("#titulo").val());
     form_data.append("subtitulo", $("#subtitulo").val());
     form_data.append("descripcion", $("#descripcion").val());
     form_data.append("emailSet", $("#emailSet").val());
     form_data.append("file", file_data);
     form_data.append("action", $("#action").val());
     if($("#action").val()=='editarLanding'){
       form_data.append("id",$("#id").val());  
     }
     form_data.append("estado", $("#estado").val());
       $.ajax({
        type:'POST',    
        url:'../controllers/landingController.php',
        enctype: 'multipart/form-data',
        cache: false,
    contentType: false,
    processData: false,
        data:form_data,
        success:function(dat){
            
            if(dat==1){
                if($("#tituloModal").html()=='Editar'){
                    Swal.fire({
                                                   icon: 'success',
                                                   title: 'Modificado',
                                                   text: 'Información modificada con éxito'

                                                 });
                } else {
                    Swal.fire({
                                                   icon: 'success',
                                                   title: 'Agregado',
                                                   text: 'Información agregada con éxito'

                                                 });
                }
               window.setTimeout(function () {
                            window.location.href = "./?seccion=paginaAterrizaje"
                        }, 2000);
                    } else {
                       Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Datos incorrectos'
              });
               window.setTimeout(function () {
                            window.location.href = "./?seccion=paginaAterrizaje"
                        }, 2000);  
                    }
    }
    });
} 

function eliminarLanding(id){
       var parametros = {
        "idLanding": parseInt(id, 10),
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
                url: "../controllers/landingController.php",
                type: "POST",
                datatype: "html",
                data: parametros,
                success: function (response) {
                   
                    if (response) {
                        Swal.fire('Elemento eliminado con éxito!', '', 'success');
                        window.setTimeout(function () {
                            window.location.href = "./?seccion=paginaAterrizaje"
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

function copiarAlPortapapeles(value) {
let url = "<?=base_url?>/landingView/?code="+value;
  // Crea un campo de texto "oculto"
  var aux = document.createElement("input");

  // Asigna el contenido del elemento especificado al valor del campo
  aux.setAttribute("value", url);

  // Añade el campo a la página
  document.body.appendChild(aux);

  // Selecciona el contenido del campo
  aux.select();

  // Copia el texto seleccionado
  document.execCommand("copy");

  // Elimina el campo de la página
  document.body.removeChild(aux);
  
  Swal.fire('Copiado', '', 'success');

}

</script>

    
</div>
