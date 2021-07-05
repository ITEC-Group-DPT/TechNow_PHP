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

            let radiobox = `<div class="card text-left my-2" id='deliID${deliID}'>
            <p class='font-weight-bold p-2 m-0'>Name: <span>${name}</span><br>
              Address: <span>${address}</span><br>
              Phone: <span>${phone}</span>
            </p>
            <div class='card-footer text-right p-2'>
              <button type="button" class="btn btn-outline-dark edit p-1">Edit</button>
              <button type="button" class="btn btn-outline-danger p-1">Delete</button>
            </div>
          </div>`

            document.getElementsByClassName('addressbook')[0].insertAdjacentHTML('beforeend', radiobox)
        });
    }
}

function editAddressBook(deliID) {
    let arr = document.querySelector('#deliID' + deliID).querySelectorAll('p span')
    let name = arr[0].innerText
    let phone = arr[2].innerText
    let address = arr[1].innerText.split(', ')
    let inputarr = document.querySelector('#editform'+deliID).querySelectorAll('input')
    inputarr[0].value=name;
    inputarr[1].value=address[0]
    inputarr[2].value=address[1]
    inputarr[3].value=address[2]
    inputarr[4].value=address[3]
    inputarr[5].value=phone
    console.log(address);
    // console.log(arr);
}
function deleteAddressBook(deliID) {
    console.log(1);
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
            </div>`
            e.target.parentNode.insertAdjacentHTML('beforeend', form);
            e.target.disabled=true
            editAddressBook(deliID)
        }
        else if(e.target.innerText == 'Cancel'){
            deliID = e.target.parentNode.getAttribute('deliID')
            console.log(deliID);
            editbtn= document.querySelector('#deliID'+deliID).querySelector('.edit')
            editbtn.disabled=false
            e.target.parentNode.parentNode.remove()         

        }
        else if (e.target.innerText == 'Delete') {

        }
    }
})