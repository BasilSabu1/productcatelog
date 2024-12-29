<?php
function fetchProducts() {
    $response = file_get_contents('product.json'); 
    return json_decode($response, true); 
}

function getProductCategories($products) {
    $categories = [];
    foreach ($products as $product) {
        if (isset($product['category']) && !in_array($product['category'], $categories)) {
            $categories[] = $product['category']; 
        }
    }
    return $categories;
}

function displayProductCards($products) {
    echo '<section id="product-list" class="product-list">';

    foreach ($products as $product) {
        if (isset($product['image'], $product['name'], $product['specifications'], $product['price'], $product['category'])) {
            echo '

                <div class="product-card">
                    <img src="' . $product['image'] . '" alt="' . $product['name'] . '" class="product-image">
                    <h3 class="product-name">' . $product['name'] . '</h3>
                    <p class="product-description">' . $product['specifications'] . '</p>
                    <p class="product-price">$' . $product['price'] . '</p>
                    <p class="product-category">Category: ' . $product['category'] . '</p>
                </div>
            ';
        } else {
            echo '<p>Missing product data.</p>';
        }
    }

    echo '</section>'; 
}

$products = fetchProducts();

$categories = getProductCategories($products);

?>

<div class="filter-container">
    <label for="categorySelect">Filter Category:</label>
    <select id="categorySelect" name="categorySelect">
        <option value="">All Categories</option>
        <?php foreach ($categories as $category): ?>
            <option value="<?php echo $category; ?>"><?php echo $category; ?></option>
        <?php endforeach; ?>
    </select>
</div>

<div id="filtered-products">
</div>

<?php
displayProductCards($products);
?>

<script>
const products = <?php echo json_encode($products); ?>;

document.getElementById('categorySelect').addEventListener('change', function(e) {
    const selectedCategory = e.target.value;
    console.log("Selected category: ", selectedCategory);

    const filteredProducts = selectedCategory
        ? products.filter(product => product.category === selectedCategory)
        : products; 

    console.log("Filtered category: ", filteredProducts);

    displayFilteredProducts(filteredProducts);
});

function displayFilteredProducts(products) {
    const productContainer = document.getElementById('filtered-products');
    productContainer.innerHTML = '';

    if (products.length === 0) {
        productContainer.innerHTML = '<p>No products found for this category.</p>';
        return;
    }

    products.forEach(product => {
        const productCard = `
                   <div class="items">

           <div class="item-card">
    <img src="${product.image}" alt="${product.name}" class="item-img">
    <div class="item-info">
        <h3 class="item-title">${product.name}</h3>
        <p class="item-desc">${product.specifications}</p>
        <div class="item-price-category">
            <p class="item-price">$${product.price}</p>
            <p class="item-category">Category: ${product.category}</p>
        </div>
    </div>
</div>
    </div>

        `;
        productContainer.innerHTML += productCard;
    });
}
</script>

<style>
    .filter-container {
        margin-bottom: 20px;
        text-align: center;
    }

    #categorySelect {
        padding: 10px;
        font-size: 1rem;
        width: 200px;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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

    .items{
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
position: relative;
left:40%
    }


    .item-card {
    border-radius: 12px;
    border: 1px solid #ddd;
    overflow: hidden;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    background-color: #fff;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    display: flex;
    flex-direction: column;
    justify-content: center;
    position: relative;
    height: 500px;
    width: 20%; 

}

.item-card:hover {
    transform: translateY(-12px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

.item-img {
    width: 100%;
    height: 220px;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.item-card:hover .item-img {
    transform: scale(1.08);
}

.item-info {
    padding: 18px;
    flex: 1;
    display: flex;
    flex-direction: column;
}

.item-title {
    font-size: 1.4rem;
    font-weight: bold;
    color: #333;
    margin: 12px 0;
}

.item-desc {
    font-size: 1.1rem;
    color: #777;
    margin-bottom: 18px;
    flex-grow: 1;
}

.item-price-category {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.item-price {
    font-size: 1.3rem;
    font-weight: bold;
    color: #333;
}

.item-category {
    font-size: 1rem;
    color: #888;
}

@media (max-width: 1200px) {
    .items {
        grid-template-columns: repeat(3, 1fr); 
    }
}

@media (max-width: 768px) {
    *{
        overflow-x:hidden;
  
    }
    .items {
        grid-template-columns: repeat(2, 1fr); 
        position: relative;
        left:0px   
    }
    .item-card{
        overflow-x:hidden;
        width: 100%;

       
    }
}

@media (max-width: 480px) {
    .items {
        grid-template-columns: 1fr;
    }
}
</style>
