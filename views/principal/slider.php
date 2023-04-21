<div id="sliderP" class="sliderP">
	<style>
		#desktop {
			display: block;
		}

		/* Estilos predeterminados para el div que se ocultará si la pantalla es menor que 850px */
		#mobile {
			display: none;
		}

		/* Media query para pantallas menores que 850px */
		@media (max-width: 849px) {
		#desktop {
			display: none;
		}
		#mobile {
			display: block;
		}
	}
	</style>
	<div id="slider-inner" class="slider-inner owl-carousel owl-theme">
		<?php
			$activeC = true;
			foreach ($respuestaSlider as $respuestaSlidervalue) {
		?>
			<div id="mobile" style="min-height:70vh;">
				<a href="<?= $respuestaSlidervalue['url_mobile'] ?>"><img style="object-fit:cover;min-height:70vh;" src="<?= base_url . $respuestaSlidervalue['sliderPathMobile'] ?>" class="d-block w-100" alt="..."></a>
			</div>
			<div id="desktop" style="min-height:70vh;">
				<a href="<?= $respuestaSlidervalue['url'] ?>"><img style="object-fit:cover;min-height:70vh;" src="<?= base_url . $respuestaSlidervalue['sliderPath'] ?>" class="d-block w-100" alt="..."></a>
			</div>
		<?php
			}
		?>
	</div>
</div>
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
			let sliderP = document.getElementById("sliderP");

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