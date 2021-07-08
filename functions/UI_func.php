<?php
//helper
function getStarRating($rating)
{
  $ratingStar = "";

  for ($i = 0; $i < $rating; $i++) {
    $ratingStar .= '<span class="fa fa-star text-warning"></span>';
  }

  for ($i = 0; $i < 5 - $rating; $i++) {
    $ratingStar .= '<span class="fa fa-star"></span>';
  }

  return $ratingStar;
}
function renderProductCategory($categories)
{
  foreach ($categories as $product) {

    $ratingStar = getStarRating(intval($product['rating']));

    $format_price = number_format($product['price'], 0);
    echo "<div class='col-lg-3 col-6 card-product-wrapper'>
                <div class='card product'>
                  <a href='#' class='img-card'><img class='card-img-top' src='{$product['img1']}' alt='Card image cap'></a>
                <div class='card-body h-75'>
                  <h5 class='card-title rounded'>{$product['name']}</h5>
                  <div class='rating'>
                    {$ratingStar}
                    <span>({$product['sold']})</span>
                  </div>
                  <p href='#' class='mb-0 price'>{$format_price} đ</p>
                    <div class = 'add-cart' id='{$product['productID']}'>
                      <i class='bi bi-cart2'></i>
                    </div>
                  
                </div>
      
              </div>
            </div>";
  }
}
function renderTopRating($list)
{
  foreach ($list as $product) {

    $format_price = number_format($product['price'], 0);

    $ratingStar = getStarRating(intval($product['rating']));
    echo "<div class='product card-product-wrapper-ts'>
        <div class='card product rounded w-100 h-100'>
          <img class='card-img-top' src='{$product['img1']}' alt='Card image cap'>
          <div class='card-body'>
            <h5 class='card-title rounded'>{$product['name']}</h5>
            <div class='bottom-price-star'>
              <div class='rating'>
                {$ratingStar}
                <span>({$product['sold']})</span>
              </div>
            </div>
            <p href='#' class='text-danger mb-0 price'>{$format_price}đ</p>
          </div>
          <div class = 'add-cart' id='{$product['productID']}'>
            <i class='bi bi-cart2'></i>
          </div>
        </div>
      </div>";
  }
}

function renderProductRow($list)
{
  foreach ($list as $product) {
    $ratingStar = getStarRating(intval($product['rating']));
    $format_price = number_format($product['price'], 0);
    echo "<div class='product-wrapper container card shadow p-2 my-3 ml-0 d-flex align-items-center justify-content-center'>
       <div class='product d-flex h-100'>

         <div class='product-img-wrapper'>
           <img class='product-img' src='{$product['img1']}' alt='product-img'>
         </div>

         <div class='product-info ml-2 d-flex align-items-center'>
           <div class='product-info-wrapper'>
         
             <div class='product-name-wrapper'>           
               <p class='product-name'>{$product['name']}</p>
             </div>


            <div class='product-rating-wrapper'>

            <div class='product-rating'>
              {$ratingStar}
              <span>({$product['sold']})</span>
            </div>
           </div>
         </div>

        </div>

         <div class='quantity-price-wrapper d-flex align-items-center'>
           <div class='quantity-price w-100'>
             <div class='quantity-control rounded'>
               <input type='number' class='quantity-input' id='{$product['productID']}' value='{$product['quantity']}' step='1' min='1' disabled name='quantity'>
             </div>
             <div class='px-2 text-center'><i class='fas fa-times'></i></div>
             

             <div class='product-price-wrapper d-flex align-items-center'>          
               <p href='#' class='product-price m-0'>{$format_price}₫</p>
             </div>
           </div>
         </div>
       </div>
     </div>";
  }
}
