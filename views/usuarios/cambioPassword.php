<?php
?>

          <div class="col-lg-8">
            <h4>Información General </h4>
         <hr class="padding-bottom-1x">
             <form id="formPass">
                 <input type="hidden" name="action" value="cambiarPass">
             <div class="col-sm-4">
                <div class="form-group">
                  <label for="reg-ln">Clave actual</label>
                  <input name="passAnterior" type="password" id="ContentPlaceHolder1_Cedula" class="form-control" required="" value="" />
                    <span data-val-controltovalidate="ContentPlaceHolder1_Cedula" data-val-errormessage="Requerido." data-val-display="Dynamic" id="ContentPlaceHolder1_ctl03" class="text-danger" data-val="true" data-val-evaluationfunction="RequiredFieldValidatorEvaluateIsValid" data-val-initialvalue="" style="display:none;">Requerido.</span>
                </div>
              </div>
               <div class="col-sm-4">
                <div class="form-group">
                  <label for="reg-ln">Nueva clave</label>
                  <input name="nuevaPass" type="text" id="nuevaClave"  class="form-control" required="" value="" />
                    <span data-val-controltovalidate="ContentPlaceHolder1_Cedula" data-val-errormessage="Requerido." data-val-display="Dynamic" id="ContentPlaceHolder1_ctl03" class="text-danger" data-val="true" data-val-evaluationfunction="RequiredFieldValidatorEvaluateIsValid" data-val-initialvalue="" style="display:none;">Requerido.</span>
                </div>
              </div>
               <div class="col-sm-4">
                <div class="form-group">
                  <label for="reg-ln">Confirmar clave</label>
                  <input name="nuevaPassConfirm" type="text" id="nuevaClaveConfirmacion"  class="form-control" required="" value="" />
                    <span data-val-controltovalidate="ContentPlaceHolder1_Cedula" data-val-errormessage="Requerido." data-val-display="Dynamic" id="ContentPlaceHolder1_ctl03" class="text-danger" data-val="true" data-val-evaluationfunction="RequiredFieldValidatorEvaluateIsValid" data-val-initialvalue="" style="display:none;">Requerido.</span>
                </div>
              </div>
              <div class="row">
                  
         <div class="alert alert-danger alert-dismissible" id="contenedor-mensaje" style="display:none;height:auto;">
             <span  class="close" style="cursor:pointer;float:right" onclick="cerrarMensaje()">&times;</span>
  <p id="mensajePass"></p>
</div>
             </div>
              
            <div class="row mx-auto">
           
              <div class="col-6 text-right text-sm-right m-2">
                  <input class="btn btn-outline-primary-2 mt-1" style="text-transform: uppercase;" type="submit" name="" value="Actualizar perfil" />
              </div>
            </div>
                 
                 
            </form>
            
            <hr>
            
          </div>
<!-- Estos ultimos DIV cierran los contenedores, no borrar -->
        </div>
      </div>
<script>
   
$( "#formPass" ).on( "submit", function( event ) {
     event.preventDefault();
    const isStrongPassword = p => p.search(/^((?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=\S+$)(?=.*[;:\.,!¡\?¿@#\$%\^&\-_+=\(\)\[\]\{\}])).{8,20}$/)!=-1;
   let pass1=$("#nuevaClave").val();
  let pass2=$("#nuevaClaveConfirmacion").val();
       

  let respuestaValidacion=validarIguales(pass1,pass2);
  
  if(!respuestaValidacion){
      $("#contenedor-mensaje").css("display","block")
      $("#mensajePass").text("Las contraseñas no coinciden");
  }else{
   
    let respuesta = isStrongPassword($("#nuevaClaveConfirmacion").val());
    
    if(!respuesta){
        $("#contenedor-mensaje").css("display","block")
                $("#mensajePass").html("<ul><li>Las contraseña debe tener al menos 8 caracteres</li><li>Las contraseña debe tener al menos una minúscula y una mayúscula</li><li>Las contraseña debe tener al menos un caracter especial ?¿@#\$%</li></ul>");
    } else {
        $("#contenedor-mensaje").css("display","none")
         $.ajax({
    type : 'POST',
    url : './controllers/userController.php',
    data : $('#formPass').serialize(),
   success:function(dat){
           if(dat==2){
            $("#contenedor-mensaje").css("display","block")
      $("#mensajePass").text("La contraseña actual ingresada es incorrecta");
           }else {
               
                if(dat!=false){
                
          Swal.fire({
                                                   icon: 'success',
                                                   title: 'Guardado',
                                                   text: 'Información Guardada con Éxito'

                                                 });
               
               window.setTimeout(function () {
                            window.location.href = "./?pag=cuenta&&func=cerrar"
                        }, 2000);
            } else {
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Datos incorrectos, intente nuevamente'
              
              })
            }
        } 
        }
        //aqui
         
});
    }
   
}
   
     
     
  } 
  
  );
  
  function validarIguales(pass1,pass2){
  if(pass1==pass2){
      return true;
  } else {
      return false;
  }
      
  }
  function cerrarMensaje(){
      $("#contenedor-mensaje").css("display","none")
  }

</script>