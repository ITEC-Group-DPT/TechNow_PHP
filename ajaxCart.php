<?php
  include "includes/config.php";

  if($_SESSION['signedIn'] == true) {
    if(isset($_POST['id']) && isset($_POST['add'])) {
      if($cart->addItemToCart($_POST['id']))
        echo $cart->getTotalQuantity();
      else echo "error";
    }

    else if(isset($_POST['id']) && isset($_POST['remove'])) {
      if($cart->removeItem($_POST['id']))
        echo $cart->getTotalPrice() . " " . $cart->getTotalQuantity();
      else echo "error";
    }

    else if(isset($_POST['id']) && isset($_POST['increase'])) {
      if($cart->increaseQuantity($_POST['id']))
        echo $cart->getTotalPrice() . " " . $cart->getTotalQuantity() . " " . $cart->getQuantity($_POST['id']);
      else echo "error";
    }

    else if(isset($_POST['id']) && isset($_POST['decrease'])) {
      if($cart->decreaseQuantity($_POST['id']))
        echo $cart->getTotalPrice() . " " . $cart->getTotalQuantity() . " " . $cart->getQuantity($_POST['id']);
      else echo "error";
    }

    else if(isset($_POST['remove_all'])) {
      $cart->removeAll();
      // $location = "Location: cart.php";
      // header($location);
      //   echo $cart->getTotalPrice() . " " . $cart->getTotalQuantity();
      // else echo "error";
    }
    elseif (isset($_POST['getcartlist'])) {
      $arr = $cart->getCartList();
      echo json_encode($arr);
    }
  }
  else echo "not signed in";
 ?>
