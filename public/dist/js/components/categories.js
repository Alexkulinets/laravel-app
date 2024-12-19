document.addEventListener("DOMContentLoaded", () => {
    const parents = document.querySelectorAll('.categories-product-icon-container');

    parents.forEach(parent => {
        parent.addEventListener('click', () => {

            if (parent.classList.contains('active-category')) {
                return ;
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
