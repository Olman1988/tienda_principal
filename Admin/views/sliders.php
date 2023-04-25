<div style="width:80%;margin-top:100px; min-width:320px;min-height:90vh;margin-bottom:100px;">
    <h2 class="text-center">Slider</h2>
    <div class="col-lg-8 m-auto">

<div class="m-auto" id="myContent">
 
    <div class="" id="profile" style="padding-top:20px;">
        <button class="btn btn-primary"><a style="text-decoration: none;color:white;" href="<?=base_url?>Admin/?seccion=sliders&&action=add">+Agregar</a></button>
        <table class="table" id='generalTable'>
    <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Imagen</th>
        <th scope="col">Url</th>
        <th scope="col">Orden</th>
        <th scope="col">Tipo</th>
        <th scope="col">Estado</th>   
        <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if(isset($respSliders)&&count($respSliders)>0){
            foreach ($respSliders as $respSlidersValues) {
        ?>
        <tr class="table-active">
            <td><?=$respSlidersValues['id']?></td>
            <td><img style='width:100px' src="<?=base_url?><?=$respSlidersValues['sliderPath']?>" alt="alt"/></td>
            <td><?=$respSlidersValues['url']?></td>
            <td><?=$respSlidersValues['order']?></td>
            <?php
            $sliderPath = '';
            switch ($respSlidersValues['type']){
                case '1':
                    $sliderPath = 'Escritorio';
                break;
                case '2':
                    $sliderPath = 'Dispositivo Movil';
                break;
                case '3':
                    $sliderPath = 'Con Movimiento';
                break;
            }
            ?>
            <td><?=$sliderPath?></td>
            <td>
                <?php if($respSlidersValues['Status'] == 1){
                        echo "Activo";
                    } else {
                        echo "Inactivo";
                    }
                ?> 
            </td>
            <td style="min-width:120px;" class="">
                <a href='<?=base_url?>Admin/?seccion=sliders&&action=edit&&id=<?=$respSlidersValues['id']?>'><i class="fa-solid fa-pen-to-square" style="cursor:pointer;color:white;font-size:20px;" ></i></a>
                <i class="fa-solid fa-trash" style="cursor:pointer;color:white;font-size:20px; margin-left:10px;" onclick="eliminarCategoria('<?=$respSlidersValues['id']?>')"></i>
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
        "action": "delete"
    };
    
    Swal.fire({
        title: '¿Desea desea eliminar esta promoción?',
        showCancelButton: true,
        denyButtonText: `Cancelar`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {

            $.ajax({
                url: "../controllers/slidersController.php",
                type: "POST",
                datatype: "html",
                data: parametros,
                success: function (response) {
                    console.log(response);
                    if (response.status) {
                        Swal.fire(response.msn, '', 'success');
                        window.setTimeout(function () {
                            window.location.href = "./?seccion=sliders"
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
