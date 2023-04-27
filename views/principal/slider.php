<div id="sliderI" class="sliderMov">
<?php
	$activeC = true;
	$sliderMov = false;
	$contSlider = 0;
	foreach($respuestaSlider as $respuestaSlidervalue){
		if($respuestaSlidervalue['Status'] == '1'){
			if($respuestaSlidervalue['type'] == 1){
?>
				<div id="sliderP" class="sliderP">
					<div id="desktop" style="min-height:70vh;">
						<a href="<?= $respuestaSlidervalue['url'] ?>"><img style="object-fit:cover;min-height:70vh;" src="<?= base_url . $respuestaSlidervalue['sliderPath'] ?>" class="d-block w-100" alt="..."></a>
					</div>
				</div>
		<?php
			}else if($respuestaSlidervalue['type'] == 2){
		?>
			
			<div id="mobile" style="min-height:70vh;">
				<a href="<?= $respuestaSlidervalue['url'] ?>"><img style="object-fit:cover;min-height:70vh;" src="<?= base_url . $respuestaSlidervalue['sliderPath'] ?>" class="d-block w-100" alt="..."></a>
			</div>
		<?php
			}else if($respuestaSlidervalue['type'] == 3){
				$sliderMov = true;
				$contSlider++;
		?>
			<div id="desktopMov">
				<div  class="myslider fdd">
					<a href="<?= $respuestaSlidervalue['url'] ?>">
						<div class="image_slider home" style="background-image:url(<?= base_url . $respuestaSlidervalue['sliderPath']?>);height: 37em !important;"></div>
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
		}
	}
	if($sliderMov){
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
	}
	?>

<script>
	$(document).ready(function() {
		$('.slider-inner').owlCarousel({
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
<script>
	$(document).ready(function() {

		$(window).scroll(function() {

			let elemento = document.getElementById("info-up");
			let pos = elemento.getBoundingClientRect().bottom;
			let sliderP = document.getElementById("sliderI");

			let posSlider = sliderP.getBoundingClientRect().bottom;

			if (pos <= 0) {
				$('#nav-fix').addClass('fixed-top');
				$('#sliderP').css('margin-top', '80px');
			} else {
				$('#nav-fix').removeClass('fixed-top');
				$('#sliderP').css('margin-top', '0px');
			}
			if (posSlider < 0) {
				$('#box_scroll').css('display', 'block');
				$('#box_scroll').addClass('animate__bounceIn');
				$('#box_scroll').removeClass('animate__bounceOut');
			} else {
				$('#box_scroll').removeClass('animate__bounceIn');
				$('#box_scroll').addClass('animate__bounceOut');
			}
		});
		$('.navbr ul li a').click(function() {
			// applying again smooth scroll on menu items click
			$('html').css("scrollBehavior", "smooth");
		});
		$('.href_contact').click(function() {
			// applying again smooth scroll on menu items click
			$('html').css("scrollBehavior", "smooth");
		});


		$("#js-top").click(function(event) {
			event.preventDefault();
			$("html, body").animate({
				scrollTop: 0
			}, "slow");
			return false;
		});
		
	});
</script>