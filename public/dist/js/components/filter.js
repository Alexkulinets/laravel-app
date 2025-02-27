document.addEventListener("DOMContentLoaded", () => {
    const searchInput = document.getElementById('search-input');
    const categoriesContainer = document.querySelector('.categories-section-container');
    const toggleButton = document.getElementById('toggleButton');
    const closeButton = document.querySelector('.close');


    if (toggleButton) {
        toggleButton.addEventListener('click', () => categoriesContainer.classList.add('active'));
        closeButton.addEventListener('click', () => categoriesContainer.classList.remove('active'));
    }

    if (searchInput){
        searchInput.value = localStorage.getItem('searchTerm') || '';
        searchInput.addEventListener('input', () => localStorage.setItem('searchTerm', searchInput.value));
    }
});