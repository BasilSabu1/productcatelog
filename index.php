<?php
include 'components/header.php';
?>

<main>
   
    <section>
    <?php
   include 'components/product.php';
     ?>  
    </section>
</main>

<?php
include 'components/footer.php';
?>
<script>
    async function fetchProducts() {
    const response = await fetch('product.json');
    console.log('Response:', response); 
    const products = await response.json();
    console.log('Fetched Products:', products); 

    displayProducts(products);
}


    function displayProducts(products) {
    console.log('Products:', products);
    
    if (Array.isArray(products) && products.length > 0) {
        const productList = document.getElementById('product-list');
        console.log('Product List Element:', productList);

        if (productList) {
            productList.innerHTML = ''; 

            products.forEach(product => {
                console.log('Product:', product);

                if (product.image && product.name && product.specifications && product.price && product.category) {
                    const productCard = `
                        <div class="product-card">
                            <img src="${product.image}" alt="${product.name}" class="product-image">
                            <h3 class="product-name">${product.name}</h3>
                            <p class="product-description">${product.specifications}</p>
                            <p class="product-price">$${product.price}</p>
                            <p class="product-category">Category: ${product.category}</p>
                        </div>
                    `;
                    productList.innerHTML += productCard;
                } else {
                    console.warn('Missing product data:', product);
                }
            });
        } else {
            console.error('Product list container not found!');
        }
    } else {
        console.error('Invalid or empty products array');
    }
}


    async function filterProducts() {
        const selectedCategory = document.getElementById('categoryFilter').value;
        const response = await fetch('products.json');
        const products = await response.json();

        if (selectedCategory === 'all') {
            displayProducts(products);
        } else {
            const filteredProducts = products.filter(product => product.category === selectedCategory);
            displayProducts(filteredProducts);
        }
    }

   document.addEventListener('DOMContentLoaded', fetchProducts);
</script>

<style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

header, footer {
    text-align: center;
    /* background-color: #333; */
    color: #fff;
    padding: 10px 0;
    
}

main {
    padding: 20px;
    margin-top: 120px;
}

.filter {
    margin-bottom: 20px;
}

.product-list {
    display: grid;
    grid-template-columns: repeat(4, 1fr); 
    gap: 20px; 
    max-width: 1200px; 
    margin: 0 auto; 
}

.product-card {
    border: 1px solid #ddd;
    padding: 15px;
    border-radius: 8px;
    text-align: center;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    background-color: #fff;
}

.product-image {
    width: 100%;
    height: 200px;
    object-fit: cover;
    border-radius: 8px;
}

.product-name {
    font-size: 1.2rem;
    margin: 10px 0;
    font-weight: bold;
}

.product-description {
    font-size: 1rem;
    color: #666;
    margin: 10px 0;
}

.product-price {
    font-size: 1.2rem;
    font-weight: bold;
    color: #333;
}

.product-category {
    font-size: 0.9rem;
    color: #888;
    margin-top: 10px;
}

@media (max-width: 1024px) {
    .product-list {
        grid-template-columns: repeat(3, 1fr); 
    }
}

@media (max-width: 768px) {
    .product-list {
        grid-template-columns: repeat(2, 1fr); 
    }
}

@media (max-width: 480px) {
    .product-list {
        grid-template-columns: 1fr;
    }
}
</style>