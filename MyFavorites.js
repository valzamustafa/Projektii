
function displayFavorites() {
    let favorites = localStorage.getItem('favorites');
    favorites = favorites ? JSON.parse(favorites) : [];

    const favoritesContainer = document.getElementById('favorites-container');
    favoritesContainer.innerHTML = '';  

    if (favorites.length === 0) {
        favoritesContainer.innerHTML = '<p class="no-products">You have no favorite products.</p>';
    } else {
        favorites.forEach((product, index) => {
        
            const productDiv = document.createElement('div');
            productDiv.classList.add('favorite-product');
            
            productDiv.innerHTML = `
                <img src="${product.image}" alt="${product.name}">
                <h3>${product.name}</h3>
                <p>Price: €${product.price}</p>
                <button class="remove-button" onclick="removeFromFavorites(${index})">Remove</button>
            `;
            
            favoritesContainer.appendChild(productDiv); 
        });
    }
}


function removeFromFavorites(index) {
    let favorites = localStorage.getItem('favorites');
    favorites = favorites ? JSON.parse(favorites) : []; 


    favorites.splice(index, 1);

    
    localStorage.setItem('favorites', JSON.stringify(favorites));

   
    displayFavorites();
}


window.onload = function() {
    displayFavorites();
};