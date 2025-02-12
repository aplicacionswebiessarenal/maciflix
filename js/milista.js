
/*script para milista.html*/
function showPopup(peli) {
    document.getElementById('popup').style.display = 'flex';

}

function hidePopup() {
    document.getElementById('popup').style.display = 'none';
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