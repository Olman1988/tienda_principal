<?php
require_once 'controllers/generalController.php';
$consultaFAQ= new generalController();
$respuestaFAQTipos = $consultaFAQ->tiposPreguntas();

?>



    <!-- Page Content-->
    <div class="container pb-3">
        
          <!-- Side Menu-->
           <?php
           $contador=1;
              if($respuestaFAQTipos!=false && count($respuestaFAQTipos)>0){
                  foreach ($respuestaFAQTipos as $valueFAQTipos) {
                      
                  
             ?>
          <div class="row mt-4">
          <div class="col-lg-3 col-md-4">
              <nav class="list-group"><a class="list-group-item active" href="#"><?=$valueFAQTipos['nombre']?></a></nav>
            <div class="pb-3 hidden-md-up"></div>
          </div>
          <!-- Content-->
          <div class="col-lg-9 col-md-8">
             
              
            <div class="accordion" id="accordionExample">
                <?php
                             
                 $respuestaFAQ=$consultaFAQ->todasPreguntasFrecuentes($valueFAQTipos['id']);
                
                if(count($respuestaFAQ)>0){
                    foreach ($respuestaFAQ as $valueFAQ) {
                        
                    
                
                ?>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button collapsed" style="color:rgba(100,100,100,1);font-weight:600;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne<?=$contador?>" aria-expanded="true" aria-controls="collapseOne<?=$contador?>">
        <?=$valueFAQ['pregunta']?>
      </button>
    </h2>
    <div id="collapseOne<?=$contador?>" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
          <?=$valueFAQ['contenido']?>
      </div>
    </div>
  </div>
                <?php
                $contador++;
                    }
                }
              ?>
                     </div>
          
          </div>
        </div>
                  
                  <?php  
              }
            }
                ?>
             
          <h3 class="pt-4 mt-4">¿Tienes alguna pregunta?</h3>
            
            <form class="row" method="post">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="help_name">Su nombre</label>
                  <input class="form-control form-control-rounded" type="text" id="help_name" required>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="help_email">Su Email</label>
                  <input class="form-control form-control-rounded" type="email" id="help_email" required>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="help_subject">Asunto</label>
                  <input class="form-control form-control-rounded" type="text" id="help_subject" required>
                </div>
              </div>
              
              <div class="col-12">
                <div class="form-group">
                  <label for="help_question">Pregunta </label>
                  <textarea class="form-control form-control-rounded" id="help_question" rows="8" required></textarea>
                </div>
              </div>
              <div class="col-12 text-right mt-4">
                <button class="btn btn-outline-primary-2" style="text-transform:uppercase;font-size:15px;" type="submit">Enviar pregunta</button>
              </div>
            </form>
      </div>

        
<script>

    $(document).ready(function(){
    
    $(window).scroll(function(){
        
        let elemento=document.getElementById("info-up");
        let pos=elemento.getBoundingClientRect().bottom;
           
        
       if(pos<=0){
           $('#nav-fix').addClass('fixed-top');
           $('#page-title').css('margin-top','80px');

       }else{
         $('#nav-fix').removeClass('fixed-top');
         $('#page-title').css('margin-top','0px');
       
       }   
       
    });
 $('.navbr ul li a').click(function(){
        // applying again smooth scroll on menu items click
        $('html').css("scrollBehavior", "smooth");
    });
 $('.href_contact').click(function(){
        // applying again smooth scroll on menu items click
        $('html').css("scrollBehavior", "smooth");
    });


  $("#js-top").click(function(event) {
        event.preventDefault();
        $("html, body").animate({ scrollTop: 0 }, "slow");
        return false;
    });  
});
</script>