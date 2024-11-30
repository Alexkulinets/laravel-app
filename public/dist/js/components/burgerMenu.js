document.addEventListener("DOMContentLoaded", () => {
const burgerMenu = document.getElementById('burger-menu');
const navMenu = document.getElementById('navmenu');
const closeBtn = document.querySelector('.close-btn')

burgerMenu.addEventListener('click', () => {
  navMenu.classList.toggle('open');
  burgerMenu.classList.toggle('open');
});

closeBtn.addEventListener('click', () => {
  navMenu.classList.remove('open');
  burgerMenu.classList.remove('open');
});
});