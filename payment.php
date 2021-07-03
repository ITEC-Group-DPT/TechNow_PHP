<?php include 'includes/header.php'; ?>
<!-- change userid = session || if no login, noti by jumpbotron-->
<link rel="stylesheet" href="css/cart.css">
<div class="container m-5 addressbook" userid='1'>
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
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3">
        <label class="form-check-label" for="flexRadioDefault3">
            Default checked radio
        </label>
    </div> -->
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
                Step 3 <br> Checkout List
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
                <div class="col-md-6"> <input type="text" name='name' class="form-control" placeholder="Full Name" required>
                </div>
                <div class="col-md-6"> <input type="number" name='phone' class="form-control" placeholder="Phone Number" required>
                </div>
            </div>
        </div>
        <div id="step-2" class="tab-pane" role="tabpanel">
            <div class="row">
                <div class="col-md-6"> <input type="text" name='address' class="form-control" placeholder="Address" required>
                </div>
                <div class="col-md-6"> <input type="text" name='Sub-distrcit' class="form-control" placeholder="Sub-district" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6"> <input type="text" name="state" class="form-control" placeholder="District" required>
                </div>
                <div class="col-md-6"> <input type="text" name="country" class="form-control" placeholder="City/Province" required>
                </div>
            </div>
        </div>
        <div id="step-3" class="tab-pane" role="tabpanel">
            <div class="cart-container py-3">
                <div class="cart-empty" style="min-height: 70vh;">
                    <div class="empty-img-wrapper text-center">
                        <img src="assets/empty-cart.png" alt="">
                    </div>
                </div>

                <div class="cart-available">
                    <div class="row">
                        <ul class="cart-list col-md-8 pr-5">

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
                                    <p class="mb-0 total-price"></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Remove all products from your cart?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" style="font-size: 0.8rem;" data-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-danger remove-all-btn" style="font-size: 0.8rem;" data-dismiss="modal">Confirm</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="alert alert-danger h-100 d-none fillinput" role="alert">
                Some of inputs are not filled, please check again to complete checkout process !!!
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