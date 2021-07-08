<?php
include "./includes/config.php";
include "./classes/Order.php";
include "./functions/UI_func.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $order = new Order($conn);

    $order->getOrder($id);
    // var_dump($order->getProducts());
}

include "./includes/header.php";
?>

<div class="container mt-5 order-detail">
    <div class="main-order">
        <h3>Order #<?php
                    echo $id
                    ?></h3>
        <p><b>Date created: </b><?php
            echo $order->getDate();
            ?></p>
        <div class="detail">
            <h3>Customer details</h3>
            <p class="mb-0"><b>Customer: </b><?php
                            echo $order->getName() . " - " . $order->getPhone();
                            ?></p>
            <p><b>Address: </b><?php
                echo $order->getAddress();
                ?></p>
        </div>
        <div class="package">
            <h3>Package Details</h3>
            <?php
            renderProductRow($order->getProducts());
            ?>
        </div>
        <div class = "final-price mt-5 d-flex justify-content-between align-items-center">
            <h2>Total Price: </h2>
            <h3 class = "text-danger"><?php
                $total = intval($order->getTotalPrice());
                $total = number_format($total,0);
                echo $total . "đ";
            ?></h3>
        </div>
    </div>
</div>
<?php
include "./includes/footer.php";
?>