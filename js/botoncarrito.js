const botones = document.querySelectorAll('.add-to-cart');

let cart = JSON.parse(localStorage.getItem('cart')) || [];

botones.forEach(button => {
    button.addEventListener('click', () => {
        const idproducto = button.getAttribute('data-id');
        const nombreproducto = button.getAttribute('data-name');
        const precioproducto = button.getAttribute('data-price');


        const producto = {
            id: idproducto,
            name: nombreproducto,
            price: parseFloat(precioproducto),
        };

        cart.push(producto);

        localStorage.setItem('cart', JSON.stringify(cart));


        alert(`"${nombreproducto}" ha sido añadido al carrito.`);

    });
});

// Logica de carrito html
if (window.location.pathname.includes('carrito.html')) {
    const carritoDiv = document.getElementById('carrito');


    const añadidocarrito = JSON.parse(localStorage.getItem('cart')) || [];


    if (añadidocarrito.length > 0) {
        añadidocarrito.forEach(producto => {
            const productoDiv = document.createElement('div');
            productoDiv.innerHTML =`
                <h2>${producto.name}</h2>
                <p>Precio: $${producto.price}</p>
        `;
        carritoDiv.appendChild(productoDiv);

    });

    } else {
        carritoDiv.innerHTML = '<p>Tu carrito está vacío.</p>';
    }
}
