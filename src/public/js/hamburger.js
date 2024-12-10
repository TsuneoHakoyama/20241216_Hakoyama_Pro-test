const burger = document.querySelector('#burger');
const menu = document.querySelector('#menu');

if (burger) {
    burger.addEventListener('click', () => {
        burger.classList.toggle('is-active');
        menu.classList.toggle('is-active');
    })
}