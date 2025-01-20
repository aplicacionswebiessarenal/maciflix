
/*script para milista.html*/
function showPopup(peli) {
    document.getElementById('popup').style.display = 'flex';

}

function hidePopup() {
    document.getElementById('popup').style.display = 'none';
}


/*script para el faq.html*/
function toggleRespuesta(button) {
    const respuesta = button.nextElementSibling;
  
    if (respuesta.style.display === "none" || !respuesta.style.display) {
      respuesta.style.display = "block";
    } else {
      respuesta.style.display = "none";
    }
  }