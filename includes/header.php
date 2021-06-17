<!doctype html>
<html lang="en">

<head>
  <title>TechNow - Home</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <script type="text/javascript" src="./assets/products.json"></script>

  <!--CSS-->
  <link rel="stylesheet" href="./includes/style.css">

  <!--Website's icon (on browser's tab-->
  <link rel="icon" href="img/logo.png">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!--Icons-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
    integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
    crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">

  <!--Fonts-->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@500&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Serif:wght@300;800&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;500;700&display=swap" rel="stylesheet">
  <!-- Slider -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.3/tiny-slider.css">
</head>

<body>

  <div class="upper-nav">
    <div class="upper-container">
      <div class="row">

        <a class="col-md-3 logo-wrapper text-center pt-1" href="index.php ">
          <img src="img/logo_sub.webp" style="width: 165px; height: 34px;" alt="">
        </a>

        <div class="col-md-6 d-flex search-wrapper justify-content-center align-items-center">

          <div class="dropdown input-group w-100 ">
            <input type="text" class="form-control rounded dropdown-toggle" id="searchbarinp"
              placeholder="What are you looking for today?" data-toggle="dropdown">


            <ul class="dropdown-menu w-100" id="dropdownsearchbar">

            </ul>
          </div>



        </div>

        <div class="col-md-3 d-flex cart-user-wrapper align-items-center justify-content-center pt-2 pt-md-0">

          <a class="cart-btn menu-upper d-flex align-items-center justify-content-center" href="./pages/Cart/cart.html">
            <div class="cart-icon-wrapper mr-2">
              <button type="button" class="btn rounded-circle icon-upper p-0">
                <i class="bi bi-cart fa-lg" style="color: black;"></i>
              </button>
              <span class="badge badge-pill badge-danger number-item-cart">0</span>
            </div>
            <p class="text-center m-0 name" style="font-size: 15px;">Cart</p>
          </a>

          <a class="user-btn menu-upper ml-4 d-flex align-items-center justify-content-center" data-toggle="modal"
            data-target="#user-login">
            <div class="user-icon-wrapper mr-1">
              <button type="button" class="btn rounded-circle icon-upper p-0">
                <i class="bi bi-person fa-lg" style="color: black;"></i>
              </button>
            </div>
            <p class="text-center m-0 name" style="font-size: 15px;">Login</p>
          </a>

        </div>
      </div>
    </div>
  </div>

  <nav class="navbar sticky-top navbar-expand-md navbar-dark nav-footer-theme">

    <div class="nav-wrapper-mobile d-flex">

      <button class="custom-toggler navbar-toggler d-lg-none" type="button" data-toggle="collapse"
        data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="nav-item popup ml-auto pr-0 mr-0" id="pop-up-mobile" style="display: none;">

        <ul class="navbar-nav pop-up-items d-flex flex-row h-100" style="display: none !important;">
          <li class="nav-item">
            <a class="cart-btn cart-mobile d-flex align-items-center h-100" href="./pages/Cart/cart.html">
              <div class="cart-icon-wrapper mr-2">
                <button type="button" class="btn rounded-circle p-0" id="cart-icon-mobile" data-container="body"
                  data-toggle="popover" data-placement="bottom" data-content="Product is added to your cart">

                  <i class="bi bi-cart fa-1x text-white" style="color: black;"></i>
                </button>
                <span class="badge badge-pill badge-danger number-item-cart">0</span>
              </div>
              <p class="text-center m-0 name text-white" style="font-size: 15px;">Cart</p>
            </a>
          </li>

          <li class="nav-item">
            <a class="user-btn user-mobile d-flex align-items-center h-100" data-toggle="modal"
              data-target="#user-login">
              <div class="user-icon-wrapper mr-2">
                <button type="button" class="btn rounded-circle p-0" id="user-icon">
                  <i class="bi bi-person fa-1x text-white" style="color: black;"></i>
                </button>
              </div>
              <p class="text-center m-0 name text-white" style="font-size: 15px;">Login</p>
            </a>
          </li>
        </ul>

      </div>
    </div>

    <div class="collapse navbar-collapse" id="collapsibleNavId">
      <div class="navbar-container">

        <ul class="navbar-nav mr-auto row">
          <li class="nav-item main col-md-2 px-0">
            <a class="nav-link category-btn text-center" href="./index.php">
              <i class="bi bi-house-door mr-2 text-white"></i>
              <span class="text-white">Home</span>
            </a>
          </li>

          <li class="nav-item main col-md-2 px-0">
            <a class="nav-link text-center" href="#" data-toggle="modal" data-target="#hot-deals">
              <i class="bi bi-gift mr-2 text-white"></i>
              <span class="text-white">Hot Discount</span>
            </a>
          </li>

          <li class="nav-item main col-md-2 px-0">
            <a class="nav-link text-center" href="#" data-toggle="modal" data-target="#shipping-policy">
              <i class="bi bi-truck mr-2 text-white"></i>
              <span class="text-white">Shipping policy</span>
            </a>
          </li>

          <li class="nav-item main col-md-2 px-0">
            <a class="nav-link text-center" href="./pages/Contact/contact.php">
              <i class="bi bi-telephone-inbound mr-2 text-white"></i>
              <span class="text-white">Contact us</span>
            </a>
          </li>

          <li class="nav-item popup ml-auto pr-0 mr-0" id="pop-up-desktop">

            <ul class="navbar-nav pop-up-items d-none h-100">
              <li class="nav-item">
                <a class="cart-btn d-flex align-items-center h-100" href="./pages/Cart/cart.html">
                  <div class="cart-icon-wrapper mr-2">
                    <button type="button" class="btn rounded-circle p-0" id="cart-icon-desktop" data-container="body"
                      data-toggle="popover" data-placement="bottom" data-content="Product is added to your cart">

                      <i class="bi bi-cart fa-1x text-white" style="color: black;"></i>
                    </button>
                    <span class="badge badge-pill badge-danger number-item-cart">0</span>
                  </div>
                  <p class="text-center m-0 name text-white" style="font-size: 15px;">Cart</p>
                </a>
              </li>

              <li class="nav-item">
                <a class="user-btn d-flex align-items-center h-100" data-toggle="modal" data-target="#user-login">
                  <div class="user-icon-wrapper">
                    <button type="button" class="btn rounded-circle p-0" id="user-icon">
                      <i class="bi bi-person fa-1x text-white" style="color: black;"></i>
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

  <div class="modal fade" id="shipping-policy" tabindex="-1" role="dialog" aria-labelledby="shippingPolicyModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="shippingPolicyModalLabel">Shipping policy</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <ul>
            <li>
              <p> <b>TP. Hồ Chí Minh:</b> Quận 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, Thủ Đức, Tân Phú, Tân Bình, Phú
                Nhuận, Gò Vấp, Bình Thạnh, Bình Tân.</p>
            </li>
            <li>
              <p> <b>Hà Nội:</b> Quận Ba Đình, Hoàn Kiếm, Tây Hồ, Long Biên, Cầu Giấy, Đống Đa, Hai Bà Trưng, Hoàng Mai,
                Thanh Xuân, Nam Từ Liêm, Bắc Từ Liêm, Hà Đông.</p>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="user-login" tabindex="-1" role="dialog" aria-labelledby="userLoginModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="userLoginModalLabel">Feature is currently under maintenance</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>You can still order products without an user account!</p>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="hot-deals" tabindex="-1" role="dialog" aria-labelledby="hotDealsModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="hotDealsModalLabel">Hot Discount</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>There is currently no discount available. Sign up for our newsletter for future upcoming hot deals!</p>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="newsletter" tabindex="-1" role="dialog" aria-labelledby="newsletterModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="newsletterModalLabel">Newsletter</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Thanks for subscribing. You will now receive various future event details and hot deals from us!</p>
        </div>
      </div>
    </div>
  </div>