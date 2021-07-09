<?php
  include "includes/config.php";
  include 'includes/header.php';
  include 'classes/Favorite.php';
  include 'functions/UI_func.php';
  $list = false;
  if (isset($_SESSION['userID'])) {
    $list = Favorite::getFavoriteList($conn, $_SESSION['userID']);
  }
?>

<div class="container d-flex flex-column justify-content-center align-items-center fav" style="min-height: 55vh !important;">
  <?php if ($list != false) : ?>
    <div class="text-center mt-5">
      <h3 class="mb-0 catalog-name">Favorites</h3>
    </div>
    <div class="row mx-0 rounded favorite-list">
      <?php renderFavoriteList($list); ?>
    </div>

  <?php else : ?>
    <div class="text-center mt-5">
      <h3 class="mb-0 catalog-name">No favorite item found</h3>
    </div>
  <?php endif; ?>
</div>

<?php include 'includes/footer.php'; ?>