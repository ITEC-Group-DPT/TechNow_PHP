<?php
  //include class
  include "./classes/User.php";
  include "./classes/Product.php";

  //include other func
  include "./includes/config.php";
  include "./functions/UI_func.php";

  $laptops = Product::getProductsByCategory("Laptop", $conn, 8, 9);
  $cpus = Product::getProductsByCategory("CPU", $conn, 8, 9);
  $monitors = Product::getProductsByCategory("Monitor", $conn, 8, 9);

  //include header
  include "./includes/header.php"
?>

<div class="menu-banners">
  <div class="row">

    <div class="col-lg-2 col-md-4 px-0 menu-list my-2 border border-2 rounded shadow-sm bg-white">
      <img src="./assets/left-banner.png" alt="">
    </div>

    <div class="col-lg-7 col-md-8 my-2">
      <div id="carouselId" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselId" data-slide-to="0" class="active"></li>
          <li data-target="#carouselId" data-slide-to="1"></li>
          <li data-target="#carouselId" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner h-100 rounded" role="listbox">
          <div class="carousel-item active">
            <img src="./assets/slideshow_2.jpeg" alt="First slide">
          </div>
          <div class="carousel-item">
            <img src="./assets/slideshow_1.jpeg" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img src="./assets/slideshow_4.jpeg" alt="Third slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

    </div>

    <div class="col-lg-3 banner-section">
      <div class="sm-banner-wrapper">
        <img src="img\sm-banner2.webp" alt="">
      </div>
      <div class="sm-banner-wrapper">
        <img src="img\sm-banner3.webp" alt="">
      </div>
    </div>

  </div>
</div>

<div class="main-container">

  <div class="sponsor-container">
    <div class="row w-100">

      <div class="col-md-4 sponsor">
        <div class="img w-100 h-100">
          <img src="./assets/sponsor-1.png" alt="">
        </div>
      </div>

      <div class="col-md-4 sponsor">
        <div class="img w-100 h-100">
          <img src="./assets/sponsor-2.jpeg" alt="">
        </div>

      </div>

      <div class="col-md-4 sponsor">
        <div class="img w-100 h-100">
          <img src="./assets/sponsor-3.jpeg" alt="">
        </div>

      </div>

    </div>
  </div>

  <div class="top-rating mt-1">

    <div class="d-flex align-items-center">
      <i class="bi bi-award fa-2x red-text"></i>
      <div class="mb-0 top-seller-name"><span> Top Seller</span></div>

    </div>

    <div id="controls" class="rounded">
      <i class="slider-arrow leftcenter previous bi bi-arrow-left-short fa-2x" aria-hidden="true"></i>
      <i class="slider-arrow rightcenter next bi bi-arrow-right-short fa-2x" aria-hidden="true"></i>
      <button class="auto"></button>
      <div class="my-3 mx-4 py-2 px-3">
        <div class="my-slider d-flex">
          <?php
            renderTopRating($topRating);
          ?>
        </div>
      </div>
    </div>
  </div>

  <div class="d-flex justify-content-between align-items-center mt-5">
    <h3 class="mb-0 catalog-name"><span>Laptop</span></h3>
  </div>
  <div class="row Laptop-row w-100 mx-0 rounded">
    <?php
    renderProductCategory($laptops)
    ?>
  </div>

  <div class="d-flex justify-content-between  align-items-center mt-5">
    <h3 class="mb-0 catalog-name"><span>CPU</span></h3>
  </div>
  <div class="row CPU-row w-100 mx-0 rounded">
    <?php
    renderProductCategory($cpus)
    ?>
  </div>

  <div class="d-flex justify-content-between  align-items-center mt-5">
    <h3 class="mb-0 catalog-name"><span>Monitor</span></h3x>
  </div>
  <div class="row Monitor-row w-100 mx-0 rounded">
    <?php
    renderProductCategory($monitors)
    ?>
  </div>

</div>

<?php
  include 'includes/footer.php';
?>