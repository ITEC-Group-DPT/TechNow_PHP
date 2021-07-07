<?php
  include "includes/config.php";
  include 'includes/header.php';
  include 'classes/Favorite.php';
  include 'functions/UI_func.php';
  $list = false;
  if(isset($_SESSION['userID'])){
    $list = Favorite::getFavoriteList($conn, $_SESSION['userID']);
  }
?>
<div class="container-fluid m-0 p-0">
<?php if ($list != false): ?>
  <div class="text-center mt-5">
      <h3 class="mb-0 catalog-name display-4"><span>Favorites</span></h3x>
  </div>
  <div class="row w-100 mx-0 rounded">
    <?php renderFavoriteList($list); ?>
  </div>
</div>
<?php else: ?>
  <div class="text-center mt-5">
      <h3 class="mb-0 catalog-name display-4"><span>No favorite item found</span></h3x>
  </div>
<?php endif; ?>
<?php include 'includes/footer.php'; ?>