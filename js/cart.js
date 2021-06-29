//variables
let popUpNavItems = document.querySelector(".pop-up-items")
let fade = false;
let dropdownMenu = document.querySelector(".dropdown");
let dropdownIcon = document.querySelector(".dropdown .nav-link")
let numberItemCart = document.querySelectorAll(".number-item-cart");
let cartList = [];
let cart = document.querySelector(".cart-list");
let cartEmpty = document.querySelector(".cart-empty");
let cartAvailable = document.querySelector(".cart-available");
let totalPrice = document.querySelector(".total-price");
let decreaseBtns;
let increaseBtns;
let inputQties;
let removeBtns;
let removeAllBtn = document.querySelector(".remove-all-btn");
let summaryWrapper = document.querySelector(".summary-wrapper");


//document ready
$(document).ready(() => {
  let temp = JSON.parse(localStorage.getItem("cartList"));
  if (temp != null) cartList = temp;
  console.log("CART ON PAGE LOAD");
  console.log(cartList);
  checkCartList();
  updateNoItemInCart();
  outputCartList(cartList);
  updateTotalPrice();
  addListeners();
});


//ultility functions
function addListeners() {
  removeBtns = document.querySelectorAll(".remove-btn");
  removeBtns.forEach(removeBtn => {
    removeBtn.addEventListener("click", () => {
      removeProduct(removeBtn);
    });
  });

  increaseBtns = document.querySelectorAll(".quantity-btn-plus");
  increaseBtns.forEach(increaseBtn => {
    increaseBtn.addEventListener("click", () => {
      increaseQuantity(increaseBtn);
    });
  });

  decreaseBtns = document.querySelectorAll(".quantity-btn-minus");
  decreaseBtns.forEach(decreaseBtn => {
    decreaseBtn.addEventListener("click", () => {
      decreaseQuantity(decreaseBtn);
    });
  });

  inputQties = document.querySelectorAll(".quantity-input");
  inputQties.forEach(inputQty => {
    inputQty.addEventListener("focusout", () => {
      inputQuantity(inputQty);
    });
  });

  removeAllBtn.addEventListener("click", removeAll)
}

function getProductIndexByID(id) {
  return cartList.findIndex(product => {
    return product.id == id;
  });
}

function storeLocalStorage(cartList) {
  localStorage.setItem("cartList", JSON.stringify(cartList));
}


//cart functions
function outputCartList(cartList) {
  $(".cart-list").empty();
  cartList.forEach(product => {
    if (product.quantity == null) product.quantity = 1;
    let data = `
      <li class="product-wrapper container card shadow p-2 m-3 d-flex align-items-center justify-content-center">
        <div class="product d-flex h-100">

          <div class="product-img-wrapper">
            <img class="product-img" src="${product.data.avatarURL}" alt="product-img">
          </div>

          <div class="product-info ml-2 d-flex align-items-center">
            <div class="product-info-wrapper">
          
              <div class="product-name-wrapper">           
                <p class="product-name">${product.data.name}</p>
              </div>

              <div class="product-rating-wrapper">

                <div class="product-rating">
                  <span class="fa fa-star text-warning"></span>
                  <span class="fa fa-star text-warning"></span>
                  <span class="fa fa-star text-warning"></span>
                  <span class="fa fa-star text-warning"></span>
                  <span class="fa fa-star"></span>
                  <span>(${product.data.sold})</span>
                </div>

              </div>
            </div>
          </div>

          <div class="quantity-price-wrapper d-flex align-items-center">
            <div class="quantity-price w-100">
              <div class="quantity-control rounded">
                <button class="quantity-btn quantity-btn-minus" id="${product.id}" data-toggle="tooltip" data-placement="right" title="Decrease Quantity">
                  <i class="bi bi-dash"></i>
                </button>
                <input type="number" class="quantity-input" id="${product.id}" value="${product.quantity}" step="1" min="1"  name="quantity">
                <button class="quantity-btn quantity-btn-plus" id="${product.id}" data-toggle="tooltip" data-placement="right" title="Increase Quantity">
                  <i class="bi bi-plus"></i>
                </button>
              </div>

              <div class="product-price-wrapper d-flex align-items-center">          
                <p href="#" class="product-price m-0">${product.data.price.toLocaleString()}₫</p>
              </div>
            </div>
          </div>

          <button type="button" class="btn btn-light remove-btn" id="${product.id}" data-toggle="tooltip" data-placement="right" title="Remove Item">
            <i class="bi bi-x fa-lg"></i>
          </button>

        </div>
      </li>`

    $(".cart-list").append(data);
  });

}

function updateTotalPrice() {
  let sumPrice = 0;
  cartList.forEach(product => {
    sumPrice += product.data.price * product.quantity;
  });
  totalPrice.innerText = sumPrice.toLocaleString() + "₫";
}

function decreaseQuantity(decreaseBtn) {
  let index = getProductIndexByID(decreaseBtn.id);
  if (cartList[index].quantity > 1) {
    decreaseBtn.nextElementSibling.value = --cartList[index].quantity;
  }
  console.log("AFTER DECREASE");
  console.log(cartList);
  storeLocalStorage(cartList);
  updateTotalPrice();
  updateNoItemInCart();
}

function increaseQuantity(increaseBtn) {
  let index = getProductIndexByID(increaseBtn.id);
  increaseBtn.previousElementSibling.value = ++cartList[index].quantity;
  console.log("AFTER INCREASE");
  console.log(cartList);
  storeLocalStorage(cartList);
  updateTotalPrice();
  updateNoItemInCart();
}

function inputQuantity(inputQty) {
  let index = getProductIndexByID(inputQty.id);
  if (inputQty.value < 1 || inputQty.value == null) {
    cartList[index].quantity = 1;
    inputQty.value = 1;
  } else cartList[index].quantity = parseInt(inputQty.value);
  console.log("AFTER INPUT");
  console.log(cartList);
  storeLocalStorage(cartList);
  updateTotalPrice();
  updateNoItemInCart();
}

function removeProduct(removeBtn) {
  removeBtn.disabled = true;
  let index = getProductIndexByID(removeBtn.id);
  cartList.splice(index, 1);
  console.log("CART AFTER REMOVE");
  console.log(cartList);
  storeLocalStorage(cartList);
  removeProductUI(removeBtn);
  updateNoItemInCart();
  updateTotalPrice()
  checkCartList();
}

function removeAll() {
  cartList.splice(0, cartList.length);
  console.log("CART AFTER REMOVE");
  console.log(cartList);
  storeLocalStorage(cartList);
  updateNoItemInCart();
  updateTotalPrice()
  checkCartList();
}

function getTotalItemsInCart() {
  let total = 0;
  cartList.forEach(product => {
    total += product.quantity;
  });
  return total;
}


// UI functions
function checkCartList() {
  if (cartList == null || cartList.length == 0) {
    cartAvailable.style = "display: none";
    cartEmpty.style = "display: block";

  } else {
    cartEmpty.style = "display: none";
    cartAvailable.style = "display: initial";
  }
}

function removeProductUI(removeBtn) {
  fadeOutRemoveItem(removeBtn.parentElement.parentElement);
}

function updateNoItemInCart() {
  numberItemCart.forEach(number => {
    number.innerText = getTotalItemsInCart();
  });
}

// $(document).scroll(function () {
//   let y = $(this).scrollTop();
//   if (y > 100 && fade == false) {
//     fadeIn(popUpNavItems);
//     fade = true;
//   } else if (y <= 100 && fade == true) {
//     fadeOut(popUpNavItems);
//     fade = false;
//   }
// });

function fadeIn(el) {
  document.querySelector('#dropdownsearchbar').style.opacity = 0
  el.style = "display: flex";
  setTimeout(function () {
    el.style = "opacity: 1";
  }, 300);
}

function fadeOut(el) {
  document.querySelector('#dropdownsearchbar').style.opacity = 1
  el.style = "opacity: 0";
  setTimeout(function () {
    el.style = "display: none";
  }, 300);
}

function fadeOutRemoveItem(el) {
  el.style = "opacity: 0;";
  setTimeout(function () {
    el.remove();
  }, 300);
}