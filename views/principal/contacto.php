<?php
class contacto{
    
           public function evaluarInfo($infoProfile,$tipo){
    
       if(empty($infoProfile)){
           return '';
       }else {
           switch ($tipo) {
               case "infoEmail":
                   return "<li class='mt-2'><a class='mp-btn-2' href='mailto:$infoProfile'><i class='fa-solid fa-envelope'></i><span class='ml-1'>$infoProfile</span></a></li>";

                   break;
               case "supportEmail":
                   return "<li class='mt-2'><a class='mp-btn-2' href='mailto:$infoProfile'><i class='fa-solid fa-envelope'></i><span class='ml-1'>$infoProfile</span></a></li>";

                   break;
               case "phone":
                   return "<li class='mt-2'><a class='mp-btn-2' href='tel:$infoProfile'><i class='fa-solid fa-phone'></i><span class='ml-1'>+506 $infoProfile</span></a></li>";

                   break;
               case "mobile":
                   return "<li class='mt-2'><a class='mp-btn-2' href='tel:$infoProfile'><i class='fa-solid fa-mobile'></i><span class='ml-1'>+506 $infoProfile</span></a></li>";

                   break;
               case "whatsApp":
                   return "<li class='mt-2'><a class='mp-btn-2' href='https://api.whatsapp.com/send?text=Deseo%20recibir%20mas%20informacion&phone=506$infoProfile'><i class='fa-brands fa-whatsapp'></i><span class='ml-1'>+506 $infoProfile</span></a></li>";

                   break;
               case "facebook":
                   return "<li class='mt-2'><a class='mp-btn-2' href='$infoProfile'><i class='fa-brands fa-facebook-f '></i><span class='pl-1'>Facebook</span></a></li>";

                   break;
               case "instagram":
                        return "<li class='mt-2'><a class='mp-btn-2' href='$infoProfile'><i class='fa-brands fa-instagram'></i><span class='pl-1'>Instagram</span></a></li>";

                   break;
               case "twitter":
                   return "<li class='mt-2'><a class='mp-btn-2' href='$infoProfile'><i class='fa-brands fa-twitter'></i><span class='pl-1'>Twitter</span></a></li>";

                   break;
               case "pinterest":
                   return "<li class='mt-2'><a class='mp-btn-2' href='$infoProfile'><i class='fa-brands fa-pinterest-p'></i><span class='pl-1'>Pinterest</span></a></li>";

                   break;
               
              case "linkedin":
                  return "<li class='mt-2'><a class='mp-btn-2' href='$infoProfile'><i class='fa-brands fa-linkedin-in'></i><span class='pl-1'>Linkedin</span></a></li>";

                   break;
               case "youtube":
                   return "<li class='mt-2'><a class='mp-btn-2' href='$infoProfile'><i class='fa-brands fa-youtube'></i><span class='pl-1'>Youtube</span></a></li>";

                   break;
               case "address":
                   return "<li class='mt-2'><a class='mp-btn-2' ><i class='fa-solid fa-location-dot'></i><span class='pl-1'>$infoProfile</span></a></li>";

                   break;
               

               default:
                   break;
           }
       }
       
   }
    
}
?>
   <!-- Page Content-->
      <div class="container padding-bottom-2x mb-2">
        <div class="row">
             <div class="display-3 text-muted opacity-75 mb-30 mt-2">Servicio al cliente</div>
          <div class="col-md-7">
           
            <form id='formInfo'>
              <div class="col-sm-12 mt-2">
                  <input type="hidden" name='emailBusiness' value="<?=$profile->infoEmail?>">
                  <input type="hidden" name='nameBusiness' value="<?=$profile->name?>">
                      <input name="nombre" type="text" id="" class="form-control form-control-rounded" placeholder="Nombre completo" />
                        <span data-val-controltovalidate="" data-val-errormessage="Requerido" id="nombreRespuesta" class="text-danger" data-val="true" data-val-evaluationfunction="RequiredFieldValidatorEvaluateIsValid" data-val-initialvalue="" style="visibility:hidden;">Requerido</span>
                    
                  </div>
              <div class="col-sm-12 mt-2">
                    
                      <input name="email" type="email" id="" class="form-control form-control-rounded" placeholder="Correo electrónico" />
                        <span data-val-controltovalidate="" data-val-errormessage="Requerido" id="emailRespuesta" class="text-danger" data-val="true" data-val-evaluationfunction="RequiredFieldValidatorEvaluateIsValid" data-val-initialvalue="" style="visibility:hidden;">Requerido</span>
                    
                  </div>
              <div class="col-sm-12 mt-2">
                    
                      <input name="telefono" type="text" id="telefono" class="form-control form-control-rounded" placeholder="Teléfono" />
                        <span data-val-controltovalidate="" data-val-errormessage="Requerido" id="telefonoRespuesta" class="text-danger" data-val="true" data-val-evaluationfunction="RequiredFieldValidatorEvaluateIsValid" data-val-initialvalue="" style="visibility:hidden;">Requerido</span>
                    
                  </div>
              <div class="col-12 mt-2">
                    
                      <textarea name="mensajeForm" style='height:400px' id="mensaje" class="form-control form-control-rounded" placeholder="Comentario" rows="8"></textarea>
                        <span data-val-controltovalidate="" data-val-errormessage="Requerido" id="mensajeRespuesta" class="text-danger" data-val="true" data-val-evaluationfunction="RequiredFieldValidatorEvaluateIsValid" data-val-initialvalue="" style="visibility:hidden;">Requerido</span>
                    
                  </div>
                
             
                     <div class="captcha-chat" style="padding:10px;box-shadow:2px 2px 10px gray;border-radius:10px;">
                         <p class="security p-3" style='color:gray'>Requerimiento de Seguridad</p>    
                        <div class="captcha-container media p-4 m-4">
                            <div class="media-body">
                                            
                            </div>
                            <div id="captcha" class="col-12 mt-2">
                                <div class="controls">
                                    <input class="form-control form-control-rounded user-text btn-common" placeholder="Digite aquí" type="text" />
                                    <div style="display:flex; padding:5px;">
                                    <div class="validate btn-common btn btn-outline-secondary m-1" style="font-size:18px;padding:5px;color:white">
                                        <!-- this image should be converted into inline svg -->
                                        Validar Captcha
                                    </div>
                                    <div class="refresh btn-common btn btn-outline-secondary m-1" style="font-size:18px;padding:5px;color:white">
                                        <!-- this image should be converted into inline svg -->
                                        <i class="fa-solid fa-rotate"></i>
                                    </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
               <div class="col-12 text-right mt-4">
                      <input type="submit" name="" value="Enviar" onclick="" id="" class="btn btn-outline-primary-2" />
                  </div>
              
              </form>
          </div>
          <div class="col-md-5 pt-4">
            <ul class="list-icon mt-2" style="">
           <?php
                  $evaluarContacto=new contacto();
                  echo $evaluarContacto->evaluarInfo($profile->infoEmail, "infoEmail");
                  echo $evaluarContacto->evaluarInfo($profile->supportEmail, "supportEmail");
                  echo $evaluarContacto->evaluarInfo($profile->phone, "phone");
                   echo $evaluarContacto->evaluarInfo($profile->mobile, "mobile");
                  echo $evaluarContacto->evaluarInfo($profile->whatsApp, "whatsApp");
                  echo $evaluarContacto->evaluarInfo($profile->facebook, "facebook");
                  echo $evaluarContacto->evaluarInfo($profile->instagram, "instagram");
                  echo $evaluarContacto->evaluarInfo($profile->twitter, "twitter");
                  echo $evaluarContacto->evaluarInfo($profile->pinterest, "pinterest");
                  echo $evaluarContacto->evaluarInfo($profile->linkedin, "linkedin");
                  echo $evaluarContacto->evaluarInfo($profile->youtube, "youtube");
                  echo $evaluarContacto->evaluarInfo($profile->address, "address");
                 
                  
                  ?>
              
            </ul>
          </div>
        </div>
        
      
      </div>
   <?php
   if($profile->mapsEmbeded!=''){
  
   ?>
   <h2 class='text-center'>Ubicación de tienda</h2>
   <div style='width:70%;min-width:300px;margin:auto;height:450px;margin-bottom:50px;overflow:hidden;text-align: center;'>
       <iframe   src="<?=$profile->mapsEmbeded?>" style="min-width:100%;min-height:450px;max-height:450px;display:flex;border-radius: 20px;" allowfullscreen="" loading="lazy"></iframe> 

   </div>
   <div class='mt-4'></div>
   <?php
   }
   ?>
<script>
    var validateCaptcha = false;
    $(document).ready(function(){
$("#reloadCaptcha").click(function(){
var captchaImage = $('#captcha').attr('src');
captchaImage = captchaImage.substring(0,captchaImage.lastIndexOf("?"));
captchaImage = captchaImage+"?rand="+Math.random()*1000;
$('#captcha').attr('src', captchaImage);
});
});
$( "#formInfo" ).on( "submit", function( event ) {
  event.preventDefault();
  if(validateCaptcha){
  $.ajax({
    type : 'POST',
    url : './email/controllerForm.php',
    data : $('#formInfo').serialize(),
   success:function(dat){
       
            if(dat!=false){
          Swal.fire({
                                                   icon: 'success',
                                                   title: 'Enviado',
                                                   text: 'Información enviada con éxito, en breve le estaremos contactando'

                                                 });
               
               window.setTimeout(function () {
                            window.location.href = "./"
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
  } else {
    Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Debe realizar la validación de Captcha correctamente, ingrese en el espacio indicado los números y letras que aparecen en la imagen'
              
              })  
  }
  //href="<?=base_url?>?pag=checkout&&step=shipping"
});

document.addEventListener("DOMContentLoaded", function() {
        document.body.scrollTop; //force css repaint to ensure cssom is ready

        var timeout; //global timout variable that holds reference to timer

        var captcha = new $.Captcha({
            onFailure: function() {
                validateCaptcha = false;
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'La información ingresada es incorrecta'
              
              })

            },

            onSuccess: function() {
                validateCaptcha = true;
                Swal.fire({
                                                   icon: 'success',
                                                   title: 'Éxito',
                                                   text: 'Información validada con éxito, puede continuar con su compra'

                                                 });
            }
        });

        captcha.generate();
    });
</script>
        <script src="<?=base_url?>assets/js/client_captcha.js" defer></script>

