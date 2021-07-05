let products;
let addToCartBtns;

let numberItemCart;

$(document).ready(() => {
  loadSlider();
  addToCart();
  console.log("CART ON PAGE LOAD");

  numberItemCart = document.querySelectorAll(".number-item-cart");
  console.log(numberItemCart);
});

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
  xhr.onload = function() {
      if(this.status == 200) {
        if(this.responseText != "not signed in") {
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
  });
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
    console.log("popover");
    $('#cart-icon-desktop').popover('show');
    setTimeout(() => {
      $('#cart-icon-desktop').popover('hide');
    }, 4000);
  }
}

//top rating

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
//top rating

//searchbar
function searchbarfunc() {
  let searchInp = document.querySelector("#searchbarinp");
  let searchList = document.querySelector('#dropdownsearchbar');
  let filter = searchInp.value.toUpperCase();
  let item = searchList.getElementsByTagName("li");

  if (searchInp.value == '') {
    searchList.style.display = 'none';
  }else{
    searchList.style.display = 'block';
    // sua lai UI search bar
    for (var i = 0; i < item.length; i++) {
      let a = item[i].getElementsByTagName('a')[0];
      let title = a.querySelector(".card-title");
      title = title.textContext || title.innerText;
      if (title.toUpperCase().indexOf(filter) > -1)
        item[i].style.display = "block";
      else item[i].style.display = "none";
    }
  }
}
