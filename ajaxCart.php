<?php
  include "includes/config.php";

  if(isset($_POST['id']) && isset($_POST['remove'])) {
    if($cart->removeItem($_POST['id']))
      echo $cart->getTotalPrice() . " " . $cart->getTotalQuantity();
    else echo "error";
  }

  if(isset($_POST['id']) && isset($_POST['increase'])) {
    if($cart->increaseQuantity($_POST['id']))
      echo $cart->getTotalPrice() . " " . $cart->getTotalQuantity() . " " . $cart->getQuantity($_POST['id']);
    else echo "error";
  }

  if(isset($_POST['id']) && isset($_POST['decrease'])) {
    if($cart->decreaseQuantity($_POST['id']))
      echo $cart->getTotalPrice() . " " . $cart->getTotalQuantity() . " " . $cart->getQuantity($_POST['id']);
    else echo "error";
  }

  if(isset($_POST['remove_all'])) {
    if($cart->removeAll())
      echo $cart->getTotalPrice() . " " . $cart->getTotalQuantity();
    else echo "error";
  }
 ?>
