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
              <button class="btn btn-primary"><a style="text-decoration: none;color:white;" href="<?=base_url?>Admin/?seccion=about_us&&action=add">+Agregar</a></button>
     
            <div class="" id="profile" style="padding-top:20px;">
                <table class="table" id='generalTable'>
                    <thead>
                        <tr>
                            <th scope="col">Código</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Activo</th>
                            <th scope="col">Orden</th>
                            <th scope="col" style='min-width:150px'>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    if(isset($respuestaDatos) && count($respuestaDatos) > 0){ foreach($respuestaDatos as $respuesta){ 
                       ?>
                        <tr class="table-active">
                            <td ><?= $respuesta['codigo'] ?></td>
                            <td><?= $respuesta['nombre'] ?></td>
                            <td style="max-width: 250px;"><?= ($respuesta['activo'] == 1) ? '<i class="fa-solid fa-check"></i>' : '<i class="fa-solid fa-x"></i>' ?></td>
                            <td><?= $respuesta['orden'] ?></td>
                            <td style="min-width:120px;" class="text-center">
                                <a href='<?= base_url ?>Admin/?seccion=about_us&&action=edit&&id=<?= $respuesta['codigo'] ?>'><i class="fa-solid fa-pen-to-square" style="cursor:pointer;color:white;font-size:20px;margin-left:10px;"></i></a>
                           <i class="fa-solid fa-trash" style="cursor:pointer;color:white;font-size:20px; margin-left:10px;" onclick="eliminarPage('<?= $respuesta['codigo'] ?>')"></i>
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
        
        function eliminarPage(code) {
            var parametros = {
                "code": code,
                "action-edit": "delete"
            };
            Swal.fire({
                title: '¿Desea desea eliminar esta página?',
                showCancelButton: true,
                denyButtonText: `Cancelar`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({
                        url: "../controllers/aboutusController.php",
                        type: "POST",
                        datatype: "html",
                        data: parametros,
                        success: function(response) {
                            console.log(response);
                            if (response) {
                                Swal.fire('Elemento eliminado con éxito!', '', 'success');
                                window.setTimeout(function() {
                                  window.location.href = "./?seccion=about_us"
                                }, 2000);
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'No fue posible eliminar los datos, intente nuevamente!',
                                    footer: '',

                                })
                            }
                        }
                    });
                } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'info')
                }
            })
        }
    </script>
</div>