<?php
?>
<section style="margin:auto;padding:20px;width:80%;min-width:300px;margin-top:50px;">
  <form id="formularioRegistro" action="./?seccion=attributes&&action=action-add" method="POST" enctype="multipart/form-data">
      <input type='hidden' name='action-attributes' value='add'>      
      <div class="row">
                <h2>Agregar Atributos</h2>
                <div class="col-6"> 
                   <div class="form-group">
                        <label for="reg-fn">Descripcion</label>
                        <input name="nombre" type="text" id="nombre" class="form-control" value='' />
                    </div>
                </div>
                <div class="col-6"> 
                   <div class="form-group">
                        <label for="reg-fn">Tipo de Control</label>
                        <select name="control" class="form-control">
                            <option value="-1">Seleccione</option>
                            <option value="PHOTOS">Imágenes</option>
                            <option value="SQUARECOLORS">Colores</option>
                            <option value="DROPDOWN">Lista</option>
                        </select>
                    </div>
                </div>
                
<!--                <div class="col-6">
                    <div class="form-group">
                        <label for="categoria">Tipo de Control</label>
                            <select id="categoria" name="tipoControl" class="form-control selectpicker show-tick">
                                 <option  style="border-radius:15px;" value='-1'>Seleccione</option>
                                 <option  style="border-radius:15px;" value='PHOTOS'>Seleccione</option>
                                 <option  style="border-radius:15px;" value='SQUARECOLORS'>Seleccione</option>
                                 <option  style="border-radius:15px;" value='-1'>Seleccione</option>
                                 </select>
                    </div>
                </div>-->
               
              
                </div>
                  <input class="btn btn-primary mt-4" type="submit" value="Guardar">
           </form>
    </section>



