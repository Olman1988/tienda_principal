<?php
?>
<div style="width:80%;margin-top:100px; min-width:320px;min-height:90vh;margin-bottom:100px;">
    <h2 class="text-center">Productos</h2>
    <div class="col-lg-8 m-auto">

<div class="m-auto" id="myContent">
 
  <div class="" id="profile" style="padding-top:20px;">
      <button class="btn btn-primary"><a style="text-decoration: none;color:white;" href="<?=base_url?>/Admin/?seccion=products&&action=add">+Agregar</a></button>
      <table class="table" id='generalTable'>
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Imagen</th>
      <th scope="col">Categoria</th>
      <th scope="col">Precio</th>      
      <th scope="col">Tipo</th>    
      <th scope="col">SKU</th>   
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
      <?php
      if(isset($respuestaProductos)&&count($respuestaProductos)>0){
          foreach ($respuestaProductos as $respuestaProductos) {
              
          
      ?>
       <tr class="table-active" style="">
      <th scope="row"><?=$respuestaProductos['art_CodigoArticulo']?></th>
      
      <td><?=$respuestaProductos['art_Descripcion']?></td>
      <td><img style='width:100px' src="<?=base_url?><?=$respuestaProductos['rutaImagen']?>" alt="alt"/></td>
      <td><?=$respuestaProductos['categoria']?></td>
      <td><?=intval($respuestaProductos['art_PrecioUnitario'])?></td>
      <td>
        <?php if($respuestaProductos['esServicio']){
            echo "Servicio";
        } else {
            echo "Producto";
        }
                
                ?> 
      </td>
      <td><?=$respuestaProductos['sku']?></td>
      
      <td style="min-width:120px;" class="">
          <a href='<?=base_url?>/Admin/?seccion=products&&action=edit&&id=<?=$respuestaProductos['art_CodigoArticulo']?>'><i class="fa-solid fa-pen-to-square" style="cursor:pointer;color:white;font-size:20px;" ></i></a>
          <i class="fa-solid fa-trash" style="cursor:pointer;color:white;font-size:20px; margin-left:10px;" onclick="eliminarPromo('<?=$respuestaProductos['art_CodigoArticulo']?>')"></i>
           <a style="margin-left:10px;" href="<?=base_url?>/Admin/?seccion=images&&id=<?=$respuestaProductos['art_CodigoArticulo']?>&&Articulo=<?=$respuestaProductos['art_Descripcion']?>"><i class="fa-solid fa-image" style="cursor:pointer;color:white;font-size:20px;"></i></a>
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
                url: "../controllers/articulosController.php",
                type: "POST",
                datatype: "html",
                data: parametros,
                success: function (response) {
                    if (response) {
                        Swal.fire('Elemento eliminado con éxito!', '', 'success');
                        window.setTimeout(function () {
                            window.location.href = "./?seccion=products"
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