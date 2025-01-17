document.addEventListener("DOMContentLoaded", () => {
    const parents = document.querySelectorAll('.categories-product-icon-container');
    const urlParams = new URLSearchParams(window.location.search);
    const activeCategory = urlParams.get('category_id');

    parents.forEach(parent => {
        const categoryTitle = parent.querySelector('.categories-box-text').textContent.trim();
        if (activeCategory === categoryTitle || (activeCategory === 'all-products' && categoryTitle.toLowerCase() === 'all products')) {
            parent.classList.add('active-category');
        }
    });

    parents.forEach(parent => {
        parent.addEventListener('click', () => {
            if (parent.classList.contains('active-category')) {
                return;
            }
            parents.forEach(item => item.classList.remove('active-category'));
            parent.classList.add('active-category');

            const childContainer = parent.nextElementSibling;
            if (childContainer && childContainer.classList.contains('child-container')) {
                childContainer.classList.toggle('visible');
                childContainer.classList.toggle('hidden');
            }
        });
    });
});
