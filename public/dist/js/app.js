document.addEventListener("DOMContentLoaded", function () {
    AOS.init({
        duration: 300,  
        easing: 'ease-in-out', 
        once: true,       
        mirror: false     
    });

    const cardContainerSection = document.querySelector('.card-container-section');
    const leftBtn = document.querySelector('.left-btn');
    const rightBtn = document.querySelector('.right-btn');

    leftBtn.addEventListener('click', () => {
        cardContainerSection.scrollBy({
            left: -320, // Прокрутка вліво на ширину однієї картки
            behavior: 'smooth' 
        });
    });

    rightBtn.addEventListener('click', () => {
        cardContainerSection.scrollBy({
            left: 320, // Прокрутка вправо на ширину однієї картки
            behavior: 'smooth' 
        });
    });
});

