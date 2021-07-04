<?php
    session_start();
    include "./classes/User.php";
    if (!isset($_SESSION['signedIn']))
      $_SESSION['signedIn'] = false;

    include "./database/db.php";

    $current_page = basename($_SERVER['SCRIPT_NAME'],".php");

    if(isset($_POST['signout']))
      User::signOut();
?>
