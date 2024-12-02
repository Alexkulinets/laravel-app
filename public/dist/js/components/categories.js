document.addEventListener("DOMContentLoaded", () => {
    const parents = document.querySelectorAll('.categories-product-icon-container');
    
    parents.forEach(parent => {
        parent.addEventListener('click', (event) => {
            const childContainer = parent.nextElementSibling;
            
            if (childContainer && childContainer.classList.contains('child-container')) {
                childContainer.classList.toggle('visible');
            }
        });
    });
});
