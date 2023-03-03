<?php

?>

          <div class="col-lg-8">
            <h4>Información General </h4>
         <hr class="padding-bottom-1x">
             <form id="formInfoToUpdated">
                 
            <div class="row">
               <input name="action" type="hidden" value="actualizar">
               <input name="step" type="hidden" value="1">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="reg-fn">Nombre</label>
                  <input name="Nombre" type="text" id="ContentPlaceHolder1_Nombre" class="form-control" required="" value="<?=$_SESSION['nombre']?>" />
                    <span data-val-controltovalidate="ContentPlaceHolder1_Nombre" data-val-errormessage="Requerido." data-val-display="Dynamic" id="ContentPlaceHolder1_ctl01" class="text-danger" data-val="true" data-val-evaluationfunction="RequiredFieldValidatorEvaluateIsValid" data-val-initialvalue="" style="display:none;">Requerido.</span>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="reg-ln">Apellidos</label>
                  <input name="Apellidos" type="text" id="ContentPlaceHolder1_Apellidos" class="form-control" required="" value="<?=$_SESSION['apellido']?>" />
                    <span data-val-controltovalidate="ContentPlaceHolder1_Apellidos" data-val-errormessage="Requerido." data-val-display="Dynamic" id="ContentPlaceHolder1_ctl02" class="text-danger" data-val="true" data-val-evaluationfunction="RequiredFieldValidatorEvaluateIsValid" data-val-initialvalue="" style="display:none;">Requerido.</span>
                </div>
              </div>
               <div class="col-sm-6">
                <div class="form-group">
                  <label for="reg-ln">Tipo Documento</label>
                  <select id="" name="tipoDNI" value="<?=$_SESSION['tipoDNI']?>" class="form-control" required="">
                      <?php
                      switch ($_SESSION['tipoDNI']) {
                          case "cedula":
echo " <option value='cedula' selected >Cédula</option>
                <option value='pasaporte'>Pasaporte</option>
                <option value='dimex'>DIMEX</option>";

                              break;
                           case "pasaporte":

echo " <option value='cedula'>Cédula</option>
                <option value='pasaporte' selected>Pasaporte</option>
                <option value='dimex'>DIMEX</option>";
                              break;
                           case "dimex":
echo " <option value='cedula'>Cédula</option>
                <option value='pasaporte'>Pasaporte</option>
                <option value='dimex' selected>DIMEX</option>";

                              break;
                          

                          default:
                              echo " <option value='cedula'>Cédula</option>
                <option value='pasaporte'>Pasaporte</option>
                <option value='dimex'>DIMEX</option>";
                              
                              break;
                      }
                      ?>
               
                
            </select>
                    <span data-val-controltovalidate="ContentPlaceHolder1_Cedula" data-val-errormessage="Requerido." data-val-display="Dynamic" id="ContentPlaceHolder1_ctl02" class="text-danger" data-val="true" data-val-evaluationfunction="RequiredFieldValidatorEvaluateIsValid" data-val-initialvalue="" style="display:none;">Requerido.</span>
                </div>
                    </div>
                <div class="col-sm-6">
                <div class="form-group">
                  <label for="reg-ln">Documento Identidad</label>
                  <input name="DNI" type="text" id="ContentPlaceHolder1_Cedula" class="form-control" required="" value="<?=$_SESSION['DNI']?>" />
                    <span data-val-controltovalidate="ContentPlaceHolder1_Cedula" data-val-errormessage="Requerido." data-val-display="Dynamic" id="ContentPlaceHolder1_ctl03" class="text-danger" data-val="true" data-val-evaluationfunction="RequiredFieldValidatorEvaluateIsValid" data-val-initialvalue="" style="display:none;">Requerido.</span>
                </div>
              </div>
            </div>
              <div class="row">
                  <div class="col-sm-4">
                      <div class="form-group">
                  <label for="reg-email">Provincia</label>
                      <select id="slt-provincias" name="provincia" class="form-control" required="">
                <option value="">-- Seleccione una provincia --</option>
            </select>
                        </div>
                  </div>
                  <div class="col-sm-4">
                      <div class="form-group">
                  <label for="reg-email">Cantón</label>
                    <select id="slt-cantones" name="canton" class="form-control" required="">
            <option value="">-- Seleccione un cantón --</option>
        </select>
                        </div>
                  </div>
                  <div class="col-sm-4">
                      <div class="form-group">
                  <label for="reg-email">Distrito</label>
                      <select name="distrito" id="slt-distritos" class="form-control" required="">
            <option value="">-- Seleccione un distrito --</option>
        </select>
                        </div>
                  </div>
              </div>
              <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="reg-email">Dirección</label>
                  <input name="Direccion" type="text" id="ContentPlaceHolder1_Direccion" class="form-control" required="" value="<?=$_SESSION['direccion']?>" />
                    <span data-val-controltovalidate="ContentPlaceHolder1_Direccion" data-val-errormessage="Requerido." data-val-display="Dynamic" id="ContentPlaceHolder1_ctl04" class="text-danger" data-val="true" data-val-evaluationfunction="RequiredFieldValidatorEvaluateIsValid" data-val-initialvalue="" style="display:none;">Requerido.</span>
                </div>
              </div>
            </div>
              <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="reg-email">E-mail</label>
                  <input disabled="disabled" name="Email" type="email" id="ContentPlaceHolder1_Email" class="form-control" required="" value="<?=$_SESSION['email']?>" />
                    <span data-val-controltovalidate="ContentPlaceHolder1_Email" data-val-errormessage="Requerido." data-val-display="Dynamic" id="ContentPlaceHolder1_ctl05" class="text-danger" data-val="true" data-val-evaluationfunction="RequiredFieldValidatorEvaluateIsValid" data-val-initialvalue="" style="display:none;">Requerido.</span>
                    <span data-val-controltovalidate="ContentPlaceHolder1_Email" data-val-errormessage="Correo incorrecto" data-val-display="Dynamic" id="ContentPlaceHolder1_ctl06" class="text-danger" data-val="true" data-val-evaluationfunction="RegularExpressionValidatorEvaluateIsValid" data-val-validationexpression="\w+([-+.&#39;]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*" style="display:none;">Correo incorrecto</span>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="reg-phone">Teléfono</label>
                  <input name="Telefono" type="number" id="ContentPlaceHolder1_Telefono" class="form-control" required="" value="<?=$_SESSION['telefono']?>" />
                    <span data-val-controltovalidate="ContentPlaceHolder1_Telefono" data-val-errormessage="Requerido." data-val-display="Dynamic" id="ContentPlaceHolder1_ctl07" class="text-danger" data-val="true" data-val-evaluationfunction="RequiredFieldValidatorEvaluateIsValid" data-val-initialvalue="" style="display:none;">Requerido.</span>
                </div>
              </div>
             </div>
              
            <div class="row">
            <div class="col-6 text-left text-sm-right">
                  <input class="btn btn-outline-primary-2 mt-1" style="text-transform: uppercase;" type="button" name="" value="Cambiar clave" onclick="window.location.href='./?pag=cuenta&&func=cambioClave'" id="btn-cambio-clave" />
              </div>
              <div class="col-6 text-right text-sm-right">
                  <input class="btn btn-outline-primary-2 mt-1" style="text-transform: uppercase;" type="submit" name="" value="Actualizar perfil" />
              </div>
            </div>
                 
                 
            </form>
            
            <hr>
            
          </div>
<!-- Estos ultimos DIV cierran los contenedores, no borrar -->
        </div>
      </div>
<script src="./assets/js/distribucion-cr.js"></script>
    <script src="./assets/js/formulario.js"></script>
<script>
 $( document ).ready(function() {
     const removeAccents = (str) => {
  return str.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
} 
    
    
    function evaluarInfo(array,infoValidar){
    for(let i=0;i<array.length;i++){
        let valoraComparar=removeAccents(array[i].value);
        console.log("comparando "+array[i].value+" con "+infoValidar);
        if(valoraComparar==infoValidar){
            
          //  $("#slt-provincias").val(provinciaSesion);
          array[i].setAttribute("selected",true);
        }
    }
    }
     var provinciaSesion="<?=$_SESSION['provincia']?>";
     provinciaSesion=removeAccents(provinciaSesion);
    var provincias=document.querySelectorAll("#slt-provincias option");
    evaluarInfo(provincias,provinciaSesion);
    
    
    var cantonSesion="<?=$_SESSION['canton']?>";
     cantonSesion=removeAccents(cantonSesion);
    
    $("#slt-cantones").val(cantonSesion);
    $("#slt-cantones").append("<option value='"+cantonSesion+"' selected>"+cantonSesion+"</option>");
    
   var distritoSesion="<?=$_SESSION['distrito']?>";
     distritoSesion=removeAccents(distritoSesion);
    
    $("#slt-distritos").val(distritoSesion);
    $("#slt-distritos").append("<option value='"+distritoSesion+"' selected>"+distritoSesion+"</option>");
    
});
$( "#formInfoToUpdated" ).on( "submit", function( event ) {
  event.preventDefault();
  
  $.ajax({
    type : 'POST',
    url : './controllers/userController.php',
    data : $('#formInfoToUpdated').serialize(),
   success:function(dat){
            if(dat!=false){
          Swal.fire({
                                                   icon: 'success',
                                                   title: 'Guardado',
                                                   text: 'Información Guardada con Éxito'

                                                 });
               
               window.setTimeout(function () {
                            window.location.href = "./?pag=cuenta&&func=perfil"
                        }, 2000);
            } else {
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Datos incorrectos, intente nuevamente'
              
              })
            }
        } 
})
  //href="<?=base_url?>?pag=checkout&&step=shipping"
});
  
</script>