<?php
  include 'administrators/assets/php/sql_conn.php';
  include 'common/header.php';
?>

  
  <!-- End Header -->
  

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center"> 

  </section>
  <!--<section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1><?=$banner_text1?></h1>
          <h2><?=$banner_text2?></h2>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="javascript:void(0)" class="btn-get-started scrollto" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Get a Quote</a>
             <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Watch Video</span></a> 
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section>-->
  <!-- End Hero -->

  <main id="main">
    <!-- Banner start -->
    <?php if(sizeof($sliders) > 0){?>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
        <?php 
          for($i = 0; $i < sizeof($sliders); $i++){
          ?>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?=$i?>" <?php if($i == 0){?>class="active" aria-current="true"<?php } ?> aria-label="Slide <?=$i?>"></button>          
          <?php } ?>
          <!-- <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button> -->
        </div>
        <div class="carousel-inner">
          <?php 
          for($i = 0; $i < sizeof($sliders); $i++){
          ?>
          <div class="carousel-item <?php if($i == 0){?>active<?php } ?>">
            <img src="assets/img/banner/<?=$sliders[$i]->image?>" class="d-block w-100" alt="<?=$sliders[$i]->name?>">
            <div class="carousel-caption d-none d-md-block">
              <h5 style="color: #37517e;"><?=$sliders[$i]->name?></h5>
              <p style="color: #37517e;"><?=$sliders[$i]->description?></p>
            </div>
          </div>
          <?php } ?>
          <!-- <div class="carousel-item">
            <img src="assets/img/banner/tulips.jpg" class="d-block w-100" alt="<?=$banner_text1?>">
            <div class="carousel-caption d-none d-md-block">
              <h5><?=$banner_text1?></h5>
              <p><?=$banner_text2?></p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="assets/img/banner/tulips.jpg" class="d-block w-100" alt="<?=$banner_text1?>">
            <div class="carousel-caption d-none d-md-block">
              <h5><?=$banner_text1?></h5>
              <p><?=$banner_text2?></p>
            </div>
          </div> -->

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
      <?php } ?>
      <!-- Banner End -->
      
    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us section-bg">
      <div class="container-fluid" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

            <div class="content">
              <h3>Frequently asked <strong>Questions</strong></h3>
              <p> <?=$faq_sub_text?></p>
            </div>

            <div class="accordion-list">
            <ul>
                <?php
                  $serial = 0;
                  for($i = 0; $i < sizeof($questions_answers); $i++){
                    $serial++;
                ?>
                <li>
                  <a data-bs-toggle="collapse"<?php if($serial == 1){?> class="collapse" <?php }else{?> class="collapsed" <?php } ?> data-bs-target="#accordion-list-<?=$serial?>"><span><?=$serial?></span> <?=$questions_answers[$i]->q?> <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-<?=$serial?>" class="collapse <?php if($serial == 1){?>show<?php } ?>" data-bs-parent=".accordion-list">
                    <p><?=$questions_answers[$i]->a?></p>
                  </div>
                </li>
                <?php } ?>
              </ul>

            </div>

          </div>

          <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img" style='background-image: url("assets/img/why-us.png");' data-aos="zoom-in" data-aos-delay="150">&nbsp;</div>
        </div>

      </div>
    </section>
    <!-- End Why Us Section -->

    <!-- ======= Team Section ======= -->
    <?php if(sizeof($partners) > 0){?>
    <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Business Partner</h2>
          <p><?=$partner_text?></p>
        </div>

        <div class="row">
          
          <?php for($k = 0; $k < sizeof($partners); $k++){?>
            <div class="col-lg-6 mt-4" data-aos="zoom-in" data-aos-delay="300">
              <div class="member d-flex align-items-start">
                <div class="pic"><img src="assets/img/team/<?=$partners[$k]->image?>" class="img-fluid" alt=""></div>
                <div class="member-info">
                  <h4><?=$partners[$k]->name?></h4>
                  <span><?=$partners[$k]->designation?></span>
                  <p><a href="tel:<?=$partners[$k]->desc_ph?>"><i class="bi bi-phone"></i> <?=$partners[$k]->desc_ph?></p></a>
                  <p><a href="mailto:<?=$partners[$k]->desc_eml?>"><i class="bi bi-envelope"></i> <?=$partners[$k]->desc_eml?></p></a>
                  <div class="social">
                    <?php if($partners[$k]->twitter != ''){?>
                    <a href="https://twitter.com/<?=$partners[$k]->twitter?>" target="_blank"><i class="ri-twitter-fill"></i></a>
                    <?php } ?>
                    <?php if($partners[$k]->facebook != ''){?>
                    <a href="https://www.facebook.com/<?=$partners[$k]->facebook?>" target="_blank"><i class="ri-facebook-fill"></i></a>
                    <?php } ?>
                    <?php if($partners[$k]->instagram != ''){?>
                    <a href="https://www.instagram.com/<?=$partners[$k]->instagram?>" target="_blank"><i class="ri-instagram-fill"></i></a>
                    <?php } ?>
                    <?php if($partners[$k]->linkedin != ''){?>
                    <a href="https://www.linkedin.com/in/<?=$partners[$k]->linkedin?>" target="_blank"> <i class="ri-linkedin-box-fill"></i> </a>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>

          <!-- <div class="col-lg-6 mt-4" data-aos="zoom-in" data-aos-delay="300">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="assets/img/team/team-3.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>William Anderson</h4>
                <span>CTO</span>
                <p>Quisquam facilis cum velit laborum corrupti fuga rerum quia</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4" data-aos="zoom-in" data-aos-delay="400">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="assets/img/team/team-4.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Amanda Jepson</h4>
                <span>Accountant</span>
                <p>Dolorum tempora officiis odit laborum officiis et et accusamus</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>  -->

        </div>

      </div>
    </section>
    <?php } ?>
    <!-- End Team Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php
  include 'common/footer.php';
  ?>