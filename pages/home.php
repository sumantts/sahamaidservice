<?php
  include 'administrators/assets/php/sql_conn.php';
  include 'common/header.php';
?>

  
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1><?=$banner_text1?></h1>
          <h2><?=$banner_text2?></h2>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="javascript:void(0)" class="btn-get-started scrollto" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Get a Quote</a>
            <!-- <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Watch Video</span></a> -->
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

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

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php
  include 'common/footer.php';
  ?>