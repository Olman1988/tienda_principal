<?php
?>
<div class="page-title" id='page-title'>
        <div class="container">
          <div class="column">
            <h1>Checkout</h1>
          </div>
          <div class="column">
            <ul class="breadcrumbs">
              <li><a href="/">Inicio</a>
              </li>
              <li class="separator">&nbsp;</li>
              <li>Checkout</li>
            </ul>
          </div>
        </div>
      </div>
<div class="container" style="margin-bottom:50px;">
    <div class="row">
        <div class="col-xl-9 col-lg-8 col-md-12">
            <div class="checkout-steps">
    
         <a class="" href="<?=base_url?>?pag=checkout&&step=review">Revisión</a>
    <a class="" href="<?=base_url?>?pag=checkout&&step=payment"><span class="angle"></span>Pago</a>

    
    <a class="" href="<?=base_url?>?pag=checkout&&step=shipping"><span class="angle"></span>Envío</a>
    
    <a class="active" href="<?=base_url?>?pag=checkout&&step=general"><span class="angle"></span>General</a>
    
</div>
            <h4>Información General </h4>
         <hr class="padding-bottom-1x">
             <form id="formInfo">
            <div class="row">
               <input name="action" type="hidden" value="datosCarrito">
               <input name="step" type="hidden" value="1">
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="reg-fn">Nombre</label>
                  <input name="Nombre" type="text" id="ContentPlaceHolder1_Nombre" class="form-control" required="" value="<?=$_SESSION['nombre']?>" />
                    <span data-val-controltovalidate="ContentPlaceHolder1_Nombre" data-val-errormessage="Requerido." data-val-display="Dynamic" id="ContentPlaceHolder1_ctl01" class="text-danger" data-val="true" data-val-evaluationfunction="RequiredFieldValidatorEvaluateIsValid" data-val-initialvalue="" style="display:none;">Requerido.</span>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="reg-ln">Apellidos</label>
                  <input name="Apellidos" type="text" id="ContentPlaceHolder1_Apellidos" class="form-control" required="" value="<?=$_SESSION['apellido']?>" />
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
                  <input name="Email" type="email" id="ContentPlaceHolder1_Email" class="form-control" required="" value="<?=$_SESSION['email']?>" />
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
                <div class="column"><a class="btn btn-outline-secondary" href="<?=base_url?>?pag=carrito"><i class="icon-arrow-left"></i><span class="hidden-xs-down">&nbsp;Regresar al carro</span></a></div>
              <div class="col-12 text-center mt-2">
                  <input class="btn btn-outline-primary-2" style="font-size:15px;text-transform: uppercase;" type="submit" name="" value="Guardar" onclick="" id="btn-registrar" />
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
$( "#formInfo" ).on( "submit", function( event ) {
  event.preventDefault();
  
  $.ajax({
    type : 'POST',
    url : './carritoCompras/carritoController.php',
    data : $('#formInfo').serialize(),
   success:function(dat){
           
            if(dat!=false){
          Swal.fire({
                                                   icon: 'success',
                                                   title: 'Guardado',
                                                   text: 'Información Guardada con Éxito'

                                                 });
               
               window.setTimeout(function () {
                            window.location.href = "./?pag=checkout&&step=shipping"
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