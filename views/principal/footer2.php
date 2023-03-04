<?php


?>
<footer class="site-footer" id='site-footer'>
        <div class="container">
          <div class="row principal-section">
            <div class="col-lg-3 col-md-6">
              <!-- Contact Info-->
              <section class="widget mb-4">
<h3 class="widget-title">Mantente en contacto</h3>
<?php
if($profile->phone!=''){
?>
                <p class="text-custom"><i class="fa fa-phone pr-2"></i><span style="margin-left:10px">Teléfono:</span> <a class="text-custom" style="text-decoration:none;" href="tel:+506<?=$profile->phone?>">+506 <?=$profile->phone?></a></p>
<?php
}
if($profile->mobile!=''){
?>
                <p class="text-custom" style=""><i class="fa-solid fa-mobile-screen-button pr-2"></i><span class="" style="margin-left:12px">Móvil:</span> <a class="text-custom" style="text-decoration:none;" href="tel:+506<?=$profile->mobile?>">+506 <?=$profile->mobile?></a></p>
 <?php
 }
				  
if($profile->infoEmail!=''){
 ?>               
                <p><a class="navi-link-light text-custom text-decoration-none" href="mailto:<?=$profile->infoEmail?>"><i class="fa-regular fa-envelope pl-2"></i><span style="margin-left:10px"><?=$profile->infoEmail?></span></a></p>
<?php
					  }
				  ?>	  <div class="text-custom">
                    <?php
                  
                  echo $evaluar->evaluarInfo($profile->whatsApp, "whatsApp");
                  echo $evaluar->evaluarInfo($profile->facebook, "facebook");
                  echo $evaluar->evaluarInfo($profile->instagram, "instagram");
                  echo $evaluar->evaluarInfo($profile->twitter, "twitter");
                  echo $evaluar->evaluarInfo($profile->pinterest, "pinterest");
                  echo $evaluar->evaluarInfo($profile->linkedin, "linkedin");
                  echo $evaluar->evaluarInfo($profile->youtube, "youtube");
              ?>
                 </div> 
                  
                  
              </section>
            </div>
            
            <div class="col-lg-3 col-md-6">
              <!-- About Us-->
              <section class="widget widget-links widget-light-skin mb-4">
                <h3 class="widget-title">Nosotros</h3>
                <ul>
                    <?php
          foreach ($consultaAcercaDe as $consultaAcercaDevalue) {
              
          
          ?>
          <li><a class="text-custom" style="" href="<?=base_url?>?pag=nosotros&&cod=<?=$consultaAcercaDevalue['codigo']?>"><?=$consultaAcercaDevalue['nombre']?></a>
            </li> 
        <?php 
          }
        
        ?>
                    
                    
                    
                  
                    
                </ul>
              </section>
            </div>
            <div class="col-lg-3 col-md-6">
              <!-- Account / Shipping Info-->
              <section class="widget widget-links widget-light-skin">
                <h3 class="widget-title">Cuenta</h3>
                <ul>
                  <li><a class="text-custom" href="./?pag=cuenta&&func=login">Su Cuenta</a></li>
                </ul>
              </section>
            </div>
          </div>
          
          <div class="row">
              
            <div class="col-md-7 padding-bottom-1x">
              <!-- Payment Methods-->
              <div class="margin-bottom-1x" style="max-width: 615px;">
                  <?php
                  if(isset($respuestaMetodos)){
                          foreach ($respuestaMetodos as $respuestaMetodosValue) {
                              
                          
                  ?>
                  <img style="width:100px;" src="<?=base_url?>assets/imagenesPagos/<?=$respuestaMetodosValue['rutaImagen']?>" alt="Payment Methods">
                  <?php
                  }
                  }
                  ?>
              </div>
            </div>
            <div class="col-md-5 padding-bottom-1x">
              <div class="margin-top-1x hidden-md-up"></div>
              <!--Subscription-->
              
            </div>
              <p class="footer-copyright" style="margin-top:50px;">© Todos los derechos reservados. </p>
          </div>
          <!-- Copyright-->
          
        </div>
      </footer>
<script>
    $(document).ready(function(){
    
    $(window).scroll(function(){
        
        let elemento=document.getElementById("info-up");
        let pos=elemento.getBoundingClientRect().bottom;
        let sliderP=document.getElementById("info-up");
        let posSlider=sliderP.getBoundingClientRect().bottom;       
        
       if(pos<=0){
         $('#nav-fix').addClass('fixed-top');
         $('#sliderP').css('margin-top','80px');
       }else{
         $('#nav-fix').removeClass('fixed-top');
         $('#sliderP').css('margin-top','0px');
       }   
        if(posSlider<0){
         $('#box_scroll').css('display','block');
         $('#box_scroll').addClass('animate__bounceIn');
         $('#box_scroll').removeClass('animate__bounceOut');
         $('#box_w').css('display','block');
         $('#box_w').addClass('animate__bounceIn');
         $('#box_w').removeClass('animate__bounceOut');
       }else{
         $('#box_scroll').removeClass('animate__bounceIn');
         $('#box_scroll').addClass('animate__bounceOut');
         $('#box_w').removeClass('animate__bounceIn');
         $('#box_w').addClass('animate__bounceOut');
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
    

<