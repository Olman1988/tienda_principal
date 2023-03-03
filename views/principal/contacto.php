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
               <div class="col-12 text-right">
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
$( "#formInfo" ).on( "submit", function( event ) {
  event.preventDefault();
  
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
  //href="<?=base_url?>?pag=checkout&&step=shipping"
});
</script>
        

