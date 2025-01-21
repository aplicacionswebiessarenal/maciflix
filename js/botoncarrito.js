// Solo Dios y gabito entienden como esto funciona sin romperse
// https://shorturl.at/3cVGG

const botones = document.querySelectorAll('.add-to-cart');

let cart = JSON.parse(localStorage.getItem('cart')) || [];

botones.forEach(button => {
    button.addEventListener('click', () => {
        const idproducto = button.getAttribute('data-id');
        const nombreproducto = button.getAttribute('data-name');
        const precioproducto = button.getAttribute('data-price');
        const imagenproducto = button.getAttribute('data-image');

        const producto = {
            id: idproducto,
            name: nombreproducto,
            price: parseFloat(precioproducto),
            image: imagenproducto,
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
        let total = 0;
        añadidocarrito.forEach((producto, index) => {
            const productoDiv = document.createElement('div');
            productoDiv.classList.add('producto-carrito')
            productoDiv.innerHTML =`
                <img src="${producto.image}" alt="${producto.name}" class="imagen-producto" />
                <div class="detalle-producto">
                    <h3>${producto.name}</h3>
                    <p>Precio: $${producto.price.toFixed(2)}</p>
                    <button class="eliminar-producto" data-index="${index}">Eliminar</button>
                </div>
        `;
        carritoDiv.appendChild(productoDiv);

        total += producto.price;
    });
    
document.getElementById('total').textContent = total.toFixed(2);

document.querySelectorAll('.eliminar-producto').forEach(button => {
    button.addEventListener('click', (e) => {
        const index = e.target.getAttribute('data-index');
        añadidocarrito.splice(index, 1);
        localStorage.setItem('cart', JSON.stringify(añadidocarrito));
        window.location.reload();
    });
});
} else {
        carritoDiv.innerHTML = '<p>Tu carrito está vacío.</p>';
    }
}
