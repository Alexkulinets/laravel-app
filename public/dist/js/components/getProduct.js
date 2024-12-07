document.addEventListener("DOMContentLoaded", () => {
    async function fetchProductImage(productId) {
        try {
            const response = await fetch(`http://127.0.0.1:8000/getImage?id=${productId}`);
            const data = await response.json();
            const imageUrl = data.image_url;

            const imageContainer = document.getElementById(`image-container-${productId}`);
            if (imageContainer) {
                const img = document.createElement('img');
                img.src = imageUrl || '';
                img.alt = 'Зображення продукту';
                img.className = 'card-product-image';
                imageContainer.appendChild(img);
            }
        } catch (error) {
            console.error('Error fetching product image:', error);
        }
    }


    const productElements = document.querySelectorAll('[id^="image-container-"]');
    productElements.forEach(element => {
        const productId = element.id.split('-').pop(); 
        fetchProductImage(productId);
    });
});
