document.addEventListener('DOMContentLoaded', function () {
    const priceFilter = document.getElementById('priceFilter');
    const products = document.querySelectorAll('.products'); // Select all product containers

    priceFilter.addEventListener('change', function () {
        const filterValue = priceFilter.value;

        products.forEach(function (product) {
            const price = parseFloat(product.querySelector('.price').textContent.replace('Price:', '').replace('€', '').trim());

            // Hide all products by default
            product.style.display = 'none';

            // Filter products based on price range
            if (filterValue === 'all') {
                product.style.display = 'block';
            } else if (filterValue === 'under10000' && price < 10000) {
                product.style.display = 'block';
            } else if (filterValue === '10000to30000' && price >= 10000 && price <= 30000) {
                product.style.display = 'block';
            } else if (filterValue === 'above30000' && price > 30000) {
                product.style.display = 'block';
            }
        });
    });
});
