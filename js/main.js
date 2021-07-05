let products;
let addToCartBtns;
let numberItemCart;

$(document).ready(() => {
  loadSlider();
  addToCart();
  numberItemCart = document.querySelectorAll(".number-item-cart");
});

function addToCart() {
  addToCartBtns = document.querySelectorAll(".add-cart");
  addToCartBtns.forEach(addBtn => {
    addBtn.addEventListener("click", () => {
      addProductToCart(addBtn.id);
    });
  });
}

function addProductToCart(productID) {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "ajaxCart.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.onload = function() {
      if(this.status == 200) {
        if(this.responseText != "not signed in") {
          updateNoItemInCart(this.responseText);
          popOver();
        }
        else console.log("not signed in");
      }
  }
  xhr.send("id=" + productID + "&add");
}

function updateNoItemInCart(noItem) {
  numberItemCart.forEach((item) => {
    item.innerText = noItem;
  });
}

function searchFunc() {
  let searchInp = document.querySelector("#searchbarinp");
  let searchList = document.querySelector('#dropdownsearchbar');
  if (searchInp.value == '') {
    searchList.style.display = 'none';
  }else{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajaxSearch.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = function() {
        if(this.status == 200) {
          if(this.responseText != "no product") {
            let arrProducts = JSON.parse(this.responseText);
            searchList.innerHTML = renderSearchList(arrProducts);
            searchList.style.display = 'block';
          }
          else {
            searchList.innerHTML = '<li><div class="ml-5">No item found</div></li>';
            searchList.style.display = 'block';
          }
        }
    }
    xhr.send("value=" + searchInp.value);
  }
}

function getStarRating(rating) {
  let ratingStar = "";
  for (var i = 0; i < rating; i++)
    ratingStar += '<span class="fa fa-star text-warning"></span>';
  for (var i = 0; i < 5-rating; i++)
    ratingStar += '<span class="fa fa-star"></span>';
  return ratingStar;
}

function renderSearchList(arrProducts) {
  let data = '';
  arrProducts.forEach((product) => {
    let format_price = product.price.toLocaleString() + " ₫";
    let ratingStar = getStarRating(product.rating);
    data += `
    <li>
      <div class='product p-1'>
        <div class='card d-flex flex-row product shadow-sm rounded w-100 h-50'>
          <a href = '#'><img class='card-img-top' src='${product.img1}' alt='Product Image'></a>
          <div class='card-body'>
            <h5 class='card-title rounded'><a href='#'>${product.name}</a></h5>
            <div class='bottom-price-star'>
              <div class='rating'>
                ${ratingStar}<span>(${product.sold})</span>
              </div>
            </div>
            <p class='text-danger mb-0 price'>${format_price}</p>
          </div>
        </div>
      </div>
    </li>`;
  });
  return data;
}

// UI
let popUpNavItems = document.querySelectorAll(".pop-up-items")
let fade = false;

$(document).scroll(function () {
  let y = $(this).scrollTop();
  if (y > 100 && fade == false) {
    fadeIn(popUpNavItems);
    fade = true;
  } else if (y <= 100 && fade == true) {
    fadeOut(popUpNavItems);
    // $('#cart-icon-desktop').popover('hide');
    // $('#cart-icon-mobile').popover('hide');
    fade = false;
  }
});

function fadeIn(elList) {
  elList.forEach(el => {
    document.querySelector('#dropdownsearchbar').style.opacity = 0;
    el.classList.remove("d-none")
    el.classList.add("d-flex")
    setTimeout(function () {
      el.style = "opacity: 1";
    }, 300);
  });
}

function fadeOut(elList) {
  elList.forEach(el => {
    document.querySelector('#dropdownsearchbar').style.opacity = 1;
    el.style = "opacity: 0";
    setTimeout(function () {
      el.classList.add("d-none")
      el.classList.remove("d-flex")
    }, 300);
  });

}

function popOver() {
  if (screen.width <= 768) {
    $('#cart-icon-mobile').popover('show');
    setTimeout(() => {
      $('#cart-icon-mobile').popover('hide');
    }, 4000);
  }
  else {
    $('#cart-icon-desktop').popover('show');
    setTimeout(() => {
      $('#cart-icon-desktop').popover('hide');
    }, 4000);
  }
}

function loadSlider() {
  let slider = tns({
    container: '.my-slider',
    items: 1,
    gutter: 20,
    slideBy: 1,
    autoplay: true,
    controlsContainer: '#controls',
    edgePadding: 20,
    prevButton: '.previous',
    nextButton: '.next',
    autoplayButton: '.auto',
    mouseDrag: true,
    autoplayHoverPause: true,
    nav: false,
    responsive: {
      600: {
        items: 2
      },
      900: {
        items: 3
      },
      1200: {
        items: 4
      },
      1400: {
        items: 4
      }
    },
  });
}
