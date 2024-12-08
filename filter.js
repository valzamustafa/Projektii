// Get all the products, price filter dropdown, and footer
const products = document.querySelectorAll('.products');
const priceFilter = document.getElementById('priceFilter');
const footer = document.querySelector('footer');

// Function to filter products by price
function filterProducts() {
    let under10000Found = false;  // Flag to track if any product is under 10,000€

    products.forEach(product => {
        // Get the price of each car
        const priceText = product.querySelector('.price').textContent;
        const price = parseInt(priceText.replace('Price:', '').replace('€', '').trim());

        // Show or hide based on the filter
        if (priceFilter.value === 'all') {
            product.style.display = 'block'; // Show all products
        } else if (priceFilter.value === 'under10000' && price < 10000) {
            product.style.display = 'block'; // Show cars under 10,000€
            under10000Found = true;  // Mark that a product under 10,000 was found
        } else if (priceFilter.value === '10000to30000' && price >= 10000 && price <= 30000) {
            product.style.display = 'block'; // Show cars between 10,000€ and 30,000€
        } else if (priceFilter.value === 'above30000' && price > 30000) {
            product.style.display = 'block'; // Show cars above 30,000€
        } else {
            product.style.display = 'none'; // Hide other cars
        }
    });

    // If no products under 10,000 are found, hide the footer
    if (priceFilter.value === 'under10000' && !under10000Found) {
        footer.style.display = 'none'; // Hide the footer if no cars are under 10,000€
    } else {
        footer.style.display = 'block'; // Show the footer otherwise
    }
}

// Event listener to trigger the filter on change
priceFilter.addEventListener('change', filterProducts);

// Initial call to display all products
filterProducts();


function addToFavorites(productName, price, imageSrc) {
   
    let favorites = localStorage.getItem('favorites');
    favorites = favorites ? JSON.parse(favorites) : [];  

   
    const product = {
        name: productName,
        price: price,
        image: imageSrc
    };

  
    favorites.push(product);

   
    localStorage.setItem('favorites', JSON.stringify(favorites));

    
    alert(`${productName} has been added to your favorites!`);
}