<?php
  include 'administrators/assets/php/sql_conn.php';
  include 'common/header.php';
?>
<!-- End Header -->

  <main id="main">

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio" style="padding-top: 20%;">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Portfolio</h2>
          <p><?=$portfolio_text?></p>
        </div>

        <ul id="portfolio-flters" class="d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
          <li data-filter="*" class="filter-active">All</li>
          <?php for($j = 0; $j < sizeof($portfolio_categories); $j++){?>
          <li data-filter=".filter-<?=$portfolio_categories[$j]?>"><?=$portfolio_categories[$j]?></li>
          <?php } ?>
        </ul>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

        <?php for($k = 0; $k < sizeof($portfolios); $k++){?>
          <div class="col-lg-4 col-md-6 portfolio-item filter-<?=$portfolio_categories[$portfolios[$k]->category]?>">
            <div class="portfolio-img"><img src="assets/img/portfolio/<?=$portfolio_categories[$portfolios[$k]->category]?>/<?=$portfolios[$k]->image?>" class="img-fluid" alt="" style="width: 100%;"></div>
            <div class="portfolio-info">
              <h4><?=$portfolios[$k]->name?></h4>
              <p><?=$portfolios[$k]->description?></p>
              <a href="assets/img/portfolio/<?=$portfolio_categories[$portfolios[$k]->category]?>/<?=$portfolios[$k]->image?>" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="<?=$portfolios[$k]->name?>"><i class="bx bx-plus"></i></a>
              <!-- <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a> -->
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