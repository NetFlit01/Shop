// Ваша логика для отслеживания количества товаров в корзине
var cartItemCount = 3; // Замените на вашу логику или количество товаров в корзине

function updateCartCount(count) {
    var cartCount = document.getElementById('cartCount');
    if (count > 0) {
        cartCount.textContent = ' (' + count + ')';
    } else {
        cartCount.textContent = '';
    }
}

// Вызов функции для обновления количества товаров в корзине
updateCartCount(cartItemCount);
