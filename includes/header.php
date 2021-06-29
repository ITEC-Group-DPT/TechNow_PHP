<?php
  include "./functions/header_func.php";
  $current_page = basename($_SERVER['SCRIPT_NAME'],".php");
?>
<!doctype html>
<html lang="en">

<head>
  <title><?php echo $pageTitle; ?></title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!--CSS-->
  <link rel="stylesheet" href="css/common.css">
  <link rel="stylesheet" href= <?php chooseCSSFile($current_page)?>>
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
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;800&amp;display=swap">
  <!-- Slider -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.3/tiny-slider.css">
</head>

<body>
<?php
  if ($current_page == "index"):
?>
<div class="upper-nav">
    <div class="upper-container">
      <div class="row">

        <a class="col-md-3 logo-wrapper text-center pt-1" href="index.php">
          <img src="img/logo_sub.webp" style="width: 165px; height: 34px;" alt="">
        </a>

        <div class="col-md-6 d-flex search-wrapper justify-content-center align-items-center">

          <div class="dropdown input-group w-100 ">

            <input type="text" class="form-control rounded dropdown-toggle" id="searchbarinp" placeholder="What are you looking for today?" data-toggle="dropdown">
            <ul class="dropdown-menu w-100" id="dropdownsearchbar">

            </ul>
          </div>

        </div>

        <div class="col-md-3 d-flex cart-user-wrapper align-items-center justify-content-center pt-2 pt-md-0">

          <a class="cart-btn menu-upper d-flex align-items-center justify-content-center" href="cart.php">
            <div class="cart-icon-wrapper mr-2">
              <button type="button" class="btn rounded-circle icon-upper p-0">
                <i class="bi bi-cart fa-lg" style="color: black;"></i>
              </button>
              <span class="badge badge-pill badge-danger number-item-cart">0</span>
            </div>
            <p class="text-center m-0 name" style="font-size: 15px;">Cart</p>
          </a>

          <?php if ($_SESSION['signedIn']): ?>
            <div class="user dropdown">
              <a tabindex="0" class="nav-link p-0" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img class="avatar mr-2" src="assets/defaultUserAvatar.png" alt="">
              <?php echo htmlspecialchars($_SESSION['username']); ?>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="z-index: 5000;">
                <a class="dropdown-item" href="profile.php"><i class="bi bi-person mr-2"></i>Profile</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-danger async-task" href="signout.php"><i class="bi bi-box-arrow-right mr-2"></i>Sign out</a>
              </div>
            </div>
          <?php else: ?>
            <a class="user-btn menu-upper ml-4 d-flex align-items-center justify-content-center" href="signin.php">
              <div class="user-icon-wrapper mr-1">
                <button type="button" class="btn rounded-circle icon-upper p-0">
                  <i class="bi bi-person fa-lg" style="color: black;"></i>
                </button>
              </div>
              <p class="text-center m-0 name" style="font-size: 15px;">Login</p>
            </a>
          <?php endif; ?>

        </div>
      </div>
    </div>
  </div>
<?php
  endif;
?>
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
              <span class="text-white">Home</span>
            </a>
          </li>
          <li class="nav-item main col-md-2 px-0">
            <a class="nav-link text-center" href="#">
              <i class="bi bi-gift mr-2 text-white"></i>
              <span class="text-white">Hot Discount</span>
            </a>
          </li>
          <li class="nav-item main col-md-2 px-0">
            <a class="nav-link text-center" href="#">
              <i class="bi bi-truck mr-2 text-white"></i>
              <span class="text-white">Shipping policy</span>
            </a>
          </li>
          <li class="nav-item main col-md-2 px-0">
            <a class="nav-link text-center" href="contact.php">
              <i class="bi bi-telephone-inbound mr-2 text-white"></i>
              <span class="text-white">Contact us</span>
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
