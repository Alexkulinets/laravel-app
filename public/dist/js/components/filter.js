document.addEventListener("DOMContentLoaded", () => {
    // Отримуємо елементи з DOM
    const searchInput = document.getElementById('search-input');  // Поле для пошуку
    const categoryItems = document.querySelectorAll('.categories-product-icon-container');  // Категорії продуктів
    const productCards = document.querySelectorAll('.all-products-products-section');  // Картки продуктів
    const priceRange = document.getElementById("priceRange");  // Слайдер для цін
    const priceValue = document.getElementById("priceValue");  // Виведення ціни, що вибрана слайдером
    const minPriceInput = document.getElementById("minPriceInput");  // Поле вводу мінімальної ціни
    const maxPriceInput = document.getElementById("maxPriceInput");  // Поле вводу максимальної ціни
   

    // Ініціалізація змінних для вибору категорії та цін
    let selectedCategory = '';  // Категорія, що вибрана
    let minPrice = parseInt(minPriceInput.value) || 0;  // Мінімальна ціна, за замовчуванням 0
    let maxPrice = parseInt(maxPriceInput.value) || 2000;  // Максимальна ціна, за замовчуванням 2000

    // Функція для синхронізації значень
    function syncValues() {
        // Перевіряємо та коригуємо мінімальну та максимальну ціни
        if (minPrice < 0) minPrice = 0;  // Якщо мінімальна ціна менше 0, ставимо 0
        if (maxPrice > 2000) maxPrice = 2000;  // Якщо максимальна ціна більше 2000, ставимо 2000

        // Оновлюємо значення слайдера та полів вводу
        priceRange.value = maxPrice;
        priceValue.textContent = maxPrice;

        minPriceInput.value = minPrice;
        maxPriceInput.value = maxPrice;
    }

    // Функція для фільтрації продуктів
    function filterProducts() {
        const searchTerm = searchInput.value.toLowerCase();  // Отримуємо значення пошуку, приводимо до нижнього регістру

        productCards.forEach(card => {
            const productName = card.querySelector('.card-section-name').textContent.toLowerCase();  // Назва продукту
            const productPrice = parseFloat(card.dataset.price);  // Ціна продукту з data-атрибута

            // Перевіряємо, чи підходить продукт за категорією, пошуком та ціною
            const matchesCategory = selectedCategory === '' || selectedCategory === 'all products' || productName.includes(selectedCategory);
            const matchesSearch = searchTerm === '' || productName.includes(searchTerm);
            const matchesPrice = productPrice >= minPrice && productPrice <= maxPrice;

            // Відображаємо або приховуємо продукт в залежності від фільтрів
            if (matchesCategory && matchesSearch && matchesPrice) {
                card.style.display = '';  // Якщо продукт відповідає умовам, показуємо його
            } else {
                card.style.display = 'none';  // Інакше приховуємо продукт
            }
        });
    }

    // Подія для пошуку (викликається при кожному введенні в поле пошуку)
    searchInput.addEventListener('input', filterProducts);

    // Фільтрація за категоріями
    categoryItems.forEach(category => {
        category.addEventListener('click', function () {
            // Встановлюємо вибрану категорію
            selectedCategory = this.querySelector('.categories-box-text').textContent.toLowerCase();

            // Відмічаємо вибрану категорію
            categoryItems.forEach(item => item.classList.remove('active-category'));
            this.classList.add('active-category');

            // Перезастосовуємо фільтри після вибору категорії
            filterProducts();
        });
    });

    // Оновлення значень через слайдер (при зміні слайдера)
    priceRange.addEventListener("input", function () {
        maxPrice = parseInt(priceRange.value) || 2000;  // Якщо значення слайдера некоректне, ставимо 2000
        syncValues();  // Оновлюємо значення
        filterProducts();  // Застосовуємо фільтрацію
    });

    // Оновлення значень через інпут (мінімальна ціна)
    minPriceInput.addEventListener("input", function () {
        minPrice = parseInt(minPriceInput.value) || 0;  // Якщо мінімальна ціна некоректна, ставимо 0
        syncValues();  // Оновлюємо значення
        filterProducts();  // Застосовуємо фільтрацію
    });

    // Оновлення значень через інпут (максимальна ціна)
    maxPriceInput.addEventListener("input", function () {
        maxPrice = parseInt(maxPriceInput.value) || 2000;  // Якщо максимальна ціна некоректна, ставимо 2000
        syncValues();  // Оновлюємо значення
        filterProducts();  // Застосовуємо фільтрацію
    })
});

