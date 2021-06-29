<?php
  session_start();
  include 'classes/User.php';
  User::signOut();
?>