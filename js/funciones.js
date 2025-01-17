// Selección de elementos
const miboton = document.getElementById("miboton");
const minav = document.getElementById("minav");

// Evento para el botón hamburguesa
miboton.addEventListener("click", () => {
  minav.classList.toggle("show"); // Alterna la clase 'show'
});
