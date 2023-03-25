<?php
?>
<section style="margin:auto;padding:20px;width:80%;min-width:300px;margin-top:50px;">
  <form id="formularioRegistro" action="./?seccion=attributesGroup&&action=action-add" method="POST" enctype="multipart/form-data">
      <input type='hidden' name='action-attributesGroup' value='add'>      
      <div class="row">
                <h2>Agregar Grupo de Atributos</h2>
                <div class="col-6"> 
                   <div class="form-group">
                        <label for="reg-fn">Descripcion</label>
                        <input name="nombre" type="text" id="nombre" class="form-control" value='' />
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



