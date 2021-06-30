let numberItemCart = document.querySelectorAll(".number-item-cart");
let cartList = [];
let cart = document.querySelector(".cart-list");

$(document).ready(function () {
    let temp = JSON.parse(localStorage.getItem("cartList"));
    if (temp != null) cartList = temp;
    console.log("CART ON PAGE LOAD");
    console.log(cartList);
    updateNoItemInCart();

    $('.submit-form').submit(function (e) {
        e.preventDefault();
        $('.alert').removeClass('d-none');
        console.log("123132");
        setTimeout(() => {
            window.location.href = '../../index.html'
        }, 2000);
    });
});

function getTotalItemsInCart() {
    let total = 0;
    cartList.forEach(product => {
      total += product.quantity;
    });
    return total;
  }
  
function updateNoItemInCart() {
    numberItemCart.forEach(number => {
        number.innerText = getTotalItemsInCart();
    });
}