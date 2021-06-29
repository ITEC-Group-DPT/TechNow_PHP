<?php include 'includes/header.php'; ?>
<!-- change userid = session -->
<div class="container m-5 addressbook" userid='1'>
    <h3>Address Book</h3>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault0" checked>
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
                <div class="col-md-6"> <input type="phone" name='phone' class="form-control" placeholder="Phone Number" required>
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
            <div class="alert alert-danger h-100 d-none fillinput" role="alert">
                Some of inputs are not filled, please check again !!!
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