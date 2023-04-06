<?php
?>
<div style="width:80%;margin-top:100px; min-width:320px;min-height:90vh;margin-bottom:100px;">
    <h2 class="text-center">Perfil de la Tienda</h2>
    <div class="col-lg-8 m-auto">
        <div class="m-auto" id="myContent">
            <div class="" id="profile" style="padding-top:20px;">
                <form id="formularioRegistro" action="./?seccion=perfil_tienda&&action=action-edit" method="POST" enctype="multipart/form-data">
                    <input type='hidden' name='action-perfil' value='edit'>      
                    <input type="hidden" name="id" value="<?=$respuestaDatos['id']?>">
                    <div class="row">
                        <h2>Datos del Perfil</h2>
                        <div class="col-12"> 
                            <div class="form-group">
                                <label for="name">Nombre:</label>
                                <input name="name" type="text" id="name" class="form-control" value='<?=$respuestaDatos['name']?>' />
                            </div>
                        </div>
                        <div class="col-12"> 
                            <div class="form-group">
                                <label for="storeUrl">URL:</label>
                                <input name="storeUrl" type="text" id="storeUrl" class="form-control" value='<?=$respuestaDatos['storeUrl']?>' />
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                            <label for="reg-ln">Logo</label>   
                                <div class="container-input">
                                    <?php
                                        $str = ucfirst(mb_substr($respuestaDatos['logo'], 19, null, 'UTF-8'));
                                    ?>
                                    <input type='hidden' name='filenameImg' value='<?=$str?>'>
                                    <input value='<?=$respuestaDatos['logo']?>' type="file" name="file" id="file-1" value="" class="inputfile inputfile-1" data-multiple-caption="{count} archivos seleccionados" multiple />
                                    <label for="file-1" style='max-width:200px;' class="btn btn-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="iborrainputfile" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg>
                                        <span class="iborrainputfile " id="iborrainputfile"><?=$str?></span>
                                    </label>
                                    <label style="color:gray">Imagen Actual</label>
                                    <div style="width:130px;"><img style="width:100%" src="<?=base_url.trim($respuestaDatos['logo'])?>" alt="alt"/></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12"> 
                            <div class="form-group">
                                <label for="address">Direccion</label>
                                <textarea class='form-control' id="address" name="address" rows="5" cols="10"><?=$respuestaDatos['address']?></textarea>
                            </div>
                        </div>
                        <div class="col-12"> 
                            <div class="form-group">
                                <label for="mapsEmbeded">Geo Localizacion:</label>
                                <input name="mapsEmbeded" type="text" id="mapsEmbeded" class="form-control" value='<?=$respuestaDatos['mapsEmbeded']?>' />
                            </div>
                        </div>
                        <div class="col-6"> 
                            <div class="form-group">
                                <label for="latitude">Latitud:</label>
                                <input name="latitude" type="text" id="latitude" class="form-control" value='<?=$respuestaDatos['latitude']?>' />
                            </div>
                        </div>
                        <div class="col-6"> 
                            <div class="form-group">
                                <label for="longitude">Longitud:</label>
                                <input name="longitude" type="text" id="longitude" class="form-control" value='<?=$respuestaDatos['longitude']?>' />
                            </div>
                        </div>
                        <div class="col-6"> 
                            <div class="col-8"> 
                                <div class="form-group">
                                    <input class="btn btn-primary mt-4" type="button" value="Obtener ubicación" id="getLocation">
                                </div>
                            </div>
                        </div>
                        <div class="col-12"> 
                            <div class="form-group">
                                <label for="phone">Telefono:</label>
                                <input name="phone" type="text" id="phone" class="form-control" value='<?=$respuestaDatos['phone']?>' />
                            </div>
                        </div>
                        <div class="col-12"> 
                            <div class="form-group">
                                <label for="mobile">Movil:</label>
                                <input name="mobile" type="text" id="mobile" class="form-control" value='<?=$respuestaDatos['mobile']?>' />
                            </div>
                        </div>
                        <div class="col-12">
                            <hr/>
                        </div>
                        <div class="col-12"> 
                            <div class="form-group">
                                <label for="infoEmail">Correo de información:</label>
                                <input name="infoEmail" type="text" id="infoEmail" class="form-control" value='<?=$respuestaDatos['infoEmail']?>' />
                            </div>
                        </div>
                        <div class="col-12"> 
                            <div class="form-group">
                                <label for="supportEmail">Correo de soporte:</label>
                                <input name="supportEmail" type="text" id="supportEmail" class="form-control" value='<?=$respuestaDatos['supportEmail']?>' />
                            </div>
                        </div>
                        <div class="col-12">
                            <hr/>
                        </div>
                        <h2 class="text-center">Redes Sociales</h2>
                        <div class="col-12"> 
                            <div class="form-group">
                                <label for="whatsApp">WhatsApp:</label>
                                <input name="whatsApp" type="text" id="whatsApp" class="form-control" value='<?=$respuestaDatos['whatsApp']?>' />
                            </div>
                        </div>
                        <div class="col-12"> 
                            <div class="form-group">
                                <label for="facebook">Facebook:</label>
                                <input name="facebook" type="text" id="facebook" class="form-control" value='<?=$respuestaDatos['facebook']?>' />
                            </div>
                        </div>
                        <div class="col-12"> 
                            <div class="form-group">
                                <label for="linkedin">LinkedIn:</label>
                                <input name="linkedin" type="text" id="linkedin" class="form-control" value='<?=$respuestaDatos['linkedin']?>' />
                            </div>
                        </div>
                        <div class="col-12"> 
                            <div class="form-group">
                                <label for="twitter">Twitter:</label>
                                <input name="twitter" type="text" id="twitter" class="form-control" value='<?=$respuestaDatos['twitter']?>' />
                            </div>
                        </div>
                        <div class="col-12"> 
                            <div class="form-group">
                                <label for="instagram">Instagram:</label>
                                <input name="instagram" type="text" id="instagram" class="form-control" value='<?=$respuestaDatos['instagram']?>' />
                            </div>
                        </div>
                        <div class="col-12"> 
                            <div class="form-group">
                                <label for="pinterest">Pinterest:</label>
                                <input name="pinterest" type="text" id="pinterest" class="form-control" value='<?=$respuestaDatos['pinterest']?>' />
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="youtube">YouTube:</label>
                                <input name="youtube" type="text" id="youtube" class="form-control" value='<?=$respuestaDatos['youtube']?>' />
                            </div>
                        </div>
                    </div>
                    <input class="btn btn-primary mt-4" type="submit" value="Actualizar Perfil">
                </form>
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
        const successCallback = (position) => {
            if(position.coords.latitude != null && position.coords.latitude != undefined){
                $('#latitude').val(position.coords.latitude);
            }
            if(position.coords.longitude != null && position.coords.longitude != undefined){
                $('#longitude').val(position.coords.longitude);
            }
        };

        const errorCallback = (error) => {
            console.log(error);
        };

        $('#getLocation').click(function() {
            navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
        });
    </script>
</div>