<?php

?>

 <!-- Page Title-->
      <div class="page-title" id="page-title">
        <div class="container">
          <div class="column">
            <h1>Iniciar Sesíón</h1>
          </div>
          <div class="column">
            <ul class="breadcrumbs">
              <li><a href="/">Inicio</a>
              </li>
              <li class="separator">&nbsp;</li>
              <li>Iniciar Sesíón</li>
            </ul>
          </div>
        </div>
      </div>
  <!-- Page Content-->
      <div class="container padding-bottom-3x mb-4 pb-4">
        <div class="row">
          <div class="col-md-6">
            <form id="login-box" class="login-box" method="post">
              <input name="action" type="hidden" value="login">
              <h4 class="margin-bottom-1x">Inicio de sesión</h4>
              <div class="form-group input-group">
                  <input style="border-radius:35px" id="email" name="email" type="text" class="form-control" placeholder="Email" />
                <span class="input-group-addon"><i class="icon-mail"></i></span>
              </div>
              <div class="form-group input-group" style="position:relative">
                  <input style="border-radius:35px" id="pass" name="pass" type="password" class="form-control" placeholder="Password" />
                <span id='changeViewPass' class="input-group-text" style='position:absolute;right:10px;bottom:10px;background:white!important;border:none!important;' ><i style='font-size:20px;cursor:pointer;z-index:100' id='iconPass' class="fa-regular fa-eye-slash"></i></span>
              </div>
              <div class="d-flex flex-wrap justify-content-between padding-bottom-1x">
                  <span id="ContentPlaceHolder1_FailureText"></span>
                  <a class="enlace-form" href="<?=base_url?>?pag=cuenta&&func=registro">Crear cuenta</a>  
                  
                  <a class="enlace-form" href="">¿Olvidó su contraseña?</a> 
              </div>
              <div class="text-center text-sm-right">
                  <button class="btn btn-outline-primary float-right mt-3" style="font-size:15px;text-transform:uppercase;">Iniciar</button>
                
              </div>
            </form>
          </div>
        </div>
      </div>
<script>
       let visiblePass=false;
    $("#changeViewPass").on('click',function( event ) {
        if(visiblePass){
           $('#iconPass').removeClass('fa-eye');
         $('#iconPass').addClass('fa-eye-slash');
         $('#pass').attr('type','password');
         
         visiblePass =false;
        }else{
           $('#iconPass').addClass('fa-eye');
         $('#iconPass').removeClass('fa-eye-slash');  
         
         $('#pass').attr('type','text');
         visiblePass =true;
        }
      
        
    });
    $("#login-box").on('submit',function( event ) {
 
  event.preventDefault();
let email=$("#email").val();
let pass=$("#pass").val();

    if(email && pass){
        //alert("las dos respuestas son true");
          $.ajax({
    type : 'POST',
    url : './controllers/userController.php',
    data : $('#login-box').serialize(),
   success:function(dat){
           alert(dat);
            if(dat==true){
            Swal.fire({
                                                   icon: 'success',
                                                   title: 'Sesión Iniciada',
                                                   text: 'Bienvenido!!!'

                                                 });
                                                 window.setTimeout(function () {
                            window.location.href = "./?pag=carrito"
                        }, 2000);
            } else {
                if(dat=='Admin'){
                          window.setTimeout(function () {
                            window.location.href = "./?pag=cuenta&&func=admin"
                        }, 2000);
                } else {
                        Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Datos incorrectos'

                      })
                  }
            }
        } 
    }); 
    } else {
         Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'El email o password están vacíos'

                      })
    }
    }
);

</script>

