document.addEventListener("DOMContentLoaded", () => {
    const priceRange = document.getElementById("priceRange");
    const priceValue = document.getElementById("priceValue");
    const minPriceInput = document.getElementById("minPriceInput");
    const maxPriceInput = document.getElementById("maxPriceInput");
    const maxProductPrice = priceValue ? priceValue.dataset.maxPrice : null;

    if (!maxProductPrice) {
        return; 
    }

    let minPrice = 0;
    let maxPrice = maxProductPrice;


    const syncValues = () => {
        priceRange.min = minPrice;
        priceRange.max = maxProductPrice;
        priceRange.value = maxPrice;

        priceValue.textContent = maxPrice;
        minPriceInput.value = minPrice;
        maxPriceInput.value = maxPrice;

        if (updateUrl) {
            minPrice = parseInt(minPriceInput.value) || 0; 
            maxPrice = parseInt(maxPriceInput.value) || maxProductPrice; 
        }
    };


    const updateUrl = () => {
        const currentUrl = new URL(window.location);
        currentUrl.searchParams.set("min_price", minPrice);
        currentUrl.searchParams.set("max_price", maxPrice);
        window.history.replaceState({}, "", currentUrl);
    };

    priceRange.addEventListener("input", () => {
        maxPrice = parseInt(priceRange.value) || maxPrice;
        syncValues();
    });

    [minPriceInput, maxPriceInput].forEach(input => {
        input.addEventListener("input", () => {
            const value = input.value === "" ? "" : parseInt(input.value);
            if (input === minPriceInput) {
                minPrice = value || 0; 
            } else {
                maxPrice = value || priceRange.max; 
                priceRange.value = maxPrice || priceRange.max; 
            }
            updateUrl();
        });

        input.addEventListener("blur", () => {
            if (input === minPriceInput && minPrice === "") {
                minPrice = 0;
                input.value = minPrice;
            }
            if (input === maxPriceInput && maxPrice === "") {
                maxPrice = maxPriceInput.max;
                input.value = maxPrice;
            }
            syncValues();
        });
    });
});
