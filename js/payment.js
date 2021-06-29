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
    if (arr != 'No rows') {
        let str = ''
        arr.forEach(deli => {
            let name = deli['name']
            let address = deli['address']
            let phone = deli['phone']
            let deliID = deli['deliveryID']

            let radiobox = `<div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault${deliID}">
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
            else {
                let inputarr = document.querySelectorAll('.tab-content input')
                for (const input of inputarr) {
                    input.value = ''
                }
            }


        })
    }
}
let selectedaddress = 0 //default, new address cus no id is 0
let userid = parseInt(document.querySelector('[userid]').getAttribute('userid'), 10)
displayDeliverybook(userid);

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
            document.querySelector('.addressbook').classList.add('invisible')
            let inputarr = document.querySelectorAll('.tab-content input')
            for (const input of inputarr) {
                if (input.value == '') {
                    console.log(1);
                    toolbarbtn.classList.add('disabled')
                    document.querySelector(".fillinput").classList.remove('d-none')
                    $('#smartwizard').smartWizard("stepState", [3], "disable");
                    return;
                }
            }
            toolbarbtn.classList.remove('disabled')
            document.querySelector(".fillinput").classList.add('d-none')
            $('#smartwizard').smartWizard("stepState", [3], "enable");

        }
        else if (stepIndex == 3) {
            document.querySelector('.addressbook').classList.add('invisible')
            let toolbarbtn = document.querySelector(".sw-btn-next")
            toolbarbtn.classList.add('finish')
            toolbarbtn.innerHTML = 'Back to Homepage'
            let inputarr = document.querySelectorAll('.tab-content input')
            let name = inputarr[0].value
            let phone = inputarr[1].value
            let address = inputarr[2].value
            let city = inputarr[3].value
            let state = inputarr[4].value
            let country = inputarr[5].value
            address = address + ', ' + city + ', ' + state + ', ' + country
            console.log(name, phone, address);

            $(".finish").click(function (e) {
                window.location.href = 'index.php'
                removeAll();
            });

            // setTimeout(() => {
            //     if ($('#smartwizard').smartWizard("getStepIndex") == 3) {
            //         document.querySelector(".alert").classList.remove('d-none')
            //         toolbarbtn.classList.remove('disabled')
            //         setTimeout(() => {
            //             $(".finish").click()
            //             removeAll();
            //         }, 4000);
            //     }
            // }, 3000);


        } else {
            document.querySelector('.addressbook').classList.remove('invisible')
            let toolbarbtn = document.querySelector(".sw-btn-next")
            toolbarbtn.classList.remove('finish')
            toolbarbtn.innerHTML = 'Next'
            document.querySelector(".alert").classList.add('d-none')
        }
    });


});

