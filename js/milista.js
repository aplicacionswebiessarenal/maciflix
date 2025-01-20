
/*script para milista.html*/
function showPopup(peli) {
    document.getElementById('popup').style.display = 'flex';

}

function hidePopup() {
    document.getElementById('popup').style.display = 'none';
}


/*script para el faq.html*/
const faqPreguntas = document.querySelectorAll('.faq-pregunta');

faqPreguntas.forEach((pregunta) => {
    pregunta.addEventListener('click', () => {
        const respuesta = pregunta.nextElementSibling;

        if (respuesta.style.display === 'block') {
            respuesta.style.display = 'none';
        } else {
            respuesta.style.display = 'block';
        }
    });
});

