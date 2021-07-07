<?php
  include "./functions/footer_func.php";
  $current_page = basename($_SERVER['SCRIPT_NAME'], ".php");
?>
<?php if ($current_page != "signin" && $current_page != "signup") : ?>
  <footer class="nav-footer-theme text-center text-white mt-5 w-100">
    <div class="container p-4">
      <section class="mb-4">
        <!-- Facebook -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-facebook-f"></i></a>
        <!-- Twitter -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-twitter"></i></a>
        <!-- Google -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-google"></i></a>
        <!-- Instagram -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-instagram"></i></a>
        <!-- Linkedin -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-linkedin-in"></i></a>
        <!-- Github -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-github"></i></a>
      </section>
      <!-- Section: Social media -->
      <section class="">
        <form action="">
          <!--Grid row-->
          <div class="row d-flex justify-content-center">
            <!--Grid column-->
            <div class="col-auto">
              <p class="pt-2">
                <strong class="text-white">Sign up for our newsletter</strong>
              </p>
            </div>
            <div class="col-md-5 col-12">
              <!-- Email input -->
              <div class="form-outline form-white mb-4">
                <input type="email" id="form5Example2" class="form-control" placeholder="Email address" />
              </div>
            </div>
            <div class="col-auto">
              <!-- Submit button -->
              <button type="submit" class="btn btn-outline-light mb-4">
                Subscribe
              </button>
            </div>
          </div>
        </form>
      </section>
      <section class="mb-4">
        <p class="text-white">
          227 Đ. Nguyễn Văn Cừ, Phường 4, Quận 5, Thành phố Hồ Chí Minh, Việt Nam
        </p>
      </section>
    </div>
    <div class="text-center p-3 text-white" style="background-color: rgba(0, 0, 0, 0.2);">
      <p class="text-white" href="#">© 2021 Copyright: TechNow</p>
    </div>
  </footer> <!-- end of footer -->
<?php endif; ?>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js"></script>
<script src="https://cdn.jsdelivr.net/npm/smartwizard@5/dist/js/jquery.smartWizard.min.js" type="text/javascript"></script>
<script type="text/javascript" src=<?php chooseJSFile($current_page) ?>></script>
</body>
</html>