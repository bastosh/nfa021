let images = [
    ["img/carouel/cat2.jpeg", 'Lion qui marche sur une route'],
    ["img/carouel/cat3.jpeg", 'Chat couché sur le côté'],
    ["img/carouel/cat4.jpeg", 'Léopard'],
    ["img/carouel/cat5.jpeg", 'Chat qui aime les caresses dans le cou'],
    ["img/carouel/cat6.jpeg", 'Léopard'],
    ["img/carouel/cat7.jpeg", 'Chat qui sort la tête du couvre-lit'],
    ["img/carouel/cat8.jpeg", 'Tigre dans l’eau'],
    ["img/carouel/cat9.jpeg", 'Chat qui ferme les yeux'],
    ["img/carouel/cat1.jpeg", 'Chat sous la couette'],
];

let img = document.querySelector('.carousel');
let i = 0;

function changeImage() {
    img.setAttribute('src', images[i][0]);
    img.setAttribute('alt', images[i][1]);
    i++;
    if ( i >= images.length ) {
        i = 0;
    }
}

let interval = setInterval(changeImage, 3000);
