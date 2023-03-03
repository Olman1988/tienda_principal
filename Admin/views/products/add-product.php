<?php
?>
<section style="margin:auto;padding:20px;width:80%;min-width:300px;margin-top:50px;">
  <form id="formularioRegistro" action="./?seccion=products&&action=action-add" method="POST" enctype="multipart/form-data">
      <input type='hidden' name='action' value='agregar'>      
      <div class="row">
                <h2>Agregar Producto</h2>
                <div class="col-6"> 
                   <div class="form-group">
                        <label for="reg-fn">Nombre</label>
                        <input name="nombre" type="text" id="nombre" class="form-control"  />
                        <span data-val-controltovalidate="" data-val-errormessage="" data-val-display="Dynamic" id="ContentPlaceHolder1_ctl00" class="text-danger" data-val="true" data-val-evaluationfunction="RequiredFieldValidatorEvaluateIsValid" data-val-initialvalue="" style="display:none;">Requerido.</span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="estadoProducto">Estado</label>
                            <select id="estadoProducto" name="estado" class="form-control selectpicker show-tick">
                                <option  style="border-radius:15px;" value='-1'>Seleccione</option>
                                <option  style="border-radius:15px;" value='1'>Activo</option>
                                <option  style="border-radius:15px;" value='0'>Inactivo</option>
                            </select>
                            <span  class="text-danger" style="display:none;">Requerido.</span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="categoria">Categorías</label>
                            <select id="categoria" name="categoria" class="form-control selectpicker show-tick">
                                 <option  style="border-radius:15px;" value='-1'>Seleccione</option>

                               <?php
                                     foreach ($respuestaCategorias as $valueCategorias) {
                                         
                                     
                               ?>
                                <option class='optionCategory'  style="border-radius:15px;" value="<?=$valueCategorias['cat_CodigoCategoria']?>"><?=$valueCategorias['cat_Descripcion']?></option>
                               <?php
                               
                                     }
                               ?>
                                 </select>
                                      <span  class="text-danger" style="display:none;">Requerido.</span>

                    </div>
                </div>
                <div class="col-6">
                        <div class="form-group">
                          <label for="reg-fn">Precio Unitario</label>
                          <input name="precio" type="number" id="precioUni" class="form-control"  />
                        </div>
                      </div>
                     <div class="col-6">
                        <div class="form-group">
                          <label for="reg-fn">Cantidad Mínima</label>
                          <input name="cantidadMinima" type="number" id="cantidadMinima" class="form-control"  />
                        </div>
                      </div>
                      <div class="col-6"> 
                            <div class="form-group">
                                <label for="sku">SKU</label>
                                <input name="sku" type="text" id="sku" class="form-control"  />
                            </div>
                      </div>
                      <div class="col-6">
                            <div class="form-group">
                               <label for="tax">Impuesto</label>
                                  <select id="tax" name="tax" class="form-control selectpicker show-tick">
                                      <option  style="border-radius:15px;" value='0'>Exento</option>
                                      <option  style="border-radius:15px;" value='2'>2%</option>
                                      <option  style="border-radius:15px;" value='4'>4%</option>
                                      <option  style="border-radius:15px;" value='13'>13%</option>
                                  </select>
                                <span  class="text-danger" style="display:none;">Requerido.</span>
                            </div>  
                       </div>
                       <div class="row">
                            <div class="col-3 col-md-6 mt-4" style='padding-left:50px'>
                                  <div class="form-check form-switch">
                                      <input class="form-check-input" value='1' name='taxRequired' type="checkbox" id="taxNeeded">
                                      <label class="form-check-label" for="taxRequired">Requiere Impuesto</label>
                                  </div>
                             </div>

                             <div class="col-3 col-md-6 mt-4" style='padding-left:50px'>
                                  <div class="form-check form-switch">
                                      <input class="form-check-input" value='1' name='taxIncluded' type="checkbox" id="taxIncluded">
                                      <label class="form-check-label" for="taxIncluded">Impuesto Incluído en Precio</label>
                                  </div>
                             </div>
                       </div>   
                       <div class="col-12 mt-4">
                            <div class="form-group">
                              <label for="littledescription">Descripción Corta</label>
                              <input name="littledescription" type="text" id="littledescription" class="form-control"/>
                            </div>
                        </div>
                       
                        <div class="row">
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
                        </div>
                        
                       
                        <div class="col-12">
                            <div class="form-group">
                              <label for="reg-ln">Descripción Ampliada</label>
                              <textarea class='form-control' id="editor" name="descripcion" rows="5" cols="10"></textarea>
                            </div>
                        </div>
                        
                       
                        <div class="col-3 col-md-6 mt-4" style='padding-left:50px'>
                            <div class="form-check form-switch">
                                <input class="form-check-input" value='1' name='esServicio' type="checkbox" id="esServicio">
                                <label class="form-check-label" for="esServicio">Es Servicio</label>
                            </div>
                        </div>
                           
                        
                              <div class="col-3 col-md-6 mt-4" style='padding-left:50px'>
                            <div class="form-check form-switch">
                                <input class="form-check-input" value='1' name='masVendido' type="checkbox" id="masVendido">
                                <label class="form-check-label" for="masVendido">Mas Vendido</label>
                            </div>
                        </div>
                        <div class="col-3 col-md-6 mt-4" style='padding-left:50px'>
                            
                            <div class="form-check form-switch" style=''>
                                <input class="form-check-input" value='1' name='productoNuevo' type="checkbox" id="productoNuevo">
                                <label class="form-check-label" for="productoNuevo">Nuevo</label>
                            </div>
                        </div>
                        
                         <div class="col-3 col-md-6 mt-4" style='padding-left:50px'>
                            <div class="form-check form-switch">
                                <input class="form-check-input" value='1' name='mejorComentario' type="checkbox" id="mejorComentario">
                                <label class="form-check-label" for="mejorComentario">Mejor Comentario</label>
                            </div>
                        </div>
                        <div class="col-3 col-md-6 mt-4" style='padding-left:50px'>
                            <div class="form-check form-switch">
                                <input class="form-check-input" value='1' name='destacado' type="checkbox" id="destacado">
                                <label class="form-check-label" for="destacado">Destacado</label>
                            </div>
                        </div>
                       <div class="col-12 mt-4 ml-3">
                           
                           <label class="form-check-label" for="">Disponibilidad de Producto</label>
                            <div class="form-check">
                                <input class="form-check-input" value='compra' type="radio" name="disponibleCompraCotizacion" id="radio1" checked>
                                <label class="form-check-label" for="radio1">
                                  Disponible Compra
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" value='cotizacion' type="radio" name="disponibleCompraCotizacion" id="radio2">
                                <label class="form-check-label" for="radio2">
                                  Disponible Cotización
                                </label>
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
