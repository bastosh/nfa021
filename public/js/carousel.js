let images = [
    ["img/carousel/cat2.webp", "img/carousel/cat2.jpeg", 'Lion qui marche sur une route'],
    ["img/carousel/cat3.webp", "img/carousel/cat3.jpeg", 'Chat couché sur le côté'],
    ["img/carousel/cat4.webp", "img/carousel/cat4.jpeg", 'Léopard'],
    ["img/carousel/cat5.webp", "img/carousel/cat5.jpeg", 'Chat qui aime les caresses dans le cou'],
    ["img/carousel/cat6.webp", "img/carousel/cat6.jpeg", 'Léopard'],
    ["img/carousel/cat7.webp", "img/carousel/cat7.jpeg", 'Chat qui sort la tête du couvre-lit'],
    ["img/carousel/cat8.webp", "img/carousel/cat8.jpeg", 'Tigre dans l’eau'],
    ["img/carousel/cat9.webp", "img/carousel/cat9.jpeg", 'Chat qui ferme les yeux'],
    ["img/carousel/cat1.webp", "img/carousel/cat1.jpeg", 'Chat sous la couette'],
];

let source = document.querySelector('.source');
let img = document.querySelector('.carousel');
let i = 0;

function changeImage() {
    source.setAttribute('srcset', images[i][0]);
    img.setAttribute('src', images[i][1]);
    img.setAttribute('alt', images[i][2]);
    i++;
    if ( i >= images.length ) {
        i = 0;
    }
}

let interval = setInterval(changeImage, 3000);

img.onmouseover = function() {
    clearInterval(interval);
}

img.onmouseout = function() {
    interval = setInterval(changeImage, 3000);
}
