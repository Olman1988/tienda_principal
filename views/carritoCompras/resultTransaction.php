<?php
$descripResult = '';
$descripResult= $_GET['descrip'];
?>
<div class="page-title" id='page-title'>
        <div class="container">
          <div class="column">
            <h1>Respuesta compra</h1>
          </div>
          <div class="column">
            <ul class="breadcrumbs">
                <li><a href="<?=base_url?>?pag=carrito">Inicio</a>
              </li>
              <li class="separator">&nbsp;</li>
              <li>Respuesta Compra</li>
            </ul>
          </div>
        </div>
      </div>
<div class="container" style="margin-bottom:50px;">
    <div class="row">
        <div class="col-xl-9 col-lg-8 col-md-12">
            <?php
            if(!empty($descripResult)){
                switch ($descripResult) {
                    case 'Transaction is approved':
                        echo'<div class="alert alert-success" role="alert">
                                <h4 class="alert-heading"><span>Pago realizado</span><i class="fa-regular fa-circle-check" style="padding:15px"></i></h4>
                                <p>Su pago ha sido realizado satisfactoriamente</p>
                                <hr>
                                <p class="mb-0">En breve una persona de nuestro equipo se pondrá en contacto con usted.</p>
                              </div> <a class="btn btn-outline-success"  href="'.base_url.'" style="margin:auto">SEGUIR COMPRANDO</a> ';

                        break;
                    case "success":
                        echo'<div class="alert alert-success" role="alert">
                                <h4 class="alert-heading"><span>Pedido realizado</span><i class="fa-regular fa-circle-check" style="padding:15px"></i></h4>
                                <p>Su pedido ha sido realizado satisfactoriamente</p>
                                <hr>
                                <p class="mb-0">En breve una persona de nuestro equipo se pondrá en contacto con usted.</p>
                                <p>Para pagos por SINPE o Transferencia, el envío se iniciará hasta el momento que el dinero este reflejado en la cuenta bancaria. Favor enviar comprobante a:</p>
                                    <a href="https://wa.me/+506'.$profile->whatsApp.'?text=Hola!%20Comprobante%20de%20pago%20" style="text-decoration:none;font-size:20px;width:150px;background:#25D366;color:white;border-radius:25px;padding:10px;">Whastapp<i class="fa-brands fa-whatsapp ml-2" style="color:white;padding-left:10px;"></i></a>
                </div> <a class="btn btn-outline-success"  href="'.base_url.'" style="margin:auto">SEGUIR COMPRANDO</a> ';
                        break;
                     case "error":
                        echo'<div class="alert alert-danger" role="alert">
                                <h4 class="alert-heading"><span>Error en el proceso</span><i class="fa-regular fa-circle-check" style="padding:15px"></i></h4>
                                <p>Ha habido un inconvenuente para realizar su pedido</p>
                                <hr>
                                <p class="mb-0">Vuelva a intentar nuevamente o comuníquese con el administrador.</p>
                              </div> <a class="btn btn-outline-success"  href="'.base_url.'?pag=checkout&&step=review" style="margin:auto">INTENTAR NUEVAMENTE</a> ';
                        break;
                    default:
                        break;
                }
            
            }?>
            </div>
    </div>  
</div>    

