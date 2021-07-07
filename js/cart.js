  //variables
  let numberItemCart = document.querySelectorAll(".number-item-cart");
  let totalPrice = document.querySelector(".total-price");
  let decreaseBtns;
  let increaseBtns;
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
      removeBtn.addEventListener("click", (e) => {
        e.preventDefault();
        removeProduct(removeBtn);
      });
    });

    increaseBtns = document.querySelectorAll(".quantity-btn-plus");
    increaseBtns.forEach(increaseBtn => {
      increaseBtn.addEventListener("click", (e) => {
        e.preventDefault();
        increaseQuantity(increaseBtn);
      });
    });

    decreaseBtns = document.querySelectorAll(".quantity-btn-minus");
    decreaseBtns.forEach(decreaseBtn => {
      decreaseBtn.addEventListener("click", (e) => {
        e.preventDefault();
        decreaseQuantity(decreaseBtn);
      });
    });

    removeAllBtn.addEventListener("click", removeAll)
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
          if(this.responseText != "error") {
            data = this.responseText.split(" ");
            updateTotalPrice(data[0]);
            updateNoItemInCart(data[1]);
            let inp = decreaseBtn.nextElementSibling ;
            inp.value = data[2];
          }
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
        }
    }
    xhr.send("id=" + productID + "&increase");
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
        }
    }
    xhr.send("id=" + productID + "&remove");
  }

  function removeAll() {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajaxCart.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = function() {
        if(this.status == 200)
          window.location.reload();
    }
    xhr.send("remove_all");
  }

  // UI functions
  function removeProductUI(removeBtn) {
    fadeOutRemoveItem(removeBtn.parentElement.parentElement);
  }

  function updateNoItemInCart(noItem) {
    numberItemCart.forEach(item => {
      item.innerText = noItem;
    });
  }

  function fadeOutRemoveItem(el) {
    el.style = "opacity: 0;";
    setTimeout(function () {
      el.remove();
    }, 300);
  }
