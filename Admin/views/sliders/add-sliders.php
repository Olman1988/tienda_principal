<?php
?>
<section style="margin:auto;padding:20px;width:80%;min-width:300px;margin-top:50px;">
    <form id="formImages" action="./?seccion=sliders&&action=action-add" method="POST" enctype="multipart/form-data">
        <input type='hidden' name='action' value='action-add'>      
        <div class="row">
            <h2>Agregar Slider</h2>
            <div class="col-10"> 
                <div class="form-group mt-2">
                    <label for="titulo">Titulo</label>
                    <input required name="titulo" type="text" id="" value="" class="form-control"/>
                </div>
            </div>
            <div class="col-4">
                <label for="type">Tipo</label>
                <select id="type" name="type" class="form-control selectpicker show-tick">
                    <option style="border-radius:15px;" value='-1'>Seleccione</option>
                    <option style="border-radius:15px;" value='1'>Escritorio</option>
                    <option style="border-radius:15px;" value='3'>Dispositivo Móvil</option>
                </select>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="order">Orden</label>
                    <input required name="order" type="number" id="order" class="form-control" />
                </div>
            </div>
            <div class="col-8">
                <div class="form-group mt-2">
                    <label for="url">URL</label>
                    <input name="url" type="text" id="url"  class="form-control" />
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="reg-ln">Imagen Escritorio</label>   
                    <div class="container-input">
                    <input required type="file" name="file" id="file-1" value="" class="inputfile inputfile-1" data-multiple-caption="{count} archivos seleccionados" multiple />
                    <label for="file-1" style='max-width:200px;' class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="iborrainputfile" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg>
                    <span class="iborrainputfile " id="iborrainputfile">Subir Imagen</span>
                    </label>
                    </div>
                </div>
            </div>
        </div>
        <input class="btn btn-primary mt-4" type="submit" value="Guardar">
        <a class="btn btn-secondary mt-4" href="<?=base_url?>Admin/?seccion=sliders">Volver</a>
    </form>
</section>

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
</script>
  