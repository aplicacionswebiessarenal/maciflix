document.addEventListener('DOMContentLoaded', () => {
    const asientosContainer = document.getElementById('asientos-container');
    const totalAsientos = 20; // Total de asientos disponibles
    const asientosEstado = Array(totalAsientos).fill(false); // Estado de los asientos (false = disponible)

    // Función para mostrar los asientos en un formato de cuadrícula
    const mostrarAsientos = () => {
        asientosContainer.innerHTML = ''; // Limpiar el contenedor antes de llenarlo
        for (let i = 0; i < totalAsientos; i++) {
            const asientoDiv = document.createElement('div');
            asientoDiv.textContent = `${i + 1}`; // Solo el número
            asientoDiv.className = `asiento ${asientosEstado[i] ? 'seleccionado' : 'disponible'}`;
            
            // Establecer el estado del asiento
            asientoDiv.addEventListener('click', () => {
                asientosEstado[i] = !asientosEstado[i]; // Alternar el estado del asiento
                mostrarAsientos(); // Actualizar la cuadrícula
            });

            asientosContainer.appendChild(asientoDiv);
        }
    };
    document.getElementById('sala').addEventListener('change', function() {
        const salaSeleccionada = this.value;
        const precios = {
            sala1: "$10",
            sala2: "$12"
        };
        document.getElementById('precios').innerText = `Precio: ${precios[salaSeleccionada]}`;
    });

    // Cambiar el mapa según el cine seleccionado
    const cambiarMapa = () => {
        const tipoCine = document.getElementById('tipo-cine').value;
        const mapa = document.getElementById('mapa');
        if (tipoCine === 'cine1') {
            mapa.src = '/img/cinecuadernillos.png'; // Cambia la ruta al mapa del Cine 1
        } else if (tipoCine === 'cine2') {
            mapa.src = '/img/cine222.png'; // Cambia la ruta al mapa del Cine 2}
        } else if (tipoCine === 'cine3') {
            mapa.src = 'ruta/a/tu/mapa_cine3.png'; // Ruta al mapa del Cine 3
    }
        
    };

    // Evento para cambiar el mapa al seleccionar un cine
    document.getElementById('tipo-cine').addEventListener('change', cambiarMapa);

    // Mostrar/ocultar la cuadrícula de asientos
    document.getElementById('mostrar-asientos').addEventListener('click', () => {
        const contenedor = document.getElementById('asientos-container');
        contenedor.style.display = contenedor.style.display === 'none' ? 'grid' : 'none'; // Alternar visibilidad
        mostrarAsientos(); // Mostrar los asientos al abrir la cuadrícula
    });

    // Confirmar reserva
    document.getElementById('confirmar').addEventListener('click', () => {
        const seleccionados = document.querySelectorAll('.seleccionado');
        const numerosSeleccionados = Array.from(seleccionados).map((asiento, index) => index + 1);
        if (numerosSeleccionados.length > 0) {
            alert(`Has reservado los asientos: ${numerosSeleccionados.join(', ')}`);
        } else {
            alert('No has seleccionado ningún asiento.');
        }
    });
});