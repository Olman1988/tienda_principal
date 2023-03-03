<?php
 
?>
<!-- Page Title-->
      <div class="page-title" id='page-title'>
        <div class="container">
          <div class="column">
            <h1><span id="ContentPlaceHolder1_Nombre1">Blog</span></h1>
          </div>
          <div class="column">
            <ul class="breadcrumbs">
              <li><a href="<?=base_url?>">Inicio</a>
              </li>
              <li class="separator">&nbsp;</li>
              <li>
                  <span id="ContentPlaceHolder1_Nombre2">Blog</span></li>
            </ul>
          </div>
        </div>
      </div>

<section class="blog_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        <?php
                        if(!isset($_GET['id'])){
                        
                        foreach ($blog as $blogvalue) {
                            
                        
                        ?>
                        <article class="blog_item">
                            <div class="blog_item_img">
                                <img class="card-img rounded-0" src="<?=base_url3.$blogvalue['photo']?>" alt="">
                                
                                <a href="./?pag=blog&&id=<?=$blogvalue['id']?>" class="blog_item_date">
<!--                                    <h3>22</h3>-->
                                    <p class='text-center' style="font-size:20px;color:white;">Ver<br/>
                                    <i class="fa-solid fa-eye"></i>
                                    </p>
                                </a>
                            </div>
                            <div class="blog_details">
                                <a class="d-inline-block" href="./?pag=blog&&id=<?=$blogvalue['id']?>">
                                    <h2 class="blog-head" style="color: #2d2d2d;"><?=$blogvalue['title']?></h2>
                                </a>
                              
                               
                            </div>
                        </article>
                        <?php
                        }
                        
                        } else {
                           
                        ?>
                        <article class="blog_item">
                            <div class="blog_item_img">
                                <img class="card-img rounded-0" src="<?=base_url3?><?=$blogPorId->photo?>" alt="">
                               
                            </div>
                            <div class="blog_details">
                                
                                
                                    <div class="mt-4 mx-auto p-4" style="height:auto">
                                        <?=$blogPorId->content?>
                                    </div>
                                
                            </div>
                        </article>
                        
                    
                        
                        <?php
                        }
                        ?>
                        
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                       
                        
                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title" style="color: #2d2d2d;">Publicaciones recientes</h3>
                            <?php 
                            foreach ($blog as $blogvalue) {
                                $date = date_create($blogvalue['createDate']);
                            $mes=intval(date_format($date,"m"));
                            $day=date_format($date,"d");
                            $year=date_format($date,"Y");
                            $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
$dateToWrite= $meses[$mes]." ".$day.", ".$year;
                            ?>
                            <div class="media post_item mt-2">
                                <a href="./?pag=blog&&id=<?=$blogvalue['id']?>">
                                <img src="<?=base_url3.$blogvalue['photo']?>" style="width:100px;" alt="post">
                                </a>
                                <div class="media-body">
                                    <a href="./?pag=blog&&id=<?=$blogvalue['id']?>">
                                        <h3 style="color: #2d2d2d;"><?=$blogvalue['title']?></h3>
                                    </a>
                                    <p><?=$dateToWrite?></p>
                                </div>
                                
                            </div>
                            <?php }?>
                        </aside>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

