<?php
  include 'administrators/assets/php/sql_conn.php';
  include 'common/header.php';
?>  
  <!-- End Header -->

<section id="hero" class="d-flex align-items-center"> 
</section>
  <main id="main">

    <!-- ======= Services Section ======= -->
    <?php if(sizeof($services) > 0){?>
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Services</h2>
          <p><?=$services_text?></p>
        </div>

        <div class="row">
          <?php 
          for($l = 0; $l < sizeof($services); $l++){
            $c_name = '';
            if($l == 1){
              $c_name = 'mt-4 mt-md-0';
            }else if($l > 1){
              $c_name = 'mt-4 mt-xl-0';
            }else if($l > 2){
              $c_name = 'mt-4 mt-xl-4';
            }else{
              //$c_name = '';
            }
          ?>
          <div class="col-xl-4 col-md-6 d-flex align-items-stretch <?=$c_name?>" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <!-- <div class="icon"><i class="bx bxl-dribbble"></i></div> -->
              <img src="<?=$services[$l]->services_photo?>" id="image_<?=$services[$l]->service_id?>" style="width: 100%;">
              <h4><a href=""><?=$services[$l]->name?></a></h4>
              <p><?=$services[$l]->description?></p>
            </div>
          </div>
          <?php } ?>
        </div>

      </div>
    </section>
    <?php } ?>
    <!-- End Services Section -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">

        <div class="row">
          <div class="col-lg-9 text-center text-lg-start">
            <h3><?=$need_service?></h3>
            <p><?=$need_service2?> </p>
          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <!-- Button trigger modal -->
            <!-- <button type="button" class="cta-btn align-middle" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Get a Quote
            </button> -->
            <a class="cta-btn align-middle" href="javascript: void(0)" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Get a Quote</a>
          </div>
        </div>

      </div>
    </section>
    <!-- End Cta Section -->

  </main>
  <!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php
  include 'common/footer.php';
  ?>