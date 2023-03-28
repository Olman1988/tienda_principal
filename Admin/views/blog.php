<?php
?>
<div style="width:80%;margin-top:100px; min-width:320px;min-height:90vh;margin-bottom:100px;">
    <h2 class="text-center">Blog</h2>
    <div class="col-lg-8 m-auto">
        <div class="m-auto" id="myContent">
            <div class="" id="profile" style="padding-top:20px;">
                <button class="btn btn-primary"><a style="text-decoration: none;color:white;" href="<?= base_url ?>/Admin/?seccion=blog_section&&action=add">+Agregar</a></button>
                <table class="table" id='generalTable'>
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Titulo</th>
                            <th scope="col">Imagen</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col" style='min-width:150px'>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($respuestaBlogs) && count($respuestaBlogs) > 0) {
                            foreach ($respuestaBlogs as $respuestaBlogs) {
                        ?>
                            <tr class="table-active">
                                <th scope="row"><?= $respuestaBlogs['id'] ?></th>
                                <td><?= $respuestaBlogs['title'] ?></td>
                                <td><img style='width:100px' src="<?= base_url ?><?= $respuestaBlogs['photo'] ?>" alt="alt" /></td>
                                <td><?= $respuestaBlogs['status'] ?></td>
                                <td><?= $respuestaBlogs['description'] ?></td>
                                <td>
                                <td style="min-width:120px;">
                                    <a href='<?= base_url ?>Admin/?seccion=blog_section&&action=edit&&id=<?= $respuestaBlogs['id'] ?>'><i class="fa-solid fa-pen-to-square" style="cursor:pointer;color:white;font-size:20px;margin-left:75%;"></i></a>
                                    <i class="fa-solid fa-trash" style="cursor:pointer;color:white;font-size:20px; margin-left:10px;" onclick="eliminarPost('<?= $respuestaBlogs['id'] ?>')"></i>
                                </td>
                            </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        var imagenNombre = '';
        var IDProduct = '';
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
        function eliminarFAQ(id) {
            var parametros = {
                "id": parseInt(id, 10),
                "action": "borrar"
            };
            Swal.fire({
                title: '¿Desea desea eliminar esta FAQ?',
                showCancelButton: true,
                denyButtonText: `Cancelar`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({
                        url: "../controllers/faqController.php",
                        type: "POST",
                        datatype: "html",
                        data: parametros,
                        success: function(response) {
                            if (response) {
                                Swal.fire('Elemento eliminado con éxito!', '', 'success');
                                window.setTimeout(function() {
                                    window.location.href = "./?seccion=faq_section"
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
        $(document).ready(function() {
            var editorAdded = false;

            $('#modalAgregar')
                .on('shown.bs.modal', (e) => {
                    if (!editorAdded) {
                        CKEDITOR.replace('descripcion');
                        editorAdded = true;
                    }
                });
            $('#generalTable').DataTable({
                paging: true,
                ordering: true,
                info: true,
            });
        });
    </script>
</div>