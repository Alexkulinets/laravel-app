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

    function getScrollDistance() {
        const screenWidth = window.innerWidth;

        if (screenWidth >= 1024) {
            return 480; 
        } else if (screenWidth >= 768) {
            return 440;
        } else {
            return 330; 
        }
    }

    leftBtn.addEventListener('click', () => {
        const scrollDistance = getScrollDistance();
        cardContainerSection.scrollBy({
            left: -scrollDistance,
            behavior: 'smooth'
        });
    });

    rightBtn.addEventListener('click', () => {
        const scrollDistance = getScrollDistance();
        cardContainerSection.scrollBy({
            left: scrollDistance,
            behavior: 'smooth'
        });
    });
});






