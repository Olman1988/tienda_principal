<?php
?>
<div style="width:80%;margin-top:100px; min-width:320px;min-height:90vh;margin-bottom:100px;">
    <h2 class="text-center">Configuracion General</h2>
    <div class="col-lg-8 m-auto">
        <div class="m-auto" id="myContent">
            <div class="" id="main" style="padding-top:20px;">
                <form id="formularioRegistro" action="./?seccion=config_general&&action=action-edit" method="POST" enctype="multipart/form-data">
                    <input type='hidden' name='action-config' value='edit'>      
                    <input type="hidden" name="id" value="<?=$respuestaDatos['id']?>">
                    <div class="row">
                        <div class="col-6"> 
                            <div class="form-group">
                                <label for="HomeType">Home Type</label>
                                <select id="HomeType" name="HomeType" class="form-control selectpicker show-tick">
                                    <option style="border-radius:15px;" value='-1'>Seleccione</option>
                                    <option style="border-radius:15px;" value='Simple' <?=$respuestaDatos['HomeType']== 'Simple' ? 'selected': ''; ?>>Simple</option>
                                    <option style="border-radius:15px;" value='Categorias' <?=$respuestaDatos['HomeType']== 'Categorias' ? 'selected': ''; ?>>Categorias</option>
                                    <option style="border-radius:15px;" value='Slider' <?=$respuestaDatos['HomeType']== 'Slider' ? 'selected': ''; ?>>Slider</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <img style="height:10em;width:auto;" id="slider" src="<?=base_url?>/images/admin/config/slider.jpg">
                                <img style="height:10em;width:auto;" id="simple" src="<?=base_url?>/images/admin/config/simple.jpg">
                                <img style="height:10em;width:auto;" id="categories" src="<?=base_url?>/images/admin/config/categories.jpg">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="Tax">Valor impuesto:</label>
                                <input name="Tax" type="text" id="Tax" class="form-control" value='<?=$respuestaDatos['Tax']?>' />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="payment_method">Metodo de Pago:</label>
                                <input class="form-check-input" value='<?=$respuestaDatos['payment_active'];?>' <?=$respuestaDatos['payment_active']=='1'? ' checked="checked"' : '';?>  name='payment' type="checkbox" id="payment" style="margin-left:2%;">
                                <select id="payment_method" name="idPaymentType" class="form-control selectpicker show-tick">
                                    <?php foreach($metodos_pago as $metodo){ ?>
                                    <option style="border-radius:15px;" value='<?=$metodo['id']; ?>' <?=$respuestaDatos['idPaymentType']== $metodo['id'] ? 'selected': ''; ?>><?=$metodo['alias']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12" style="padding-left: 5%;">
                            <div class="form-check form-switch">
                                <input class="form-check-input" value='1' <?=$respuestaDatos['envio']=='1'? ' checked="checked"' : '';?>  name='envio' type="checkbox" id="envio">
                                <label class="form-check-label" for="envio">Hace envíos</label>
                            </div>
                        </div>
                        <div class="col-md-12" style="padding-left: 5%;">
                            <div class="form-check form-switch">
                                <input class="form-check-input" value='1' <?=$respuestaDatos['mostarPrecios']=='1'? ' checked="checked"' : '';?> name='mostarPrecios' type="checkbox" id="mostarPrecios">
                                <label class="form-check-label" for="mostarPrecios">Mostrar precios</label>
                            </div>
                        </div>
                        <div class="col-md-12" style="padding-left: 5%;">
                            <div class="form-check form-switch">
                                <input class="form-check-input" value='1' <?=$respuestaDatos['accesoAnonimo']=='1'? ' checked="checked"' : '';?> name='accesoAnonimo' type="checkbox" id="accesoAnonimo">
                                <label class="form-check-label" for="accesoAnonimo">Acceso Anónimo</label>
                            </div>
                        </div>
                        <div class="col-md-12" style="padding-left: 5%;">
                            <div class="form-check form-switch">
                                <input class="form-check-input" value='1' <?=$respuestaDatos['blog']=='1'? ' checked="checked"' : '';?> name='blog' type="checkbox" id="blog">
                                <label class="form-check-label" for="blog">Mostrar Blog</label>
                            </div>
                        </div>
                        <div class="col-md-12" style="padding-left: 5%;">
                            <div class="form-check form-switch">
                                <input class="form-check-input" value='1' <?=$respuestaDatos['preguntasFrecuentes']=='1'? ' checked="checked"' : '';?> name='preguntasFrecuentes' type="checkbox" id="preguntasFrecuentes">
                                <label class="form-check-label" for="preguntasFrecuentes">Preguntas frecuentes</label>
                            </div>
                        </div>
                    </div>
                    <input class="btn btn-primary mt-4" type="submit" value="Guardar Datos">
                </form>
            </div>
        </div>
    </div>
    <script>
        var payment = $('#payment').val();
        console.log(payment);

        if(payment == 0){
            $('#payment_method').prop('disabled', 'disabled');
        }else{
            $('#payment_method').prop('disabled', false);
        }

        $("#payment").change(function(){
            if($('#payment').prop( "checked" )){
                this.value = 1;  
                $('#payment_method').prop('disabled', false);
            }else{
                this.value = 0;
                $('#payment_method').prop('disabled', 'disabled');
            }
        });

        var imageSel = $('#HomeType').val();
        switch (imageSel) {
            case 'Simple':
                $('#categories').hide();
                $('#slider').hide();
                $('#simple').show();
            break;
            case 'Categorias':
                $('#simple').hide();
                $('#slider').hide();
                $('#categories').show();
            break;
            case 'Slider':
                $('#simple').hide();
                $('#categories').hide();
                $('#slider').show();
            break;
        }

        $('#HomeType').on('change', function() {
            switch (this.value) {
                case 'Simple':
                    $('#categories').hide();
                    $('#slider').hide();
                    $('#simple').show();
                break;
                case 'Categorias':
                    $('#simple').hide();
                    $('#slider').hide();
                    $('#categories').show();
                break;
                case 'Slider':
                    $('#simple').hide();
                    $('#categories').hide();
                    $('#slider').show();
                break;
            }
        });

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