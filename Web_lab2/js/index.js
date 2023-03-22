
// function tryToGetId() {
//     let imgUrl = ["img/billy.jpg", "img/booba.jpg", "img/Pop%20cat.jpg", "img/cat%20iii.webp", "img/mI-P2m1ID2Y.jpg"];
//     for (let i = 0; i < length-1; i++) {
//         var id = document.getElementById(imgUrl);
//         return id;
//     }
//
// }

let imageId;

const images = document.querySelectorAll('img');
let selectedImage = null;
images.forEach((img) => {
    img.addEventListener('click', (event) => {
        if (selectedImage !== null) {
            selectedImage.classList.remove('highlighted-image');
        }
        imageId = event.target.id;
        event.target.classList.add('highlighted-image');
        selectedImage = event.target;
    });
});
function getImgIdByClick(){
    let selectedTd;

    table.onclick = function(event) {
        let target = event.target; // где был клик?

        if (target.tagName != 'img') return; // не на TD? тогда не интересует

        highlight(target); // подсветить TD
    };

    function highlight(img) {
        if (selectedTd) { // убрать существующую подсветку, если есть
            selectedTd.classList.remove('highlight');
        }
        selectedTd = img;
        selectedTd.classList.add('highlight'); // подсветить новый td
    }
}

function moveImageUp(imageId) {

    var img = document.getElementById(imageId);
    if (img.previousElementSibling) {
        img.parentNode.insertBefore(img, img.previousElementSibling);
    }

}

// function getCurrentId(imageId){
//
// }

function moveImageDown(imageId) {
    var img = document.getElementById(imageId);
    if (img.nextElementSibling) {
        img.parentNode.insertBefore(img.nextElementSibling, img);
    }
}

function changeImageSize(imageId) {
    var img = document.getElementById(imageId);
    var width = document.getElementById("width").value;
    var height = document.getElementById("height").value;
    img.style.width = width + "px";
    img.style.height = height + "px";
}

function changeImageBorder(imageId) {
    var img = document.getElementById(imageId);
    var border = document.getElementById("border").value;
    img.style.border = border + "px solid black";
}

function changeImageAlt(imageId) {
    var img = document.getElementById(imageId);
    var alt = document.getElementById("alt").value;
    img.alt = alt;
}