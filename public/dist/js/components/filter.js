document.addEventListener("DOMContentLoaded", () => {
    const searchInput = document.getElementById('search-input');
    const productCards = document.querySelectorAll('.all-products-products-section');
    const priceRange = document.getElementById("priceRange");
    const priceValue = document.getElementById("priceValue");
    const minPriceInput = document.getElementById("minPriceInput");
    const maxPriceInput = document.getElementById("maxPriceInput");
    const categoriesContainer = document.querySelector('.categories-section-container');
    const toggleButton = document.getElementById('toggleButton');
    const closeButton = document.querySelector('.close');
    const urlParams = new URLSearchParams(window.location.search);

    let minPrice = parseInt(urlParams.get('min_price')) || 0;
    let maxPrice = parseInt(urlParams.get('max_price')) || 1000;

    minPriceInput.value = minPrice;
    maxPriceInput.value = maxPrice;

    const updateSliderAndFields = () => {
        const prices = Array.from(productCards).map(card => parseFloat(card.dataset.price) || 0);
        const minProductPrice = Math.min(...prices);
        const maxProductPrice = Math.max(...prices);

        priceRange.min = minProductPrice;
        priceRange.max = maxProductPrice;

        // Задаємо початкові значення
        priceRange.value = maxPrice;
        priceValue.textContent = maxPrice;
        minPriceInput.value = minPrice;
        maxPriceInput.value = maxPrice;
    };

    const updateUrl = () => {
        const currentUrl = new URL(window.location);
        currentUrl.searchParams.set("min_price", minPrice);
        currentUrl.searchParams.set("max_price", maxPrice);
        window.history.replaceState({}, "", currentUrl);
    };

    const syncValues = () => {
        maxPriceInput.value = maxPrice; // Оновлення текстового поля максимальної ціни
        priceValue.textContent = maxPrice;
        updateUrl();
    };

    toggleButton.addEventListener('click', () => categoriesContainer.classList.add('active'));
    closeButton.addEventListener('click', () => categoriesContainer.classList.remove('active'));

    priceRange.addEventListener("input", () => {
        maxPrice = parseInt(priceRange.value) || maxPrice;
        syncValues();
    });

    [minPriceInput, maxPriceInput].forEach(input => {
        input.addEventListener("input", () => {
            const value = input.value === "" ? "" : parseInt(input.value);
            if (input === minPriceInput) {
                minPrice = value || 0; // Якщо поле пусте, ставимо 0
            } else {
                maxPrice = value || priceRange.max; // Якщо поле пусте, ставимо максимальне значення
                priceRange.value = maxPrice || priceRange.max; // Оновлення повзунка
            }
            updateUrl();
        });

        input.addEventListener("blur", () => {
            if (input === minPriceInput && minPrice === "") {
                minPrice = 0;
                input.value = minPrice;
            }
            if (input === maxPriceInput && maxPrice === "") {
                maxPrice = priceRange.max;
                input.value = maxPrice;
            }
            syncValues();
        });
    });

    searchInput.value = localStorage.getItem('searchTerm') || '';
    searchInput.addEventListener('input', () => localStorage.setItem('searchTerm', searchInput.value));

    updateSliderAndFields();
});