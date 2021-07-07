<?php
    include "./includes/config.php";
    include "./classes/Product.php";
    include "./functions/UI_func.php";
    include "./includes/header.php";

    $product = new Product($conn);
    $res = $product->getProduct();
    if ($res != false) {
        $ratingStar = getStarRating(intval($res['rating']));
        $format_price = number_format($res['price'],0);
    }

    //var_dump($res);
?>

<div class="main-container mt-5" style="min-height: 80vh;">
    <div class="row">
    <?php if ($res != false): ?>
        <div class="col-md-6">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="<?php echo $res['img1'] ?>" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="<?php echo $res['img2'] ?>" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="<?php echo $res['img3'] ?>" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

        <div class="col-md-6">
                <h3 class="product-name"><?php echo $res['name'] ?></h3>
                <div class='rating'>
                    <?php echo $ratingStar; ?>
                    <span><?php echo $res['sold']; ?></span>
                </div>
                <h5 class="product-title mt-4">Description</h5>
                <p class="product-desc"><?php echo $res['description'] ?></p>
                <h5 class="product-title mt-4">Specs</h5>
                <p class="product-spec"><?php echo $res['spec'] ?></p>
                <p class='price mt-5 text-right'><?php echo $format_price; ?> đ</p>

                <div class="functions d-flex justify-content-end mt-3">
                    <button type="button" class="btn btn-primary add-favorite mr-3" id="<?php echo $res['productID']; ?>"><i class="bi bi-heart"></i> Add to Favorite</button>
                    <button type="button" class="btn btn-primary add-cart" id="<?php echo $res['productID']; ?>"><i class="bi bi-cart-plus"></i> Add to Cart</button>
                </div>

        </div>
    <?php else: ?>
        <h1 class="text-center font-weight-light">Product not found! (Error: 404)</h1>
    <?php endif; ?>

    </div>
</div>
<?php
    include "includes/footer.php";
?>