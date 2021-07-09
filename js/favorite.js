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

function emptyFavorite() {
    let favDiv = document.querySelector('.fav')
    favDiv.innerHTML = `
    <div class="text-center mt-5">
    <h3 class="mb-0 catalog-name">No favorite item found</h3>
  </div>
`
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
    let action = removeBtn.getAttribute("data-action");
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/ajaxFavorite.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = function() {
        if(this.status == 200) {
          console.log(this.responseText);
            if(this.responseText == "remove from favorite") {
              removeProductUI(removeBtn);
            }
            else if(this.responseText == "empty favorite"){
              emptyFavorite();
            }
        }
    }
    xhr.send("id=" + value + "&favorite&" + action);
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

function removeProductUI(removeBtn) {
  fadeOutRemoveItem(removeBtn.parentElement);
}

function fadeOutRemoveItem(el) {
  el.style = "opacity: 0;";
  setTimeout(function () {
    el.remove();
  }, 300);
}
