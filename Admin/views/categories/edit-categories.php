<?php
?>
<section style="margin:auto;padding:20px;width:80%;min-width:300px;margin-top:50px;">
  <form id="formularioRegistro" action="./?seccion=categories&&action=action-edit" method="POST" enctype="multipart/form-data">
      <input type='hidden' name='action-categories' value='edit'>      
      <input type="hidden" name="id" value="<?=$_GET['id']?>">
      <div class="row">
                <h2>Editar Categoría</h2>
                <div class="col-6"> 
                   <div class="form-group">
                        <label for="reg-fn">Descripcion</label>
                        <input name="nombre" type="text" id="nombre" class="form-control" value='<?=$oneCategory['cat_Descripcion']?>' />
                    </div>
                </div>
                
                <div class="col-6">
                    <div class="form-group">
                        <label for="categoria">Categoría Padre</label>
                            <select id="categoria" name="categoriaPadre" class="form-control selectpicker show-tick">
                                 <option  style="border-radius:15px;" value='-1'>Seleccione</option>

                               <?php
                                     foreach ($responseAllCategories as $valueCategorias) {
                                     if($valueCategorias['cat_CodigoCategoria']!=$_GET['id']){  
                                     if($valueCategorias['cat_CodigoCategoria']!=$oneCategory['categoriaPadre']){

                                          ?>
                                <option class='optionCategory'  style="border-radius:15px;" value="<?=$valueCategorias['cat_CodigoCategoria']?>"><?=$valueCategorias['cat_Descripcion']?></option>
                               <?php
                                     }else{
                                         ?>
                                <option class='optionCategory'  style="border-radius:15px;" selected="selected" value="<?=$valueCategorias['cat_CodigoCategoria']?>"><?=$valueCategorias['cat_Descripcion']?></option>
                                        <?php
                                     }
                                     }
                                     }
                               ?>
                                 </select>
                    </div>
                </div>
                
                        <div class="col-6">
                            <div class="form-group">
                                <label for="reg-ln">Imagen</label>   
                                <div class="container-input">
                                    <?php
                                    
                                    $str = ucfirst(mb_substr($oneCategory['rutaImagen'], 24, null, 'UTF-8'));
                                    ?>
                                    <input type='hidden' name='filenameImg' value='<?=$str?>'>
                                    <input value='<?=$oneCategory['rutaImagen']?>' type="file" name="file" id="file-1" value="" class="inputfile inputfile-1" data-multiple-caption="{count} archivos seleccionados" multiple />
                                <label for="file-1" style='max-width:200px;' class="btn btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" class="iborrainputfile" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg>
                                <span class="iborrainputfile " id="iborrainputfile"><?=$str?></span>
                                </label>
                                    <label style="color:gray">Imagen Actual</label>
                                    <div style="width:130px;"><img style="width:100%" src="<?=base_url.$oneCategory['rutaImagen']?>" alt="alt"/></div>
                                </div>
                            </div>
                       </div>
                       <div class="row">
                        <div class="col-3 col-md-6 mt-4" style='padding-left:50px'>
                            <div class="form-check form-switch">
                                <input class="form-check-input" value='1' <?=$oneCategory['esServicio']=='1'? ' checked="checked"' : '';?> name='esServicio' type="checkbox" id="esServicio">
                                <label class="form-check-label" for="esServicio">Es Servicio</label>
                            </div>
                        </div>
                           
                        
                              <div class="col-3 col-md-6 mt-4" style='padding-left:50px'>
                            <div class="form-check form-switch">
                                <input class="form-check-input" <?=$oneCategory['visible']=='1'? ' checked="checked"' : '';?> value='1' name='visible' type="checkbox" id="masVendido">
                                <label class="form-check-label" for="visible">Visible</label>
                            </div>
                        </div>
                           </div>
                <div class="row">
                        <div class="col-3 col-md-6 mt-4" style='padding-left:50px'>
                            
                            <div class="form-check form-switch">
                                <input class="form-check-input" value='1' <?=$oneCategory['menu']=='1'? ' checked="checked"' : '';?> name='menu' type="checkbox" id="productoNuevo">
                                <label class="form-check-label" for="menu">Aparece en Menú</label>
                            </div>
                        </div>
                <div class="col-3 col-md-6 mt-4" style='padding-left:50px'>
                            <div class="form-check form-switch">
                                <input class="form-check-input" value='1' <?=$oneCategory['destacada']=='1'? ' checked="checked"' : '';?> name='destacado' type="checkbox" id="destacado">
                                <label class="form-check-label" for="destacado">Destacado</label>
                            </div>
                        </div>
                    
                   </div>
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
  



</script>
