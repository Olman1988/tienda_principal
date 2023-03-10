<?php
	require_once '../../config/parameters.php';
	session_start();

	$IDUser = $_SESSION['idUsuario'];
	$OrderCode = $_GET['order'];

?>
<!-- Page Title-->
<div class="page-title" id='page-title'>
	<div class="container">
		<div class="column">
			<h1><span id="ContentPlaceHolder1_Nombre1">Pago Realizado</span></h1>
		</div>
		<div class="column">
			<ul class="breadcrumbs">
				<li><a href="<?= base_url ?>">Inicio</a>
				</li>
				<li class="separator">&nbsp;</li>
				<li>
					<span id="ContentPlaceHolder1_Nombre2">Pago Realizado</span>
				</li>
			</ul>
		</div>
	</div>
</div>
<div class="container pb-2 mb-2 container-image">
	<div class="row align-items-center pb-2 ">
		<div class="col-md-12 " style="text-align:left; width:100%;">
			<div class="mt-30 hidden-md-up"></div>

		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		$(window).scroll(function() {
			let elemento = document.getElementById("info-up");
			let pos = elemento.getBoundingClientRect().bottom;

			if (pos <= 0) {
				$('#nav-fix').addClass('fixed-top');
				$('#page-title').css('margin-top', '80px');
			} else {
				$('#nav-fix').removeClass('fixed-top');
				$('#page-title').css('margin-top', '0px');
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