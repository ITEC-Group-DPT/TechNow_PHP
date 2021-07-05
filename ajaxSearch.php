<?php
  include "includes/config.php";
  include 'classes/Product.php';

  if(isset($_POST['value'])) {
    $products = Product::getProducts($conn, $_POST['value'], 5);
    if($products != '')
      echo json_encode($products);
    else echo "no product";
  }
?>
