<?php
  include "includes/config.php";
  include 'includes/header.php';
?>
<?php if (!isset($cart) || $cart->getCartList() == []): ?>
  <div class="cart-container" style="min-height: 70vh;">
    <div class="cart-empty">
      <div class="empty-img-wrapper text-center">
        <img src="assets/empty-cart.png" alt="">
      </div>
      <div class="btn-continue-wrapper text-center">
        <a href="index.php"><button type="button" class="btn" style="font-size: 0.9rem;">Continue shopping</button></a>
      </div>
    </div>
  </div>

<?php else: ?>
  <div class="cart-available cart-container">
    <div class="cart-title-wrapper mt-4 pr-4">
      <div class="row">
        <div class="col-md-8 d-flex">
          <h3 class="cart-title ml-3 mt-3 mb-0" style="font-size: 1.4rem;">MY CART</h3>
          <button type="button" class="btn btn-link remove-all mt-3" data-toggle="modal"
            data-target="#exampleModal">Remove all</button>
        </div>
      </div>
    </div>
    <div class="row">
      <ul class="card-list col-md-8 pr-5">
        <!-- output cardList here -->
        <?php echo $cart->printCartList();?>
      </ul>
      <div class="summary-wrapper col-md-3">
        <div class="summary card shadow-sm mt-3" style="height: 200px;">
          <h5 class="text-center mt-2 summary-title ">Order Summary</h5>
          <div class="tax d-flex mt-4">
            <h5 class="mr-auto" style="font-weight: 100;">Tax</h5>
            <p class="mb-0" style="font-size: 0.8rem; font-weight: bold">0₫</p>
          </div>
          <hr>
          <div class="total d-flex">
            <h5 class="mr-auto" style="font-weight: 100;">Total</h5>
            <p class="mb-0 total-price"><?php echo $cart->getTotalPrice(); ?></p>
          </div>
        </div>
        <a href="payment.php"><button type="button" class="btn btn-danger w-100 mt-3 check-out-btn">Checkout</button></a>
      </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Remove all products from your cart?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" style="font-size: 0.8rem;"
              data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-danger remove-all-btn" style="font-size: 0.8rem;"
              data-dismiss="modal">Confirm</button>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>
<?php include 'includes/footer.php'; ?>
