//variables
let numberItemCart = document.querySelector(".number-item-cart");
let cartList = [];
let cart = document.querySelector(".cart-list");
let cartAvailable = document.querySelector(".cart-available");
let totalPrice = document.querySelector(".total-price");
let decreaseBtns;
let increaseBtns;
let inputQties;
let removeBtns;
let removeAllBtn = document.querySelector(".remove-all-btn");


//document ready
$(document).ready(() => {
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

// note 2
function getProductIndexByID(id) {
  return cartList.findIndex(product => {
    return product.id == id;
  });
}

//cart functions
function updateTotalPrice(newTotalPrice) {
  totalPrice.innerText = newTotalPrice;
}

function decreaseQuantity(decreaseBtn) {
  let productID = decreaseBtn.getAttribute("data-id");
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "ajaxCart.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.onload = function() {
      if(this.status == 200) {
        console.log(this.responseText);
        if(this.responseText != "error") {
          data = this.responseText.split(" ");
          updateTotalPrice(data[0]);
          updateNoItemInCart(data[1]);
          let inp = decreaseBtn.nextElementSibling ;
          inp.value = data[2];
        }
        else console.log("error");
      }
  }
  xhr.send("id=" + productID + "&decrease");
}

function increaseQuantity(increaseBtn) {
  let productID = increaseBtn.getAttribute("data-id");
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "ajaxCart.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.onload = function() {
      if(this.status == 200) {
        if(this.responseText != "error") {
          data = this.responseText.split(" ");
          updateTotalPrice(data[0]);
          updateNoItemInCart(data[1]);
          let inp = increaseBtn.previousElementSibling;
          inp.value = data[2];
        }
        else console.log("error");
      }
  }
  xhr.send("id=" + productID + "&increase");
}

// note 1
function inputQuantity(inputQty) {
  let index = getProductIndexByID(inputQty.id);
  if (inputQty.value < 1 || inputQty.value == null) {
    cartList[index].quantity = 1;
    inputQty.value = 1;
  } else cartList[index].quantity = parseInt(inputQty.value);
  console.log("AFTER INPUT");
  console.log(cartList);
  updateTotalPrice();
  updateNoItemInCart();
}

function removeProduct(removeBtn) {
  let productID = removeBtn.getAttribute("data-id");
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "ajaxCart.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.onload = function() {
      if(this.status == 200) {
        if(this.responseText != "error") {
          data = this.responseText.split(" ");
          removeProductUI(removeBtn);
          updateTotalPrice(data[0]);
          updateNoItemInCart(data[1]);
        }
        else console.log("error");
      }
  }
  xhr.send("id=" + productID + "&remove");
}

function removeAll() {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "ajaxCart.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.onload = function() {
      if(this.status == 200) {
        console.log(this.responseText);
        if(this.responseText != "error") {
          data = this.responseText.split(" ");
          removeProductUI(removeBtn);
          updateTotalPrice(data[0]);
          updateNoItemInCart(data[1]);
        }
        else {
          console.log("error");
        }
      }
  }
  xhr.send("remove_all");
  location.reload();
}

// UI functions
function removeProductUI(removeBtn) {
  fadeOutRemoveItem(removeBtn.parentElement.parentElement);
}

function updateNoItemInCart(noItem) {
  numberItemCart.innerText = noItem;
}

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
