<!doctype html>
<html lang="en">
<head>
  <title>TechNow</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!--CSS-->
  <link rel="stylesheet" href="includes/style.css">
  <!--Website's icon (on browser's tab)-->
  <link rel="icon" href="img/logo.png">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!--Icons-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
  <!--Fonts-->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;500;700&display=swap">
  <!-- Slider -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.3/tiny-slider.css">
</head>
<body>
  <nav class="navbar sticky-top navbar-expand-md navbar-light nav-footer-theme">
    <button class="custom-toggler navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
      <div class="navbar-container">
        <ul class="navbar-nav mr-auto row">
          <li class="nav-item main col-md-2 px-0 pl-2">
            <a class="nav-link category-btn text-center" href="index.php">
              <i class="bi bi-house-door fa-lg mr-2 text-white"></i>
              <span class = "text-white">Home</span>
            </a>
          </li>
          <li class="nav-item main col-md-2 px-0">
            <a class="nav-link text-center" href="#">
              <i class="bi bi-gift mr-2 text-white"></i>
              <span class = "text-white">Hot Discount</span>
            </a>
          </li>
          <li class="nav-item main col-md-2 px-0">
            <a class="nav-link text-center" href="#">
              <i class="bi bi-truck mr-2 text-white"></i>
              <span class = "text-white">Shipping policy</span>
            </a>
          </li>
          <li class="nav-item main col-md-2 px-0">
            <a class="nav-link text-center" href="contact.php">
              <i class="bi bi-telephone-inbound mr-2 text-white"></i>
              <span class = "text-white">Contact us</span>
            </a>
          </li>
          <li class="nav-item popup ml-auto pr-0 mr-0">
            <ul class="navbar-nav pop-up-items d-flex" style="display: none;">
              <li class="nav-item">
                <a class="cart-btn d-flex align-items-center" href="cart.php">
                  <div class="cart-icon-wrapper mr-2">
                    <button type="button" class="btn rounded-circle p-0" id="cart-icon" data-container="body" data-toggle="popover" data-placement="bottom" data-content="Product is added to your cart">
                      <i class="bi bi-cart fa-1x text-white"></i>
                    </button>
                    <span class="badge badge-pill badge-danger number-item-cart">0</span>
                  </div>
                  <p class="text-center m-0 name text-white" style="font-size: 15px;">Cart</p>
                </a>
              </li>
              <li class="nav-item">
                <a class="user-btn d-flex align-items-center" href="#">
                  <div class="user-icon-wrapper">
                    <button type="button" class="btn rounded-circle p-0">
                      <i class="bi bi-person fa-1x text-white"></i>
                    </button>
                  </div>
                  <p class="text-center m-0 name text-white" style="font-size: 15px;">Login</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
