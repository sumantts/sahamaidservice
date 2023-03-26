
<footer id="footer">

<!-- <div class="footer-newsletter">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <h4>Join Our Newsletter</h4>
        <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
        <form action="" method="post">
          <input type="email" name="email"><input type="submit" value="Subscribe">
        </form>
      </div>
    </div>
  </div>
</div> -->

<div class="footer-top">
  <div class="container">
    <div class="row">

      <div class="col-lg-3 col-md-6 footer-contact">
        <h3><?=$logo_text?></h3>
        <p><?=$location?><br>
          <strong>Phone:</strong> <?=$contact_ph_number?><br>
          <strong>Email:</strong> <?=$contact_email?><br>
        </p>
      </div>

      <div class="col-lg-3 col-md-6 footer-links">
        <h4>Useful Links</h4>
        <ul>
          <li><i class="bx bx-chevron-right"></i> <a href="#hero">Home</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#about">About us</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#services">Services</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#portfolio">Portfolio</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#team">Customer Review</a></li>
        </ul>
      </div>

      <div class="col-lg-3 col-md-6 footer-links">
        <h4>Our Services</h4>
        <ul>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
        </ul>
      </div>

      <div class="col-lg-3 col-md-6 footer-links">
        <h4>Our Social Networks</h4>
        <p>You can find us below social media</p>
        <div class="social-links mt-3">
          <a href="javascript: void(0)" class="twitter"><i class="bx bxl-twitter"></i></a>
          <a href="javascript: void(0)" class="facebook"><i class="bx bxl-facebook"></i></a>
          <a href="javascript: void(0)" class="instagram"><i class="bx bxl-instagram"></i></a>
          <a href="javascript: void(0)" class="google-plus"><i class="bx bxl-skype"></i></a>
          <a href="javascript: void(0)" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
      </div>

    </div>
  </div>
</div>

<div class="container footer-bottom clearfix">
  <div class="copyright">
    &copy; Copyright <strong><span><?=$logo_text?></span></strong>. All Rights Reserved
  </div>
  <div class="credits">
    Designed by <a href="javascript: void(0)">Cammet</a>
  </div>
</div>
</footer>
<!-- End Footer -->

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h3 class="modal-title" id="staticBackdropLabel"><?=$title?></h3>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
      <h5><?=$contact_us_text?></h5>
      <form action="" method="post" role="form" class="php-email-form">
        <div class="row">
          <div class="form-group col-md-6">
            <label for="name">Your Name*</label>
            <input type="text" name="name" class="form-control" id="your_name">
          </div>
          <div class="form-group col-md-6">
            <label for="name">Phone Number*</label>
            <input type="tel" class="form-control" name="phone_number" id="phone_number">
          </div>
          <div class="form-group col-md-6">
            <label for="name">Your Email</label>
            <input type="email" class="form-control" name="email" id="email_id">
          </div>
        </div>
        <div class="form-group">
          <label for="name">Address*</label>
          <textarea class="form-control" name="address" id="address" rows="3"></textarea>
        </div>
        <div class="form-group">
          <label for="name">Message*</label>
          <textarea class="form-control" name="message" id="message" rows="5"></textarea>
        </div>
        <div class="my-3">
          <div class="loading" style="display: none">Loading</div>
          <div class="error-message" id="quote_error_msg" style="display: none; color: #f00;font-weight: bold;">Please enter the required fields</div>
          <div class="sent-message" style="display: none">Your message has been sent. Thank you!</div>
        </div>
      </form>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      <button type="button" class="btn btn-primary" id="sendMessage">Send Message</button>
    </div>
  </div>
</div>
</div>

<!-- Vendor JS Files -->
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="assets/js/function.js"></script>

</body>

</html>