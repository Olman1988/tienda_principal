<?php
?>
<div style="width:80%;margin-top:100px; min-width:320px;min-height:90vh;margin-bottom:100px;">
    <h2 class="text-center">Categorías</h2>
    <div class="col-lg-8 m-auto">

<div class="m-auto" id="myContent">
 
  <div class="" id="profile" style="padding-top:20px;">
      <button class="btn btn-primary"><a style="text-decoration: none;color:white;" href="<?=base_url?>Admin/?seccion=categories&&action=add">+Agregar</a></button>
      <table class="table" id='generalTable'>
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Imagen</th>
      <th scope="col">Categoria Padre</th>
      <th scope="col">Tipo</th>    
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
      <?php
      if(isset($respCategories)&&count($respCategories)>0){
          foreach ($respCategories as $respCategoriesValues) {
              
          
      ?>
       <tr class="table-active" style="">
      <th scope="row"><?=$respCategoriesValues['cat_CodigoCategoria']?></th>
      
      <td><?=$respCategoriesValues['cat_Descripcion']?></td>
      <td><img style='width:100px' src="<?=base_url?><?=$respCategoriesValues['rutaImagen']?>" alt="alt"/></td>
      <td><?=$respCategoriesValues['Padre']?></td>
      <td>
        <?php if($respCategoriesValues['esServicio']){
            echo "Servicio";
        } else {
            echo "Producto";
        }
                
                ?> 
      </td>
      
      
      <td style="min-width:120px;" class="">
          <a href='<?=base_url?>Admin/?seccion=categories&&action=edit&&id=<?=$respCategoriesValues['cat_CodigoCategoria']?>'><i class="fa-solid fa-pen-to-square" style="cursor:pointer;color:white;font-size:20px;" ></i></a>
          <i class="fa-solid fa-trash" style="cursor:pointer;color:white;font-size:20px; margin-left:10px;" onclick="eliminarCategoria('<?=$respCategoriesValues['cat_CodigoCategoria']?>')"></i>
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


