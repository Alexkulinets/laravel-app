document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('search-input');
    const productsContainer = document.createElement('div');
    productsContainer.className = 'autocomplete-container';
    document.querySelector('.search-container').appendChild(productsContainer);

    let activeFetchId = 0;

    const fetchProducts = async (query, fetchId) => {
        try {
            const response = await fetch(`/catalog?search=${encodeURIComponent(query)}`, {
                method: 'GET',
                headers: { 'X-Requested-With': 'XMLHttpRequest' },
            });

            if (!response.ok || fetchId !== activeFetchId) return [];

            const products = await response.json();
            return [...new Map(products.map(product => [product.name, product])).values()];
        } catch (error) {
            console.error('Error fetching products:', error);
            return [];
        }
    };

    const renderResults = (products) => {
        productsContainer.innerHTML = '';
        if (products.length > 0) {
            products.forEach(({ name }) => {
                const item = document.createElement('div');
                item.className = 'autocomplete-item';
                item.textContent = name;
                item.addEventListener('click', () => {
                    searchInput.value = name;
                });
                productsContainer.appendChild(item);
            });
        } else {
            productsContainer.innerHTML = '<div class="autocomplete-item">No results found</div>';
        }
    };

    searchInput.addEventListener('input', async () => {
        const query = searchInput.value.trim();

        if (query.length < 3) {
            productsContainer.innerHTML = '';
            return;
        }

        productsContainer.innerHTML = '<div class="autocomplete-item">Loading...</div>';

        const fetchId = ++activeFetchId;
        const products = await fetchProducts(query, fetchId);

        if (fetchId === activeFetchId) {
            renderResults(products);
        }
    });

    const searchButton = document.querySelector('.search-button');
    searchButton.addEventListener('click', (event) => {
        const searchValue = searchInput.value.trim();
        if (searchValue) {
            window.location.href = `/filter-products?search=${encodeURIComponent(searchValue)}`;
        }
    });

    const urlParams = new URLSearchParams(window.location.search);
    const searchQuery = urlParams.get('search');
    if (searchQuery) {
        searchInput.value = decodeURIComponent(searchQuery);
    }

    document.addEventListener('click', (e) => {
        if (!productsContainer.contains(e.target) && e.target !== searchInput) {
            productsContainer.innerHTML = '';
        }
    });
});
