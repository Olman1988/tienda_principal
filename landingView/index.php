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
require_once "../views/principal/socialMedia.php";
$evaluar=new socialMedia();
if(isset($_GET['code'])){
  $consultarLanding= new landingModel();
  $respuestaLanding = $consultarLanding->consultarLandingCode($_GET['code']);
 
    if($respuestaLanding!=false&& count($respuestaLanding)>0){

?>
<html lang="es">

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> <?=$profile->name?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <!--JQUERY-->
  <link rel="icon" href="<?phpbase_url2.$profile->logo?>">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <!--BOOSTRAP-->
  <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
 <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<!--ANIMACIONES-->
   <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
 <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
 
  <!--ICONOS-->
  <script src="https://kit.fontawesome.com/b58e5dabf0.js" crossorigin="anonymous"></script>
  <!--CAROUSEL.css------------->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="" crossorigin="anonymous" />

  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="" crossorigin="anonymous"></script>

<!-- Include Unite Gallery core files -->

   <script type="text/javascript"> (function() { var css = document.createElement("link"); css.href = "https://use.fontawesome.com/releases/v5.9.0/css/all.css"; css.rel = "stylesheet"; css.type = "text/css"; document.getElementsByTagName("head")[0].appendChild(css); })(); </script>

   <style>
        @import url('https://fonts.googleapis.com/css2?family=Chicle&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;900&family=Poppins:wght@400;500;600;700&family=Mukta:wght@200;400;500;700&family=Montserrat+Alternates:wght@200&family=Ubuntu:wght@400;500;700&family=Poiret+One:wght@400;500;700&display=swap');
	
            *{
            font-family: 'Montserrat', sans-serif;
        }
        body{
            background-color: white;
         }
        h1{
            font-size: 20px;
            font-weight: 800;
            color:<?=$respuestaLAF['colorPrincipal']?>;
		 font-family:'<?=$respuestaLAF['fuenteTitulo']?>';
    font-size: 45px;
    letter-spacing: 2px;
        }
        p{ 
            font-size: 14px;
            font-weight: 300;
            color: rgb(168, 168, 168);
        }

        .boxt{ 
            border: 1px solid lightgrey;
            border-radius: 10px;
            font-size: 12px;
            font-weight: 200;
            padding-top: 13px;
            padding-bottom: 13px;
            width: 70%;
            box-shadow: 2px 3px 4px #dbdbdb;
           font-weight: bold;
        }
        .mybutton{ 
            background-color: rgb(0, 0, 0) !important;
            width: 70%;
            border: 1px solid lightgrey;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 800;
            padding-top: 13px;
           

        }
        .mybutton:hover{ 
            background-color: red!important;
            border: 1px solid red;

        }
        .nfull{ 
            width: 80%;
        }

        .section2{ 
            width: 70%;
            margin-top: 60px;
            padding-bottom: 20px;
            margin-top: 80px;
            margin-bottom: 90px;
        }
        .mp-btn{
            text-decoration:none;
            color:white;
            border-radius:50%;
            border:solid 2px rgba(255,255,255,0.12);
            padding:5px 9px 5px 9px;
            color: rgba(255,255,255,0.5);
            margin:10px;
            height:20px;
            width:20px;
        }

        h2{ 
            font-size: 18px;
            font-weight: 700;
            padding-top: 20px;
            color: #E4008D;
    font-family: 'Chicle';
    font-size: 45px;
    letter-spacing: 2px;
        }

        .socialfoot{ 
         
            color: white;
            padding-top: 60px;
            padding-bottom: 60px;

        }

        .bulled{ 
            color: red;
            font-weight: 800;
        }
       
        @media only screen and (max-width: 600px) {
            .boxt{ 
            width: 100%;
            font-weight: bold;
            }
            .mybutton{ 
                width: 100%;
            }
            .nfull{ 
            width: 100%;
        }
        .section2{ 
            width: 100%;
        }

        .justify{ 
            padding-right: 5px !important;
        }

       

        }

        .justify{ 
            padding-right: 140px;
        }
  
      .resalt{ 
        color: white;
        font-weight: 600;
        font-size: 16px;
      }
      .boxt::placeholder {
         color: black;
        }

        input.largerCheckbox {
            width: 22px;
            height: 22px;
        }
   </style>
</head>
<body id="body" style='min-height:95vh'>
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


    <footer class="container-fluid" style="background-color: <?=$respuestaLAF['colorFooter']?>;min-height:25vh;color: <?=$respuestaLAF['footerTextoColor']?>!important;">
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

    </footer>
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
</body>

<?php
    } else {
    echo "<script>window.location.href = '".base_url."'</script>";
}
} else {
    echo "<script>window.location.href = '".base_url."'</script>";
}
?>