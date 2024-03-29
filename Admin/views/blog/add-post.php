<?php
?>
<section style="margin:auto;padding:20px;width:80%;min-width:300px;margin-top:50px;">
    <form id="formularioRegistro" action="./?seccion=blog_section&&action=action-add" method="POST" enctype="multipart/form-data">
        <input type='hidden' name='action-blog' value='add'>      
        <div class="row">
            <h2>Agregar Post</h2>
            <?php
                $str = '';
            ?>
            <div class="col-6"> 
                <div class="form-group">
                    <label for="title">Titulo:</label>
                    <input name="title" type="text" id="title" class="form-control" value='' />
                </div>
            </div>
            <div class="col-6"> 
                <div class="form-group">
                    <label for="description">Descripcion:</label>
                    <input name="description" type="text" id="description" class="form-control" value='' />
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="reg-ln">Imagen</label>   
                    <div class="container-input">
                        <input type='hidden' name='filenameImg' value='<?=$str?>'>
                        <input value='' type="file" name="file" id="file-1" value="" class="inputfile inputfile-1" data-multiple-caption="{count} archivos seleccionados" multiple />
                        <label for="file-1" style='max-width:200px;' class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" class="iborrainputfile" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg>
                            <span class="iborrainputfile " id="iborrainputfile">Subir imagen</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-12"> 
                <div class="form-group">
                    <label for="content">Contenido</label>
                    <textarea class='form-control' id="content" name="content" rows="5" cols="10"></textarea>
                </div>
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