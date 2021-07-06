let userid = parseInt(document.querySelector('[userid]').getAttribute('userid'), 10)
displayDeliverybook(userid)


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
    // console.log(arr);
    if (arr != 'No rows') {
        let str = ''
        arr.forEach(deli => {
            let name = deli['name']
            let address = deli['address']
            let phone = deli['phone']
            let deliID = deli['deliveryID']

            let addresscard = `<div class="card text-left my-2" id='deliID${deliID}'>
            <p class='font-weight-bold p-2 m-0'>Name: <span>${name}</span><br>
              Address: <span>${address}</span><br>
              Phone: <span>${phone}</span>
            </p>
            <div class='card-footer text-right p-2'>
              <button type="button" class="btn btn-outline-dark edit p-1">Edit</button>
              <button type="button" class="btn btn-outline-danger p-1">Delete</button>
            </div>
          </div>`

            document.getElementsByClassName('addressbook')[0].insertAdjacentHTML('beforeend', addresscard)
        });
    }
}

function editAddressBook(deliID) {
    let arr = document.querySelector('#deliID' + deliID).querySelectorAll('p span')
    let name = arr[0].innerText
    let phone = arr[2].innerText
    let address = arr[1].innerText.split(', ')
    let inputarr = document.querySelector('#editform' + deliID).querySelectorAll('input')
    inputarr[0].value = name;
    inputarr[1].value = address[0]
    inputarr[2].value = address[1]
    inputarr[3].value = address[2]
    inputarr[4].value = address[3]
    inputarr[5].value = phone
    console.log(address);
    // console.log(arr);
}
function deleteAddressBook(deliID) {
    let addresscard = document.querySelector('#deliID' + deliID)
    addresscard.classList.add("shrinkStart");
    setTimeout(function () {
        addresscard.classList.add("shrinkFinish");
    }, 100);
    setTimeout(function () {
        addresscard.remove();
    }, 400);
}
document.querySelector('.addressbook').addEventListener('click', function (e) {
    if (e.target.type == 'button') {
        console.log(e.target.innerText);
        let deliID = e.target.parentNode.parentNode.id.split('deliID')[1]
        console.log(deliID);
        if (e.target.innerText == 'Edit') {
            let form = `<div class='text-left p-3' id='editform${deliID}'>
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Name">
            <label for="address0">Address</label>
            <input type="text" class="form-control" name="address0" placeholder="Address">
            <label for="address1">Ward</label>
            <input type="text" class="form-control" name="address1" placeholder="Ward">
            <label for="address2">District</label>
            <input type="text" class="form-control" name="address2" placeholder="District">
            <label for="address3">City</label>
            <input type="text" class="form-control" name="address3" placeholder="City">
            <label for="phone">Phone</label>
            <input type="number" class="form-control" name="phone" placeholder="Phone">
            <div class='text-center my-2' deliID=${deliID}>
              <button type="button" class="btn btn-outline-danger p-1">Cancel</button>
              <button type="button" class="btn btn-outline-success p-1">Submit</button>
            </div>
            <div class="alert alert-danger h-100 d-none fillinput" role="alert">
            Some of inputs are not filled!!!
            </div>
            </div>`
            e.target.parentNode.insertAdjacentHTML('beforeend', form);
            e.target.disabled = true
            editAddressBook(deliID)
        }
        else if (e.target.innerText == 'Cancel') {
            deliID = e.target.parentNode.getAttribute('deliID')
            console.log(deliID);
            editbtn = document.querySelector('#deliID' + deliID).querySelector('.edit')
            editbtn.disabled = false
            e.target.parentNode.parentNode.remove()

        }
        else if (e.target.innerText == 'Submit') {
            deliID = e.target.parentNode.getAttribute('deliID')
            let inputarr = document.querySelector('#editform' + deliID).querySelectorAll('input')
            if (checkFillinput(inputarr)) {
                document.querySelector(`#editform${deliID} .alert` ).classList.add("d-none")
                let name = inputarr[0].value
                let address = inputarr[1].value
                let city = inputarr[2].value
                let state = inputarr[3].value
                let country = inputarr[4].value
                let phone = inputarr[5].value
                address = address + ', ' + city + ', ' + state + ', ' + country

                let arr = document.querySelector('#deliID' + deliID).querySelectorAll('p span')
                arr[0].innerText = name
                arr[1].innerText = address
                arr[2].innerText = phone

                let xhttp = new XMLHttpRequest();
                xhttp.open("POST", "classes/DeliveryInfo.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send(`deliID=${deliID}&name=${name}&phone=${phone}&address=${address}&userid=${userid}&update=1`);
               
                e.target.parentNode.querySelector('button').click()
            }
            else{
                document.querySelector(`#editform${deliID} .alert` ).classList.remove("d-none")
            }

        }
        else if (e.target.innerText == 'Delete') {
            let xhttp = new XMLHttpRequest();
            xhttp.open("POST", "classes/DeliveryInfo.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send(`deliID=${deliID}&delete=1`);
            deleteAddressBook(deliID)
        }
    }
})

document.querySelector('.create').addEventListener('click', function (e) {
    let form = `<div class='text-left p-3' id='createform'>
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Name">
            <label for="address0">Address</label>
            <input type="text" class="form-control" name="address0" placeholder="Address">
            <label for="address1">Ward</label>
            <input type="text" class="form-control" name="address1" placeholder="Ward">
            <label for="address2">District</label>
            <input type="text" class="form-control" name="address2" placeholder="District">
            <label for="address3">City</label>
            <input type="text" class="form-control" name="address3" placeholder="City">
            <label for="phone">Phone</label>
            <input type="number" class="form-control" name="phone" placeholder="Phone">
            <div class='text-center my-2 createbtn'>
              <button type="button" class="btn btn-outline-danger p-1">Cancel</button>
              <button type="button" class="btn btn-outline-success p-1">Submit</button>
            </div> 
            <div class="alert alert-danger h-100 d-none fillinput my-2" role="alert">
            Some of inputs are not filled!!!
            </div>
            </div>`
    e.target.parentNode.insertAdjacentHTML('beforeend', form);
    e.target.disabled = true

    document.querySelector('.createbtn').addEventListener('click', function (e) {
        if (e.target.type == 'button') {
            console.log(e.target);
            if (e.target.innerText == 'Cancel') {
                document.querySelector('.create').disabled = false
                e.target.parentNode.parentNode.remove()
            }
            else if (e.target.innerText == 'Submit') {
                console.log(userid);
                let inputarr = document.querySelector('#createform').querySelectorAll('input')
                if (checkFillinput(inputarr)) {
                    document.querySelector('#createform .alert').classList.add("d-none")
                    let name = inputarr[0].value
                    let address = inputarr[1].value
                    let city = inputarr[2].value
                    let state = inputarr[3].value
                    let country = inputarr[4].value
                    let phone = inputarr[5].value
                    address = address + ', ' + city + ', ' + state + ', ' + country

                    let xhttp = new XMLHttpRequest();
                    xhttp.open("POST", "classes/DeliveryInfo.php", true);
                    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xhttp.send(`name=${name}&phone=${phone}&address=${address}&userid=${userid}&create=1`);
                    xhttp.onreadystatechange = function () {
                        if (this.readyState == 4 && this.status == 200) {
                            let row = parseInt(this.responseText, 10)
                            let addresscard = `<div class="card text-left my-2" id='deliID${row}'>
                        <p class='font-weight-bold p-2 m-0'>Name: <span>${name}</span><br>
                          Address: <span>${address}</span><br>
                          Phone: <span>${phone}</span>
                        </p>
                        <div class='card-footer text-right p-2'>
                          <button type="button" class="btn btn-outline-dark edit p-1">Edit</button>
                          <button type="button" class="btn btn-outline-danger p-1">Delete</button>
                        </div>
                      </div>`
                            document.getElementsByClassName('addressbook')[0].insertAdjacentHTML('beforeend', addresscard)
                            e.target.parentNode.querySelector('button').click()
                        }
                    };
                } else {
                    document.querySelector('#createform .alert').classList.remove("d-none")
                }
            }
        }
    })
})

function checkFillinput(arrinput) {
    for (const input of arrinput) {
        if (input.value == '') {
            return false;
        }
    } 
    return true
}