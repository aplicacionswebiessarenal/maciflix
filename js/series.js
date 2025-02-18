document.addEventListener('DOMContentLoaded', function() {
    // Show season 1 by default
    showSeason(1);

    // Add event listeners for season selection
    const seasonSelect = document.getElementById('season-select');
    if (seasonSelect) {
        seasonSelect.addEventListener('change', function() {
            showSeason(this.value);
        });
    }

    // Add event listeners for description toggling
    const leerMasButtons = document.querySelectorAll('.leer-mas');
    leerMasButtons.forEach(button => {
        button.addEventListener('click', function() {
            const id = this.id.split('-')[1];
            toggleDescription(id);
        });
    });

    // Add event listeners for play buttons
    const reproducirButtons = document.querySelectorAll('.reproducir');
    reproducirButtons.forEach(button => {
        button.addEventListener('click', function() {
            const episodeName = this.closest('.episode').querySelector('h3').textContent;
            showNotification(episodeName);
        });
    });

    // Add event listeners for "Ver Detalles" buttons
    const verDetallesButtons = document.querySelectorAll('.boton');
    verDetallesButtons.forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('onclick').match(/\d+/)[0];
            toggleDescription(id);
        });
    });
});

function showNotification(episodeName) {
    alert('Reproduciendo ' + episodeName);
}

function toggleDescription(id) {
    const desc = document.getElementById('desc-' + id);
    const btn = document.getElementById('btn-' + id);
    if (desc.style.display === 'none' || desc.style.display === '') {
        desc.style.display = 'block';
        if (btn) btn.innerText = 'Leer menos';
    } else {
        desc.style.display = 'none';
        if (btn) btn.innerText = 'Leer más';
    }
}

function showSeason(seasonNumber) {
    const seasons = document.querySelectorAll('.season');
    seasons.forEach(season => {
        season.style.display = 'none';
    });
    document.getElementById('season-' + seasonNumber).style.display = 'block';
}