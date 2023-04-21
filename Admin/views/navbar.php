<?php
?>
    <div id="wrapper" style="width:100%;">

        <!-- Sidebar -->
        <ul id="menu_sidebar" class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" style="z-index:2;transition:all 0.3s ease" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
                <div class="sidebar-brand-icon">
                    <i class="fa-solid fa-store"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Tienda</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <li class="nav-item">
          <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
          Administración <i class="fa-solid fa-toolbox"></i>
        </button>
                <hr class="sidebar-line my-0">
            <div class="collapse show" id="home-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li class="nav-item secondary-link">
          
            <a class="nav-link" href="<?=base_url?>Admin/?seccion=dashboard"><i class="fa-solid fa-gauge icon-admin"></i>Dashboard</a>
        </li>
            <li class="nav-item secondary-link">
            <a class="nav-link" href="<?=base_url?>Admin/?seccion=perfil_tienda"><i class="fa-solid fa-id-card"></i>Perfil de Tienda</a>
        </li>
        <li class="nav-item secondary-link">
            <a class="nav-link" href="<?=base_url?>Admin/?seccion=config_general"><i class="fa-solid fa-wrench"></i>Configuración Generales</a>
        </li>
          </ul>
        </div>
        </li>
        <li class="nav-item">
          <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#costum-collapse" aria-expanded="true">
          Personalización <i class="fa-solid fa-gear"></i>
        </button>
                <hr class="sidebar-line my-0">
            <div class="collapse" id="costum-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                <li class="nav-item secondary-link">
                    <a class="nav-link" href="<?=base_url?>Admin/?seccion=sliders"><i class="fa-solid fa-images icon-admin"></i>Sliders</a>
               </li>
               <li class="nav-item secondary-link">
                    <a class="nav-link" href="<?=base_url?>Admin/?seccion=lookandfeel"><i class="fa-solid fa-paintbrush"></i>Diseño e Imagen</a>
                </li>
                <li class="nav-item secondary-link">
                    <a class="nav-link" href="<?=base_url?>Admin/?seccion=faq_section"><i class="fa-solid fa-question"></i>FAQ</a>
                </li>
                <li class="nav-item secondary-link">
                    <a class="nav-link" href="<?=base_url?>Admin/?seccion=blog_section"><i class="fa-brands fa-microblog"></i>BLOG</a>
                </li>
           
          </ul>
        </div>
        </li>
        <li class="nav-item">
          <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#sales-collapse" aria-expanded="true">
          Ventas <i class="fa-solid fa-store"></i>
        </button>
                <hr class="sidebar-line my-0">
            <div class="collapse" id="sales-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                <li class="nav-item secondary-link">
                    <a class="nav-link" href="<?=base_url?>Admin/?seccion=promociones"><i class="fa-solid fa-percent icon-admin"></i>Promociones</a>
                </li>
               <li class="nav-item secondary-link">
                    <a class="nav-link" href="<?=base_url?>Admin/?seccion=paginaAterrizaje"><i class="fa-solid fa-globe icon-admin"></i>Página de Aterrizaje</a>
               </li>
               <li class="nav-item secondary-link">
                <a class="nav-link" href="<?=base_url?>Admin/?seccion=infoLanding"><i class="fa-solid fa-id-card icon-admin"></i>Clientes Páginas Aterrizaje</a>
            </li>
               <li class="nav-item secondary-link">
                    <a class="nav-link" href="<?=base_url?>Admin/?seccion=orders"><i class="fa-solid fa-truck-fast icon-admin"></i>Órdenes</a>
              </li>
              <li class="nav-item secondary-link">
                  <a class="nav-link" href="<?=base_url?>Admin/?seccion=quotes"><i class="fa-solid fa-file-invoice-dollar icon-admin"></i>Cotizaciones</a>
              </li>
             
            
          </ul>
        </div>
        </li>
        <li class="nav-item">
          <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#catalogues-collapse" aria-expanded="true">
          Catálogos <i class="fa-solid fa-screwdriver-wrench"></i>
        </button>
                <hr class="sidebar-line my-0">
            <div class="accordion-collapse collapse" id="catalogues-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                
               <li class="nav-item secondary-link">
                    <a class="nav-link" href="<?=base_url?>Admin/?seccion=products"><i class="fa-solid fa-box icon-admin"></i>Productos y Servicios</a>
                </li>
                <li class="nav-item secondary-link">
                    <a class="nav-link" href="<?=base_url?>Admin/?seccion=categories"><i class="fa-solid fa-boxes-stacked icon-admin"></i>Categorías</a>
                </li>

                <li class="nav-item secondary-link">
                    <a class="nav-link" href="<?=base_url?>Admin/?seccion=attributesGroup"><i class="fa-solid fa-list-check"></i>Grupos Atributos</a>
                </li>
                 <li class="nav-item secondary-link">
                    <a class="nav-link" href="<?=base_url?>Admin/?seccion=attributes"><i class="fa-solid fa-square-plus"></i>Atributos</a>
                </li>
          </ul>
        </div>
        </li>
       
         <li class="nav-item btn btn-secondary">
                  <a class="nav-link" href="<?=base_url?>Admin/?seccion=cerrarSession">Cerrar Sesión</a>
        </li>
    </ul>
        <!-- End of Sidebar -->
        <div style="z-index:1;height:50px;background:white;width:100%;position:absolute;top:0;left:0;box-shadow:2px 5px 20px rgb(200,200,200); ">
            <i id="icon_bar" class="fa-solid fa-bars float-left" onclick="ocultar();" style="transition:all 0.3s ease;color:black;cursor:pointer;margin-left:260px;margin-top:10px;font-size:30px"></i>
        </div>
         
        <script>
            var posicion=true;
        function ocultar(){
            if(posicion){
              $("#menu_sidebar").css("margin-left","-250px");
            $("#icon_bar").css("margin-left","20px");
            posicion=false;
            }else {
                $("#menu_sidebar").css("margin-left","0px");
            $("#icon_bar").css("margin-left","260px");
            posicion=true;
                
            }
            
        
        }
        </script>
