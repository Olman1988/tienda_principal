<?php

?>
<section id="ofertaLimitada" class="mt-4 p-1">
 <?php
 foreach ($respuestaOferta as $valueOferta) {
     
 
 ?>
    <div class="container row mx-auto mb-4">
        <div class="col-12 col-md-6">
            <div>
                <img class="img-fluid" src="<?=base_url3?><?=$valueOferta['rutaImagen']?>" alt="alt"/>
            </div>
                
        </div>
        <div class="col-12 col-md-6 row mx-auto align-items-center p-4" style="background:rgba(255,255,255,1)">
           <div style="height:300px;"> <h2 class="text-center fw-bold" style='font-size:50px'><?=$valueOferta['nombre']?></h2>
            <div class="row mx-auto mt-4" style="max-width:300px">
                <p class="text-center fw-bold" style='font-size:25px'><?=$valueOferta['descripcion']?></p>
                <a class='btn btn-outline-primary-2 text-center mx-auto' style="width:220px;font-size:18px" href="./?pag=product&&id=<?=$valueOferta['cat_CodigoCategoria_FK']?>">VER MÁS</a>
           </div> 
               </div>
        </div>
    </div>
        <?php
 }
 $nombreCookie = '';
 foreach ($respuestaOfertaActiva as $respuestaOfertaActivavalue) {
     $nombreCookie = $respuestaOfertaActivavalue['nombre'];
    ?>
    <!-- Modal -->
<div class="modal fade" id="modalOferta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" style="">
      <div class="modal-content" style="border:none;background:white;width:730px;padding:15px;max-width:90%;overflow:hidden;">
    <div class="" style="min-width:100%;height:500px;background:transparent;background-image:url('https://balloons.tecnosula.com/assets/imagenesPromo/<?=$respuestaOfertaActivavalue['rutaImagen']?>');background-size:700px 900px;position:relative;background-position:center;background-repeat:no-repeat;">
   <i onclick='cerrarModal()' style='border-radius:50%;cursor:pointer;color:white;font-size:35px;position:absolute;top:10px;right:10px;box-shadow: 2px 2px 2px gray;background:gray' class="fa-solid fa-circle-xmark"></i>

      
  </div>    
  
    
      <div style="">
                <div style='width:100%;padding:20px;text-align: center;top:0px;left:0px;background:transparent'>
                <h3 style=''><?=$respuestaOfertaActivavalue['nombre']?></h3>
                <p class="text-description-modal" style=''><?=$respuestaOfertaActivavalue['descripcion']?></p>
             <a class='btn btn-outline-primary-2 text-center mx-auto mt-3' style="width:150px;" href="./?pag=contacto">CONTÁCTENOS</a>
                </div>

      </div>
    </div>
    </div>
</div>
    <?php
    }
    ?>
    <script>
//// Set the date we're counting down to
//var countDownDate = new Date("<?=$valueOferta['fecha']?>").getTime();
//
//// Update the count down every 1 second
//var x = setInterval(function() {
//
//  // Get today's date and time
//  var now = new Date().getTime();
//    
//  // Find the distance between now and the count down date
//  var distance = countDownDate - now;
//    
//  // Time calculations for days, hours, minutes and seconds
//  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
//  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
//  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
//  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
//    
//  // Output the result in an element with id="demo"
// $("#dias<?=$valueOferta['nombre']?>").text(days);
// $("#horas<?=$valueOferta['nombre']?>").text(hours);
// $("#mins<?=$valueOferta['nombre']?>").text(minutes);
// $("#secs<?=$valueOferta['nombre']?>").text(seconds);
//    
//
//  if (distance < 0) {
//    clearInterval(x);
//    document.getElementById("demo").innerHTML = "EXPIRED";
//  }
//}, 1000);


let promo = getCookie("<?=$nombreCookie?>");

  if (promo != "") {
   
  } else {
       var nuevoInterval = setInterval(function() {
    $('#modalOferta').appendTo("body");
    $('#modalOferta').modal('show'); 
   clearInterval(nuevoInterval);
}, 1000);
     setCookie("<?=$nombreCookie?>", '<?=$nombreCookie?>', 1); 
      }
function cerrarModal(){
  $('#modalOferta').modal('hide');   
}

function setCookie(cname, cvalue, exdays) {
  const d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  let expires = "expires="+ 0;
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
  let name = cname + "=";
  let ca = document.cookie.split(';');
  for(let i = 0; i < ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}
function deleteCookie(){
    document.cookie = <?=$nombreCookie?> + '=;expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}

</script>

    
</section>



