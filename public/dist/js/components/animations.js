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

        if (screenWidth >= 1440) {
            return 270;
        } else if(screenWidth >= 767) {
            return 380;
        } else {
            return 160; 
        }
    }

    if (cardContainerSection && leftBtn && rightBtn) {
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
    }
});






