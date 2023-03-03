<?php
?>
<div class="page-title" id='page-title'>
        <div class="container">
          <div class="column">
            <h1>Costo de Envío</h1>
          </div>
          <div class="column">
            <ul class="breadcrumbs">
              <li><a href="/">Inicio</a>
              </li>
              <li class="separator">&nbsp;</li>
              <li>Costo de Envío</li>
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

    
    <a class="active" href="<?=base_url?>?pag=checkout&&step=shipping"><span class="angle"></span>Envío</a>
    
    <a class="" href="<?=base_url?>?pag=checkout&&step=general"><span class="angle"></span>General</a>
    
</div>
                     <h4>Costo de envío</h4>
            <hr class="padding-bottom-1x">
            <div class="table-responsive">
              <table class="table table-hover" id="table-shipping">
                <thead class="thead-default">
                  <tr>
                    <th></th>
                    <th>Modo de envío</th>
                    
                    <th>Costo de envío</th>
                  </tr>
                </thead>
                <tbody>
                  <tr style="cursor:pointer;">
                    <td class="align-middle" style="width:50px;">
                        <input style="width:15px;height:15px;opacity:1"  class="radioForm" id="" type="radio" name="modoEnvio" value="Oficina" checked="checked" />
                    </td>
                    <td class="align-middle" " style=""><span class="text-medium">Oficinas</span><br><span class="text-muted text-sm">Recoger en local</span></td>
                  </tr>
                    <tr style="cursor:pointer;">
                        
                    <td class="align-middle" id="radio_row" style="width:50px;cursor:pointer">
                        
                      <input style="width:15px;height:15px;opacity:1" class="radioForm" id="" type="radio" name="modoEnvio" value="Ubicacion" value="Ubicacion" />
                    </td>
                    <td class="align-middle"><span class="text-medium">Ubicación</span><br>
                        <form id="formMetodo">
                            <input type="hidden" name="action" value="carritoEnvio">
                            <input type="hidden" name="radio" value="Ubicacion">

                        <div class="row">
                  <div class="col-sm-4">
                      <div class="form-group">
                  <label for="reg-email">Provincia</label>
                        <select name="provincia" id="slt-provincias" class="form-control">
                <option value="">-- Seleccione una provincia --</option>
            </select>
                        </div>
                  </div>
                  <div class="col-sm-4">
                      <div class="form-group">
                  <label for="reg-email">Cantón</label>
                      <select  name="canton" id="slt-cantones" class="form-control">
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
                        <input name="direccion" type="text" id="direccion" class="form-control" required="" value="" />
                    </div>
                    </div>
                      </form>      
                    </td>
                    
                    
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="checkout-footer margin-top-1x">
                <div class="column"><a class="btn btn-outline-secondary" href="<?=base_url?>?pag=checkout&&step=general"><i class="icon-arrow-left"></i><span class="hidden-xs-down">&nbsp;Regresar</span></a></div>
              <div class="column">
                  <a id="btnContinuar"  class="btn btn-outline-primary" ><span class="hidden-xs-down">Continuar&nbsp;</span><i class="icon-arrow-right"></i></a>

              </div>
            </div>
          </div>
        </div>
     </div>

<script src="./assets/js/distribucion-cr.js"></script>
    <script src="./assets/js/formulario.js"></script>
    
    <script>
      
         $("#table-shipping tr").click(function(e){
           e.preventDefault();
           e.currentTarget.firstElementChild.firstElementChild.checked=true
           console.log(e.currentTarget.firstElementChild.firstElementChild);
         });
     
        //href="<?=base_url?>?pag=checkout&&step=payment"
    $("#btnContinuar").on('click', function(event){
        event.preventDefault();
       let radio=$("input[name=modoEnvio]:checked").val();
       let dataFormulario;
        if(radio=="Ubicacion"){
            dataFormulario=$('#formMetodo').serialize()
        } else {
            dataFormulario={
             "radio":radio,
             "action":"carritoEnvio"
            };
        }
        console.log(dataFormulario);
          $.ajax({
    type : 'POST',
    url : './carritoCompras/carritoController.php',
    data : dataFormulario,
   success:function(dat){
           
            if(dat!=false){
       
            
    
                Swal.fire({
                                                   icon: 'success',
                                                   title: 'Enviado',
                                                   text: 'Información de pago guardada'

                                                 });
               
               window.setTimeout(function () {
                            window.location.href = "./?pag=checkout&&step=payment"
                        }, 2000);
                            
    
            } else {
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Datos incorrectos'
              
              })
            }
        }
            });
         
});
       
    
  
    </script>