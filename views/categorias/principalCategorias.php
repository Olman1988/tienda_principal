<?php
$referenciaParaBotones='titleCategoria';
?>
      <section class="container pt-4 mt-4">
        <h3 id="titleCategoria" class="text-center mb-30 tbs">Categorías</h3>
        <div class="row">
            <?php
            $cont=0;
           
            foreach ($respCategoriasDestacadas as $value) {
            $cont++;
            $ext="ex$cont"
            
            ?>
            
          <div class="col-md-4 col-sm-6 mt-4">
            <div class="card mb-30">
                <a class="card-img-tiles" href="<?=base_url2?>?pag=categorias&&id=<?=$value['cat_CodigoCategoria']?>&&nombre=<?=$value['cat_Descripcion']?>">
                <div class="inner">
                  <div class="main-img zoom" id="<?=$ext?>" ><img src="<?=base_url.$value['rutaImagen']?>" alt="Categoria"></div>
                  
                </div></a>
              <div class="card-body text-center">
                <h4 class="card-title"><?=$value['cat_Descripcion']?></h4>
                
                  <a class="btn btn-outline-primary btn-sm" href="<?=base_url?>?pag=categorias&&id=<?=$value['cat_CodigoCategoria']?>&&nombre=<?=$value['cat_Descripcion']?>">VER PRODUCTOS</a>
              </div>
            </div>
          </div>
       <?php  }
            ?>
            
        </div>
        <div class="text-center"><a class="btn btn-outline-secondary m-4" href="<?=base_url?>?pag=categorias">TODAS LAS CATEGORÍAS</a></div>
  
     
      </section>
     
      </section>

<script>

    $(document).ready(function(){
    
    $(window).scroll(function(){
        
        let elemento=document.getElementById("info-up");
        let pos=elemento.getBoundingClientRect().bottom;
        let sliderP=document.getElementById("carouselExampleControls");
       
         let posSlider=sliderP.getBoundingClientRect().bottom;       
        
       if(pos<=0){
           $('#nav-fix').addClass('fixed-top');

           $('#carouselExampleControls').css('margin-top','80px');
       }else{
         $('#nav-fix').removeClass('fixed-top');
       $('#carouselExampleControls').css('margin-top','0px');
       }   
          if(posSlider<0){
           
        
           $('#box_scroll').css('display','block');
        
         $('#box_scroll').addClass('animate__bounceIn');
         $('#box_scroll').removeClass('animate__bounceOut');
       }else{
        
         $('#box_scroll').removeClass('animate__bounceIn');
         $('#box_scroll').addClass('animate__bounceOut');
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

