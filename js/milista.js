
/*script para milista.html*/
function verPelicula(nombre) {
    alert('Reproduciendo ' + nombre);
}

function quitarPelicula(id) {
    if (confirm('¿Seguro que quieres quitar esta película?')) {
        fetch('', {
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            body: 'delete=true&id=' + id
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Error al eliminar la película');
            }
            document.getElementById('pelicula-' + id).remove();
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error al eliminar la película. Por favor, inténtelo de nuevo.');
        });

    }
}

/*script para el faq.html*/
  document.querySelectorAll('.faq-pregunta').forEach(button => {
    button.addEventListener('click', () => {
        let respuesta = button.nextElementSibling;

        if (respuesta.style.display === 'block') {
            respuesta.style.display = 'none';
        } else {
            // Primero ocultamos todas las respuestas antes de abrir una nueva
            document.querySelectorAll('.faq-respuesta').forEach(resp => {
                resp.style.display = 'none';
            });

            respuesta.style.display = 'block';
        }
    });
});