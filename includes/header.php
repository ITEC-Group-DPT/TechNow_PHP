<?php include "./functions/header_func.php"; ?>
<!doctype html>
<html lang="en">
<head>
  <title>TechNow</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!--CSS-->
  <link rel="stylesheet" href="css/common.css">
  <link rel="stylesheet" href=<?php chooseCSSFile($current_page) ?>>
  <!--Website's icon (on browser's tab)-->
  <link rel="icon" href="img/logo.png">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!--Icons-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
  <!--Fonts-->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@500&amp;display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Serif:wght@300;800&amp;display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;800&amp;display=swap" rel="stylesheet">
  <!-- Slider -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.3/tiny-slider.css">
  <?php
  if ($current_page == "payment")
  {
    echo '<link href="https://cdn.jsdelivr.net/npm/smartwizard@5/dist/css/smart_wizard_all.min.css" rel="stylesheet" type="text/css" />';
  }
  if ($current_page == "order" || $current_page == "payment" || $current_page == "orderDetail" || $current_page == "favorite")
    echo '<link rel="stylesheet" href="css/cart.css">';
  ?>
</head>
<body>
  <?php if ($current_page == "index") : ?>
    <div class="upper-nav">
      <div class="upper-container">
        <div class="row">
          <a class="col-md-3 logo-wrapper text-center pt-1" href="index.php">
            <img src="img/logo_sub.webp" style="width: 165px; height: 34px;" alt="">
          </a>
          <div class="col-md-6 d-flex search-wrapper justify-content-center align-items-center">
            <div class="dropdown input-group w-100 ">
              <input type="text" onkeyup="searchFunc()" onfocus="searchFunc()" class="form-control rounded dropdown-toggle" id="searchbarinp" placeholder="What are you looking for today?" data-toggle="dropdown">
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
                <span class="badge badge-pill badge-danger number-item-cart">
                  <?php if (isset($cart))
                          echo $cart->getTotalQuantity();
                        else echo "0"; ?>
                </span>
              </div>
              <p class="text-center m-0 name" style="font-size: 15px;">Cart</p>
            </a>

            <?php if ($_SESSION['signedIn']) : ?>
              <div class="user dropdown">
                <a tabindex="0" class="user-btn menu-upper ml-4 d-flex align-items-center justify-content-center" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <div class="user-icon-wrapper mr-1">
                    <button type="button" class="btn rounded-circle icon-upper p-0">
                      <i class="bi bi-person fa-lg text-dark"></i>
                    </button>
                  </div>
                  <p class="text-center m-0 name" style="font-size: 15px;"><?php echo htmlspecialchars($_SESSION['username']); ?></p>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="z-index: 5000;">
                  <a class="dropdown-item" href="order.php"><i class="bi bi-clock mr-2"></i>Order</a>
                  <a class="dropdown-item" href="favorite.php"><i class="bi bi-heart mr-2"></i>Favorite</a>
                  <a class="dropdown-item" href="address.php"><i class="bi bi-geo-alt mr-2"></i>Address</a>
                  <div class="dropdown-divider"></div>
                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <button type="submit" name="signout" class="dropdown-item text-danger"><i class="bi bi-box-arrow-right mr-2"></i>Sign out</button>
                  </form>
                </div>
              </div>
            <?php else : ?>
              <a class="user-btn menu-upper ml-4 d-flex align-items-center justify-content-center" href="signin.php">
                <div class="user-icon-wrapper mr-1">
                  <button type="button" class="btn rounded-circle icon-upper p-0">
                    <i class="bi bi-person fa-lg text-dark"></i>
                  </button>
                </div>
                <p class="text-center m-0 name" style="font-size: 15px;">Login</p>
              </a>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <?php if ($current_page != "signin" && $current_page != "signup") : ?>
    <nav class="navbar sticky-top navbar-expand-md navbar-dark nav-footer-theme">
      <div class="nav-wrapper-mobile d-flex">
        <button class="custom-toggler navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="nav-item popup ml-auto pr-0 mr-0" id="pop-up-mobile" style="display: none;">
          <ul class="navbar-nav pop-up-items d-flex flex-row h-100">
            <li class="nav-item">
              <a class="cart-btn cart-mobile d-flex align-items-center h-100" href="cart.php">
                <div class="cart-icon-wrapper mr-2">
                  <button type="button" class="btn rounded-circle p-0" id="cart-icon-mobile" data-container="body" data-toggle="popover" data-placement="bottom" data-content="">
                    <i class="bi bi-cart fa-1x text-white" style="color: black;"></i>
                  </button>
                  <span class="badge badge-pill badge-danger number-item-cart">
                    <?php
                      if (isset($cart))
                        echo $cart->getTotalQuantity();
                      else echo "0"; ?>
                  </span>
                </div>
                <p class="text-center m-0 name text-white" style="font-size: 15px;">Cart</p>
              </a>
            </li>
            <li class="nav-item">
              <?php if ($_SESSION['signedIn']) : ?>
                <a tabindex="0" class="user-btn d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <div class="user-icon-wrapper">
                    <button type="button" class="btn rounded-circle icon-upper p-0" id="user-icon-mobile" data-container="body" data-toggle="popover" data-placement="bottom" data-content="">
                      <i class="bi bi-person fa-lg text-white"></i>
                    </button>
                  </div>
                  <p class="text-center m-0 name text-white" style="font-size: 15px;"><?php echo htmlspecialchars($_SESSION['username']); ?></p>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="z-index: 5000; position: absolute; left: auto; right: 10px;">
                  <a class="dropdown-item" href="order.php"><i class="bi bi-clock mr-2"></i>Order</a>
                  <a class="dropdown-item" href="favorite.php"><i class="bi bi-heart mr-2"></i>Favorite</a>
                  <a class="dropdown-item" href="address.php"><i class="bi bi-geo-alt mr-2"></i>Address</a>
                  <div class="dropdown-divider"></div>
                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <button type="submit" name="signout" class="dropdown-item text-danger"><i class="bi bi-box-arrow-right mr-2"></i>Sign out</button>
                  </form>
                </div>
              <?php else : ?>
                <a class="user-btn user-mobile d-flex align-items-center h-100" href="signin.php">
                  <div class="user-icon-wrapper mr-2">
                    <button type="button" class="btn rounded-circle p-0" id="login-icon-mobile" data-container="body" data-toggle="popover" data-placement="bottom" data-content="">
                      <i class="bi bi-person fa-1x text-white" style="color: black;"></i>
                    </button>
                  </div>
                  <p class="text-center m-0 name text-white " style="font-size: 15px;">Login</p>
                </a>
              <?php endif; ?>
            </li>
          </ul>
        </div>
      </div>

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
              <a class="nav-link text-center" href="contact.php">
                <i class="bi bi-telephone-inbound mr-2 text-white"></i>
                <span class="text-white">Contact us</span>
              </a>
            </li>
            <li class="nav-item popup ml-auto pr-0 mr-0" id="pop-up-desktop">
              <ul class="navbar-nav pop-up-items d-flex" style="display: none;">
                <li class="nav-item">
                  <a class="cart-btn d-flex align-items-center" href="cart.php">
                    <div class="cart-icon-wrapper mr-2">
                      <button type="button" class="btn rounded-circle p-0" id="cart-icon-desktop" data-container="body" data-toggle="popover" data-placement="bottom" data-content="">
                        <i class="bi bi-cart fa-1x text-white"></i>
                      </button>
                      <span class="badge badge-pill badge-danger number-item-cart">
                        <?php
                          if (isset($cart))
                            echo $cart->getTotalQuantity();
                          else echo "0";
                        ?></span>
                    </div>
                    <p class="text-center m-0 name text-white" style="font-size: 15px;">Cart</p>
                  </a>
                </li>
                <li class="nav-item user dropdown">
                  <?php if ($_SESSION['signedIn']) : ?>
                    <a tabindex="0" class="user-btn d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <div class="user-icon-wrapper">
                        <button type="button" class="btn rounded-circle icon-upper p-0" id="user-icon-desktop" data-container="body" data-toggle="popover" data-placement="bottom" data-content="">
                          <i class="bi bi-person fa-lg text-white"></i>
                        </button>
                      </div>
                      <p class="text-center m-0 name text-white" style="font-size: 15px;"><?php echo htmlspecialchars($_SESSION['username']); ?></p>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="z-index: 5000;">
                      <a class="dropdown-item" href="order.php"><i class="bi bi-clock mr-2"></i>Order</a>
                      <a class="dropdown-item" href="favorite.php"><i class="bi bi-heart mr-2"></i>Favorite</a>
                      <a class="dropdown-item" href="address.php"><i class="bi bi-geo-alt mr-2"></i>Address</a>
                      <div class="dropdown-divider"></div>
                      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                        <button type="submit" name="signout" class="dropdown-item text-danger"><i class="bi bi-box-arrow-right mr-2"></i>Sign out</button>
                      </form>
                    </div>
                  <?php else : ?>
                    <a class="user-btn d-flex align-items-center" href="signin.php">
                      <div class="user-icon-wrapper">
                        <button type="button" class="btn rounded-circle p-0" id="login-icon-desktop" data-container="body" data-toggle="popover" data-placement="bottom" data-content="">
                          <i class="bi bi-person fa-1x text-white"></i>
                        </button>
                      </div>
                      <p class="text-center m-0 name text-white" style="font-size: 15px;">Login</p>
                    </a>
                  <?php endif; ?>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  <?php endif; ?>
