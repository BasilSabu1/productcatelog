document.addEventListener("DOMContentLoaded", () => {
    const productList = document.getElementById("product-list");
    const categoryFilter = document.getElementById("categoryFilter");

    fetch("data/products.json")
        .then(response => response.json())
        .then(data => {
            displayProducts(data);

            categoryFilter.addEventListener("change", () => {
                const selectedCategory = categoryFilter.value;
                const filteredProducts = selectedCategory === "all"
                    ? data
                    : data.filter(product => product.category === selectedCategory);
                displayProducts(filteredProducts);
            });
        });

    function displayProducts(products) {
        productList.innerHTML = "";
        products.forEach(product => {
            const productCard = `
                <div class="product-card">
                    <img src="${product.image}" alt="${product.name}">
                    <h2>${product.name}</h2>
                    <p>${product.description}</p>
                    <p class="price">$${product.price}</p>
                </div>
            `;
            productList.innerHTML += productCard;
        });
    }
});
