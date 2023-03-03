<?php
?>
<section style="margin:auto;padding:20px;width:80%;min-width:300px;margin-top:50px;">
  <form id="formularioRegistro" action="./?seccion=products&&action=action-edit" method="POST" enctype="multipart/form-data">
      <input type='hidden' name='action' value='modificar'>      
      <input type="hidden" name="IDProduct" value="<?=$_GET['id']?>">
      <div class="row">
                <h2>Agregar Producto</h2>
                <div class="col-6"> 
                   <div class="form-group">
                        <label for="reg-fn">Nombre</label>
                        <input name="nombre" type="text" id="nombre" class="form-control" value='<?=$responseArticulo['art_Descripcion']?>' />
                        <span data-val-controltovalidate="" data-val-errormessage="" data-val-display="Dynamic" id="ContentPlaceHolder1_ctl00" class="text-danger" data-val="true" data-val-evaluationfunction="RequiredFieldValidatorEvaluateIsValid" data-val-initialvalue="" style="display:none;">Requerido.</span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="estadoProducto">Estado</label>
                            <select id="estadoProducto" name="estado" value='' class="form-control selectpicker show-tick">
                                
                                
                                <option  style="border-radius:15px;" value='-1'>Seleccione</option>
                                <option  style="border-radius:15px;" value='1' <?=$responseArticulo['activo']=='1'? ' selected="selected"' : '';?>>Activo</option>
                                <option  style="border-radius:15px;" value='0' <?=$responseArticulo['activo']=='0'? ' selected="selected"' : '';?>>Inactivo</option>
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
                                         
                                     if($valueCategorias['cat_CodigoCategoria']!=$responseArticulo['cat_CodigoCategoria_FK']){

                                          ?>
                                <option class='optionCategory'  style="border-radius:15px;" value="<?=$valueCategorias['cat_CodigoCategoria']?>"><?=$valueCategorias['cat_Descripcion']?></option>
                               <?php
                                     }else{
                                         ?>
                                <option class='optionCategory'  style="border-radius:15px;" selected="selected" value="<?=$valueCategorias['cat_CodigoCategoria']?>"><?=$valueCategorias['cat_Descripcion']?></option>
                                        <?php
                                     }
                               
                                     }
                               ?>
                                 </select>
                                      <span  class="text-danger" style="display:none;">Requerido.</span>

                    </div>
                </div>
                      <div class="col-6">
                            <div class="form-group">
                              <label for="reg-fn">Precio Unitario</label>
                              <input name="precio" type="number" value='<?=intval($responseArticulo['art_PrecioUnitario'])?>' id="precioUni" class="form-control"  />
                            </div>
                      </div>
                     <div class="col-6">
                            <div class="form-group">
                              <label for="reg-fn">Cantidad Mínima</label>
                              <input name="cantidadMinima" type="number" value='<?=intval($responseArticulo['art_Minimo'])?>' id="cantidadMinima" class="form-control"  />
                            </div>
                      </div>
                      <div class="col-6"> 
                            <div class="form-group">
                                <label for="sku">SKU</label>
                                <input name="sku" type="text" value="<?=$responseArticulo['sku']?>" id="sku" class="form-control"/>
                            </div>
                      </div>
                      <div class="col-6">
                            <div class="form-group">
                               <label for="tax">Impuesto</label>
                                  <select id="tax" name="tax" class="form-control selectpicker show-tick">
                                      <option  style="border-radius:15px;" value='0' <?=$responseArticulo['art_PorcentajeIV']==null||$responseArticulo['art_PorcentajeIV']==0?'selected':''?>>Exento</option>
                                      <option  style="border-radius:15px;" value='2' <?=intval($responseArticulo['art_PorcentajeIV'])==2?'selected':''?>>2%</option>
                                      <option  style="border-radius:15px;" value='4'<?=intval($responseArticulo['art_PorcentajeIV'])==4?'selected':''?>>4%</option>
                                      <option  style="border-radius:15px;" value='13' <?=intval($responseArticulo['art_PorcentajeIV'])==13?'selected':''?>>13%</option>
                                  </select>
                                <span  class="text-danger" style="display:none;">Requerido.</span>
                            </div>  
                       </div>
                       <div class="row">
                            <div class="col-3 col-md-6 mt-4" style='padding-left:50px'>
                                  <div class="form-check form-switch">
                                      <input class="form-check-input" value='1' name='taxRequired' <?=$responseArticulo['art_LlevaImpuesto']=='1'? ' checked="checked"' : '';?> type="checkbox" id="taxNeeded">
                                      <label class="form-check-label" for="taxRequired">Requiere Impuesto</label>
                                  </div>
                             </div>

                             <div class="col-3 col-md-6 mt-4" style='padding-left:50px'>
                                  <div class="form-check form-switch">
                                      <input class="form-check-input" value='1' name='taxIncluded' type="checkbox" id="taxIncluded" <?=$responseArticulo['IVAIncluido']=='1'? ' checked="checked"' : '';?>>
                                      <label class="form-check-label" for="taxIncluded">Impuesto Incluído en Precio</label>
                                  </div>
                             </div>
                       </div>   
                       <div class="col-12 mt-4">
                            <div class="form-group">
                              <label for="littledescription">Descripción Corta</label>
                              <input name="littledescription" value='<?=$responseArticulo['art_Observaciones']?>' type="text" id="littledescription" class="form-control"/>
                            </div>
                        </div>
                        
                        <div class="col-6">
                            <div class="form-group">
                                <label for="reg-ln">Imagen</label>   
                                <div class="container-input">
                                    <?php
                                    
                                    $str = ucfirst(mb_substr($responseArticulo['rutaImagen'], 22, null, 'UTF-8'));
                                    ?>
                                    <input type='hidden' name='filenameImg' value='<?=$str?>'>
                                    <input value='<?=$responseArticulo['rutaImagen']?>' type="file" name="file" id="file-1" value="" class="inputfile inputfile-1" data-multiple-caption="{count} archivos seleccionados" multiple />
                                <label for="file-1" style='max-width:200px;' class="btn btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" class="iborrainputfile" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg>
                                <span class="iborrainputfile " id="iborrainputfile"><?=$str?></span>
                                </label>
                                </div>
                            </div>
                       </div>
                        
                        
                       
                        <div class="col-12">
                            <div class="form-group">
                              <label for="reg-ln">Descripción Ampliada</label>
                              <textarea class='form-control' id="editor" name="descripcion" rows="5" cols="10"><?=$responseArticulo['descripcionAmpliada']?></textarea>
                            </div>
                        </div>
                        
                       
                              <div class="col-3 col-md-6 mt-4" style='padding-left:50px'>
                            <div class="form-check form-switch">
                                <input class="form-check-input" value='1' <?=$responseArticulo['esServicio']=='1'? ' checked="checked"' : '';?> name='esServicio' type="checkbox" id="esServicio">
                                <label class="form-check-label" for="esServicio">Es Servicio</label>
                            </div>
                        </div>
                           
                        
                              <div class="col-3 col-md-6 mt-4" style='padding-left:50px'>
                            <div class="form-check form-switch">
                                <input class="form-check-input" <?=$responseArticulo['masVendido']=='1'? ' checked="checked"' : '';?> value='1' name='masVendido' type="checkbox" id="masVendido">
                                <label class="form-check-label" for="masVendido">Mas Vendido</label>
                            </div>
                        </div>
                        <div class="col-3 col-md-6 mt-4" style='padding-left:50px'>
                            
                            <div class="form-check form-switch" style=''>
                                <input class="form-check-input" value='1' <?=$responseArticulo['nuevo']=='1'? ' checked="checked"' : '';?> name='productoNuevo' type="checkbox" id="productoNuevo">
                                <label class="form-check-label" for="productoNuevo">Nuevo</label>
                            </div>
                        </div>
                        
                         <div class="col-3 col-md-6 mt-4" style='padding-left:50px'>
                            <div class="form-check form-switch">
                                <input class="form-check-input" value='1' <?=$responseArticulo['mejorComentario']=='1'? ' checked="checked"' : '';?> name='mejorComentario' type="checkbox" id="mejorComentario">
                                <label class="form-check-label" for="mejorComentario">Mejor Comentario</label>
                            </div>
                        </div>
                <div class="col-3 col-md-6 mt-4" style='padding-left:50px'>
                            <div class="form-check form-switch">
                                <input class="form-check-input" value='1' <?=$responseArticulo['destacado']=='1'? ' checked="checked"' : '';?> name='destacado' type="checkbox" id="destacado">
                                <label class="form-check-label" for="destacado">Destacado</label>
                            </div>
                        </div>
                            
                       <div class="col-12 mt-4 ml-3">
                           
                           <label class="form-check-label" for="">Disponibilidad de Producto</label>
                            <div class="form-check">
                                <input class="form-check-input" value='compra' type="radio" name="disponibleCompraCotizacion" id="radio1" <?=$responseArticulo['disponibleCompra']=='1'||$responseArticulo['disponibleCotizacion']=='0'? ' checked="checked"' : '';?>>
                                <label class="form-check-label" for="radio1">
                                  Disponible Compra
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" value='cotizacion' type="radio" name="disponibleCompraCotizacion" id="radio2" <?=$responseArticulo['disponibleCotizacion']=='1'&&$responseArticulo['disponibleCompra']==0? ' checked="checked"' : '';?>>
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
