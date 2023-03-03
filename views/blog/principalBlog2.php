<?php
$blog=$consultaGeneral->consultarBlog();
?>
<!-- Page Title-->
      <div class="page-title" id='page-title'>
        <div class="container">
          <div class="column">
            <h1><span id="ContentPlaceHolder1_Nombre1">Blog</span></h1>
          </div>
          <div class="column">
            <ul class="breadcrumbs">
              <li><a href="/">Inicio</a>
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
                        foreach ($blog as $blogvalue) {
                            
                        
                        ?>
                        <article class="blog_item">
                            <div class="blog_item_img">
                                <img class="card-img rounded-0" src="<?=base_url2.$blogvalue['photo']?>" alt="">
                                <a href="./" class="blog_item_date">
<!--                                    <h3>22</h3>-->
                                    <p>Ver</p>
                                </a>
                            </div>
                            <div class="blog_details">
                                <a class="d-inline-block" href="<?=base_url2?>">
                                    <h2 class="blog-head" style="color: #2d2d2d;"><?=$blogvalue['title']?></h2>
                                </a>
                                <p>
                                    prueba...
                                </p>
                                <ul class="blog-info-link ">
                                    <li class="li_primero"><a href="<?=$blogvalue['title']?>"><i class="fa fa-user"></i><span class="" style="margin-left:10px;"><?=$blogvalue['author']?></span></a></li>
                                    
                                </ul>
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
                            ?>
                            <div class="media post_item">
                                <img src="<?=base_url2.$blogvalue['photo']?>" style="width:100px;" alt="post">
                                <div class="media-body">
                                    <a href="">
                                        <h3 style="color: #2d2d2d;"><?=$blogvalue['title']?></h3>
                                    </a>
                                    <p><?=$blogvalue['createDate']?></p>
                                </div>
                            </div>
                            <?php }?>
                        </aside>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

