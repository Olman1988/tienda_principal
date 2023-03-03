<?php

?>
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner" style="max-height:90vh">
     <?php
      $activeC=true;
      foreach ($respuestaSlider as $respuestaSlidervalue) {
          
      if($activeC){
         $activeC=false; 
      ?>
    <div class="carousel-item active">
        <?php
      } else{
        ?>
        <div class="carousel-item ">
        <?php
      }
        ?>
        <a href="<?=$respuestaSlidervalue['url']?>"><img style="object-fit:cover;min-height: 80vh;max-height:80vh;" src="<?=base_url2.$respuestaSlidervalue['sliderPath']?>" class="d-block w-100" alt="..."></a>
    </div>
    
      <?php
      }
      ?>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

