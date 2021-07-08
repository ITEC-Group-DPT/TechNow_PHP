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
                popOver('#cart-icon-mobile', '#cart-icon-desktop', "Product is added to your cart");
            }
            else {
                popOver('#login-icon-mobile', '#login-icon-desktop', "You must be logged in to add product to your cart");
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

$(document).ready(() => {
    favorite.addEventListener("click", () => {
        favoriteFunc();
    });
});

function favoriteFunc() {
    let value = favorite.getAttribute("data-value");
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajaxFavorite.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = function () {
        if (this.status == 200) {
            if (this.responseText == "added to favorite") {
                favIcon.classList.remove("bi-heart");
                favIcon.classList.add("bi-heart-fill");
                favIcon.classList.add("text-danger");
                popOver('#user-icon-mobile', '#user-icon-desktop', "Product is added to your favorite list")
            }
            else if (this.responseText == "remove from favorite"){
                favIcon.classList.remove("bi-heart-fill");
                favIcon.classList.remove("text-danger");
                favIcon.classList.add("bi-heart");
                popOver('#user-icon-mobile', '#user-icon-desktop', "Product is removed from your favorite list")
            }
            else {
                console.log("heheboi");
                popOver('#login-icon-mobile', '#login-icon-desktop', "You must be logged in to add a product to your favorite list")
            }
        }
    }
    xhr.send("id=" + value);
}


// UI func
function popOver(mobile, desktop, content) {
    $(mobile).attr("data-content", content)
    $(desktop).attr("data-content", content)
    if (screen.width <= 768) {
        $(mobile).popover('show');
        setTimeout(() => {
            $(mobile).popover('hide');
        }, 4000);
    }
    else {
        $(desktop).popover('show');
        setTimeout(() => {
            $(desktop).popover('hide');
        }, 4000);
    }
}
