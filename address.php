<?php
include "includes/config.php";
include 'includes/header.php';
?>
<?php if ($_SESSION['signedIn'] != true) : ?>
  <div class="jumbotron text-center">
    <h1 class="display-3">Please login first</h1>
    <p class="lead">
      <a class="btn btn-primary btn-lg" href="signin.php" role="button">Login</a>
    </p>
  </div>
<?php else : ?>
  <div class="jumbotron text-center" userid=<?php echo $_SESSION['userID'] ?>>
    <h1 class="display-3">Address Book</h1>
  </div>
  <div class='container addressbook'>
  </div>
  </div>
  <div class='text-center mt-3 container'>
    <button type="button" class="btn btn-dark p-2 mt-3 create"><i class="bi bi-file-plus"></i> Create new address</button>
  </div>
<?php endif; ?>


<?php include 'includes/footer.php'; ?>