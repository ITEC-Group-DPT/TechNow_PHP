<?php
    session_start();
    include "./classes/User.php";
    include "./classes/Cart.php";
    include "./database/db.php";

    if (!isset($_SESSION['signedIn']))
      $_SESSION['signedIn'] = false;
    else
      $cart = new Cart($conn, $_SESSION['userID']);


    $current_page = basename($_SERVER['SCRIPT_NAME'],".php");

    if(isset($_POST['signout']))
      User::signOut();

?>
