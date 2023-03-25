<?php
?>
<section style="margin:auto;padding:20px;width:80%;min-width:300px;margin-top:50px;">
    <form id="formularioRegistro" action="./?seccion=attributeValues&&action=action-edit&&description=<?=$_GET['description']?>" method="POST" enctype="multipart/form-data">
      <input type='hidden' name='id' value='<?=$_GET['id']?>'>      
          <input type='hidden' name='idAtributoEspecial' value='<?=$respAttribute[0]['idAtributoEspecial']?>'>    
              <input type='hidden' name='descriptionGeneral' value='<?=$_GET['description']?>'>   
      <div class="row">
                <h2>Editar Valores para <?=$_GET['description']?></h2>
                <div class="col-6"> 
                   <div class="form-group">
                        <label for="reg-fn">Descripcion</label>
                        <input name="nombre" type="text" id="nombre" class="form-control" value='<?=$respAttribute[0]['valor']?>' />
                    </div>
                </div>
                <div class="col-6"> 
                   <div class="form-group">
                        <label for="reg-fn">Orden</label>
                        <input name="orden" type="number" id="nombre" class="form-control" value='<?=$respAttribute[0]['orden']?>' />
                    </div>
                </div>
                 <div class="col-6">
                            <div class="form-group">
                                <label for="reg-ln">Imagen</label>   
                                <div class="container-input">
                                    <?php
                                    
                                    $str = ucfirst(mb_substr($respAttribute[0]['foto'], 18, null, 'UTF-8'));
                                    ?>
                                    <input type='hidden' name='filenameImg' value='<?=$str?>'>
                                    <input value='<?=$respAttribute[0]['foto']?>' type="file" name="file" id="file-1" value="" class="inputfile inputfile-1" data-multiple-caption="{count} archivos seleccionados" multiple />
                                <label for="file-1" style='max-width:200px;' class="btn btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" class="iborrainputfile" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg>
                                <span class="iborrainputfile " id="iborrainputfile"><?=$str?></span>
                                </label>
                                    <div>
                                    <label style="color:gray">Imagen Actual</label>
                                    <div style="width:130px;"><img style="width:100%" src="<?=base_url.$respAttribute[0]['foto']?>" alt="alt"/></div>
                                </div>
                                    </div>
                            </div>
                       </div>
                <div class="form-group">
            <label for="exampleColorInput" class="form-label">Color</label>
            <?php
            if(isset($respAttribute[0]['cuadroColorRgb'])){
            ?>
            <input style="width:50px;padding:5px;border-radius:5px;" name="color" type="color" class="form-control form-control-color colorTitulo" id="exampleColorInput" value="<?=$respAttribute[0]['cuadroColorRgb']?>" title="Choose your color">
            <?php
            }else{
            ?>
                        <input style="width:50px;padding:5px;border-radius:5px;" name="color" type="color" class="form-control form-control-color colorTitulo" id="exampleColorInput" title="Choose your color">

             <?php
            }
            ?>
        </div>
<!--                <div class="col-6"> 
                   <div class="form-group">
                        <label for="reg-fn">Tipo de Control</label>
                        <select name="control" class="form-control">
                            <option value="-1">Seleccione</option>
                            <option value="PHOTOS">Imágenes</option>
                            <option value="SQUARECOLORS">Colores</option>
                            <option value="DROPDOWN">Lista</option>
                        </select>
                    </div>
                </div>-->
                
<!--                <div class="col-6">
                    <div class="form-group">
                        <label for="categoria">Tipo de Control</label>
                            <select id="categoria" name="tipoControl" class="form-control selectpicker show-tick">
                                 <option  style="border-radius:15px;" value='-1'>Seleccione</option>
                                 <option  style="border-radius:15px;" value='PHOTOS'>Seleccione</option>
                                 <option  style="border-radius:15px;" value='SQUARECOLORS'>Seleccione</option>
                                 <option  style="border-radius:15px;" value='-1'>Seleccione</option>
                                 </select>
                    </div>
                </div>-->
               
              
                </div>
                  <input class="btn btn-primary mt-4" type="submit" value="Guardar">
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

