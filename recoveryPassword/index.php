<?php
date_default_timezone_set("America/Costa_Rica");
ini_set('display_errors',1);
ini_set('log_errors',1);
ini_set("error_log","C:/xampp/htdocs/proyectos_2021/errores/logs");
$otp = isset($_GET['OTP'])&&$_GET['OTP']!=''?$_GET['OTP']:0;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,user scalable=no, initial-scale=1.0, maximun-scale=1.0">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <title>Residuos</title>
        <!-- REQUIRED JQUERY AND BOOSTRAP -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <!--FONTAWESOME-->
         <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
 
        <!--ICONOS-->
        <script src="https://kit.fontawesome.com/b58e5dabf0.js" crossorigin="anonymous"></script>
    </head>
     <style>
        </style>
<body>
    <div class=" padding-bottom-3x pb-4 m-auto" style="height:100vh;width:100%;background:linear-gradient(90deg, rgba(73,139,241,1) 0%, rgba(0,0,0,1) 100%, rgba(210,174,121,1) 100%);">
    <div class="row m-auto" style="height:auto;max-height:450px;background:white;box-shadow: 1px 1px 10px gray;position:absolute;top:0px;bottom:0px;left:0px;right:0px;max-width:90%;width:800px;border-radius:15px;">
        <div class="col-md-6 col-sm-12 mt-4 p-4" style="max-height:450px;position:relative;">
            <img class="m-auto" style="width:250px;display:block;object-fit:cover;position: absolute;top: 0px;bottom: 0px;left:0px;right:0px;" src="../assets/images/general/logo.jpg" alt=""/>
        </div>
        <div class="col-md-6 col-sm-12 mt-4 p-4">
            <form id="recoveryForm" class="login-box m-auto" method="post">
                <input name="action" type="hidden" value="change-password">
                <input name="OTP" type="hidden" value="<?=$otp?>">
                
                <h4 class="margin-bottom-1x">Inicio de sesión</h4>
                <div class="form-group input-group" >
                    <input style="border-radius:35px;margin-top:20px;" id="email" name="email" type="text" class="form-control" placeholder="Email" />
                    <span class="input-group-text" style='background:white!important;border:none!important;'><i style='color:white;' class="fa-regular fa-eye"></i></span>
                </div>
                <label for="reg-ln" class="mt-2">Nueva clave</label>
                <div class="form-group input-group"style=''>
                    
                      <input style="border-radius:35px;margin-top:20px;" id="newPassword" name="newPassword" type="password" class="form-control" placeholder="Password" />
                     <span id='changeViewPass' class="input-group-text" style='background:white!important;border:none!important;margin-top:20px;' ><i style='font-size:20px;cursor:pointer;' id='iconPass' class="fa-regular fa-eye-slash"></i></span>
                </div>
              <label for="reg-ln" class="mt-2">Confirmar clave</label>
                <div class="form-group input-group"style=''>
                    
                      <input style="border-radius:35px;margin-top:20px;" id="newPasswordConfirm" name="newPasswordConfirm" type="password" class="form-control" placeholder="Password" />
                     <span id='changeViewPass2' class="input-group-text" style='background:white!important;border:none!important;margin-top:20px;' ><i style='font-size:20px;cursor:pointer;' id='iconPass2' class="fa-regular fa-eye-slash"></i></span>
                </div>
                <div class="text-center text-sm-right">
                    <button class="btn btn-outline-primary float-right mt-3" style="font-size:15px;text-transform:uppercase;">Enviar Datos</button>
                </div>
            </form>
        </div>
    </div>
</div>
    <script>
          let visiblePass=false;
            let visiblePass2=false;
    $("#changeViewPass").on('click',function( event ) {
        if(visiblePass){
           $('#iconPass').removeClass('fa-eye');
         $('#iconPass').addClass('fa-eye-slash');
         $('#newPassword').attr('type','password');
         
         
         visiblePass =false;
        }else{
           $('#iconPass').addClass('fa-eye');
         $('#iconPass').removeClass('fa-eye-slash');  
         
         $('#newPassword').attr('type','text');
     
         visiblePass =true;
        }
      
        
    }); 
    
    $("#changeViewPass2").on('click',function( event ) {
        if(visiblePass2){
           $('#iconPass2').removeClass('fa-eye'); 
         $('#iconPass2').addClass('fa-eye-slash');
         $('#newPasswordConfirm').attr('type','password');
         visiblePass2 =false;
        }else{
           $('#iconPass2').addClass('fa-eye');
         $('#iconPass2').removeClass('fa-eye-slash');  
         $('#newPasswordConfirm').attr('type','text');
         visiblePass2 = true;
        }
      
        
    }); 
    
$("#recoveryForm").on('submit',function( event ) {
    event.preventDefault();
    const isStrongPassword = p => p.search(/^((?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=\S+$)(?=.*[;:\.,!¡\?¿@#\$%\^&\-_+=\(\)\[\]\{\}])).{8,20}$/)!=-1;

    let pass1=$("#newPassword").val();
    let pass2=$("#newPasswordConfirm").val();
    let respuestaValidacion=validarIguales(pass1,pass2);
    
    if(!respuestaValidacion){
        Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Las contraseñas son diferentes'
                      });
    }else{
         let respuesta = isStrongPassword(pass2);
         if(!respuesta){
        Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'La contraseña debe tener al menos 8 caracteres/La contraseña debe tener al menos una minúscula y una mayúscula/La contraseña debe tener al menos un caracter especial ?¿@#\$%'
                      });
    }else {
             $.ajax({
    type : 'POST',
    url : '../controllers/userController.php',
    data : $('#recoveryForm').serialize(),
   success:function(dat){
        if(dat.status){
               Swal.fire({
                          icon: 'success',
                          title: 'Guardado',
                          text: dat.msn
                         });
               window.setTimeout(function () {
                            window.location.href = "../?pag=cuenta&&func=login"
                        }, 2000);
            } else {
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: dat.msn
              
              })
            }
        } 
        }
        //aqui
         
);
    }
    }
});
function validarIguales(){
    if($("#newPassword").val()!=$("#newPasswordConfirm").val()){
       
        return false;
            
    } else {
      
       return true;
    }
} 
    
    </script>
    </body>
    </html>
   
        

