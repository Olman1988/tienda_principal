<?php
?>
<section style="margin:auto;padding:20px;width:80%;min-width:300px;margin-top:50px;">
    <form id="formularioRegistro" action="./?seccion=about_us&&action=action-edit" method="POST" enctype="multipart/form-data">
        <input type='hidden' name='action-faq' value='edit'>      
        <input type="hidden" name="id" value="<?=$_GET['id']?>">
        <div class="row">
        <i class="fa-solid fa-store"></i><h2>Mantenimiento</h2>
        <div class="col-8"> 
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input name="nombre" type="text" id="nombre" class="form-control" value='<?=$oneFAQ['nombre']?>' />
            </div>
        </div>
        <div class="col-4">
            <div class="col-12">
                <div class="col-6"> 
                    <div class="form-group">
                        <label for="orden">Orden</label>
                        <input name="orden" type="number" id="orden" min="1" class="form-control" value='<?=$oneFAQ['orden']?>' />
                    </div>
                </div>
                <div class="col-6"> 
                    <div class="form-group">
                        <input class="form-check-input" value='1' <?=$respuestaDatos['activo']=='1'? ' checked="checked"' : '';?> name='activo' type="checkbox" id="activo">
                        <label class="form-check-label" for="activo">Activo</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12"> 
            <div class="form-group">
                <label for="editor">Contenido</label>
                <textarea class='form-control' id="editor" name="contenido" rows="5" cols="10"><?=$oneFAQ['contenido']?></textarea>
            </div>
        </div>
        <input class="btn btn-primary mt-4" type="submit" value="Guardar">
    </form>
</section>
<script>
    $(document).ready(function(){
        ;( function ( document, window, index ){
        var inputs = document.querySelectorAll( '.inputfile' );
        Array.prototype.forEach.call( inputs, function( input ){
            var label	 = input.nextElementSibling,
            labelVal = label.innerHTML;

            input.addEventListener( 'change', function( e ){
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