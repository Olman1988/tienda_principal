<?php
?>
<div style="width:80%;margin-top:100px; min-width:320px;min-height:90vh;margin-bottom:100px;">
    <h2 class="text-center">Atributos</h2>
    <div class="col-lg-8 m-auto">

<div class="m-auto" id="myContent">
 
  <div class="" id="profile" style="padding-top:20px;">
      <button class="btn btn-primary"><a style="text-decoration: none;color:white;" href="<?=base_url?>Admin/?seccion=attributes&&action=add">+Agregar</a></button>
      <table class="table" id='generalTable'>
  <thead>
    <tr>
      <th scope="col">Atributo</th>
      <th scope="col">Tipo de Control</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
      <?php
      if(isset($respAttribute)&&count($respAttribute)>0){
          foreach ($respAttribute as $respAttributeValues) {
              $tipo = '';
              switch ($respAttributeValues['idTipoControl']) {
                  case "PHOTOS":
                      $tipo = "Imágenes";
                      break;
                  case "SQUARECOLORS":
                      $tipo = "Color";
                      break;
                  case "DROPDOWN":
                      $tipo = "Lista";
                      break;
                  default:
                      break;
              }
          
      ?>
       <tr class="table-active" style="">
      <th scope="row"><?=$respAttributeValues['nombre']?></th>
      <td><?=$tipo?></td>
    
      
      
      <td style="min-width:120px;" class="">
          <a href='<?=base_url?>Admin/?seccion=attributes&&action=edit&&id=<?=$respAttributeValues['id']?>'><i class="fa-solid fa-pen-to-square" style="cursor:pointer;color:white;font-size:20px;" ></i></a>
          <a class="delete-link" href='<?=base_url?>Admin/?seccion=attributes&&action=delete&&id=<?=$respAttributeValues['id']?>'><i class="fa-solid fa-trash" style="cursor:pointer;color:white;font-size:20px; margin-left:10px;"></i></a>
          <a href='<?=base_url?>Admin/?seccion=attributeValues&&id=<?=$respAttributeValues['id']?>&&description=<?=$respAttributeValues['nombre']?>'><i class="fa-solid fa-list-ol ml-2" style="cursor:pointer;color:white;font-size:20px;" ></i></a>

      </td>
      
    </tr>
      <?php
           }
      }
      ?>
   
  </tbody>
</table>
  
  </div>
  

    </div>
</div>

<script>
    $(".delete-link").click(
            function(event){
               event.preventDefault();
               Swal.fire({
        title: '¿Desea desea eliminar este atributo?',
        showCancelButton: true,
        denyButtonText: `Cancelar`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
             var href = $(this).attr('href');
             
             window.location.href = href
            console.log(href);
        } else if (result.isDenied) {
            Swal.fire('Cambio no realizado', '', 'info')
        }
    })
            });
    
     var imagenNombre = '';
     var IDProduct = '';
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




function eliminarCategoria(id){
       var parametros = {
        "id": parseInt(id, 10),
        "action-categories": "delete"
    };
    
    Swal.fire({
        title: '¿Desea desea eliminar esta promoción?',
        showCancelButton: true,
        denyButtonText: `Cancelar`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {

            $.ajax({
                url: "../controllers/categoriasController.php",
                type: "POST",
                datatype: "html",
                data: parametros,
                success: function (response) {
                    console.log(response);
                    if (response.status) {
                        Swal.fire(response.msn, '', 'success');
                        window.setTimeout(function () {
                            window.location.href = "./?seccion=categories"
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

        } else if (result.isDenied) {
            Swal.fire('Changes are not saved', '', 'info')
        }
    })
}
$(document).ready( function () {
       var editorAdded = false;
        $('#modalAgregar')
        .on('shown.bs.modal', (e) => {
            if(!editorAdded){
              CKEDITOR.replace('descripcion');
              editorAdded = true;
             }
        }); 
    $('#generalTable').DataTable({
        paging: true,
        ordering: true,
        info: true,
    });
} );


</script>


    
</div>


