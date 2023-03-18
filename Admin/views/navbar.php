<?php
?>
    <div id="wrapper" style="width:100%;">

        <!-- Sidebar -->
        <ul id="menu_sidebar" class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" style="z-index:2;transition:all 0.3s ease" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fas fa-shield-alt"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Balloons</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

           <li class="nav-item">
          
            <a class="nav-link" href="<?=base_url?>Admin/?seccion=dashboard"><i class="fa-solid fa-gauge icon-admin"></i>Dashboard</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?=base_url?>Admin/?seccion=promociones"><i class="fa-solid fa-percent"></i>Promociones</a>
        </li>
         <li class="nav-item">
            <a class="nav-link" href="<?=base_url?>Admin/?seccion=paginaAterrizaje"><i class="fa-solid fa-globe"></i>Página de Aterrizaje</a>
        </li>
<li class="nav-item">
            <a class="nav-link" href="<?=base_url?>Admin/?seccion=lookandfeel"><i class="fa-solid fa-paintbrush"></i>Diseño e Imagen</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?=base_url?>Admin/?seccion=infoLanding"><i class="fa-solid fa-address-card"></i>Clientes</a>
        </li>
       <li class="nav-item">
            <a class="nav-link" href="<?=base_url?>Admin/?seccion=products"><i class="fa-solid fa-box icon-admin"></i>Productos y Servicios</a>
        </li>
         <li class="nav-item">
            <a class="nav-link" href="<?=base_url?>Admin/?seccion=orders"><i class="fa-solid fa-truck-fast icon-admin"></i>Órdenes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?=base_url?>Admin/?seccion=quotes"><i class="fa-solid fa-file-invoice-dollar icon-admin"></i>Cotizaciones</a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link" href="<?=base_url?>Admin/?seccion=categories"><i class="fa-solid fa-boxes-stacked icon-admin"></i>Categorías</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?=base_url?>Admin/?seccion=sliders"><i class="fa-solid fa-images icon-admin"></i>Sliders</a>
        </li>
        
        
        <!--         
         <li class="nav-item">
            <a class="nav-link" href="<?=base_url?>?paginacion=administracion&&seccion=marcas"><i class="fa-solid fa-certificate icon-admin"></i>Marcas</a>
        </li>
           <li class="nav-item">
            <a class="nav-link" href="<?=base_url?>?paginacion=administracion&&seccion=proveedores"><i class="fa-solid fa-truck-fast icon-admin"></i>Proveedores</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?=base_url?>?paginacion=administracion&&seccion=sucursales"><i class="fa-solid fa-dumpster icon-admin"></i>Sucursales</a>
        </li>
         <li class="nav-item">
            <a class="nav-link" href="<?=base_url?>?paginacion=administracion&&seccion=bodegas"><i class="fa-solid fa-warehouse icon-admin"></i>Bodegas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?=base_url?>?paginacion=administracion&&seccion=reportes"><i class="fa-solid fa-file-invoice-dollar icon-admin"></i>Facturas</a>
        </li>
         
      
        <li class="nav-item">
            <a class="nav-link" href="<?=base_url?>?paginacion=administracion&&seccion=productos"><i class="fa-solid fa-truck-ramp-box icon-admin"></i>Productos</a>
        </li>
     
-->       <li class="nav-item btn btn-secondary">
                  <a class="nav-link" href="<?=base_url?>Admin/?seccion=cerrarSession">Cerrar Sesión</a>
        </li>



            <!-- Sidebar Toggler (Sidebar) -->
   

           

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
