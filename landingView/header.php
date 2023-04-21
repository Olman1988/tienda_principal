<?php
$hex = $respuestaLAF['colorFuenteNavbar'];
list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
$respuestaColorFuente="rgba($r, $g, $b, 1)";

?>
<!DOCTYPE html>

<html lang="es">

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title> <?=$profile->name?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width,user scalable=no, initial-scale=1.0, maximun-scale=1.0">
  <meta name="description" content="Empresa lider en la gestión y operación de proyectos forestales, trámites legales, permisos forestales, permisos de corta de árboles">
  <meta name="description" content="Produciendo en armonía con el ambiente, le ofrecemos tranquilidad legal en sus proyectos forestales.">
  <meta name="keywords" content="Productos de Limpieza">

  <!--JQUERY-->
  <link rel="icon" href="<?= base_url3.$profile->logo?>">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
 <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<!--ANIMACIONES-->
 <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
 <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
 
  <!--ICONOS-->
  <script src="https://kit.fontawesome.com/b58e5dabf0.js" crossorigin="anonymous"></script>
  <!--CAROUSEL.css------------->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="" crossorigin="anonymous" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="" crossorigin="anonymous"></script>
<!--DATATABLE-->
  <script src="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" ></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js" ></script>
<!-- Include Unite Gallery core files -->
<script src='unitegallery/js/unitegallery.min.js' type='text/javascript'  ></script>
<link  href='unitegallery/css/unite-gallery.css' rel='stylesheet' type='text/css' />
				
				<!-- include Unite Gallery Theme Files -->
				
<script src='unitegallery/themes/default/ug-theme-default.js' type='text/javascript'></script>
<link  href='unitegallery/themes/default/ug-theme-default.css' rel='stylesheet' type='text/css' />

   <script type="text/javascript"> (function() { var css = document.createElement("link"); css.href = "https://use.fontawesome.com/releases/v5.9.0/css/all.css"; css.rel = "stylesheet"; css.type = "text/css"; document.getElementsByTagName("head")[0].appendChild(css); })(); </script>

  <!--ASSETS-->
  <script src='assets/js/jquery.zoom.js'></script>
  <script>
		$(document).ready(function(){
			$('#ex1').zoom({
                            magnify:1
                        });
			$('#ex2').zoom({magnify:1});
                        $('#ex3').zoom({magnify:1});
                        $('#ex4').zoom({magnify:1});
                        $('#ex5').zoom({magnify:1});
                        $('#ex6').zoom({magnify:1});
                        $('#ex7').zoom({magnify:1});
                        $('#ex8').zoom({magnify:1});
                        $('#ex9').zoom({magnify:2});
                        $('#ex10').zoom({magnify:3});
		
		});
	</script>
 <style>
	 @import url('https://fonts.googleapis.com/css2?family=<?=$respuestaLAF['fuenteTitulo']?>&display=swap');
          @import url('https://fonts.googleapis.com/css2?family=<?=$respuestaLAF['fuenteSubTitulo']?>&display=swap');
          @import url('https://fonts.googleapis.com/css2?family=<?=$respuestaLAF['fuenteNavbar']?>&display=swap');
          @import url('https://fonts.googleapis.com/css2?family=<?=$respuestaLAF['fuenteSideBar']?>&display=swap');
          @import url('https://fonts.googleapis.com/css2?family=<?=$respuestaLAF['fuenteBotones']?>&display=swap');
          
            @import url('https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;900&family=Poppins:wght@400;500;600;700&family=Mukta:wght@200;400;500;700&family=Montserrat+Alternates:wght@200&family=Ubuntu:wght@400;500;700&family=Poiret+One:wght@400;500;700&display=swap');
            .link-general{
                 color:<?=$respuestaLAF['colorSecundario']?>;
            }
            .navbar-prin {
             background:<?=$respuestaLAF['colorNavbar']?> !important;
             border:solid 1px <?=$respuestaLAF['colorNavbar']?>  !important;   
            }
            .paginate_button{
    margin-left:20px;
}
table .text-num{
    text-align:right !important;
}
.dataTables_length {
    margin-top:50px;
}
#generalTable_filter {
    float:right;
}
.paginate_button{
    text-decoration: none;
    padding: 5px;
    background: #4e73df;
    color: white;
    cursor: pointer;
    margin-left: 5px;
    border-radius: 5px;
}
            /**CAROUSEL**/
.owl-dots {
    display: flex;
    justify-content: center;
    margin:auto;
    margin-top:50px;
    position:absolute;
    bottom:50px;
    left:0px;
    right:0px;
    
}
.owl-nav span {
    font-size:100px;
    color:white;
    position:absolute;
    top:50%;
}
.owl-nav button{
    position:absolute;
    bottom:70%;
}
.owl-nav .owl-next{
    position:absolute;
    right:33px;
}


.owl-dots span {
    margin:auto;
    background:white;
    border-radius: 20px;
    display: block;
    height: 12px;
    margin: 5px 7px;
    opacity: 0.5;
    width: 12px;
}
.dotsbox{
    width:250px;
} 
#carousel-service .owl-nav span {
  font-size:50px !important;
  color:<?=$respuestaLAF['colorPrincipal']?> !important;
    
}

#carousel-service .owl-nav .owl-next{
    right:0px !important;
}
#carousel-service .owl-nav .owl-prev{
    left:-15px !important;
}



h3{
	 color:<?=$respuestaLAF['colorPrincipal']?>;
		 font-family:'<?=$respuestaLAF['fuenteTitulo']?>';
		 font-size:45px;
		 letter-spacing:2px;
	 }
         h2{
	
		 font-family:'<?=$respuestaLAF['fuenteTitulo']?>';
		 
	 }
	 body{
  max-width:100%; 

  height:auto;
}  
.fx-side{
    position:fixed;
    left:0px;
    top:0px;
}
#nav-fix{
    transition:all 0.3s ease-in-out;
    max-width:100%;
    min-width:100%;
    border-bottom: 1px solid #e1e7ec;
    background-color: #fff !important;
}
.menu-navbar{
    display:none;
}
.box_w{
z-index:200;
position:fixed;
left:30px;
bottom:20px;
cursor:pointer;
display:block;
}
.box_scroll{
display:none;
z-index:200;
position: fixed;
right: 16px;
bottom: 16px;
cursor:pointer;
}
.box_scroll .btn_scroll:hover, .box_w .btn_w:hover{
opacity:0.7;
}
.box_w .btn_w a{
text-decoration: none;
color:white;
}
.box_w .btn_w{
    background-color:#25D366;
    border-radius: 50%;
    color:white;
    width:50px;
    margin:auto;
    height:50px;
    display:flex;
    justify-content: center;
    transition:all 0.3s ease;
}

.box_scroll .btn_scroll{
    background-color:rgba(100,100,100,0.6);
    border-radius:50%;
    color:white;
    margin:auto;
    height:50px;
    width:50px;
    display:flex;
    justify-content: center;
    transition:all 0.3s ease;
    
}
.box_scroll .btn_scroll i{
    font-size:20px;
    margin:auto;
}
.box_w .btn_w a {
    font-size:35px;
    margin:auto;
}

.fixed-top{
    box-shadow: 1px 1px 20px rgba(150,150,150,0.5);
}
.page-body{
  min-width:100%;
  margin-left:0px;
  transition:all 0.3s ease-in-out;
  
  box-shadow: -20px 2px 20px gray;
  z-index: 10;
  
}
.offcanvas-start{
  transition:all 0.3s ease-in-out;   
}
.side-bar{
    background:<?=$respuestaLAF['colorSideBar']?>;
    width:290px;
    float:left;
    height:100vh;
    margin-left:-290px;
    transition:all 0.3s ease-in-out;
    z-index: -1;
    overflow:hidden;
    box-shadow: inset 0px 5px 10px 1px rgb(50,50,50);
}
.side-bar ul{
padding:0px !important;
margin:0px !important;
font-family:'<?=$respuestaLAF['fuenteSideBar']?>';
}

.side-bar ul li{
    height:60px;
    margin-left:0px;
    font-size:16px;
    font-weight: 500;
    padding:8px;
    color:<?=$respuestaLAF['colorFuenteSidebar']?>;
    list-style: none;
    width:100%;
    border-bottom: solid 1px rgba(150,150,150,0.9);
    display:flex;
       display: flex;
   align-items: center;
   padding-left:20px;
   cursor:pointer;
}
.side-bar ul li:hover a{
   color:rga(220,220,220);
   
}
.item-lis{
    position:relative;
    min-height:80px;
    
}
.item-lis a{
   max-width:150px;
    
}
.item-lis-one{
    position:relative;
    min-height:60px;
}
.arrow-right{
  padding:30px 40px 30px 30px;  
  position:absolute;
  right:0px;
  top:0px;
  border-left:solid 1px rgba(150,150,150,0.9);
  width:60px;
}
.arrow-right-one{
   padding:20px 40px 20px 30px;  
  position:absolute;
  right:0px;
  top:0px;
  border-left:solid 1px rgba(150,150,150,0.9);
  width:60px;   
}
.arrow-right-two{
    padding:30px 50px 20px 40px;  
  position:absolute;
  right:0px;
  top:0px;
  border-left:solid 1px rgba(150,150,150,0.9);
  width:60px;  
  height:80px;
}
.user-ava{
    width:50px;
    border-radius:50%;
    margin-top:10px;
    margin-left:10px;
}
.user-ava img{
    width:100%;
    border-radius:50%;
   padding:2px;
    border:solid 1px rgba(200,200,200,0.4)
}
.secondary-sidebar{
    min-height:90px;
    color:<?=$respuestaLAF['colorFuenteSideBar']?>;
}

.side-bar ul li a{
    
    color:<?=$respuestaLAF['colorFuenteSideBar']?>;
}
ul .principal-sidebar a{
       color:#7E99AF !important;
}
.secondary_submenu{
    display:none;
}
.primary_submenu{
    display:block;
}
.submenu{
   transition:all 0.3s ease-in-out;
   width:870px;
}
.submenu2{
   transition:all 0.3s ease-in-out;
   width:870px;
}
.lista-principal{
  transition:all 0.3s ease-in-out; 
}
.lista-secundaria{
 transition:all 0.3s ease-in-out;    
}
.lista-tercer{
 transition:all 0.3s ease-in-out;    
}

.fa-caret-right{
    cursor:pointer;
}

            
 #logo{
                width:130px;
}
            .navbar {
 background:<?=$respuestaLAF['colorNavbar']?> !important;border:solid 1px <?=$respuestaLAF['colorNavbar']?> !important;
  padding:0px !important;
}
.custom-toggler.navbar-toggler {
            
        }
       
          
        .custom-toggler .navbar-toggler-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='<?=$respuestaColorFuente?>' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 8h24M4 16h24M4 24h24'/%3E%3C/svg%3E");
        }


.navbar ul li{
margin-left:15px;
   padding-top:18px;
   color:white !important;
}
.navbar ul .li-active{
padding-top:16px;
    border-top:solid 2px <?=$respuestaLAF['colorHoverNavbar']?>;
      
}
.navbar ul .li-active .nav-link{

  color: <?=$respuestaLAF['colorHoverNavbar']?> ;
}
.navbar .navbar-nav .nav-link {
  color: <?=$respuestaLAF['colorFuenteNavbar']?>;
  border-radius: .25rem;
  margin: 0 0.25em;
  font-weight:500;
  font-family:'<?=$respuestaLAF['fuenteNavbar']?>';
  
  font-size:20px;
  letter-spacing: 2px;
}
.navbar .navbar-nav .nav-link:hover {
  color: <?=$respuestaLAF['colorHoverNavbar']?>;
 
}
@media (max-width: 575px) {
  .navbar-expand-sm .navbar-nav .show .dropdown-menu .dropdown-item {
    color: #616161;
  }
  .navbar-expand-sm .navbar-nav .show .dropdown-menu .dropdown-item:hover,
  .navbar-expand-sm .navbar-nav .show .dropdown-menu .dropdown-item:focus {
    color: <?=$respuestaLAF['colorPrincipal']?>;
  }
  .navbar-expand-sm .navbar-nav .show .dropdown-menu .dropdown-item.active {
    color: <?=$respuestaLAF['colorPrincipal']?>;
    background-color: #f7f6f7;
  }
}

@media (max-width: 767px) {
  .navbar-expand-md .navbar-nav .show .dropdown-menu .dropdown-item {
    color: #616161;
  }
  .navbar-expand-md .navbar-nav .show .dropdown-menu .dropdown-item:hover,
  .navbar-expand-md .navbar-nav .show .dropdown-menu .dropdown-item:focus {
    color: <?=$respuestaLAF['colorPrincipal']?>;
  }
  .navbar-expand-md .navbar-nav .show .dropdown-menu .dropdown-item.active {
    color: <?=$respuestaLAF['colorPrincipal']?>;
    background-color: #f7f6f7;
  }
  
}

@media (max-width: 991px) {
  .navbar-expand-lg .navbar-nav .show .dropdown-menu .dropdown-item {
    color: <?=$respuestaLAF['colorPrincipal']?>;
  }
  .navbar-expand-lg .navbar-nav .show .dropdown-menu .dropdown-item:hover,
  .navbar-expand-lg .navbar-nav .show .dropdown-menu .dropdown-item:focus {
    color: <?=$respuestaLAF['colorPrincipal']?>;
  }
  .navbar-expand-lg .navbar-nav .show .dropdown-menu .dropdown-item.active {
    color:<?=$respuestaLAF['colorPrincipal']?>;
    background-color: #f7f6f7;
  }
}

@media (max-width: 1199px) {
  .navbar-expand-xl .navbar-nav .show .dropdown-menu .dropdown-item {
    color: #616161;
  }
  .navbar-expand-xl .navbar-nav .show .dropdown-menu .dropdown-item:hover,
  .navbar-expand-xl .navbar-nav .show .dropdown-menu .dropdown-item:focus {
    color: <?=$respuestaLAF['colorPrincipal']?>;
  }
  .navbar-expand-xl .navbar-nav .show .dropdown-menu .dropdown-item.active {
    color: <?=$respuestaLAF['colorPrincipal']?>;
    background-color: #f7f6f7;
  }
}

.navbar-expand .navbar-nav .show .dropdown-menu .dropdown-item {
  color: #616161;
}
.navbar-expand .navbar-nav .show .dropdown-menu .dropdown-item:hover,
.navbar-expand .navbar-nav .show .dropdown-menu .dropdown-item:focus {
  color: <?=$respuestaLAF['colorPrincipal']?>;
}
.navbar-expand .navbar-nav .show .dropdown-menu .dropdown-item.active {
  color: <?=$respuestaLAF['colorPrincipal']?>;
  background-color: #f7f6f7;
}
.info-up{
    padding-left:17px;
    height:35px;
    width:100%;
    background:whitesmoke;
    font-size:13px;
}
.info-up div{
    display:inline-block;
    padding:7px;
    margin-left:21px;
}
.info-up div a{
   text-decoration: none;
   color:rgb(100,100,100) !important;
}
.icons_nav{
    padding:20px;
    margin-right:20px;
    font-size:17px;
    color:<?=$respuestaLAF['colorFuenteNavbar']?>;
    display:flex;
    
}
.icons_nav i{
    padding:14px;
    border: solid 1px <?=$respuestaLAF['colorFuenteNavbar']?>;
    border-radius:50%;
    margin-left:5px;
    width:45px;
    height:45px;
    cursor:pointer;
    transition: all 0.3s ease-in-out;
    
    
}
.icons_nav .fa-user{

    transition: all 0.3s ease-in-out;
    
}
.icons_nav i:hover{
background:<?=$respuestaLAF['colorFuenteNavbar']?>;
color:<?=$respuestaLAF['colorNavbar']?>;      
border: solid 1px <?=$respuestaLAF['colorNavbar']?>;
}
.icons_nav .double-item{
   border-radius:20px;
   width:70px;
    height:45px;
}
.icons_nav .double-item span{
  font-size:13px;
}

/**********OFERTA************/
#ofertaLimitada h2{
    color:<?=$respuestaLAF['colorSecundario']?>;
    font-family:'<?=$respuestaLAF['fuenteSubTitulo']?>';
}
#ofertaLimitada h2{
    color:<?=$respuestaLAF['colorSecundario']?>;
 
}

/*CATEGORIAS*/
.main-img{
  overflow:hidden;  
}
.main-img img{
 width:100%;   
 min-height:300px;
 min-width:300px;
}
.main-img img:hover{
    transform: scale(1.2);
    transition: all 0.3s ease-in-out;
}
.card-title{
    
     font-size:22px;
     font-family:'<?=$respuestaLAF['fuenteSubTitulo']?>';
     color:<?=$respuestaLAF['colorSecundario']?> !important;
}
.inner{
    min-height:300px;
    max-height:300px;
}
.main-img{
    min-height:300px;
    max-height:300px;
}

.btn-outline-primary{
    padding:10px 15px 8px 15px;
    font-size:11px;
    border-radius:35px;
        border-color: <?=$respuestaLAF['colorBotones']?> !important;
    background-color: transparent;
    color: <?=$respuestaLAF['colorBotones']?> !important;
    letter-spacing: 1px;
    font-family: "<?=$respuestaLAF['fuenteBotones']?>"!important;
        font-weight:600;
}
.btn-outline-primary-2{
    padding:10px 15px 8px 15px;
    font-size:11px;
    border-radius:35px;
        border-color: <?=$respuestaLAF['colorPrincipal']?> !important;
    background-color: <?=$respuestaLAF['colorPrincipal']?>;
    color: white !important;
    letter-spacing: 1px;
    font-family: "<?=$respuestaLAF['fuenteBotones']?>"!important;
        font-weight:600; 
}
.btn-outline-primary-2:hover{
    
    background-color: white !important;
    color: <?=$respuestaLAF['colorPrincipal']?> ! important;
    
}
.btn-outline-primary:hover{
    
    background-color: <?=$respuestaLAF['colorBotones']?> !important;
    color: white ! important;
    
}
.btn-outline-secondary{
   padding:10px 16px 8px 16px;
    font-size:13px;
    border-radius:35px;
        border-color: rgb(200,200,200) !important;
    background-color: transparent;
    color: #616161 !important;
    letter-spacing: 1px;
    font-family: "Maven Pro","Helvetica","Arial","sans-serif";
        font-weight:600;   
}
.btn-outline-secondary:hover{
  background-color: rgb(240,240,240) !important;
   
}
.btn-outline-success{
     padding:10px 16px 8px 16px;
    font-size:13px;
    border-radius:35px;
        border-color: <?=$respuestaLAF['colorPrincipal']?> !important;
   background-color: <?=$respuestaLAF['colorPrincipal']?>;
    color: white !important;
    letter-spacing: 1px;
    font-family: "Maven Pro","Helvetica","Arial","sans-serif";
        font-weight:600; 
        text-transform: uppercase;
        align-items: center;
}
.btn-outline-danger{
      padding:10px 16px 8px 16px;
    font-size:11px;
    border-radius:35px;
  
    letter-spacing: 1px;
    font-family: "Maven Pro","Helvetica","Arial","sans-serif";
        font-weight:600;  
}
.form-control {
    padding: 0 18px 3px;
    border: 1px solid #dbe2e8;
    border-radius: 22px;
    background-color: #fff;
    color: #606975;
    font-family: "Maven Pro",Helvetica,Arial,sans-serif;
    font-size: 14px;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    height:50px;
}
.form-group label {
    margin-bottom: 8px;
    padding-left:18px;
    font-size: 13px;
    font-weight: 500;
    cursor: pointer;
}
.form-group {
    margin-bottom: 20px !important;
}
.checkout-footer {
    display: table;
    width: 100%;
    margin-top: 28px;
    padding-top: 5px;
    padding-bottom: 5px;
    border: 1px solid #e1e7ec;
    border-radius: 7px;
    table-layout: fixed;
}

.checkout-footer .column:first-child {
    text-align: left;
    
}
.checkout-footer .column:last-child {
    text-align: right;
}
.checkout-footer .column {
    display: table-cell;
    padding: 10px 15px;
    vertical-align: middle;
    
}
.checkout-footer .column a{
    font-size:13px;
    text-transform:uppercase;
}
.checkout-steps {
    margin-bottom: 40px;
}
.checkout-steps a:first-child {
    border-right: 1px solid #e1e7ec;
    border-top-right-radius: 7px;
    border-bottom-right-radius: 7px;
}
.checkout-steps a {
    display: block;
    position: relative;
    width: 25%;
    height: 55px;
    float: right;
    transition: color .3s;
    border-top: 1px solid #e1e7ec;
    border-bottom: 1px solid #e1e7ec;
    background-color: #fff;
    color: #606975;
    font-size: 14px;
    font-weight: 500;
    line-height: 53px;
    text-decoration: none;
    text-align: center;
}
.checkout-steps::after {
    display: block;
    clear: both;
    content: '';
}
.checkout-steps a.active {
    background-color: #3C92D9;
    color: #fff;
    cursor: default;
    pointer-events: none;
}

/*FOOTER*/
.site-footer{
        padding-top: 72px;
    background-color: <?=$respuestaLAF['colorFooter']?>;
    
}
.site-footer .principal-section{
   padding-bottom:50px;
   border-bottom:solid 2px rgba(220,220,220,0.2);
       margin-bottom:50px;
       color: <?=$respuestaLAF['footerTextoColor']?>!important;
}
.widget-title {
    border-color: rgba(255,255,255,0.12);
    color: <?=$respuestaLAF['footerTituloColor']?> !important;
    margin-bottom: 20px;
    padding-bottom: 12px;
    border-bottom: 1px solid <?=$respuestaLAF['footerTituloColor']?>;
    color: #9da9b9;
    font-size: 14px;
    font-weight: 500;
    text-transform: uppercase;
}
.widget-title-products {
    border-color: rgba(255,255,255,0.12);
    color:<?=$respuestaLAF['colorPrincipal']?> !important;
    font-family:'<?=$respuestaLAF['fuenteTitulo']?>'!important;
    margin-bottom: 20px;
    padding-bottom: 12px;
    border-bottom: 1px solid <?=$respuestaLAF['colorPrincipal']?>!important;
    color: #9da9b9;
    font-size: 14px;
    font-weight: 500;
    text-transform: uppercase;
}
.text-custom{
    font-family: "Maven Pro","Helvetica","Arial","sans-serif";
     color: <?=$respuestaLAF['footerTextoColor']?>!important;
}
.text-custom a{
    font-family: "Maven Pro","Helvetica","Arial","sans-serif";
     color: <?=$respuestaLAF['footerTextoColor']?>!important;
}
.widget-light-skin ul{
    padding-left:0px !important;
}
.widget-light-skin ul li{
    list-style: none;
    position: relative;
    margin-bottom: 5px;
    
    font-family: "Maven Pro","Helvetica","Arial","sans-serif";
}
.widget-light-skin ul li i{
color:rgba(250,250,250,0.5);
margin-right:5px;
font-size:5px;

}
.widget-light-skin ul li a{
    text-decoration:none;
    color:white;
    transition: all 0.3s ease-in-out;
}
.widget-light-skin ul li:hover a{
    
    color:#E4008D;
}
.mp-btn{
    text-decoration:none;
    color:white;
    border-radius:50%;
    border:solid 2px <?=$respuestaLAF['footerTextoColor']?>;
    padding:5px 9px 5px 9px;
    color: <?=$respuestaLAF['footerTextoColor']?>;
}
.mp-btn-2{
    text-decoration:none;
    color:white;
    border-radius:50%;
  
    padding:5px 9px 5px 9px;
    color: <?=$respuestaLAF['footerTextoColor']?>;
}
.footer-copyright{
    color:rgba(255,255,255,0.5);
}
.input-footer{
    background:transparent !important;
    color:white !important;
    border: solid 1px rgba(255,255,255,0.2);
    border-radius:20px !important;
    max-width:400px;

}
.btn-footer{
    border-radius:30px;
    font-size:20px;
    padding:7px 20px 7px 20px;
    background:#3C92D9;
}
.input-footer::placeholder { color:rgba(250,250,250,0.4) !important; }
@media(max-width:992px){
    .secondary_submenu{
    display:block;
}
.primary_submenu{
    display:none;
}
}
@media(max-width:1050px){
    .icons_nav .fa-user{

    display:none;
    
}
    
}


/*****PAGINA NOSOTROS*******/
.page-title {
    width: 100%;
    margin-bottom: 60px;
    padding: 36px 0;
    border-bottom: 1px solid #e1e7ec;
    background-color: #f5f5f5;
    
}
.page-title .container, .page-title .container-fluid {
    display: table;
    width:75%;
}
.column {
    display: table-cell;
    vertical-align: middle;
}
.breadcrumbs {
    display: block;
    margin: 0;
    padding: 0;
    list-style: none;
    text-align: right;
}
.page-title h1, .page-title h2, .page-title h3 {
    margin: 0;
    font-size: 24px;
    font-weight: normal;
    line-height: 1.25;
}
.breadcrumbs li {
    font-size: 1em;
}
.breadcrumbs li {
    display: inline-block;
    margin-left: 5px;
    padding: 5px 0;
    color: #9da9b9;
    font-size: 14px;
    cursor: default;
    vertical-align: middle;
}
.breadcrumbs  li  a {
    transition: all 0.3s ease-in-out;
    color: #606975;
    text-decoration: none;
}
.breadcrumbs  li  a:hover{
   color: #007bff;
}

.breadcrumbs li.separator {
    width: 3px;
    height: 3px;
    margin-top: 2px;
    padding: 0;
    border-radius: 50%;
    background-color: #9da9b9;
}
.container-image{
    width:75%;
}
@media(max-width: 768px){
.page-title .container, .page-title  .container-fluid {
    display: block;
}
.page-title .column {
    display: block;
    width: 100%;
    text-align: center;
}
.breadcrumbs {
    padding-top: 10px;
    text-align: center;
}
.container-image{
    width:100%;
}
}
/**CATEGORIAS***/
.shop-toolbar {
    display: table;
    width: 100%;
}
.shop-toolbar .column {
    display: table-cell;
    vertical-align: middle;
}
.shop-view {
    display: inline-block;
    float:right;
}
.shop-view a.active {
    border-color: #3C92D9;
    background-color: #3C92D9;
    cursor: default;
    pointer-events: none;
    color:white;
 
}
.shop-view a i {
    padding:10px;
}


.shop-view a {
    display: block;
    width: 43px;
    height: 43px;
    cursor:pointer;
    float: left;
    transition: background-color .35s;
    border: 1px solid #e1e7ec;
    border-radius: 50%;
    background-color: #fff;
    color:gray;
    font-size:23px;
    margin-left:20px;
}
.content-categories{
    padding-bottom:50px;
}
.section-category{
    min-width:95%;
}
.product-thumb img{
   width:100%; 
}

.product-card {
    
    padding: 18px;
    border: 1px solid #e1e7ec;
    border-radius: 7px;
    background-color: #fff;
    margin-top:20px;
}
.product-card .product-title {
    margin-bottom: 10px;
    font-size: 16px;
    font-weight: normal;
    text-align: center;
    padding-top:10px;
}
.product-card .product-title a {
    transition: color .3s;
    color: #1A5688;
    text-decoration: none;
}
.product-card .product-buttons {
    padding: 12px 0 8px;
    text-align: center;
     text-transform: uppercase;
}

.widget-categories ul, .widget-links ul {
    margin: 0;
    padding: 0;
    list-style: none;
}
.widget-categories ul li, .widget-links ul li {
    position: relative;
    margin-bottom: 5px;
    padding-left: 14px;
}

.widget-categories ul li::before, .widget-links ul li::before {
    display: block;
    position: absolute;
    top: 12px;
    left: 0;
    width: 0;
    height: 0;
    -webkit-transform: rotate(-90deg);
    -ms-transform: rotate(-90deg);
    transform: rotate(-90deg);
    transition: -webkit-transform .35s;
    transition: transform .35s;
    border-top: 4px dashed;
    border-right: 4px solid transparent;
    border-left: 4px solid transparent;
    color: <?=$respuestaLAF['footerTextoColor']?> !important;
    content: '';
}
.widget-categories ul > li a, .widget-links ul li a {
    display: inline-block;
    transition: color .3s;
    color: #606975;
    font-size: 14px;
    font-weight: 500;
    text-decoration: none;
}
.widget-categories ul li.has-children.expanded ul, .widget-links ul li.has-children.expanded ul {
    max-height: 800px;
}
.widget-categories ul li.has-children ul, .widget-links ul li.has-children ul {
    border-left: 1px solid #dee5ea;
}
.widget-categories ul li.has-children ul li::before, .widget-links ul li.has-children ul li::before {
    top: 14px;
    width: 8px;
    height: 1px;
    -webkit-transform: none;
    -ms-transform: none;
    transform: none;
    border: 0;
    background-color: #dee5ea;
    color: transparent;
}
.widget-categories ul li.has-children ul li a, .widget-links ul li.has-children ul li a {
    font-size: 13px;
}

/*** PRODUCTOS****/
.gallery-wrapper{
    
}
.gallery-wrapper img{
  width:90%;  
}

/***ZOOM***/
	.zoom:after {
			content:'';
			display:block; 
			width:33px; 
			height:33px; 
			position:absolute; 
			top:0;
			right:0;
			background:url(icon.png);
		}

		.zoom img {
			display: block;
                        cursor: zoom-in;
		}

		.zoom img::selection { background-color: transparent; }

		
 /************OFFCANVAS***********/
.offcanvas-container {
    position: fixed;
    top: 0;
    left: 0;
    width: 290px;
    height: 100%;
    background-color: #1A5688;
    box-shadow: inset -4px 0 17px 0 rgb(0 0 0 / 35%);
    visibility: hidden;
    z-index: 1;
    overflow-y: auto;
}
.offcanvas-header {
    padding: 28px 20px;
    border-bottom: 1px solid rgba(255,255,255,0.12);
}
.offcanvas-menu {
    position: relative;
    width: 100%;
    overflow: hidden;
}
.offcanvas-menu ul.menu {
    position: relative;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
    transition: all 0.4s cubic-bezier(0.86, 0, 0.07, 1);
}
.offcanvas-menu ul.menu {
    position: relative;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
    transition: all 0.4s cubic-bezier(0.86, 0, 0.07, 1);
}
.offcanvas-menu ul {
    margin: 0;
    padding: 0;
    list-style: none;
}
.offcanvas-menu ul li {
    display: block;
}
.offcanvas-menu ul li a {
    display: block;
    padding: 15px 20px;
    transition: color .3s;
    border-bottom: 1px solid rgba(255,255,255,0.12);
    color: #fff;
    font-size: 14px;
    font-weight: 500;
    letter-spacing: .05em;
    text-transform: uppercase;
    text-decoration: none;
}
.modal-body{
    padding:5px;
    overflow: hidden;
}
.modal-body img{
    width:100%;
    max-height: 80vh;
    object-fit: cover;
    margin:auto;
   
}
.text-description-modal{
    font-size:25px;
    margin-top:20x;
    text-align: center;
    color:<?=$respuestaLAF['colorSecundario']?> ;
}
/****** BLOG*********/
.blog_item {
    margin-bottom: 50px;
}
.blog_item_img {
    position: relative;
}
.blog_item_img .blog_item_date {
    position: absolute;
    bottom: -10px;
    left: 10px;
    display: block;
    color: #fff;
    background-color: #493423;
    padding: 8px 15px;
    border-radius: 5px;
}
@media (min-width: 768px){
.blog_item_img .blog_item_date {
    bottom: -20px;
    left: 40px;
    padding: 13px 30px;
}
.blog_details {
    padding: 60px 30px 35px 35px;
}
.blog_details h2 {
    font-size: 24px;
    margin-bottom: 15px;
}
}
.blog_area a {
    color: "Jost",sans-serif !important;
    text-decoration: none;
    transition: .4s;
}
.blog_details {
    padding: 30px 0 20px 10px;
    box-shadow: 0px 10px 20px 0px rgb(221 221 221 / 30%);
}
.blog_details h2 {
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 8px;
}
.blog_details p {
    margin-bottom: 30px;
    font-family: "Jost",sans-serif;
    color: #301A22;
    font-size: 16px;
    line-height: 30px;
    margin-bottom: 15px;
    font-weight: 400;
    line-height: 1.6;
}
.blog-info-link li {
    float: left;
    font-size: 14px;
    list-style: none;
}
.blog-info-link li a {
    color: #999999;
}
.blog-info-link .li_primero::after {
    content: "|";
    padding-left: 10px;
    padding-right: 10px;
        box-sizing: border-box;
}
.blog-info-link::after {
    content: "";
    display: block;
    clear: both;
    display: table;
}
.blog_right_sidebar .single_sidebar_widget {
    background: #fbf9ff;
    padding: 30px;
    margin-bottom: 30px;
}
.blog_right_sidebar .widget_title {
    font-size: 20px;
    margin-bottom: 40px;
}
.blog_right_sidebar .widget_title::after {
    content: "";
    display: block;
    padding-top: 15px;
    border-bottom: 1px solid #f0e9ff;
}
.media {
    display: -webkit-box;
    display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
}
.media {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: start;
    -ms-flex-align: start;
    align-items: flex-start;
}
.media img {
    vertical-align: middle;
    border-style: none;
}
.blog_right_sidebar .popular_post_widget .post_item .media-body {
    justify-content: center;
    align-self: center;
    padding-left: 20px;
}
.blog_area a {
    color: "Jost",sans-serif !important;
    text-decoration: none;
    transition: .4s;
}
.blog_right_sidebar .popular_post_widget .post_item .media-body p {
    font-size: 14px;
    line-height: 21px;
    margin-bottom: 0px;
}
.blog_right_sidebar .popular_post_widget .post_item .media-body h3 {
    font-size: 16px;
    line-height: 20px;
    margin-bottom: 6px;
    transition: all 0.3s linear;
}
.list-icon{
    list-style: none;
}
.list-icon li {
    text-decoration: none;
}
.list-icon li a{
    color:gray;
}
.list-icon li a span{
    margin-left:10px;
}
.mp-btn{
    text-decoration:none;
    color:white;
    border-radius:50%;
    border:solid 2px <?=$respuestaLAF['footerTextoColor']?>;
    padding:5px 9px 5px 9px;
    color: <?=$respuestaLAF['footerTextoColor']?>;
    margin-left:5px;
 
    width:40px;
    height:40px;
    max-width: 40px;
}
/**********File Inputs**********/
.container-input {
    padding: 5px 0;
    border-radius: 6px;
    width: 100%;
   text-align:right;
    margin-bottom: 20px;
}

.inputfile {
    width: 0.1px;
    height: 0.1px;
    opacity: 0;
    overflow: hidden;
    position: absolute;
    z-index: -1;
     border-radius: 10px;
}

.inputfile + label {
    max-width: 80%;
    font-size: 1.25rem;
    font-weight: 900;
    text-overflow: ellipsis;
    white-space: nowrap;
    cursor: pointer;
    display: inline-block;
    overflow: hidden;
    padding: 0.625rem 1.25rem;
    border-radius: 25px;
    border: solid 2px rgb(200,200,200) !important;
    background-color: transparent;
    color: #616161 !important;
}

.inputfile + label svg {
    width: 1em;
    height: 1em;
    vertical-align: middle;
    fill: currentColor;
    margin-top: -0.25em;
    margin-right: 0.25em;
}

.iborrainputfile {
	font-size:12px; 
	font-weight:normal;
	font-family: 'Lato';
}

/* style 1 */

.inputfile-1 + label {
    color: #fff;
    
    background-color: transparent;
    text-transform: uppercase;
}

.inputfile-1:focus + label,
.inputfile-1.has-focus + label,
.inputfile-1 + label:hover {
    
    background-color: white;
    color:#616161;
}
.imagenDestacados img{
    transition: all 0.3s ease-in-out;
    overflow:hidden;
}
.imagenDestacados img:hover{
   transform:scale(1.2); 
}
</style>
</head>
<body id="body" style=''>

