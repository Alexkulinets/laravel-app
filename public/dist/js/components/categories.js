document.addEventListener("DOMContentLoaded", () => {
    const parents = document.querySelectorAll('.categories-product-icon-container');

    // Отримуємо параметр category_id з URL
    const urlParams = new URLSearchParams(window.location.search);
    const activeCategory = urlParams.get('category_id');

    // Якщо параметр category_id є в URL, встановлюємо відповідний клас
    parents.forEach(parent => {
        const categoryTitle = parent.querySelector('.categories-box-text').textContent.trim();

        // Перевірка для all-products або будь-якої іншої категорії
        if (activeCategory === categoryTitle || (activeCategory === 'all-products' && categoryTitle.toLowerCase() === 'all products')) {
            parent.classList.add('active-category');
        }
    });

    // Додаємо обробник події для кліку
    parents.forEach(parent => {
        parent.addEventListener('click', () => {

            // Якщо вже є активний клас, то нічого не робимо
            if (parent.classList.contains('active-category')) {
                return;
            }

            // Очищаємо всі інші активні категорії
            parents.forEach(item => item.classList.remove('active-category'));
            parent.classList.add('active-category');

            const childContainer = parent.nextElementSibling;
            if (childContainer && childContainer.classList.contains('child-container')) {
                childContainer.classList.toggle('visible');
                childContainer.classList.toggle('hidden');
            }

            // Оновлюємо URL з новим параметром category_id
            const categoryTitle = parent.querySelector('.categories-box-text').textContent.trim();
            const url = new URL(window.location.href);
            url.searchParams.set('category_id', categoryTitle.toLowerCase() === 'all products' ? 'all-products' : categoryTitle);
            history.replaceState(null, '', url);
        });
    });
});
