
const products = document.querySelectorAll('.products');
const priceFilter = document.getElementById('priceFilter');
const footer = document.querySelector('footer');

function filterProducts() {
    let under10000Found = false;
    products.forEach(product => {
     
        const priceText = product.querySelector('.price').textContent;
        const price = parseInt(priceText.replace('Price:', '').replace('€', '').trim());

        
        if (priceFilter.value === 'all') {
            product.style.display = 'block'; 
        } else if (priceFilter.value === 'under10000' && price < 10000) {
            product.style.display = 'block'; 
            under10000Found = true; 
        } else if (priceFilter.value === '10000to30000' && price >= 10000 && price <= 30000) {
            product.style.display = 'block'; 
        } else if (priceFilter.value === 'above30000' && price > 30000) {
            product.style.display = 'block'; 
        } else {
            product.style.display = 'none'; 
        }
    });

   
    if (priceFilter.value === 'under10000' && !under10000Found) {
        footer.style.display = 'none';
    } else {
        footer.style.display = 'block';
    }
}

priceFilter.addEventListener('change', filterProducts);

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
function showSidebar() {
    const sidebar = document.querySelector('.slidebar');
    sidebar.style.display = 'flex'; 
    }
    
    function hideSideBar() {
    const sidebar = document.querySelector('.slidebar');
    sidebar.style.display = 'none'; 
    }