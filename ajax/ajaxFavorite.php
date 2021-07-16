<?php
    include '../includes/config.php';
    include '../classes/Favorite.php';

    if($_SESSION['signedIn'] == true) {
        if(isset($_POST['id'])) {
          $favorite = new Favorite($conn, $_SESSION['userID']);
          if(isset($_POST['add'])){
            $favorite->addToFavorite($_POST['id']);
            echo "added to favorite";
          }elseif(isset($_POST['remove'])){
            $favorite->removeFavorite($_POST['id']);
            if(isset($_POST['favorite'])) {
              $list = $favorite->getFavoriteList();
              if(!$list) {
                echo "empty favorite";
                return;
              }
            }
            echo "remove from favorite";
          }
        }
    }
    else echo "not signed in";
?>