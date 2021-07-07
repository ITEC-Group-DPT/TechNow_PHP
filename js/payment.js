let cartList = []
let selectedaddress = 0 //default, new address cus no id is 0
let userid = parseInt(document.querySelector('[userid]').getAttribute('userid'), 10)
displayDeliverybook(userid);
CreateCartListStep3();


document.addEventListener("DOMContentLoaded", function (event) {
    $('#smartwizard').smartWizard({
        selected: 0, // Initial selected step, 0 = first step
        theme: 'arrows', // theme for the wizard, related css need to include for other than default theme
        justified: true, // Nav menu justification. true/false
        darkMode: false, // Enable/disable Dark Mode if the theme supports. true/false
        autoAdjustHeight: true, // Automatically adjust content height
        cycleSteps: false, // Allows to cycle the navigation of steps
        backButtonSupport: true, // Enable the back button support
        enableURLhash: false, // Enable selection of the step based on url hash
        transition: {
            animation: 'fade', // Effect on navigation, none/fade/slide-horizontal/slide-vertical/slide-swing
            speed: '400', // Transion animation speed
            easing: '' // Transition animation easing. Not supported without a jQuery easing plugin
        },
        toolbarSettings: {
            toolbarPosition: 'bottom', // none, top, bottom, both
            toolbarButtonPosition: 'center', // left, right, center
            showNextButton: true, // show/hide a Next button
            showPreviousButton: true, // show/hide a Previous button
            toolbarExtraButtons: [] // Extra buttons to show on toolbar, array of jQuery input/buttons elements
        },
        anchorSettings: {
            anchorClickable: true, // Enable/Disable anchor navigation
            enableAllAnchors: false, // Activates all anchors clickable all times
            markDoneStep: true, // Add done state on navigation
            markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
            removeDoneStepOnNavigateBack: false, // While navigate back done step after active step will be cleared
            enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
        },
        keyboardSettings: {
            keyNavigation: true, // Enable/Disable keyboard navigation(left and right keys are used if enabled)
            keyLeft: [37], // Left key code
            keyRight: [39] // Right key code
        },
        lang: { // Language variables for button
            next: 'Next',
            previous: 'Previous'
        },
        disabledSteps: [], // Array Steps disabled
        errorSteps: [], // Highlight step with errors
        hiddenSteps: [] // Hidden steps
    });

    $("#smartwizard").on("showStep", function (e, anchorObject, stepIndex, stepDirection) {
        if (stepIndex == 2) {
            let toolbarbtn = document.querySelector(".sw-btn-next")
            toolbarbtn.classList.remove('finish')
            toolbarbtn.innerHTML = 'Checkout'
            // document.querySelector('.addressbook').classList.add('invisible') //cannot change address in step 3

            let addressbook = document.getElementsByName('addressbook')
            for (const input of addressbook) {
                let attr = document.createAttribute("disabled");
                input.setAttributeNode(attr);
            }

            let inputarr = document.querySelectorAll('.tab-content input')

            for (const input of inputarr) {
                if (input.value == '') {
                    toolbarbtn.classList.add('disabled')
                    document.querySelector(".fillinput").classList.remove('d-none')
                    $('#smartwizard').smartWizard("stepState", [3], "disable");
                    return;
                }
            }
            document.querySelector(".fillinput").classList.add('d-none') //alert, empty input 

            if (cartList.length != 0) {
                toolbarbtn.classList.remove('disabled')
                $('#smartwizard').smartWizard("stepState", [3], "enable");
            } else {
                toolbarbtn.classList.add('disabled')
                $('#smartwizard').smartWizard("stepState", [3], "disable");
            }

        }
        else if (stepIndex == 3) {
            document.querySelector('.addressbook').classList.add('invisible')
            let toolbarbtn = document.querySelector(".sw-btn-next")
            toolbarbtn.classList.add('finish')
            toolbarbtn.innerHTML = 'Back to Homepage'
            updateDeliInfoAndCreateOrder()


            // let xhttp = new XMLHttpRequest();
            // xhttp.open("POST", "classes/DeliveryInfo.php", true);
            // xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            // xhttp.send("orderinfo="+ JSON.stringify(productIDs));


            $(".finish").click(function (e) {
                window.location.href = 'index.php'
            });



        } else {
            // document.querySelector('.addressbook').classList.remove('invisible')
            let addressbook = document.getElementsByName('addressbook')
            for (const input of addressbook) {
                input.removeAttribute("disabled");
            }
            let toolbarbtn = document.querySelector(".sw-btn-next")
            toolbarbtn.classList.remove('finish')
            toolbarbtn.innerHTML = 'Next'
            document.querySelector(".alert").classList.add('d-none')
        }
    });



});

function updateDeliInfoAndCreateOrder() {
    let inputarr = document.querySelectorAll('.tab-content input')
    let name = inputarr[0].value
    let phone = inputarr[1].value
    let address = inputarr[2].value
    let city = inputarr[3].value
    let state = inputarr[4].value
    let country = inputarr[5].value
    address = address + ', ' + city + ', ' + state + ', ' + country
    console.log(name, phone, address);
    //insert in order 
    // removeAllcartinDTB();
    let str = 'create'
    let userid = parseInt(document.querySelector("[userid]").getAttribute('userid'), 10)
    if (selectedaddress != 0) str = 'update'

    let xhttp = new XMLHttpRequest();
    xhttp.open("POST", "classes/DeliveryInfo.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(`deliID=${selectedaddress}&name=${name}&phone=${phone}&address=${address}&userid=${userid}&${str}=1`);


    let productIDs = []
    for (const product of cartList) {
        let arr = [product.productID, product.quantity]
        productIDs.push(arr)
    }
    console.log(productIDs);
    console.log(JSON.stringify(productIDs));
    str = "order"
    xhttp.open("POST", "classes/Order.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(`name=${name}&phone=${phone}&address=${address}&userid=${userid}&list=${JSON.stringify(productIDs)}&${str}=1`);

    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            if (this.responseText == 'success') {
                xhttp.open("POST", "ajaxCart.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send(`remove_all`);
            }
        }
    };
    

}


async function displayDeliverybook(user_id) {
    let myPromise = new Promise(function (myResolve, myReject) {
        let xhttp = new XMLHttpRequest();
        xhttp.open("POST", "classes/DeliveryInfo.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("getdelivery=1&user_id=" + user_id);
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {

                if (this.responseText != 'No rows') {
                    let deliarr = JSON.parse(this.response)
                    // console.log(deliarr)
                    myResolve(deliarr);
                }
                else myReject('Norows')
            }
        };
    });
    let arr = await myPromise;
    console.log(arr);
    if (arr != 'No rows') {
        let str = ''
        arr.forEach(deli => {
            let name = deli['name']
            let address = deli['address']
            let phone = deli['phone']
            let deliID = deli['deliveryID']

            let radiobox = `<div class="form-check">
            <input class="form-check-input" type="radio" name="addressbook" id="flexRadioDefault${deliID}">
            <label class="form-check-label" for="flexRadioDefault${deliID}">
            <p class="m-0">Name: <span id="name${deliID}">${name}</span><br>
            Address: <span id="address${deliID}">${address}</span><br>
            Phone: <span id="phone${deliID}">${phone}</span>
            </p>
            </label>
            </div>`

            document.getElementsByClassName('addressbook')[0].insertAdjacentHTML('beforeend', radiobox)
        });
    }
    radioarray = document.getElementsByClassName('form-check-input')
    for (const radio of radioarray) {
        radio.addEventListener('click', function (e) {
            //console.log(e.target.getAttribute('id'));
            let id = parseInt(e.target.getAttribute('id').replace('flexRadioDefault', ''), 10)
            //console.log(id);
            selectedaddress = id;
            if (id != 0) //not create new address
            {
                let inputarr = document.querySelectorAll('.tab-content input')
                inputarr[0].value = document.getElementById('name' + id).innerText
                inputarr[1].value = document.getElementById('phone' + id).innerText

                let address = document.getElementById('address' + id).innerText.split(', ')
                inputarr[2].value = address[0]
                inputarr[3].value = address[1]
                inputarr[4].value = address[2]
                inputarr[5].value = address[3]
            }
            else { //empty input to create new address
                let inputarr = document.querySelectorAll('.tab-content input')
                for (const input of inputarr) {
                    input.value = ''
                }
            }


        })
    }
}
async function CreateCartListStep3() {
    let getcartlist = new Promise(function (myResolve, myReject) {
        let xhttp = new XMLHttpRequest();
        xhttp.open("POST", "ajaxCart.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("getcartlist=1");
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                let arr = JSON.parse(this.response)
                //console.log(arr)
                myResolve(arr);
            }
        };
    });

    cartList = await getcartlist;
    checkCartList(cartList);
    //updateNoItemInCart();
    outputCartList(cartList);
    updateTotalPrice(cartList);
    // addListeners();
}
function checkCartList(cartList) {
    let cartAvailable = document.querySelector(".cart-available");
    let cartEmpty = document.querySelector(".cart-empty");
    if (cartList == null || cartList.length == 0) {
        cartAvailable.style = "display: none";
        cartEmpty.style = "display: block";

    } else {
        cartEmpty.style = "display: none";
        cartAvailable.style = "display: initial";
    }
}
function updateNoItemInCart() {
    let numberItemCart = document.querySelectorAll(".number-item-cart");
    numberItemCart.forEach(number => {
        number.innerText = getTotalItemsInCart();
    });
}
function outputCartList(cartList) {
    $(".cart-list").empty();
    cartList.forEach(product => {
        console.log(product);
        if (product.quantity == null) product.quantity = 1;
        let data = `
      <li class="product-wrapper container card shadow p-2 m-3 d-flex align-items-center justify-content-center">
        <div class="product d-flex h-100">

          <div class="product-img-wrapper">
            <img class="product-img" src="${product.img1}" alt="product-img">
          </div>

          <div class="product-info ml-2 d-flex align-items-center">
            <div class="product-info-wrapper">
          
              <div class="product-name-wrapper">           
                <p class="product-name">${product.name}</p>
              </div>

              <div class="product-rating-wrapper">

                <div class="product-rating">
                  <span class="fa fa-star text-warning"></span>
                  <span class="fa fa-star text-warning"></span>
                  <span class="fa fa-star text-warning"></span>
                  <span class="fa fa-star text-warning"></span>
                  <span class="fa fa-star"></span>
                  <span>(${product.sold})</span>
                </div>

              </div>
            </div>
          </div>

          <div class="quantity-price-wrapper d-flex align-items-center">
            <div class="quantity-price w-100">
              <div class="quantity-control rounded">
                <input type="number" class="quantity-input" id="${product.productID}" value="${product.quantity}" step="1" min="1" disabled name="quantity">
              </div>
              <div class="px-2 text-center"><i class="fas fa-times"></i></div>
              

              <div class="product-price-wrapper d-flex align-items-center">          
                <p href="#" class="product-price m-0">${product.price.toLocaleString()}₫</p>
              </div>
            </div>
          </div>
        </div>
      </li>`

        $(".cart-list").append(data);
    });

}
function updateTotalPrice(cartList) {
    let totalPrice = document.querySelector(".total-price");
    let sumPrice = 0;
    cartList.forEach(product => {
        sumPrice += product.price * product.quantity;
    });
    totalPrice.innerText = sumPrice.toLocaleString() + "₫";
}