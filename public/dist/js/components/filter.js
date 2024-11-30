document.addEventListener("DOMContentLoaded", () => {
    const searchInput = document.getElementById('search-input');
    const categoryItems = document.querySelectorAll('.categories-product-icon-container');
    const productCards = document.querySelectorAll('.all-products-products-section');

    let selectedCategory = '';


    function filterProducts() {
        const searchTerm = searchInput.value.toLowerCase();

        productCards.forEach(card => {
            const productName = card.querySelector('.card-section-name').textContent.toLowerCase();


            const matchesCategory = selectedCategory === '' || selectedCategory === 'all products' || productName.includes(selectedCategory);
            const matchesSearch = searchTerm === '' || productName.includes(searchTerm);

            if (matchesCategory && matchesSearch) {
                card.style.display = '';
            } else {
                card.style.display = 'none';
            }
        });
    }


    searchInput.addEventListener('input', filterProducts);


    categoryItems.forEach(category => {
        category.addEventListener('click', function () {

            selectedCategory = this.querySelector('.categories-box-text').textContent.toLowerCase();

            categoryItems.forEach(item => item.classList.remove('active-category'));
            this.classList.add('active-category');


            filterProducts();
        });
    });
});
