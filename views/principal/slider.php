
<?php
$sliderDesktopAvailable;
$sliderType;
$sliderMobileAvailable;
$contSlider =0;
if($sliderDesktopAvailable){
    echo "<div class='desktop-container'>";
    if($sliderType=='Move'){
?>
        <div id="sliderI" class="sliderMov">
<?php
            foreach($arraySlider['sliderDesktop'] as $arrayValues){
            ?>
            <div id="escritorio">
				<div  class="myslider fdd">
					<a href="<?= $arrayValues['url'] ?>">
						<div class="image_slider home" style="background-image:url(<?= base_url . $arrayValues['sliderPath']?>);height: 37em !important;"></div>
						<div class="txt_slider" style="margin-bottom:50px">
							<div class="div_slider">  
								<div class="slider_container-buttons"></div>
							</div>
						</div>
					</a>
				</div>
			</div>
            <?php
            $contSlider++;
            }
		?>
			<div class="p_n">
				<a class="prev" onclick="plusSlides(-1)">&#10094</a>
				<a class="next" onclick="plusSlides(1)">&#10095</a>
			</div>
			<div class="dotsbox" style="text-align:center">
				<?php
				if($contSlider>0){
					for($i=0;$i<$contSlider;$i++){
				?>
					<span class="dot" onclick="currentSlide(<?=$i+1?>)"></span>
				<?php
					}
				}
				?>
			</div>
		</div>
		<script>
			const myslide=document.querySelectorAll('.myslider');
			//const text=document.querySelectorAll('.txt_slider');
			dot = document.querySelectorAll('.dot');
			let counter=1;
			slidefun(counter);
			let timer=setInterval(autoslide,15000);
			function autoslide(){
				counter+=1;
				slidefun(counter);
			}
			function plusSlides(n){
				counter+=n;
				slidefun(counter);
				resetTimer();
			}
			function currentSlide(n){
				counter=n;
				slidefun(counter);
				resetTimer();
			}
			function resetTimer(){
				clearInterval(timer);
				timer=setInterval(autoslide,15000);
			}
			function slidefun(n){
				let i;
				for(i=0;i<myslide.length;i++){
					myslide[i].style.display="none";
				}
				for(i=0;i<dot.length;i++){
					dot[i].classList.remove('actives');
				}
				if(n>myslide.length){
					counter=1;
				}
				if(n<1){
					counter=myslide.length
				}
				myslide[counter-1].style.display='block';
				//myslide[counter-1].img.classList.add='animate_zoomIn';
				myslide[counter-1].firstChild.nextSibling.classList.add('animate__fadeIn');
				//text[counter-1].firstChild.nextSibling.classList.add('animate__fadeInLeft');
				dot[counter-1].classList.add('actives');
			}
		</script>
	<?php
            } else {
                echo "<div class='owl-carousel owl-theme container-slider'>";
                foreach($arraySlider['sliderDesktop'] as $arrayValues){
                ?>
                <div id="">
				<div  class="">
					<a href="<?= $arrayValues['url'] ?>">
                                            <img style="width:100%;" src="<?= base_url . $arrayValues['sliderPath']?>" alt="alt"/>	
                                            <div class="txt_slider" style="margin-bottom:50px">
							<div class="div_slider">  
								<div class="slider_container-buttons"></div>
							</div>
						</div>
					</a>
				</div>
			</div>
                <?php
                }
                echo '</div>';
                ?>
                    <script>
	$(document).ready(function() {
		$('.container-slider').owlCarousel({
			autoHeight: true,
			autoHeightClass: 'owl-height',
			items: 1,
			margin: 10,
			pagination: true,
			autoplay: true,
			autoplayTimeout: 4000,
			autoplayHoverPause: true,
			loop: true,
			dots: true,
			nav: true,
			center: true,

			responsive: {
				0: {
					items: 1
				},
				800: {
					items: 1
				},
				1000: {
					items: 1
				},
				1200: {
					items: 1
				},
				1400: {
					items: 1
				}
			}
		});
	});
</script>
                    <?php
            }
            echo "</div>"; //FIN CONTANEDOR GENERAL DE ESCRITORIO
	}
       
        if($sliderMobileAvailable){
            echo "<div class='mobile-container'>";
            echo "<div class='owl-carousel owl-theme container-slider-mobile'>";
            foreach($arraySlider['sliderMovil'] as $arrayValues){
	?>
			
			<div id="" style="min-height:70vh;">
				<a href="<?= $arrayValues['url'] ?>"><img style="object-fit:cover;min-height:70vh;" src="<?= base_url . $arrayValues['sliderPath'] ?>" class="d-block w-100" alt="..."></a>
			</div>
		<?php
            }
            echo "</div></div>";
            ?>
                           <script>
	$(document).ready(function() {
		$('.container-slider-mobile').owlCarousel({
			autoHeight: true,
			autoHeightClass: 'owl-height',
			items: 1,
			margin: 10,
			pagination: true,
			autoplay: true,
			autoplayTimeout: 4000,
			autoplayHoverPause: true,
			loop: true,
			dots: true,
			nav: true,
			center: true,

			responsive: {
				0: {
					items: 1
				},
				800: {
					items: 1
				},
				1000: {
					items: 1
				},
				1200: {
					items: 1
				},
				1400: {
					items: 1
				}
			}
		});
	});
</script>
                <?php
        }    
        
        ?>        


