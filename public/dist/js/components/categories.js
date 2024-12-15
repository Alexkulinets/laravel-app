document.addEventListener("DOMContentLoaded", () => {
    const parents = document.querySelectorAll('.categories-product-icon-container');

    parents.forEach(parent => {
        parent.addEventListener('click', () => {
            // Якщо вже активний, не робимо нічого
            if (parent.classList.contains('active-category')) {
                return;
            }

            // Видаляємо активний клас для всіх елементів
            parents.forEach(item => item.classList.remove('active-category'));
            parent.classList.add('active-category');

            const childContainer = parent.nextElementSibling;
            if (childContainer && childContainer.classList.contains('child-container')) {


                if (childContainer.classList.contains('visible')) {
                    // Якщо відкритий, закриваємо його
                    childContainer.classList.remove('visible');
                    childContainer.classList.add('hidden');
                  
                } else {
                    // Якщо закритий, відкриваємо його
                    childContainer.classList.remove('hidden');
                    childContainer.classList.add('visible');

                }
            }
        });
    });
});
