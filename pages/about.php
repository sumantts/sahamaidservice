<?php
  include 'administrators/assets/php/sql_conn.php';
  include 'common/header.php';
?>
<!-- End Header -->

<section id="hero" class="d-flex align-items-center"> 
</section>

    <main id="main">
        <!-- ======= About Us Section ======= -->
        <section id="about" class="about">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
            <h2>About Us</h2>
            </div>

            <div class="row content">
            <div class="col-lg-6">
                <p><?=$about_us?></p>
                <!-- <ul>
                <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat</li>
                <li><i class="ri-check-double-line"></i> Duis aute irure dolor in reprehenderit in voluptate velit</li>
                <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat</li>
                </ul> -->
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0">
                <p><?=$about_us_right?></p>
                <!-- <a href="#" class="btn-learn-more">Learn More</a> -->
            </div>
            </div>

        </div>
        </section>
        <!-- End About Us Section -->
    </main>
    <!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php
    include 'common/footer.php';
  ?>