<?php
?>


<div class="offcanvas offcanvas-start" style='max-width:290px;' tabindex="-1" id="side-bar" aria-labelledby="offcanvasExampleLabel">
  
  <div class="offcanvas-body">
    
        <div class="secondary-sidebar">
                <div class="user-ava"><img src="<?=base_url?>images/account/user-ava-md.jpg" alt="">
        </div>

      </div>
      <div id="submenu2" class="row submenu2" style="width:580px;margin-left:0px;">
          <!--<!-- PRINCIPAL -->
          <ul class="col-lg-6 col-md-6 col-sm-6 col-6 lista-principal" id='lista-principal' style="">
    <li class="">
        <a class="nav-link" style="" id='' href="<?=base_url?>">INICIO</a>
      </li>
      <li class="item-lis-one">
          <a class="nav-link" style="" id=''>NOSOTROS<i class="col-lg-2 fa-solid fa-caret-right arrow-right-one" onclick="slideMenuRight(1)"></i></a>
      </li>
      <li class="item-lis-one">
          <a class="nav-link" style="" id='' >CATEGORÍAS<i class="col-lg-2 fa-solid fa-caret-right arrow-right-one" onclick="slideMenuRight(2)"></i></a>
      </li>
      <li class="item-lis-one">
          <a class="nav-link" style="" id='' >CUENTA<i class="col-lg-2 fa-solid fa-caret-right arrow-right-one" onclick="slideMenuRight(3)"></i></a>
      </li>
      <li class="">
        <a class="nav-link" style="" id='' href="<?=base_url?>nosotros.php">BLOG</a>
      </li>
      <li class="">
        <a class="nav-link" style="" id='' href="<?=base_url?>nosotros.php">CONTACTO</a>
      </li>
      </ul>
          <!-- NOSOTROS -->
          <ul class="col-lg-6 col-md-6 col-sm-6 col-6 lista-secundaria" id='lista-secundaria' style="display:none;">
       <li class="">
        <a class="nav-link" style="cursor:pointer;" id='' onclick="slideMenuLeft()">REGRESO</a>
      </li>
      <li class="item-lis-one">
          <a class="nav-link" style="" id='' href="<?=base_url?>nosotros.php">QUIÉNES SOMOS</a>
      </li>
      <li class="item-lis-one">
          <a class="nav-link" style="" id='' href="<?=base_url?>nosotros.php">POLÍTICAS Y RESTRICCIONES</a>
      </li>
      <li class="item-lis-one">
          <a class="nav-link" style="" id='' href="<?=base_url?>nosotros.php">FAQ</a>
      </li>
     
      </ul>
          <!-- CATEGORIAS -->
          <ul class="col-lg-6 col-md-6 col-sm-6 col-6 lista-secundaria" id='lista-secundaria' style="display:none;">
                 <li class="">
        <a class="nav-link" style="cursor:pointer;" id='' onclick="slideMenuLeft()">REGRESO</a>
      </li>
    <li class="">
        <a class="nav-link" style="" id='' href="<?=base_url?>nosotros.php">CAMISAS Y BLUSAS</a>
      </li>
      <li class="">
        <a class="nav-link" style="" id='' href="<?=base_url?>nosotros.php">CAMISETAS</a>
      </li>
      <li class="">
        <a class="nav-link" style="" id='' href="<?=base_url?>nosotros.php">DELANTALES Y PETOS</a>
      </li>
      <li class="item-lis">
        <a class="nav-link float-left col-lg-9" style="" id='' href="<?=base_url?>nosotros.php">GORRAS, VISERAS Y SOMBREROS</a><i class="col-lg-2 fa-solid fa-caret-right" onclick="slideMenuRightSec(1)"></i>
      </li>
      <li class="">
        <a class="nav-link" style="" id='' href="<?=base_url?>nosotros.php">JACKETS Y SUDADERAS</a>
      </li>
      <li class="">
        <a class="nav-link" style="" id='' href="<?=base_url?>nosotros.php">PANTALONES</a>
      </li>
      </ul>
           <!-- CATEGORIAS -->
          <ul class="col-lg-6 col-md-6 col-sm-6 col-6 lista-secundaria" id='lista-secundaria' style="display:none;">
              <li class="">
        <a class="nav-link" style="cursor:pointer;" id='' onclick="slideMenuLeft()">REGRESO</a>
      </li>
    <li class="">
        <a class="nav-link" style="" id='' href="<?=base_url?>nosotros.php">INICIAR SESIÓN</a>
      </li>
      <li class="">
        <a class="nav-link" style="" id='' href="<?=base_url?>nosotros.php">RECUPERAR CONTRASEÑA</a>
      </li>
      <li class="">
        <a class="nav-link" style="" id='' href="<?=base_url?>nosotros.php">ORDENES</a>
      </li>
      
      <li class="">
        <a class="nav-link" style="" id='' href="<?=base_url?>nosotros.php">CUPONES</a>
      </li>
      
      </ul>
          <!--<!-- GORRAS Y OTROS -->
             <ul class="col-lg-6 col-md-6 col-sm-6 col-6 lista-tercer" id='lista-tercer' style="display:none;transition:all 0.3s ease-in-out;">
    <li class="">
        <a class="nav-link" style="cursor:pointer;" id='' onclick="slideMenuLeftSecon()">REGRESO</a>
      </li>
      <li class="">
        <a class="nav-link" style="" id='' href="<?=base_url?>nosotros.php">GORRAS</a>
      </li>
      <li class="">
        <a class="nav-link" style="" id='' href="<?=base_url?>nosotros.php">SOMBREROS</a>
      </li>
      <li class="item-lis">
        <a class="nav-link float-left col-lg-9" style="" id='' href="<?=base_url?>nosotros.php">VISERAS</a>
      </li>
   
      </ul>
      </div>
      </ul>
  </div>
</div>