<?php
    include 'includes/config.php';
    include 'classes/Favorite.php';
    
    if($_SESSION['signedIn'] == true) {
        if(isset($_POST['id'])) {
            if(Favorite::addToFavorite($conn, $_SESSION['userID'], $_POST['id']))
              echo "added to favorite";
            else {
                Favorite::removeFavorite($conn, $_SESSION['userID'], $_POST['id']);
                echo "remove from favorite";
            }
          }
    }
    else echo "not signed in";
?>