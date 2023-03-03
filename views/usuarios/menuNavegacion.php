<?php
require_once 'controllers/generalController.php';
                       $ordenes=new generalController();
$ordenesRespuesta=$ordenes->consultarOrdenes($_SESSION['email']);
?>
 <div class="page-title" id='page-title' >
        <div class="container">
          <div class="column">
            <h1><span id="ContentPlaceHolder1_Nombre1"><?php
            if(isset($isAdmin)){
               echo "Administrador";
            }else{
               echo "Perfil"; 
            }
            ?></span></h1>
          </div>
          <div class="column">
            <ul class="breadcrumbs">
              <li><a href="/">Inicio</a>
              </li>
              <li class="separator">&nbsp;</li>
              <li><a href="./?pag=cuenta&&func=ordenes">Cuenta</a></li>
              <li class="separator">&nbsp;</li>
              <li><a href="./?pag=cuenta&&func=perfil">Perfil</a></li>
              <li class="separator">&nbsp;</li>
              <?php
              if(isset($isAdmin)){
              ?><li><a href="./?pag=cuenta&&func=admin">Administrador</a></li>
              <?php
              }
              ?>
            </ul>
          </div>
        </div>
      </div>
<div class="container padding-bottom-3x mb-2">
        <div class="row">
            
<div class="col-lg-4 " style="margin-bottom:50px;">
            <aside class="user-info-wrapper border border-secondary p-3" style="border-color:rgba(200,200,200, 0.7)!important;">
              <div class="" style="">
                
              </div>
              <div class="user-info">
                <div class="user-avatar"><a class="edit-avatar" href="#"></a></div>
                <div class="user-data">
                  <h4><?=$_SESSION['nombre']?> </h4>
                    
                </div>
              </div>
            </aside>
            <nav class="list-group items-nav-perfil">
                <a class="list-group-item with-badge " href="./?pag=cuenta&&func=ordenes">
                    <i  class="fa-solid fa-bag-shopping double-item pr-2"></i><span class="ml-1" style="margin-left:10px">Ordenes</span>
                    <span class="badge rounded-pill bg-primary float-right"><?=count($ordenesRespuesta)?></span>

                </a>
                <a class="list-group-item" href="./?pag=cuenta&&func=perfil"><i class="fa-regular fa-user pr-2"></i> <span style="margin-left:10px">Perfil</span></a>
                
                
                

            </nav>
          </div>
