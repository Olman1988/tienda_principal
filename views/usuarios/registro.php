<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!-- Page Title-->
      <div class="page-title" id="page-title">
        <div class="container">
          <div class="column">
            <h1>Registro</h1>
          </div>
          <div class="column">
            <ul class="breadcrumbs">
              <li><a href="/">Inicio</a>
              </li>
              <li class="separator">&nbsp;</li>
              <li>Registro</li>
            </ul>
          </div>
        </div>
      </div>
  <!-- Page Content-->
  
      <div class="container padding-bottom-3x mb-2">
        <div class="row">
          <div class="col-md-12">
            <div class=""></div>
            <h3 class="">¿No tienes cuenta? Regístrate</h3>
            <p>Te tomará menos de un minuto.</p>
              <p class="text-danger">
        
    </p>
    <form id="formularioRegistro" action="" >
        <input type="hidden" name="action" value="index">
            <div class="row">
              <div class="col-sm-3">
                <div class="form-group">
                  <label for="reg-fn">Nombre</label>
                  <input name="nombre" type="text" id="nombre" class="form-control"  />
                    <span data-val-controltovalidate="" data-val-errormessage="" data-val-display="Dynamic" id="ContentPlaceHolder1_ctl00" class="text-danger" data-val="true" data-val-evaluationfunction="RequiredFieldValidatorEvaluateIsValid" data-val-initialvalue="" style="display:none;">Requerido.</span>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label for="reg-ln">Apellidos</label>
                  <input name="apellido" type="text" id="apellido" class="form-control" required="" />
                    <span data-val-controltovalidate="ContentPlaceHolder1_Apellidos" data-val-errormessage="Requerido." data-val-display="Dynamic" id="ContentPlaceHolder1_ctl01" class="text-danger" data-val="true" data-val-evaluationfunction="RequiredFieldValidatorEvaluateIsValid" data-val-initialvalue="" style="display:none;">Requerido.</span>
                </div>
              </div>
                 <div class="col-sm-3">
                <div class="form-group">
                  <label for="reg-ln">Tipo Documento</label>
                  <select id="" name="tipoDNI" class="form-control" required="">
                <option value="cedula">Cédula</option>
                <option value="pasaporte">Pasaporte</option>
                <option value="dimex">DIMEX</option>
                
            </select>
                    <span data-val-controltovalidate="ContentPlaceHolder1_Cedula" data-val-errormessage="Requerido." data-val-display="Dynamic" id="ContentPlaceHolder1_ctl02" class="text-danger" data-val="true" data-val-evaluationfunction="RequiredFieldValidatorEvaluateIsValid" data-val-initialvalue="" style="display:none;">Requerido.</span>
                </div>
                </div>
                <div class="col-sm-3">
                     
                <div class="form-group">
                  <label for="reg-ln">Documento de identidad</label>
                  <input name="DNI" type="text" id="DNI" class="form-control" required="" />
                    <span data-val-controltovalidate="ContentPlaceHolder1_Cedula" data-val-errormessage="Requerido." data-val-display="Dynamic" id="ContentPlaceHolder1_ctl02" class="text-danger" data-val="true" data-val-evaluationfunction="RequiredFieldValidatorEvaluateIsValid" data-val-initialvalue="" style="display:none;">Requerido.</span>
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
                                      <span data-val-controltovalidate="" data-val-errormessage="Requerido." data-val-display="Dynamic" id="ContentPlaceHolder1_ctl01" class="text-danger" data-val="true" data-val-evaluationfunction="RequiredFieldValidatorEvaluateIsValid" data-val-initialvalue="" style="display:none;">Requerido.</span>

                        </div>
                  </div>
                  <div class="col-sm-4">
                      <div class="form-group">
                  <label for="reg-email">Cantón</label>
                    <select id="slt-cantones" name="canton" class="form-control">
            <option value="">-- Seleccione un cantón --</option>
        </select>
                                      <span  class="text-danger" style="display:none;">Requerido.</span>

                        </div>
                  </div>
                  <div class="col-sm-4">
                      <div class="form-group">
                  <label for="reg-email">Distrito</label>
                      <select name="distrito" id="slt-distritos" class="form-control" required="">
            <option value="">-- Seleccione un distrito --</option>
        </select>
                                      <span data-val-controltovalidate="" data-val-errormessage="Requerido." data-val-display="Dynamic" id="ContentPlaceHolder1_ctl01" class="text-danger" data-val="true" data-val-evaluationfunction="RequiredFieldValidatorEvaluateIsValid" data-val-initialvalue="" style="display:none;">Requerido.</span>

                        </div>
                  </div>
              </div>
              <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="reg-email">Dirección</label>
                  <input name="direccion" type="text" id="direccion" class="form-control" required="" />
                    <span data-val-controltovalidate="ContentPlaceHolder1_Direccion" data-val-errormessage="Requerido." data-val-display="Dynamic" id="ContentPlaceHolder1_ctl03" class="text-danger" data-val="true" data-val-evaluationfunction="RequiredFieldValidatorEvaluateIsValid" data-val-initialvalue="" style="display:none;">Requerido.</span>
                </div>
              </div>
            </div>
              <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="reg-email">E-mail</label>
                  <input name="email" type="email" id="ContentPlaceHolder1_Email" class="form-control" required="" />
                    <span data-val-controltovalidate="ContentPlaceHolder1_Email" data-val-errormessage="Requerido." data-val-display="Dynamic" id="ContentPlaceHolder1_ctl04" class="text-danger" data-val="true" data-val-evaluationfunction="RequiredFieldValidatorEvaluateIsValid" data-val-initialvalue="" style="display:none;">Requerido.</span>
                    <span data-val-controltovalidate="ContentPlaceHolder1_Email" data-val-errormessage="Correo incorrecto" data-val-display="Dynamic" id="ContentPlaceHolder1_ctl05" class="text-danger" data-val="true" data-val-evaluationfunction="RegularExpressionValidatorEvaluateIsValid" data-val-validationexpression="\w+([-+.&#39;]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*" style="display:none;">Correo incorrecto</span>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="reg-phone">Teléfono</label>
                  <input name="telefono" type="number" id="telefono" class="form-control" required="" />
                    <span data-val-controltovalidate="ContentPlaceHolder1_Telefono" data-val-errormessage="Requerido." data-val-display="Dynamic" id="ContentPlaceHolder1_ctl06" class="text-danger" data-val="true" data-val-evaluationfunction="RequiredFieldValidatorEvaluateIsValid" data-val-initialvalue="" style="display:none;">Requerido.</span>
                </div>
              </div>
             </div>
              
              <div class="row">
              <div class="col-sm-6">
                <div class="form-group" style="position:relative;">
                  <label for="reg-pass">Contraseña</label>
                  <input name="passOne" type="password" id="passOne" class="form-control" required="" />
                                 <span id='changeViewPass' class="input-group-text" style='position:absolute;bottom:10px;right:10px;background:white!important;border:none!important;' ><i style='font-size:20px;cursor:pointer;' id='iconPass' class="fa-regular fa-eye-slash"></i></span>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group" style="position:relative;">
                  <label for="reg-pass-confirm">Confirmar contraseña</label>
                  <input name="passTwo" type="password" id="passTwo" class="form-control" required="" />
                                                   <span id='changeViewPass2' class="input-group-text" style='position:absolute;bottom:10px;right:10px;background:white!important;border:none!important;' ><i style='font-size:20px;cursor:pointer;' id='iconPass2' class="fa-regular fa-eye-slash"></i></span>
                </div>
              </div>
                    <div class="alert alert-danger alert-dismissible" id="contenedor-mensaje" style="display:none;height:auto;">
             <span  class="close" style="cursor:pointer;float:right" onclick="cerrarMensaje()">&times;</span>
  <p id="mensajePassword"></p>
</div>
                </div>
              <div class="row">
              <div class="col-12 text-center text-sm-right">
                  <input class="btn btn-outline-primary-2" style="font-size:15px;text-transform: uppercase;" type="submit" name="" value="Regístrarse" onclick="" id="btn-registrar" />
              </div>
            </div>
        </form>

          </div>
        </div>
      </div>

   <script src="./assets/js/distribucion-cr.js"></script>
    <script src="./assets/js/formulario.js"></script>   
    <script>
        
            let visiblePass=false;
            let visiblePass2=false;
    $("#changeViewPass").on('click',function( event ) {
        if(visiblePass){
           $('#iconPass').removeClass('fa-eye');
         $('#iconPass').addClass('fa-eye-slash');
         $('#passOne').attr('type','password');
         
         
         visiblePass =false;
        }else{
           $('#iconPass').addClass('fa-eye');
         $('#iconPass').removeClass('fa-eye-slash');  
         
         $('#passOne').attr('type','text');
     
         visiblePass =true;
        }
      
        
    }); 
    
    $("#changeViewPass2").on('click',function( event ) {
        if(visiblePass2){
           $('#iconPass2').removeClass('fa-eye'); 
         $('#iconPass2').addClass('fa-eye-slash');
         $('#passTwo').attr('type','password');
         visiblePass2 =false;
        }else{
           $('#iconPass2').addClass('fa-eye');
         $('#iconPass2').removeClass('fa-eye-slash');  
         $('#passTwo').attr('type','text');
         visiblePass2 = true;
        }
      
        
    }); 
        
        
    $("#formularioRegistro").on('submit',function( event ) {
 
  event.preventDefault();
  
const isStrongPassword = p => p.search(/^((?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=\S+$)(?=.*[;:\.,!¡\?¿@#\$%\^&\-_+=\(\)\[\]\{\}])).{8,20}$/)!=-1;

  //alert("En submit");
  let respuestaFormulario=validarFormulario();
  //alert("La respuesta del form es "+respuestaFormulario);
  let respuestaPassword=compararContrasena();
    //alert("La respuesta de la validacion de contrasena es "+respuestaPassword);
    if(respuestaFormulario && respuestaPassword){
       let respuesta = isStrongPassword($("#passTwo").val());
       if(respuesta){
                $.ajax({
    type : 'POST',
    url : './controllers/userController.php',
    data : $('#formularioRegistro').serialize(),
   success:function(dat){
          alert(dat);
            if(dat==true){
            Swal.fire({
                                                   icon: 'success',
                                                   title: 'Usuario creado',
                                                   text: 'El usuario fue creado con éxito, por favor inicie sesión'

                                                 });
                                                 window.setTimeout(function () {
                            window.location.href = "./?pag=cuenta&&func=login"
                        }, 2000);
            } else {
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Datos incorrectos'
              
              })
            }
        } 
    }); 
       } else {
           $("#contenedor-mensaje").css("display","block");
           $("#mensajePassword").html("<ul><li>Las contraseña debe tener al menos 8 caracteres</li><li>Las contraseña debe tener al menos una minúscula y una mayúscula</li><li>Las contraseña debe tener al menos un caracter especial ?¿@#\$%</li></ul>");
           
       }
     
    } else {
        Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Datos incorrectos'
              
              })
    }
    }
);
function validarFormulario(){
    var respuesta=true;
   var inputFormulario =document.querySelectorAll(".form-group input");
   var selectFormulario=document.querySelectorAll(".form-group select");
  
    for(let i=0;i<inputFormulario.length;i++){
        if($(inputFormulario[i]).val()){
            
            $(inputFormulario[i]).next().css('display','none');
        } else {
            
           $(inputFormulario[i]).next().css('display','block');
           respuesta=false;
        }
        
        
    }
    for(let i=0;i<selectFormulario.length;i++){
        if($(selectFormulario[i]).val()){
            
            $(selectFormulario[i]).next().css('display','none');
        } else {
         
           $(selectFormulario[i]).next().css('display','block');
           respuesta=false;
        }
        
        
    }
    return respuesta;
}
function compararContrasena(){
    if($("#passOne").val()!=$("#passTwo").val()){
        $("#contenedor-mensaje").css("display","block");
                   $("#mensajePassword").html("Las contraseñas no concuerdan");

        return false;
            
    } else {
        $("#contenedor-mensaje").css("display","none");
       return true;
    }
} 

function cerrarMensaje(){
      $("#contenedor-mensaje").css("display","none")
  }
    </script>