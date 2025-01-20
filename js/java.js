document.addEventListener('DOMContentLoaded', function () {
    // Verifica si estamos en la página de selección de asientos
    if (window.location.pathname.includes('seleccion_asientos.html')) {
        const contenedorPelicula = document.getElementById('contenedor-pelicula');
        const peliculaSeleccionada = JSON.parse(localStorage.getItem('peliculaSeleccionada'));

        if (peliculaSeleccionada) {
            // Muestra la imagen y la información de la película
            contenedorPelicula.innerHTML = `
                <img src="${peliculaSeleccionada.imagen}" alt="${peliculaSeleccionada.titulo}" class="imagen-pelicula">
                <div class="info-pelicula">
                    <h2 class="titulo-pelicula">${peliculaSeleccionada.titulo}</h2>
                    <div class="detalles-pelicula">
                        <span class="genero">Género: ${peliculaSeleccionada.genero}</span>
                        <span class="duracion">Duración: ${peliculaSeleccionada.duracion}</span>
                        <span class="calificacion">⭐ ${peliculaSeleccionada.calificacion}</span>
                    </div>
                    <div>
                        <p class="introduccion">${peliculaSeleccionada.introduccion}</p>
                    </div>
                </div>
            `;
        } else {
            contenedorPelicula.innerHTML = `<p>No se ha seleccionado ninguna película.</p>`;
        }
    } else {
        // Código para la página principal (index.html)
        const peliculas = document.querySelectorAll('.pelicula');

        peliculas.forEach(pelicula => {
            pelicula.addEventListener('click', function () {
                const idPelicula = this.id;
                const imagenPelicula = this.querySelector('img').src; // Obtiene la ruta de la imagen
                const tituloPelicula = this.querySelector('h3').textContent; // Obtiene el título de la película

                // Almacena la información en el localStorage
                localStorage.setItem('peliculaSeleccionada', JSON.stringify({
                    id: idPelicula,
                    imagen: imagenPelicula,
                    titulo: tituloPelicula,
                    ...obtenerIntroduccion(idPelicula) // Añade género, duración, calificación e introducción
                }));
            });
        });
    }
});

// Función para obtener la introducción y detalles de la película
function obtenerIntroduccion(idPelicula) {
    switch (idPelicula) {
        case 'pelicula1':
            return {
                genero: "Ciencia Ficción",
                duracion: "2h 10m",
                calificacion: "8.7/10",
                introduccion: "Entramos en el mundo Avatar de la mano de Jake Sully, un ex-Marine en silla de ruedas, que ha sido reclutado para viajar a Pandora, donde existe un mineral raro y muy preciado que puede solucionar la crisis energética existente en la Tierra."
            };
        case 'pelicula2':
            return {
                genero: "Animación",
                duracion: "1h 55m",
                calificacion: "8.3/10",
                introduccion: "Sonic vuelve a la gran pantalla por Navidad, con la aventura más emocionante hasta la fecha. Sonic, Knuckles y Tails se reúnen para enfrentarse a un nuevo y poderoso adversario, Shadow, un misterioso villano cuyos poderes no se parecen a nada de lo que nuestros héroes han conocido hasta ahora. Con sus facultades superadas en todos los sentidos, el Equipo Sonic tendrá que establecer una insólita alianza con la esperanza de detener a Shadow y proteger el planeta"
   
            };
        case 'pelicula3':
            return {
                genero: "Terror",
                duracion: "2h 20m",
                calificacion: "9.0/10",
                introduccion: "Agobiados por la presencia de fantasmas en una mansión que compraron recientemente, una mujer y su hijo contratan a un sacerdote, un guía turístico, un historiador y un psíquico para que les ayuden a exorcizar el lugar."
            };
        case 'pelicula4':
            return {
                genero: "Ciencia Ficción",
                duracion: "2h 05m",
                calificacion: "8.5/10",
                introduccion: "Cuando un enemigo inesperado surge como una gran amenaza para la seguridad mundial, Nick Fury, director de la Agencia SHIELD, decide reclutar a un equipo para salvar al mundo de un desastre casi seguro. Adaptación del cómic de Marvel Los Vengadores el legendario grupo de superhéroes formado por Ironman, Hulk, Thor y el Capitán América entre otros."
            };
        default:
            return {
                genero: "Desconocido",
                duracion: "Desconocida",
                calificacion: "0/10",
                introduccion: "Introducción no disponible."
            };
    }
}
const botonSeleccionCine = document.querySelector('.boton-seleccion-cine');
const opcionesCine = document.querySelector('.opciones-cine');
const opcionesCineBotones = document.querySelectorAll('.opcion-cine');

botonSeleccionCine.addEventListener('click', () => {
    opcionesCine.style.display = opcionesCine.style.display === 'block' ? 'none' : 'block';
});

opcionesCineBotones.forEach(boton => {
    boton.addEventListener('click', () => {
        opcionesCineBotones.forEach(boton => {
            boton.classList.remove('seleccionado');
        });
        boton.classList.add('seleccionado');
    });
});
const cantidadEntradas = document.getElementById('cantidad-entradas');

cantidadEntradas.addEventListener('input', (event) => {
    const entradas = event.target.value;
    console.log(`Entradas seleccionadas: ${entradas}`);
    // Aquí puedes hacer algo con el valor de las entradas, como actualizar el precio total.
});
cantidadEntradas.addEventListener('input', (event) => {
    let entradas = event.target.value;

    // Asegúrate de que el valor esté dentro del rango permitido
    if (entradas < 1) {
        entradas = 0;
    } else if (entradas > 10) {
        entradas = 10;
    }

    event.target.value = entradas; // Actualiza el valor en el campo
    console.log(`Entradas seleccionadas: ${entradas}`);
});
const tipoEntradaSelect = document.getElementById('tipo-entrada');
const cantidadEntradasInput = document.getElementById('cantidad-entradas');
const totalInput = document.getElementById('total');

tipoEntradaSelect.addEventListener('change', calcularTotal);
cantidadEntradasInput.addEventListener('input', calcularTotal);

function calcularTotal() {
    const tipoEntrada = tipoEntradaSelect.value;
    const cantidadEntradas = parseInt(cantidadEntradasInput.value);
    let precioEntrada;

    if (tipoEntrada === 'basica') {
        precioEntrada = 8;
    } else if (tipoEntrada === 'premium') {
        precioEntrada = 10;
    }

    const total = precioEntrada * cantidadEntradas;
    totalInput.value = total.toFixed(2) + '€';
}
document.addEventListener('DOMContentLoaded', function () {
    const tipoEntradaSelect = document.getElementById('tipo-entrada');
    const salaDeCine = document.getElementById('sala-de-cine');
    const asientosContainer = document.querySelector('.asientos-container');
    const confirmarAsientoBtn = document.getElementById('confirmar-asiento');
    const cantidadEntradasInput = document.getElementById('cantidad-entradas');
    const ocultarSalaDeCineBtn = document.createElement('button');
    ocultarSalaDeCineBtn.textContent = 'Ocultar sala de cine';
    ocultarSalaDeCineBtn.addEventListener('click', function () {
        salaDeCine.style.display = 'none';
    });
    salaDeCine.appendChild(ocultarSalaDeCineBtn);

    // Generar asientos dinámicamente
    function generarAsientos() {
        asientosContainer.innerHTML = ''; // Limpiar contenedor de asientos
        for (let i = 1; i <= 20; i++) {
            const asiento = document.createElement('div');
            asiento.classList.add('asiento');
            asiento.textContent = i;
            asiento.addEventListener('click', () => seleccionarAsiento(asiento));
            asientosContainer.appendChild(asiento);
        }
    }

    // Función para seleccionar o deseleccionar un asiento
    function seleccionarAsiento(asiento) {
        const cantidadEntradas = parseInt(cantidadEntradasInput.value);
        const asientosSeleccionados = document.querySelectorAll('.asiento.seleccionado');

        // Si el asiento ya está seleccionado, deseleccionarlo
        if (asiento.classList.contains('seleccionado')) {
            asiento.classList.remove('seleccionado');
        } else {
            // Si no está seleccionado, verificar que no se exceda el límite de entradas
            if (asientosSeleccionados.length < cantidadEntradas) {
                asiento.classList.add('seleccionado');
            } else {
                alert('No puedes seleccionar más asientos que la cantidad de entradas que has elegido.');
            }
        }
        // Habilitar o deshabilitar el botón de confirmar según la selección
        if (confirmarAsientoBtn) {
            confirmarAsientoBtn.disabled = asientosSeleccionados.length < 0;
        }

        // Verificar si la cantidad de entradas es mayor o igual a 1
        if (cantidadEntradas.value >= 1) {
            // Código que se ejecuta si la cantidad de entradas es válida
        }

    }

    // Mostrar u ocultar la sala de cine según el tipo de entrada
    if (tipoEntradaSelect) {
        tipoEntradaSelect.addEventListener('change', function () {
            if (this.value === 'premium') {
                salaDeCine.style.display = 'block';
                generarAsientos();
                confirmarAsientoBtn.disabled = true;
            } else {
                salaDeCine.style.display = 'none';
            }
        });
    }
});
// Función para confirmar la selección de asientos
function confirmarSeleccionAsientos() {
    const asientosSeleccionados = document.querySelectorAll('.asiento.seleccionado');
    if (asientosSeleccionados.length > 0) {
        const numerosAsientos = Array.from(asientosSeleccionados).map(asiento => asiento.textContent).join(', ');
        alert(`Has seleccionado los asientos: ${numerosAsientos}`);
        // Aquí puedes agregar la lógica para guardar los asientos seleccionados en el servidor o localStorage
    } else {
        alert('Por favor, selecciona al menos un asiento antes de confirmar.');
    }
}
const botonFinalizarCompra = document.getElementById('boton-finalizar-compra');

botonFinalizarCompra.addEventListener('click', () => {
    formularioPago.style.display = 'block';
});

// Asignar la función al botón de confirmar asientos
const confirmarAsientoBtn = document.getElementById('confirmar-asiento');
if (confirmarAsientoBtn) {
    confirmarAsientoBtn.addEventListener('click', confirmarSeleccionAsientos);

}

