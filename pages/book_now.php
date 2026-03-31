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



  .skills-wrapper {
      display: flex;
      gap: 15px;
      flex-wrap: wrap; /* keeps responsive */
  }

  .custom-checkbox {
      position: relative;
      cursor: pointer;
  }

  .custom-checkbox input {
      display: none;
  }

  /* Box Design */
  .custom-checkbox span {
      display: inline-block;
      padding: 8px 16px;
      border: 2px solid #d0d7de;
      border-radius: 25px;
      font-size: 14px;
      color: #555;
      transition: 0.3s;
  }

  /* Checked State */
  .custom-checkbox input:checked + span {
      background: linear-gradient(135deg, #4facfe, #00f2fe);
      color: #fff;
      border-color: transparent;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
  }

  /* Hover Effect */
  .custom-checkbox span:hover {
      border-color: #4facfe;
  }


  .skills-wrapper {
      display: flex;
      gap: 15px;
      flex-wrap: wrap;
  }

  .custom-radio input {
      display: none;
  }

  .custom-radio span {
      padding: 8px 16px;
      border: 2px solid #d0d7de;
      border-radius: 25px;
      font-size: 14px;
      cursor: pointer;
      transition: 0.3s;
  }

  /* Active */
  .custom-radio input:checked + span {
      background: linear-gradient(135deg, #4facfe, #00f2fe);
      color: #fff;
      border-color: transparent;
  }

</style>
<section id="hero" class="d-flex align-items-center"> 
</section>

  <main id="main">

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Book Now</h2>
          <p><?=$contact_us_text?></p>
        </div>

        <div class="row">

          <div class="col-lg-5 d-flex align-items-stretch">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p><?=$location?></p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p><?=$contact_email?></p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p><?=$contact_ph_number?></p>
              </div>

              <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe> -->

              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14744.596902081139!2d88.174871!3d22.4985837!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a027dc8333d1c93%3A0xadef1b6378c22dee!2sSAHA%20MAID%20SERVICE%20AND%20ENTERPRISE!5e0!3m2!1sen!2sin!4v1679720610381!5m2!1sen!2sin" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen loading="lazy"></iframe>
            </div>

          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form action="" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="name" class="text-danger">Name*</label>
                  <input type="text" name="your_name" class="form-control" id="your_name" >
                </div>
                <div class="form-group col-md-6">
                  <label for="name" class="text-danger">Phone number*</label>
                  <input type="text" class="form-control" name="phone_number" id="phone_number" >
                </div>
                <div class="form-group col-md-6">
                  <label for="name">Email</label>
                  <input type="email" class="form-control" name="email" id="email" >
                </div>
              </div>
              <div class="form-group">
                <label for="name" class="text-danger">Address*</label>
                <input type="text" class="form-control" name="address" id="address" >
              </div>

              <div class="form-group">
                <label for="name" class="text-danger">What Can we do for you?* (Please select the options that best describe your requirements)</label> 
                <div class="skills-wrapper" id="skills_wrapper">
                  <!-- <label class="custom-checkbox">
                      <input type="checkbox" name="skills[]" value="PHP">
                      <span>Cooking</span>
                  </label> -->
                </div>                
              </div>
              
              <div class="form-group">
                <label for="name" class="text-danger">No. of Hours* (Please select the no. of hours for which you require the worker.)</label> 
                <div class="skills-wrapper" id="hours_wrapper">
                  <!-- <label class="custom-radio">
                      <input type="radio" name="required_hourse[]" value="1 Hour">
                      <span>1 Hour</span>
                  </label>  -->
                </div>                
              </div>

              <div class="form-group">
                <label for="name" class="text-danger">Message*</label>
                <textarea class="form-control" name="message" id="message" rows="10" ></textarea>
              </div>
              <div class="my-3">
                <div class="loading" style="display: none">Sending Booking Request...</div>
                <div class="error-message" id="quote_error_msg" style="display: none;  font-weight: bold;">Please enter the required fields</div>
                <div class="sent-message" style="display: none">Your Booking Request Sent Successfully. We will contact you soon. Thank you!</div>
              </div>
              <div class="text-center"><button type="button" id="sendMessage" class="mySpecialBtn">Book Now</button></div>
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