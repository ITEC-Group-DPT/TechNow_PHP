<?php
    session_start();

    if (file_exists("./classes/User.php"))
      include "./classes/User.php";
    else
      include "../classes/User.php";

    if (file_exists("./classes/Cart.php"))
      include "./classes/Cart.php";
    else
      include "../classes/Cart.php";
    
    if (file_exists("./database/db.php"))
      include "./database/db.php";
    else
      include "../database/db.php";  

    if (!isset($_SESSION['signedIn']))
      $_SESSION['signedIn'] = false;
    elseif ($_SESSION['signedIn'])
     $cart = new Cart($conn, $_SESSION['userID']);

    $current_page = basename($_SERVER['SCRIPT_NAME'],".php");
	if ($current_page == 'Index') $current_page = 'index';
    if(isset($_POST['signout']))
      User::signOut();
?>
