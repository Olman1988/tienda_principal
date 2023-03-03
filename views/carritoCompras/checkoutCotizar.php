<?php

?>
<div class="page-title" id='page-title'>
        <div class="container">
          <div class="column">
            <h1>Cotizar</h1>
          </div>
          <div class="column">
            <ul class="breadcrumbs">
                <li><a href="<?=base_url?>?pag=carrito">Inicio</a>
              </li>
              <li class="separator">&nbsp;</li>
              <li>Cotizar</li>
            </ul>
          </div>
        </div>
      </div>
<div class="container" style="margin-bottom:50px;">
    <div class="row">
        <div class="col-xl-9 col-lg-8 col-md-12">
           
            <h4>Información General - Envío de Cotización</h4>
            <hr class="padding-bottom-1x">
             <form id="formInfo">
            <div class="row">
               <input name="action" type="hidden" value="datosCotizar">
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="reg-fn">Nombre</label>
                  <input name="Nombre" type="text" id="name" class="form-control" required="" value="<?=$_SESSION['nombre']?>" />
                    <span data-val-controltovalidate="ContentPlaceHolder1_Nombre" data-val-errormessage="Requerido." data-val-display="Dynamic" id="ContentPlaceHolder1_ctl01" class="text-danger" data-val="true" data-val-evaluationfunction="RequiredFieldValidatorEvaluateIsValid" data-val-initialvalue="" style="display:none;">Requerido.</span>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="reg-ln">Apellidos</label>
                  <input name="Apellidos" type="text" id="lastname" class="form-control" required="" value="<?=$_SESSION['apellido']?>" />
                    <span data-val-controltovalidate="ContentPlaceHolder1_Apellidos" data-val-errormessage="Requerido." data-val-display="Dynamic" id="ContentPlaceHolder1_ctl02" class="text-danger" data-val="true" data-val-evaluationfunction="RequiredFieldValidatorEvaluateIsValid" data-val-initialvalue="" style="display:none;">Requerido.</span>
                </div>
              </div>
                <div class="col-sm-4">
                <div class="form-group">
                  <label for="reg-ln">Cédula</label>
                  <input name="Cedula" type="number" id="ContentPlaceHolder1_Cedula" class="form-control" required="" value="<?=$_SESSION['DNI']?>" />
                    <span data-val-controltovalidate="ContentPlaceHolder1_Cedula" data-val-errormessage="Requerido." data-val-display="Dynamic" id="ContentPlaceHolder1_ctl03" class="text-danger" data-val="true" data-val-evaluationfunction="RequiredFieldValidatorEvaluateIsValid" data-val-initialvalue="" style="display:none;">Requerido.</span>
                </div>
              </div>
            </div>
              <div class="row">
                  <div class="col-sm-4">
                      <div class="form-group">
                  <label for="reg-email">Provincia</label>
                      <select id="slt-provincias" name="provincia" class="form-control">
                <option value="">-- Seleccione una provincia --</option>
            </select>
                        </div>
                  </div>
                  <div class="col-sm-4">
                      <div class="form-group">
                  <label for="reg-email">Cantón</label>
                    <select id="slt-cantones" name="canton" class="form-control">
            <option value="">-- Seleccione un cantón --</option>
        </select>
                        </div>
                  </div>
                  <div class="col-sm-4">
                      <div class="form-group">
                  <label for="reg-email">Distrito</label>
                      <select name="distrito" id="slt-distritos" class="form-control">
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
                  <input name="Email" type="email" id="email" class="form-control" required="" value="<?=$_SESSION['email']?>" />
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
              
            
            <div class="checkout-footer">
              <div class="column"><a class="btn btn-outline-secondary" href="<?=base_url?>?pag=carrito"><i class="icon-arrow-left"></i><span class="hidden-xs-down">&nbsp;Regresar</span></a></div>
              <div class="column">
                  <a id="enviarInfo" class="btn btn-outline-primary" href="">Enviar Cotización</a>

              </div>
            </div>
            </form>
          </div>
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
$( "#enviarInfo" ).on( "click", function( event ) {
  event.preventDefault();
 
  $.ajax({
    type : 'POST',
    url : './carritoCompras/carritoController.php',
    data : $('#formInfo').serialize(),
   success:function(dat){
       console.log(dat);
            if(dat.status){
                          Swal.fire({
                                   icon: 'success',
                                   title: dat.title,
                                   text: dat.msn
                                });
                    
               
               window.setTimeout(function () {
                            window.location.href = "./?pag=carrito"
                        }, 2000);

            } else {
                Swal.fire({
                icon: 'error',
                title: dat.title,
                text: dat.msn
              })
            }
        } 
})
  //href="<?=base_url?>?pag=checkout&&step=shipping"
  
});
  
</script>