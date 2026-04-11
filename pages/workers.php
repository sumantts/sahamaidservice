<?php
  include 'administrators/assets/php/sql_conn.php';
  include 'common/header.php';
?>
<!-- End Header -->

<section id="hero" class="d-flex align-items-center"> 
</section>

  <main id="main">

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Workers</h2>
          <p>Meet our trained and reliable housekeeping professionals, committed to delivering exceptional cleaning services with care and precision.</p>
        </div>

        <ul id="portfolio-flters" class="d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
          <li data-filter="*" class="filter-active">All</li>
          <?php for($j = 0; $j < sizeof($skills); $j++){?>
          <li data-filter=".filter-<?=$skills[$j]->sk_id?>"><?=$skills[$j]->skill_name?></li> 
          <?php } ?>
        </ul>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

        <?php 
        
          for($k = 0; $k < sizeof($workers); $k++){
            $skills_array = $workers[$k]->skills_array;
            $filter_text = '';
            if(sizeof($skills_array) > 0){
              $filter_text = $skills_array[0]->sk_id;
            }
        ?>
        
        <!-- 
          <div class="col-lg-4 col-md-6 portfolio-item filter-<?=$portfolio_categories[$portfolios[$k]->category]?>">
            <div class="portfolio-img"><img src="assets/img/portfolio/<?=$portfolio_categories[$portfolios[$k]->category]?>/<?=$portfolios[$k]->image?>" class="img-fluid" alt="" style="width: 100%;"></div>
            <div class="portfolio-info">
              <h4><?=$portfolios[$k]->name?></h4>
              <p><?=$portfolios[$k]->description?></p>
              <a href="assets/img/portfolio/<?=$portfolio_categories[$portfolios[$k]->category]?>/<?=$portfolios[$k]->image?>" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="<?=$portfolios[$k]->name?>"><i class="bx bx-plus"></i></a>
            </div>
          </div>
          -->
          <div class="col-lg-4 col-md-6 portfolio-item filter-<?=$filter_text?>" style="position: absolute;left: 0px;top: 0px;">
            <div class="row g-0" style="border: 2px solid rgb(0 0 0 / 2%);border-radius: 5px;"> 
              <div class="col-md-4">
                <img src="administrators/users/uploads/<?=$workers[$k]->user_img?>" class="img-fluid rounded-start" alt="<?=$workers[$k]->full_name?>" style="margin-top: 5px;margin-left: 5px; border-radius: 5px;width: 100px;height: 130px;">
              </div>
              <div class="col-md-8">
                <div class="card-body" style="padding-left: 10px;padding-top: 5px;">
                  <h5 class="card-title"><?=$workers[$k]->full_name?></h5>
                  <p class="card-text" style="margin-bottom: 0px;"><?=$workers[$k]->state_name?>, <?=$workers[$k]->city_name?></p>
                  <p class="card-text" style="margin-bottom: 5px;">
                    <?php
                      if(sizeof($skills_array) > 0){
                        for($s = 0; $s < sizeof($skills_array); $s++){
                    ?>
                    <span class="badge badge-pill" style="color: #fff;background-color: #6c757d;"><?=$skills_array[$s]->skill_name?></span>
                    <?php } } ?>
                    <!-- <span class="badge badge-pill" style="color: #fff;background-color: #6c757d;">Cleaning</span>
                    <span class="badge badge-pill" style="color: #fff;background-color: #6c757d;">Pet Care</span> -->
                  </p>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>

        </div>

      </div>
    </section>
    <!-- End Portfolio Section -->

  </main>
  <!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php
  include 'common/footer.php';
  ?>