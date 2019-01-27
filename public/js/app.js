let images = [
    "https://placekitten.com/602/301",
    "https://placekitten.com/606/303"
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