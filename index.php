<?php include 'includes/header.php'; ?>
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
             <p> <b>TP. Hồ Chí Minh:</b> Quận 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, Thủ Đức, Tân Phú, Tân Bình, Phú
               Nhuận, Gò Vấp, Bình Thạnh, Bình Tân.</p>
           </li>
           <li>
             <p> <b>Hà Nội:</b> Quận Ba Đình, Hoàn Kiếm, Tây Hồ, Long Biên, Cầu Giấy, Đống Đa, Hai Bà Trưng, Hoàng Mai,
               Thanh Xuân, Nam Từ Liêm, Bắc Từ Liêm, Hà Đông.</p>
           </li>
         </ul>
       </div>
     </div>
   </div>
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
         <p>There is currently no discount available. Sign up for our newsletter for future upcoming hot deals!</p>
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

 <div class="menu-banners">
   <div class="row">

     <div class="col-lg-2 col-md-4 px-0 menu-list my-2 border border-2 rounded  shadow-sm bg-white">
       <img src="./assets/left-banner.png" alt="">
     </div>

     <div class="col-lg-7 col-md-8 my-2">
       <div id="carouselId" class="carousel slide" data-ride="carousel">
         <ol class="carousel-indicators">
           <li data-target="#carouselId" data-slide-to="0" class="active"></li>
           <li data-target="#carouselId" data-slide-to="1"></li>
           <li data-target="#carouselId" data-slide-to="2"></li>
         </ol>
         <div class="carousel-inner h-100 rounded" role="listbox">
           <div class="carousel-item active">
             <img src="./assets/slideshow_2.jpeg" alt="First slide">
           </div>
           <div class="carousel-item">
             <img src="./assets/slideshow_1.jpeg" alt="Second slide">
           </div>
           <div class="carousel-item">
             <img src="./assets/slideshow_4.jpeg" alt="Third slide">
           </div>
         </div>
         <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
           <span class="carousel-control-prev-icon" aria-hidden="true"></span>
           <span class="sr-only">Previous</span>
         </a>
         <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
           <span class="carousel-control-next-icon" aria-hidden="true"></span>
           <span class="sr-only">Next</span>
         </a>
       </div>

     </div>

     <div class="col-lg-3 banner-section">
       <div class="sm-banner-wrapper">
         <img src="img\sm-banner2.webp" alt="">
       </div>
       <div class="sm-banner-wrapper">
         <img src="img\sm-banner3.webp" alt="">
       </div>
     </div>

   </div>
 </div>

 <div class="main-container">

   <div class="sponsor-container">
     <div class="row w-100">

       <div class="col-md-4 sponsor">
         <div class="img w-100 h-100">
           <img src="./assets/sponsor-1.png" alt="">
         </div>
       </div>

       <div class="col-md-4 sponsor">
         <div class="img w-100 h-100">
           <img src="./assets/sponsor-2.jpeg" alt="">
         </div>

       </div>

       <div class="col-md-4 sponsor">
         <div class="img w-100 h-100">
           <img src="./assets/sponsor-3.jpeg" alt="">
         </div>

       </div>

     </div>
   </div>

   <div class="top-rating mt-1">

     <div class="d-flex align-items-center">
       <i class="bi bi-award fa-2x red-text"></i>
       <div class="mb-0 top-seller-name"><span> Top Seller</span></div>
     </div>

     <div id="controls" class="rounded">
       <i class="slider-arrow leftcenter previous bi bi-arrow-left-short fa-2x" aria-hidden="true"></i>
       <i class="slider-arrow rightcenter next bi bi-arrow-right-short fa-2x" aria-hidden="true"></i>
       <button class="auto"></button>
       <div class="my-3 mx-4 py-2 px-3">
         <div class="my-slider d-flex">

         </div>
       </div>
     </div>
   </div>
   <div class="d-flex justify-content-between align-items-center mt-5">
     <h3 class="mb-0 catalog-name"><span>Laptop</span></h3>
   </div>
   <div class="row Laptop-row w-100 mx-0 rounded">
   </div>
   <div class="d-flex justify-content-between  align-items-center mt-5">
     <h3 class="mb-0 catalog-name"><span>CPU</span></h3>
   </div>
   <div class="row CPU-row w-100 mx-0 rounded">
   </div>
   <div class="d-flex justify-content-between  align-items-center mt-5">
     <h3 class="mb-0 catalog-name"><span>Monitor</span></h3x>
   </div>
   <div class="row Monitor-row w-100 mx-0 rounded">
   </div>
 </div>
<?php include 'includes/footer.php'; ?>
