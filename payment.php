<?php 
include "./includes/config.php";
include 'includes/header.php'; 
?>
<<<<<<< HEAD
<!-- change userid = session || if no login, noti by jumpbotron-->
<link rel="stylesheet" href="css/cart.css">
<div class="container m-5 addressbook" userid=<?php $_SESSION['userID'] ?>>
    <h3>Address Book</h3><span><p>(you can edit exists address book by choosing and editing below)</p></span>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="addressbook" id="flexRadioDefault0" checked>
        <label class="form-check-label" for="flexRadioDefault0">
            New address <i class="bi bi-plus-square"></i>
        </label>
    </div>
    <!-- <div class="form-check">
        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
        <label class="asd" for="flexRadioDefault2">
            <p class="m-0">Name: <span id="name2">Phu</span><br>
            Address: <span>Phu</span><br>
            Phone: <span> 21983918390</span>
            </p>
        </label>
=======
<div class="modal fade" id="shipping-policy" tabindex="-1" role="dialog" aria-labelledby="shippingPolicyModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="shippingPolicyModalLabel">Shipping policy</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul>
                        <li>
                            <p> <b>TP. Hồ Chí Minh:</b> Quận 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, Thủ Đức, Tân Phú,
                                Tân Bình, Phú
                                Nhuận, Gò Vấp, Bình Thạnh, Bình Tân.</p>
                        </li>
                        <li>
                            <p> <b>Hà Nội:</b> Quận Ba Đình, Hoàn Kiếm, Tây Hồ, Long Biên, Cầu Giấy, Đống Đa, Hai Bà
                                Trưng, Hoàng Mai,
                                Thanh Xuân, Nam Từ Liêm, Bắc Từ Liêm, Hà Đông.</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
>>>>>>> parent of a2e5b41 (Merge branch 'feature-delivery' into main)
    </div>

    <div class="modal fade" id="user-login" tabindex="-1" role="dialog" aria-labelledby="userLoginModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userLoginModalLabel">Feature is currently under maintenance</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>You can still order products without an user account!</p>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="hot-deals" tabindex="-1" role="dialog" aria-labelledby="hotDealsModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="hotDealsModalLabel">Hot Discount</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>There is currently no discount available. Sign up for our newsletter for future upcoming hot
                        deals!</p>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="newsletter" tabindex="-1" role="dialog" aria-labelledby="newsletterModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="newsletterModalLabel">Newsletter</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Thanks for subscribing. You will now receive various future event details and hot deals from us!</p>
        </div>
      </div>
    </div>
  </div>

    <div id="smartwizard" class="shadow-lg p-3 bg-body ">
        <ul class="nav">
            <li>
                <a class="nav-link" href="#step-1">
                    Step 1
                    <br>
                    Information
                </a>

            </li>
            <li>
                <a class="nav-link" href="#step-2">
                    Step 2 <br> Address
                </a>

            </li>
            <li>
                <a class="nav-link" href="#step-3">
                    Step 3 <br> Payment Method
                </a>
            </li>
            <li>
                <a class="nav-link" href="#step-4">
                    Step 4 <br> Finish
                </a>
            </li>
        </ul>

        <div class="tab-content mt-4">
            <div id="step-1" class="tab-pane" role="tabpanel">
                <div class="row">
                    <div class="col-md-6"> <input type="text" class="form-control" placeholder="Full Name"
                            required>
                    </div>
                    <div class="col-md-6"> <input type="text" class="form-control" placeholder="Email"
                            required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6"> <input type="text" class="form-control" placeholder="Phone Number"
                            required>
                    </div>
                    <div class="col-md-6"> <input type="text" class="form-control"
                            placeholder="Phone Number 2" required>
                    </div>
                </div>
            </div>
            <div id="step-2" class="tab-pane" role="tabpanel">
                <div class="row">
                    <div class="col-md-6"> <input type="text" class="form-control" placeholder="Address" required>
                    </div>
                    <div class="col-md-6"> <input type="text" class="form-control" placeholder="City" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6"> <input type="text" class="form-control" placeholder="State" required>
                    </div>
                    <div class="col-md-6"> <input type="text" class="form-control" placeholder="Country" required>
                    </div>
                </div>
            </div>
            <div id="step-3" class="tab-pane" role="tabpanel">
                <div class="row">
                    <div class="col-md-6"> <input type="text" class="form-control" placeholder="Card Number" required>
                    </div>
                    <div class="col-md-6"> <input type="text" class="form-control" placeholder="Card Holder Name"
                            required> </div>
                </div>
                <div class="row">
                    <div class="col-md-6"> <input type="text" class="form-control" placeholder="CVV" required>
                    </div>
                    <div class="col-md-6"> <input type="text" class="form-control" placeholder="Mobile Number" required>
                    </div>
                </div>
            </div>
            <div id="step-4" class="tab-pane" role="tabpanel">
                <div class="row">
                    <div class="col-md-12"> <span>Thanks for submitting your details with TechNow. We will review your
                            details and contact you as soon as possible.</span> </div>
                </div>
            </div>
        </div>

    </div>

    <div class="alert alert-success h-100 d-none" role="alert">
        We are all set!<br>
        Your payment detail has been sent to TechNow.<br>
        Getting you back to the homepage.
    </div>
<?php include 'includes/footer.php'; ?>
