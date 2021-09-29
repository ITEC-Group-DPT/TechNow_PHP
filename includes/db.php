<?php
  $host = "localhost";
  $user = "root";
  $pw = "";
  $db = "technow";

  $conn = new mysqli($host, $user, $pw, $db);
  mysqli_set_charset($conn, 'utf8')
?>
