<?php

?>

 <!-- Page Title-->
      <div class="page-title" id="page-title">
        <div class="container">
          <div class="column">
            <h1>Restablecer Contraseña</h1>
          </div>
          <div class="column">
            <ul class="breadcrumbs">
              <li><a href="/">Inicio</a>
              </li>
              <li class="separator">&nbsp;</li>
              <li>Restablecer Contraseña</li>
            </ul>
          </div>
        </div>
      </div>
  <!-- Page Content-->
      <div class="container padding-bottom-3x mb-4 pb-4">
        <div class="row">
          <div class="col-md-6">
            <form id="login-box" class="login-box" method="post">
              <input name="action" type="hidden" value="reset">
              <h4 class="margin-bottom-1x">Restablecer Contraseña</h4>
              <div class="form-group input-group">
                  <input style="border-radius:35px" id="email" name="email" type="text" class="form-control" placeholder="Email" />
                <span class="input-group-addon"><i class="icon-mail"></i></span>
              </div>
             
              <div class="text-center text-sm-right">
                  <button class="btn btn-outline-primary float-right mt-3" style="font-size:15px;text-transform:uppercase;">Restablecer</button>
                
              </div>
            </form>
          </div>
        </div>
      </div>
<script>

    $("#login-box").on('submit',function( event ) {
 
  event.preventDefault();
let email=$("#email").val();
    if(email){
        //alert("las dos respuestas son true");
          $.ajax({
    type : 'POST',
    url : './controllers/userController.php',
    data : $('#login-box').serialize(),
   success:function(dat){
       console.log(dat);
       let resp = JSON.parse(dat);
            if(resp.status){
            Swal.fire({
                                                   icon: 'success',
                                                   title: resp.msn,
                                                   text: 'Hemos enviado un correo con los pasos para restablecer su contraseña a '+email

                                                 });
                                                 window.setTimeout(function () {
                            window.location.href = "./?pag=carrito"
                        }, 2000);
            } else {
                
                        Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: resp.msn

                      })
                  
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

