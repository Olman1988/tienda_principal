<?php

require_once "../config/parameters.php";
require_once "../config/conexion.php";
require_once "../models/generalModel.php";
require_once "../models/landingModel.php";
require_once "../models/lookandfeelModel.php";
$consultaLAF= new lookandfeelModel();
$respuestaLAF =  $consultaLAF -> consultarLAF();
$consultaGeneral=new generalModel();
$profile=$consultaGeneral->consultaProfile();
$consultaAcercaDe=$consultaGeneral->consultaAcercaDe();
require_once "../views/principal/socialMedia.php";
$evaluar=new socialMedia();
if(isset($_GET['code'])){
  $consultarLanding= new landingModel();
  $respuestaLanding = $consultarLanding->consultarLandingCode($_GET['code']);
 
    if($respuestaLanding!=false&& count($respuestaLanding)>0){
require_once "header.php";
?>

   <div class="section1 container" style="margin-top: 20px;margin-bottom:50px;min-height:68vh">
        
        <div class="row">
            <div class="logo text-center">
                <img src="<?=base_url2.$profile->logo?>" width="250px" alt="Tsunami">
            </div>
            <div class="col-lg-6 col-sm-12 text-center mt-5">
                <img style="max-height:650px;" src="<?=base_url?>assets/imagenesLanding/<?=$respuestaLanding['rutaImagen']?>" alt="">
            </div>
            <div class="col-lg-6 col-sm-12 mt-5" style="margin:auto !important;text-align: center">
                <h1><?=$respuestaLanding['titulo']?> </h1>
                <p class="nfull" style="text-align:justify;margin:auto;width:90%;max-width: 400px;min-width:300px;"><?=$respuestaLanding['subtitulo']?> 
                    </p>
                    <p class="mb-4" style="font-weight: 600; text-align:justify;margin:auto;width:90%;max-width: 400px;min-width:300px;"><?=$respuestaLanding['descripcion']?> </p>
                <form style="margin:auto !important;margin-top:50px;" id="landingForm" method="post" name="registerform" action="" onsubmit="">
                    <input type="hidden" name="code" id="id" value="<?=$_GET['code']?>" >
                    <div class="mb-3">
                      <input style="margin:auto !important;" type="text" placeholder="Nombre completo:" class="form-control boxt" id="nombre"  name="nombre">
                    </div>
                    <div class="mb-3">
                        <input style="margin:auto !important;" type="text" placeholder="Documento de identidad:" class="form-control boxt" id="cedula"  name="cedula">
                      </div>
                    <div class="mb-3">
                      <input style="margin:auto !important;" type="email" placeholder="Email:" class="form-control boxt" id="email" name="email" >
                    </div>
                    <div class="mb-3">
                        <input style="margin:auto !important;" type="text" onkeypress="return valideKey(event);"  placeholder="Número de teléfono:" class="form-control boxt" id="telefono" name="telefono" >
                    </div>
                    
                    <div class="mb-3">
                        <input style="margin:auto !important;"  class="form-check-input largerCheckbox" type="checkbox" value="" id="terminos" name="terminos">
                        <label style="font-size:14px;" class="form-check-label text-white" for="flexCheckDefault">
                         <!--    <a style=" color: white;" target="_blank" href="reglamento/reglamento-tsunami.pdf">Términos y condiciones</a> -->
							
							<a style=" color: rgba(100,100,100,1);" target="_blank" href="">Términos y condiciones</a>
                        </label>
                    </div>
               
                    <button type="submit" class="btn" style='color:white;background:<?=$respuestaLAF['colorPrincipal']?>;text-transform: uppercase;padding:10px 50px;border-color:solid 1px <?=$respuestaLAF['colorPrincipal']?> !important;font-family: "<?=$respuestaLAF['fuenteBotones']?>"!important;'>Registrarme</button>
                  </form>
            </div>
        </div>
    </div>


<!--    <footer class="container-fluid" style="background-color: <?=$respuestaLAF['colorFooter']?>;min-height:25vh;color: <?=$respuestaLAF['footerTextoColor']?>!important;">
        <div class="container socialfoot text-center">
            <p>Visite nuestras redes sociales</p>
              <?php
                  
                  echo $evaluar->evaluarInfo($profile->whatsApp, "whatsApp");
                  echo $evaluar->evaluarInfo($profile->facebook, "facebook");
                  echo $evaluar->evaluarInfo($profile->instagram, "instagram");
                  echo $evaluar->evaluarInfo($profile->twitter, "twitter");
                  echo $evaluar->evaluarInfo($profile->pinterest, "pinterest");
                  echo $evaluar->evaluarInfo($profile->linkedin, "linkedin");
                  echo $evaluar->evaluarInfo($profile->youtube, "youtube");
              ?>
        </div>

    </footer>-->
     <script>
      $( "#landingForm" ).on( "submit", function( event ) {
  event.preventDefault();
  let respuesta = validaform();
  
  if(respuesta){
  $.ajax({
    type : 'POST',
    url : '../email/controllerLandingForm.php',
    data : $('#landingForm').serialize(),
   success:function(dat){
       console.log(dat);
            if(dat!=false){
          Swal.fire({
                                                   icon: 'success',
                                                   title: 'Enviado',
                                                   text: 'Información enviada con éxito, en breve le estaremos contactando'

                                                 });
               
            window.setTimeout(function () {
                    window.location.href = "../"
                      }, 2000);
            } else {
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Datos incorrectos, intente nuevamente'
              
              })
            }
        } 
});
      }
  //href="<?=base_url?>?pag=checkout&&step=shipping"
});

        function validar_email( email ) 
        {
            var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regex.test(email) ? true : false;
        }
        function validaform(){ 
            console
            var nombre = $('#nombre').val();
            var cedula = $('#cedula').val();
            var email = $('#email').val();
            var telefono = $('#telefono').val();
            var respemail=0;
            var mensaje = "Los siguientes campos son requeridos:";
            
          
            

            if(nombre==""){ 
                mensaje = mensaje + "\n- Nombre";
            }
            if( validar_email( email ) ){
                respemail=0;
            }
            else{
                respemail=1;
                mensaje = mensaje + "\n - Correo";
            } 
            if(cedula==""){ 
                mensaje = mensaje + "\n - Cédula";
            }
            if(telefono==""){ 
                mensaje = mensaje + "\n - Teléfono";
            }

          

            if( $('#terminos').prop('checked') ) {
                var checkedr = 1;
            }else{ 
                var checkedr = 0;
                
                mensaje = mensaje + "\n - Términos y condiciones";
            
            }


            if(nombre=="" || cedula=="" || respemail!=0 || telefono=="" || checkedr!=1){ 
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: mensaje
              
              })
                return false;
            } else {
                return true;
            }
        }
         function valideKey(evt){
            // code is the decimal ASCII representation of the pressed key.
            var code = (evt.which) ? evt.which : evt.keyCode;
            if(code==8) { // backspace.
            return true;
            } else if(code>=48 && code<=57) { // is a number.
            return true;
            } else{ // other keys.
            return false;
            }
        }
   
    </script>
    <script>  
        document.addEventListener("DOMContentLoaded", function(){
            document.getElementById("nombre").value = "";
            document.getElementById("email").value = "";
            document.getElementById("telefono").value = "";
        });
           
        
       
        </script>


<?php
          require_once "footer.php";
    } else {
    echo "<script>window.location.href = '".base_url."'</script>";
}
} else {
    echo "<script>window.location.href = '".base_url."'</script>";
}
?>