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
    <!-- <div class="card text-left my-2">
      <p class='font-weight-bold p-2 m-0'>Name: <span id="name2">Phu</span><br>
        Address: <span>Phu</span><br>
        Phone: <span> 21983918390</span>
      </p>
      <div class='card-footer text-right p-2'>
        <button type="button" class="btn btn-outline-dark p-1">Edit</button>
        <button type="button" class="btn btn-outline-danger p-1">Delete</button>
        <div class='text-left p-3'>
          <label for="name">Name</label>
          <input type="text" class="form-control" name="name" placeholder="Name">
          <label for="address0">Address</label>
          <input type="text" class="form-control" name="address0" placeholder="Address">
          <label for="address1">Ward</label>
          <input type="text" class="form-control" name="address1" placeholder="Ward">
          <label for="address2">District</label>
          <input type="text" class="form-control" name="address2" placeholder="District">
          <label for="address3">City</label>
          <input type="text" class="form-control" name="address3" placeholder="City">
          <label for="phone">Phone</label>
          <input type="number" class="form-control" name="phone" placeholder="Phone">
          <div class='text-center my-2'>
            <button type="button" class="btn btn-outline-danger p-1">Cancel</button>
            <button type="button" class="btn btn-outline-success p-1">Submit</button>
          </div>
        </div>
      </div>
    </div> -->
  </div>
  </div>
  <div class='text-center mt-3 container'>
    <button type="button" class="btn btn-outline-primary p-1 create"><i class="bi bi-file-plus"></i> Create new address</button>
  </div>
<?php endif; ?>


<?php include 'includes/footer.php'; ?>