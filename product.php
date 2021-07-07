<?php
    include "./includes/config.php";
    include "./includes/header.php";
    include "./classes/Product.php";
    $product = new Product($conn);
    $res = $product->getProduct();
    var_dump($res);

?>

<div class="container" style="min-height: 70vh;">
    <div class="row">
    <?php if ($res != false): ?>
        <div class="col-md-6">
            
        </div>

        <div class="col-md-6">

        </div>
    <?php else: ?>
        <h1 class="text-center font-weight-light">Product not found! (Error: 404)</h1>
    <?php endif; ?>

    </div>
</div>
<?php
    include "includes/footer.php";
?>