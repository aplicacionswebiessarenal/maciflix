/*script para el footer de indexhtml*/







/*script para el FAQ*/
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

/*script para el milista*/
