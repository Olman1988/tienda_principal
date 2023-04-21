<?php
?>

 <div class=" padding-bottom-3x mb-4 pb-4 m-auto" style="height:100vh;width:100%;background:linear-gradient(90deg, rgba(73,139,241,1) 0%, rgba(0,0,0,1) 100%, rgba(210,174,121,1) 100%);">
        <div class="row m-auto" style="background:white;box-shadow: 1px 1px 10px gray;position:absolute;top:0px;bottom:0px;left:0px;right:0px;max-width:90%;width:800px;height:350px;border-radius:15px;">
            <div class="col-md-6 col-sm-12 mt-4 p-4" style="min-height:300px;">
                <img class="m-auto" style="width:250px;display:block;object-fit:cover;position: absolute;top: 0px;bottom: 0px;left:0px;right:0px;" src="<?=base_url.$respPerfil->logo?>" alt=""/>
                </div>
          <div class="col-md-6 col-sm-12 mt-4 p-4">
            <form id="login-box" class="login-box m-auto" method="post">
              <input name="action" type="hidden" value="login">
              <h4 class="margin-bottom-1x">Inicio de sesión</h4>
              <div class="form-group input-group" >
                  <input style="border-radius:35px" id="email" name="email" type="text" class="form-control" placeholder="Email" />
                               <span class="input-group-text" style='background:white!important;border:none!important;'><i style='color:white;' class="fa-regular fa-eye"></i></span>

              </div>
              <div class="form-group input-group"style=''>
                  <input style="border-radius:35px" id="pass" name="pass" type="password" class="form-control" placeholder="Password" />
               <span id='changeViewPass' class="input-group-text" style='background:white!important;border:none!important;' ><i style='font-size:20px;cursor:pointer;' id='iconPass' class="fa-regular fa-eye-slash"></i></span>
              </div>
              <div class="d-flex flex-wrap justify-content-between padding-bottom-1x">
                  <span id="ContentPlaceHolder1_FailureText"></span>
                   
                  
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
    url : '../controllers/userController.php',
    data : $('#login-box').serialize(),
   success:function(dat){
       console.log(dat);
       if(Number.isInteger(parseInt(dat,10))){
         
            if(dat==2){
            Swal.fire({
                                                   icon: 'success',
                                                   title: 'Sesión Iniciada',
                                                   text: 'Bienvenido!!!'

                                                 });
                                                 window.setTimeout(function () {
                            window.location.href = "./"
                        }, 2000);
            } else {
                if(dat===0){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Datos incorrectos'

                      }) 
                } else {
                            Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'No cuenta con los permisos para esta sección, contacte al administrador'

                           })
                     }
                  }
                  
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
         Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'El email o password están vacíos'

                      })
    }
    }
);

</script>
