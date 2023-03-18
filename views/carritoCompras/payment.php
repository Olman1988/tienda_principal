<?php
?>
<div class="page-title" id='page-title'>
        <div class="container">
          <div class="column">
            <h1>Tipo de Pago</h1>
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
    <a class="active" href="<?=base_url?>?pag=checkout&&step=payment"><span class="angle"></span>Pago</a>

    
    <a class="" href="<?=base_url?>?pag=checkout&&step=shipping"><span class="angle"></span>Envío</a>
    
    <a class="" href="<?=base_url?>?pag=checkout&&step=general"><span class="angle"></span>General</a>
    
</div>
                     <h4>Métodos de Pago</h4>
            <hr class="padding-bottom-1x">
            <div class="table-responsive">
              <table class="table table-hover" id="table-payment">
                <thead class="thead-default">
                  <tr>
                    <th></th>
                    <th>Tipo</th>
                    
                    
                  </tr>
                </thead>
                <tbody>
                    <?php 
                    foreach ($respuestaMetodos as $respuestaMetodosValue) {
                    ?>
                  <tr>
                    <td class="align-middle" style="width:150px">
                        <input style="width:15px;height:15px;opacity:1" id="sinpe" value="sinpe" type="radio" name="tipoPago" value="<?=strtolower($respuestaMetodosValue['descripcion'])?>" onclick="" />
                        <img src="<?=base_url?>assets/imagenesPagos/<?=$respuestaMetodosValue['rutaImagen']?>" width="85px" height="" alt="alt"/>
                      
                    </td>
                    <td class="align-middle"><span class="text-medium"><?=$respuestaMetodosValue['alias']?></span> - <span class="text-medium" style="font-style: italic;font-size: 12px"><?=$respuestaMetodosValue['info']?></span></td>
                    
                      
                  </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>
            <div class="checkout-footer margin-top-1x">
              <div class="column"><a class="btn btn-outline-secondary" href="<?=base_url?>?pag=checkout&&step=shipping"><i class="icon-arrow-left"></i><span class="hidden-xs-down">&nbsp;Regresar</span></a></div>
              <div class="column">
                  <a id="btnContinuar"  class="btn btn-outline-primary" href="<?=base_url?>?pag=checkout&&step=review"><span class="hidden-xs-down">Continuar&nbsp;</span><i class="icon-arrow-right"></i></a>

              </div>
            </div>
          </div>
        </div>
     </div>
<script>
    
        $("#table-payment tr").click(function(e){
           e.currentTarget.firstElementChild.firstElementChild.checked=true
           console.log(e.currentTarget.firstElementChild.firstElementChild);
         });
    $("#btnContinuar").on('click', function(event){
        event.preventDefault();
       let radio=$("input[name=tipoPago]:checked").val();
       let dataFormulario={
             "radio":radio,
             "action":"carritoTipoPago"
            };
          $.ajax({
    type : 'POST',
    url : './carritoCompras/carritoController.php',
    data : dataFormulario,
   success:function(dat){
            if(dat!=false){
                Swal.fire({
                                                   icon: 'success',
                                                   title: 'Tipo de Pago',
                                                   text: 'Información de pago guardada'

                                                 });
               
               window.setTimeout(function () {
                            window.location.href = "./?pag=checkout&&step=review"
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