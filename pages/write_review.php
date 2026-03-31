<?php
  include 'administrators/assets/php/sql_conn.php';
  include 'common/header.php';
?>
<!-- End Header -->
<style>
  .mySpecialBtn {
    background: #47b2e4;
    border: 0;
    padding: 12px 34px;
    color: #fff;
    transition: 0.4s;
    border-radius: 50px;
}

</style>
<section id="hero" class="d-flex align-items-center"> 
</section>

  <main id="main">

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Write a Review</h2>
          <p><?=$contact_us_text?></p>
        </div>

        <div class="row">

          <div class="col-lg- mt-5 mt-lg-0 d-flex align-items-stretch">
            <form action="" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="name">Your Name</label>
                  <input type="text" name="name" class="form-control" id="name" >
                </div>
                <div class="form-group col-md-6">
                  <label for="name">Your Email</label>
                  <input type="email" class="form-control" name="email" id="email" >
                </div>
              </div>
              <div class="form-group">
                <label for="name">Address</label>
                <input type="text" class="form-control" name="address" id="address" >
              </div>
              <div class="form-group">
                <label for="name">Message</label>
                <textarea class="form-control" name="message" id="message" rows="10" ></textarea>
              </div>
              <div class="my-3">
                <div class="loading" style="display: none">Posting Review...</div>
                <div class="error-message" id="quote_error_msg1" style="display: none;  font-weight: bold;">Please enter the required fields</div>
                <div class="sent-message" style="display: none">Your review has been posted. Thank you!</div>
              </div>
              <div class="text-center"><button type="button" id="sendReview" class="mySpecialBtn">Post Review</button></div>
            </form>
          </div>

        </div>

      </div>
    </section>
    <!-- End Contact Section -->

  </main>
  <!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php
  include 'common/footer.php';
  ?>