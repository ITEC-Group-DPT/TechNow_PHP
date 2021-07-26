<?php
    include '../includes/config.php';
    include '../classes/Favorite.php';

    if($_SESSION['signedIn'] == true) {
        if(isset($_POST['id'])) {
          if(isset($_POST['add'])){
            Favorite::addToFavorite($conn, $_SESSION['userID'], $_POST['id']);
            echo "added to favorite";
          }elseif(isset($_POST['remove'])){
            Favorite::removeFavorite($conn, $_SESSION['userID'], $_POST['id']);
            if(isset($_POST['favorite'])) {
              if(!Favorite::getFavoriteList($conn, $_SESSION['userID'])) {
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