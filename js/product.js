let numberItemCart = document.querySelectorAll(".number-item-cart");
let favorite = document.querySelector('#favorite');
let favIcon = document.querySelector('#fav-icon');
addToCart();

function addToCart() {
    addToCartBtns = document.querySelectorAll(".add-cart");
    addToCartBtns.forEach(addBtn => {
        addBtn.addEventListener("click", () => {
            console.log('addBtnID: ', addBtn.id);
            addProductToCart(addBtn.id);
        });
    });
}

function addProductToCart(productID) {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajaxCart.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = function () {
        if (this.status == 200) {
            if (this.responseText != "not signed in") {
                updateNoItemInCart(this.responseText);
                popOver();
            }
            else {
                console.log("not signed in");
            }
        }
    }
    xhr.send("id=" + productID + "&add");
}

function updateNoItemInCart(noItem) {
    numberItemCart.forEach((item) => {
        item.innerText = noItem;
        console.log(item);
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
      console.log("popover");
      $('#cart-icon-desktop').popover('show');
      setTimeout(() => {
        $('#cart-icon-desktop').popover('hide');
      }, 4000);
    }
  }


$(document).ready(() => {
    favorite.addEventListener("click", () => {
        favoriteFunc();
    });
});

function favoriteFunc(){
    let value = favorite.getAttribute("data-value");
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajaxFavorite.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = function() {
        if(this.status == 200) {
            if(this.responseText == "added to favorite") {
                favIcon.classList.remove("bi-heart");
                favIcon.classList.add("bi-heart-fill");
                favIcon.classList.add("text-danger");
            }
            else{
                favIcon.classList.remove("bi-heart-fill");
                favIcon.classList.remove("text-danger");
                favIcon.classList.add("bi-heart");
            }
        }
    }
    xhr.send("id=" + value);
}
