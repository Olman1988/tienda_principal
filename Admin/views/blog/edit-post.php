<?php
?>
<section style="margin:auto;padding:20px;width:80%;min-width:300px;margin-top:50px;">
    <form id="formularioRegistro" action="./?seccion=blog_section&&action=action-edit" method="POST" enctype="multipart/form-data">
        <input type='hidden' name='action-blog' value='edit'>      
        <input type="hidden" name="id" value="<?=$_GET['id']?>">
        <div class="row">
        <h2>Editar Post</h2>
        <div class="col-6"> 
            <div class="form-group">
                <label for="title">Titulo:</label>
                <input name="title" type="text" id="title" class="form-control" value='<?=$onePost['title']?>' />
            </div>
        </div>
        <div class="col-6"> 
            <div class="form-group">
                <label for="description">Descripcion:</label>
                <input name="description" type="text" id="description" class="form-control" value='<?=$onePost['description']?>' />
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
            <label for="reg-ln">Imagen</label>   
                <div class="container-input">
                    <?php
                        $str = ucfirst(mb_substr($onePost['photo'], 18, null, 'UTF-8'));
                    ?>
                    <input type='hidden' name='filenameImg' value='<?=$str?>'>
                    <input value='<?=$onePost['photo']?>' type="file" name="file" id="file-1" value="" class="inputfile inputfile-1" data-multiple-caption="{count} archivos seleccionados" multiple />
                <label for="file-1" style='max-width:200px;' class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" class="iborrainputfile" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg>
                <span class="iborrainputfile " id="iborrainputfile"><?=$str?></span>
                </label>
                    <label style="color:gray">Imagen Actual</label>
                    <div style="width:130px;"><img style="width:100%" src="<?=base_url.$onePost['photo']?>" alt="alt"/></div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="form-check form-switch">
                <input class="form-check-input" value='1' <?=$onePost['status']=='Active'? ' checked="checked"' : '';?> name='status' type="checkbox" id="status">
                <label class="form-check-label" for="status">Activo</label>
            </div>
        </div>
        <div class="col-12"> 
            <div class="form-group">
                <label for="content">Contenido</label>
                <textarea class='form-control' id="content" name="content" rows="5" cols="10"><?=$onePost['content']?></textarea>
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