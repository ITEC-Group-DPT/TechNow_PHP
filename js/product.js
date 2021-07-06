let favorite = document.querySelector('#favorite');
let favIcon = document.querySelector('#fav-icon');

$(document).ready(() => {
    favorite.addEventListener("click", () => {
        favoriteFunc();
    });
});

function favoriteFunc(){
    let value = favorite.getAttribute("data-value");
    if (value == '') return false;
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajaxFavorite.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = function() {
        if(this.status == 200) {
            if(this.responseText == "added to favorite") {
                favIcon.classList.remove("far");
                favIcon.classList.add("fas");
            }
            else{
                favIcon.classList.remove("fas");
                favIcon.classList.add("far");
            }
        }
    }
    xhr.send("id=" + value);
}