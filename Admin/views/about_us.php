<?php
?>
<style>
td{
    max-width: 100px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}
</style>
<div style="width:80%;margin-top:100px; min-width:320px;min-height:90vh;margin-bottom:100px;">
    <h2 class="text-center">Acerca de</h2>
    <div class="col-lg-8 m-auto">
        <div class="m-auto" id="myContent">
            <div class="" id="profile" style="padding-top:20px;">
                <table class="table" id='generalTable'>
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Activo</th>
                            <th scope="col">Orden</th>
                            <th scope="col" style='min-width:150px'>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    if(isset($respuestaFAQ) && count($respuestaFAQ) > 0){ foreach($respuestaFAQ as $respuesta){ ?>
                        <tr class="table-active">
                            <th scope="row"><?= $respuesta['codigo'] ?></th>
                            <td><?= $respuesta['nombre'] ?></td>
                            <td style="max-width: 250px;"><?= ($respuesta['activo'] == 1) ? '<i class="fa-solid fa-check"></i>' : '<i class="fa-solid fa-x"></i>' ?></td>
                            <td><?= $respuesta['orden'] ?></td>
                            <td style="min-width:120px;" class="text-center">
                                <a href='<?= base_url ?>Admin/?seccion=about_us&&action=edit&&id=<?= $respuesta['codigo'] ?>'><i class="fa-solid fa-pen-to-square" style="cursor:pointer;color:white;font-size:20px;margin-left:10px;"></i></a>
                            </td>
                        </tr>
                    <?php }} ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            (function(document, window, index) {
                var inputs = document.querySelectorAll('.inputfile');
                Array.prototype.forEach.call(inputs, function(input) {
                    var label = input.nextElementSibling,
                        labelVal = label.innerHTML;

                    input.addEventListener('change', function(e) {
                        var fileName = '';
                        if (this.files && this.files.length > 1)
                            fileName = (this.getAttribute('data-multiple-caption') || '').replace('{count}', this.files.length);
                        else
                            fileName = e.target.value.split('\\').pop();

                        if (fileName)
                            label.querySelector('span').innerHTML = fileName;
                        else
                            label.innerHTML = labelVal;
                    });
                });
            }(document, window, 0));
        });
        $(document).ready(function() {
            var editorAdded = false;
            $('#generalTable').DataTable({
                paging: true,
                ordering: true,
                info: true,
            });
        });
    </script>
</div>