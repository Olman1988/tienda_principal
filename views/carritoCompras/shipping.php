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
                    <?php
                    if(isset($respLogistic[0]['entregaOficina'])&& $respLogistic[0]['entregaOficina']==1){
                    ?>
                  <tr style="cursor:pointer;">
                    <td class="align-middle" style="width:50px;">
                        <input style="width:15px;height:15px;opacity:1"  class="radioForm" id="" type="radio" name="modoEnvio" value="Oficina" checked="checked" />
                    </td>
                    <td class="align-middle" style=""><span class="text-medium">Oficinas</span><br><span class="text-muted text-sm">Recoger en local</span></td>
                  <td>-</td>
                  </tr>
                  <?php
                  }
                  if(isset($respLogistic[0]['entregaOficina'])&& $respLogistic[0]['entregaDomicilio']==1){
                  ?>
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
               
            </select>
                  <p id="requiredProvincia" style="color:red;display:none">***Espacio Requerido</p>
                        </div>
                  </div>
                  <div class="col-sm-4">
                      <div class="form-group">
                  <label for="reg-email">Cantón</label>
                      <select  name="canton" id="slt-cantones" class="form-control">
            
        </select>
                  <p id="requiredCanton" style="color:red;display:none">***Espacio Requerido</p>
                        </div>
                  </div>
                  <div class="col-sm-4">
                      <div class="form-group">
                  <label for="reg-email">Distrito</label>
                      <select name="distrito" id="slt-distritos" class="form-control">
           
        </select>
                  <p id="requiredDistrito" style="color:red;display:none">***Espacio Requerido</p>
                        </div>
                  </div>
              </div>
                        <div class="row">
                  <div class="col-sm-12">
                        <input name="direccion" type="text" id="direccion" placeholder="Dirección de entrega" class="form-control" required="" value="" />
                  <p id="requiredDireccion" style="color:red;display:none">***Espacio Requerido</p>  
                  </div>
                    </div>
                      </form>      
                    </td>
                    <td class="align-middle">
                        <button class="btn btn-outline-primary-2" onclick="calculateCost()">Calcular Costo</button>
                        <div id="container_cost" class ="text-center mt-2" style="display:none;font-size:20px;font-weight:600"><span id="cost_envio"></span></div>
                    </td>
                    
                  </tr>
                  <?php
                  }
                  ?>
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
        var existsCost = false;
        var respCalc = false;
      function calculateForUbicacion(){
          let province = $("#slt-provincias").val();
          let canton = $("#slt-cantones").val();
          let district = $("#slt-distritos").val();
          let address = $("#direccion").val();
          
          if(province===''||province=='-- Seleccione una provincia --'||province==null){
              $("#requiredProvincia").css("display","block");
          } else {
              $("#requiredProvincia").css("display","none");
          }
          if(canton===''||canton=='-- Seleccione un cantón --'||canton==null){
              $("#requiredCanton").css("display","block");
          }else {
              $("#requiredCanton").css("display","none");
          }
          if(district===''||district=='-- Seleccione un distrito --'||district==null){
              $("#requiredDistrito").css("display","block");
          } else {
             $("#requiredDistrito").css("display","none"); 
          }
          if(address===''){
              $("#requiredDireccion").css("display","block");
          } else {
              $("#requiredDireccion").css("display","none");
          }
          let datos = {
              "action":"calcularCCosto",
              "province":province,
              "canton":canton,
              "district":district,
              "address":address
          }
          let dataFormulario='';
          if(province!=''&&canton!=''&&district!=''&&address!=''){
              $.ajax({
                    type : 'POST',
                    url : './controllers/generalController.php',
                    data : datos,
                   success:function(dat){
                            if(dat!=false){
                                respCalc =true;
                                $("#container_cost").css("display","block");
                                $("#cost_envio").text("₡"+dat)
                                dataFormulario=$('#formMetodo').serialize();
                                    $.ajax({
                                        type : 'POST',
                                        url : './carritoCompras/carritoController.php',
                                        data : dataFormulario,
                                        success:function(dat){
                                                  if(dat!=false){
                                                      Swal.fire({
                                                          icon: 'success',
                                                          title: 'Costo de envío',
                                                          text: 'Información de costo de envío guardada'
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
                            } else {
                                     Swal.fire({
                                        icon: 'error',
                                        title: 'Error en los datos requeridos',
                                        text: 'Si ha seleccionado la opción de entrega a domicilio, debe completar los espacios de ubicación'

                                      })
                              }
                            }
                        });
            } else {
               Swal.fire({
                        icon: 'error',
                        title: 'Error en los datos requeridos',
                        text: 'Si ha seleccionado la opción de entrega a domicilio, debe completar los espacios de ubicación'

                      })
          }
      }  
      function calculateCost(){
          let province = $("#slt-provincias").val();
          let canton = $("#slt-cantones").val();
          let district = $("#slt-distritos").val();
          let address = $("#direccion").val();
          let datos = {
              "action":"calcularCCosto",
              "province":province,
              "canton":canton,
              "district":district,
              "address":address
          }
          
          if(province!=''&&canton!=''&&district!=''&&address!=''){
          $.ajax({
    type : 'POST',
    url : './controllers/generalController.php',
    data : datos,
   success:function(dat){
           existsCost= true;
            if(dat!=false){
                $("#container_cost").css("display","block");
                $("#cost_envio").text("₡"+dat)
            } else {
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'No ha sido posible calcular el costo de envío,póngase en contacto con la administración'
              
              })
            }
        }
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Formulario Incompleto...',
                text: 'Debe completar el formulario de ubicación'
              
              })
        }
      }
         $("#table-shipping tr").click(function(e){
         //  e.preventDefault();
           
           if(e.currentTarget.firstElementChild.firstElementChild.value=='Ubicacion'){
               $('input:radio[name=modoEnvio]')[1].checked = true;
           }else {
               $('input:radio[name=modoEnvio]')[0].checked = true;
           }
           //e.currentTarget.firstElementChild.firstElementChild.checked=true
         });
     
        //href="<?=base_url?>?pag=checkout&&step=payment"
    $("#btnContinuar").on('click', function(event){
        event.preventDefault();
       let radio=$("input[name=modoEnvio]:checked").val();
       let dataFormulario;
        if(radio=="Ubicacion"){
            calculateForUbicacion();
        } else {
            dataFormulario={
             "radio":radio,
             "action":"carritoEnvio"
            };
                $.ajax({
                                        type : 'POST',
                                        url : './carritoCompras/carritoController.php',
                                        data : dataFormulario,
                                        success:function(dat){
                                                  if(dat!=false){
                                                      Swal.fire({
                                                          icon: 'success',
                                                          title: 'Costo de envío',
                                                          text: 'Información de costo de envío guardada'
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
            
        }

});
       
    
  
    </script>