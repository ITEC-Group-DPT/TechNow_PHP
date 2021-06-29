let products;
let addToCartBtns;
let addToCartSearchBtns;
let numberItemCart;
let cartList = [];


$(document).ready(() => {
  getProducts(products);
  let temp = JSON.parse(localStorage.getItem("cartList"));
  if (temp != null) cartList = temp;

  console.log("CART ON PAGE LOAD");
  console.log(cartList);

  numberItemCart = document.querySelectorAll(".number-item-cart");
  updateNoItemInCart();
});

const getProducts = (item) => {
  let url = 'https://technow-4b3ab.firebaseio.com/.json';
  let xhr = new XMLHttpRequest();
  xhr.open("GET", url, true);
  xhr.onload = function () {
    if (this.status == 200) {
      item = JSON.parse(this.responseText).Products;
      //loadProductSection(item, 'CPU');
      loadProductSection(item, 'CPU');
      //loadProductSection(item, 'GamingChair');
      //loadProductSection(item, 'Headphone');
      loadProductSection(item, 'Laptop');
      // loadProductSection(item, 'Laptop');
      // loadProductSection(item, 'Mainboard');
      loadProductSection(item, 'Monitor');
      // loadProductSection(item, 'Mouse');
      // loadProductSection(item, 'PSU');
      // loadProductSection(item, 'RAM');
      // loadProductSection(item, 'SSD');
      // loadProductSection(item, 'Speaker');
      // loadProductSection(item, 'VGA');
      sortingSold(item);

      products = item;
      addToCart();
    }
  }
  xhr.send();
}

const loadProductSection = (item, section) => {
  let sectionObj = item[section];
  //console.log(sectionObj);
  for (let i = 10; i <= 17; i++) {
    let product = sectionObj[section + i];
    let id = section + '.' + section + i;
    //console.log(id);
    //console.log(product);
    let productRating = parseInt(product.rating);
    let starRating = "";
    for (let j = 0; j < productRating; j++) {
      starRating += '<span class="fa fa-star text-warning"></span>';
    }
    for (let j = 0; j < 5 - productRating; j++) {
      starRating += '<span class="fa fa-star"></span>';
    }
    let newData =
      `<div class="col-lg-3 col-6 card-product-wrapper">
        <div class="card product">
          <a href="#" class="img-card"><img class="card-img-top" src="${product.avatarURL}" alt="Card image cap"></a>
        <div class="card-body h-75">
          <h5 class="card-title rounded">${product.name}</h5>
          <div class="rating">
            ${starRating}
            <span>(${product.sold})</span>
          </div>
          <p href="#" class="mb-0 price">${product.price.toLocaleString()} đ</p>
            <div class = "add-cart" id="${id}">
              <i class="bi bi-cart2"></i>
            </div>
          
        </div>

      </div>
    </div>`
    let section_row = '.' + section + '-row';
    $(section_row).append(newData);
  }
}


// add to cart 
function getProductIndexByID(id) {
  return cartList.findIndex(product => {
    return product.id == id;
  });
}

function addToCart() {
  addToCartBtns = document.querySelectorAll(".add-cart");
  addToCartBtns.forEach(addBtn => {
    addBtn.addEventListener("click", () => {
      addProductToCart(addBtn.id);
    });
  });
}

function addToCartSearch() {
  addToCartSearchBtns = document.querySelectorAll(".add-cart-search");
  addToCartSearchBtns.forEach(addSearchBtn => {
    addSearchBtn.addEventListener("click", () => {
      addProductToCart(addSearchBtn.id);
    });
  });
}

function addProductToCart(id) {
  cartList = cartList || [];
  let res = id.split(".");
  if (getProductIndexByID(res[1]) != -1) {
    console.log("DUPLICATE ITEM");
    let index = getProductIndexByID(res[1]);
    cartList[index].quantity++;
  } else {
    console.log("NEW ITEM");
    let product = {
      id: res[1],
      data: products[res[0]][res[1]],
      quantity: 1
    }
    cartList.push(product);
  }
  console.log("CART AFTER ADD");
  console.log(cartList);
  storeLocalStorage(cartList);
  updateNoItemInCart();
  popOver();
}

function storeLocalStorage(cartList) {
  localStorage.setItem("cartList", JSON.stringify(cartList));
}

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

let cartBtns = document.querySelectorAll(".cart-btn");

cartBtns.forEach(cartBtn => {
  cartBtn.addEventListener("click", () => {
    location.href = "pages/Cart/cart.html";
  });
});

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

    $('#cart-icon-desktop').popover('hide');
    $('#cart-icon-mobile').popover('hide');
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

//top rating
let list = [];

function sortingSold(itemset) {
  for (const catalog in itemset) {
    for (const item in itemset[catalog]) {
      //console.log(item);
      if (Number.isInteger(itemset[catalog][item].sold)) {
        let product = itemset[catalog][item];
        product.id = catalog + '.' + item;
        //console.log(itemset[catalog][item]);
        list.push(product)
      }
      // sort theo từng catalog top rating 2 cái / catalog
      // if (productlist.length == 0 || productlist.length == 1){
      //   productlist.push(item[key][keyinkey]);
      //   continue;
      // }
      // if(item[key][keyinkey].sold >= productlist[0].sold){
      //   productlist.pop();
      //   let prevsold = productlist.pop();
      //   productlist.push(item[key][keyinkey])
      //   productlist.push(prevsold);
      // }
    }
  }

  searchbarfunc();
  list.sort(function (a, b) {
    return b.sold - a.sold;
  })
  let slider = document.querySelector(".my-slider")
  for (let index = 0; index < 20; index++) {

    let newData =
      ` <div class="product card-product-wrapper-ts">
        <div class="card product rounded w-100 h-100">
          <img class="card-img-top" src="${list[index].avatarURL}" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title rounded">${list[index].name}</h5>
            <div class="bottom-price-star">
              <div class="rating">
                <span class="fa fa-star text-warning"></span>
                <span class="fa fa-star text-warning"></span>
                <span class="fa fa-star text-warning"></span>
                <span class="fa fa-star text-warning"></span>
                <span class="fa fa-star"></span>
                <span>(${list[index].sold})</span>
              </div>
            </div>
            <p href="#" class="text-danger mb-0 price">${list[index].price.toLocaleString()}đ</p>
          </div>
          <div class = "add-cart" id="${list[index].id}">
            <i class="bi bi-cart2"></i>
          </div>
        </div>
      </div>`
    $('.my-slider').append(newData);
  }
  loadSlider();
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
//top rating

//searchbar
function searchbarfunc() {
  let searchval = document.querySelector("#searchbarinp")
  let searchdropdown = document.querySelector('#dropdownsearchbar')
  searchval.addEventListener('click', function (e) {
    if (searchval.value.trim() == '') {
      searchdropdown.style.opacity = 0;
    } else {
      searchdropdown.style.opacity = 1;
    }
  })

  searchval.addEventListener('keyup', function (e) {
    let limit = 5;
    let dropdown = document.querySelector("#dropdownsearchbar");
    dropdown.innerHTML = '';
    let searchstr = removeVietnameseTones(searchval.value).toLowerCase()
    for (let index = 0; index < list.length; index++) {
      if (removeVietnameseTones(list[index].name).toLowerCase().includes(searchstr)) {
        //console.log(removeVietnameseTones(list[index].name).toLowerCase());
        let data = `
        <li>
          <div class="product p-1">
            <div class="card d-flex flex-row product shadow-sm rounded w-100 h-50">
              <img class="card-img-top" src="${list[index].avatarURL}" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title rounded">${list[index].name}</h5>
                <div class="bottom-price-star">
              </div>
              <p href="#" class="text-danger mb-0 price">${list[index].price.toLocaleString()}₫</p>
            </div>

          </div>
        </li>`
        $("#dropdownsearchbar").append(data)
        console.log(list[index].id);
        limit--;
      }
      if (limit == 0) break;
    }
    if (limit == 5 || searchstr.trim() == '') {
      //không tim duoc product match search
      searchdropdown.style.opacity = 0;
    } else {
      searchdropdown.style.opacity = 1;
    }
    $("#dropdownsearchbar").addClass("show")
    addToCartSearch();
  })

}

function removeVietnameseTones(str) {
  str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
  str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
  str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
  str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
  str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
  str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
  str = str.replace(/đ/g, "d");
  str = str.replace(/À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ/g, "A");
  str = str.replace(/È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ/g, "E");
  str = str.replace(/Ì|Í|Ị|Ỉ|Ĩ/g, "I");
  str = str.replace(/Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ/g, "O");
  str = str.replace(/Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ/g, "U");
  str = str.replace(/Ỳ|Ý|Ỵ|Ỷ|Ỹ/g, "Y");
  str = str.replace(/Đ/g, "D");
  // Some system encode vietnamese combining accent as individual utf-8 characters
  // Một vài bộ encode coi các dấu mũ, dấu chữ như một kí tự riêng biệt nên thêm hai dòng này
  str = str.replace(/\u0300|\u0301|\u0303|\u0309|\u0323/g, ""); // ̀ ́ ̃ ̉ ̣  huyền, sắc, ngã, hỏi, nặng
  str = str.replace(/\u02C6|\u0306|\u031B/g, ""); // ˆ ̆ ̛  Â, Ê, Ă, Ơ, Ư
  // Remove extra spaces
  // Bỏ các khoảng trắng liền nhau
  str = str.replace(/ + /g, " ");
  str = str.trim();
  // Remove punctuations
  // Bỏ dấu câu, kí tự đặc biệt
  str = str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'|\"|\&|\#|\[|\]|~|\$|_|`|-|{|}|\||\\/g, " ");
  return str;
}

$("#dropdownsearchbar").click(function (e) {
  e.stopPropagation()
});