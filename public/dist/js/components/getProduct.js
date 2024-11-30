document.addEventListener("DOMContentLoaded", () => {
async function fetchProductImage(productId) {
    try {
        const response = await fetch(`http://127.0.0.1:8000/getImage?id=${productId}`);

        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        
        const data = await response.json();

        if (!data || !data.image_url || !data.image_name || !data.image_price || !data.image_description ) {
            console.warn(`No data found for product ID: ${productId}`);
            return;
        }

        const imageUrl = data.image_url;
        const imageName = data.image_name; 
        const imagePrice = data.image_price; 
        const imageDescription = data.image_description;
        const imageFullDescription = data.image_full_description ;

        // Перевірка на існування контейнера перед додаванням елементів
        const imageContainer = document.getElementById(`image-container-${productId}`);
        if (imageContainer) {
            const img = document.createElement('img');
            img.src = imageUrl || ''; 
            img.alt = 'Зображення продукту';
            img.className = 'card-product-image';
            imageContainer.appendChild(img);
        } else {
            console.warn(`Element with ID 'image-container-${productId}' not found.`);
        }

        // Аналогічно для інших елементів
        const nameContainer = document.getElementById(`text-container-${productId}`);
        if (nameContainer) {
            const nameElement = document.createElement('div');
            nameElement.textContent = imageName || 'Назва не вказана';
            nameContainer.appendChild(nameElement);
        }

        const costContainer = document.getElementById(`cost-container-${productId}`);
        if (costContainer) {
            const costElement = document.createElement('div');
            costElement.textContent = imagePrice ? `$${imagePrice}` : 'Ціна не вказана';
            costContainer.appendChild(costElement);
        }

        const descContainer = document.getElementById(`desc-container-${productId}`);
        if (descContainer) {
            const descElement = document.createElement('div');
            descElement.textContent = imageDescription || 'Опис не вказаний';
            descContainer.appendChild(descElement);
        }

        const fullDescContainer = document.getElementById(`full-desc-container-${productId}`);
        if (fullDescContainer) {
            const fullElement = document.createElement('div');
            fullElement.textContent = imageFullDescription || 'Опис не вказаний';
            fullDescContainer.appendChild(fullElement);
        }

    } catch (error) {
        console.error('Error fetching product image:', error);
    }
}


fetchProductImage(1);
fetchProductImage(2);
fetchProductImage(3);
fetchProductImage(4);
fetchProductImage(5);
fetchProductImage(6);
});