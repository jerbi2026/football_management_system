function addToCart(productId, userId) {
    let cartData = JSON.parse(getCookie('cart') || '{}');

    if (!cartData[userId]) {
        cartData[userId] = {};
    }

    if (!cartData[userId][productId]) {
        cartData[userId][productId] = 1;
    } else {
        cartData[userId][productId]++;
    }

    setCookie('cart', JSON.stringify(cartData), 7);
    alert('Product added to cart');
}

function removeFromCart(productId, userId) {
    let cartData = JSON.parse(getCookie('cart') || '{}');

    if (cartData[userId] && cartData[userId][productId]) {
        delete cartData[userId][productId];
        if (Object.keys(cartData[userId]).length === 0) {
            delete cartData[userId];
        }
    }

    setCookie('cart', JSON.stringify(cartData), 7);
    document.querySelector(`tr[data-product-id='${productId}']`).remove();
    updateTotalPrice(userId);
}

function setCookie(name, value, days) {
    let expires = "";
    if (days) {
        let date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
}

function getCookie(name) {
    let nameEQ = name + "=";
    let ca = document.cookie.split(';');
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) === ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}

function updateTotalPrice(userId) {
    let totalPrice = 0;
    document.querySelectorAll('tr[data-product-id]').forEach(row => {
        const quantity = row.querySelector('.quantity').value;
        const price = parseFloat(row.querySelector('.text-right').textContent.replace('DNT', ''));
        const total = quantity * price;
        row.querySelector('.total').textContent = total + 'DNT';
        totalPrice += total;
    });
    document.getElementById('total-price').textContent = totalPrice + 'DNT';
}


document.addEventListener("DOMContentLoaded", function() {
    // Attacher un événement onchange à chaque champ de quantité
    document.querySelectorAll('.quantity').forEach(input => {
        input.addEventListener('change', function() {
            updateTotalPrice(); // Mettre à jour le total général lorsque la quantité change
        });
    });
});

