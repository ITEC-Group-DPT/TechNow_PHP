<?php
  session_start();
  $current_page = basename($_SERVER['SCRIPT_NAME'],".php");
  include 'db.php';
?>
