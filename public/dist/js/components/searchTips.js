document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('search-input');
    const searchContainer = document.querySelector('.search-container');
    
    if (searchInput && searchContainer) {
        const productsContainer = document.createElement('div');
        productsContainer.className = 'autocomplete-container';
        searchContainer.appendChild(productsContainer);

        let activeFetchId = 0;

        const fetchProducts = async (query, fetchId) => {
            try {
                const response = await fetch(`/catalog?search=${encodeURIComponent(query)}`, {
                    method: 'GET',
                    headers: { 'X-Requested-With': 'XMLHttpRequest' },
                });

                if (!response.ok || fetchId !== activeFetchId) return [];

                const data = await response.json();
                const products = data.uniqueProducts;
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
        if (searchButton) {
            searchButton.addEventListener('click', (event) => {
                const searchValue = searchInput.value.trim();
                if (searchValue) {
                    const url = new URL(window.location.href);
                    url.searchParams.set('search', encodeURIComponent(searchValue));
                    history.replaceState(null, '', url);
                }
            });
        }
        document.addEventListener('click', (e) => {
            if (!productsContainer.contains(e.target) && e.target !== searchInput) {
                productsContainer.innerHTML = '';
            }
        });
    }
});
