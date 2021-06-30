<?php
    function outputProductCategory($categories) {
        foreach ($categories as $product) {
            $star_rating = "";
            for ($i = 0; $i < 5; $i++) {
              $star_rating .= '<span class="fa fa-star text-warning"></span>';
            }
            $format_price = number_format($product['price'],0);
            echo "<div class='col-lg-3 col-6 card-product-wrapper'>
                <div class='card product'>
                  <a href='#' class='img-card'><img class='card-img-top' src='{$product['img1']}' alt='Card image cap'></a>
                <div class='card-body h-75'>
                  <h5 class='card-title rounded'>{$product['name']}</h5>
                  <div class='rating'>
                    {$star_rating}
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
?>