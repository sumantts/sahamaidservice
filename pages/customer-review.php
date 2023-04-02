<?php
  include 'administrators/assets/php/sql_conn.php';
  include 'common/header.php';
?>
<!-- End Header -->

<section id="hero" class="d-flex align-items-center"> 
</section>

  <main id="main">

    <!-- ======= Team Section ======= -->
    <?php if(sizeof($reviews) > 0){?>
    <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Customer Review</h2>
          <p><?=$review_text?></p>
        </div>

        <div class="row">
          
          <?php for($k = 0; $k < sizeof($reviews); $k++){?>
           <div class="col-lg-6 mt-4" data-aos="zoom-in" data-aos-delay="200">
            <div class="member d-flex align-items-start">              
              <div class="member-info">
                <h4><?=$reviews[$k]->customer_name?></h4>
                <span>From: <?=$reviews[$k]->from_area?></span>
                <p><?=$reviews[$k]->review_desc?></p>
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

  </main>
  <!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php
  include 'common/footer.php';
  ?>