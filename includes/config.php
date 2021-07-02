<?php
    session_start();
    include "./database/db.php";

    $current_page = basename($_SERVER['SCRIPT_NAME'],".php");
?>