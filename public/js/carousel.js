let images = [
    "img/cat2.jpeg",
    "img/cat3.jpeg",
    "img/cat4.jpeg",
    "img/cat5.jpeg",
    "img/cat6.jpeg",
    "img/cat7.jpeg",
    "img/cat8.jpeg",
    "img/cat9.jpeg",
    "img/cat1.jpeg",
];

let img = document.querySelector('.carousel');
let i = 0;

function changeImage() {
    img.setAttribute('src', images[i]);
    i++;
    if ( i >= images.length ) {
        i = 0;
    }
}

let interval = setInterval(changeImage, 3000);
