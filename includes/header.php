<?php
    session_start();
    if(!isset($_SESSION['signedIn'])) {
      $_SESSION['signedIn'] = false;
    }

    include "database/db.php";
    include "link.php";

    $PHPName = basename($_SERVER['SCRIPT_NAME'], ".php");
    $pageTitle = PHPNameToPageName($PHPName);
    $CSSName = PHPNameToCSSName($PHPName);
    $JSName = PHPNameToJSName($PHPName);
?>

<!doctype html>
<html lang="en">

<head>
  <title><?php echo $pageTitle; ?></title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!--CSS-->
  <link rel="stylesheet" href="css/<?php echo $CSSName; ?>">
  <!--Website's icon (on browser's tab)-->
  <link rel="icon" href="img/logo.png">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!--Icons-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
  <!--Fonts-->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;500;700&display=swap">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;800&amp;display=swap">
  <!-- Slider -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.3/tiny-slider.css">
</head>

<body>

