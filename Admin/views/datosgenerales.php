<?php
?>
<div style="width:80%;margin-top:100px; min-width:320px;min-height:90vh;margin-bottom:100px;">
    <h2 class="text-center">Datos Generales</h2>
    <div class="col-lg-8 m-auto">
        <div class="m-auto" id="myContent">
            <div class="" id="profile" style="padding-top:20px;">
                
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
        function eliminarPromo(id) {
            var parametros = {
                "idPromo": parseInt(id, 10),
                "action": "borrar"
            };
            Swal.fire({
                title: '¿Desea desea eliminar esta promoción?',
                showCancelButton: true,
                denyButtonText: `Cancelar`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({
                        url: "../controllers/articulosController.php",
                        type: "POST",
                        datatype: "html",
                        data: parametros,
                        success: function(response) {
                            if (response) {
                                Swal.fire('Elemento eliminado con éxito!', '', 'success');
                                window.setTimeout(function() {
                                    window.location.href = "./?seccion=products"
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