document.addEventListener('DOMContentLoaded', () => {
    const categoriesContainer = document.querySelector('.all-categories');
    const productsContainer = document.querySelector('.all-products-section-lines');
    const minPriceInput = document.getElementById('minPriceInput');
    const maxPriceInput = document.getElementById('maxPriceInput');
    const searchInput = document.getElementById('search-input');
    const applyButton = document.getElementById('apply-button');
    const searchButton = document.getElementById('search-button');

    let previousCategory = getURLParam('category_id') || 'All products';
    let previousSearch = getURLParam('search') || '';
    let isLoading = false;

    if (categoriesContainer && productsContainer) {
        categoriesContainer.addEventListener('click', (e) => {
            const categoryInput = e.target.closest('input[type="radio"]');
            if (categoryInput) {
                updationCategory(categoryInput.value);
                updatingSearch();
            }
        });

        const handleUpdate = (e) => {
            e.preventDefault();
            updatingSearch();
        };
        
        applyButton.addEventListener('click', handleUpdate);
        searchButton.addEventListener('click', handleUpdate);
        searchInput.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') {
                handleUpdate(e);
            }
        });
    }

    document.addEventListener('click', (e) => {
        const paginationLink = e.target.closest('.pagination a');
        if (paginationLink) {
            e.preventDefault();
            const page = new URL(paginationLink.href).searchParams.get('page');
            updateFiltersAndFetch(null, page);
        }
    });

    function updateFiltersAndFetch(selectedCategory = null, page = null) {
        if (!productsContainer || isLoading ) return;

        const categoryId = selectedCategory || getURLParam('category_id') || 'All products';
        const minPrice = minPriceInput?.value || 0;
        const maxPrice = maxPriceInput?.value || maxPriceInput?.getAttribute('max');
        const searchQuery = searchInput?.value || '';
        const currentPage = page || getURLParam('page') || 1;

        if (!isValidPriceRange(minPrice, maxPrice)) {
            alert('Невірні значення цін.');
            return;
        }

        const url = new URL(window.location.href);
        url.searchParams.set('category_id', categoryId);
        url.searchParams.set('min_price', minPrice);
        url.searchParams.set('max_price', maxPrice);
        url.searchParams.set('page', currentPage);
        if (searchQuery) url.searchParams.set('search', searchQuery);
        else url.searchParams.delete('search');

        history.replaceState(null, '', url);

        productsContainer.innerHTML = '<div class="loader"></div>';
        isLoading = true;

        fetchProducts(categoryId, minPrice, maxPrice, searchQuery, currentPage, productsContainer);
    }

    function updatingSearch() {
        const newSearch = searchInput.value.trim();
    
        if (newSearch !== previousSearch) {
            previousSearch = newSearch;
            updateFiltersAndFetch('All products', 1);  
        }else {
            updateFiltersAndFetch();
        }
    }
    
    function updationCategory(selectedCategory) {
        const newCategory = selectedCategory || getURLParam('category_id');
        
        if (newCategory !== previousCategory) {
            previousCategory = newCategory;
            updateFiltersAndFetch(newCategory, 1); 
        } else {
            updateFiltersAndFetch();
        }
    }

    
    function fetchProducts(categoryId, minPrice, maxPrice, searchQuery, currentPage, productsContainer) {
        const url = new URL('/catalog', window.location.origin);
        url.searchParams.append('category_id', categoryId);
        url.searchParams.append('min_price', minPrice);
        url.searchParams.append('max_price', maxPrice);
        url.searchParams.append('page', currentPage);
        if (searchQuery) url.searchParams.append('search', searchQuery);

        fetch(url, {
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
            },
        })
            .then((response) => response.json())
            .then((json) => {
                isLoading = false;
                if (json.html.trim()) {
                    productsContainer.innerHTML = json.html;
                } else {
                    productsContainer.innerHTML = `
                        <div class="no-products">
                            <p>Продукти не знайдено :(</p>
                        </div>
                    `;
                }
            })
            .catch((error) => {
                console.error('Помилка:', error);
                isLoading = false;
                productsContainer.innerHTML = '<p>Виникла помилка при завантаженні продуктів.</p>';
                searchInput.value = ''; 
            });
    }
    
    function getURLParam(param) {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get(param);
    }

    function isValidPriceRange(minPrice, maxPrice) {
        return minPrice >= 0 && maxPrice >= 0 && minPrice <= maxPrice;
    }

    if (productsContainer) {
        updateFiltersAndFetch(getURLParam('category_id'));
    }
});
