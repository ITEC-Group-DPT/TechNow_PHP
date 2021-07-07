<?php
include "includes/config.php";
include "./classes/Order.php";
include "./functions/UI_func.php";

$orders = Order::getUserOrders($conn, $_SESSION['userID']);
// var_dump($orders);
include 'includes/header.php';

?>

<div class="container my-5">
  <h2>My Orders</h2>
  <div class="order-lists">
    <?php
      foreach (array_keys($orders) as $key) {
        echo "<h2>Order: #{$key}</h2>";
        renderProductRow($orders[$key]);
      }
    ?>
  </div>
</div>
<?php
include 'includes/footer.php';
?>