let addToCartBtns = document.querySelectorAll(".add-cart");
let numberItemCart = document.querySelectorAll(".number-item-cart");
let removeFavoriteBtns = document.querySelectorAll("#favorite");

$(document).ready(() => {
    addToCart();
    removeFavorite();
  });

function addToCart() {
    addToCartBtns.forEach(addBtn => {
      addBtn.addEventListener("click", (e) => {
        e.preventDefault();
        addProductToCart(addBtn.id);
      });
    });
}

function removeFavorite() {
    removeFavoriteBtns.forEach(removeBtn => {
        removeBtn.addEventListener("click", (e) => {
            e.preventDefault();
            favoriteFunc(removeBtn);
      });
    });
}

function addProductToCart(productID) {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/ajaxCart.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = function() {
        if(this.status == 200) {
          if(this.responseText != "not signed in") {
            updateNoItemInCart(this.responseText);
            popOver();
          }
          else{
            // show a notice that user need to sign in
          }
        }
    }
    xhr.send("id=" + productID + "&add");
}

function updateNoItemInCart(noItem) {
    numberItemCart.forEach((item) => {
      item.innerText = noItem;
    });
  }

function favoriteFunc(removeBtn){
    let value = removeBtn.getAttribute("data-value");
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/ajaxFavorite.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = function() {
        if(this.status == 200) {
            // if(this.responseText == "added to favorite") {
            //     let favIcon = removeBtn.closest("#fav-icon");
            //     favIcon.classList.remove("bi-heart");
            //     favIcon.classList.add("bi-heart-fill");
            //     favIcon.classList.add("text-danger");
            // }
            // else{
            //     let favIcon = removeBtn.closest("#fav-icon");
            //     favIcon.classList.remove("bi-heart-fill");
            //     favIcon.classList.remove("text-danger");
            //     favIcon.classList.add("bi-heart");
            // }
            window.location.reload();
        }
    }
    xhr.send("id=" + value);
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
